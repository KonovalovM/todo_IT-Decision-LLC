<?php
require_once '../configs/pdo_ini.php';
$sth = $pdo->prepare("SELECT * FROM `lists` WHERE `id`=(" . $_GET["listId"] . ")");
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute();
    $todo_tasks = $sth->fetchAll();
?>

<form id="form" action="modules/add_task.php" method="POST">
    <ul>
        <?php
        foreach ($todo_tasks as $task):
        ?>
            <h3 id="time">cat_name: <?php echo $task["cat_name"];?></h3>
            <h3 id="time">Time: <?php echo $task["time_created"];?></h3>
            <h3 id="time">Title: <?php echo $task["title"];?></h3>
            <h3 id="time">Description: <?php echo $task["description"];?></h3>
        <?php
        endforeach;
        ?>
    </ul>
</form>
