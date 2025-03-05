<section class="section">
    <div class="section-wrapper">
        <?php if ($title = $page->sectionTitle()) : ?>
            <div class="section-header">
                <h2><?= $title ?></h2>
            </div>
        <?php endif ?>

        <?php if ($carousel = $page->sectionGallery()) : ?>
            <div class="section-content carousel">
                <?php foreach ($carousel->toFiles() as $file) : ?>
                    <img src="<?= $file->crop(1200, 72)->url() ?>" alt="<?= $file->alt() ?>" />
                <?php endforeach ?>
            </div>
            <div class="carousel-counter">1/4</div>
        <?php endif ?>

        <?php if ($footer = $page->sectionFooter()) : ?>
            <div class="section-footer">
                <a href="<?= $footer->toUrl() ?>"><?= $footer->name() ?></a>
            </div>
        <?php endif ?>
    </div>
</section>