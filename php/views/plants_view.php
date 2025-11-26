<?php

if (!isset($plants) || !is_array($plants)) {
   
    $plants = [
        ['id'=>1,'name'=>'Epipremnum Aureum','image'=>'epipremnum_aureum.jpg','category'=>'indoor','desc'=>'Low-maintenance indoor climbing plant.'],
        ['id'=>2,'name'=>'Aloe Vera','image'=>'aloe_vera.avif','category'=>'succulents','desc'=>'A healing succulent that thrives in sunlight.'],
        ['id'=>3,'name'=>'Monstera Deliciosa','image'=>'monstera_deliciosa.jpg','category'=>'indoor','desc'=>'Large split leaves, popular indoor plant.'],
    ];
}

$asset_path = '/assets/images/'; 
?>
<section class="container">
    <h2 class="page-title">Plants</h2>
    <div class="card-grid">
        <?php foreach ($plants as $p): ?>
            <article class="card" aria-label="<?=htmlspecialchars($p['name'])?>">
                
                <img src="<?=htmlspecialchars($asset_path . $p['image'])?>" 
                     alt="<?=htmlspecialchars($p['name'])?>" 
                     class="card-img">
                <h3 class="card-title"><?=htmlspecialchars($p['name'])?></h3>
                <p class="card-text"><?=htmlspecialchars($p['desc'])?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
