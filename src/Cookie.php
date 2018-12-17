<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/10/2018
 * Time: 19:50
 */

namespace Rabbit\Http\Cookies;

class Cookie implements CookieInterface
{

    public $cookies;

    public static $_instance;

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function add(CookieDataInterface $cookie) : CookieDataInterface {
        if(!$this->hasClassData($cookie->getName())) {
            $this->cookies[$cookie->getName()] = $cookie;
        }
        if(!$this->hasCookieData($this->cookies[$cookie->getName()]->getName())) {
            $this->cookies[$cookie->getName()]->loadInformation();
            $this->cookies[$cookie->getName()]->setIsUsed(true);
        }
        return $this->cookies[$cookie->getName()];
    }

    public function delete(string $name) : bool {
        if($this->hasClassData($name) && $this->hasCookieData($name)) {
            unset($_COOKIE[$name]);
            $this->cookies[$name]->setIsUsed(false);
            return true;
        }
    }

    public function get(string $name) {
        if($this->hasClassData($name)) {
            return $this->cookies[$name];
        } else {
            throw new CookieException("[Xirion\Http\Cookie\Cookie.php => get] The specified cookie $name doesn't exists");
        }
    }

    public function hasClassData(string $name) : bool {
        return isset($this->cookies[$name]);
    }

    public function hasCookieData(string $name) : bool {
        return isset($_COOKIE[$name]);
    }
}