<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('defaults/header.php');
$this->load->helper('form');

if (!empty($question['image'])) {
    $class = "col-xs-6 col-lg-6";
} else {
    $class = "col-xs-12";
}
?>

<div class="col-xs-12">
    <div class="row">
        <div class="<?=$class?>">
        <p class="lead"><?=$question['question']?></p>
        </div>
        <?php if (!empty($question['image'])) : ?>
            <div class="col-xs-6 col-lg-6 text-center">
                <img src="<?=base_url('assets/img/'.$question['image'])?>" style="" class="img-thumbnail" />
            </div>
        <?php endif; ?>
        
    </div>
    <hr />
    <h3>Your Answer</h3>
    <p><?=$myanswer?></p>
    <h3>Correct Answer</h3>
    <p><?=$question['answer']?></p>
    <p class="text-center">
        <?=anchor('quiz', 'Next Question', array('class' => 'btn btn-primary'))?>
    </p>
</div>

<?php
$this->load->view('defaults/footer.php');