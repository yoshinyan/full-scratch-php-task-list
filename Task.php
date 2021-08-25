<?php
class Task {

    const DSN = 'mysql:dbname=task_list;host=127.0.0.1';
    const USER = 'root';
    const PASSWORD = 'P@ssw0rd';
    private PDO $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            echo "DBに問題が発生しました。しばらく時間をおいてから再度アクセスしてください。 " . $e->getMessage() . "\n";
            exit();
        }
    }

    function create(string $task_name, string $done_request_data) {
        $sql = 'INSERT INTO tasks (id, task_name, done_request_date) VALUE (:id, :task_name, :done_request_date)';

        $prepare = $this->dbh->prepare($sql);
        $prepare->bindValue(':id', ($this->lastId() + 1), PDO::PARAM_INT);
        $prepare->bindValue(':task_name', $task_name, PDO::PARAM_STR);
        $prepare->bindValue(':done_request_date', $done_request_data, PDO::PARAM_STR);

        return $prepare->execute();
    }

    function update(int $id, string $task_name, string $done_request_data) {
        $sql = 'UPDATE tasks SET task_name = :task_name, done_request_date = :done_request_date WHERE id = :id';
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindValue(':task_name', $task_name, PDO::PARAM_STR);
        $prepare->bindValue(':done_request_date', $done_request_data, PDO::PARAM_STR);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);

        return $prepare->execute();
    }

    function all() {
        $sql = 'SELECT * FROM tasks';
        $prepare = $this->dbh->prepare($sql);
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id) {
        $sql = 'SELECT * FROM tasks where id = :id';
        $prepare = $this->dbh->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();

        return $prepare->fetch();
    }

    function lastId() {
        $sql = 'SELECT * FROM tasks ORDER BY id DESC LIMIT 1';
        $prepare = $this->dbh->prepare($sql);
        $prepare->execute();
        $dataSet = $prepare->fetch();

        return $dataSet['id'];
    }
}

