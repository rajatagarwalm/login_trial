<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
    body, html {
      height: 100%;
      color: #777;
      line-height: 1.8;
    }
    
    /* Create a Parallax Effect */
    .bgimg-1, .bgimg-2, .bgimg-3 {
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    
    /* First image (Logo. Full height) */
    .bgimg-1 {
      background-image: url('https://www.w3schools.com/w3images/parallax1.jpg');
      min-height: 100%;
    }
    
    /* Second image (Portfolio) */
    .bgimg-2 {
      background-image: url("https://www.w3schools.com/w3images/p1.jpg");
      min-height: 400px;
    }
    
    /* Third image (Contact) */
    .bgimg-3 {
      background-image: url("https://www.w3schools.com/w3css/img_snow_wide.jpg");
      min-height: 400px;
    }
    
    .w3-wide {letter-spacing: 10px;}
    .w3-hover-opacity {cursor: pointer;}
    
    /* Turn off parallax scrolling for tablets and phones */
    @media only screen and (max-device-width: 1600px) {
      .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
        min-height: 400px;
      }
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: static;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
      display: block; 
    }
    .footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}
 
.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}
        
        .footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}




  </style>
</head>
<body>
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar" id="myNavbar">
      <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
        <i class="fa fa-bars" ></i>
      </a>
      <a href="#home" class="w3-bar-item w3-button">HOME</a>
      <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
      <a href="https://rajatagawralm.github.io/Resume" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
      <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-search"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small">Welcome <?php echo $fetch_info['name'] ?></a>
      <a href="logout-user.php" class="w3-bar-item w3-button w3-hide-small w3-right" >LOGOUT</a>
      <div class="dropdown w3-bar-item w3-button w3-hide-small w3-right">
        <span class="btn btn-light">LISTS</span>
        <div class="dropdown-content">
            <button type="button" class="btn btn-light"><a href="./booklistafter.php">MyBookList</a></button>
            <button type="button" class="btn btn-light"><a href="./movielistafter.php">MyMovieList</a></button>
        </div>
      </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
      <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
      <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()" >PORTFOLIO</a>
      <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()" >CONTACT</a>
      <div class="dropdown">
        <a class="w3-bar-item w3-button" onclick="toggleFunction()">LISTS<a>
        <div class="dropdown-content">
            <button type="button" class="btn btn-light"><a href="./booklistafter.php">MyBookList</a></button>
            <button type="button" class="btn btn-light"><a href="./movielistafter.php">MyMovieList</a></button>
        </div>
      </div><br>
      <div class="dropdown">
        <a class="w3-bar-item w3-button" onclick="toggleFunction()" >JOIN</a>
        <div class="dropdown-content">
            <button type="button" class="btn btn-light"><a href="./signup-user.php">Register</a></button>
            <button type="button" class="btn btn-light"><a href="./login-user.php">Login</a></button>
        </div>
      </div>
      <a href="#" class="w3-bar-item w3-button">SEARCH</a>
    </div>
  </div>

  <!-- First Parallax Image with Logo Text -->
  <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
      <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MY <span class="w3-hide-small">WEBSITE</span> LOGO</span>
    </div>
  </div>

  <!-- Container (About Section) -->
  <div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">ABOUT ME</h3>
    <p class="w3-center"><em>I love photography</em></p>
    <p>We have created a fictional "personal" website/blog, and our fictional character is a hobby photographer. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
      qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <div class="w3-row">
      <div class="w3-col m6 w3-center w3-padding-large">
        <p><b><i class="fa fa-user w3-margin-right"></i>My Name</b></p><br>
        <img src="/w3images/avatar_hat.jpg" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me" width="500" height="333">
      </div>

      <!-- Hide this text on small devices -->
      <div class="w3-col m6 w3-hide-small w3-padding-large">
        <p>Welcome to my website. I am lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
    <p class="w3-large w3-center w3-padding-16">Im really good at:</p>
    <p class="w3-wide"><i class="fa fa-camera"></i>Photography</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:90%">90%</div>
    </div>
    <p class="w3-wide"><i class="fa fa-laptop"></i>Web Design</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:85%">85%</div>
    </div>
    <p class="w3-wide"><i class="fa fa-photo"></i>Photoshop</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:75%">75%</div>
    </div>
  </div>

  <div class="w3-row w3-center w3-dark-grey w3-padding-16">
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">14+</span><br>
      Partners
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">55+</span><br>
      Projects Done
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">89+</span><br>
      Happy Clients
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">150+</span><br>
      Meetings
    </div>
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption" class="w3-opacity w3-large"></p>
    </div>
  </div>

  <!-- Third Parallax Image with Portfolio Text -->
  <div class="bgimg-3 w3-display-container w3-opacity-min">
    <div class="w3-display-middle">
      <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
    </div>
  </div>

  <!-- Container (Contact Section) -->
  <div class="w3-content w3-container w3-padding-64" id="contact">
    <h3 class="w3-center">I'd love your feedback!</h3>

    <div class="w3-row w3-padding-32 w3-section">
      <div class="w3-col m4 w3-container">
        <img src="http://jcimedia.com/wp-content/themes/miami/assets/images/demo/folio4.jpg" class="w3-image w3-round" style="width:100%">
      </div>
      <div class="w3-col m8 w3-panel">
        <div class="w3-large w3-margin-bottom">
          <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Chicago, US<br>
          <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +00 151515<br>
          <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: mail@mail.com<br>
        </div>
        <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note:</p>
        <form>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-right w3-section" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="footer-dark" style="padding: 50px 0; color:#f0f9ff; background-color:#282d32;">
    <footer>
      <a href="#home" class="w3-button w3-light-grey" style="float: right;" ><i class="fa fa-arrow-up w3-margin-right"></i></a>
        <div class="container"style="text-align: center;">
            <div class="row">
                <div class="col-sm-6 col-md-2 item">
                    <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;" >Services</h3>
                    <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0; ">
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Web design</a></li>
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Development</a></li>
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2 item">
                    <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">About</h3>
                    <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0;">
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Company</a></li>
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Team</a></li>
                        <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="#">Careers</a></li>
                        
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2 item">
                  <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">Join Us</h3>
                  <ul style="padding:0; list-style:none; line-height:1.6; font-size:14px; margin-bottom:0;">
                      <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="./signup-user.php">Sign-up</a></li>
                      <li><a style="color:inherit; text-decoration:none; opacity:0.6; " href="./login-user.php">Sign-in</a></li>
                  </ul>
              </div>
                <div class="col-md-6 item text">
                    <h3 style="margin-top:0; margin-bottom:12px; font-weight:bold; font-size:16px;">Contact Us</h3>
                    <p><b>Address:</b> B-19 Anand Nagar, Makrana<br>Nagaur, Rajasthan<br><b>Website:</b><a href="#"> www.idearoute.com</a></p>
                </div>
                <div class="col item social">
                  <p style="text-align: center;"><img src="./img/logo.jpeg" width="100px" height="100px" style="border-radius: 50px ;"></p><br>
                  <div class="w3-xlarge w3-section">
                    <i class="fa fa-facebook-official w3-hover-opacity"></i>
                    <i class="fa fa-instagram w3-hover-opacity"></i>
                    <i class="fa fa-snapchat w3-hover-opacity"></i>
                    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                    <i class="fa fa-twitter w3-hover-opacity"></i>
                    <i class="fa fa-linkedin w3-hover-opacity"></i>
                  </div>
                </div>
            </div>
            <p class="copyright">IdeaRoute ?? 2018</p>
        </div>
    </footer>
  </div> 
  
  <script>

  // Change style of navbar on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
        var navbar = document.getElementById("myNavbar");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
        } else {
            navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
        }
    }
    function toggleFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else {
          x.className = x.className.replace(" w3-show", "");
      }
    }
  </script> 
</body>
</html>