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
    <?php foreach ($items as $item) : ?>
        <?= snippet('section') ?>
    <?php endforeach ?>
</main>

<?= snippet('foot') ?>