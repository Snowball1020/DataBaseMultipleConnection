<?php ob_start(); ?>
<html>

<body>

<?php
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

require('db.php');

$sql = "SELECT user_id FROM users WHERE username = :username AND password = :password";

$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);
$cmd->execute();
$users = $cmd->fetchAll();

$count = $cmd->rowCount();

if ($count == 0) {
    echo 'Invalid Login';
    exit();
    header('location: login.php');
}

else {
    session_start(); // access the existing session

    foreach  ($users as $user) {
        $_SESSION['user_id'] = $user['user_id'];
    }
}

$db = null;

header('location: menu.php');
?>

</body>
</html>
<?php ob_flush(); ?>

