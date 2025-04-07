<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- FontAwesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- Stylesheet Link -->
    <link rel="stylesheet" href="../css/style.css" />

    <title>Damian & Orion | Perfume Shop</title>
  </head>

  <body>
    <?php include 'db_config.php'; ?>
    <div class="wrapper">
      <main class="main-content">
        <div id="hero" class="hero">
          <h1>Damian & Orion</h1>
          <p>
            When summer arrives, the season calls for a lighter, fresher and
            some may say even a zestier summer fragrance to match the mood of
            the time of the year. Try one of our new perfumes that are perfect
            for the summer months.
          </p>
        </div>

        <div class="navbar">
          <div class="nav-item">
            <ul>
              <li>
                <a href="#hero"><i class="fas fa-home"></i> Home</a>
              </li>
              <li>
                <a href="#featured"><i class="fa fa-fire"></i> Featured</a>
              </li>
              <li>
                <a href="#products"><i class="fa fa-spray-can"></i> Products</a>
              </li>
              <li>
                <a href="#testimonial"
                  ><i class="fa fa-quote-left"></i> Testimonial</a
                >
              </li>
              <li>
                <a href="#contact"
                  ><i class="fas fa-address-card"></i> Contact</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div id="featured">
          <h2>Featured Products</h2>
          <p>Our products are being loved by our customers.</p>
          <div class="featured-product">
            <?php 
            $sql = "SELECT * FROM perfumes LIMIT 3";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
            <div class="featured-one">
              <img src="../assets/images/<?php echo $row['photo'];?>" alt="<?php echo $row['name'];?>" class="featured-image" />
              <div class="featured-description">
                <p>
                  <b>Product Name:</b> <?php echo $row['name'];?>
                  <br />
                  <b>Offer Price:</b> <del><?php echo $row['offer_price'];?></del> <?php echo $row['current_price'];?>
                  <br />
                  <b>Color:</b> Blue.
                </p>
              </div>
              <a href="singleproduct.php?id=<?php echo $row['id'];?>" class="buynow">Buy Now</a>
            </div>
           <?php }} ?>
          </div>
        </div>
        <div class="icon-box-section">
          <div class="icon1 icon">
            <i class="fas fa-globe-americas"></i>
            <h3>All Over The World</h3>

          </div>
          <div class="icon2 icon">
            <i class="fas fa-dollar-sign"></i>
            <h3>Money Back Guarantee</h3>
          </div>
          <div class="icon3 icon">
            <i class="fas fa-shipping-fast"></i>
            <h3>Fast & Free Shipping</h3>
          </div>
        </div>
        <!-- Products Section -->
        <div id="products">
          <h2>Our Best Products</h2>
          <p>We provide best products for our customers.</p>

          <div class="products-grid">
          <?php 
            $sql = "SELECT * FROM perfumes";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
            <div class="featured-one">
              <img src="../assets/images/<?php echo $row['photo'];?>" alt="<?php echo $row['name'];?>" class="featured-image" />
              <div class="featured-description">
                <p>
                  <b>Product Name:</b> <?php echo $row['name'];?>
                  <br />
                  <b>Offer Price:</b> <del><?php echo $row['offer_price'];?></del> <?php echo $row['current_price'];?>
                  <br />
                </p>
              </div>
              <a href="singleproduct.php?id=<?php echo $row['id'];?>" class="buynow">Buy Now</a>
            </div>
           <?php }} ?>
          </div>
        </div>
        <!-- Testimonial Section -->
        <div id="testimonial">
          <h2>What Our Clients Say</h2>
          <p>We provide best products for our customers.</p>
          <div class="customers customer1">
            <i class="fas fa-quote-left quote-icon"></i>
            <img src="../assets/images/customer1.jpg" />
            <h3>Best Fragnance!</h3>

            <p>
            "I absolutely love this perfume! It's long-lasting and has such a refreshing scent. My new go-to fragrance!"
            </p>
            <i class="fas fa-quote-right quote-icon"></i>
          </div>
          <div class="customers customer2">
            <i class="fas fa-quote-left quote-icon"></i>
            <img src="../assets/images/customer2.png" />
            <h3>Thank You!</h3>

            <p>
            "The perfume arrived quickly, and the scent is just perfect. It's elegant yet not overpowering. Highly recommend!"
            </p>
            <i class="fas fa-quote-right quote-icon"></i>
          </div>
          <div class="customers customer3">
            <i class="fas fa-quote-left quote-icon"></i>
            <img src="../assets/images/customer3.png" />
            <h3>I'm Impressed!</h3>

            <p>
            "A wonderful experience from start to finish. The perfume has a beautiful balance of floral and woody notes. Love it!"
            </p>
            <i class="fas fa-quote-right quote-icon"></i>
          </div>
        </div>
        <!-- Contact Section -->
        <div id="contact">
          <h2>Contact Us</h2>
          <p>
            Feel free to send us a message about anything. We always appreciate
            you.
          </p>

          <form>
            <label for="name">Name</label> <br />
            <input
              type="text"
              name=""
              id="name"
              placeholder="Enter your name"
              required
            />
            <br />
            <label for="email">Email</label> <br />
            <input
              type="email"
              name=""
              id="email"
              placeholder="Enter your email"
              required
            />
            <br />
            <label for="message">Message</label><br />
            <textarea
              name=""
              id="message"
              placeholder="Enter your message"
              required
            ></textarea>
            <br />
            <button type="submit">Send</button>
          </form>
        </div>
      </main>
      <footer class="site-footer">
        Copyright &copy;2025 | All rights reserved | Created by Damian & Orion
      </footer>
    </div>
  </body>
</html>
