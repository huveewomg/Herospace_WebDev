<?php
session_start();

//connection
require 'connection.php';

//hide error messages
error_reporting(E_ERROR | E_PARSE);
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

<link rel="stylesheet" href="about-us.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&display=swap" rel="stylesheet">


  <body>
  <div class="scrollFade">
    <div id="front-shape">
        <p id="about-us"><strong>About Us</strong></p>
        <img src="../assets/img/Logo.png" alt="" id="front-logo">
      </div>
      
      <div id="awards">
        <img src="../assets/img/award7.jpg" alt="">
        <img src="../assets/img/award3.png" alt="">
        <img src="../assets/img/award4.png" alt="">
        <img src="../assets/img/award5.png" alt="">
        <img src="../assets/img/award6.png" alt="">
      </div>
    
      <div id="slogan">
        Allowing anyone to be a hero with one click
      </div>
    </div>
    

    <div class="scrollFade">
      <div id="introduction">
        <h1 style="text-align: center;">The World Needs <span style="color: blue;">You</span></h1>
        <p>Helping others in Malaysia has never been easier. Herospace empowers you to make a difference with just a few clicks. This revolutionary platform connects passionate individuals like you with local communities in need, removing all the unnecessary barriers to volunteering. <br> <br>
        No more sifting through endless websites or filling out lengthy forms. Simply sign up on Herospace, browse through a diverse range of meaningful projects, and choose one that sparks your passion. From cleaning up pristine beaches to teaching digital skills to underprivileged children, there's an opportunity for everyone. ><br>
        <ul>
          <li>Discover events across various states</li>
          <li>Connect directly with organizers and fellow volunteers.</li>
          <li>Join a vibrant network of passionate individuals making a difference.</li>
        </ul>
        </p>
        <h1 style='text-align:center'>Sign up, choose your cause, and start making a difference today!</h1>
      </div>
    </div>
    
    <div class="scrollFade">
      <div id="front-last-row">
        <div id="column-right">
          <h1 style='text-align:center'>OUR STORY </h1><br> <br>
        <p>
        In the heart of bustling Kuala Lumpur, Herospace sprouted from a chance encounter at a mamak stall. Alex, a tech whiz with a restless spirit, yearned to leave a mark beyond his coding projects. Timothy, a passionate social worker, felt a growing frustration with the disconnect between those who had and those who didn't. Over steaming plates of roti canai, their ambitions collided, sparking Herospace - a platform connecting willing hands with communities in need. 
        <br> <br> Starting small, their first project saw tech-savvy students teaching digital literacy to rural villagers. The success resonated, attracting more volunteers and organizations. From mangrove cleanups to food drives for the elderly, Herospace's events grew in number and impact. Today, with over 500 successful events under their belt, they've touched the lives of more than 10,000 Malaysians, proving that even amidst towering skyscrapers, the spirit of community thrives. Herospace's story is far from over, but its impact is already etched in the smiles of those they've helped, a testament to the power of collective action rooted in local soil.</p>
        </div>

        <div id="column-left">
          <!-- World -->
          <img src="../assets/img/pclong.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="scrollFade">
      <div id="board">
        <strong>BOARD OF DIRECTORS</strong>
        <div>
          <div id="director-img-left">
            <a href="https://github.com/zzSleepyCoderzz"><img id= timpfp src="https://avatars.githubusercontent.com/u/73248416?v=4" alt=""></a>
          </div>
          <div id="self-introduction-right">Lead Programmer</div>
        </div>

        <div>
          <div id="director-img-right">
          <a href="https://github.com/huveewomg"><img id="wongpfp" src="../assets/img/test22.png" alt=""></a>
          </div>
          <div id="self-introduction-left">demo text</div>
        </div>
      </div>
        <div>
        <div id="director-img-left" style='margin-left:5vw'>
            <a href="https://github.com/spacemxchi"><img id="shanpfp" src="../assets/img/profile.png" alt=""></a>
          </div>
          <div id="self-introduction-right" style='margin-right:5vw ; width:76.5%'>test</div>
        </div>

        <div>
          <div id="director-img-right" style='margin-right:5vw'>
          <a href="https://github.com/cookspaghetti"><img id="alexpfp" src="../assets/img/profile.png" alt=""></a>
          </div>
            <div id="self-introduction-left" style='margin-left:5vw ; width:76.5%'>UI/UX Design</div>
          </div>
        <footer>
        <?php include 'footer.php'; ?>
      </footer>
      </div>



    <script src="homescript.js"></script>
  </body>


</html>
