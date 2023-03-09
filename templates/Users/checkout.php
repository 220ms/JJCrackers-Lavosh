<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset(); ?>
    <?= $this->Html->meta('viewport','width=device-width, initial-scale=1');?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>JJCrackers - Fresh Lavosh</title>
    
    <!-- Google Fonts -->
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300'); ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Raleway:400,100'); ?>
    
    
    <!-- Bootstrap -->
    <?= $this->Html->css('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'); ?>
    
    <!-- Font Awesome -->
    <?= $this->Html->css('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); ?>
    
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
    <?= $this->Html->script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') ?>
    <?= $this->Html->script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') ?>


  </head>
  <body>
   

    
  <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="">JJ<span>Crackers</span></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?= $this->Url->build(array('controller'=>'orders','action'=>'cart')) ?>">Cart<i class="fa fa-shopping-cart"></i></a>
                    </div>
                    <div class="shopping-item">
                        <a href="<?= $this->Url->build(array('controller'=>'users','action'=>'login')) ?>">Login</a>
                    </div>
                    <div class="shopping-item">
                        <a href="<?= $this->Url->build(array('controller'=>'users','action'=>'logout')) ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= $this->Url->build(array('controller'=>'products','action'=>'index')) ?>">Home</a></li>
                        <li><?= $this->Html->link("All Products",['controller' => 'products', 'action' => 'show'])?></li>
                        <li><a href="<?= $this->Url->build(array('controller'=>'users','action'=>'about')) ?>">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            <?= $this->Form->create($user, ['class' => 'users-form']) ?>

                                            <div class="form-group mb-3">
                                                
                                                <?= $this->Form->control('first_name', ['class'=>'form-control validate']); ?>
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <?= $this->Form->control('last_name', [ 'class'=>'form-control validate'],); ?>
                                            </div>

                                            <div class="form-group mb-3">
                                                <?= $this->Form->control('street_address', ['type' => 'textarea','escape' => false,'rows' =>'3', 'class'=>'form-control validate']); ?>
                                            </div>

                                            <div class="form-group mb-3">
                                                <?= $this->Form->control('email', [ 'class'=>'form-control validate'],); ?>
                                            </div>

                                            <div class="form-group mb-3">
                                                <?= $this->Form->control('phone_number', [ 'class'=>'form-control validate'],); ?>
                                            </div>
                  
                            
                                            <div class="clear"></div>
                                            <div class="col-12">
                                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-block text-uppercase']) ?>
                                            <?= $this->Form->end() ?>
                                            </div>




                                        </div>
                </div>
                
                <div class="col-md-8">
                <div class="product-content-right">
                          <div class="woocommerce">
                              <form method="post" action="#">
                                <h3>Product list</h3>
                                  <table cellspacing="0" class="shop_table cart">
                                      <thead>
                                          <tr>
                                              <!-- <th class="product-remove">&nbsp;</th> -->
                                              <th class="product-thumbnail">&nbsp;</th>
                                              <th class="product-name">Product</th>
                                              <th class="product-price">Price</th>
                                              <th class="product-quantity">Quantity</th>
                                              <th class="product-subtotal">Total</th>
                                          </tr>
                                      </thead>
                                      <?php if(sizeof($product_list) > 0): ?>
                                        <?php foreach ($product_list as $product):?>
                                      <tbody>
                                          <tr class="cart_item">
                                              <!-- <td class="product-remove">
                                                  <a title="Remove this item" class="remove" href="#">×</a> 
                                              </td> -->

                                              <td class="product-thumbnail">
                                                  <?= $this->Html->image('products-img/' . $product->photo)?>
                                              </td>

                                              <td class="product-name">
                                                <?= h($product->name) ?>
                                              </td>

                                              <td class="product-price">
                                              <?= "$".$this->Number->format($product->price) ?>
                                              </td>

                                              <td class="product-quantity">
                                                <p><?=$this->Number->format($product->purchase_quantity) ?></p>
                                              </td>

                                              <td class="product-subtotal">
                                              <?= "$".$this->Number->format($product->total_price) ?>
                                              </td>
                                          </tr>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                      
                                      
                                          
                                      </tbody>
                                      
                                  </table>
                              </form>
                          </div>

                            <div class="cart-collaterals">


                              


                              <div class="cart_totals ">
                                  <h2>Cart Total</h2>

                                  <table cellspacing="0">
                                      <tbody>
                                          <tr class="order-total">
                                              <th>Order Total</th>
                                              <td><strong><span class="amount"><?= '$'.$total_price?></span></strong> </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>



                              </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>JJ<span>Crackers</span></h2>
                        <p>We are JJCrackers a premium lavosh creator and distributor, centered around making the best lavosh so that our customers can enjoy premium products. Our aim is to make lavosh more of a household staple, and provide goods that are consumable in any setting!</p>
                        <div class="footer-social">
                            <?= $this->Html->link("","http://www.facebook.com",$options=['class'=>'fa fa-facebook','target' => '_blank', '_full' => true]);?>
                            <?= $this->Html->link("","http://www.twitter.com",$options=['class'=>'fa fa-twitter','target' => '_blank', '_full' => true]);?>
                            <?= $this->Html->link("","http://www.youtube.com",$options=['class'=>'fa fa-youtube','target' => '_blank', '_full' => true]);?>
                            <?= $this->Html->link("","http://www.linkedin.com",$options=['class'=>'fa fa-linkedin','target' => '_blank', '_full' => true]);?>
                            <?= $this->Html->link("","http://www.pinterest.com",$options=['class'=>'fa fa-pinterest','target' => '_blank', '_full' => true]);?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><?= $this->Html->link("All Products",$options =['controller'=>'products','action'=>'show']);?></li>
                            <li><?= $this->Html->link("Current Cart",$options = ['controller'=>'orders','action'=>'cart']); ?></li>
                            <li><?= $this->Html->link("Home",$options = ['controller'=>'products','action'=>'index']);?></li>
                        </ul>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Contact</h2>
                        <p>Contact number:<br> 0467352128<br>contact email: <br>JJCrackersEnquiries@gmail.com</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2022 JJCrackers. All Rights Reserved. Coded with <i class="fa fa-heart"></i></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
               
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>