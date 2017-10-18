<?php

namespace App\Services\Http\Request\src;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
class RequestFacade implements RequestInterface
{
   public function withUri(UriInterface $uri, $preserveHost = false)
   {
	   // TODO: Implement withUri() method.
   }

   public function getRequestTarget()
   {
	   // TODO: Implement getRequestTarget() method.
   }

   public function withRequestTarget($requestTarget)
   {

   }

   public function getHeader($request)
   {

   }

   public function hasHeader($request)
   {

   }

   public function withHeader($request, $value)
   {

   }

   public function withAddedHeader($request, $value)
   {

   }

   public function withMethod($method)
   {

   }

   public function getHeaders()
   {

   }

   public function withoutHeader($header)
   {

   }

   public function getMethod()
   {

   }

   public function getHeaderLine($line)
   {

   }

   public function getBody()
   {

   }

   public function getProtocolVersion()
   {

   }

   public function withBody(StreamInterface $body)
   {

   }

   public function getUri()
   {

   }

   public function withProtocolVersion($version)
   {

   }
}