<?php

/**
 * Redirect if not logged in
 */
if (!isset($_SESSION['id'])) {
    header("Location:" . ADMIN_LOGIN);
    exit;
}

require_once 'model/GeneralLogic.php';
require_once 'model/AuthLogic.php';
require_once 'model/UserLogic.php';


class Users {

    public function __construct() {
        $this->General = new GeneralLogic();
        $this->Auth    = new AuthLogic();
        $this->User    = new UserLogic();
    }

    /**
     * Index
     */
    public function index() {
        $this->reads();
    }


    /**
     * Reads a project
     */
    public function reads() {

        $columns = array(
            'user_id'     => 'id',
            'username'    => 'Naam',
            'email'       => 'Email',
            'description' => 'Rol',
        );

        $table = $this->General->displayDataTable($columns, $this->User->reads(), 'gebruikers', true, true, 'users', 'user_id');

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/users/user_reads.php';
        include './view/layout/footer.php';
    }

    /**
     * Creates a project
     */
    public function create() {

        $rolesQuery = $this->User->getRoles();
        $roles      = '';

        while ($row = $rolesQuery->fetch(PDO::FETCH_ASSOC)) {
            $roles .= '<option value="' . $row['role_id'] . '" >' . $row['description'] . '</option>';
        }

        if (isset($_POST['gebruiker_naam']) && isset($_POST['gebruiker_email']) && isset($_POST['gebruiker_wachtwoord']) && isset($_POST['gebruiker_rol'])) {

            $username = $this->General->prepareData($_POST['gebruiker_naam']);
            $password = $this->General->prepareData($_POST['gebruiker_wachtwoord']);
            $email    = $this->General->prepareData($_POST['gebruiker_email']);
            $rol      = $this->General->prepareData($_POST['gebruiker_rol']);

            // registers user
            $this->Auth->register($username, $password, $email, $rol);

            header('Location: ' . USERS_READS);
        }

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/users/user_create.php';
        include './view/layout/footer.php';
    }

    /**
     * Creates a project
     */
    public function update() {

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/users/user_update.php';
        include './view/layout/footer.php';
    }


    /**
     * Deletes a project
     */
    public function delete($userId) {
        $this->User->delete($userId);
        header('Location: ' . USERS_READS);
    }
}

