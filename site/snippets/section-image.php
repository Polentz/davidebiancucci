<?php 
    $siblings = $section->siblings()->listed();
    $siblingsImage = $section->siblings()->listed()->template('section-image');
    $siblingsText = $section->siblings()->listed()->template('section-text');
    $firstSibling = $siblingsText->first();
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
        <div class="section-footer-buttons">
            <?php if ($slots->subpage()) : ?>
                <?php if ($siblings->count() > 1) : ?>
                    <p class="slides-counter">
                        <span class="slide-num"><?= $section->num() ?></span> / <span class="slides-lenght"><?= $siblings->count() ?></span>
                    </p>
                <?php endif ?>
                <?php if ($siblingsText->count() >= 1) : ?>
                    <p class="slides-nav link" data-uuid="<?= $firstSibling->uuid() ?>">Information</p>
                <?php endif ?>
            <?php else : ?>
                <?php if ($siblings->count() > 1) : ?>
                    <p class="slides-counter">
                        <span class="slide-num"><?= $section->num() ?></span> / <span class="slides-lenght"><?= $siblings->count() ?></span>
                    </p>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
</div>