<?php
class coDB
{
    private $_db;
    /**
     * DB constructor.
     */


    public function __construct()
    {
        try {
            $this->_db = new PDO('mysql:dbname=Wikynov;host=localhost', 'root', 'root');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $pe) {
            echo $pe->getMessage();
        }
    }

    public function prepare($req){
        return $this->_db->prepare($req);
    }

    public function pdo_query($req, $data = [], $fetch = true)
    {
        $stmt = $this->_db->prepare($req);
        $stmt->execute($data);
        return ($fetch) ? $stmt->fetchAll() : true;
    }

    public function pdo_exec($req, $data = [])
    {
        $stmt = $this->_db->prepare($req);
        $stmt->execute($data);
    }
}