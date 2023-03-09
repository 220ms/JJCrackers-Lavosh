
<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <?= $this->Html->meta('viewport','width=device-width, initial-scale=1');?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>JJCrackers - Fresh Lavosh</title>
    
    <!-- Google Fonts -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'); ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.7.2/css/all.css'); ?>
    <?= $this->Html->css('login/style'); ?>

    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'); ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'); ?>
    
    

  </head>
  <div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Login</h3>
                </div>
                <div class="panel-body p-3">
                  <?= $this->Form->create(); ?> 
                        <div class="form-group py-2">
                              <span class="far fa-user p-2"></span> 
                              <?= $this->Form->control('email', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-1 pb-2">
                              <span class="fas fa-lock px-2"></span> 
                              <?= $this->Form->control('password', array('type' => 'password'), ['class'=>'input-field']); ?> 
                        </div>
                        <?= $this->Form->submit('Login', array('class' => 'btn btn-primary btn-block mt-3')); ?>
                        <div class="text-center pt-4 text-muted">Don't have an account? <?= $this->Html->link('Register', ['controller'=>'users','action'=>'register']);?> </div>
                        <?= $this->Form->end() ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>