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

    <title>JJCrackers - Admin</title>
    
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Roboto:400,700'); ?>
    <?= $this->Html->css('admin/fontawesome.min.css'); ?>
    <?= $this->Html->css('admin/bootstrap.min.css'); ?>
    <?= $this->Html->css('admin/templatemo-style.css'); ?>

  </head>
  
  <body>
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
            </button>>
              
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
              <?= $this->Html->link('Admin, Logout', ['controller' => 'users', 'action' => 'logout','escape'=>false]) ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <?= $this->Form->create($product, ['type'=>'file'], ['class' => 'products-form']) ?>

                  <div class="form-group mb-3">
                    
                    <?= $this->Form->control('name', ['class'=>'form-control validate']); ?>
                  </div>
                  
                  <div class="form-group mb-3">
                    <?= $this->Form->control('description', ['type' => 'textarea','escape' => false,'rows' =>'3', 'class'=>'form-control validate'],); ?>
                  </div>

                  <div class="form-group mb-3">
                    <?= $this->Form->control('category', ['options' => $categories], ['class' => 'custom-select tm-select-accounts', 'default' => $product->category_id]); ?>
                  </div>
       
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                        <?= $this->Form->control('price', ['class' => 'form-control validate']); ?>
                      </div>
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <?= $this->Form->control('quantity', ['class' => 'form-control validate']); ?>
                      </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                <?= $this->Html->image('products-img/' . $product->photo, ['class'=> 'tm-product-img-dummy mx-auto']) ?>

                <div class="custom-file mt-3 mb-3" style="color: white">
                  <?= $this->Form->control('change_photo', ['type'=>'file']); ?>
                </div>
              </div>
              <div class="col-12">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-block text-uppercase']) ?>
                <?= $this->Form->end() ?>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
        </div>
    </footer> 

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->

    <?= $this->Html->script('https://kit.fontawesome.com/f581dffb67.js') ?>
  </body>
</html>
