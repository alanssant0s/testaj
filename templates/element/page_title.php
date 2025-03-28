<?php

use Cake\View\View;

$controller_default = View::getRequest()->getAttribute('params')['controller'];
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= ($action_title) ? h($action_title) : '' ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/<?=$controller_default?>"><?= ($controller_title) ? h($controller_title) : '' ?></a></li>
                    <li class="breadcrumb-item active"><?= ($action_title) ? h($action_title) : '' ?></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->