<?php
session_start();

$token_byte = openssl_random_pseudo_bytes(16);
$csrf_token = bin2hex($token_byte);
$_SESSION['token'] = $csrf_token;

?>

<!DOCTYPE>
<html lang="ja">
    <head>
        <title>タスク追加</title>
    </head>
    <body>
        <h2>タスク追加</h2>
        <form method="post" action="create.php">
            <label>タスク名</label>
            <input type="hidden" name="token" value="<?= $csrf_token ?>">
            <input type="text" name="task_name" value="<?= $_POST['task_name'] ?? '' ?>">
            <label>完了目標</label>
            <input type="date" name="done_request_date" value="<?= $_POST['done_request_date'] ?? date("Y-m-d") ?>">
            <input type="submit" name="confirm" value="タスク登録">
        </form>
        <a href="index.php">一覧へ</a>
    </body>
</html>