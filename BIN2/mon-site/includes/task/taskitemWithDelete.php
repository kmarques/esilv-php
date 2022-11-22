<li style="text-decoration: <?= $task['completed'] ? 'line-through' : 'none'?>;">
    <?= $task['title'] ?>
    <a href="./taskList-optimised.php?action=delete&id=<?= $task['id']?>">
        Delete
    </a>
    <form method="DELETE">
        <input type="hidden" name="id" value="<?= $task['id'] ?>"/>
        <input type="submit" name="action" value="delete"/>
    </form>
</li>