<?php
if ($_POST['task_name'] === '') {
    echo 'タスク名が空欄です';
} else {

}
$sample_tasks = [
    [
        'task_name' => 'aaaa',
        'done_request_date' => '2021-08-09'
    ],
    [
        'task_name' => 'bbbb',
        'done_request_date' => '2021-08-10'
    ],
];

?>
<!DOCTYPE>
<html lang="ja">
<head>
    <title>タスク一覧</title>
    <style rel="stylesheet" type="text/css">
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
<?php foreach($sample_tasks as $task){ ?>
    <tr>
        <td><?= $task['task_name'] ?></td>
        <td><?= $task['done_request_date'] ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>