<?php

	class controller extends base_controller {

		function init() {

		}

		function index() {

		}

		function add_input() {
			if(empty($_POST['textin'])) $this->fail("missing input");
			$_SESSION['inputs'] = $_SESSION['inputs']."<br/>".$_POST['textin'];
			$this->success();
		}

		function show_inputs() {
			echo $_SESSION['inputs'];
			die();
		}

	}

?>
