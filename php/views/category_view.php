<?php
// category_view.php
// Expects $categoryName and $plants (array) — fallback included.

if (!isset($categoryName)) $categoryName = 'Category';
if (!isset($plants) || !is_array($plants)) {
    $plants = []; // empty fallback
}

$asset_path = '/assets/images/'; // Define the correct path from the root
?>
<section class="container">
    <h2 class="page-title"><?=htmlspecialchars($categoryName)?></h2>
    <?php if (count($plants) === 0): ?>
        <p>No plants yet in this category.</p>
    <?php else: ?>
        <div class="card-grid">
            <?php foreach ($plants as $p): ?>
                <article class="card" aria-label="<?=htmlspecialchars($p['name'])?>">
                    <!-- FIX: Use root-relative path defined by $asset_path -->
                    <img src="<?=htmlspecialchars($asset_path . $p['image'])?>" 
                         alt="<?=htmlspecialchars($p['name'])?>" 
                         class="card-img">
                    <h3 class="card-title"><?=htmlspecialchars($p['name'])?></h3>
                    <p class="card-text"><?=htmlspecialchars($p['desc'])?></p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>