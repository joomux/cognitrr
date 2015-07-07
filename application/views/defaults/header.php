<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
      
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">QuizMe</a>
    </div>
<?php
$class = strtolower($this->router->class);
$method = strtolower($this->router->method);
?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?=$class=='quiz'?'class="active"':''?>><a href="/">New Question</a></li>
        <li <?=$class=='question'?'class="active"':''?>><?=anchor('Question/add', 'Add Question')?></li>
        <li <?=$class=='study'?'class="active"':''?>><?=anchor('Study', 'Study Mode')?></li>
      </ul>
        <?php if ($this->router->fetch_class()=='quiz' and isset($question['id'])) : ?>
        <?php $this->load->helper('form'); ?>
<!--        <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <?=form_dropdown('courseFilter', $courses, $question['course_id'], array('class' => 'form-control', 'id' => 'courseFilter'))?>
        </div>
      </form>-->
        
        <?php endif; ?>
     <ul class="nav navbar-nav navbar-right">
         <?php if ($this->router->fetch_class()=='quiz' and isset($question['id'])) : ?>
         <li><a href="<?=site_url('Question/edit/'.$question['id'])?>">Edit</a></li>
         <?php endif; ?>
         <li><?=anchor('Login/logout', 'Logout')?></li>
     </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      
      <div class="container">
         <?php if ($this->session->flashdata('msg')) { ?>
                <div class="col-xs-12 alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
    <?php } ?>