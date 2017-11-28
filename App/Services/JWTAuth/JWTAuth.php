<?php
namespace App\Services\JWTAuth;

use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\JWTAuthException;
use App\Services\Exceptions\JwtKeysUndefinedException;
use Firebase\JWT\JWT;

class JWTAuth
{
	protected $jwt;

	protected $publicKey;
	protected $privateKey;
	protected $payload;

	/**
	 * Create instance of JWTAuth and assign jwt, payload, privateKey and publicKey properties.
	 * JWTAuth constructor.
	 * @param $payload
	 */
	public function __construct($payload)
	{
		$this->jwt = new JWT();
		$this->payload = $payload;
		$private_key_path = config('app', 'jwt_private_key_file');

		if ($private_key_path) {
			$this->privateKey = file_get_contents($private_key_path);
		} else {
			throw new JwtKeysUndefinedException();
		}

		$resource = openssl_pkey_get_private("file://$private_key_path");
		$pubKey = openssl_pkey_get_details($resource);

		if (isset($pubKey['key'])) {
			$this->publicKey = $pubKey['key'];
		} else {
			throw new JwtKeysUndefinedException();
		}

	}

	/**
	 * Create token
	 * @param string $alg
	 * @param null $keyId
	 * @param null $head
	 * @return string
	 */
	public function encode($alg = 'RS256', $keyId = null, $head = null) :string
	{   $token = $this->jwt->encode($this->payload, $this->privateKey, $alg, $keyId, $head) ;
		if ( !$token ) {
			throw new JWTAuthException();
		}
		return	$token;
	}

	/**
	 * create payload from tok
	 * @param string $token
	 * @param array $allowed_algs
	 * @return object
	 */
	public function decode(string $token, array $allowed_algs = array('RS256')) :object
	{
		$payload = $this->jwt->decode($token, $this->publicKey, $allowed_algs);
		if ( !$payload ) {
			throw new JWTAuthException();
		}
		return	$payload;
	}
}