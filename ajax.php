<?php
    //Including Database configuration file.
    include './includes/db.php';
    //Getting value of "search" variable from "script.js".
    if (isset($_POST['search'])) {
    // Every new word typed in the search box is assigned to book_name variable 
       $book_name= $_POST['search'];
    //Search query.
       $Query= "SELECT id, book_name,book_image, Author, shelf, row_no, column_no FROM books WHERE book_name LIKE '%$book_name%'";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Query);
    //Creating unordered list to display result.
       echo '
       <table id="list">
       <tr>
          <th>Book ID</th>
          <th>Name of the book</th>
          <th>Image</th>
          <th>Name of Author</th>
          <th>Shelf no</th>
          <th>Row no</th>
          <th>Column no</th>
       </tr>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
         echo "<tr>";
            echo "<td>" . $Result['id'] . "</td>";
            echo "<td>" . $Result['book_name'] . "</td>";
            echo "<td>" . "<img src=". $Result['book_image'].' width=80px height="120px">' . "</td>";
            echo "<td>" . $Result['Author'] . "</td>";
            echo "<td>" . $Result['shelf'] . "</td>";
            echo "<td>" . $Result['row_no'] . "</td>";
            echo "<td>" . $Result['column_no'] . "</td>";
            echo "</tr>";
       }
       echo '</table>';

           ?>
       <?php
    }
    ?>