<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cognitrr</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.min.css')?>">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-6 col-sm-offset-3" style="margin-top:100px;">
                  <div class="jumbotron text-center">
                      <h1 class="">QuizMe</h1>
                      <p class="text-center">Your community study partner</p>
                      <?php if ($this->session->flashdata('msg')) : ?>
                            <div class="col-xs-12 alert alert-danger"> <?= $this->session->flashdata('msg') ?> </div>
                      <?php endif; ?>
                      <?=form_open('Login/login')?>
                      <div class="form-group">
                          <input name="email" type="email" required class="form-control" placeholder="Email Address" />
                      </div>
                      <div class="form-group">
                          <input type="password" name="password" required class="form-control" placeholder="Password" />
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Login</button>
                          &nbsp;
                          <a href="<?=site_url('Login/register')?>" class="btn btn-primary">Register</a>
                      </div>
                      <?=form_close()?>
                      <div class="form-group">
                          <button id="facebook" class="btn btn-primary">Login with Facebook</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </body>
</html>