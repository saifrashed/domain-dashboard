<?php

require_once 'model/GeneralLogic.php';
require_once 'model/AuthLogic.php';
require_once 'model/ProjectsLogic.php';
require_once 'model/MonitoringLogic.php';


/**
 * Class Admin
 *
 * Displays the general views
 */
class Admin {
    /**
     * Admin constructor.
     */
    public function __construct() {
        $this->General    = new GeneralLogic();
        $this->Projects   = new ProjectsLogic();
        $this->Auth       = new AuthLogic();
        $this->Monitoring = new MonitoringLogic(UPTIMEROBOT_KEY);
    }

    /**
     * Index
     */
    public function index() {
        $this->login();
    }


    /**
     * Login
     */
    public function login() {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $result = $this->Auth->login($_POST['email'], $_POST['password']);
            header("Location:" . ADMIN_HOME);
        }

        include './view/login/login.php';
    }

    /**
     * Logout
     */
    public function logout() {
        session_destroy();
        return header("Location:" . ADMIN_LOGIN);
    }

    /**
     * Displays home view
     */
    public function home() {

        if (!isset($_SESSION['id'])) { //if login in session is not set
            header("Location:" . ADMIN_LOGIN);
        }

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/home.php';
        include './view/layout/footer.php';
    }
}

