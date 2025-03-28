<div class="dropdown ms-sm-3 header-item topbar-user">
    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= isset($loggedUser)? $loggedUser->name : ""?></span>
                            </span>
                        </span>
    </button>

    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <h6 class="dropdown-header">Bem-vindo <?= isset($loggedUser)? $loggedUser->name : ""?>!</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= $this->Url->build('/users/logout')?>">
            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle" data-key="t-logout">Sair</span>
        </a>
    </div>
</div>
