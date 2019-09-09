<div id="all_users_posts">
    <?php $posts = get_posts(); ?>
    <?php foreach ($posts as $post) : ?>
        <div class="post">
	    <h2><?= $post['heading'] ?></h2>
	    <div><?= $post['text'] ?></div>
	    <div><label>автор: <?= $post['login'] ?></label></div>
	    <div><?= $post['date'] ?></div>
        </div>
    <?php endforeach; ?>
</div>
