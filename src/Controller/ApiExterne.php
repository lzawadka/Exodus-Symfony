<?php


namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiExterne extends AbstractController
{
  /**
   * @Route("/api/weather", name="weather")
   */
  function getWeather()
  {
    $httpClient = HttpClient::create();
    $response = $httpClient->request('GET', 'https://api.nasa.gov/insight_weather/?api_key=GO6SxdYmzdPaDxeq3IE8G9PPt1xsubHysem6h8bA&feedtype=json&ver=1.0');

    // Check HTTP response
    if (200 !== $response->getStatusCode()) {
      // handle the HTTP request error
      echo strval('Error(/weather): Status Code: ' . $response->getStatusCode());
    } else {
      $content = $response->getContent();
      $responseApi = JsonResponse::fromJsonString($content);
      return $responseApi;
    }
  }

  /**
   * @Route("/api/picture-day", name="picture-day")
   */
  function getPictureDay()
  {
    $httpClient = HttpClient::create();
    $response = $httpClient->request('GET', 'https://api.nasa.gov/planetary/apod?api_key=GO6SxdYmzdPaDxeq3IE8G9PPt1xsubHysem6h8bA');
    // Check HTTP response
    if (200 !== $response->getStatusCode()) {
      // handle the HTTP request error
      echo strval('Error(/weather): Status Code: ' . $response->getStatusCode());
    } else {
      $content = $response->getContent();
      $responseApi = JsonResponse::fromJsonString($content);
      return $responseApi;
    }
  }

}