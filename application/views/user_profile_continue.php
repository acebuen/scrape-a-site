<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		var parameter = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
		var counter = 1;
		var resetInterval = setInterval(function() {
			$.get(base_url + 'site/user_profile/' + parameter, function(data){
				console.log(data);
				counter++;
			}, 'json')

			if(counter == 10) {
				clearInterval(resetInterval);
			}

		}, 120 * 1000);
	});
</script>
</html>