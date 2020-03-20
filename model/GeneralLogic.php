<?php
require_once 'model/DataHandler.php';

class GeneralLogic {

    public function __construct() {
        $this->DataHandler = new Datahandler("localhost", "mysql", DB_NAME, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * Validates strings
     *
     * @param $data
     * @return mixed|string
     */
    public function prepareData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        return $data;
    }

    /**
     * Gets a phases of a project
     *
     * @return false|PDOStatement
     */
    public function getFases() {
        return $this->DataHandler->readsData('SELECT * FROM projecten_fases;');
    }

    /**
     * Checks a domain for SSL
     *
     * @param $url
     * @return bool
     */
    public function checkSSL($url) {
        $ssl_check = @fsockopen('ssl://' . $url, 443, $errno, $errstr, 30);
        $res       = !!$ssl_check;

        if ($ssl_check) {
            fclose($ssl_check);
        }

        return $res;
    }

    /**
     * Gets IP Adres of a domain,
     *
     * @param $url
     * @return string
     */
    public function checkIp($url) {
        return gethostbyname($url);
    }

    public function checkTitle($url, $status) {
        if ($status == 'OK') {
            $data  = file_get_contents($url);
            $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $data, $matches) ? $matches[1] : null;
            return $title;
        } else {
            return false;
        }
    }

    /**
     * Gets meta tags from given url
     *
     * @param $url
     * @return array
     */
    public function checkMetaTags($url, $status) {
        if ($status == 'OK') {
            return get_meta_tags($url);
        } else {
            return false;
        }
    }


    /**
     * Handles dynamic data tables
     *
     * @param        $columnsArray
     * @param        $result
     * @param bool   $readAction
     * @param bool   $deleteAction
     * @param string $controller
     * @return string
     */
    public function displayDataTable($columnsArray, $result, $tableName, $readAction = false, $deleteAction = false, $controller = '', $idColumn = '') {

        $primaryColumn = $this->DataHandler->readData('SHOW KEYS FROM ' . $tableName . ' WHERE Key_name = "PRIMARY"')->fetch(PDO::FETCH_ASSOC);


        $html = '';

        $html .= '<table id="datatable" class="table table-bordered table-striped">';
        $html .= '<thead>';
        $html .= '<tr>';

        // top column
        foreach ($columnsArray as $dbName => $label) {
            $html .= '<th>' . $label . '</th>';
        }

        if ($readAction || $deleteAction) {
            $html .= '<th>Acties</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= '<tr>';

            // top columns
            foreach ($columnsArray as $dbName => $label) {
                $html .= '<td>' . $row[$dbName] . '</td>';
            }

            $html .= '<td>';

            if ($readAction || $deleteAction) {
                if ($readAction) {
                    $html .= '<a href="' . BASE_URL . $controller . '/update/' . $row[$idColumn] . '"<i class="fa fa-cog" style="padding: 0px 10px 0px 0px; font-size: 1.5em;"></i></a>';
                }

                if ($deleteAction) {
                    $html .= '<a href="' . BASE_URL . $controller . '/delete/' . $row[$idColumn] . '"<i class="fa fa-times-circle"  style="color: red; padding: 0px 10px 0px 0px; font-size: 1.5em;"></i></a>';
                }
            }

            $html .= '</td>';

            $html .= '</tr>';
        }


        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }
}

?>
