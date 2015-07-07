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
              <div class="col-xs-12 col-md-6 col-md-offset-3" style="margin-top:20px;">
                  <div class="jumbotron">
                      <h1 class="text-center">Cognitrr</h1>
                      <p class="text-center">Your community study partner</p>
                      <hr />
                      <h2 class="text-center">Account Registration</h2>
                      <?=form_open('User/register')?>
                      <div class="form-group">
                          <label for="first_name">First Name</label>
                          <?=form_error('first_name')?>
                          <input name="first_name" type="first_name" required class="form-control" placeholder="" value="<?=set_value('first_name')?>" />
                      </div>
                      <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <?=form_error('last_name')?>
                          <input name="last_name" type="last_name" required class="form-control" placeholder="" value="<?=set_value('last_name')?>" />
                      </div>
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <?=form_error('email')?>
                          <input name="email" type="email" required class="form-control" placeholder="" value="<?=set_value('email')?>" />
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <?=form_error('password')?>
                          <input type="password" name="password" required class="form-control" placeholder="" />
                      </div>
                      <div class="form-group">
                          <label for="password2">Repeat Password</label>
                          <?=form_error('password2')?>
                          <input type="password" name="password2" required class="form-control" placeholder="" />
                      </div>
                      <div class="form-group">
                          <label for="school">School</label>
                          <input type="hidden" name="school_id" id="school_id" value="<?=set_value('school_id')?>" />
                          <input type="school" name="school" id="school_auto" required class="form-control" placeholder="" value="<?=set_value('school')?>" />
                      </div>
                      <div class="form-group text-center">
                          <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      <?=form_close()?>
                  </div>
              </div>
          </div>
      </div>
      <script>
$(function() {
    var cache = {};
    $( "#school_auto" ).autocomplete({
      minLength: 2,
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
 
        $.getJSON( "<?=site_url('School/json')?>", request, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        });
      },
      select:function (event, ui) {
          $('#school_id').val(ui.item.id);
      },
      search:function(event, ui) {
          $('#school_id').val(null);
      }
    });
  });
</script>
  </body>
</html>