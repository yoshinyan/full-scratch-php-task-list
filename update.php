<?php
require_once 'Task.php';

$error_messege = '';
if ($_POST['task_name'] == '') {
    $error_messege = 'タスク名が空欄です';
} elseif (strlen($_POST['task_name']) > 150) {
    $error_messege = 'タスク名が長すぎます';
} else {
    $db = new Task();
    $result = $db->update($_POST['id'], $_POST['task_name'], $_POST['done_request_date']);
    if ($result) {
        header('Location: index.php');
    } else {
        var_dump($result);
    }
}

?>

<?php if ($error_messege != '') : ?>
    <?= $error_messege ?>
    <form method="post" action="edit.php">
        <input type="hidden" name="done_request_date" value="<?= $_POST['done_request_date'] ?? '' ?>">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?? '' ?>">
        <input type="submit" name="return" value="戻る">
    </form>
<?php endif; ?>