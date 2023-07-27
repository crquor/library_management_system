<?php
$title = 'Login';
include '../scripts/header.php';
include '../scripts/db.php';
?>
<body>
<?php include '../scripts/navbar.php'; ?>
       <form id="lgn-form" action="" method="POST">
        <fieldset>
        <legend class="lsg">LOGIN</legend></br>
<div class="lg">
    <input type="text" id="username" name="username" placeholder="Enter your username" required/>
</br>
    <input type="password" id="password" name="password" placeholder="Enter your password" required/>
</br>
<input id="lg_btn" type="submit" value="LOGIN">
<?php
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   
   $myusername = mysqli_real_escape_string($con,$_POST['username']);
   $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
   
   $sql = "SELECT id FROM students WHERE username = '$myusername' and pass_code = '$mypassword'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);
   
   // If result matched $myusername and $mypassword, table row must be 1 row
     

if($count == 1) {
         $_SESSION["myusername"]= "username"; // storing username in session

         $_SESSION['login_user'] = $myusername;
         
         header("location: /dashboard");
      }else {
         echo '<center>Invalid username or password</center>';
         header('Refresh: 2; URL=http://localhost/login');
      }
    }
   if(isset($_SESSION['login_user'])){
      header("location: /dashboard");
      die();
   }
      ?>
</fieldset>
</form>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    
