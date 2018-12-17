<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/10/2018
 * Time: 20:07
 */

namespace Rabbit\Http\Cookies;

interface CookieDataInterface
{
    public function loadInformation();

    public function getName();

    public function getValue();

    public function getExpiration();

    public function getPath();

    public function getDomain();

    public function isUsingHttp();

    public function isUsingHttpOnly();

    public function getOptions();

    public function setName(string $name = '');

    public function setValue($value);

    public function setExpiration(int $expiration = null);

    public function setPath(string $path = '');

    public function setDomain(string $domain = '');

    public function useHttps(bool $https = true);

    public function useHttpOnly(bool $httpOnly = false);

}