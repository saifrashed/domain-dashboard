<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blue Boq | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= DATATABLES_BOOTSTRAP_CSS ?>">
    <link rel="stylesheet" href="<?= IONIC_CSS ?>">
    <link rel="stylesheet" href="<?= TEMPUSDOMINUS_BOOTSTRAP_CSS ?>">
    <link rel="stylesheet" href="<?= ICHECK_BOOTSTRAP_CSS ?>">
    <link rel="stylesheet" href="<?= JQUERY_VMAP_CSS ?>">
    <link rel="stylesheet" href="<?= MAIN_STYLE ?>">
    <link rel="stylesheet" href="<?= OVERLAYSCROLLBARS_CSS ?>">
    <link rel="stylesheet" href="<?= DATERANGEPICKER_CSS ?>">
    <link rel="stylesheet" href="<?= SUMMERNOTE_CSS ?>">
    <link rel="stylesheet" href="<?= SLIDER_BOOTSTRAP_CSS ?>">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="###" class="nav-link"><?= $_SESSION['email'] ?></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= ADMIN_LOGOUT ?>" class="nav-link">Logout</a>
            </li>
        </ul>
    </nav>
