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
    <section class="section-grid-layout">
        <ul class="grid-layout">
            <?php foreach ($items as $item) : ?>
                <li class="grid-item" data-id="<?= $item->uid() ?>">

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

                </li>
            <?php endforeach ?>
        </ul>
    </section>
    <?php foreach ($items as $item) : ?>
        <section id="<?= $item->uid() ?>" class="section section-slider">
            <?php foreach ($item->children()->listed() as $section) : ?>
                <?php snippet($section->intendedTemplate(), compact('section'), slots: true) ?>
                    <?php slot('subpage') ?>
                    <?php endslot() ?>
                <?php endsnippet() ?>
            <?php endforeach ?>
        </section>
    <?php endforeach ?>
</main>

<?= snippet('foot') ?>