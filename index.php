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
		$nomes = ["Mike", "Max", "Saphira", "Sophie", "Dylan", "Laura"];
		$stringJSON = "nome: Gust, style: self-taught, learn: php"

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
	
	<h3>SuperVariavel 
		<br> $_SERVER: <br>
		<?php 
			echo $_SERVER['SERVER_ADDR'].'<BR>';
			echo $_SERVER['SERVER_NAME'].'<BR>';
			echo $_SERVER['HTTP_ACCEPT_ENCODING'].'<BR>';
			echo $_SERVER['HTTP_USER_AGENT'].'<BR>';
			echo $_SERVER['REMOTE_ADDR'].'<BR>';
		?>
	</h3>

	<br>
	<br>

	<h3> Métodos para Strings:
		<br>
		<?php
			echo '<br>'.'$stringJSON => '. $stringJSON . '<br>';
			echo '<br>'.'strlen($stringJSON) => '. strlen($stringJSON);
			echo '<br>'.'strchr($stringJSON,'.'"e"'.') => '. strchr($stringJSON,'e');
			echo '<br>'.'strrchr($stringJSON,'.'"e"'.') => '. strrchr($stringJSON,'e');
			echo '<br>'.'strpos($stringJSON, "u", 2) => '. strpos($stringJSON, 'u', 4);
			echo '<br>'.'strlen($stringJSON) => '. substr($stringJSON, 6, 5);
		?>		
	</h3>

	<br>
	<br>

	<h3>
		Retorna todas as ocorrencias na String
		<?php
			echo '<br>'.'while($offset = strpos($stringJSON, "u", $offset + 1))'.'<br><br>';
			echo 'Resultados ==> ';
			$offset = 0;
			while($offset = strpos($stringJSON, 'u', $offset + 1)) {
				echo $offset. ', ';
			}
		?>
	</h3>

	<br>
	<br>

	
	<?php
		echo '<h3>' . 'String em Array' . '</h3>';
		echo '$ArrayJSON = str_split($stringJSON, 3)'.'<br><br>';
		$ArrayJSON = str_split($stringJSON, 3);
		echo 'Resultado str_split() ==> '. $ArrayJSON[2].'<br>';

		$arrayParseJSON = "nome=$ArrayJSON[0]&sty=$ArrayJSON[4]&gus=$ArrayJSON[2]";

		parse_str($arrayParseJSON, $varParse);

		echo '<h3>' . 'parse_str()' . '</h3>';

		echo 'Resultado parse_str() ==> '. $varParse['nome'];
		echo '<br>'.'Resultado parse_str() ==> '. $varParse['sty'];
		echo '<br>'.'Resultado parse_str() ==> '. $varParse['gus']. '<br>';

		echo '<h3>' . 'explode()' . '</h3>';
		$arrayExplodeJSON = explode(',', $stringJSON);

		foreach ($arrayExplodeJSON as $pos) {
			echo $pos;
		}

		echo '<h3>' . 'implode()' . '</h3>';
		$newJSON = implode($arrayExplodeJSON, ' ---  ');

		echo $newJSON;
	?>
</body>
</html>