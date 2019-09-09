<div id="all">
    <form action="index.php?action=add" method="post" name="add">
        <label>Heading: <input type="text" name="heading"></label>
        <label>Text<textarea name="content text" id="editor"></textarea></label>
        <input type="submit" value="add post">
    </form>
    <?php foreach (get_posts(get_auth_user()) as $id => $post): ?>
        <div class="all post">
            <h2><?= $post['heading']; ?></h2>
            <div><?= $post['text'] ?></div>
            <div class="date"><?= $post['date'] ?></div>
            <form action="index.php?action=delete" method="post" name="delete">
                <input type="text" value="<?= $id; ?>" hidden name="id">
                <input type="submit" value="delete">
            </form>
        </div>
    <?php endforeach; ?>
</div>
