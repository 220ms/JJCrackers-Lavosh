<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
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
                        <h2 style="font-weight: bold">Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="col-md-4"></div>
  <div class="col-md-8" style="padding-top: 20px; padding-right: 100px">
      <div class="product-content-right">
                          <div class="woocommerce">
                              <form method="post" action="#">
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
                                          <tr>
                                              <td class="actions" colspan="6">
                                                  <!-- <div class="coupon">
                                                      <label for="coupon_code">Coupon:</label>
                                                      <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                      <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                  </div> -->
                                                  <button class="add_to_cart_button clearcart" id="clear">
                                                        <?= $this->Html->link('Clear cart',$options=['controller'=>'orders','action'=>'clear', 'style'=>'color:white']) ?>
                                                  </button>
                                                  <button class="add_to_cart_button" id="checkOut">
                                                  <?= $this->Html->link('Proceed to checkout',$options=['controller'=>'users','action'=>'checkout', 'style'=>'color:white']) ?>
                                                  </button>
                                                  
                                              </td>
                                          </tr>
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
  

  <!-- Latest jQuery form server -->
  <?= $this->Html->script('https://code.jquery.com/jquery.min.js') ?>

<!-- Bootstrap JS form CDN -->
<?= $this->Html->script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') ?>

<?= $this->Html->script('jquery.sticky') ?>
<?= $this->Html->script('jquery.easing.1.3.min') ?>

<?= $this->Html->script('owl.carousel.min') ?>
<?= $this->Html->script('main') ?>
                                   
      <!-- SCRIPT FOR CARD QUANTITY -->
      <script>
        function decrement(product_id,position){
            qty = document.getElementById(product_id);
            value = parseInt(qty.innerHTML);
            if (value > 1){
                value = value - 1;
                qty.innerHTML = value;
            }


            
            
        }
        function increment(product_id,position){
            qty = document.getElementById(product_id);
            value = parseInt(qty.innerHTML);
            
            if (value < 100){
                value = value + 1;
                qty.innerHTML = value;
            }
        }
    </script>

</body>
</html>




