<?php
namespace KungFu\Guards;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use KungFu\AccessTokenHelper;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JWTGuard implements Guard
{
    protected $request;
    protected $provider;
    protected $rawToken;
    protected $decodedToken;
    protected $user;
    protected $tokenHelper;
    public function __construct(UserProvider $provider, Request $request, AccessTokenHelper $accessTokenHelper)
    {
        $this->request = $request;
        $this->provider = $provider;
        $this->rawToken = $this->request->bearerToken();
        $this->tokenHelper = $accessTokenHelper;
        $this->decodedToken();
    }
    protected function decodedToken()
    {
        if (!is_null($this->rawToken)) {
            try {
                $this->decodedToken = $this->tokenHelper->decode($this->rawToken);
                if ($this->decodedToken['typ'] === $this->tokenHelper::ACCESS_TOKEN) {
                    $this->user = $this->provider->retrieveById($this->decodedToken['sub']);
                }
            } catch (\Exception $e) {
                throw new HttpException(400, $e ->getMessage());
            }
        }
    }
    public function check()
    {
        return !$this->guest();
    }
    public function guest()
    {
        return is_null($this->user());
    }
    public function user()
    {
        return $this->user;
    }
    public function id()
    {
        return $this->decodedToken['sub'];
    }
    public function validate(array $credentials = [])
    {
        return false;
    }
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
    }
}