<?php
require_once 'model/DataHandler.php';

/**
 * Class ProjectsLogic handles projects
 */
class ProjectsLogic {

    public function __construct() {
        $this->DataHandler = new Datahandler("localhost", "mysql", DB_NAME, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * Create business logic for a project
     *
     * @param $title
     * @param $url
     * @param $rooturl
     * @param $prio
     * @param $fase
     * @param $email
     * @param $tel
     * @param $date
     * @return string
     */
    public function create($title, $url, $rooturl, $prio, $fase, $email, $tel, $date) {
        return $this->DataHandler->createData('INSERT INTO projecten (titel, url, rooturl, prioriteit, fase, email, contact_telefoon, datum) VALUES("' . $title . '", "' . $url . '", "' . $rooturl . '", "' . $prio . '", "' . $fase . '", "' . $email . '", "' . $tel . '", "' . $date . '")');
    }

    /**
     * Reads business logic for a project
     *
     * @param $page
     * @return false|PDOStatement
     */
    public function reads($page) {

        $productsPerPage = 50;
        $offset          = $page * $productsPerPage;

        return $this->DataHandler->readsData('SELECT * FROM projecten ORDER BY prioriteit DESC LIMIT ' . $offset . ',' . $productsPerPage . ';');
    }

    /**
     * Reads business logic for a project
     *
     * @param $projectId
     * @return false|PDOStatement
     */
    public function read($projectId) {
        return $this->DataHandler->readsData('SELECT * FROM projecten WHERE id=' . $projectId . ';');
    }

    /**
     * Update business logic for a project
     *
     * @param $projectId
     * @param $title
     * @param $url
     * @param $rooturl
     * @param $prio
     * @param $fase
     * @param $email
     * @param $tel
     * @param $date
     * @return false|PDOStatement
     */
    public function update($projectId, $title, $url, $rooturl, $prio, $fase, $email, $tel, $date) {
        return $this->DataHandler->readsData('UPDATE projecten SET titel="' . $title . '", url="' . $url . '", rooturl="' . $rooturl . '", prioriteit="' . $prio . '", fase="' . $fase . '", email="' . $email . '", contact_telefoon="' . $tel . '", datum="' . $date . '" WHERE id="' . $projectId . '";');
    }

    /**
     * Delete business logic for a project
     *
     * @param $projectId
     * @return int
     */
    public function delete($projectId) {
        return $this->DataHandler->deleteData('DELETE FROM projecten WHERE id = ' . $projectId . '; ');
    }


    /**
     * Projects pagination
     *
     * @param $page
     * @return string
     */
    public function pagination($page) {

        $sum = $this->DataHandler->readsData('SELECT COUNT(*) AS total FROM projecten;')->fetch(PDO::FETCH_ASSOC);

        $totalRows        = $sum['total'];
        $paginationAmount = floor($totalRows / 50);


        $html = '<nav style="float:right">';
        $html .= '<ul class="pagination">';
        $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . (0) . '"><span aria-hidden="true">&laquo;&laquo;</span></a></li>';

        if (($page - 1) <! 0) {
            $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . ($page) . '">' . $page . '</a></li>';

        if (($page + 1) <= $paginationAmount) {
            $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . ($page + 1) . '">' . ($page + 1) . '</a></li>';
        }

        if (($page + 2) <= $paginationAmount) {
            $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
        }

        if (($page + 1) <= $paginationAmount) {
            $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
        }

        $html .= '<li class="page-item"><a class="page-link" href="' . PROJECTS_READS . '/' . $paginationAmount . '"><span aria-hidden="true">&raquo;&raquo;</span></a></li>';
        $html .= '</ul>';
        $html .= '</nav>';

        return $html;
    }
}

?>
