<?php
$title = "Librarian | Dashboard";
include './session.php';
include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";
include $_SERVER['DOCUMENT_ROOT']."/includes/db.php";
?>
<body>
<nav>
<a href="./logout.php"><input id="re" type="button" value="SIGN OUT"></a>
<a href="/request"><input id="re" type="button" value="Request a book"></a>
      
         <div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
</nav>

<?php
$Query= "SELECT * from books";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Query);
    //Creating unordered list to display result.
    echo '<div class="adre">';
       echo '
       <table id="list">
       <tr>
          <th>Book ID</th>
          <th>Name of the book</th>
          <th>Image</th>
       </tr>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
            echo "<td>" . $Result['id'] . "</td>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "<td>" . "<img src=". $Result['book_image'].' width=80px height="120px">' . "</td>";
            echo "</tr>";
       }
       echo '</table>';
echo '</div';
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
      </body>
    </html>
    
    