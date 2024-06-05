<?php
    require_once 'assests/connect.php';
    session_start();
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
  } else {
      header("Location: login_form.php");
      exit();
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A.P.S. Toraryukan Shibu Dojo</title>

  
  <link rel="shortcut icon" href="images/favicon.webp">

  
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  

 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap"
    rel="stylesheet">

 
  <link rel="preload" as="image" href="images/hero-banner.png">
  <link rel="preload" as="image" href="images/hero-circle-one.png">
  <link rel="preload" as="image" href="images/hero-circle-two.png">
 

</head>

<body id="top">
  


  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="images/favicon.webp">

        <span class="span">Toraryukan Shibu Dojo</span>
      </a>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-sharp" aria-hidden="true"></ion-icon>
        </button>

        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li>
            <a href="#class" class="navbar-link" data-nav-link>Classes</a>
          </li>

          <li>
            <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
          </li>

        </ul>

      </nav>
      
      <a href="profile.php" class="profile-icon" aria-label="Profile">
        <ion-icon name="person-circle-outline"></ion-icon>
      </a>

      <a href="logout.php" class="btn btn-secondary">Logout</a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </button>

    </div>
  </header>





  <main>
    <article>

    

      <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero" data-section
        style="background-image: url('images/hero-bg.png')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">
              <strong class="strong">Original</strong>Karate
            </p>

            <h1 class="h1 hero-title">Allenati con noi</h1>

            <p class="section-text">
              Shibu Dojo International Okinawan Goju-Ryu Karate-Do Federation
            </p>

            <a href="classes.php" class="btn btn-primary">Get Started</a>

          </div>

          <div class="hero-banner">

            <img src="images/hero-banner.png" width="660" height="753" alt="hero banner" class="w-100">

            <img src="images/hero-circle-one.png" width="666" height="666" aria-hidden="true" alt=""
              class="circle circle-1">
            <img src="images/hero-circle-two.png" width="666" height="666" aria-hidden="true" alt=""
              class="circle circle-2">

    

          </div>

        </div>
      </section>





      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <div class="about-banner has-after">
            <img src="images/about-banner.png" width="660" height="648" loading="lazy" alt="about banner"
              class="w-100">

            <img src="images/about-circle-one.png" width="660" height="534" loading="lazy" aria-hidden="true"
              alt="" class="circle circle-1">
            <img src="images/about-circle-two.png" width="660" height="534" loading="lazy" aria-hidden="true"
              alt="" class="circle circle-2">


          </div>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">Benvenuto nel nostro Dojo!</h2>

            <p class="section-text">
              Sulla via delle arti marziali, il ruolo di chi ci spinge e ci motiva è molto importante.
              Esempi preziosi definiscono il nostro sviluppo e la nostra forza. È esattamente questo potere che condividiamo con i nostri studenti.

            </p>

            <p class="section-text">
              Il ruolo delle persone che ci danno motivazione è molto importante nel percorso delle arti marziali. 
              Esempi preziosi definiscono il nostro sviluppo e la nostra forza. Proprio questo potere va condiviso, che poi condividiamo con i nostri studenti.
            </p>

            <div class="wrapper">

              <div class="about-coach">

                <figure class="coach-avatar">
                  <img src="images/about-coach.jpg" width="65" height="65" loading="lazy" alt="Trainer">
                </figure>

                <div>
                  <h3 class="h3 coach-name">Giuseppe Magri'</h3>

                  <p class="coach-title">Il nostro maestro</p>
                </div>

              </div>

              <a href="about.php" class="btn btn-primary">Explore More</a>

            </div>

          </div>

        </div>
      </section>






      <section class="section video" aria-label="video">
      <div class="container">

      <div class="video-card has-before">
      <video class="background-video" autoplay muted loop>
        <source src="images/cinematic.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>

      

      </div>

    </div>
    </section>








      <section class="section class bg-dark has-bg-image" id="class" aria-label="class"
        style="background-image: url('images/classes-bg.png')">
        <div class="container">

          <p class="section-subtitle">Our Classes</p>

          <h2 class="h2 section-title text-center">Scopri le nostre classi e la loro capienza</h2>

          <ul class="class-list has-scrollbar">

          </ul>

        </div>
      </section>









  <footer class="footer" id="contact">

    <div class="section footer-top bg-dark has-bg-image" style="background-image: url('images/footer-bg.png')">
      <div class="container">

        <div class="footer-brand">

          <p class="footer-brand-text">
            Orari di apertura:
          </p>

          <div class="wrapper">

            <img src="images/footer-clock.png" width="34" height="34" loading="lazy" alt="Clock">

            <ul class="footer-brand-list">

              <li>
                <p class="footer-brand-title">Lunedi - venerdi</p>

                <p>7:00Am - 10:00Pm</p>
              </li>

              <li>
                <p class="footer-brand-title">Sabato</p>

                <p>7:00Am - 2:00Pm</p>
              </li>

            </ul>

          </div>

        </div>


        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Contact Us</p>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="location" aria-hidden="true"></ion-icon>
            </div>

            <address class="address footer-link">
            Via Antonino Giuffrida, 2, 95045 Misterbianco CT
            </address>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="call" aria-hidden="true"></ion-icon>
            </div>

            <div>
              <a href="tel:18001213637" class="footer-link">1800-121-3637</a>

              <a href="tel:+915552348765" class="footer-link">+91 555 234-8765</a>
            </div>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="mail" aria-hidden="true"></ion-icon>
            </div>

            <div>
              <a href="asdtoraryukan@hotmail.com" class="footer-link">asdtoraryukan@hotmail.com</a>

             
            </div>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Our Newsletter</p>
          </li>

          <li>
            <form action="" class="footer-form">
              <input type="email" name="email_address" aria-label="email" placeholder="Email Address" required
                class="input-field">

              <button type="submit" class="btn btn-primary" aria-label="Submit">
                <ion-icon name="chevron-forward-sharp" aria-hidden="true"></ion-icon>
              </button>
            </form>
          </li>

          <li>
            <ul class="social-list">

              <li>
                <a href="https://www.facebook.com/toraryukan.dojo?locale=it_IT" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="https://www.instagram.com/toraryukandojo/" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; toraryukan dojo. All Rights Reserved By Chiara Alessi
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link has-before">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link has-before">Terms & Condition</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up-sharp" aria-hidden="true"></ion-icon>
  </a>





  
  <script src="js/index.js" defer></script>
  <script src="js/corsi.js" defer></script>


  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  


</body>

</html>