<?php
$title = 'Manage students | Librarian';
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

<center><h2>STUDENT'S DETAILS</h2></center>
</br>
<table id="list">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>Student Photo</strong></th>
<th><strong>Email</strong></th>
<th><strong>Username</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>

</tr>
</thead>
<tbody>
<?php
$sel_query="Select * from students";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><img class="trans" width="60" height="60" src="<?php echo $row["student_photo"]; ?>"></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    