<?php
require_once 'Task.php';
$db = new Task();
$tasks = $db->all();

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
<?php foreach($tasks as $task){ ?>
    <tr>
        <td><?= $task['task_name'] ?></td>
        <td><?= $task['done_request_date'] ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>