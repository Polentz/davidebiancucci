<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="section section-slider">
        <?php foreach ($page->children()->listed() as $section) : ?>
            <?php snippet($section->intendedTemplate(), compact('section')) ?>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('foot') ?>