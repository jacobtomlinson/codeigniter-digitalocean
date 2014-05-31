<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * DigitalOcean API Helper
 * 
 * See DigitalOcean library for details
 */

function connectToApi($uri) {
	if(extension_loaded('curl') && function_exists('curl_init') && $ch = @curl_init()){
		curl_setopt($ch, CURLOPT_URL, $uri);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		$content = curl_exec($ch);
		curl_close($ch);
		if($content != null){
			return $content;
		}
	}		

	if (!ini_get('allow_url_fopen')) {
		throw new \RuntimeException('Error: allow_url_include disabled!');
	}

	if (function_exists('file_get_contents')) {
		$content = file_get_contents($uri);
		return $content;
	} 

	if (function_exists('fopen')) {
		$fp = fopen($uri, 'r');
		$content = '';

		if ($fp) {
			while (!feof($fp)) {
				$content .= fgets($fp);
			}
			fclose($fp);
			return $content;
		}
		return $content;
	} 

	throw new \RuntimeException('Error: DigitalOcean class cannot connect to api!');
}
