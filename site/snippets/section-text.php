<div id="<?= $section->uuid() ?>" class="section-wrapper slide <?= $section->intendedTemplate() ?>">
    <div class="section-header">
        <h2><?= $section->itemTitle() ?></h2>
    </div>
    <div class="section-content">
        <div class="text-content">
            <div class="text-description">
                <?= $section->itemText()->kt() ?>
            </div>
            <?php if ($section->itemMaterial()->isNotEmpty()) : ?>
                <div class="text-material">
                    <p>Material:</p>
                    <p><?= $section->itemMaterial() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemShipping()->isNotEmpty()) : ?>
                <div class="text-shipping">
                    <p>Shipping:</p>
                    <p><?= $section->itemShipping() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemDimensions()->isNotEmpty()) : ?>
                <div class="text-dimensions">
                    <p>Dimensions:</p>
                    <p><?= $section->itemDimensions() ?></p>
                </div>
            <?php endif ?>
            <?php if ($section->itemPrice()->isNotEmpty()) : ?>
                <div class="text-price">
                    <p>Price:</p>
                    <p><?= $section->itemPrice() ?> €</p>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="section-footer">
        <?php if ($section->activateBuy()->isTrue() || $section->activateRent()->isTrue()) : ?>
            <div class="action-buttons">
                <div class="text-buttons">
                    <?php if ($section->activateBuy()->isTrue()) : ?>
                        <div class="button-buy">
                            <a href="<?= $site->url() ?>">Buy</a>
                        </div>
                    <?php endif ?>
                    <?php if ($section->activateRent()->isTrue()) : ?>
                        <div class="button-buy">
                            <a href="<?= $site->url() ?>">Rent</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
        <div class="nav-buttons">
            <div class="slides-counter">
                <span class="slide-num"><?= $section->num() ?> / </span>
            </div>
            <a href="<?= $site->url() ?>" class="slides-nav">Photos</a>
        </div>
    </div>
</div>