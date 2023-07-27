<?php
$title = 'Dashboard';
include '../scripts/header.php';
include '../scripts/session.php';
?>
<body>
<nav>
   
      <a href="./logout.php"><input id="re" type="button" value="SIGN OUT"></a>
         <div class="header">
<a href="http://localhost"><img id="logo" src="/assets/images/header_img.png" width="240" height="120"/></a>
<h2>Welcome, <u><?php echo $login_session; 
?></u></h2>
</nav>
      <?php
      $Que= "SELECT * FROM requests where username LIKE '%$login_session'";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Que);
    //Creating unordered list to display result.
    echo '<center><h3 class="dr"> Your Requests </h3></center>';
       echo '
       <table id="list">
       <tr>
          <th>Name of the book</th>
       </tr>';
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "</tr>";
       }
       echo '</table>';
      ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="/script.js"></script>
</body>
</html>