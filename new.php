<?php
var_dump($_POST);

if ($_GET['error'] === 'task_name') {
    echo 'タスク名が空欄です';
}

?>
<!DOCTYPE>
<html lang="ja">
    <head>
        <title>タスク追加</title>
        <style rel="stylesheet" type="text/css">

        </style>
    </head>
    <body>
        <h2>todo追加</h2>
        <form method="post" action="create.php">
            <label>タスク名</label>
            <input type="text" name="task_name" value="<?php echo $_POST['task_name'] ?>">
            &nbsp;&nbsp;
            <label>完了目標</label>
            <input type="date" name="done_request_date" value="<?php echo $_POST['done_request_date'] ?>">
            <input type="submit" name="confirm" value="タスク登録">
        </form>
        <a href="index.php">一覧へ</a>
    </body>
</html>