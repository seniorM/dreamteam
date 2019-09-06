<div id="all">
    <form action="index.php?action=add" method="post" name="add">
        <label>Heading: <input type="text" name="heading"></label>
        <label>Text<textarea name="text"></textarea></label>
        <input type="submit" value="add post">
    </form>
    <?php foreach ($posts as $id => $post): ?>
    <div class="<?= $posts['login'];?>">
        <h2><?= $posts['heading'];?></h2>
        <?= $posts['text'];?>
        <form action="index.php?action=delete" method="post" name="delete">
            <input type="text" value="<?= $id;?>" hidden>
            <input type="submit" value="delete">
        </form>
    </div>
    <?php endforeach;?>
</div>
