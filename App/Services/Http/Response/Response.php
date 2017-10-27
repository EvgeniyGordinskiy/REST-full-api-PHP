<?php
namespace App\Services\Http\Response;

class Response
{
	public $server;
	public function __construct()
	{
		$this->createResponse();
	}		

	protected function createResponse()
	{
		$this->server = new \Zend\Diactoros\Response();
	}

	public function setStatusCode(int $code)
	{
		$this->server = $this->server->withStatus($code);
	}

	public function write($data)
	{
		$this->server->getBody()->write(json_encode($data));
	}

	public function send($msg = false)
	{
		$status = $this->server->getStatusCode();
		http_response_code($status);
		if ( $headers = $this->server->getHeaders() ) {
			foreach ($headers as $header) {
				header($header);
			}
		}
		$this->server->getBody()->rewind();
		$content = $this->server->getBody()->getContents();
		if ( $content ) {
			header_remove('Content-type');
			header('Content-type:application/json;charset=utf-8');
			echo $content;
		}
		if ($msg) {
			echo $msg;
		}
	}
}