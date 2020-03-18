<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gebruiker</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= ADMIN_HOME ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= USERS_READS ?>">Gebruiker</a></li>
                        <li class="breadcrumb-item active">Voeg gebruiker toe</li>
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
                            <h3 class="card-title">Voeg gebruiker toe</h3>
                        </div>

                        <form action="<?= USERS_CREATE ?>" method="POST">
                            <div class="card-body">


                                <!-- Gebruikers naam -->
                                <div class="form-group">
                                    <label>Gebruikersnaam</label>
                                    <input type="text" name="gebruiker_naam" class="form-control" required autofocus>
                                </div>


                                <!-- Gebruikers email -->
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="gebruiker_email" class="form-control"
                                           placeholder="name@example.com" required>
                                </div>

                                <!-- Gebruikers wachtwoord -->
                                <div class="form-group">
                                    <label>Wachtwoord</label>
                                    <input type="password" name="gebruiker_wachtwoord" class="form-control" required>
                                </div>

                                <!-- Gebruikers rol -->
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="gebruiker_rol" multiple class="form-control">
                                        <?= $roles ?>
                                    </select>
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
