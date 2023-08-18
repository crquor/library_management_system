<?php
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
$id=$_REQUEST['id'];
$query = "DELETE FROM students WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
echo '<script>alert("Deleted successfully!");</script>';
header('Refresh: 0; URL=http://localhost/librarian/manage_students'); 
exit();
?>