<?= snippet('head') ?>
<?php snippet('header', slots: true) ?>
    <?php slot('subpage') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main">
    <?= snippet('section') ?>
</main>

<?= snippet('foot') ?>