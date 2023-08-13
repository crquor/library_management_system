<?php
$title = 'Dashboard';
include '../includes/header.php';
include '../includes/session.php';
?>
<body>
<nav>
   
      <a href="./logout.php"><input id="re" type="button" value="SIGN OUT"></a>
         <div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
</u></h2>
</nav>
<div class="tabs">

  <input type="radio" id="tab1" name="tab-control" checked>
  <input type="radio" id="tab2" name="tab-control">
  <input type="radio" id="tab3" name="tab-control">
  <ul>
    <li title="Requests"><label for="tab1" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg><br><span>Books issued to me</span></label></li>
    <li title="Email"><label for="tab2" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M140-160q-24 0-42-18t-18-42v-520q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140-685v465h680v-465L480-462Zm0-60 336-218H145l335 218ZM140-685v-55 520-465Z"/></svg><br><span>CHANGE EMAIL</span></label></li>
    <li title="Password"><label for="tab3" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M80-200v-61h800v61H80Zm38-254-40-22 40-68H40v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 22-38-67-38 67Zm324 0-40-24 40-68h-78v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 24-38-67-38 67Zm324 0-40-24 40-68h-78v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 24-38-67-38 67Z"/></svg><br><span>CHANGE PASSWORD</span></label></li>
  </ul>

  <div class="slider">
    <div class="indicator"></div>
  </div>
  <div class="content">


    <section>
    <?php
      $Que= "SELECT * FROM books_issued where username LIKE '%$login_session'";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Que);
    //Creating unordered list to display result.
       echo '
       <table id="request_list">
       <tr>
          <th>Name of the book</th>
          <th>Issued date</th>
          <th>Return Date</th>
       </tr>';
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "<td>" . $Result['issued_date'] . "</td>";
            echo "<td>" . $Result['return_date'] . "</td>";

            echo "</tr>";
       }
       echo '</table>';
      ?>
      <!--
      <div class="info">
  <p><strong>NOTE: </strong> Click <a href="http://localhost/request">here</a> to request a new book</p>
</div>
      -->
</section>

    <section>
    <div id="rpc">
<form name="chngeml" action="" method="post" onSubmit="return valide();">
<input type="email" name="eml" id="eml" placeholder="Set new email address">

<br>
<input type="password" name="pwd" id="pwd" placeholder="Enter your password">
<br>
      </div>
      <br>
      <br>
<input id="cem" type="submit" name="Submit" value="Change Email" />
</form>
      <?php
if(isset($_POST['Submit']))
{
 $pass=($_POST['pwd']);
 $username=$_SESSION['login_user'];
 $newemail=($_POST['eml']);
$sql=mysqli_query($con,"SELECT pass_code FROM students where pass_code='$pass' && username='$username'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update students set email='$newemail' where username='$username'");
echo '<br></br>Email changed';
header('Refresh: 3;URL=http://localhost/dashboard');
}
else
{
echo 'Your password is incorrect';
header('Refresh: 3; URL=http://localhost/dashboard');
}
}
      ?>
    </section>

    <section>
      <div id="rpc">
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<input type="password" name="opwd" id="opwd" placeholder="Enter your current password" >
<br>
<input type="password" name="npwd" id="npwd" placeholder="Enter your new password">
<br>
<input type="password" name="cpwd" id="cpwd" placeholder="Confirm your new password">
<br>
      </div>
<input id="cpw" type="submit" name="Submit" value="Change Password" />
</form>
      <?php
if(isset($_POST['Submit']))
{
 $oldpass=($_POST['opwd']);
 $username=$_SESSION['login_user'];
 $newpassword=($_POST['npwd']);
$sql=mysqli_query($con,"SELECT pass_code FROM students where pass_code='$oldpass' && username='$username'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update students set pass_code='$newpassword' where username='$username'");
echo '<br/>Password changed';
header('Refresh: 3; URL=http://localhost/dashboard');
}
else
{
echo 'Old password does;t match';
header('Refresh: 3; URL=http://localhost/dashboard');
}
}
      ?>
    </section>

  </div>
</div>
<script type="text/javascript" src="/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/scripts/script.js"></script>
</body>
</html>