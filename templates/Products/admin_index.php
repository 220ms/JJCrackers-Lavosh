<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<html lang="en">
  <head>
    
    <?= $this->Html->charset(); ?>
    <?= $this->Html->meta('viewport','width=device-width, initial-scale=1');?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>

    <title>JJCrackers - Admin</title>
    
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Roboto:400,700'); ?>
    <?= $this->Html->css('admin/fontawesome.min.css'); ?>
    <?= $this->Html->css('admin/bootstrap.min.css'); ?>
    <?= $this->Html->css('admin/templatemo-style.css'); ?>

  </head>

  <body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            
          <li class="nav-item">
            <button class="btn btn-primary btn-block text-uppercase mb-3" style="height:100%">
              <i class="fas fa-shopping-cart"></i>
              <span style="width: 10px"></span>
              <?= $this->Html->link("Products",$options =['controller'=>'products','action'=>'adminIndex']);?>
            </button>
              
            </li>
            <li>
                <button class="btn btn-primary btn-block text-uppercase mb-3" style="height:100%">
                  <i class="far fa-file-alt"></i>
                  <span style="width: 10px"></span>
                  <?= $this->Html->link("Orders",$options =['controller'=>'orders','action'=>'adminIndex']);?>
                </button>
            </li>

            <li>
                <button class="btn btn-primary btn-block text-uppercase mb-3" style="height:100%">
                  <i class="fas fa-cog"></i>
                  <span style="width: 10px"></span>
                  <?= $this->Html->link("Carousel",$options =['controller'=>'carousel','action'=>'index']);?>
                </button>
            </li>

          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <?= $this->Html->link('Admin, Logout', ['controller' => 'users', 'action' => 'logout']) ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <tbody>
                <thead>
                  <tr>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">CATEGORIES</th>
                    <th scope="col">DELETE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                  <?php foreach ($products as $product):?>
                    <tr>
                      
                      <td ><?= $this->Html->link(h($product->name),['action' => 'edit', $product->id]);?></td>
                      <td><?="$".$this->Number->format($product->price)?></td>
                      <td><?= h($product->quantity)  ?></td>
                      <td><?= h($product->category->name)?></td>
                      <td>
                      <?= $this->Form->postLink('<i class="far fa-trash-alt tm-product-delete-icon"></i>', ['action' => 'delete', $product->id],  ['confirm' => __('Are you sure you want to delete {0}?', $product->name),'escape'=>false]); ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3"><?= $this->Html->link("Add new product",$options=['controller'=>'products','action'=>'add']); ?></button>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">DELETE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $category):?>
                      <tr>
                        <td><?= $this->Html->link(h($category->name),['controller'=>'categories', 'action' => 'edit', $category->id]);?></td>
                        <td><?= $this->Form->postLink('<i class="far fa-trash-alt tm-product-delete-icon"></i>', ['controller'=>'Categories','action' => 'delete', $category->id],  ['confirm' => __('Are you sure you want to delete {0}?', $category->name),'escape'=>false]); ?></td>
                        
                      </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
            <?= $this->Html->link("Add new category",$options=['controller'=>'categories','action'=>'add']); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
    

    <?= $this->Html->script('admin/jquery-3.3.1.min.js') ?>
    
    <?= $this->Html->script('admin/bootstrap.min.js') ?>
    
    <?= $this->Html->script('https://kit.fontawesome.com/f581dffb67.js') ?>
  </body>
</html>
