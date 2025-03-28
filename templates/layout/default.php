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
 * @var string $layoutMode
 * @var string $hamburguerEnable
 */

use Cake\Core\Configure;
$controller = \Cake\View\View::getRequest()->getAttribute('params')['controller'];
$action = \Cake\View\View::getRequest()->getAttribute('params')['action'];
$dash_actions = ['principal', 'module'];
?>

<!doctype html>
<html lang="pt-bt" data-layout="horizontal" data-layout-mode="<?= $layoutMode ?>" data-sidebar="dark" data-layout-position="fixed" data-topbar="dark" dir="lrt"

    <?php if($hamburguerEnable):?>
        data-sidebar-size="sm"
    <?php endif;?>
>

<head>

    <?= $this->Html->charset() ?>
    <title>
        <?= Configure::read('Env.title');?> | <?= $controller ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= Configure::read('Env.title');?>" name="description" />
    <!-- App favicon -->
    <?= $this->Html->meta('icon', '/favicon.png'); ?>


    <!-- plugin css -->
    <link href="" rel="stylesheet" type="text/css" />

    <?= $this->fetch('css') ?>


    <?= $this->Html->css(['../assets/libs/select2/css/select2.min']);?>
    <?= $this->Html->script(['../assets/js/layout']) ?>
    <?= $this->Html->css([ '../assets/css/bootstrap.min', '../assets/css/icons.min', 'app', '../assets/css/app.min',
        '../assets/css/custom.min', 'custom']) ?>

    <?= $this->fetch('meta') ?>


    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        //OneSignal
    </script>


</head>

<body style class="vsc-initialized">

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->element('menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <br/><br/><br/><br/>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Agência Flamingo.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>


<script>
    let loading_content = '<?=$this->element('loading_content')?>';
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
    '../assets/js/plugins.js'

]) ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<?= $this->fetch('script') ?>

<?= $this->Html->script(['../assets/libs/select2/js/select2.min', '../assets/js/app', 'custom']);?>

<script>
</script>


<?php echo $this->fetch('scriptBottom'); ?>

</body>

</html>
