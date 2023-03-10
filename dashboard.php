<?php include_once 'connectdb.php';
require_once 'dbconnect.php';
$query   = "SELECT * FROM tbl_availability";
$results = mysqli_query($conn, $query);
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>reservIIT</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/ffb3959211.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="wrapper">
      <nav>
        <input type="checkbox" id="show-search" />
        <input type="checkbox" id="show-menu" />
        <label for="show-menu" class="menu-icon"
          ><i class="fas fa-bars"></i
        ></label>
        <div class="content">
          <div class="logo"><a href="#">reservIIT</a></div>
          <ul class="links">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li>
              <a href="#" class="desktop-link">Account</a>
              <input type="checkbox" id="show-features" />
              <label for="show-features">Account</label>
              <ul>
                <li><a href="">Account Information</a></li>
                <li><a href="yourreservation.php">Your Reservations</a></li>
                <li><a href="Logout.php">Logout</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="desktop-link">Info</a>
              <input type="checkbox" id="show-services" />
              <label for="show-services">Info</label>
              <ul>
                <li><a href="#faqs">FAQs</a></li>
                <li>
                  <a href="#" class="desktop-link">MSU-IIT Official Site</a>
                  <input type="checkbox" id="show-items" />
                  <label for="show-items">MSU-IIT</label>
                  <ul>
                    <li><a href="https://www.msuiit.edu.ph/">Official Site</a></li>
                    <li><a href="http://x4150my.msuiit.edu.ph/my/getmyiit.php">My IIT</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
        <label for="show-search" class="search-icon"
          ><i class="fas fa-search"></i
        ></label>
        <form action="#" class="search-box">
          <input
            type="text"
            placeholder="Type Something to Search..."
            required
          />
          <button type="submit" class="go-icon">
            <i class="fas fa-long-arrow-alt-right"></i>
          </button>
        </form>
      </nav>
    </div>

    <div style="display:none;" class="account"></div>

    <div class="banner">
      <div class="banner-content">
        <h1 class="title">WELCOME!</h1>
        <div><?php echo $_SESSION['useremail']; ?></div>
        <p>-Finding a place has never been this easy-</p>
        <button class="btn" ><span></span><a href="reservation.php" style="color: white">Reserve now</a> </button>

      </div>
    </div>
    <div class="black-bar"></div>
    <div class="promo-message">
      <h1>reservIIT is designed to make reservation so much easier!</h1>
      <p>
        Don???t have an account yet? <a href="register.php"> <span>Sign up now!</span></a>
      </p>
    </div>

    <!-- IMAGE SLIDER -->
    <section class="img-container">
      <div class="slider">
      <div class="slide active">
        <img src="1.jpg" alt="">
        <div class="info">
          <h2>College Of Business Accountancy Administration</h2>
          <p>A total of 13 MSU-IIT takers have successfully passed the Certified Public Accountant Licensure Exam (CPALE) held on October 10-12, 2021, setting MSU-IIT???s passing rate at 33.33% and 117.84% higher than the national passing rate of 15.3%.</p>
        </div>
      </div>
      <div class="slide">
        <img src="2.jpg" alt="">
        <div class="info">
          <h2>College Of Science And Mathematics</h2>
          <p>The signing of a Special Order on February 15, 1979 marked the start of the operation of the SCHOOL OF SCIENCE AND MATHEMATICS (SSM), with Dr. Remigio G. Tee as its first Dean. The school was later renamed in 1984 as the COLLEGE OF SCIENCE AND MATHEMATICS (CSM).</p>
        </div>
      </div>
      <div class="slide">
        <img src="3.jpg" alt="">
        <div class="info">
          <h2>College Of Engineering And Technology</h2>
          <p>The COET inaugurates its left wing and its COET landmark. It is with delight that Chancellor Tanggol, VC Feliciano Alagao, COET Dean Atty. Edgar Allan Donasco present the new facilities to all IIT constituents.</p>
        </div>
      </div>
      <div class="slide">
        <img src="4.jpg" alt="">
        <div class="info">
          <h2>Prism</h2>
          <p>The PRISM was established as a research center of the College of Science & Mathematics (CSM) on December 18, 2015 envisioned "to generate principles, protocol and products that provide dynamic and innovative solutions to society and the environment.</p>
        </div>
      </div>
      <div class="slide">
        <img src="5.jpg" alt="">
        <div class="info">
          <h2>College Of Computer Studies</h2>
          <p>The College of Computer Studies (CCS) was formally established through Special Order 511 IIT Series of 2002, Implementing Rules and Regulations for BOR Resolution Number 392 Series of 2002 Authorizing the Operationalization of the Information and Communication Technology Center (ICTC) on October 3, 2002.</p>
        </div>
      </div>
      <div class="navigation">
        <i class="fas fa-chevron-left prev-btn"></i>
        <i class="fas fa-chevron-right next-btn"></i>
      </div>
      <div class="navigation-visibility">
        <div class="slide-icon active"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
      </div>
    </div>
    </section>

    <!--image card layout start-->
    <div class="container">
      <!--image row start-->
      <div class="row">
        <!--image card start-->
        <div class="image">
          <img src="MSUIITpic.jpg" alt="" />
          <div class="details">
            <h2>MSU-IIT WEBSITE</h2>
            <img src="logo.png" class="school-logo" />
            <p>
              What are our Mission, Vision, and Goals? What does it take to be and MSU-IITian?
            </p>
            <div class="more">
              <a href="https://www.msuiit.edu.ph/about/" class="read-more">Visit MSU-IIT </a>

            </div>
          </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="MYIITpic.jpg" alt="" />
          <div class="details">
            <h2>My.IIT</h2>
            <img src="logo.png" class="school-logo" />
            <p>
              Sign in with your my.IIT account to enjoy cool privileges
            </p>
            <div class="more">
              <a href="http://x4150my.msuiit.edu.ph/my/v2/index.php" class="read-more">Sign in to my.iit </a>

            </div>
          </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="FAQpic.jpg" alt="" />
          <div id="faqs" class="details">
            <h2>FAQS</h2>
            <img src="logo.png" class="school-logo" />
            <p>
              What is the MSU-System? When is the next SASE?
              Have never ending questions? Click here
            </p>
            <div class="more">
              <a href="https://web.msuiit.edu.ph/faqs/" class="read-more">Ask Us</a>
            </div>
          </div>
        </div>
        <!--image card end-->
      </div>
      <!--image row end-->
    </div>
    <!--image card layout end-->

    <!-- LOGIN FORM -->
    <div class="login-container hidden">

          <label
            for="show"
            class="close-btn fas fa-times"
            title="close"
          ></label>


        </div>
      </div>

      <div class="overlay hidden"></div>
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p id="footer-copyright">?? 2021 MSU-Iligan Institute of Technology
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
