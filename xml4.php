<?php

try {
  $filename = 'files/paises4.xml';

  if (!file_exists($filename)) {
    throw new Exception("Arquivo {$filename} n�o existe.<br>" . PHP_EOL);
  }

  if (!is_readable($filename)) {
    throw new Exception("Arquivo {$filename} sem permiss�o de leitura.<br>" . PHP_EOL);
  }

  // interpreta o documento xml
  $xml = simplexml_load_file($filename);

  if (!$xml) {
    throw new Exception("Arquivo mal formatado.<br>" . PHP_EOL);
  }

  echo "Nome: " . $xml->nome . "<br>" . PHP_EOL;
  echo "Idioma: " . $xml->idioma . "<br>" . PHP_EOL;
  echo "Capital: " . $xml->capital . "<br>" . PHP_EOL;
  echo "Moeda: " . $xml->moeda . "<br>" . PHP_EOL;
  echo "Prefixo: " . $xml->prefixo . "<br>" . PHP_EOL;
  echo "<br>" . PHP_EOL;

  echo "*** Geografia *** <br>" . PHP_EOL;
  echo "Clima: " . $xml->geografia->clima . "<br>" . PHP_EOL;
  echo "Costa: " . $xml->geografia->costa . "<br>" . PHP_EOL;
  echo "Pico: " . $xml->geografia->pico['nome'] . " Altitude: " . $xml->geografia->pico['altitude'] . "<br>" . PHP_EOL;
  echo "<br>" . PHP_EOL;

  echo "*** Estados *** <br>" . PHP_EOL;
  //percorrer a lista de estados
  foreach ($xml->estados->estado as $estado) {
    echo "Estado: " . $estado['nome'] . " Capital: " . $estado['capital'] . "<br>" . PHP_EOL;
  }
  echo "<br>" . PHP_EOL;

  echo "*** Estados *** <br>" . PHP_EOL;
  //percorre a lista de estados
  foreach ($xml->estados->estado as $estado) {
    //percorre os atributos de cada estado
    foreach ($estado->attributes() as $key => $value) {
      echo "$key: $value <br>".PHP_EOL;
    }
    echo "<br>" . PHP_EOL;
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
