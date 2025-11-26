<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenHome — Smart Plant Management</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleguide.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/layout.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header / Navigation -->
<header class="header" role="banner">
    <h1 class="logo">GreenHome</h1>
    <nav class="nav" role="navigation" aria-label="Main navigation">
        <a href="index.html">Home</a>
        <a href="plants.html">Plants</a>
        <a href="categories.html">Categories</a>
        <a href="search.html">Search</a>
        <a href="contact.html">Contact</a>
        <a href="dashboard.html">Dashboard</a>
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="watering.html">Watering Schedule</a>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero" role="region" aria-label="Hero section">
    <div class="container">
        <h2 class="hero-title">Grow. Care. Track.</h2>
        <p class="hero-subtitle">Organize and manage your outdoor & indoor plants effortlessly.</p>
        <a class="btn primary" href="plants.html">Get Started</a>
    </div>
</section>

<!-- Featured Categories Section -->
<section class="container" role="region" aria-label="Featured Categories">
    <h2 class="page-title">Explore Our Categories</h2>
    <div class="category-grid">
        <a href="indoor_plants.html" class="category-tile" aria-label="Indoor Plants">
            <div class="tile-icon">🌿</div>
            <span class="tile-title">Indoor Plants</span>
            <span class="tile-desc">Perfect for your living room</span>
        </a>

        <a href="outdoor_plants.html" class="category-tile" aria-label="Outdoor Plants">
            <div class="tile-icon">🌲</div>
            <span class="tile-title">Outdoor Plants</span>
            <span class="tile-desc">Beautify your garden</span>
        </a>

        <a href="herbs_plants.html" class="category-tile" aria-label="Herbs & Succulents">
            <div class="tile-icon">🌵</div>
            <span class="tile-title">Herbs & Succulents</span>
            <span class="tile-desc">Low maintenance & aromatic</span>
        </a>

        <a href="flowering_plants.html" class="category-tile" aria-label="Flowering Plants">
            <div class="tile-icon">🌸</div>
            <span class="tile-title">Flowering Plants</span>
            <span class="tile-desc">Add color to your life</span>
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="footer" role="contentinfo">
    <p>© 2025 GreenHome — Smart Plant Management</p>
</footer>

<!-- Scripts -->
<script src="js/ui.js"></script>
<script src="js/script.js"></script>

</body>
</html>
