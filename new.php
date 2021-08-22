<?php

if (isset($_POST['error']) && $_POST['error'] === 'task_name') {
    echo 'タスク名が空欄です';
}

?>
<!DOCTYPE>
<html lang="ja">
    <head>
        <title>タスク追加</title>
    </head>
    <body>
        <h2>todo追加</h2>
        <form method="post" action="create.php">
            <label>タスク名</label>
            <input type="text" name="task_name" value="<?= $_POST['task_name'] ?? '' ?>">

            <label>完了目標</label>
            <input type="date" name="done_request_date" value="<?= $_POST['done_request_date'] ?? date("Y-m-d") ?>">
            <input type="submit" name="confirm" value="タスク登録">
        </form>
        <a href="index.php">一覧へ</a>
    </body>
</html>