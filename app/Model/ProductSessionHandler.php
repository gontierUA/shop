<?php
class ProductSessionHandler
{
    private $savePath;
    private $db;

    public function __construct() {
        // Instantiate new Database object
        $this->db = Model::open_database_connection();

        session_set_save_handler(
            array($this, '_open'),
            array($this, '_close'),
            array($this, '_read'),
            array($this, '_write'),
            array($this, '_destroy'),
            array($this, '_gc')
        );

        register_shutdown_function('session_write_close');
        session_start();
    }

    public function _open()
    {
        if ($this->db) {
            return true;
        }
        return false;
    }

    public function _close()
    {
        if($this->db->close()){
            return true;
        }
        return false;
    }

    public function _read($id)
    {
        return (string)@file_get_contents("$this->savePath/sess_$id");
    }

    public function _write($id, $data){
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ($routes[1] == 'products' && isset($routes[3]) && is_numeric($routes[3])) {
            $itemID = $routes[3];

            $watched = 0;
            $isWatched = $this->db->query('SELECT watched FROM product WHERE id=' . $itemID);
            while ($watchedInfo = $isWatched->fetch_assoc()) {
                $watched = $watchedInfo['watched'];
            }
            $watched++;


            $isInserted = $this->db->query('UPDATE product SET watched = ' . $watched . ' WHERE id = ' . $itemID);
            if($isInserted){
                return file_put_contents("$this->savePath/sess_$id", $data) === false ? false : true;
            }else{
                return '';
            }
        }
        return file_put_contents("$this->savePath/sess_$id", $data) === false ? false : true;
    }

    public function _destroy($id)
    {
        $file = "$this->savePath/sess_$id";
        if (file_exists($file)) {
            unlink($file);
        }

        return true;
    }

    public function _gc($maxlifetime)
    {
        foreach (glob("$this->savePath/sess_*") as $file) {
            if (filemtime($file) + $maxlifetime < time() && file_exists($file)) {
                unlink($file);
            }
        }

        return true;
    }
}