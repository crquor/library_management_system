<?php
    //Including Database configuration file.
    include './includes/config.php';
    //Getting value of "search" variable from "script.js".
    if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
       $book_name= $_POST['search'];
    //Search query.
       $Query= "SELECT innew FROM w_s WHERE ineng LIKE '%$book_name%'";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Query);
    //Creating unordered list to display result.
       echo '
       <table id="list">
       <tr>
          <th>Book ID</th>
          <th>Name of the book</th>
          <th>Image
          <th>Name of Author</th>
          <th>Rack no</th>
          <th>Row no</th>
          <th>Column no</th>
          <th>Availability</th>
       </tr>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
            echo "<td>" . $_RESULT['innew'] "</td>";
       }
       echo '</table>';

           ?>
       <?php
    }
    ?>