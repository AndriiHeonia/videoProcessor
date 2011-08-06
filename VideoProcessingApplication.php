<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'UploadedFile.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FFMpegConverter.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FileManager.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FFMpegConvertingCommand.php';

/**
 * VideoProcessingApplication class
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
				
		// Init file manager
		$fileManager = FileManager::getInstance();
		
		// Init uploaded file
		$uploadedFile = new UploadedFile('movie');

		// Move original file from templary folder to persistent folder
		$fileManager->moveUploadedFile($uploadedFile, '/media/www/public_html/videoProcessor/testMovies');
		
		// Create memcache connection
		$memcache = new Memcache();
		$memcache->connect('localhost', 22201);
		
		// Init video converting command
		$videoConvertingCommand = new FFMpegConvertingCommand(
			'/media/www/public_html/videoProcessor/testMovies/' . $uploadedFile->getName(),
			'/media/www/public_html/videoProcessor/testMovies/' . uniqid(),
			array(),
			array(
				'-ab'=>56,
				'-ar'=>44100,
				'-b'=>200,
				'-r'=>15,
				'-s'=>'320x240',
				'-f'=>'flv',				
			));

		// Set command to the queue
		$memcache->set('videoToConvert', $videoConvertingCommand);
		
		echo 'Thanks! Your video uploaded and will be converted to valid format.';
	}
}

$app = new VideoProcessingApplication();
$app->main();