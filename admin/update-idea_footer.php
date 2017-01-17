<script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "500px"
	});
});
var postForm = function() {
   var content = $('#summernote').summernote('code');
   document.updateIdeaForm.idea_notes.value = content;
   console.log(content);
}
</script>