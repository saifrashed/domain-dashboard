<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projecten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= ADMIN_HOME ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= PROJECTS_READS ?>">Projecten</a></li>
                        <li class="breadcrumb-item active">Voeg project toe</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Voeg project toe</h3>
                        </div>

                        <form action="<?= PROJECTS_CREATE ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Project titel</label>
                                    <input type="text" name="project_title" class="form-control" placeholder="Example"
                                           required autofocus>
                                </div>

                                <div class="form-group">
                                    <label>Project URL</label>
                                    <input type="url" name="project_url" class="form-control"
                                           placeholder="(example: https://google.com)"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>Project Root URL</label>
                                    <input type="text" name="project_rooturl" class="form-control"
                                           placeholder="(example: google.com)"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>Prioriteit</label>
                                    <input type="number" name="project_prio" class="form-control"
                                           placeholder="1 t/m 10" required>
                                </div>

                                <div class="form-group">
                                    <label>Fase</label>
                                    <select name="project_fase" class="form-control" required>
                                        <?php
                                        foreach ($fases as $key => $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['fase'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="project_email" class="form-control"
                                           placeholder="example@gmail.nl">
                                </div>

                                <div class="form-group">
                                    <label>Telefoon contactpersoon</label>
                                    <input type="number" name="project_tel" class="form-control"
                                           placeholder="0640727258">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Voeg toe
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
