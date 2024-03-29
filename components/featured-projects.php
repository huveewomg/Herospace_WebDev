<?php
session_start();
require 'connection.php';

// Hide error messages
error_reporting(E_ERROR | E_PARSE);

// Get the selected state from the dropdown
$selectedState = isset($_GET['state']) ? $_GET['state'] : '';

//Modify the SQL query based on the criteria
$sql = "SELECT * FROM events";
if (!empty($_GET['state']) || !empty($_GET['date']) || ($_GET['fee'] == 0 || $_GET['fee'] != null)) {
  $state = $_GET['state'];
  $date = $_GET['date'];
  $fee = $_GET['fee'];

  // Default filter is by State, can filter by fee and date also
  // Issue faced is that the query wont launch if the other 2 fields are empty, but if only 1 field is not empty then the sql query wont run
  if (!empty($_GET['state']) && !empty($_GET['date']) && !empty($_GET['fee'])) {
    $sql .= " WHERE event_state = '$state' AND event_date = '$date' AND event_fee = '$fee'";
  } else if (!empty($_GET['state']) && !empty($_GET['date'])) {
    $sql .= " WHERE event_state = '$state' AND event_date = '$date'";
  } else if (!empty($_GET['state']) && ($_GET['fee'] == 0 || $_GET['fee'] != null)) {
    $sql .= " WHERE event_state = '$state' AND event_fee = '$fee'";
  } else if (!empty($_GET['date']) && ($_GET['fee'] == 0 || $_GET['fee'] != null)) {
    $sql .= " WHERE event_date = '$date' AND event_fee = '$fee'";
  } else if (!empty($_GET['state'])) {
    $sql .= " WHERE event_state = '$state'";
  } else if (!empty($_GET['date'])) {
    $sql .= " WHERE event_date = '$date'";
  }
  // Need to check if fee is 0, not null or empty then only filter by price
  else if (($_GET['fee'] == 0 || $_GET['fee'] != null) || !empty($_GET['fee'])) {
    $sql .= " WHERE event_fee = '$fee'";
  }
}

$result = $connection->query($sql);
?>

<script>
  function clearForm() {
    window.location.href = 'featured-projects.php';
  }
</script>

<!DOCTYPE html>
<html lang="en">
<!-- Navbar Component -->
<?php
if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="featured-projects.css" />
<link href="https://fonts.googleapis.com/css2?family=Alice&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap" rel="stylesheet">


<body>
  <div id="banner">
    <!-- <img src="../assets/img/banner.webp" alt=""> -->
  </div>
  <div id="column-left">
    <div id="sidebar">
      <!-- Dropdown select -->
      <div class='filter-txt'>Filter By: </div>
      <form id="filterForm" action="featured-projects.php">
        <div class='filter-txt'>Date</div>
        <input type="date" name="date" id="sidebar-box">
        <div class='filter-txt'>Participation Fee (RM)</div>
        <input type="number" name="fee" id="sidebar-box">
        <div class='filter-txt'>State</div>
        <select id="dropdown" name="state" style="border-width: 2px;border-color: black; margin-bottom:2vh;">
          <?php
          $options = array('', 'Kedah', 'Kelantan', 'Malacca', 'Negeri Sembilan', 'Pahang', 'Penang', 'Perak', 'Perlis', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Johor', 'Kuala Lumpur', 'Labuan', 'Putrajaya');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" ' . ($selected_option === $option ? 'selected' : '') . '>' . $option . '</option>';
          }

          ?>
        </select>
        <button type="submit" id='btn'>Filter</button>
        <button type="button" onclick="clearForm()" id='btn'>Reset</button>
      </form>

    </div>
  </div>
  <div>
    <?php

    $rows_per_page = 5; // Set the number of results per page

    if (mysqli_num_rows($result) == 0) {
      echo "<div id=\"main-column0\"><div class=\"center\"><div class=\"article-card\"><div class=\"content\"><p class=\"title\">No events found</p></div></div></div>";
      return;
    } else {
      $total_rows = mysqli_num_rows($result);
    }

    $num_pages = ceil($total_rows / $rows_per_page); // Calculate the number of pages

    // Get the current page number from URL or use 1 as default
    $current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    // Check if total rows is less than 5
    if ($total_rows > 5) {
      $offset = ($current_page - 1) * $rows_per_page;
      $sql = "SELECT * FROM events LIMIT $rows_per_page OFFSET $offset";
      $result = $connection->query($sql); // Execute the modified query
    }
    // Modify original query with LIMIT and OFFSET based on page number


    // Display the results with a loop
    while ($row1 = $result->fetch_assoc()) {
      echo "<div id=\"main-column0\"><div class=\"center\"><div class=\"article-card scrollFade\" onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\"><div class=\"content\"><p class=\"date\">Date: $row1[event_date]</p><p class=\"title\">$row1[event_name]</p></div><img src=\"../assets/event-images/$row1[event_name]/$row1[event_name]0.png\" alt=\"article-cover\" /></div></div>";
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
          echo "<a class='active' href='?page=$i?date=&fee=&state='>$i</a>";
        } else {
          echo "<a href='?page=$i?date=&fee=&state='>$i</a>";
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
  <script src="homescript.js"></script>
  <footer style='margin-top:-35vh'>
    <?php include 'footer.php'; ?>
  </footer>
</body>


</html>