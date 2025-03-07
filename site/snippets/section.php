<?php 
    $files = $page->itemGallery()->toFiles()
?>

<section class="section">
    <div class="section-wrapper">
        <div class="section-header">
            <h2><?= $page->itemTitle() ?></h2>
        </div>
        <div class="section-content">
            <div class="carousel">
                <?php foreach ($files as $file) : ?>
                    <?php if ($file->isNotEmpty()) : ?>
                        <figure class="carousel-element image">
                            <img src="<?= $file->url() ?>" alt="<?= $file->alt() ?>" />
                        </figure>
                    <?php endif ?>
                <?php endforeach ?>
                <?php if ($page->itemText()->isNotEmpty()) : ?>
                    <div class="carousel-element text">
                        <div class="text-description">
                            <?= $page->itemText()->kt() ?>
                        </div>
                        <?php if ($page->itemMaterial()->isNotEmpty()) : ?>
                            <div class="text-material">
                                <p>Material:</p>
                                <p><?= $page->itemMaterial() ?></p>
                            </div>
                        <?php endif ?>
                        <?php if ($page->itemShipping()->isNotEmpty()) : ?>
                            <div class="text-shipping">
                                <p>Shipping:</p>
                                <p><?= $page->itemShipping() ?></p>
                            </div>
                        <?php endif ?>
                        <?php if ($page->itemDimensions()->isNotEmpty()) : ?>
                            <div class="text-dimensions">
                                <p>Dimensions:</p>
                                <p><?= $page->itemDimensions() ?></p>
                            </div>
                        <?php endif ?>
                        <?php if ($page->itemPrice()->isNotEmpty()) : ?>
                            <div class="text-price">
                                <p>Price:</p>
                                <p><?= $page->itemPrice() ?> €</p>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="section-footer">
            <div class="carousel-counter"></div>
            <?php if ($page->itemText()->isNotEmpty()) : ?>
                <span class="carousel-nav">Information</span>
            <?php endif ?>
            <a href="<?= $page->sectionFooter()->toUrl() ?>"><?= $page->sectionFooter()->name() ?></a>
        </div>
    </div>
</section>