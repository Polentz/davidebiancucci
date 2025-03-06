<?php 
    $filterBy = get('filter');
    
    $items = $page
        ->children()
        ->listed()
        ->when($filterBy, function($filterBy) {
            return $this->filterBy('category', $filterBy, ',');
        });
?>

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="grid">
        <?php foreach ($items as $item) : ?>
           <figure class="grid-item">
                <?php if ($preview = $item->previewImage()->toFile()) : ?>
                    <img src="<?= $preview->resize(1200, null)->url() ?>" alt="<?= $preview->alt() ?>" />
                <?php endif ?>
                <figcaption>
                    <?= $item->previewText()->kt() ?>
                </figcaption>
           </figure>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('foot') ?>