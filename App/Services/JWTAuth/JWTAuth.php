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
//		$private_key_path = config('app', 'jwt_private_key_file');

	}

	/**
	 * Create new private key.
	 * @return resource
	 */
	public static function create_private_token() :resource
	{
		$config = array(
			'digest_alg' => 'sha2',
			'private_key_bits' => 2048,
			'private_key_type' => OPENSSL_KEYTYPE_RSA,
		);
		$private_token = openssl_pkey_new($config);

		return $private_token;
	}
	
	/**
	 * Create new private key.
	 * @return resource
	 */
	public static function create_public_token(string $private_token) :string
	{
		$resource = openssl_pkey_get_private($private_token);

		$public_token = openssl_pkey_get_details($resource);

		return $public_token;
	}

	/**
	 * Create new public token and compare with current public token 
	 * @param $private_token
	 * @param $public_token
	 * @return int
	 */
	public function check_token($private_token, $public_token)
	{
			$pubToken = $this->create_public_token($private_token);

			return strcasecmp($public_token, $pubToken);
	}
	/**
	 * Create token
	 * @param string $alg
	 * @param null $keyId
	 * @param null $head
	 * @return string
	 */
	public function encode($alg = 'RS256', $keyId = null, $head = null) :string
	{
		$token = $this->jwt->encode($this->payload, $this->privateKey, $alg, $keyId, $head) ;
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