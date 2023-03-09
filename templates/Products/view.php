<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <?= $this->Html->meta('viewport','width=device-width, initial-scale=1');?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>JJCrackers - Fresh Lavosh</title>
    
    <!-- Google Fonts -->
    <?= $this->Html->css('fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600'); ?>
    <?= $this->Html->css('fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300'); ?>
    <?= $this->Html->css('fonts.googleapis.com/css?family=Raleway:400,100'); ?>
    
    
    <!-- Bootstrap -->
    <?= $this->Html->css('maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'); ?>
    
    <!-- Font Awesome -->
    <?= $this->Html->css('maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); ?>
    
    <!-- Custom CSS -->
    <?= $this->Html->css('style'); ?>
    <?= $this->Html->css('owl.carousel'); ?>
    <?= $this->Html->css('responsive.css'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= $this->Html->script('oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') ?>
    <?= $this->Html->script('oss.maxcdn.com/respond/1.4.2/respond.min.js') ?>


  </head>
<body>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="products view content">
                <h3><?= h($product->name) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($product->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($product->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Photo') ?></th>
                        <td><?= $this->Html->image($product->photo) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($product->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Price') ?></th>
                        <td><?= $this->Number->format($product->price) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Category Id') ?></th>
                        <td><?= $product->category_id === null ? '' : $this->Number->format($product->category_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Quantity') ?></th>
                        <td><?= $this->Number->format($product->quantity) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
