<?php
session_start();
require 'connection.php';

// Hide error messages
error_reporting(E_ERROR | E_PARSE);

// Get the selected state from the dropdown
$selectedState = isset($_GET['state']) ? $_GET['state'] : '';

// Get the selected option for sorting
$selectedOption = isset($_GET['sort']) ? $_GET['sort'] : '';


//Modify the SQL query based on the criteria
$sql = "SELECT * FROM events";
if (!empty($_GET['state']) && !empty($_GET['date']) && !empty($_GET['fee'])) {
  $state = $_GET['state'];
  $date = $_GET['date'];
  $fee = $_GET['fee'];
  $sql .= " WHERE event_state = '$state' AND event_date = '$date' AND event_fee = '$fee'";
  if (!empty($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort == 'latest') {
      $sql .= " ORDER BY event_date DESC";
    } else if ($sort == 'most_activity') {
      // $sql .= " ORDER BY event_participant DESC";
    }
  }
}
$result = $connection->query($sql);
// Execute the SQL query
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
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="featured-projects.css" />

<body>
  <div id="banner">
    Banner
  </div>
  <div id="column-left">
    <div id="sidebar">
      <!-- Dropdown select -->
      <div>Filter By</div>
      <form id="filterForm" action="">
        <input type="text" name="sort" value="<?php echo $_GET['sort']; ?>" hidden>
        <div>Date</div>
        <input type="date" name="date" id="">
        <div>Participation Fee</div>
        <input type="text" name="fee" id="">
        <div>State</div>
        <select id="dropdown" name="state" style="border-width: 2px;border-color: black; margin-bottom:2vh;">
          <?php
          $options = array('Kedah', 'Kelantan', 'Malacca', 'Negeri Sembilan', 'Pahang', 'Penang', 'Perak', 'Perlis', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Johor', 'Kuala Lumpur', 'Labuan', 'Putrajaya');

          // Generate options dynamically
          foreach ($options as $option) {
            echo '<option value="' . $option . '" ' . ($selected_option === $option ? 'selected' : '') . '>' . $option . '</option>';
          }

          ?>
        </select>
        <button type="submit">Filter</button>
        <button type="button" onclick="clearForm()">Reset</button>
      </form>

    </div>
  </div>
  <div id="column-right">
    <div id="filter">Sort By
      <select onchange="location = this.value;">
        <option value="featured-projects.php?sort=latest" <?php echo ($selectedOption == 'latest') ? 'selected' : ''; ?>>Latest</option>
        <option value="featured-projects.php?sort=most_activity" <?php echo ($selectedOption == 'most_activity') ? 'selected' : ''; ?>>Most Activity</option>
      </select>
    </div>
    <?php while ($row1 = $result->fetch_assoc()) {
      echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_id=$row1[event_id]'\">" . $row1['event_name'] . "<br>" . $row1['event_desc'] . "<br>" . $row1['event_req'] . "</div>";
    }
    ?>
  </div>
</body>

</html>