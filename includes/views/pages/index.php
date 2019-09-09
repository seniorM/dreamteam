<a href="<?= url('all') ?>">Мои записи</a>
<div id="all_users_posts">
    <?php
    if (!(is_auth())) {
	header('Location:' . url('login'));
    } else {
	$posts = get_posts();
	if (isset($posts)) {
	    foreach ($posts as $id => $post) {
		echo '<h2>' . $post['heading'] . '</h2>';
		echo $post['text'];
	    }
	} else {
	    echo 'здесь будут все посты';
	}
    }
    ?>
</div>
