<?php
session_start();
require 'connection.php';

// Hide error messages
error_reporting(E_ERROR | E_PARSE);

// Get the selected state from the dropdown
$selectedState = isset($_GET['state']) ? $_GET['state'] : '';

// Get the selected option for sorting
$selectedOption = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM events";
if (!empty($_GET["events"])) {
  $state = $_GET['state'];
    $sql .= " WHERE event_state = '$state'";
}
$result = $connection->query($sql);
// Execute the SQL query
$result = $connection->query($sql);
?>

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
      <form action="filter-items.php">
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
      echo "<div class='events scrollFade' onclick=\"window.location='post-view-overview.php?event_name=$row1[event_name]'\">" . $row1['event_name'] . "<br>" . $row1['event_desc'] . "<br>" . $row1['event_req'] . "</div>";
    }
    ?>
  </div>
</body>

</html>