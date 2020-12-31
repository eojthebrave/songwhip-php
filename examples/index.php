<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Songwhip\Client;
use GuzzleHttp\Client as Guzzle;

$songwhip = new Client(new Guzzle());
$album = $songwhip->getFromServiceUrl('https://open.spotify.com/album/4Lu520UvMf7lJccCnKw3hJ?si=lDMPv1M6S3-3Fq_iXAn73A');

if ($album) {
  var_dump($album);
}
