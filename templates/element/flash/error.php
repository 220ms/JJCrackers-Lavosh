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
<div class="alert alert-danger" role ="alert">
    <span class="fa fa-warning" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    <?= $message ?>
</div>

