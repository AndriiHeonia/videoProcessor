<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'UploadedFile.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FFMpegConverter.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FileManager.php';

/**
 * SimpleApplication class
 * 
 * @author Andrey Geonya
 */
class VideoProcessingApplication
{
	public function main()
	{
		// Allow only POST requests
		if(!$_POST)
			die('Access denied. Only POST requests available.');
		
		$videoFolder = '/media/www/public_html/videoProcessor/testMovies';
		
		// Init file manager
		$fileManager = FileManager::getInstance();
		
		// Init uploaded file
		$uploadedFile = new UploadedFile('movie');

		// Move original file from templary folder to persistent folder
		$fileManager->moveUploadedFile($uploadedFile, $videoFolder);
	}
}

$app = new VideoProcessingApplication();
$app->main();