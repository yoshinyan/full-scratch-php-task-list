<?php
require 'DbClass.php';

if ($_POST['task_name'] === '') {
    header('location: new.php?error=task_name');
    exit();
} else {
    $db = new Db();

    $sql = 'INSERT INTO tasks (id, task_name, done_request_date) VALUE (:id, :task_name, :done_request_date)';
    $prepare = $db->dbh->prepare($sql);

    $prepare->bindValue(':id', 1, PDO::PARAM_INT);
    $prepare->bindValue(':task_name', 'test', PDO::PARAM_STR);
    $prepare->bindValue(':done_request_date', '2021-08-09', PDO::PARAM_STR);
    $prepare->execute();

    $sql = 'SELECT * FROM tasks';
    $prepare = $db->dbh->prepare($sql);
    $prepare->execute();

    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
}
