<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="spin.min.js"></script>
<html>

<form action="zip.php" id="nameForm">
  <input type="text" name="nameInput" placeholder="Folder name">
  <input type="submit" value="Compress & Download">
</form>
<div id="spinner"></div>
<div id="download"></div>

<script>
$( "#nameForm" ).submit(function( event ) {
  event.preventDefault();
  var target = document.getElementById('spinner');
  var spinner = new Spinner().spin(target);
  var $form = $( this ), folderName = $form.find( "input[name='nameInput']" ).val(), url = $form.attr( "action" );
  var posting = $.post( url, { nameInput: folderName } );
  posting.done(function(data) {
      spinner.stop();
      $('#download').html(data);
      window.location.href = $('#download').find('a').attr('href');
  });
});
</script> 

</html>