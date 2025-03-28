<?php

use App\Model\Entity\Auth;
use App\Model\Entity\User;
use Cake\Core\Configure;
use Cake\View\View;

/**
 * @var \App\Model\Entity\User $loggedUser
 **/
$controller = View::getRequest()->getAttribute('params')['controller'];
$action = View::getRequest()->getAttribute('params')['action'];
?>


<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">Menu</span></li>

    <li class="nav-item">
        <a class="nav-link menu-link <?= ($controller == 'Processes' && $action == 'search') ? 'active' : '' ?>" href="<?= $this->Url->build("/processes/search") ?>" />
        <i class="las la-file-invoice-dollar"></i> <span data-key="t-Jurisprudência">Jurimetria</span>
        </a>
    </li>

    <?php if ($loggedUser->auth_id <= Auth::$_TYPE_ADMIN): ?>
    <li class="nav-item">
        <a class="nav-link menu-link <?= ($controller == 'Processes') ? 'collapsed active' : '' ?>" href="#processes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="cadastros">
            <i class="ri-play-list-add-line"></i> <span data-key="t-processes" class="mx-1">Processos</span>
        </a>
        <div class="collapse menu-dropdown <?= ($controller == 'Processes') ? 'show' : '' ?>" id="cadastros">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="<?= $this->Url->build("/processes/") ?>" class="nav-link <?= ($action == 'index') ? 'active' : '' ?>" data-key="t-processes"> Processos </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build("/processes/myProcesses") ?>" class="nav-link <?= ($action == 'myProcesses') ? 'active' : '' ?>" data-key="t-myProcesses"> Seus Processos </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build("/processes/myImports") ?>" class="nav-link <?= ($action == 'myImports') ? 'active' : '' ?>" data-key="t-myImports"> Suas Importações </a>
                </li>
                <?php if ($loggedUser->auth_id <= Auth::$_TYPE_MODERADOR): ?>
                    <li class="nav-item">
                        <a href="<?= $this->Url->build("/processes/evaluate") ?>" class="nav-link <?= ($action == 'evaluate') ? 'active' : '' ?>" data-key="t-evaluate"> Avaliar Processos </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </li> <!-- end Meets Menu -->
    <?php endif; ?>

    <?php if ($loggedUser->auth_id <= Auth::$_TYPE_ADMIN): ?>
        <li class="nav-item">
            <a class="nav-link menu-link <?= ($controller == 'AirlineCompanies' || $controller == 'Districts' || $controller == 'Judges' || $controller == 'Users') ? 'collapsed active' : '' ?>" href="#cadastros" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="cadastros">
                <i class="ri-play-list-add-line"></i> <span data-key="t-cadastros" class="mx-1">Cadastros</span>
            </a>
            <div class="collapse menu-dropdown <?= ($controller == 'AirlineCompanies' || $controller == 'Districts' || $controller == 'Judges' || $controller == 'Users') ? 'show' : '' ?>" id="cadastros">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="<?= $this->Url->build("/airlineCompanies/") ?>" class="nav-link <?= ($controller == 'AirlineCompanies') ? 'active' : '' ?>" data-key="t-airlineCompanies"> Cia Aérea </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= $this->Url->build("/districts/") ?>" class="nav-link <?= ($controller == 'Districts') ? 'active' : '' ?>" data-key="t-districts"> Comarcas </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= $this->Url->build("/judges/") ?>" class="nav-link <?= ($controller == 'Judges') ? 'active' : '' ?>" data-key="t-juizes"> Juizes </a>
                    </li>
                    <?php if ($loggedUser->auth_id <= Auth::$_TYPE_MASTER): ?>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build("/users/") ?>" class="nav-link <?= ($controller == 'Users') ? 'active' : '' ?>" data-key="t-users"> Usuários </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li> <!-- end Meets Menu -->
    <?php else: ?>
    <?php endif; ?>

</ul>
