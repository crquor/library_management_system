<?php
$title = 'Remove a book | Librarian';
include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
?>
<body>
<nav>
<a href="/librarian/logout.php"><input id="re" type="button" value="SIGN OUT"></a>
<a href="/librarian"><input id="adl" type="button" value="Dashboard"></a>
<div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
</nav>

<form id="req_f" action="" method="POST">
        <fieldset>
        <legend class="lsg">REMOVE A BOOK</legend></br>
<div class="lg">
<input type="number" id="ii" name="id" placeholder="Enter book id" required/>
</br>
<div id="reqsub">
<input id="req_btn" type="submit" value="REMOVE">
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ide=$_POST['id'];
        $sql = "DELETE FROM books where id='$ide'";
        $ExecQuery  = mysqli_query($con,$sql);
        if($ExecQuery){
            echo '<script>
            alert("Book has been deleted successfully.");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/remove_a_book');
 
        } else{
            echo '<script>
            alert("Something went wrong!");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/remove_a_book');
        }
    }
    ?>
    </fieldset>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    