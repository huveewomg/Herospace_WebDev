<?php
session_start();

//connection
require 'connection.php';

$event_id = $_GET['event_id'];
$result = mysqli_query($connection, "SELECT * FROM events WHERE event_id = '$event_id'");
$event_details = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<!-- Navbar Component -->
<?php if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'charity') {
  include 'admin navbar.php';
} else {
  include 'navbar.php';
} ?>
<link rel="stylesheet" href="post-view-overview.css" />
<link href="https://fonts.googleapis.com/css2?family=Alice&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Roboto:wght@300;400&display=swap" rel="stylesheet">


<body>
  <div id="post-view-navbar" style="margin-bottom: 10vh;">
    <ul>
      <li><a class="active" href="#" onclick="window.location='post-view-overview.php?event_id=<?php echo $event_id; ?>'">Overview</a></li>
      <li><a href="#" onclick="window.location='post-view-updates.php?event_id=<?php echo $event_id; ?>'">Updates</a></li>
      <li><a href="#" onclick="window.location='post-view-discussions.php?event_id=<?php echo $event_id; ?>'">Discussion</a></li>
    </ul>
  </div>
  <h1 id="event-name"><?php echo $event_details['event_name'] ?></h1>
  <?php
  if ($_SESSION['status'] == 'charity' && $event_details['charityid'] == $_SESSION['email']) {
    echo "<a href='create-updates.php?event_id=$event_id'><button id='edit-event'>Update Event</button></a>";
  } else if ($_SESSION['status'] == 'volunteer') {
    echo "<a href='";
    echo $event_details['signup_link'];
    echo "'target=\"_blank\"><button id=\"join-event\" on>Join Event</button></a>";
  } else if ($_SESSION['status'] == 'admin') {
    echo "<a href='delete-event.php?event_id=$event_id'><button id='delete-event'>Delete Event</button></a>";
  }
  ?>
  <div id="row-1">
    <div id="event-details">
      <p id="event-details-title"> EVENT DETAILS</p>
      <p class="event-info"><?php echo "Location: " . $event_details['event_state'] ?></p> <br>
      <p class="event-info"><?php echo "Organiser Email: " . $event_details['charityid'] ?></p> <br>
      <p class="event-info"><?php echo "Date: " . $event_details['event_date'] ?></p> <br>
      <p class="event-info"><?php echo "Start Time: " . $event_details['start_time'] ?></p> <br>
      <p class="event-info"><?php echo "End Time: " . $event_details['end_time'] ?></p> <br>
      <p class="event-info"><?php echo "Participation Fee: RM " . $event_details['event_fee'] ?></p>
    </div>
    <div id="event-description">
      <p id="event-description-title"> EVENT DESCRIPTION</p>
      <p><?php echo $event_details['event_desc'] ?></p>
    </div>
  </div>
  <h1 id='event-imagetxt'>Event Image</h1>
  <div id="row-2" class="flex-container">
    <div class="event-snipshot">
      <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>0.png" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
    </div>
    <div class="event-snipshot">
      <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>1.png" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
    </div>
    <div class="event-snipshot">
      <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>2.png" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
    </div>
  </div>


  <div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

      <div class="mySlides">
        <div class="numbertext">1 / 3</div>
        <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>0.png" style="width:100%">
      </div>

      <div class="mySlides">
        <div class="numbertext">2 / 3</div>
        <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>1.png" style="width:100%">
      </div>

      <div class="mySlides">
        <div class="numbertext">3 / 3</div>
        <img src="../assets/event-images/<?php echo $event_details['event_name']; ?>/<?php echo $event_details['event_name']; ?>2.png" style="width:100%">
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
  </div>

  <h1 id='requirement-txt'>Requirements</h1>
  <div id="row-3">
    <div id="requirements">
      <p><?php echo $event_details['event_req'] ?></p>
    </div>
  </div>


  <!-- script for lightbox -->
  <Script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml12');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({
        loop: true
      })
      .add({
        targets: '.ml12 .letter',
        translateX: [40, 0],
        translateZ: 0,
        opacity: [0, 1],
        easing: "easeOutExpo",
        duration: 1200,
        delay: (el, i) => 500 + 40 * i
      }).add({
        targets: '.ml12 .letter',
        translateX: [0, -30],
        opacity: [1, 0],
        easing: "easeInExpo",
        duration: 1100,
        delay: (el, i) => 5000 + 30 * i
      });


    ////////////////////////////////////////////////////////////////////
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </Script>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>
</body>

</html>