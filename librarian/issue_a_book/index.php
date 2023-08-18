<?php
$title = 'Issue a book | Librarian';
include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
?>
<link href="/assets/css/addi.css" type="text/css" rel="stylesheet">
<body>
<nav>
<a href="/librarian/logout.php"><input id="re" type="button" value="SIGN OUT"></a>
<a href="/librarian"><input id="adl" type="button" value="Dashboard"></a>
<div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
</nav>

<form id="req_f" action="" method="POST">
        <fieldset>
        <legend class="lsg">ISSUE A BOOK</legend></br>
<div class="lg">
    <input type="text" id="username" name="name" placeholder="Enter the username of student" required/>
</br>
    <input type="text" id="book" name="book_name" placeholder="Enter name of the book" required/>
</br>
<div class="date_selector">
<label for="issdate">ISSUED DATE</label>
<br>
<input type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" id="issdate" name="issued_date" placeholder="YYYY-MM-DD" required/>
</br>
<label for="retdate">RETURN DATE</label>
<br>
<input type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" id="retdate" name="return_date" placeholder="YYYY-MM-DD" required/>
</div>
</br>
<div id="reqsub">
<input id="req_btn" type="submit" value="ISSUE">
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name =  $_REQUEST['name'];
        $book = $_REQUEST['book_name'];
        $idate = $_REQUEST['issued_date'];
        $rdate = $_REQUEST['return_date'];

        $sql = "INSERT INTO books_issued  VALUES ('$name','$book','$idate','$rdate')";
         
        if(mysqli_query($con, $sql)){
            echo '<script>
            alert("Book has been successfully issued");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/issue_a_book');
 
        } else{
            echo '<script>
            alert("Something went wrong!");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/issue_a_book');
        }
    }
    ?>
    </fieldset>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="/script.js"></script>
      </body>
    </html>
    
    