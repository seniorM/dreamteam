<div id="all_users_posts">
    <?php
    if (!(is_auth())) {
        header('Location:' . url('login'));
    } else {
        $posts = get_posts();
        foreach ($posts as $id => $post) {
            echo '<h2>' . $post['heading'] . '</h2>';
            echo $post['text'];
        }
    }
    ?>
</div>
<a href="<?= url('all') ?>">Мои записи</a>