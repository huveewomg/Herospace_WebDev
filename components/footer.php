<style>
  body {
    margin: 0;
    overflow-x: hidden;
    display: flex;
    
    /* makes the footer stick to the bottom of the page */
    flex-direction: column;
    min-height: 100vh;
  }

  .footer {
    background: #000;
    padding: 30px 0px;
    font-family: 'Play', sans-serif;
    text-align: center;
    color: gray;
    font-size: 0.8em;
    flex-shrink: 0;
  }

  .footer .row {
    margin: 1% 0%;
    padding: 0.6% 0%;
  }

  .footer .row a {
    text-decoration: none;
    color: gray;
    transition: 0.5s;
  }

  .footer .row a:hover {
    color: #fff;
  }

  .footer .row ul {
    width: 100%;
  }

  .footer .row ul li {
    display: inline-block;
    margin: 0px 30px;
  }

  .footer .row a i {
    font-size: 2em;
    margin: 0% 1%;
  }

  @media (max-width: 720px) {
    .footer {
      text-align: left;
      padding: 5%;
    }

    .footer .row ul li {
      display: block;
      margin: 10px 0px;
      text-align: left;
    }

    .footer .row a i {
      margin: 0% 3%;
    }
  }
</style>


<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
</head>

<body>
  <footer>
    <div class="footer">
      <div class="row">
        <a href="#">FACEBOOK</i></a>
        <a href="#">INSTAGRAM</i></a>
        <a href="#">YOUTUBE</i></a>
        <a href="#">TWITTER</i></a>
      </div>

      <div class="row">
        <ul>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Career</a></li>
        </ul>
      </div>

      <div class="row">
        HEROSPACE Copyright © 2023 HEROSPACE - All rights reserved || Designed By: Tim
      </div>
    </div>
  </footer>