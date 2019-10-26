<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$title = "Ambiente de Testes";
		$variavelPhp = "Insira um valor";
		$msgBtnOk =  "Enviar Dados";
		$variavelTestes = "Testando Variavel";
		$decimal1 = 2.57;
		$decimal2 = 8;
		$rsDecimal = $decimal1 / $decimal2;
		$nomes = ["Mike", "Max", "Saphira", "Sophie", "Dylan", "Laura"]

	?>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
</head>
<body>
	<h1><?php echo $title ?></h1>
	<input type="text" placeholder="<?= $variavelPhp ?>">
	<button><?= $msgBtnOk ?></button>
	
	<br>	
	<h2><?= isset($variavelTestes) ?></h2>
	<h2><?= isset($variavelT) ?></h2>

	<br>	
	<h2>Valor de Variável Decimal Formatada: <br> <?= $decimal1 ?> / <?= $decimal2 ?> = <?= number_format($rsDecimal, 2) ?> </h2>
	<h2>Inversão de formato de pontuação Americana: 
		<br>Original   => <?= number_format($rsDecimal,2) ?>
		<br>Modificado => <?= number_format($rsDecimal,2,',','.') ?>
	</h2>
	
	<table>
		<thead>
			<tr>
				<th>Nomes</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				//Laço especial para Array 
				foreach ($nomes as $filho) {
					echo '<tr>'.'<td>'. $filho .'</td>'.'</tr>';
				}
			?>
		</tbody>
	</table>

</body>
</html>