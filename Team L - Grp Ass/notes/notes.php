<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Notes</title>
  <link rel="stylesheet" href="notes.css">
  <link rel="manifest" href="details.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

  <br />
  <h4>Notes</h4>

  <ul class="list">
    <div contenteditable>
      <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>

    </div>
  </ul>

  <button id="save">Click to Save</button>
		<script type="text/javascript">
			$(document).ready(function(argument) {
				$('#save').click(function(){
					// Get edit field value
					$edit = $('#editor').html();
					$.ajax({
						url: 'get.php',
						type: 'post',
						data: {$data: $edit},
						datatype: 'html',
						success: function(rsp){
								alert(rsp);
							}
					});
				});
			});
		</script>
  

</body>

</html>