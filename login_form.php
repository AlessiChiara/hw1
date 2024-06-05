<?php
require_once 'assests/connect.php';
session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    header("Location:index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    
    $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $select_user->bind_param("ss", $email, $pass);
    $select_user->execute();
    $result = $select_user->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        header('Location:index.php');
        exit();
    } else {
        $message[] = 'Email o password non corretti!';
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
        }
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login_form.css">
    <script src="js/login.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form id="loginForm" action="" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button type="submit" name="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Non hai un account? <a href="registration.php">Registrati</a></p>
            </div>
        </form>
    </div>
</body>

</html>
