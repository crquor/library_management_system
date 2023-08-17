<?php
$title = 'Request a book';
include '../includes/header.php';
include '../includes/db.php';
?>
<body>
<?php include '../includes/navbar.php'; ?>
<form id="req_f" action="" method="POST">
        <fieldset>
        <legend class="lsg">REQUEST A BOOK</legend></br>
<div class="lg">
    <input type="text" id="username" name="name" placeholder="Enter your username" required/>
</br>
    <input type="text" id="book" name="book_name" placeholder="Enter name of the book" required/>
</br>
<div id="reqsub">
<input id="req_btn" type="submit" value="REQUEST">
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name =  $_REQUEST['name'];
        $book = $_REQUEST['book_name'];

        $sql = "INSERT INTO requests  VALUES ('$name','$book')";
         
        if(mysqli_query($con, $sql)){
            echo '<script>
            alert("Your request was submitted successfully");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/request');
 
        } else{
            echo '<script>
            alert("Something went wrong!");
          
          </script>
          ';
            header('Refresh: 2; URL=http://localhost/request');
        }
    }
    ?>
    </fieldset>
</form>
</body>
</html>