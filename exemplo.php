<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
</head>

<body>
<?php
$digitou="";

if(isset($_REQUEST['digitou'])){
	$digitou=$_REQUEST['digitou'];
}
if(isset($_REQUEST['buscar'])){
	$digitou=$_REQUEST['buscar'];
}



function contaTotal($digitou){
	$mysqli = new mysqli("localhost","root","usbw","test",3307);
	$busca = "SELECT count(*) as total FROM produtos WHERE descricao like '%".$digitou."%'
OR preco like '%".$digitou."%'
OR marca like '%".$digitou."%'
OR fabricante like '%".$digitou."%'
OR datafabricacao like '%".$digitou."%'
OR origem like '%".$digitou."%'";
	$mysqli->real_query($busca);
	$res = $mysqli->use_result();
	while ($row = $res->fetch_assoc()) {
		$total =$row['total'];
	}
	return $total;
}
$pagina=0;


$Qnt=5;

if (isset($_REQUEST["quantos"])) {
	$Qnt=$_REQUEST["quantos"];
}

$Ord="";



if(isset($_REQUEST['digitou'])){
	$digitou=$_REQUEST['digitou'];
}
if(isset($_REQUEST['buscar'])){
	$digitou=$_REQUEST['buscar'];
}



if(isset($_GET['onde'])){
	if($_GET['onde']=="sel"){
		$pagina=$_GET['pagina'];
	}
	if($_GET['onde']=="pro"){
		$pagina=$_GET['pagina'];
		if(($_GET['pagina']+$Qnt)<contaTotal($digitou)){
			$pagina=$_GET['pagina']+$Qnt;
		}
	}
	if($_GET['onde']=="ant"){
		$pagina=$_GET['pagina'];
		if($_GET['pagina']-$Qnt>=0)
			$pagina=$_GET['pagina']-$Qnt;
	}
	if($_GET['onde']=="pri"){
		$pagina=0;
	}
	if($_GET['onde']=="fim"){
		$total=contaTotal($digitou);
		$pagina=intval(($total-1)/$Qnt)*$Qnt;
	}
}

//echo "Pagina atual =".$_GET['pagina'];
//echo "<br> Total =".contaTotal();

$ordem = "id";
if (isset($_REQUEST['ordem'])) {
	$ordem = $_REQUEST['ordem'];
}

$tipo = "asc";
if (isset($_REQUEST['tipo'])) {
	$tipo = $_REQUEST['tipo'];
}


?>
<script>
	function vai(){
		//alert("clicou");
		document.MyUploadForm.submit();
	}
	function mostra(dados){
		//alert("vamos para página X");
		//console.log("pagina x");
		if(dados!="0"){
			console.log(dados);
			var pag=(dados-1)*<?php echo $Qnt?>;
			console.log(pag);
			window.location.href='lista_produto.php?onde=sel&pagina='+pag+'&quantos='+<?php echo $Qnt?>;
			//colocar o digitou junto;
		}

	}
	function order(tipo){
		window.location.href='lista_produto.php?ordem=preco&tipo='+tipo;
	}

	function vai2(q){
		//window.location.href='lista_produto.php?ordem=preco&tipo='+tipo;
		document.getElementById("quantos").value=q
		document.MyUploadForm.submit();

	}

</script>
<form action="lista_produto.php" method="post" enctype="multipart/form-data" id="MyUploadForm" name="MyUploadForm">

<div class="container">
	<div class="row">

		<section class="content">
			<h1>Table Filter</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
								<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr data-status="pagado">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox3">
												<label for="checkbox3"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="cancelado">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox2">
												<label for="checkbox2"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right cancelado">(Cancelado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pagado" class="selected">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox4" checked>
												<label for="checkbox4"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox5">
												<label for="checkbox5"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="content-footer">
					<p>
						Page © - 2016 <br>
						Powered By <a href="https://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a>
					</p>
				</div>
			</div>
		</section>
		
	</div>
</div>
</body>
<script>
$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>
</html>