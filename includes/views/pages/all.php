<div id="all">
    <?php if (!(is_auth())) : ?>
        <?php header('Location:' . url('login')); ?>
    <?php else: ?>
        <form action="index.php?action=add" method="post" name="add">
            <label>Heading: <input type="text" name="heading"></label>
            <label>Text<textarea name="text"></textarea></label>
            <input type="submit" value="add post">
        </form>
        <?php if (empty(get_posts(get_auth_user()))): ?>
            <h2>создай свой первый пост </h2>
        <?php else: ?>
            <?php foreach (get_posts(get_auth_user()) as $id => $post): ?>
                <div class="<?= $post['login']; ?>">
                    <h2><?= $post['heading']; ?></h2>
                    <?= $post['text']; ?>
                    <form action="index.php?action=delete" method="post" name="delete">
                        <input type="text" value="<?= $id; ?>" hidden name="id">
                        <input type="submit" value="delete">
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
