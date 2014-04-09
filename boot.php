<?php
	require_once(LC_PATH.'core/class_loader.class.php');

	spl_autoload_register(array('class_loader', 'load'));

	try {
		/** instansiate registry **/
		$reg = new registry();

		/** instansiate core components **/
		$reg->session = new session();
		$reg->layout = new layout($reg);

		/** instansiate DAL **/
		init_dal($reg);

		/** route and execute **/

        /** route and execute **/
        $uri_components = parse_url($_SERVER['REQUEST_URI']);
        $uri_components['path'] = ltrim($uri_components['path'], '/');
        $reg->route = $uri_components['path'];

        //TODO: need to add as component to dapi, maybe in router, maybe in session.
        $query = array();
        if(isset($uri_components['query'])) {
            $query_parts = explode('&',$uri_components['query']);
            foreach($query_parts as $part) {
                $kv_pair = explode('=', $part);
                $query[$kv_pair[0]] = isset($kv_pair[1]) ? $kv_pair[1] : false;
            }
        }

        $reg->input = $query;

		//$reg->route = isset($_GET['rt']) ? $_GET['rt'] : '';
		$reg->router = new router($reg);
		$reg->router->route();

	} catch(Exception $e) {
		die($e->getMessage());
	}
?>
