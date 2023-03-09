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
            <?= $this->Html->link(__('List Carousel'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carousel form content">
            <?= $this->Form->create($carousel, ['type'=>'file'],['class' => 'carousel-form']) ?>
            <fieldset>
                <legend><?= __('Add Carousel') ?></legend>
                <?php
                    echo $this->Form->control('photo',['type'=>'file']);
                    echo $this->Form->control('heading');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
