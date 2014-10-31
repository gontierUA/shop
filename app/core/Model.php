<?php
class Model
{
    static function open_database_connection()
    {
        $mysqli  = new mysqli('localhost', 'shop_user', 'shop_user', 'shop');
        if (mysqli_connect_errno()) {
            printf("Database connection error: %s\n", mysqli_connect_error());
            exit;
        }
        return $mysqli;
    }
}