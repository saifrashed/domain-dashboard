<?php

/**
 * This project is an open source implementation for acessing the UptimeRobot api.
 * Full documentation: http://uptimerobot.com/api
 *
 * @version     1.0
 * @author      Watchful
 * @authorUrl   http://www.watchful.li
 * @filesource  From mb2o <https://github.com/CodingOurWeb/PHP-wrapper-for-UptimeRobot-API>
 * @license     GNU General Public License version 2 or later
 */
class MonitoringLogic {

    /**
     * MonitoringLogic constructor.
     *
     * @param        $apiKey
     * @param string $format
     */
    public function __construct($apiKey, $format = 'json') {

        $this->base_uri = 'https://api.uptimerobot.com/v2';
        $this->apiKey   = $apiKey;
        $this->format   = $format;
    }


    /**
     * Gets all monitors optionally based on a search
     *
     * @param string $search
     * @return mixed|string
     */
    public function getMonitors($search = '') {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.uptimerobot.com/v2/getMonitors",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "api_key=" . UPTIMEROBOT_KEY . "&format=json&logs=1&ssl=1&search=" . $search . "",
            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        else {
            return json_decode($response);
        }
    }

    /**
     * Adds a monitor
     *
     * @param $url
     * @param $friendlyName
     * @return mixed|string
     */
    public function addMonitors($url, $friendlyName) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.uptimerobot.com/v2/newMonitor",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "api_key=" . UPTIMEROBOT_KEY . "&format=json&type=1&url=" . $url . "&friendly_name=" . $friendlyName,
            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        else {
            return json_decode($response);
        }
    }

    /**
     * Deletes monitor
     *
     * @param $id
     * @return mixed|string
     */
    public function deleteMonitors($monitorId) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.uptimerobot.com/v2/deleteMonitor",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "api_key=" . UPTIMEROBOT_KEY . "&format=json&id=" . $monitorId,
            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        else {
            return json_decode($response);
        }
    }

    /**
     * Gets account details (and current count of status)
     *
     * @return mixed|string
     */
    public function getAccountDetails() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.uptimerobot.com/v2/getAccountDetails",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "api_key=" . $this->apiKey . "&format=json",
            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        else {
            return json_decode($response);
        }
    }
}
