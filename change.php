<?php
if (isset($_POST['send_password'])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);


    $url = "www.jreylibrary.xyz/forgot_password/reset.php?selector=" .$selector. "&validator=" 
    .bin2hex($token);

    $expires = date("u") + 1800;


    include('db.php');

    $email = $_POST['email'];

    $sql = "DELETE FROM forgot_password WHERE pwd_reset_email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        echo "There was an error!";
    } else {
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO forgot_password(pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) 
    VALUES(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        echo "There was an error!";
    } else {

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }


    msqli_stmt_close($stmt);
    mysqli_close();



    $to = $email;
    $subject = "Reset Your Password For Chat Me.";
    $message = "<p>We Recieved a password request. Ignore if you did not request.</p>";
    $message .= "<p>Here is the password reser link: <br>";
    $message .= "<a href='" .$url. "'>" .$url. "</a></p>";
}


?>