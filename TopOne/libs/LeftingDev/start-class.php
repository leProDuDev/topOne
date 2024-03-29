<?php

// By Yanis6660
class LeftingDev {
	
	private $dir;
	private $dirTheme;
	private $PageIndex;
	
	public function start($dir, $dirTheme, $PageIndex) {
		
		$this->dir = glob($dir . '*');
		$this->dirTheme = $dirTheme;
		$this->PageIndex = $PageIndex;

		$GLOBALS['dirTheme'] = $dirTheme;
	}

	// Emulate Page
	public function EmulatePage() {

		// AutoLoad
		require '../libs/LeftingDev/AutoLoad.php';

		// Variable
		$found = false;

		foreach ($this->dir as $filename) {

			$getFile = pathinfo($filename);

			if (parse_url($_SERVER ["REQUEST_URI"], PHP_URL_PATH) == "/" . str_replace("_", "/", $getFile ['filename']) 
					|| parse_url($_SERVER ["REQUEST_URI"], PHP_URL_PATH) == "/" . str_replace("_", "/", $getFile ['filename']) . "/") {

				if ($getFile['extension'] == "php") {

					// echo $getFile['filename'], '<br />';
					// echo $_SERVER['REQUEST_URI'];

					include $getFile['dirname'].'/'.$getFile['basename'];

					$found = true;
					
					return;
				}
			}
		}

		if ($_SERVER['REQUEST_URI'] == "/") {
			
			$found = true;
			header('Location: '.$this->PageIndex);
			die();
			
		}

		if ($found == false) {
			
			foreach ($this->allFile($this->dirTheme."/www/") as $filename) {
				
				$getFile = pathinfo($filename);
				
				$file = str_replace("\\", "/", $getFile['dirname']) .'/'.$getFile['basename'];
				
				if(str_replace(str_replace("\\", "/", realpath($this->dirTheme."/www/")), "", $file) == $_SERVER['REQUEST_URI']) {
					
					if ((file_exists($file) && ! is_dir($file))) {
						
						header('content-type: '.$this->MimeContent($file));
						readfile($file);
						
						exit();
						
					} else {
						
						$this->error(404);
						exit();
						
					}
					
				}
				
			}
			
			$this->error(404);
			exit();
			
		}
	}
	
	private function allFile($dir, &$results = array()){
		
		$files = scandir($dir);
		
		foreach($files as $value){
			
			$path = realpath($dir."//".$value);
			
			if(!is_dir($path)) {
				
				$results[] = $path;
				
			} else if($value != "." && $value != "..") {
				
				AllFile($path, $results);
				$results[] = $path;
				
			}
			
		}
		
		return $results;
	}
	
	private function error($code) {
		
		if ($code == 404) {

			header("HTTP/1.0 404 Not Found");
		}
		
	}

	// MimeContent return content type.
	public function MimeContent($filename) {
		
		$mime_types = array (
				
				'txt' => 'text/plain',
				'htm' => 'text/html',
				'html' => 'text/html',
				'php' => 'text/html',
				'css' => 'text/css',
				'js' => 'application/javascript',
				'json' => 'application/json',
				'xml' => 'application/xml',
				'swf' => 'application/x-shockwave-flash',
				'flv' => 'video/x-flv',

				// images

				'png' => 'image/png',
				'jpe' => 'image/jpeg',
				'jpeg' => 'image/jpeg',
				'jpg' => 'image/jpeg',
				'gif' => 'image/gif',
				'bmp' => 'image/bmp',
				'ico' => 'image/vnd.microsoft.icon',
				'tiff' => 'image/tiff',
				'tif' => 'image/tiff',
				'svg' => 'image/svg+xml',
				'svgz' => 'image/svg+xml',

				// archives

				'zip' => 'application/zip',
				'rar' => 'application/x-rar-compressed',
				'exe' => 'application/x-msdownload',
				'msi' => 'application/x-msdownload',
				'cab' => 'application/vnd.ms-cab-compressed',

				// audio/video

				'mp3' => 'audio/mpeg',
				'qt' => 'video/quicktime',
				'mov' => 'video/quicktime',

				// adobe

				'pdf' => 'application/pdf',
				'psd' => 'image/vnd.adobe.photoshop',
				'ai' => 'application/postscript',
				'eps' => 'application/postscript',
				'ps' => 'application/postscript',

				// ms office

				'doc' => 'application/msword',
				'rtf' => 'application/rtf',
				'xls' => 'application/vnd.ms-excel',
				'ppt' => 'application/vnd.ms-powerpoint',

				// open office

				'odt' => 'application/vnd.oasis.opendocument.text',
				'ods' => 'application/vnd.oasis.opendocument.spreadsheet'
				
		);

		$explode = explode('.', $filename);

		if (is_array ($explode)) {
			
			$ext = array_pop($explode);
			
		} else {
			
			$ext = null;
			
		}

		if (array_key_exists($ext, $mime_types)) {
			
			return $mime_types[$ext];
			
		} elseif (function_exists('finfo_open')) {
			
			$finfo = finfo_open(FILEINFO_MIME);
			$mimetype = finfo_file($finfo, $filename);
			finfo_close($finfo);
			
			return $mimetype;
			
		} else {
			
			return 'application/octet-stream';
			
		}
		
	}
	
}

?>