<?php
session_start();

//connection
require 'connection.php';

$event_name = $_GET['event_name'];
$result = mysqli_query($connection, "SELECT * FROM events WHERE event_name = '$event_name'");
$event_details = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="post-view.css" />

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php?event_name=<?php echo $event_name;?>'">Overview</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-updates.php?event_name=<?php echo $event_name;?>'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php?event_name=<?php echo $event_name;?>'">Discussion</a></li>
    </ul>
  </div>

  <div class="uk-container uk-padding">
    <div class="uk-timeline">
        <div class="uk-timeline-item">
            <div class="uk-timeline-icon">
                <span class="uk-badge"><span uk-icon="check"></span></span>
            </div>
            <div class="uk-timeline-content">
                <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <h3 class="uk-card-title"><time datetime="2020-07-08">July 8</time></h3>
                            <span class="uk-label uk-label-success uk-margin-auto-left">Feature</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
											<p class="uk-text-success">Fully responsive timeline you can add to your UIkit 3 project
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-timeline-item">
            <div class="uk-timeline-icon">
                <span class="uk-badge"><span uk-icon="check"></span></span>
            </div>
            <div class="uk-timeline-content">
                <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <h3 class="uk-card-title"><time datetime="2020-07-07">July 7</time></h3>
                            <span class="uk-label uk-label-warning uk-margin-auto-left">Test</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
                    </div>
                </div>
            </div>
        </div>
				<div class="uk-timeline-item">
            <div class="uk-timeline-icon">
                <span class="uk-badge"><span uk-icon="check"></span></span>
            </div>
            <div class="uk-timeline-content">
                <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <h3 class="uk-card-title"><time datetime="2020-07-06">July 6</time></h3>
                            <span class="uk-label uk-label-danger uk-margin-auto-left">Fix</span>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
                    </div>
                </div>
								<a href="#"><span class="uk-margin-small-right" uk-icon="triangle-down"></span>Load more</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>