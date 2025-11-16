<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker - Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="home-body">
  <!-- Navigation -->
  <?php include 'navbar2.php'; ?>

  <!-- Hero Section -->
  <section id="home" class="hero-section">
    <h1>Welcome to Expense Tracker</h1>
    <p>Manage your finances with ease and track your expenses efficiently</p>
    <div class="hero-buttons">
      <a href="signup.php" class="hero-btn signup-btn">Sign Up</a>
      <a href="login.php" class="hero-btn login-btn">Login</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about">
    <div class="section-content">
      <h2>About Us</h2>
      <div class="about-container">
        <div class="about-image">
          <img src="image/about.svg" alt="About Expense Tracker">
        </div>
        <div class="about-text">
          <p>
            Expense Tracker is your personal finance management solution designed to help you 
            take control of your spending and income. Our intuitive platform makes it easy to 
            track every transaction, categorize expenses, and gain insights into your financial habits.
          </p>
          <p>
            Whether you're saving for a goal, managing a budget, or simply want to understand 
            where your money goes, we provide the tools you need to make informed financial decisions.
          </p>
          <p>
            Start your journey to financial freedom today with our simple, powerful, and secure 
            expense tracking system.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="section-content">
      <h2>Contact Us</h2>
      <div class="contact-container">
        <div class="contact-text">
          <p>
            Have questions or need support? We're here to help!
          </p>
          <div class="contact-info">
            <p><strong>Email:</strong> farheenimam331@gmail.com</p>
          </div>
        </div>
        <div class="contact-image">
          <img src="image/contact.svg" alt="Contact Us">
        </div>
      </div>
    </div>
  </section>

  <script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
</body>
</html>
