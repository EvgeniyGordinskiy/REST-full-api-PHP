<?php
namespace App\Services\JWTAuth;

use App\Services\Exceptions\JwtKeysUndefinedException;
use Firebase\JWT\JWT;

class JWTAuth
{
	protected $jwt;

	protected $publicKey;
	protected $privateKey;
	protected $payload;

	public function __construct()
	{
		$this->jwt = new JWT();
		$protected_key_path = config('app', 'jwt_protected_key_file');
		$public_key_path = config('app', 'jwt_public_key_file');

		if ($protected_key_path) {
			$this->privateKey = file_get_contents($protected_key_path);
		} else {
			throw new JwtKeysUndefinedException();
		}

		if ($public_key_path) {
			$this->privateKey = file_get_contents($public_key_path);
		} else {
			throw new JwtKeysUndefinedException();
		}

	}

	public function encode($payload, $alg = 'RS256', $keyId = null, $head = null)
	{
		$this->jwt->encode($payload, $this->privateKey, $alg, $keyId, $head);
	}


	public function decode($jwt, $key, array $allowed_algs = array())
	{
		$this->jwt->decode($jwt, $key, $allowed_algs);
	}
}