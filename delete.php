<?php
require_once 'Task.php';

$db = new Task();
$result = $db->delete($_POST['id']);
if ($result) {
    header('Location: index.php');
}