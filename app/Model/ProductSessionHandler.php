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
        $dataTable = array();
        $session = $this->db->query('SELECT item_1, item_2 FROM session WHERE id=' . $id);
        if ($session) {
            while ($row = $session->fetch_assoc()) {
                $dataTable['item_1'] = $row['item_1'];
                $dataTable['item_2'] = $row['item_2'];
            }
            return $dataTable;
        } else {
            $this->db->query('INSERT INTO session (id, item_1, item_2) VALUES ("' . $id . '", 0, 0)');
            return '';
        }
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

            $this->db->query('UPDATE product SET watched = ' . $watched . ' WHERE id = ' . $itemID);

            /* recommendations */
            $dataTable = array();
            if ($result = $this->db->query('SELECT item_1, item_2 FROM session WHERE id=' . $id)) {
                while ($row = $result->fetch_assoc()) {
                    $dataTable['item_1'] = $row['item_1'];
                    $dataTable['item_2'] = $row['item_2'];
                }
                /*todo*/
//                if ($dataTable['item_1'] != 0 && $dataTable['item_2'] != 0) {
//                    $this->db->query('UPDATE session SET item_1 = 0, item_2 = 0 WHERE id = ' . $id);
//                    if ($issetRecord = $this->db->query('SELECT id FROM session WHERE id=' . $id)) {
//                        while ($row = $issetRecord->fetch_assoc()) {
//                            $dataTable['item_1'] = $row['item_1'];
//                            $dataTable['item_2'] = $row['item_2'];
//                        }
//                    }
//                }
//                if ($issetRecord = $this->db->query('SELECT id FROM session WHERE id=' . $id)) {
//
//                }

//                if ($dataTable['item_2'] != 0) {
//                    $this->db->query('UPDATE session SET item_1 = 0, item_2 = 0 WHERE id = ' . $id);
//                    $this->db->query('UPDATE recommend SET count = count + 1 WHERE item_1 = ' . $dataTable['item_1'] . ' AND item_2 = ' . $dataTable['item_2']);
//                }
//                if ($dataTable['item_1'] != $itemID) {
//                    $this->db->query('UPDATE session SET item_1 = ' . $itemID . ' WHERE id = ' . $id);
//                } else {
//                    $this->db->query('UPDATE session SET item_2 = ' . $itemID . ' WHERE id = ' . $id);
//                }
//                return $dataTable;
            }
        }

        return false;
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