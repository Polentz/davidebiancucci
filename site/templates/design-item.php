<?php     
    $parts = $page
        ->children()
        ->listed()
?>

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?php foreach ($parts as $part) : ?>
        <?= snippet('section', ['page' => $part]) ?>
    <?php endforeach ?>
</main>

<?= snippet('foot') ?>