<?php
    require_once 'assests/connect.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        header("Location:index.php");
    }else{
        $user_id='';
    }

  $message= [];

   

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $cpass = $_POST['cpass'];
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

       
        if (!preg_match('/[A-Z]/', $pass) || !preg_match('/[0-9]/', $pass) || !preg_match('/[^a-zA-Z\d]/', $pass)) {
           $message[] = 'La password deve contenere almeno una lettera maiuscola, un numero, un carattere speciale e deve essere di almeno 8 caratteri.';
        } else if($pass != $cpass){
           $message[] = 'La password non corrisponde!';
        } else {
           $pass = sha1($pass);
           $cpass = sha1($cpass);
     
           $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? OR number = ?");
           $select_user->bind_param("ss", $email, $number);
           $select_user->execute();
           $result = $select_user->get_result();
     
           if($result->num_rows > 0){
              $message[] = 'Email or number already exists!';
           } else {
              $insert_user = $conn->prepare("INSERT INTO users(name, email, number, password) VALUES (?, ?, ?, ?)");
              $insert_user->bind_param("ssss", $name, $email, $number, $pass);
              $insert_user->execute();
     
              $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
              $select_user->bind_param("ss", $email, $pass);
              $select_user->execute();
              $result = $select_user->get_result();
              $row = $result->fetch_assoc();
     
              if($result->num_rows > 0){
                 $_SESSION['user_id'] = $row['id'];
                 header('location:index.php');
              }
           }
        }
     }
?>



</section>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style/registration.css">
    <script src="js/registration.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php
if(isset($message)){
      foreach($message as $message){
          echo '
          <div class="message">
              <span>'.$message.'</span>
              <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>
          ';
      }
  
    
  }

  $message=[];
  ?>
  

  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="" method='POST' id='registerForm'>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="name" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Number</span>
            <input type="number" name="number" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpass" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>