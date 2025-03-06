<?php     
    $items = $page
        ->children()
        ->listed()
?>

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?php foreach ($items as $item) : ?>
        <?= snippet('section', ['page' => $item], slots: true) ?>
            <?php slot('images') ?>
            <?php endslot() ?>
        <?php endsnippet() ?>
    <?php endforeach ?>
</main>

<?= snippet('foot') ?>