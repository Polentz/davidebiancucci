<header class="header">
    <menu class="menu">
        <button class="button menu-button" role="button" aria-pressed="false" data-action="toggle-menu">
            <h1><?= $page->title() ?></h1>
            <svg viewBox="0 0 10 8" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.00003 7.5L10 0.5H0L5.00003 7.5Z"/>
            </svg>
        </button>
        <ul class="dropdown-menu --close">
            <?php foreach ($site->children()->listed()->not($page) as $sibling) : ?>
                <li class="button dropdown-menu-button">
                    <a href="<?= $sibling-url() ?>"><?= $sibling->title() ?></a>
                </li>
            <?php endforeach ?>
            <li class="button dropdown-menu-button">
                <a href="">Prova</a>
            </li>
            <li class="button dropdown-menu-button">
                <a href="">Prova</a>
            </li>
            <li class="button dropdown-menu-button">
                <a href="">Prova</a>
            </li>
            <li class="button dropdown-menu-button">
                <a href="">Prova</a>
            </li>
        </ul>
    </menu>
</header>