<a href="<?= url('all') ?>">Мои записи</a>
<?php
get_index();
?>
<div id="index">
    <?php foreach ($posts as $id => $post): ?>
        <div class="<?= $post['login']; ?>">
            <h2><?= $post['heading']; ?></h2>
            <?= $post['text']; ?>
        </div>
    <?php endforeach; ?>
</div>