

<?php if (!empty($menu)): ?>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3><?= Yii::t('app', 'General') ?></h3>
            <ul class="nav side-menu">
                <?php foreach ($menu as $data): ?>
                    <li class="active" <?= (isset($data['url']) ? "href=\"$data[url]\"" : "") ?>><a><i class="<?= $data['icon'] ?>"></i> <?= Yii::t('app', $data['title']) ?> <span class="fa fa-chevron-down"></span></a>
                        <?php if (!isset($data['url']) && isset($data['items'])): ?>
                        <ul class="nav child_menu" >
                            <?php foreach ($data['items'] as $_data): ?>
                            
                            <li class="current-page"><a href="<?= $_data['url'] ?>"><?= $_data['title'] ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>