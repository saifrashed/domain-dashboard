<?php

/**
 * Dashboard application paths
 * From here you can add/update or delete paths NOTE: Keep account with the router class and it's use
 */

define('APP_DIR', dirname(__FILE__));
define('BASE_URL', 'http://localhost:8080/Sites/projecten/Willekeurig/BlueBloq/dashboard/blueboq_dashboard/');

/**
 * Credentials
 */
define('DB_NAME', 'blueboq_dashboard');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Rashed112');

/**
 * Paths
 */
define('ADMIN_HOME', BASE_URL . 'admin/home');
define('ADMIN_LOGIN', BASE_URL . 'admin/login');
define('ADMIN_LOGOUT', BASE_URL . 'admin/logout');

define('PROJECTS_READS', BASE_URL . 'projects/reads');
define('PROJECTS_CREATE', BASE_URL . 'projects/create');
define('PROJECTS_UPDATE', BASE_URL . 'projects/update');
define('PROJECTS_DELETE', BASE_URL . 'projects/delete');

define('USERS_READS', BASE_URL . 'users/reads');
define('USERS_CREATE', BASE_URL . 'users/create');
define('USERS_UPDATE', BASE_URL . 'users/update');
define('USERS_DELETE', BASE_URL . 'users/delete');


/**
 * Main scripts and styling
 */
define('MAIN_STYLE', BASE_URL . 'dist/css/main.css');
define('MAIN_SCRIPT', BASE_URL . 'dist/js/adminlte.js');
define('DASHBOARD_SCRIPT', BASE_URL . 'dist/js/pages/dashboard.js');
define('DEMO_SCRIPT', BASE_URL . 'dist/js/demo.js');

/**
 * Dashboard scripts
 */
define('JQUERY', BASE_URL . 'plugins/jquery/jquery.min.js');
define('JQUERY_UI', BASE_URL . 'plugins/jquery-ui/jquery-ui.min.js');
define('BOOTSTRAP_JS', BASE_URL . 'plugins/bootstrap/js/bootstrap.bundle.min.js');
define('CHART_JS', BASE_URL . 'plugins/chart.js/Chart.min.js');
define('SPARKLINE_JS', BASE_URL . 'plugins/sparklines/sparkline.js');
define('JQUERY_VMAP_JS', BASE_URL . 'plugins/jqvmap/jquery.vmap.min.js');
define('JQUERY_VMAP_USA_JS', BASE_URL . 'plugins/jqvmap/maps/jquery.vmap.usa.js');
define('JQUERY_KNOB_JS', BASE_URL . 'plugins/jquery-knob/jquery.knob.min.js');
define('MOMENT_JS', BASE_URL . 'plugins/moment/moment.min.js');
define('DATERANGEPICKER_JS', BASE_URL . 'plugins/daterangepicker/daterangepicker.js');
define('TEMPUSDOMINUS_BOOTSTRAP_JS', BASE_URL . 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
define('SUMMERNOTE_JS', BASE_URL . 'plugins/summernote/summernote-bs4.min.js');
define('OVERLAYSCROLLBARS_JS', BASE_URL . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');

define('DATATABLES_JS', BASE_URL . 'plugins/datatables/jquery.dataTables.js');
define('DATATABLES_BOOTSTRAP_JS', BASE_URL . 'plugins/datatables-bs4/js/dataTables.bootstrap4.js');

define('SLIDER_BOOTSTRAP_JS', BASE_URL . 'plugins/bootstrap-slider/bootstrap-slider.min.js');

/**
 * Dashboard stylesheets
 */
define('FONTAWESOME_CSS', BASE_URL . 'plugins/fontawesome-free/css/all.min.css');
define('IONIC_CSS', BASE_URL . 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
define('TEMPUSDOMINUS_BOOTSTRAP_CSS', BASE_URL . 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');

define('ICHECK_BOOTSTRAP_CSS', BASE_URL . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css');
define('JQUERY_VMAP_CSS', BASE_URL . 'plugins/jqvmap/jqvmap.min.css');
define('OVERLAYSCROLLBARS_CSS', BASE_URL . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css');

define('DATERANGEPICKER_CSS', BASE_URL . 'plugins/daterangepicker/daterangepicker.css');
define('SUMMERNOTE_CSS', BASE_URL . 'plugins/summernote/summernote-bs4.css');

define('DATATABLES_BOOTSTRAP_CSS', BASE_URL . 'plugins/datatables-bs4/css/dataTables.bootstrap4.css');
define('SLIDER_BOOTSTRAP_CSS', BASE_URL . 'plugins/bootstrap-slider/css/bootstrap-slider.min.css');

/*
 * Api keys
 */
define('UPTIMEROBOT_KEY', 'u875625-e2324f5aa3db44ac0c2205b6');

?>
