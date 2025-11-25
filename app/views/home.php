<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenHome</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleguide.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>

<header class="header">
    <h1 class="logo">GreenHome</h1>
    <nav class="nav">
        <a href="plants.html">Plants</a>
        <a href="categories.html">Categories</a>
        <a href="search.html">Search</a>
        <a href="contact.html">Contact</a>
        <a href="dashboard.html">Dashboard</a>
    </nav>
</header>

<section class="hero">
    <div class="container">
        <h2 class="hero-title">Grow. Care. Track.</h2>
        <p class="hero-subtitle">Organize and manage your outdoor & indoor plants effortlessly.</p>
        <a class="btn primary" href="plants.html">Get Started</a>
    </div>
</section>

<section class="plants-showcase container">
    <h2 class="section-title">Latest Arrivals</h2>
    <div class="card-grid">

        <?php 
        if (!empty($plants)):
            foreach ($plants as $plant):
        ?>
        
        <div class="card plant-item">
        <img src="assets/images/<?= htmlspecialchars($plant['image']) ?>" alt="<?= htmlspecialchars($plant['name']) ?>" class="card-img">

            <div class="card-content">
                <h3 class="card-title"><?= htmlspecialchars($plant['name']) ?></h3>
                <p class="card-subtitle"><?= htmlspecialchars($plant['category_name']) ?></p>
                <a href="#" class="btn secondary">View Details</a>
            </div>
        </div>
        
        <?php 
            endforeach; 
        else: 
        ?>
        
        <p>No plants found yet. Add some data to the database!</p>

        <?php endif; ?>
        </div>
</section>

<footer class="footer">
    <p>© 2025 GreenHome — Smart Plant Management</p>
</footer>

<script src="js/ui.js"></script>
</body>
</html>
