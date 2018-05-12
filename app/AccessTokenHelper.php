<?php
namespace KungFu;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Config\Repository;

class AccessTokenHelper
{
    protected $config;
    protected $key;
    protected $jwt;
    const ACCESS_TOKEN = 'accessToken';

    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->key = $config->get('app.key');
        $this->jwt = app()->make(JWT::class);
    }

    public static function build()
    {
        return app()->make(AccessTokenHelper::class);
    }

    public function decode($token)
    {
        return (array) $this->jwt->decode($token, $this->key, ['HS256']);
    }

    public function encode($claims)
    {
        $payload = $this->mergeClaims($claims);
        return $this->jwt->encode($payload, $this->key);
    }

    protected function mergeClaims($claims)
    {
        $current = Carbon::now();
        $expiry = $current;
        $claims['nbf'] = $current->getTimestamp();
        $claims['exp'] = $expiry->addDays(1)->getTimestamp();
        $claims['iss'] = $this->config['app.jwt.iss'];
        $claims['aud'] = $this->config['app.jwt.aud'];
        return $claims;
    }

    public function generateAccessToken($faculty)
    {
        $claims = [
            'sub' => $faculty->id,
            'typ' => self::ACCESS_TOKEN
        ];
        return $this->encode($claims);
    }
}