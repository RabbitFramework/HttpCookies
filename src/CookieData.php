<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/10/2018
 * Time: 21:25
 */

namespace Rabbit\Http\Cookies;

/**
 * Class CookieData
 * @package Rabbit\Http\Cookies
 */
class CookieData implements CookieDataInterface
{
    /**
     * @var string|null
     */
    public $cookieName = null;
    /**
     * @var null
     */
    public $cookieValue = null;
    /**
     * @var array
     */
    public $cookieOptions = [
        'expiration' => null,
        'path' => '',
        'domain' => '',
        'https' => false,
        'httpOnly' => false
    ];
    /**
     * @var bool
     */
    public $isUsed = false;

    /**
     * CookieData constructor.
     * @param string|null $name
     * @param null $value
     */
    public function __construct(string $name = null, $value = null)
    {
        $this->cookieName = $name;
        $this->cookieValue = $value;
    }

    /**
     *
     */
    public function loadInformation() {
        setcookie($this->cookieName, $this->cookieValue, $this->cookieOptions['expiration'], $this->cookieOptions['path'], $this->cookieOptions['domain'], $this->cookieOptions['https'], $this->cookieOptions['httpOnly']);
    }

    /**
     * @return string|null
     */
    public function getName() {
        return $this->cookieName;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->cookieValue;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->cookieOptions['expiration'];
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->cookieOptions['path'];
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->cookieOptions['domain'];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->cookieOptions;
    }

    /**
     * @return mixed
     */
    public function isUsingHttp()
    {
        return $this->cookieOptions['httpOnly'];
    }

    /**
     * @return mixed
     */
    public function isUsingHttpOnly()
    {
        return $this->cookieOptions['https'];
    }

    /**
     * @return bool
     */
    public function isUsed(): bool
    {
        return $this->isUsed;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(string $name = null) {
        $this->cookieName = $name;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value) {
        $this->cookieValue = $value;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param int|null $expiration
     * @return $this
     */
    public function setExpiration(int $expiration = null) {
        $this->cookieOptions['expiration'] = $expiration;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path = '') {
        $this->cookieOptions['path'] = $path;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param string $domain
     * @return $this
     */
    public function setDomain(string $domain = '') {
        $this->cookieOptions['domain'] = $domain;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param bool $https
     * @return $this
     */
    public function useHttps(bool $https = true) {
        $this->cookieOptions['https'] = $https;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param bool $httpOnly
     * @return $this
     */
    public function useHttpOnly(bool $httpOnly = false) {
        $this->cookieOptions['httpOnly'] = $httpOnly;
        $this->loadInformation();
        return $this;
    }

    /**
     * @param bool $isUsed
     * @return CookieData
     */
    public function setIsUsed(bool $isUsed): CookieData
    {
        $this->isUsed = $isUsed;
        return $this;
    }
}