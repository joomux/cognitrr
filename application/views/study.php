<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('defaults/header.php');

$columns = array_chunk($questions, round(count($questions)/2));

foreach ($columns as $col) {
    ?>
<div class="col-xs-12 col-lg-6">
    <?php
    foreach ($col as $question) {
        ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="panel-title"><?=$question['question']?></p>
            <?php if (isset($question['image']) and !empty($question['image'])) : ?>
            <p class="text-center" style="padding:10px"><img src="<?=base_url('assets/img/'.$question['image'])?>" class="img-thumbnail" /></p>
            <?php endif; ?>
        </div>
        <div class="panel-body">
            <?=$question['answer']?>
        </div>
        <div class="panel-footer">
            
            <div style="float:right;">
                <small><a href="<?=site_url('Question/edit/'.$question['id'])?>" class="">Edit</a></small>
            </div>
            <div style="float:left"><small>// Author and Date</small></div>
            <div class="clearfix"></div>
        </div>
    </div>
        <?php
    }
    ?>
</div>
    <?php
}

/*
foreach ($questions as $question) { ?>

<div class="col-xs-12 col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="panel-title"><?=$question['question']?></p>
            <?php if (isset($question['image']) and !empty($question['image'])) : ?>
            <p class="text-center" style="padding:10px"><img src="<?=base_url('assets/img/'.$question['image'])?>" class="img-thumbnail" /></p>
            <?php endif; ?>
        </div>
        <div class="panel-body">
            <?=$question['answer']?>
        </div>
        <div class="panel-footer">
            
            <div style="float:right;">
                <small><a href="<?=site_url('Question/edit/'.$question['id'])?>" class="">Edit</a></small>
            </div>
            <div style="float:left"><small>// Author and Date</small></div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php 
}
*/
$this->load->view('defaults/footer.php');
?>
