<?php
require_once 'Task.php';
$db = new Task();
$tasks = $db->all();

function h(string $text) : string {
    return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}

?>
<!DOCTYPE>
<html lang="ja">
<head>
    <title>タスク一覧</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h2>タスク一覧</h2>
<a href="new.php">タスク追加</a>
<br>
<br>
<table>
    <th>タスク名</th>
    <th>完了目標</th>
    <th>完了</th>
<?php foreach($tasks as $task) { ?>
    <tr>
        <td><?= h($task['task_name']) ?></td>
        <td><?= h($task['done_request_date']) ?></td>
        <td><?= !$task['done_flag'] ? '未完了' : '完了' ?></td>
        <td style="border: none"><a href="edit.php?id=<?= $task['id'] ?>">編集</a></td>
        <td style="border: none"><a href="delete_confirm.php?id=<?= $task['id'] ?>">削除</a></td>
    </tr>
<?php } ?>
</table>
</body>
</html>