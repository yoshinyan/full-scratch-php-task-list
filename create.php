<?php
require_once 'Task.php';

$error_messege = '';
if ($_POST['task_name'] == '') {
    $error_messege = 'タスク名が空欄です';
} elseif (strlen($_POST['task_name']) > 150) {
    $error_messege = 'タスク名が長すぎます';
} elseif (!preg_match('/^\d{4}-[01]\d{1}-[012]\d{1}$/', $_POST['done_request_date'])) {
    $error_messege = '日付の形式が不正です';
} else {
    $db = new Task();
    $result = $db->create($_POST['task_name'], $_POST['done_request_date']);
    if ($result) {
        header('Location: index.php');
    } else {
        echo 'データ保存に失敗しました';
    }
}

?>

<?php if ($error_messege != '') : ?>
    <?= $error_messege ?>
    <form method="post" action="new.php">
        <input type="hidden" name="task_name" value="<?= $_POST['task_name'] ?? '' ?>">
        <input type="hidden" name="done_request_date" value="<?= $_POST['done_request_date'] ?? '' ?>">
        <input type="submit" name="return" value="戻る">
    </form>
<?php endif; ?>