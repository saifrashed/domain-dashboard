<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gebruikers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= ADMIN_HOME ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= EVENT_READS ?>">Gebruikers</a></li>
                            <li class="breadcrumb-item active">Alle gebruikers</li>
                        </ol>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Evenementen</h3>
                        </div>
                        <div class="card-body">
                            <?= $table; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
