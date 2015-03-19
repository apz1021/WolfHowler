<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>WolfHowler</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body class="background">


<div>
    <img src="Wolfhowler_logo_blue_glow.png" alt="WolfHowler" width="300" height="300">
</div>
<div>
    <form action="signup.php" method="post" enctype="text/plain">
            <input class="text_box" type="text" name="email" placeholder="Input your email to be notified of our launch" autofocus>
            <input type="submit" class="btn" value="SIGN UP">
    </form>

    <?php

    ini_set('display_errors',1);
    if(!isset($_POST['email'])){
	$_POST['email'] = "error@noemail.com";


}

$dbUser = 'howler_email';
$dbPass = 'UcdqjRtrV7HSA83a';
$dbName = 'howler_emails';
$dbHost = 'localhost';
$dbPort = 3306;

$dbh = new PDO('mysql:host='.$dbHost.';dbname=' . $dbName, $dbUser, $dbPass);

error_reporting(E_ALL);
$query = $dbh->prepare('INSERT INTO email (`email`, `ip`) VALUES (:email, :ip)');
$query->bindParam(':email', $_POST['email']);
$query->bindParam(':ip', $_SERVER['REMOTE_ADDR']);

$query->execute();

//$email = $_POST['email'];
//print_r( $query->errorInfo());

echo 'Thanks for signing up!';
?>
</div>



</body>



</html>


