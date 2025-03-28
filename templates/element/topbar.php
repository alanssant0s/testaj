<?php
use \Cake\Core\Configure;
?>
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header ">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="/" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="25">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="25">
                        </span>
                    </a>

                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="25">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="25">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->

            </div>

            <div class="d-flex flex-row-reverse align-items-center w-75 right">

                <?= $this->element('user-topbar') ?>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
</header>
