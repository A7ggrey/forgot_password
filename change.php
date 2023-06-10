<?php
if (isset($_POST['send_password'])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);


    $url = "www.jreylibrary.xyz/forgot_password/reset.php?selector=" .$selector. "&validator=" 
    .bin2hex($token);
}


?>