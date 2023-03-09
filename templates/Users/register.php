
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
                    <h3 class="pt-3 font-weight-bold">Register</h3>
                </div>
                <div class="panel-body p-3">
                  <?= $this->Form->create($user); ?> 
                        <div class="form-group py-2">
                              <?= $this->Form->control('email', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('password', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->hidden('role', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('first_name', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('last_name', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('street_address', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('post_code', ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('state', ['options' => ['VIC', 'NSW', 'QLD', 'SA', 'NT', 'TAS', 'WA']], ['class'=>'input-field']); ?> 
                        </div>
                        <div class="form-group py-2">
                              <?= $this->Form->control('phone_number', ['class'=>'input-field']); ?> 
                        </div>
                        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary btn-block mt-3')); ?>
                        <div class="text-center pt-4 text-muted">Already have an account? <?= $this->Html->link('Login', ['controller'=>'users','action'=>'login']);?> </div>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</html>