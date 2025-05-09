<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Movie library to collect your favorite films"
    />
    <title>Logoipsum - Movie Library</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="./assets/images/logo.png" alt="Logo" class="logo-img" />
      </div>
      <nav id="nav-menu">
        <a href="#">HOME</a>
        <a href="#">OUR SCREENS</a>
        <a href="#">SCHEDULE</a>
        <a href="#">MOVIE LIBRARY</a>
        <a href="#">LOCATION & CONTACT</a>
      </nav>
      <div class="hamburger" id="hamburger">☰</div>
    </header>

    <div class="main-visual"></div>

    <section class="site-intro">
      <h1>MOVIE LIBRARY</h1>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam
        nonummy eiusmod tempor incididunt ut labore et dolore magna aliquam
        erat, sed diam voluptua.
      </p>
    </section>

    <section class="movie-grid">
      <section class="favorites-section">
        <h2>Collect your favourites</h2>
        <div class="search-bar">
          <span class="search-icon">🔍</span>
          <input
            type="text"
            id="search-input"
            placeholder="Search title and add to grid"
          />
        </div>
      </section>

      <hr />
      <div class="grid" id="movie-grid">
        <div class="movie-card">
          <button class="remove-btn">✖</button>
          <img src="assets/images/batman.png" alt="Batman Returns" />
          <section class="content">
            <h3>Batman Returns</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam
              nonummy eiusmod tempor incididunt ut...
            </p>
          </section>
        </div>
        <div class="movie-card">
          <button class="remove-btn">✖</button>
          <img src="assets/images/wildWest.png" alt="Wild Wild West" />
          <section class="content">
            <h3>Wild Wild West</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam
              nonummy eiusmod tempor incididunt ut...
            </p>
          </section>
        </div>
        <div class="movie-card">
          <button class="remove-btn">✖</button>
          <img src="assets/images/spiderman.png" alt="The Amazing Spiderman" />
          <section class="content">
            <h3>The Amazing Spiderman</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam
              nonummy eiusmod tempor incididunt ut...
            </p>
          </section>
        </div>
      </div>
    </section>

    <section class="contact">
      <div class="contact-wrapper">
        <div class="contact-form">
          <h2>How to reach us</h2>
          <p>Lorem ipsum dolor sit amet, consetetur.</p>
          <form id="contact-form" action="submit.php" method="POST">
            <div class="name-fields">
              <div>
                <label for="first-name" class="required">First Name</label>
                <input type="text" id="first-name" name="first_name" required />
              </div>
              <div>
                <label for="last-name" class="required">Last Name</label>
                <input type="text" id="last-name" name="last_name" required />
              </div>
            </div>

            <label for="email" class="required">Email</label>
            <input type="email" id="email" name="email" required />

            <label for="phone">Telephone</label>
            <input type="tel" id="phone" name="phone" />

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <p class="note">*required fields</p>

            <label class="checkbox">
              <input type="checkbox" name="terms" required />
              I agree to the <a href="#">Terms & Conditions</a>
            </label>

            <button type="submit">SUBMIT</button>
          </form>
        </div>

        <iframe
          class="map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.428490332842!2d-3.691978684594155!3d40.42235227936253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42289e8f5d9d5f%3A0x3e6f7b8c8b7b8d8!2sPlaza%20de%20Espa%C3%B1a%2C%2028040%20Madrid%2C%20Spain!5e0!3m2!1sen!2sus!4v1634567891234"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
    </section>
    <footer>
      <div class="footer-top">
        <div class="footer-address">
          <p>THE GROUP</p>
          <p>Calle de Madrid, 1</p>
          <p>28027 Madrid</p>
          <p>Spain</p>
        </div>
        <div class="footer-socials">
          <p>FOLLOW US</p>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <hr />
      <div class="footer-bottom">
        <p>Copyright © 2025.IT Hote is. All rights reserved.</p>
        <p>Photos by Felix Mooneeram & Sergey Kuznecov on Unsplash</p>
      </div>
    </footer>

    <script src="./assets/js/script.js"></script>
  </body>
</html>
