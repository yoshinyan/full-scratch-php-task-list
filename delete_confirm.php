<?php
require_once 'Task.php';
$db = new Task();
$task = $db->find($_GET['id']);

?>
<!DOCTYPE>
<html lang="ja">
    <head>
        <title>タスク削除</title>
    </head>
    <body>
        <h2>タスクを削除しますか？</h2>
        <form method="post" action="delete.php">
            <label>タスク名</label>
            <?= $task['task_name'] ?>
            <br>
            <label>完了目標</label>
            <?= $task['done_request_date'] ?>
            <br>
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <a href="index.php">戻る</a>
            <input type="submit" name="confirm" value="削除">
        </form>
    </body>
</html>