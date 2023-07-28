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