<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/10/2018
 * Time: 19:51
 */

namespace Rabbit\Http\Cookies;

interface CookieInterface
{
    public function add(CookieDataInterface $cookie) : CookieDataInterface;

    public function delete(string $cookie) : bool;

    public function get(string $cookie);

    public function hasClassData(string $name) : bool;

    public function hasCookieData(string $name) : bool;
}