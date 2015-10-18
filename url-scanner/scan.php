<?php
require 'vendor/autoload.php';


$client = new \GuzzleHttp\Client();
$csv = \League\Csv\Reader::createFromPath($argv[1]);

foreach ($csv as $csvRow) {
  try {
    $httpResponse = $client->options($csvRow[0]);
    $statusCode = $httpResponse->getStatusCode();
    echo $csvRow[0]. ': ' . $statusCode . PHP_EOL;
  } catch (\Exception $e) {
    echo $csvRow[0] . PHP_EOL;
  }
}
