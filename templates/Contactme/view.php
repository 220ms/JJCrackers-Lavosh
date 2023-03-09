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
            <?= $this->Html->link(__('Edit Contactme'), ['action' => 'edit', $contactme->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contactme'), ['action' => 'delete', $contactme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactme->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contactme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contactme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactme view content">
            <h3><?= h($contactme->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactme->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($contactme->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($contactme->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($contactme->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= h($contactme->question) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contactme->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
