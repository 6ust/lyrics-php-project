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
			$stringJSON = "nome: Gust, style: self-taught, learn: php";
			$testPhrase = "As pessoas fortes não derrubam as outras, elas ajudam-nas as se erguerem [Dragon Ball]";
			$testPhraseWhitespaces = "     As pessoas fortes não derrubam as outras, elas ajudam-nas as se erguerem [Dragon Ball - Espacos em      branco]      ";
			$testSQLProtectN = 'tes\te';
			$testSQLProtectAsp = 'tes\\\'te';
			$testSQLProtectDAsp = 'tes\\"te';

			$table = "10";
			$phrase = 5;
			$jumpLine = '<br>';
		?>
		<meta charset="UTF-8">
		<title><?php echo $title ?></title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="text-center">
			<h1><?php echo $title ?></h1>
			<input type="text" placeholder="<?= $variavelPhp ?>">
			<button><?= $msgBtnOk ?></button>
		</div>
		
		<br>	

		<div class="alert alert-dark tests-size">
			<h2><?= isset($variavelTestes) ?></h2>
			<h2><?= isset($variavelT) ?></h2>
		</div>

		<br>	

		<div class="alert alert-dark tests-size">
			<h2>Valor de Variável Decimal Formatada:</h2>
			<p><?= $decimal1 ?> / <?= $decimal2 ?> = <?= number_format($rsDecimal, 2) ?></p>
		</div>

		<br>	

		<div class="alert alert-dark tests-size">
			<h2>Inversão de formato de pontuação Americana: </h2>
			<p>Original   => <?= number_format($rsDecimal,2) ?></p>
			<p>Modificado => <?= number_format($rsDecimal,2,',','.') ?></p>
		</div>

		<br>	
		
		<div class="alert alert-dark tests-size">
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
		</div>
		
		<br>

		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'SuperVariavel' . '</h3>'; 
				echo '<p>' . '$_SERVER:' . '</p>';
				echo '<p> <b> - </b>' . $_SERVER['SERVER_ADDR'] . '</p>';
				echo '<p> <b> - </b>' . $_SERVER['SERVER_NAME'] . '</p>';
				echo '<p> <b> - </b>' . $_SERVER['HTTP_ACCEPT_ENCODING'] . '</p>';
				echo '<p> <b> - </b>' . $_SERVER['HTTP_USER_AGENT'] . '</p>';
				echo '<p> <b> - </b>' . $_SERVER['REMOTE_ADDR'] . '</p>';
			?>
		</div>

		<br>

		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Métodos para Strings:' . '</h3>';
				echo '<br>'.'$stringJSON => '. $stringJSON . '<br>';
				echo '<br>'.'strlen($stringJSON) => '. strlen($stringJSON);
				echo '<br>'.'strchr($stringJSON,'.'"e"'.') => '. strchr($stringJSON,'e');
				echo '<br>'.'strrchr($stringJSON,'.'"e"'.') => '. strrchr($stringJSON,'e');
				echo '<br>'.'strpos($stringJSON, "u", 2) => '. strpos($stringJSON, 'u', 4);
				echo '<br>'.'strlen($stringJSON) => '. substr($stringJSON, 6, 5);
			?>	
		</div>

		<br>

		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Retorna todas as ocorrencias na String' . '</h3>'; 
				echo '<br>'.'while($offset = strpos($stringJSON, "u", $offset + 1))'.'<br><br>';
				echo 'Resultados ==> ';
				$offset = 0;
				while($offset = strpos($stringJSON, 'u', $offset + 1)) {
					echo $offset. ', ';
				}
			?>
		</div>

		<br>

		<div class="alert alert-dark tests-size">
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
		</div>
		<div class="alert alert-dark tests-size">
			<?php 

				echo '<h2>' . 'Remoção de espaços em branco - trim, ltrim, rtrim' . '</h2>'; 
				echo '<h3>' . 'trim' . '</h3>';
				echo 'Frase original: ' . $testPhraseWhitespaces . '<br>';
				echo 'Frase com [trim()]: ' . trim($testPhraseWhitespaces);

				echo '<h3>' . 'ltrim' . '</h3>';
				echo 'Frase original: ' . $testPhraseWhitespaces . '<br>';
				echo 'Frase com [ltrim()]: ' . ltrim($testPhraseWhitespaces);

				echo '<h3>' . 'rtrim' . '</h3>';
				echo 'Frase original: ' . $testPhraseWhitespaces . '<br>';
				echo 'Frase com [rtrim()]: ' . rtrim($testPhraseWhitespaces);
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 

				echo '<br><h2>' . 'Proteção do SQL' . '</h2>'; 

				echo '<h3>' . 'addslashes()' . '</h3>';
				echo 'Normal: ' . addslashes($testSQLProtectN) . '<br>';	
				echo 'Apostrofe: ' . addslashes($testSQLProtectAsp) . '<br>';
				echo 'Aspa: ' . addslashes($testSQLProtectDAsp) . '<br>';

				echo '<h3>' . 'stripslashes()' . '</h3>';
				echo 'Normal: ' . stripslashes($testSQLProtectN) . '<br>';	
				echo 'Apostrofe: ' . stripslashes($testSQLProtectAsp) . '<br>';
				echo 'Aspa: ' . stripslashes($testSQLProtectDAsp) . '<br>';

				echo '<h3>' . 'casting(), [(int)$var1,  (string)$text]' . '</h3>';
				echo 'Numero: ' . (int)$table;
				echo '<br>Texto: ' . (string)$phrase;
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'Array - Posicionamento' . '</h3>';
				echo 'posicionamento por numero: ' . '1';
				echo '<br>posicionamento por string: ' . '\' alpha \'';

			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php	
				echo '<h3>' . 'Array - acesso' . '</h3>';
				$myArray =  array('alpha' => 'Dragon Ball', 1,'U.S.A.');
				echo 'Numero: ' . $myArray[1];	
				echo '<br>Texto: ' . $myArray['alpha'];
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Impressao de todo o Array [print_r()]' . '</h3>';
				echo print_r($myArray);
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Multidimensionais' . '</h3>';

				$lettersAToE = array('a','b','c','d','e');
				$lettersFToJ = array('f','g','h','i','j');
				$alphabet = array($lettersAToE, $lettersFToJ);
				echo 'Acesso a Letra C: ' . $alphabet[0][2] . '<br>';
				echo 'Acesso a Letra I: ' . $alphabet[1][3] . '<br>';
				echo 'Acesso a Letra G: ' . $alphabet[1][1] . '<br>';
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Remoção de elementos [unset()]' . '</h3>';
				echo 'Remoção elemento 1x3 Array $alphabet:' . $jumpLine;
				unset($alphabet[1][3]);
				echo '$alphabet, sem o elemento 1x3, elemento <b>I </b>: ';
				print_r($alphabet);
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Numero de elementos [count() e sizeof()]' . '</h3>';
				echo 'quantidade de elementos $lettersAToE: ' . count($lettersAToE) . $jumpLine;
				echo 'quantidade de elementos $lettersAToE: ' . sizeof($lettersAToE) . $jumpLine;
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php		
				echo '<h3>' . 'Array - Numero de elementos [foreach,current, key, prev, next, end e reset]' . '</h3>';
				echo '<h4>FOREACH</h4>';
				foreach($lettersFToJ as $letters) {
					echo '<b>foreach:</b> ' . $letters . $jumpLine;
				};
				echo '<b>current:</b> ' . current($lettersFToJ);
				
				echo $jumpLine;
				echo '<b>key:</b> ' . key($lettersFToJ);
				
				echo $jumpLine;
				echo '<b>prev:</b> ' . prev($lettersFToJ);
				
				echo $jumpLine;
				echo '<b>next:</b> ' . next($lettersFToJ);
				
				echo $jumpLine;
				echo '<b>end:</b> ' . end($lettersFToJ);
				
				echo $jumpLine;
				echo '<b>reset:</b> ' . reset($lettersFToJ);
			
				echo $jumpLine;
				echo '<b>ARRAY FINAL:</b>'; 
				print_r($lettersFToJ); 
				echo $jumpLine;
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Pilhas [Push e Pop]' . '</h3>';
				echo '<b>Push (Insere valor ao final da pilha):</b>' . $jumpLine;
				$valuePile = array();
				echo array_push($valuePile, 'v2') . '<br>';
				echo array_push($valuePile, 'v4') . '<br>';
				echo array_push($valuePile, 'v1') . '<br>';
				echo $jumpLine;

				echo '<b>Push (Remove valor ao final da pilha):</b>' . $jumpLine;
				echo 'POP: ' . array_pop($valuePile) . $jumpLine;
				echo 'POP: ' . array_pop($valuePile) . $jumpLine;
				echo 'POP: ' . array_pop($valuePile) . $jumpLine;
				echo $jumpLine;
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php
				echo '<h3>' . 'Array - Filas [Push, Shift e Unshift]' . '</h3>';
				$valueQueue = array();
				echo array_push($valueQueue, 'F1');
				echo array_push($valueQueue, 'T21');
				echo array_push($valueQueue, 'I13');
				echo array_push($valueQueue, 'I14');
				echo array_push($valueQueue, 'F2');

				print_r($valueQueue);

				echo $jumpLine;
				echo $jumpLine;

				echo 'Fila Shift: ' . array_shift($valueQueue);
				echo $jumpLine;
				echo 'Fila Shift: ' . array_shift($valueQueue);
				echo $jumpLine;
				echo 'Fila Shift: ' . array_shift($valueQueue);
				echo $jumpLine;
				echo 'Fila Unshift (posicao na fila): ' . array_unshift($valueQueue,'F3');
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'Array - array_map(callback, arr1)' . '</h3>';
				echo '<p>' . 'Adiciona array a uma função' . '</p>';

				function multiplica($numEdit) {
					return $numEdit * 28;
				}

				$seqNumeros = array(5,25,43,27,18);
				$alterSeqNumeros = array_map('multiplica', $seqNumeros);

				echo '<b>' . 'Original: ' . '</b>';
				print_r($seqNumeros);
				echo '<br>';
				echo '<b>' . 'Alterado: ' . '</b>';
				print_r($alterSeqNumeros);
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'Array - array_key_exists(key, array) e array_keys(input)' . '</h3>';
				echo '<p>' . 'Verifica a existencia de uma chave' . '</p>';

				$alterSeqNumeros = array_keys($seqNumeros);

				echo '<b>' . 'Original: ' . '</b>';
				print_r($seqNumeros);
				echo '<br>';
				echo '<b>' . 'array_keys(): ' . '</b>';
				print_r($alterSeqNumeros);
				echo '<br>';
				echo '<b>' . 'array_key_exists() 1: ' . '</b>';
				echo array_key_exists(1, $alterSeqNumeros) == 1 ? "true" : "false";
				echo '<br>';
				echo '<b>' . 'array_key_exists() 12: ' . '</b>';
				echo array_key_exists(12, $alterSeqNumeros) == 1 ? "true" : "false";
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'Array - array_search(needle, haystack) e in_array(needle, haystack)' . '</h3>';
				echo '<p>' . 'Localização de valores em um Array' . '</p>';
				echo '<br>';
				echo '<b>' . 'Array: ' . '</b>';
				print_r($seqNumeros);
				echo '<br>';
				echo '<b>' . 'Existe 5: ' . '</b>';
				echo array_search(5, $seqNumeros) >= 0 ? array_search(5, $seqNumeros) : "Não Existe";
				echo '<br>';
				echo '<b>' . 'Existe 18: ' . '</b>';
				echo array_search(18, $seqNumeros) >= 0 ? array_search(18, $seqNumeros) : "Não Existe";
				echo '<br>';
				echo '<b>' . 'Existe 20: ' . '</b>';
				echo array_search(20, $seqNumeros) >= 0 ? array_search(20, $seqNumeros) : "Não Existe";
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<?php 
				echo '<h3>' . 'Array - shuffle(array), sort(array) e rsort(array)' . '</h3>';
				echo '<p>' . 'Mistura e Ordena Array' . '</p>';
				echo '<p>' . 'sort() crescente' . '</p>';
				echo '<p>' . 'rsort() decrescente' . '</p>';
				echo '<p>' . 'shuffle() embaralhar' . '</p>';			
				echo '<br>';
				echo '<b>' . 'Array: ' . '</b>';
				print_r($seqNumeros);
				
				echo '<br>';
				echo '<br>';
				echo '<b>' . 'sort(): ' . '</b>';
				sort($seqNumeros);
				print_r($seqNumeros);
				
				echo '<br>';
				echo '<br>';
				echo '<b>' . 'rsort(): ' . '</b>';
				rsort($seqNumeros);
				print_r($seqNumeros);
				
				echo '<br>';
				echo '<br>';
				echo '<b>' . 'shuffle(): ' . '</b>';
				shuffle($seqNumeros);
				print_r($seqNumeros);
			?>
		</div>
		<div class="alert alert-dark tests-size">
			<h3>Modelagem e Criação do Banco de Dados</h3>

			<p><b>O que são Dados: </b>é um conjunto alfanumerico ou imagem que não esta agregado a nenhum conhecimento especifico, tornando esse dados inutilizavel para quem nao souber em qual contexto ele esta contido e o que extremamente representa</p>
			<p><b>O que são Informações: </b>é o segundo estagio de que um dado pode percorrer. É a agregação de um determinado conhecimento a um dado.</p>

			<p><b>DESCRIBE table_name </b>mostra coluna, tipos e chaves/extras de uma tabela</p>
			<p><b>AS(Alias) </b>Apelido para coluna da tabela</p>
			<p><b>DISTINCT </b>Evita repeticao de registros na coluna</p>
			<p><b>LIMIT </b>Limitação de primeiros registros a serem exibidos</p>
			<p><b>COUNT </b>Contador de registros</p>
			<p><b>SUM </b>Soma de campos</p>
			<p><b>AVG </b>Media de Valores</p>
			<p><b>MAX / MIN </b>Valor Maximo e Minimo</p>
			<p><b>GROUP BY </b>Realiza Operaçoes, com base em agupamentos de valores de um campo especifico</p>
			<p><b>HAVING </b>É similar a clausula WHERE porem é utilizado junto ao GROUP BY.1</p>
		</div>
		<div class="alert alert-dark tests-size">
			<h2>Formularios e Dados:</h2> <b id="activate-validacao-js" style="color: #990000"></b>

			<form method="POST" action="?action=save" name="myForm">
				<b>Nome: </b> <input type="text" name="campo_nome"> 
				<br>
				<b>Idade: </b> <input type="text" name="campo_idade"> 
				<br>
				<b>E-mail: </b> <input type="text" name="campo_email"> 
				<br>
				<b>Sexo: </b>
			 	<input type="radio" name="campo_sexo" value="M"> Masculino 
			 	<input type="radio" name="campo_sexo" value="F"> Feminino
				<br>
				<b>Curso: </b> 
				<select name="campo_curso">
					<option selected>Selecione...</option>
					<option>Ciencia da Computação</option>
					<option>Bacharelado em Informatica</option>
					<option>Engenharia da Computação</option>
				</select>
				<br>
				<b> Conhecimentos: </b>
				<br> <input type="checkbox" name="campo_conhecimentos[]" value="word">Microsoft Word
				<br> <input type="checkbox" name="campo_conhecimentos[]" value="HTML">HTML
				<br> <input type="checkbox" name="campo_conhecimentos[]" value="JS">Javascript
				<br> <input type="checkbox" name="campo_conhecimentos[]" value="PHP">PHP
				<br>
				<input type="reset" value="Limpar">
				<!-- <input type="submit" value="Enviar"> -->
				<input type="button" onclick="validateForm();" value="Enviar">
			</form>
		</div>

		<script type="text/javascript" src="js/validacao-formulario.js"></script>
	</body>
</html>