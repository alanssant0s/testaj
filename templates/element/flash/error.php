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
<!--    <div class="message error" onclick="this.classList.add('hidden');">--><?//= $message ?><!--</div>-->

    <!--<div class="toastify on bg-danger toastify-center toastify-top" data-toast-duration="3000" style="transform: translate(0px, 0px); top: 15px;">--><?//= $message ?><!--</div>-->

<?php $this->append('scriptBottom'); ?>\
    <script type="text/javascript">

        Toastify({
            text: "<?= $message ?>",
            duration: in_teste ? 30000 : 10000,
            className: "bg-danger",
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            }
        ).showToast();

    </script>
<?php $this->end(); ?>