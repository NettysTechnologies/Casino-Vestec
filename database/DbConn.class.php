<?php
defined("CONNECTION") or die("");
class DbConn {
    public static function connect() {
        return new PDO(
            // Název serveru; Název databáze;
            "mysql:host=wm104.wedos.net;dbname=d120247_magic;charset=UTF8",
            // Username k datbázi
            "w120247_magic",
            // Heslo k databázi
            "rGcxrT5g",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                PDO::MYSQL_ATTR_MULTI_STATEMENTS => false
            )
        );
    }
}


