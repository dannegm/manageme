<?php
class Error
{
	private $_errors array(
		'No se pudo conectar con la base de datos',
		'No se pudo registrar usuario'
	);

	public function die ($_key) {
		die ( $_errors[$_key] );
	}
}