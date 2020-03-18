<?php
require_once 'model/DataHandler.php';

/**
 * Class AuthLogic handles user authorization
 */
class AuthLogic {

    public function __construct() {
        $this->DataHandler = new Datahandler("localhost", "mysql", DB_NAME, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * Registers a user. (not used currently)
     *
     * @param $username
     * @param $password
     * @param $email
     * @return bool
     */
    public function register($username, $password, $email, $roleId) {
        $result = $this->DataHandler->readsData('SELECT * FROM gebruikers WHERE email="' . $email . '"');

        if (empty($username) && empty($password) && empty($email))
            return false;
        if ($result->rowCount() !== 0)
            return false;
        if (strlen($password) < 5 || strlen($password) > 50)
            return false;

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->DataHandler->createData('INSERT INTO gebruikers(username, password, email, role_id) VALUES("' . $username . '","' . $passwordHash . '","' . $email . '", "' . $roleId . '")');

        return true;
    }

    /**
     * Logs a user in.
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password) {
        $result = $this->DataHandler->readsData('SELECT * FROM gebruikers NATURAL JOIN roles WHERE email="' . $email . '";');

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $passwordStatus = password_verify($password, $row['password']);

        if ($passwordStatus) {
            session_start();

            $_SESSION['id']       = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email']    = $row['email'];
            $_SESSION['rol']      = $row['description'];

            return true;
        }
        else {
            return false;
        }
    }
}

?>
