<?php 
    $siblings = $section->siblings()->listed();
    $siblingsImage = $section->siblings()->listed()->template('section-image');
    $firstSibling = $siblingsImage->first();
?>

<div id="<?= $section->uuid() ?>" class="section-wrapper slide <?= $section->intendedTemplate() ?>">
    <div class="section-header">
        <h2><?= $section->itemTitle() ?></h2>
    </div>
    <div class="section-content">
        <div class="text-content">
            <div class="text-description">
                <?= $section->itemText()->kt() ?>
            </div>
            <?php if ($section->itemMaterial()->isNotEmpty()) : ?>
                <div class="text-material">
                    <p>Material:</p>
                    <p><?= $section->itemMaterial() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemShipping()->isNotEmpty()) : ?>
                <div class="text-shipping">
                    <p>Shipping:</p>
                    <p><?= $section->itemShipping() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemDimensions()->isNotEmpty()) : ?>
                <div class="text-dimensions">
                    <p>Dimensions:</p>
                    <p><?= $section->itemDimensions() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemPrice()->isNotEmpty()) : ?>
                <div class="text-price">
                    <p>Price:</p>
                    <p><?= $section->itemPrice() ?> €</p>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="section-footer">
        <?php if ($section->activateBuy()->isTrue() || $section->activateRent()->isTrue()) : ?>
            <div class="section-footer-buttons">
                <?php if ($section->activateBuy()->isTrue()) : ?>
                    <a class="link" href="">Buy</a>
                <?php endif ?>
                <?php if ($section->activateRent()->isTrue()) : ?>
                    <a class="link" href="">Rent</a>
                <?php endif ?>
            </div>
        <?php endif ?>
        <div class="section-footer-buttons">
            <?php if ($slots->subpage()) : ?>
                <?php if ($siblings->count() > 1) : ?>
                    <p class="slides-counter">
                        <span class="slide-num"><?= $section->num() ?></span> / <span class="slides-lenght"><?= $siblings->count() ?></span>
                    </p>
                <?php endif ?>
                <?php if ($siblingsImage->count() >= 1) : ?>
                    <p class="slides-nav link" data-uuid="<?= $firstSibling->uuid() ?>">Photos</p>
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