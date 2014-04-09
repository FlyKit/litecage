<?php

	interface controller_template {
		function __set($index, $value);
		function __get($index);
		function __construct($reg);
		function init();
		function index_action();
		public function show();
	}

	abstract class base_controller {
		var $variables;

		function __set($index, $value) {
			$this->variables[$index] = $value;
		}

		function __get($index) {
			return $this->variables[$index];
		}

		function __construct($reg) {
			$this->variables = array();
			$this->reg = $reg;
			$this->init();
		}

		public function show() {
			$this->reg->layout->load_layout($this->variables);
		}
	}

?>
