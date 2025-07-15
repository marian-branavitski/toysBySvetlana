<div class="col-lg-3 col-lg-pull-8">

            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Log in <i class="glyphicon glyphicon-lock"></i></h3>
              </div>
              <div class="panel-body">
                <?php if (!$this->dx_auth->is_logged_in()): ?>
                  
                  
                  <form role="form" action="/auth/login/" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control input-lg" placeholder="Username" name="username">
                    </div>
                    <?php echo $this->session->flashdata('username__error'); ?>
                    <div class="form-group">
                      <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                    </div>
                    <?php echo $this->session->flashdata('password__error'); ?>
                    <button class="btn btn-success">Log in</button>
                    <p class="success text-center"><a href="/Auth/forgot_password/">Forgotten password</a> | <a href="/Auth/register/">Sign up</a></p>
                  </form>

                <?php else: ?>
                  <h4>Hello, <?php echo $this->dx_auth->get_username(); ?>! 👋</h4>
                  <a href="/auth/logout/" class="btn btn-success">Log out</a>
                <?php endif ?>
                
              </div>
            </div>

            <div class="margin-8"></div>

            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">News <i class="glyphicon glyphicon-bell"></i></h3>
              </div>
              <div class="panel-body">
                <?php foreach ($news as $key => $value): ?>
                  <p><?php echo $value['time_added']; ?></p>
                  <h4><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></h4>
                   
                <?php endforeach ?>

              </div>
            </div>

          </div>


