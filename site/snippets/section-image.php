<?php 
    $sectionImages = $page->siblings()->filterBy('template', 'section-image'); 
?>

<div id="<?= $section->uuid() ?>" class="section-wrapper slide <?= $section->intendedTemplate() ?>">
    <div class="section-header">
        <h2><?= $section->itemTitle() ?></h2>
    </div>
    <div class="section-content">
        <?php if ($image = $section->itemImage()->toFile()) : ?>
            <figure class="image-content">
                <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" />
            </figure>
        <?php endif ?>
    </div>
    <div class="section-footer">
        <div class="nav-buttons">
            <!-- scrivere if statement: se array lenght > 1, display this -->
            <div class="slides-counter">
                <span class="slide-num"><?= $section->num() ?> / </span>
            </div>
            <!-- questo qui vale solo quando ho immagini + testo -->
            <a class="slides-nav">Information</a>
        </div>
    </div>
</div>

