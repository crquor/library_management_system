<?php
$title = 'Request a book';
include '../scripts/header.php';
include '../scripts/db.php';
?>
<body>
<?php include '../scripts/navbar.php'; ?>
    <div class="fmf"></br>
    <form id="inputs" action="" method="POST">
        <b><strong class="reqs" style="align: center;" >REQUEST A BOOK</strong></br>
</br>
    <input type="text" id="req_name" name="name" placeholder="Enter your username"  required/></br>
    <input type="text" id="req_id" name="id" placeholder="Enter your STUDENT ID" required/></br>
    <input type="email" id="req_email" name="email" placeholder="Enter your email" required/></br>
    <input type="text" id="req_book" name="book" placeholder="Enter name of the book" required/></br>
</div>
</br>
    <input type="submit" id="req_submit" value="REQUEST">
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name =  $_REQUEST['name'];
        $id = $_REQUEST['id'];
        $email =  $_REQUEST['email'];
        $book = $_REQUEST['book'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO requests  VALUES ('$name',
            '$id','$email','$book')";
         
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
</form>
</body>
</html>