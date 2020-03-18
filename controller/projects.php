<?php

/**
 * Redirect if not logged in
 */
if (!isset($_SESSION['id'])) {
    header("Location:" . ADMIN_LOGIN);
    exit;
}

require_once 'model/GeneralLogic.php';
require_once 'model/ProjectsLogic.php';
require_once 'model/MonitoringLogic.php';


class Projects {

    public function __construct() {
        $this->General    = new GeneralLogic();
        $this->Projects   = new ProjectsLogic();
        $this->Monitoring = new MonitoringLogic(UPTIMEROBOT_KEY);
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
    public function reads($page) {
        $projectenDisplay = '';
        $projecten        = $this->Projects->reads($page);
        $pagination       = $this->Projects->pagination($page);

        // Gets account details and its properties
        $statusMonitors = $this->Monitoring->getAccountDetails()->account;

        while ($row = $projecten->fetch(PDO::FETCH_ASSOC)) {
            $projectenDisplay .= '<tr>';
            $projectenDisplay .= '<td><a href="' . $row['url'] . '" target="_blank">' . $row['titel'] . '</a></td>';
            $projectenDisplay .= '<td>' . $row['rooturl'] . '</td>';
            $projectenDisplay .= '<td>' . date('d M Y H:i:s ', $row['datum']) . '</td>';
            $projectenDisplay .= '<td><div class="progress progress-xs"><div class="progress-bar progress-bar-danger" style="width: ' . $row['prioriteit'] . '0%"></div></div></td>';
            $projectenDisplay .= '<td>';
            $projectenDisplay .= '<a href="' . PROJECTS_UPDATE . '/' . $row['id'] . '"<i class="fa fa-cog" style="padding: 0px 10px 0px 0px; font-size: 1.5em;"></i></a>';
            $projectenDisplay .= '<a href="' . PROJECTS_DELETE . '/' . $row['id'] . '"<i class="fa fa-times-circle"  style="color: red;font-size: 1.5em;"></i></a>';
            $projectenDisplay .= '</td>';
            $projectenDisplay .= '</tr>';
        }

        //            ($this->General->checkIp($row['rooturl']) !== $row['rooturl'] ? $projectenDisplay .= '<td>' . $this->General->checkIp($row['rooturl']) . '</td>' : $projectenDisplay .= '<td><i class="fa fa-times" style="color: red;"></i></td>');
        //            $projectenDisplay .= '<td>' . $this->Monitoring->getMonitors($row['url'])->monitors[0]->logs[0]->reason->detail . '</td>';


        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/projects/projects_reads.php';
        include './view/layout/footer.php';
    }

    /**
     * Creates a project
     */
    public function create() {

        $fases = $this->General->getFases()->fetchAll();

        /**
         * Input check
         */
        if (isset($_POST['project_title']) && isset($_POST['project_url']) && isset($_POST['project_rooturl']) && isset($_POST['project_prio']) && isset($_POST['project_fase']) && isset($_POST['project_email']) && isset($_POST['project_tel'])) {
            $date           = new DateTime();
            $projectTitle   = $this->General->prepareData($_POST['project_title']);
            $projectUrl     = $this->General->prepareData($_POST['project_url']);
            $projectRootUrl = $this->General->prepareData($_POST['project_rooturl']);
            $projectPrio    = $this->General->prepareData($_POST['project_prio']);
            $projectFase    = $this->General->prepareData($_POST['project_fase']);
            $projectEmail   = $this->General->prepareData($_POST['project_email']);
            $projectTel     = $this->General->prepareData($_POST['project_tel']);
            $projectDate    = $date->getTimestamp();

            /**
             * Data gets added
             */
            $newMonitor = $this->Monitoring->addMonitors($projectUrl, $projectTitle);
            $result     = $this->Projects->create($projectTitle, $projectUrl, $projectRootUrl, $projectPrio, $projectFase, $projectEmail, $projectTel, $projectDate);

            header('Location: ' . PROJECTS_READS);
        }

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/projects/projects_create.php';
        include './view/layout/footer.php';
    }

    /**
     * Creates a project
     */
    public function update($projectId) {

        $project = $this->Projects->read($projectId)->fetch(PDO::FETCH_ASSOC);
        $fases   = $this->General->getFases()->fetchAll();

        // Gets account details and its properties
        $statusMonitors = $this->Monitoring->getAccountDetails()->account;

        // SSL html
        $sslActivated = ($this->General->checkSSl($project['rooturl']) ? true : false);

        // IP Adres check
        $ipAdres = $this->General->checkIp($this->General->checkIp($project['rooturl']) !== $project['rooturl'] ? $this->General->checkIp($project['rooturl']) : '<i class="fa fa-times" style="color: red;"></i>');

        // Metadata & title
        $metaTitle = $this->General->checkTitle($project['url']);
        $metaData = $this->General->checkMetaTags($project['url']);

        // Previous/next URLs
        $previousUrl = PROJECTS_UPDATE . '/' . ($projectId + 1);
        $nextUrl     = PROJECTS_UPDATE . '/' . ($projectId - 1);


        /**
         * Input check
         */
        if (isset($_POST['project_title']) && isset($_POST['project_url']) && isset($_POST['project_rooturl']) && isset($_POST['project_prio']) && isset($_POST['project_fase']) && isset($_POST['project_email']) && isset($_POST['project_tel'])) {
            $date           = new DateTime();
            $projectTitle   = $this->General->prepareData($_POST['project_title']);
            $projectUrl     = $this->General->prepareData($_POST['project_url']);
            $projectRootUrl = $this->General->prepareData($_POST['project_rooturl']);
            $projectPrio    = $this->General->prepareData($_POST['project_prio']);
            $projectFase    = $this->General->prepareData($_POST['project_fase']);
            $projectEmail   = $this->General->prepareData($_POST['project_email']);
            $projectTel     = $this->General->prepareData($_POST['project_tel']);
            $projectDate    = $date->getTimestamp();

            /**
             * Data gets added
             */
            $newMonitor = $this->Monitoring->addMonitors($projectUrl, $projectTitle);
            $result     = $this->Projects->update($projectId, $projectTitle, $projectUrl, $projectRootUrl, $projectPrio, $projectFase, $projectEmail, $projectTel, $projectDate);

            header('Location: ' . PROJECTS_UPDATE . '/' . $projectId);
        }

        include './view/layout/header.php';
        include './view/layout/sidebar.php';
        include './view/projects/projects_update.php';
        include './view/layout/footer.php';
    }


    /**
     * Deletes a project
     *
     * @param $projectId
     * @param $monitorId
     */
    public function delete($projectId, $monitorId) {
        // Check if inputs a filled in
        if ($projectId && $monitorId) {
            $this->Monitoring->deleteMonitors($monitorId);
            $this->Projects->delete($projectId);
            header('Location: ' . PROJECTS_READS);
        }
    }
}

