<?php
class People {
    public $name = '';
    public $preference = '';
    public $state = '';

    function __construct($name, $preference){
        $this->name = $name;
        $this->preference = $preference;
    }
}
?>