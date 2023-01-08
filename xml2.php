<?php

try {
  $filename = 'files/paises2.xml';

  if (!file_exists($filename)) {
    throw new Exception("Arquivo {$filename} n�o existe.<br>" . PHP_EOL);
  }

  if (!is_readable($filename)) {
    throw new Exception("Arquivo {$filename} sem permiss�o de leitura.<br>" . PHP_EOL);
  }

  // interpreta o documento xml
  $xml2 = simplexml_load_file($filename);
  echo "Nome: " . $xml2->nome . "<br>" . PHP_EOL;
  echo "Idioma: " . $xml2->idioma . "<br>" . PHP_EOL;
  echo "<br>" . PHP_EOL;
  echo "*** Informa��es Geogr�ficas *** <br>" . PHP_EOL;
  echo "Clima: " . $xml2->geografia->clima . "<br>" . PHP_EOL;
  echo "Costa: " . $xml2->geografia->costa . "<br>" . PHP_EOL;
  echo "Pico: " . $xml2->geografia->pico . "<br>" . PHP_EOL;

  // altera��o da propriedade
  $xml2->moeda = 'Novo Real (NR$)';
  $xml2->geografia->clima = 'Temperado';

  //Adiciona novo nodo.
  $xml2->addChild('presidente', 'Chapolin Colorado');

  //exibindo o novo XML
  echo $xml2->asXML();
  echo "<br>".PHP_EOL;

  if (!is_writable($filename)) {
    throw new Exception("Arquivo {$filename} sem permiss�o de grava��o.<br>" . PHP_EOL);
  }

  // gravando no arquivo
  file_put_contents($filename, $xml2->asXML());
} catch (Exception $e) {
  echo $e->getMessage();
}
