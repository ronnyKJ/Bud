<html><head><title><?php echo $title?></title></head>
<body>
	<h1><?php echo $title?></h1>
	<ul>
	<?php foreach($books as $key=>$book) {?>
	<li><?php echo $key+1?>.<?php echo $book["book"]?></li>
	<?php }?>
</ul>
</body>
</html>