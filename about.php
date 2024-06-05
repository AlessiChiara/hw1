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
  <link rel="stylesheet" href="style/about.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap"
    rel="stylesheet">


 

</head>

<body id="top">

    <header class="header" data-header>
        <div class="container">
    
          <a href="index.php" class="logo">
            <img src="images/favicon.webp">
    
            <span class="span">Toraryukan Shibu Dojo</span>
          </a>
    
          <nav class="navbar" data-navbar>
    
            <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
              <ion-icon name="close-sharp" aria-hidden="true"></ion-icon>
            </button>
    
            <ul class="navbar-list">
    
              <li>
                <a href="index.php" class="navbar-link" data-nav-link>Home</a>
              </li>
    
              <li>
                <a href="about.php" class="navbar-link" data-nav-link>About Us</a>
              </li>
    
              <li>
                <a href="classes.php" class="navbar-link" data-nav-link>Classes</a>
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
    
    
    <section class="about">
        <div class="row">
            <div class="image">
                <img src="images/about.jpg">
            </div>
            <div class="content">
                <h3>Lo stile Goju – Ryu</h3>
                <p>
                    Il Goju Ryu, unico stile mantenuto tale dalle origini ed unico stile di karate ad essere inserito tra le “arti
                    marziali antiche” del Giappone; attualmente praticato ad Okinawa, in Giappone e nel resto del mondo. Fu fondato dal
                    maestro Kanryo Higahonna con il nome di “Naha-te” (il termine Go-ju fu tratto dal maestro Chojun Miyagi da un
                    passaggio del Kempo Hakku, in un capitolo del Bubishi, che recita: ‘Ho goju don to’, ovvero ‘la legge dell’Universo
                    respira dura e morbida’) ed è uno stile strettamente legato allo Shorei Ryu. In Giappone si diffuse nella regione di
                    Kyōto, grazie all’opera del maestro Gogen Yamaguchi che seguiva il Sensei Chōjun Miyagi.
                    Le contrazioni muscolari, i movimenti lenti e potenti caratteristici di questo stile richiedono grande vigore
                    fisico; il Goju Ryu conserva molte delle peculiarità di un tempo: tra i vari stili è quello che meno si è
                    modernizzato in quanto la sfera del karate-do è rappresentata dall’aspetto di una mano e le competizioni sportive
                    sono viste come il mignolo di essa. Tale stile ha infatti rifiutato lo sviluppo dal punto di vista sportivo,
                    proseguendo su un’impostazione prevalentemente tradizionale e da autodifesa, conservando così le tecniche originali
                    del karate. Il Goju Ryu ha varie scuole o associazioni, come il Meibukan, lo Shodokan, lo Shobukan, il Jundokan, il
                    Seibukai, il Jinbukan, la Goju-kai, il Seigokan, ecc.
                </p>
            </div>
        </div>
    </section>


    <section class="gallery">
        <h1 class="title">Gallery</h1>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/dojo1.jpg">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/dojo3.jpg">
                    </div>
    
                </div>
                <div class="swiper-slide slide">
                    <div class="image"><img src="images/dojo2.jpg">
                    </div>
    
                </div>
                <div class="swiper-slide slide">
                    <div class="image"> <img src="images/gasshuku1.jpg">
                    </div>
    
                </div>
                <div class="swiper-slide slide">
                    <div class="image"> <img src="images/foto-gruppo.jpg">
                    </div>
    
                </div>
                <div class="swiper-slide slide">
                    <div class="image"><img src="images/gasshuku2.jpg">
                    </div>
    
                </div>
                
        </div>
        <div class="swiper-pagination"></div>
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
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
 
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            grabCursor: true,
            spaceBetween:20,
            breakpoints: {
                    550: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }},
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });
    </script>
    
    </body>
    
    </html>