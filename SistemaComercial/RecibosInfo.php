<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recibo</title>
<link href="estilo_rela.css" rel="stylesheet" type="text/css" />
</head>
<?php
	include_once("seguranca.php");
	protegePagina();
?>
<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="fonte">
  <tr>
    <td width="211" height="100" align="center" valign="middle"><img src="images/login-logo.png" width="" height="85" /></td>
    <td width="489"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="18" align="left" valign="middle" class="sub_titulo_artigo_detalhes">Marques Junior -
          Sistemas e Cursos</td>
      </tr>
      <tr>
        <td height="18" align="left" valign="middle"><strong>Endereço: </strong>
          Rua testes do olimpo caldeira
          ,
          14
          Palmas
          TO</td>
      </tr>
      <tr>
        <td height="18" align="left" valign="middle"><strong>Fone:</strong>
          00 0000 0000
          /
          00 0000 0000</td>
      </tr>
      <tr>
        <td height="18" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><hr /></td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="center" class="titulo_artigo_detalhes"><strong>: RECIBO :</strong></td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
  </tr>
  <?php
  		$Resgate = $_GET['Recibos'];
		$Select = mysqli_query($_SG['link'],"SELECT * FROM recibos WHERE Identificador = '$Resgate'");
		while($ResultadoSelect = mysqli_fetch_array($Select)){
			$valor = $ResultadoSelect['Valor'];
			$Cliente = $ResultadoSelect['Cliente'];
			$Referente = $ResultadoSelect['Referente'];
		}
  ?>
  <tr>
    <td height="176" colspan="2" align="center" valign="middle"><table width="88%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="160" align="left" valign="middle"><p class="sub_titulo_artigo_detalhes">Recebi de
            <?php echo $Cliente; ?> <strong></strong> a quantia de <strong>R$
            <?=number_format($valor,2,",","."); ?>
            </strong> (
          <?php
				
/*   Criado em : 12/2000
     Autor: Paulo Marote - paulomarote@altavista.com
*/
function centena($valor) {
/*
  Finalidade: Mostra por extenso um $valor entre 1 e 999
  $genero pode ser "m" para masculino ou qualquer
  outra coisa para feminino
  A estrutura desta função é a seguinte:
  caso o número seja igual a 0 ou 100 (casos especiais), simplesmente
  retorna a string "zero" ou "cem". Caso contrário inicia o processamento.
  O array multidimensional $formula contém:
  $formula[0][...] - lista das centenas
  $formula[1][...] - lista das dezenas
  $formula[2][...] - lista das unidades
  $formula[3][...] - valores entre onze e dezenove (caso especial)
  A string $centexte vai ser montada conforme o valor dado
  para formar o número por extenso
  Através do loop for, o valor por extenso é montado conforme
  o primeiro, segundo e terceiro dígito da centena (001 a 999)
  É colocado convenientemente os espaços e a conjunção "e"
  Caso o segundo dígito seja 1 e o terceiro seja entre 1 e 9,
  é executado o caso especial ($formula[3][...]) e o loop for
  é abandonado
*/
  if ($valor == 0 || $valor == 100) {
    return $valor == 0 ? "" : "cem";
  }
  else {
    $formula = array(
      0 => array(
        "cento", "duzentos", "trezentos",
        "quatrocentos", "quinhentos", "seiscentos",
        "setecentos", "oitocentos", "novecentos"
      ),
      1 => array(
        "dez", "vinte", "trinta",
        "quarenta", "cinqüenta", "sessenta",
        "setenta", "oitenta", "noventa"
      ),
      2 => array(
        "um", "dois", "três",
        "quatro", "cinco", "seis",
        "sete", "oito", "nove"
      ),
      3 => array(
        "onze", "doze", "treze",
        "quatorze", "quinze", "dezesseis",
        "dezessete", "dezoito", "dezenove"
      )
    );
    $centexte = "";
    /* as duas linhas abaixo montam a string $strcent, que nada
       mais é o valor dado em formato string com exatamente três
       caracteres, com um ou dois zeros à esquerda caso seja
       menor ou igual a 99 ou 9, respectivamente */
    $strcent = "000" . $valor;
    $strcent = substr($strcent, strlen($strcent) - 3, 3);

    // leitura dos três dígitos
    for ($i = 0; $i <= 2; $i++) {

      // lê o dígito e só mostra se estiver entre 1 e 9
      $digi = substr($strcent, $i, 1);
      if ($digi >=1 && $digi <= 9) {

        // se já foi mostrado algum número, coloca " e "
        if ($centexte != "") $centexte = $centexte . " e ";

        // esta parte verifica o caso especial (entre 11 e 19)
        if ($i == 1 && $digi == 1) {
          $digiaux = substr($strcent, 2, 1);
          if ($digiaux >=1 && $digiaux <= 9) {
            $centexte = $centexte . $formula[3][$digiaux - 1];
            break;
          }
        }

        // caso não seja caso especial, processa normalmente
        $centexte = $centexte . $formula[$i][$digi - 1];
      }
    }

    // muda para feminino, caso necessário
    if ($genero != "m") {
      $centexte = ereg_replace("tas", "tos", $centexte);
    }
    // retorna o valor por extenso
    return $centexte;
  }
}

function extenso($valor, $genero = "m") {
/*
  finalidade : mostra por extenso qualquer valor
  $valor -> numérico cujo valor por extenso deseja ser mostrado
  $genero -> "m" = masculino ; "f" = feminino
*/
  $valor = floor($valor);
  $extenso = "";
  $formula = array(
    1 => array(" mil ", " mil "),
    2 => array(" milhões ", " milhão "),
    3 => array(" bilhões ", " bilhão "),
    4 => array(" trilhões ", " trilhão "));
  // executa o loop 4 vezes, chamando a função centena
  // e concatenando com trilhões, bilhões, milhões ou
  // mil, conforme o valor de $i
  for ($i = 4; $i >=1; $i--) {
    if ($valor >= pow(10, $i * 3)) {
      // separa a centena
      $valaux = floor($valor / pow(10, $i * 3));
      $extenso .= centena($valaux, $genero);
      // concatena conforme singular ou plural
      $extenso .= ($valaux < 2) ? $formula[$i][1] : $formula[$i][0];
      // diminui o valor, retirando a centena já processada
      $valor -= ($valaux * pow(10, $i * 3));
    }
  }
  // último processo : a centena menor que mil
  $straux = centena($valor, $genero);
  if ($genero != "m") {
    $straux = ereg_replace("um", "uma", $straux);
    $straux = ereg_replace("dois", "duas", $straux);
  }
  $extenso .= $straux;
  return $extenso;
}

function moeda($valor, $genero = "m", $inteiros, $inteirop, $centavoss, $centavosp) {
/*
  finalidade : mostra $valor por extenso colocando
  a moeda desejada.
  $genero = idêntico a extenso (exemplo de moeda no
    feminino -> peseta)
  $inteiros -> valor do "inteiro" da moeda no singular  Ex: "real"
  $inteirop -> valor do "inteiro" da moeda no plural  Ex: "reais"
  $centavoss -> valor dos "centavos" da moeda no singular  Ex: "centavo"
  $centavosp -> valor dos "centavos" da moeda no plural  Ex: "centavos"
*/
  // primeiro constrói o valor inteiro
  $valaux = floor($valor);
  $moeda = extenso($valaux, $genero) . " ";
  $moeda .= $valaux < 2 ? $inteiros : $inteirop;
  // concatena com o valor dos centavos
  // foi colocado + 0.001 por um erro de arredondamento
  // do meu PHP. Espero que seja corrigido em versões mais novas
  $valaux = floor(($valor - $valaux + 0.001) * 100);
  if ($valaux > 0) {
    $moeda .= " e " . extenso($valaux, $genero) . " ";
    $moeda .= $valaux < 2 ? $centavoss : $centavosp;
  }
  return $moeda;
}

// formulário
/*
echo "<form method=\"post\" action=\"$PHP_SELF\">";
echo "Digite o número: <input type=text name=\"valor\"";
echo isset($valor) ? "value = \"$valor\"" : "";
echo "> Tipo:<input type=\"radio\" name=\"valtipo\" value=\"m\"";
if (!isset($valtipo)) $valtipo = "m";
echo $valtipo == "m" ? "CHECKED" : "";
echo ">Masculino<input type=\"radio\" name=\"valtipo\" value=\"f\"";
echo $valtipo == "f" ? "CHECKED" : "";
echo ">Feminino<br>";
*/
  /* caso já tenha sido digitado anteriormente, mostra
     o valor por extenso */
  if (isset($valor)) {
    // permite que seja usado vírgula ou ponto. Se for
    // o primeiro caso, converte a vírgula para ponto.
    $valor = ereg_replace (",", ".", $valor);
    //echo extenso($valor, $valtipo);
    echo moeda($valor, "m", "real", "reais", "centavo", "centavos");
  }
 
?>
          ) Referênte ao
          
          <?php echo $Referente; ?>.</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="center" valign="middle"><?=$data_recibo; ?></td>
  </tr>
  <tr>
    <td height="120" colspan="2" align="center" valign="bottom"><p>____________________________________________<br />
     Marques Junior - Sistemas e Cursos<br />
      CPF: 0000000000000000000000000</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>