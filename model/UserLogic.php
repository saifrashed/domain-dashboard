<?php
require_once 'model/DataHandler.php';

class UserLogic {

    public function __construct() {
        $this->DataHandler = new Datahandler("localhost", "mysql", DB_NAME, DB_USERNAME, DB_PASSWORD);
    }


    public function read($userId) {
        return $this->DataHandler->readData('SELECT * FROM gebruikers NATURAL JOIN roles WHERE user_id="' . $userId . '";');
    }

    public function reads() {
        return $this->DataHandler->readData('SELECT * FROM gebruikers NATURAL JOIN roles;');
    }

    public function create() {

    }

    public function update() {

    }

    public function delete($userId) {
        return $this->DataHandler->deleteData('DELETE FROM gebruikers WHERE user_id ="' . $userId . '";');
    }

    public function getRoles() {
        return $this->DataHandler->readData('SELECT * FROM roles;');
    }

}

?>
