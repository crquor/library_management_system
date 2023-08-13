<?php
$title = ' Librarian | Login';
include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
?>
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/navbar.php";
 ?>
       <form id="lgn-form" action="" method="POST">
        <fieldset>
        <legend class="lsg">Librarian login</legend></br>
<div class="lg">
    <input type="text" id="username" name="adnusername" placeholder="Enter your username" required/>
</br>
    <input type="password" id="password" name="adnpassword" placeholder="Enter your password" required/>
</br>
<input id="lg_btn" type="submit" value="LOGIN">
<?php
session_id("librarian");
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   
   $myusername = mysqli_real_escape_string($con,$_POST['adnusername']);
   $mypassword = mysqli_real_escape_string($con,$_POST['adnpassword']); 
   
   $sql = "SELECT * FROM librarian WHERE ausername = '$myusername' and apass_code = '$mypassword'";
   $result = mysqli_query($con,$sql);
   $arow = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row
     

if($count == 1) {
         $_SESSION["ausername"]= "adnusername"; // storing username in session

         $_SESSION['alogin_user'] = $myusername;
         
         header("location: /librarian");
      }else {
         echo '<center>Invalid username or password</center>';
         header('Refresh: 2; URL=http://localhost/librarian/login');
      }
    }
   if(isset($_SESSION['alogin_user'])){
      header("location: /librarian");
      die();
   }
      ?>
</fieldset>
</form>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    