<a href="<?= url('all') ?>">Мои записи</a>
<div id="all_users_posts">
    <?php $posts = get_posts(); ?>
    <?php foreach ($posts as $id => $post) : ?>
    <div class="post">
	<h2><?= $post['heading'] ?></h2>
	<div><?= $post['text']?></div>
	<div><?= $post['login']?></div>
	<div><?= $post['date']?></div>
    </div>
    <?php endforeach;?>
</div>
