<?php

/**
 * https://linux07/callcenter/rafael/manipulador_XML/xml3.php
 * https://linux03/callcenter/rafael/manipulador_XML/xml3.php
 */

try {
  $filename = 'files/paises3.xml';

  if (!file_exists($filename)) {
    throw new Exception("Arquivo {$filename} não existe.<br>" . PHP_EOL);
  }

  if (!is_readable($filename)) {
    throw new Exception("Arquivo {$filename} sem permissão de leitura.<br>" . PHP_EOL);
  }

  $xml3 = simplexml_load_file($filename);
  echo "Nome: " . $xml3->nome . "<br>" . PHP_EOL;
  echo "Idioma: " . $xml3->idioma . "<br>" . PHP_EOL;
  echo "<br>" . PHP_EOL;
  echo "*** Estados *** <br>" . PHP_EOL;
  /**
   * Você pode acessar um estado diretamente pelo seu indice
   * echo $xml->estados->nome[0]
   */
  foreach ($xml3->estados->nome as $estado) {
    echo "Estado: " . $estado . "<br>" . PHP_EOL;
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
