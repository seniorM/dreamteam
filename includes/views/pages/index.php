<a href="<?= url('all')?>">Мои записи</a>
<?php foreach (get_posts() as $id => $post): ?>
    <div class="<?= $post['login'];?>">
        <h2><?= $post['heading'];?></h2>
        <?= $post['text'];?>
    </div>
<?php endforeach;?>