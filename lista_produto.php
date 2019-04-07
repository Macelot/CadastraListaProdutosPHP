<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Template Marcelot</title>
		<link href="./style/style3.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<div class="table-container" >
							<table class="table table-filter">
								<tbody>
								<div class="table-responsive">
			<tr data-status="pendiente">
				<td align="right" class="text-aqua"><b>Buscar:</b></td>
				<td align="left" nowrap><input class="w3-border w3-hover-blue" type="text" name="digitou" value="<?php echo $digitou;?>"><i class="fa fa-search" onclick="vai();"></i></td>
				
				<?php if ($Qnt==5){?>
				<td align="right"><input type='button' class="btn btn-primary" onclick='vai2(5)' name='5' value='5 Itens por pagina'></td>
			    <?php }else{ ?>
				<td align="right"><input type='button' class="btn btn-default" onclick='vai2(5)' name='5' value='5 Itens por pagina'></td>
				<?php }?>
				
				<?php if ($Qnt==20){?>
				<td align="right"><input type='button' class="btn btn-primary" onclick='vai2(20)' name='20' value='20 Itens por pagina'></td>
			    <?php }else{ ?>
				<td align="right"><input type='button' class="btn btn-default" onclick='vai2(20)' name='20' value='20 Itens por pagina'></td>

				<?php }?>
				
				<?php if ($Qnt==30){?>
				<td align="right"><input type='button' class="btn btn-primary" onclick='vai2(30)' name='30' value='30 Itens por pagina'></td>
			    <?php }else{ ?>
				<td align="right"><input type='button' class="btn btn-default" onclick='vai2(30)' name='30' value='30 Itens por pagina'></td>

				<?php }?>
				<input type="hidden" name="quantos" id="quantos" value="<?php echo $Qnt;?>">
				</div>
			</tr>
</tbody>
							</table>
						
	
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
		<tr >
			<td><a href="lista_produto.php?onde=pri&pagina=<?php echo $pagina;?>&digitou=<?php echo $digitou?>&quantos=<?php echo $Qnt?>"><i class="fa fa-angle-double-left fa-2x"></i></a></td>
			<td><a href="lista_produto.php?onde=ant&pagina=<?php echo $pagina;?>&digitou=<?php echo $digitou?>&quantos=<?php echo $Qnt?>"><i class="fa fa-angle-left fa-2x"></i></a></td>
			<td>

				<select class="w3-select w3-border w3-hover-blue" name="paginaDesejada" onchange="mostra(this.options[this.selectedIndex].value);">
					<option value="0">Selecione uma Página</option>
					<?php

					$totalFor=(intval((contaTotal($digitou)-1)/$Qnt))+1;
					for($i=1;$i<=$totalFor;$i++){
						$esta="";

						if((($pagina+$Qnt)/$Qnt) == $i)
							$esta="selected";
					?>
					<option value="<?php echo $i;?>" <?php echo $esta;?> >Página <?php echo $i;?></option>
					<?php
					}
					?>
				</select>
			</td>
			<td><a href="lista_produto.php?onde=pro&pagina=<?php echo $pagina;?>&digitou=<?php echo $digitou?>&quantos=<?php echo $Qnt?>"><i class="fa fa-angle-right fa-2x"></i></a></td>
			<td><a href="lista_produto.php?onde=fim&pagina=<?php echo $pagina;?>&digitou=<?php echo $digitou?>&quantos=<?php echo $Qnt?>"><i class="fa fa-angle-double-right fa-2x"></i></a></td>
		</tr>
</tbody>
							</table>
						


						<div class="table-container">
							<table class="table table-filter">
								<tbody>
		<tr >
		    <td>Foto</td>
			<td>Descrição</td>
			<td nowrap>Preço<i class="fa fa-angle-up"onclick ="order('asc');"></i> <i class="fa fa-angle-down" onclick ="order('desc');" ></i></td>
			<td>Marca</td>
			<td>Fabricante</td>
			<td>Data de Fabricação</td>
			<td>Origem</td>
		</tr>
<?php

$mysqli = new mysqli("localhost","root","usbw","test",3307);
$busca = "SELECT * FROM produtos WHERE descricao like '%".$digitou."%'
OR preco like '%".$digitou."%'
OR marca like '%".$digitou."%'
OR fabricante like '%".$digitou."%'
OR datafabricacao like '%".$digitou."%'
OR origem like '%".$digitou."%' ORDER BY ".$ordem." ".$tipo." LIMIT ".$pagina.",".$Qnt.";";


//echo "<br> ".$busca;

$mysqli->real_query($busca);
$res = $mysqli->use_result();
//$total=0;
while ($row = $res->fetch_assoc()) {
	echo "<tr data-status='pagado'>";
	//echo '<td><img id="myimage" height="70px" src="data:image/jpeg;base64,'.base64_encode( $row['imagem'] ).'"/></td>';
	echo '<td><img id="myimage" height="70px" src="'.$row['imagem'].'"/></td>';
	echo "<td><font color='#FF0000'>".$row['id']." ".$row['descricao']."</td>";
	echo "<td><b>".$row['preco']."</b></td>";
	echo "<td>".$row['marca']."</td>";
	echo "<td>".utf8_encode($row['fabricante'])."</td>";
	echo "<td>".$row['datafabricacao']."</td>";
	echo "<td>".$row['origem']."</td>";
	echo "</tr>";
	//$total++;
}
echo "<br> Total de registros encontrados ".contaTotal($digitou);
?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

</form>
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
</body>
</html>
