<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Projecten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= ADMIN_HOME ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= PROJECTS_READS ?>">Projecten</a></li></li>
                        <li class="breadcrumb-item active">Alle projecten</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3><?php echo $statusMonitors->up_monitors; ?></h3>
                            <p><b>Functioneert</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-signal"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                            <h3><?php echo $statusMonitors->down_monitors; ?></h3>
                            <p><b>Probleem</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3><?php echo $statusMonitors->paused_monitors; ?></h3>
                            <p><b>Niet bekend</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-question"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <section class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Projecten</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Domein</th>
                                        <th scope="col">Datum aangemaakt</th>
                                        <th scope="col">Prioriteit</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $projectenDisplay ?>
                                    </tbody>
                                </table>
                            </div>
                            <?= $pagination ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
