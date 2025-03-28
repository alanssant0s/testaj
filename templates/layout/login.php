<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>

    <?= $this->Html->charset() ?>
    <title>
        <?= Configure::read('Env.title');?> |
        Entrar
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= Configure::read('Env.title');?>" name="description" />

    <!-- App favicon -->
    <?= $this->Html->meta('icon', '/favicon.png'); ?>

    <?= $this->Html->script(['../assets/js/layout']) ?>
    <?= $this->Html->css(['../assets/css/bootstrap.min', '../assets/css/icons.min', '../assets/css/app.min', '../assets/css/custom.min' , 'cake', 'custom']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg"  id="">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="<?= $this->Url->build('/')?>" class="d-inline-block auth-logo">
                                <img src="<?= $this->Url->build('/img/'.Configure::read('Env.logo'))?>" alt="" height="100">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?= $this->Flash->render() ?>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-6">
                    <div class="card mt-4">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>

                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0"> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy; <script>document.write(new Date().getFullYear())</script> <?= Configure::read('Env.copy');?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<script>
    let in_teste = <?=Configure::read('Env.in_teste')?>;
    var baseURL = '<?=Configure::read('Env.base')?>';
</script>


<!-- JAVASCRIPT -->
<?= $this->Html->script([
        '../assets/libs/bootstrap/js/bootstrap.bundle.min',
    '../assets/libs/simplebar/simplebar.min',
    '../assets/libs/node-waves/waves.min',
    '../assets/libs/feather-icons/feather.min',
    '../assets/js/pages/plugins/lord-icon-2.1.0',
    '../assets/js/plugins',
    'custom'
]) ?>

<!-- particles js -->
<!-- password-addon init -->
<?= $this->Html->script(['../assets/js/pages/password-addon.init']) ?>

<?php echo $this->fetch('scriptBottom'); ?>
</body>

</html>
