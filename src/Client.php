<?php

namespace Songwhip;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class Client {

  /**
   * @var \GuzzleHttp\ClientInterface
   */
  protected $http;

  /**
   * Create a new Songwhip client.
   *
   * @param \GuzzleHttp\ClientInterface $http
   */
  public function __construct(ClientInterface $http) {
    $this->http = $http;
  }

  /**
   * Get songwhip details from a service provider URL.
   *
   * @param (string) $serviceUrl
   *   URL of a resource copied from Spotify, Apple Music or another compatible
   *   service that you want to look up via Songwhip.
   *
   * @return false|mixed
   *   Returns FALSE if there's not a valid response. Otherwise a generic object
   *   containing all the data returned by Songwhip.
   */
  public function getFromServiceUrl($serviceUrl) {
    try {
      $response = $this->http->request(
        'POST',
        'https://songwhip.com',
        [
          'json' => ['url' => $serviceUrl],
        ]
      );
    } catch (GuzzleException $exception) {
      return FALSE;
    }

    if ($response->getStatusCode() === 200) {
      return json_decode($response->getBody());
    }

    return FALSE;
  }
}
