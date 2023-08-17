<?php
$title = 'Add a book | Librarian';
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
        <legend class="lsg">ADD A BOOK</legend></br>
<div class="lg">
<input type="text" id="name" name="name" placeholder="Enter name of the book" required/>
</br>
    <input type="text" id="image" name="book_image" placeholder="Enter image URL" required/>
</br>
<input type="text" id="author" name="author" placeholder="Enter name of the author" required/>
</br>
<input type="number" id="shelf" name="shelf" placeholder="Book Shelf" required/>
</br>
<input type="number" id="row" name="row" placeholder="Row" required/>
</br>
<input type="number" id="column" name="column" placeholder="Column" required/>
</br>
<div id="reqsub">
<input id="req_btn" type="submit" value="ADD">
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name =  $_REQUEST['name'];
        $image = $_REQUEST['book_image'];
        $author = $_REQUEST['author'];
        $shelf = $_REQUEST['shelf'];
        $row = $_REQUEST['row'];
        $column = $_REQUEST['column'];

        $sql = "INSERT INTO books VALUES ('','$name','$image','$author','$shelf','$row','$column')";
         
        if(mysqli_query($con, $sql)){
            echo '<script>
            alert("Book has been added successfully.");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/add_a_book');
 
        } else{
            echo '<script>
            alert("Something went wrong!");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/librarian/add_a_book');
        }
    }
    ?>
    </fieldset>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    