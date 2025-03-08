<?= snippet('head') ?>
<?php snippet('header', slots: true) ?>
    <?php slot('subpage') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main">
    <section class="section section-slider">
        <?php foreach ($page->children()->listed() as $section) : ?>
            <?php snippet($section->intendedTemplate(), compact('section'), slots: true) ?>
                <?php slot('subpage') ?>
                <?php endslot() ?>
            <?php endsnippet() ?>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('foot') ?>