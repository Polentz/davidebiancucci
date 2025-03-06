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
                        <?= $page->itemText()->kt() ?>
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