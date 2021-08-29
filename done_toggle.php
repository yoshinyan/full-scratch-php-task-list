<?php
require_once 'Task.php';

$db = new Task();
$result = $db->done_toggle($_GET['id']);
if ($result) {
    header('Location: index.php');
} else {
    echo 'データ保存に失敗しました';
}