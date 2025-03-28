<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<!--<section class="content-header">-->
<!--    <div class="alert alert-success alert-dismissible">-->
<!--        --><?//= h($message) ?>
<!--    </div>-->
<!--</section>-->
<?php $this->append('scriptBottom'); ?>\
    <script type="text/javascript">

        Toastify({
                text: "<?= $message ?>",
                duration: in_teste ? 30000 : 10000,
                className: "bg-success",
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
            }
        ).showToast();

    </script>
<?php $this->end(); ?>