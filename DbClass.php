<?php
class Db {

    const DSN = 'mysql:dbname=task_list;host=127.0.0.1';
    const USER = 'root';
    const PASSWORD = 'P@ssw0rd';
    public $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            echo "DBに問題が発生しました。しばらく時間をおいてから再度アクセスしてください。 " . $e->getMessage() . "\n";
            exit();
        }
    }
}
