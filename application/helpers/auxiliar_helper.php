<?php
/* 
 * Helper to load convert data/time into your project.
 * @author Gilliano Vieira
 * @version 1.0
 * @param array $data
 */

//Função que converte a data para o BD
function converteData($data){
	$retorno = explode("/", $data);
	$retorno = $retorno[2]."-".$retorno[1]."-".$retorno[0];
	return $retorno;
}

//Função que converte a data para apresentação
function reverteData($data){
	$retorno = explode("-", $data);
	$retorno = $retorno[0]."/".$retorno[1]."/".$retorno[2];
	return $retorno;
}

//Função que converte o valor decimal para o BD
function converteValor($valor){
	$retorno = str_replace(".", "", $valor);
    $retorno = str_replace(",", ".", $retorno);
    return $retorno;
}
?>