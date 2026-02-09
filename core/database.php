<?php
ini_set('display_errors','on');

class Database {
    private $config = [];

    public static function connect() {
        $db = new PDO('mysql:host=localhost;dbname=reservas;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $reservas = $db->query("SELECT * FROM reservas");
        $reservas = $reservas->fetchAll(PDO::FETCH_ASSOC);

        return $reservas;
    }

    public static function loadconfig() {
        $json_file = file_get_contents('../conf/db-conf.json');
        $config = json_decode($json_file, true);

        $db_host = $config['host'];
        $db_user = $config['user'];
        $db_pass = $config['password'];
        $db_bd = $config['db_name'];

        echo 'Host ' . $db_host . '<br>';
        echo 'User ' . $db_user . '<br>';
        echo 'Pass ' . $db_pass . '<br>';
        echo 'BD ' . $db_bd . '<br>';
        
    }
}



?>