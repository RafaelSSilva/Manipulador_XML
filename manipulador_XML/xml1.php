<?php

/**
 * https://linux07/callcenter/rafael/manipulador_XML/xml1.php
 * https://linux03/callcenter/rafael/manipulador_XML/xml1.php
 *
 */


try {
  $filename = 'files/paises.xml';

  if (!file_exists($filename)) {
    throw new Exception("Arquivo {$filename} não existe.<br>" . PHP_EOL);
  }

  if (!is_readable($filename)) {
    throw new Exception("Arquivo {$filename} sem permissão de leitura.<br>" . PHP_EOL);
  }

  // interpreta o documento xml
  $xml = simplexml_load_file($filename);

  if (!$xml) {
    throw new Exception("Arquivo mal formatado.<br>" . PHP_EOL);
  }

  print '*** Objeto ***<br>' . PHP_EOL;
  print '<pre>';
  print_r($xml);
  print '</pre>';
  print '<br>' . PHP_EOL;

  // exibe os atributos do objeto criado.
  echo "Nome: " . $xml->nome . "<br>" . PHP_EOL;
  echo "Idioma: " . $xml->idioma . "<br>" . PHP_EOL;
  echo "Capital: " . $xml->capital . "<br>" . PHP_EOL;
  echo "Moeda: " . $xml->moeda . "<br>" . PHP_EOL;
  echo "Prefixo: " . $xml->prefixo . "<br>" . PHP_EOL;
  print '<br>' . PHP_EOL;

  //Percorrendo objeto
  foreach ($xml->children() as $chave => $valor) {
    print "{$chave}: ".$valor."<br>".PHP_EOL;
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
