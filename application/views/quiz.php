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

<?=form_open('quiz/answer', array('class' => 'form', 'id' => 'questionForm'), array('question_id' => $question['id']))?>
<input type='hidden' name='course_id' id="course_id" />
<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <h2>[<?=$question['code']?>] <?=$question['course']?> - <?=$question['school']?> <small>Asked by: <?=$question['first_name'].' '.$question['last_name']?>, <?=$question['date_updated']?></small></h2>
        </div>
    </div>
    <div class="row">
        <div class="<?=$class?>">
            <p class="lead"><?=$question['question']?></p>
        </div>
        <?php if (!empty($question['image'])) { ?>
        <div class="col-xs-6 col-lg-6 text-center">
            <img src="<?=base_url('assets/img/'.$question['image'])?>" style="" class="img-thumbnail" />
        </div>
        <?php } ?>
    </div>
    <hr />
    <p><textarea name="myanswer" width="auto" class="form-control" placeholder="What do you think?"></textarea></p>
    <p class="text-center">
        <button type="submit" class="btn btn-primary" id="btnReveal">Reveal Answer!</button>
    </p>
</div>
<?=form_close()?>

<script>
//$(function() {
//    $('#btnReveal').on('click', function() {
//        $('#course_id').val($('#courseFilter').val());
//        alert($('#course_id').val());
//        $('#questionForm').submit();
//    });
//});  
</script>

<?php
$this->load->view('defaults/footer.php');