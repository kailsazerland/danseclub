<?php
class Music {
	public $style = '';
	public $movement = '';

	function play(){
		echo $this->style;
	}

	function danse(){
		echo $this->movement;
	}

	function getStyle(){
		return get_called_class();
	}
}

?>