<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel[]|\Cake\Collection\CollectionInterface $carousel
 */
?>
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
    
    <?= $this->Html->css('fonts.googleapis.com/css?family=Roboto:400,700'); ?>
    <?= $this->Html->css('admin/fontawesome.min.css'); ?>
    <?= $this->Html->css('admin/bootstrap.min.css'); ?>
    <?= $this->Html->css('admin/templatemo-style.css'); ?>

  </head>

  <body id="reportsPage">
  <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand">
          <h1 class="tm-site-title mb-0">Carousel Admin</h1>
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
                    <th scope="col">ACTION</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">HEADING</th>
                    <th scope="col">DESCRIPTION</th>
                  </tr>
                </thead>
                  <?php foreach ($carousel as $car):?>
                    <tr>
                      <td>
                      <?= $this->Html->link('<i class="fas fa-cog"></i>', ['action' => 'edit', $car->id],  ['confirm' => __('Are you sure you want to edit {0}?', $car->id),'escape'=>false]); ?>
                      </td>
                      <td><?=h('Carousel_' . $car->id)?></td>
                      <td><?=h($car->heading)?></td>
                      <td><?= h($car->description)?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
          </div>
        </div>
      </div>
    </div>
    

    <?= $this->Html->script('admin/jquery-3.3.1.min.js') ?>
    
    <?= $this->Html->script('admin/bootstrap.min.js') ?>
    
    <?= $this->Html->script('https://kit.fontawesome.com/f581dffb67.js') ?>
  </body>
</html>
