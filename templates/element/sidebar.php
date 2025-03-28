<?php
use \Cake\Core\Configure;
?>


<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo $this->Url->build('/dashboard')?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="40">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo $this->Url->build('/dashboard')?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="20">
            </span>
            <span class="logo-lg">
                <img src="<?= $this->Url->build('/logo.png')?>" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <?= $this->element('menubar' . Configure::read('Env.sufix')) ?>
        </div>
        <!-- Sidebar -->
    </div>

</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
