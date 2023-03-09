<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel $carousel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Carousel'), ['action' => 'edit', $carousel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Carousel'), ['action' => 'delete', $carousel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carousel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carousel'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Carousel'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carousel view content">
            <h3><?= h($carousel->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($carousel->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Heading') ?></th>
                    <td><?= h($carousel->heading) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($carousel->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carousel->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
