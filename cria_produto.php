<meta charset="UTF-8">
<?php
$mysqli = new mysqli("localhost","root","usbw","test",3307);
if($mysqli->connect_errno){
	echo "<br>Erro na conexão";
}else{
	echo "<br>Deu certo a conexão";
}
$comando="Truncate table produtos";
$mysqli->query($comando);

$comando="CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100),
  `descricao` varchar(30) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `datafabricacao` date NOT NULL,
  `origem` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  AUTO_INCREMENT=1 ;";

$mysqli->query($comando);

$iphone = array("./images/i1.jpg","./images/i2.jpg","./images/i3.jpg","./images/i4.jpg");
$android = array("./images/a1.jpg","./images/a2.jpg","./images/a3.jpg","./images/a4.jpg");
$windows = array("./images/w1.jpg","./images/w2.jpg");
$black = array("./images/b1.jpg","./images/b2.jpg","./images/b3.jpg");
$nokia = array("./images/n1.jpg","./images/n2.jpg","./images/n3.jpg");
$descricao = array("iOS","Android","Windows Phone","Black Berry","Nokia S40");
$preco = array("1999.00","2500.00","3999.50","5999.00","2199.90");
$marca = array("Apple","Samsung","Windows","Sun","Nokia");
$fabricante = array("Manaus","California","Taiwan","Italy","Finlândia");
$datafabricacao = array("2018-01-04","2017-12-01","2018-12-15","2019-01-10","2019-02-05");
$origem = array("Nacional","Importado");

//11 iphone
for($i=0;$i<11;$i++){
	$comando="INSERT into produtos ".
			" (imagem,descricao,preco,marca,fabricante,datafabricacao,origem) VALUES ('".
			$iphone[rand(0,3)]."','".
			$descricao[rand(0,0)]."','".
			$preco[rand(0,4)]."','".
			$marca[rand(0,0)]."','".
			utf8_decode($fabricante[rand(0,4)])."','".
			$datafabricacao[rand(0,4)]."','".
			$origem[rand(0,1)]."');";
	if($mysqli->query($comando)){
		echo "<br>Deu certo a inserção";
	}else{
		echo "<br>Erro na inserção".$mysqli->error;
	}
	echo "<br>".$comando;
}

//11 Android
for($i=0;$i<11;$i++){
	$comando="INSERT into produtos ".
			" (imagem,descricao,preco,marca,fabricante,datafabricacao,origem) VALUES ('".
			$android[rand(0,3)]."','".
			$descricao[rand(1,1)]."','".
			$preco[rand(0,4)]."','".
			$marca[rand(1,1)]."','".
			utf8_decode($fabricante[rand(0,4)])."','".
			$datafabricacao[rand(0,4)]."','".
			$origem[rand(0,1)]."');";
	if($mysqli->query($comando)){
		echo "<br>Deu certo a inserção";
	}else{
		echo "<br>Erro na inserção".$mysqli->error;
	}
	echo "<br>".$comando;
}

//11 Windows
for($i=0;$i<11;$i++){
	$comando="INSERT into produtos ".
			" (imagem,descricao,preco,marca,fabricante,datafabricacao,origem) VALUES ('".
			$windows[rand(0,1)]."','".
			$descricao[rand(2,2)]."','".
			$preco[rand(0,4)]."','".
			$marca[rand(2,2)]."','".
			utf8_decode($fabricante[rand(0,4)])."','".
			$datafabricacao[rand(0,4)]."','".
			$origem[rand(0,1)]."');";
	if($mysqli->query($comando)){
		echo "<br>Deu certo a inserção";
	}else{
		echo "<br>Erro na inserção".$mysqli->error;
	}
	echo "<br>".$comando;
}

//11 black
for($i=0;$i<11;$i++){
	$comando="INSERT into produtos ".
			" (imagem,descricao,preco,marca,fabricante,datafabricacao,origem) VALUES ('".
			$black[rand(0,2)]."','".
			$descricao[rand(4,4)]."','".
			$preco[rand(0,4)]."','".
			$marca[rand(4,4)]."','".
			utf8_decode($fabricante[rand(0,4)])."','".
			$datafabricacao[rand(0,4)]."','".
			$origem[rand(0,1)]."');";
	if($mysqli->query($comando)){
		echo "<br>Deu certo a inserção";
	}else{
		echo "<br>Erro na inserção".$mysqli->error;
	}
	echo "<br>".$comando;
}

//11 Nokia
for($i=0;$i<11;$i++){
	$comando="INSERT into produtos ".
			" (imagem,descricao,preco,marca,fabricante,datafabricacao,origem) VALUES ('".
			$nokia[rand(0,2)]."','".
			$descricao[rand(4,4)]."','".
			$preco[rand(0,4)]."','".
			$marca[rand(4,4)]."','".
			$fabricante[rand(0,4)]."','".
			utf8_decode($datafabricacao[rand(0,4)])."','".
			$origem[rand(0,1)]."');";
	if($mysqli->query($comando)){
		echo "<br>Deu certo a inserção";
	}else{
		echo "<br>Erro na inserção".$mysqli->error;
	}
	echo "<br>".$comando;
}
?>
