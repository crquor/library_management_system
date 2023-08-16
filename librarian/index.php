<?php
$title = "Librarian | Dashboard";
include $_SERVER['DOCUMENT_ROOT']."/librarian/session.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
?>
<body>
<nav>
<a href="./logout.php"><input id="re" type="button" value="SIGN OUT"></a>
             <div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
</nav>

<div class="tabs">

  <input type="radio" id="tab1" name="tab-control" checked>
  <input type="radio" id="tab2" name="tab-control">
  <input type="radio" id="tab3" name="tab-control">
  <ul>
    <li title="Requests"><label for="tab1" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg><br><span>ALL BOOKS</span></label></li>
    <li title="Email"><label for="tab2" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M140-160q-24 0-42-18t-18-42v-520q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140-685v465h680v-465L480-462Zm0-60 336-218H145l335 218ZM140-685v-55 520-465Z"/></svg><br><span>BOOKS ISSUED</span></label></li>
    <li title="Password"><label for="tab3" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M80-200v-61h800v61H80Zm38-254-40-22 40-68H40v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 22-38-67-38 67Zm324 0-40-24 40-68h-78v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 24-38-67-38 67Zm324 0-40-24 40-68h-78v-45h78l-40-68 40-22 38 67 38-67 40 22-40 68h78v45h-78l40 68-40 24-38-67-38 67Z"/></svg><br><span>CHANGE PASSWORD</span></label></li>
  </ul>

  <div class="slider">
    <div class="indicator"></div>
  </div>
  <div class="content">


    <section>
      <?php
    $Query= "SELECT id, book_name, book_image, Author, shelf, row_no, column_no FROM books";
    //Query execution
       $ExecuQuery = MySQLi_query($con, $Query);
    //Creating unordered list to display result.
       echo '
       <table id="list">
       <tr>
          <th>Book ID</th>
          <th>Name of the book</th>
          <th>Image</th>
          <th>Name of Author</th>
          <th>Shelf no</th>
          <th>Row no</th>
          <th>Column no</th>
       </tr>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecuQuery)) {
         echo "<tr>";
            echo "<td>" . $Result['id'] . "</td>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "<td>" . "<img src=". $Result['book_image'].' width=80px height="120px">' . "</td>";
            echo "<td>" . $Result['Author'] . "</td>";
            echo "<td>" . $Result['shelf'] . "</td>";
            echo "<td>" . $Result['row_no'] . "</td>";
            echo "<td>" . $Result['column_no'] . "</td>";
            echo "</tr>";
       }
       echo '</table>';
       ?>
</section>

    <section>
    
    <?php
      $Que= "SELECT * FROM books_issued";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Que);
    //Creating unordered list to display result.
       echo '
       <table id="request_list">
       <tr>
       <th>ISSUED TO</th>
          <th>Name of the book</th>
          <th>Issued date</th>
          <th>Return Date</th>
       </tr>';
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
         echo "<td>" . $Result['username'] . "</td>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "<td>" . $Result['issued_date'] . "</td>";
            echo "<td>" . $Result['return_date'] . "</td>";

            echo "</tr>";
       }
       echo '</table>';
      ?>

    </section>

    <section>
      
    <div id="rpc">
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<input type="password" name="oppwd" id="oppwd" placeholder="Enter your current password" >
<br>
<input type="password" name="nppwd" id="nppwd" placeholder="Enter your new password">
<br>
<input type="password" name="cpwd" id="cpwd" placeholder="Confirm your new password">
<br>
      </div>
<input id="cpw" type="submit" name="Submit" value="Change Password" />
</form>
      <?php
if(isset($_POST['Submit']))
{
 $oldpass=($_POST['oppwd']);
 $username=$_SESSION['alogin_user'];
 $newpassword=($_POST['nppwd']);
$sql=mysqli_query($con,"SELECT apass_code FROM librarian where apass_code='$oldpass' && ausername='$username'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $cone=mysqli_query($con,"update librarian set apass_code='$newpassword' where ausername='$username'");
echo '<script>
alert("Password changed successfully");
</script>';
header('Refresh: 3; URL=http://localhost/librarian');
}
else
{
  echo '<script>
  alert("Old password does not match");
  </script>';
header('Refresh: 3; URL=http://localhost/librarian');
}
}
      ?>

    </section>

  </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    