<?php

	class registry {

		var $variables;

		function __construct() {
			$this->variables = array();
		}

		function __set($index, $value) {
            if(!isset($this->variables[$index])) $this->variables[$index]='';
			$this->variables[$index] = $value;
		}

		function __get($index) {
            if(!isset($this->variables[$index])) return '';
			return $this->variables[$index];
			return isset($this->variables[$index]) ? $this->variables[$index] : false;
		}

	}
?>
