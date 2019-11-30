<?php

class SingletonPattern {

    private static $instance = null;
    public $x;
    
    public static function getSingleton() {

        if(!self::instance) {
            self::instance = new SingletonPattern(10);
        }

        return self::instance;
    }

    private function __construct($x) {
        $this->x = $x;
    }

    private function __clone(){}
}