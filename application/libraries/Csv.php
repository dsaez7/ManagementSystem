<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class CsvWOM {
	public function __construct() {
		// ...
	}
	  
	// FUNCION PARA EXPORTAR .CSV
	public function exportcsv($array, $nombre){
		$export = array();
		$fila = array();
		foreach ($array[0] as $key => $value) {
			array_push($fila, $key);
		}
		array_push($export, $fila);
		foreach ($array as $key => $value) {
			array_push($export,array_values((array)$value));
		}
		$this->doCsv(  $nombre.".csv", $export );
	}


	/**
	 * [doCsv description]
	 * @param  [type] $fileName [description]
	 * @param  array  &$array   [description]
	 * @return [type]           [description]
	 */
	public function doCsv( $fileName = null, array &$array ) {
		if( !is_null( $fileName ) ) {
			
			// disable caching
			$now = gmdate("D, d M Y H:i:s");
			header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
			header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
			header("Last-Modified: {$now} GMT");

			// force download  
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");

			// disposition / encoding on response body
			header("Content-Disposition: attachment;filename={$fileName}");
			header("Content-Transfer-Encoding: binary");
			
			// generate CSV
			$contents = "";
			$delimiter = ";";
			$enclosure = '"';

			$handle = fopen('php://temp', 'r+');
			fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF)); // Codificacion para mostrar caracteres UTF-8 (tildes y ñ's)
			foreach( $array as $line )
				fputcsv( $handle, $line, $delimiter, $enclosure );
			rewind($handle);
			while( !feof( $handle ) )
				$contents .= fread( $handle, 8192 );
				
			fclose( $handle );
			echo $contents;
			die();
		} else
			return null;
	}
} 

?>