<?php
session_start();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
</head>
<body>
    <form action="./change.php" method="post">
        <p>
            <input type="text" name="email" id="" placeholder="Email">
        </p>
        <p>
            <input type="submit" value="Send Password" name="send_password">
        </p>
    </form>
    
</body>
</html>