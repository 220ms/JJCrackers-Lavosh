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

    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg"><?= $this->Html->Image('carousel/' . $carousel[0]->photo); ?></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2><?=h($carousel[0]->heading); ?></h2>
                                                <p><?= h($carousel[0]->description); ?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg"><?= $this->Html->Image('carousel/' . $carousel[1]->photo); ?></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2><?= h($carousel[1]->heading); ?></h2>
                                                <p><?= h($carousel[1]->description); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg"><?= $this->Html->Image('carousel/' . $carousel[2]->photo); ?></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2><?=h($carousel[2]->heading); ?></h2>
                                                <p><?= h($carousel[2]->description); ?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title" style="font-weight: bold">Latest Products</h2>
                        <div class="product-carousel">
                            <?php foreach ($products as $product):?>
                            <div class="single-product">
                                <div class="product-f-image">
                                <?= $this->Html->image('products-img/' . $product->photo) ?>

                                </div>

                                <div style="height: 100px; word-wrap: break-word">
                                    <h1 style="font-size: 30px"><?= h($product->name); ?></h1>
                                </div>
                                
                                <div style="height: 100px; word-wrap: break-word">
                                    <?= h($product->description); ?>
                                </div>

                                <div class="product-carousel-price">
                                    <ins><?= "$".$this->Number->format($product->price) ?></ins>
                                </div>
                                <!-- <div class="card">
                                    <?php $qty_str = "qty_";?>
                                    <button class="qtybtn" onclick="decrement('<?= $qty_str.$product->id?>')">-</button>
                                    <h2 id=<?= $qty_str.$product->id?>>1</h2>
                                    <button class="qtybtn" onclick="increment('<?= $qty_str.$product->id?>')">+</button>
                                </div> -->
                                
                            
                                
                                
                                <div class="product-option-shop" style="text-align:center">
                                    <?php if($product->quantity > 0): ?>
                                        <button class="add_to_cart_button cakebtn" id=<?= $product->id ?> onclick="showAddCart(<?= $product->id ?>)">
                                            Add to Cart
                                        </button>
                                    <?php elseif($product->quantity <= 0): ?>
                                        <h2 style="color: red">
                                            Out of Stock!
                                        </h2>
                                    <?php endif; ?>
                                    
                                </div> 
                                

                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->





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
    <?= $this->Html->script('https://code.jquery.com/jquery.min.js') ?>

    <!-- Bootstrap JS form CDN -->
    <?= $this->Html->script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') ?>

    <?= $this->Html->script('jquery.sticky') ?>
    <?= $this->Html->script('jquery.easing.1.3.min') ?>

    <?= $this->Html->script('owl.carousel.min') ?>
    <?= $this->Html->script('main') ?>

    <script>
    $(function(){
        $('.cakebtn').click(function(){
            var csrfToken = $('meta[name="csrfToken"]').attr('content');


            // qty = document.getElementById('qty_'+this.id);
            
            // value = parseInt(qty.innerHTML);

            // qty.innerHTML = 1;

            // update the number of items in cart on the button
            
            
            $.ajax({
                method:"POST",
                url:"<?= $this->Url->build(['controller'=>'products','action'=>'receive'])?>",
                data:{ 'id': this.id,
                        'quantity': 1
                    },
                headers:{
                    'X-CSRF-Token': csrfToken
                }
            })
        });

    })

    function showAddCart(id) {
        console.log("test");
        var p = document.getElementById(id);
        p.innerHTML = "Added to Cart"
        setTimeout(() => {
            p.innerHTML = "Add to Cart"
        }, 1000);
    };
    </script>
    <!-- SCRIPT FOR CARD QUANTITY -->
  </body>

</html>
