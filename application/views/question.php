<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('defaults/header.php', array('question' => $question));
$this->load->helper('form');
?>

<?=form_open_multipart('question/add', array('class' => 'form'), array('question_id' => $question['id']))?>
<input type="hidden" name="course_id" id="course_id" value="<?=$question['course_id']?>" />
<div class="col-xs-12">
    <div class="form-group">
    <h1>Select Subject</h1>
    <p><input type="text" id="course_auto" class="form-control" value="<?=$question['course']?>" /></p>
    </div>
    <div class="form-group">
    <h1>Enter Question</h1>
    <p><textarea class="form-control lead" name="question"><?=$question['question']?></textarea></p>
    <p><input type="file" name="image" class="" size="50" /></p>
    </div>
    <hr />
    <div class="form-group">
    <h2>Enter Correct Answer</h2>
    <p><textarea name="answer" width="auto" class="form-control" placeholder="...and the answer is..."><?=$question['answer']?></textarea></p>
    </div>
    <p class="text-center">
        <button type="submit" class="btn btn-primary">Save and Add Another</button>
    </p>
</div>
<?=form_close()?>

<script>
$(function() {
    var cache = {};
    $( "#course_auto" ).autocomplete({
      minLength: 2,
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
 
        $.getJSON( "<?=site_url('Course/json')?>", request, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        });
      },
      select:function (event, ui) {
          $('#course_id').val(ui.item.id);
      },
      search:function(event, ui) {
          $('#course_id').val(null);
      }
    });
  });
</script>

<?php
$this->load->view('defaults/footer.php');