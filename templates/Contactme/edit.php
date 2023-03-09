<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contactme $contactme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactme->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactme->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contactme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactme form content">
            <?= $this->Form->create($contactme) ?>
            <fieldset>
                <legend><?= __('Edit Contactme') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('question');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
