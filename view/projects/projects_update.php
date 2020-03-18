<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $project['titel'] ?></b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= ADMIN_HOME ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= PROJECTS_READS ?>/0">Projecten</a></li>
                        <li class="breadcrumb-item active">Pas project aan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <nav class="navbar navbar-expand navbar-primary navbar-dark">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-inline-block">
                                <a href="<?= $previousUrl ?>" class="nav-link"><i class="fa fa-arrow-left"></i> Vorige
                                    project</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item d-none d-inline-block float-right">
                                <a href="<?= $nextUrl ?>" class="nav-link">Volgende project <i
                                            class="fa fa-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-edit"></i>
                                <span><b><?= $project['titel'] ?></b></span>
                            </h3>
                        </div>
                        <div class="card-body">

                            <!-- Status display handeling -->
                            <div class="callout callout-info">
                                <h5>Status</h5>
                                <p><?= $this->Monitoring->getMonitors($project['url'])->monitors[0]->logs[0]->reason->detail ?></p>
                            </div>

                            <!-- IP Adres display handeling -->
                            <div class="callout callout-info">
                                <h5>IP Adres</h5>
                                <p><?= $ipAdres ?></p>
                            </div>

                            <!-- SSL alert display handeling -->
                            <?php if ($sslActivated) { ?>

                                <div class="callout callout-success">
                                    <h5>SSL is geactiveerd.</h5>
                                </div>

                            <?php } else { ?>

                                <div class="callout callout-danger">
                                    <h5>SSL is niet activeerd of wordt niet gevonden op de gegeven domein.</h5>

                                    <p>Kijk of de domein redirect naar een ander domein of kijk naar de hosting of de
                                        certificaat is opgevraagd.</p>
                                </div>

                            <?php } ?>

                            <br><br>

                            <h4>Informatie</h4>
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                               href="#custom-tabs-one-home" role="tab"
                                               aria-controls="custom-tabs-one-home" aria-selected="true">Metadata</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                               href="#custom-tabs-one-profile" role="tab"
                                               aria-controls="custom-tabs-one-profile" aria-selected="false">Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                               href="#custom-tabs-one-messages" role="tab"
                                               aria-controls="custom-tabs-one-messages"
                                               aria-selected="false">Tab</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                               href="#custom-tabs-one-settings" role="tab"
                                               aria-controls="custom-tabs-one-settings"
                                               aria-selected="false">Tab</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                             aria-labelledby="custom-tabs-one-home-tab">
                                            <?php


                                            if ($metaTitle) {
                                                echo '<div class="tab-custom-content"><p class="lead mb-0"><b>Title</b>: ' . $metaTitle . '</p></div>';
                                            }

                                            if ($metaData) {
                                                foreach ($metaData as $key => $value) {
                                                    echo '<div class="tab-custom-content"><p class="lead mb-0"><b>' . $key . '</b>: ' . $value . '</p></div>';
                                                }
                                            }
                                            else {
                                                echo 'No meta data available';
                                            }

                                            ?>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                             aria-labelledby="custom-tabs-one-profile-tab">
                                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
                                            pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum
                                            dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in
                                            faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                                            sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere
                                            purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at,
                                            posuere nec nunc. Nunc euismod pellentesque diam.
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                             aria-labelledby="custom-tabs-one-messages-tab">
                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                            Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa
                                            eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer
                                            vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                            condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis
                                            velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum
                                            odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                            lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum
                                            metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac
                                            ornare magna.
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                             aria-labelledby="custom-tabs-one-settings-tab">
                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna,
                                            iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor.
                                            Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique.
                                            Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat
                                            urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at
                                            consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse
                                            platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Project aanpassen</h3>
                                </div>

                                <form action="<?= PROJECTS_UPDATE ?>/<?= $projectId ?>/<?= $monitoringId ?>"
                                      method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Project titel</label>
                                            <input type="text" name="project_title" value="<?= $project['titel'] ?>"
                                                   class="form-control" placeholder="Titel"
                                                   required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label>Project URL</label>
                                            <input type="url" name="project_url" value="<?= $project['url'] ?>"
                                                   class="form-control"
                                                   placeholder="(example: https://google.com)"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label>Project Root URL</label>
                                            <input type="text" name="project_rooturl" value="<?= $project['rooturl'] ?>"
                                                   class="form-control"
                                                   placeholder="(example: google.com)"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label>Prioriteit</label>

                                            <input type="range" name="project_prio"
                                                   value="<?= $project['prioriteit'] ?>"
                                                   class="custom-range" min="0" max="10" step="1">
                                        </div>

                                        <div class="form-group">
                                            <label>Fase</label>
                                            <select name="project_fase" class="form-control" required>
                                                <?php
                                                foreach ($fases as $key => $value) {

                                                    if ($value['id'] === $project['fase']) {
                                                        echo '<option value="' . $value['id'] . '" selected>' . $value['fase'] . '</option>';
                                                    }
                                                    else {
                                                        echo '<option value="' . $value['id'] . '">' . $value['fase'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" name="project_email" value="<?= $project['email'] ?>"
                                                   class="form-control" placeholder="example@gmail.nl">
                                        </div>

                                        <div class="form-group">
                                            <label>Telefoon contactpersoon</label>
                                            <input type="number" name="project_tel"
                                                   value="<?= $project['contact_telefoon'] ?>"
                                                   class="form-control" placeholder="0640727258">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Verzend
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
