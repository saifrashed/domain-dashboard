<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= ADMIN_HOME ?>" class="brand-link">
        <img src="<?= BASE_URL ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Blue Boq Dashboard</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= ADMIN_HOME ?>" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>Home</p>
                    </a>
                </li>


                <?php if($_SESSION['rol'] == 'Beheerder') { ?>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>
                            Gebruikers
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= USERS_READS ?>" class="nav-link">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Alle Gebruikers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= USERS_CREATE ?>" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Voeg Gebruiker toe</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php } ?>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Projecten
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= PROJECTS_READS ?>/0" class="nav-link">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Alle projecten</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PROJECTS_CREATE ?>" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Voeg project toe</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
