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
<div class="alert alert-success" role ="alert">
    <span class="fa fa-success" aria-hidden="true"></span>
    <span class="sr-only">Success:</span>
    <?= $message ?>
</div>
