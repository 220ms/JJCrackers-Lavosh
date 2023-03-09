<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <?= $this->Html->meta('viewport','width=device-width, initial-scale=1');?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>JJCrackers - Fresh Lavosh</title>
    
    <!-- Google Fonts -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'); ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'); ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'); ?>
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
                        <li><a href="<?= $this->Url->build(array('controller'=>'users','action'=>'about')) ?>">About us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>What is lavash?</h2><br>
      <h4>Lavosh (or lavash as it's sometimes known) is a tradional flatbread that originates from Ancient Armenia. 
        Lavosh is made without yeast or leaven so it's usually seen as a kind of flat bread. 
      </h4><br>
      <p>In 2014, Lavash was added to Unesco's Representative List of Intangible Cultural
Heritage of Humanity "as an expression of culture in Armenia". It is part of a sacred ceremony for Armenians, where
Armenian women whisper blessings before preparing the dough. It is believed that the
dough has power to grant wishes. In the mean time, Armenian men are responsible for cooking the barbeque.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
    <span class="glyphicon glyphicon-signal logo"></span>
    </div>
    <div class="col-sm-8">
      <h2>How to make Lavash?</h2><br>
      <h4>The main ingredients are flour, water, and salt.</h4><br>
      <p>Flour, water, and salt are the only ingredients needed to make lavash. However, it is distinctive, delicious, and lasting 
        because of the lengthy and complicated preparation and baking process. To begin making lavash, lay out the dough until it is 
        quite thin. Then set it over a sizable cushion and slam it against a clay oven or tonir's walls. Finally, let the lavash roast 
        for 30 to 1 minute before removing it from the oven. Another distinctive quality of lavash is its adaptability to be consumed 
        either on its own or wrap food in it. Complimentary foods to be consumed with lavash are cheese, kebab/khorovats(barbeque), 
        Khash(traditional Armenian soup), and etc. </p>
</ul> 
    </div>
  </div>
</div>
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>How to match Lavash?</h2><br>
      <h4>The best match.</h4><br>
      <p>Traditional: Good with soup, as an appetizer or as a snack. When fresh, it can be
         eaten with cheese or kebab, or on its own.
</p>
      <p>Innovative: Make some creations with our yoghurt. A few chilli flakes, a bit of 
          garlic, a light pinch of dried mint. All of these go together with the lavosh, 
          which is a unique flavor. 
</p>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cutlery logo slideanim"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
    <span class="glyphicon glyphicon-time logo"></span>
    </div>
    <div class="col-sm-8">
      <h2>How to store Lavash?</h2><br>
      <h4>Time is import.</h4><br>
      <p>Don't wait too long to eat lavash after baking it. It's best warm right 
        out of the oven, the day it's made. This bread dries out quickly and 
        often becomes brittle and/or hard to chew. If you don't plan to eat it
         immediately, place it in a zip-close bag as soon as it cools to room 
         temperature.
</p>
</ul> 
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

<!-- CSS -->
<style>
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #1ABC9C;
    font-size: 50px;
  }
  .logo {
    color: #1ABC9C;
    font-size: 200px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>