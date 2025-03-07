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
    <section>
        <ul class="grid">
            <?php foreach ($items as $item) : ?>
                <li class="grid-item">
                    <a href="<?= $item->url() ?>">
                        <?php if ($preview = $item->previewImage()->toFile()) : ?>
                            <figure class="grid-item-image">
                                <img src="<?= $preview->resize(1200, null)->url() ?>" alt="<?= $preview->alt() ?>" />
                            </figure>
                        <?php endif ?>
                        <?php if ($item->previewText()->isNotEmpty()) : ?>
                            <div class="grid-item-text">
                                <?= $item->previewText()->kirbytextinline() ?>
                            </div>
                        <?php endif ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>

<?= snippet('foot') ?>