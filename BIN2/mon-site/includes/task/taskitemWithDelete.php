<li style="text-decoration: <?= $task['completed'] ? 'line-through' : 'none'?>;">
    <?= $task['title'] ?>
    <a href="./exo2.php?action=delete&name=<?= $task['title']?>">
        Delete
    </a>
</li>