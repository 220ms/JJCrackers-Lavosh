<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contactme> $contactme
 */
?>
<div class="contactme index content">
    <?= $this->Html->link(__('New Contactme'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contactme') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('question') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactme as $contactme): ?>
                <tr>
                    <td><?= $this->Number->format($contactme->id) ?></td>
                    <td><?= h($contactme->email) ?></td>
                    <td><?= h($contactme->phone_number) ?></td>
                    <td><?= h($contactme->first_name) ?></td>
                    <td><?= h($contactme->last_name) ?></td>
                    <td><?= h($contactme->question) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactme->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactme->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactme->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
