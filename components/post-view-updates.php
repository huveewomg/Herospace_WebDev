<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="post-view.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <div id="container">
    <nav>
      <div id="logo-container">
        <img src="../assets/img/Logo.png" alt="" id="logo" />
      </div>
      <ul>
        <li><a href="#" onclick="window.location='home.php'">Home</a></li>
        <li class="dropdown" onmouseover="hover(this);" onmouseout="out(this);"
          style="position: relative; z-index: 9999;">
          <a href="#">Projects &nbsp;<i class="fa fa-caret-down"></i></a>
          <div class="dd">
            <div id="up_arrow"></div>
            <ul>
              <li><a href="#" onclick="window.location='featured-projects.php'">Featured</a></li>
              <li><a href="#">Recent Posts</a></li>
            </ul>
          </div>
        </li>
        <li><a href="#" onclick="window.location='about-us.php'">About Us</a></li>
        <li><a href="#">Share the Love!</a></li>
      </ul>

      <div id="profile-logo-container">
        <div id="myDropdown" class="dropdown" onclick="toggleDropdown('myDropdown')">
          <span class="material-symbols-outlined md-36" id="profile-logo">
            person
          </span>
          <div class="dropdown-content">
            <li onclick="window.location = 'profile.php'">Profile</li>
            <li>Logout</li>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <script>
    function toggleDropdown(dropdownId) {
      var dropdown = document.getElementById(dropdownId);
      dropdown.classList.toggle("active");
    }
  </script>
</head>

<body>
  <div id="post-view-navbar">
    <ul>
      <li><a href="#" onclick="window.location='post-view-overview.php'">Overview</a></li>
      <li><a class="active" href="#" onclick="window.location='post-view-updates.php'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php'">Discussion</a></li>
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