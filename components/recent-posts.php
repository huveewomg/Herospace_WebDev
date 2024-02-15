<?php
session_start();
require 'connection.php';

// Hide error messages
error_reporting(E_ERROR | E_PARSE);


//Modify the SQL query based on the criteria
$sql = "SELECT * FROM events ORDER BY date_created ASC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Navbar Component -->
<?php
if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="recent-posts.css" />

<body>
  <div id="banner">
    Banner
  </div>
  </div>
  <div id="main-column">
    <?php

      $rows_per_page = 5; // Set the number of results per page

      $total_rows = mysqli_num_rows($result); // Get the total number of rows

      $num_pages = ceil($total_rows / $rows_per_page); // Calculate the number of pages

      // Get the current page number from URL or use 1 as default
      $current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

      // Modify your original query with LIMIT and OFFSET based on page number
      $offset = ($current_page - 1) * $rows_per_page;
      $sql = "SELECT * FROM events LIMIT $rows_per_page OFFSET $offset";
      $result = $connection->query($sql); // Execute the modified query

      // Display the results with a loop
      while ($row1 = $result->fetch_assoc()) {
        echo "<script>console.log($row1[date_created])</script>";
        echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\">" . $row1['event_name'] . "<br>" . $row1['event_desc'] . "<br>" . $row1['event_req'] . "</div>";
      }

      // Add pagination buttons if there are multiple pages
      if ($num_pages > 1) {
        echo "<div class='pagination'>";
        // Previous button
        if ($current_page > 1) {
          echo "<a href='?page=" . ($current_page - 1) . "'>Previous</a>";
        }
        // Page numbers
        for ($i = 1; $i <= $num_pages; $i++) {
          if ($i == $current_page) {
            echo "<a class='active' href='?page=$i'>$i</a>";
          } else {
            echo "<a href='?page=$i'>$i</a>";
          }
        }
        // Next button
        if ($current_page < $num_pages) {
          echo "<a href='?page=" . ($current_page + 1) . "'>Next</a>";
        }
        echo "</div>";
      }

      ?>

  </div>

  <?php include 'footer.php'; ?>

</body>
</html>