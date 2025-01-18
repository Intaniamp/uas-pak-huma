<?php require("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Your Fit!</title>
    <link rel="stylesheet" href="style.css" />
    <script src="uasss.js" defer></script>
  </head>
  <body>
    <div class="container">
      <header class="brand">
        <h1 class="first-name">Arte</h1>
        <h1 class="scnd-name">DeKain</h1>
      </header>
      <nav class="navbar">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#about us">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><button class="view-cart-btn">View Cart</button></li>
          <li><span id="cart-count" class="cart-count">0</span></li>
        </ul>
      </nav>
    </div>

    <section id="cart" class="cart-section">
      <h2>Your Cart</h2>
      <ul id="cart-items-list">
      </ul>
      <span id="cart-total">0</span></p>
    </section>

    <div class="carousel-heading">
      <h2>Shop with the Best Experience</h2>
    </div>

    <div class="carousel">
      <div class="carousel-slides">
        <div class="slide active">
          <img src="img1.jpg" alt="Slide 1">
        </div>
        <div class="slide">
          <img src="img2.jpg" alt="Slide 2">
        </div>
        <div class="slide">
          <img src="img3.jpg" alt="Slide 3">
        </div>
        <div class="slide">
          <img src="img4.jpg" alt="Slide 4">
        </div>
      </div>
      <div class="carousel-controls">
        <span id="prev-slide">❮</span>
        <span id="next-slide">❯</span>
      </div>
    </div>

    <section id="home">
      <div class="home-wrapper">
        <h1 class="home-title">OUR BEST PRODUCTS</h1>
        <div class="home-img">
          <img class="pic1"
            src="c56ca353c63f49b325fc56cae602a757_1_-removebg-preview.png"
            alt="Pics 1"
          />
          <img class="pic2"
            src="c248e9548d25d3de8cfa782a698d4311_1_-removebg-preview.png"
            alt="Pics 2"
          />
          <img class="pic3"
            src="https://i.pinimg.com/564x/a1/80/68/a18068c079fe1bbce10f5f2aa4b23ceb.jpg"
            alt="Pics 3"
          />
        </div>
        <p class="desc">
          Shop with confidence and enjoy the best deals, exclusive items, and
          top notch service.<br>
          SHOP NOW! 
        </p> 
      </div>
    </section>
    <section id="products">
        <div class="products-wrapper">
            <h1 class="featured-title">Our Featured Products</h1>
            <div class="product-grid">
                <?php
                $produk = mysqli_query($koneksi, "SELECT * FROM tb_product ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_assoc($produk)) {
                        echo "<div class='product-card'>
                                <img src='produk/" . htmlspecialchars($row['product_image']) . "' alt='" . htmlspecialchars($row['product_name']) . "'>
                                <h3>" . htmlspecialchars($row['product_name']) . "</h3>
                                <p class='price'>Rp" . number_format($row['product_price'], 0, ',', '.') . "</p>
                                <p>" . htmlspecialchars($row['product_description']) . "</p>
                                <button class='btn'>Add to Cart</button>
                              </div>";
                    }
                } else {
                    echo "<p>Produk belum tersedia.</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <section id="about us">
      <div class="about-wrapper">
        <h1 class="about-title">About <i>Arte De Kain</i></h1>
        <p class="text-about">
          Welcome to Arte De Kain, your go-to online shop for high-quality products at affordable prices. 
          Founded with the mission to make shopping simple, convenient, and enjoyable, we strive to create a seamless shopping experience 
          that brings joy and satisfaction to our customers. Our curated selection offers something for everyone, whether you are shopping 
          for everyday essentials or looking for unique items for special occasions. From stylish home decor and fashion pieces to practical 
          accessories and thoughtful gifts, every product in our store is chosen with care and quality in mind. At Arte De Kain, 
          we are passionate about delivering exceptional value and inspiring our customers to find products that enhance their lives. 
          Enjoy browsing and discover your next favorite item with us!
        </p>
      </div>
    </section>
    <section id="contact">
      <div class="contact-wrapper">
        <h1 class="contact-title">Contact Us</h1>
        <form action="#" class="contact-form" method="post">
          <input type="text" name="name" placeholder="Your Name" required />
          <input type="text" name="email" placeholder="Your Email" required />
          <textarea
            name="message"
            placeholder="Your Message"
            required
          ></textarea>
          <button type="submit">Submit</button>
        </form>
      </div>
    </section>
  </body>

  <footer>&copy; <i>2024</i> Arte De Kain. All Rights Reserved</footer>
</html>