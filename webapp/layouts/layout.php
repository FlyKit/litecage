<html>
<head>
<?php if($js) echo $js."\n"; ?>
<?php if($css) echo $css."\n"; ?>
<title><?php echo $title; ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type='text/javascript' src='/js/litecage.js'></script>
</head>
<body >
	<?php echo $content."\n"; ?>
<script>
$(function() {
	act(function(res) {
		alert(res.message);
	});
	draw();
});
</script>
</body>
</html>
