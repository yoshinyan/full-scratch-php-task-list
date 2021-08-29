<?php
require_once 'Task.php';
if (isset($_GET['id'])) {
    $db = new Task();
    $task = $db->find($_GET['id'] ?? $_POST['id']);
}

function h(string $text) : string {
    return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}

?>
<!DOCTYPE>
<html lang="ja">
    <head>
        <title>タスク編集</title>
    </head>
    <body>
        <h2>タスク編集</h2>
        <form method="post" action="update.php">
            <label>タスク名</label>
            <input type="text" name="task_name" value="<?= $_POST['task_name'] ?? h($task['task_name']) ?? '' ?>">
            <label>完了目標</label>
            <input type="date" name="done_request_date" value="<?= $_POST['done_request_date'] ?? h($task['done_request_date']) ?? '' ?>">
            <input type="hidden" name="id" value="<?= $_POST['id'] ?? $task['id'] ?? '' ?>">
            <input type="submit" name="confirm" value="タスク編集">
        </form>
        <a href="index.php">一覧へ</a>
    </body>
</html>