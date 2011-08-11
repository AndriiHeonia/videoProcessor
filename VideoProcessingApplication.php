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
        
		$videoFolder = 'videos';
		// Init file manager
		$fileManager = FileManager::getInstance();
		
		// Init uploaded file
		$uploadedFile = new UploadedFile('movie');
		
		// Move original file from templary folder to persistent folder
		$fileManager->moveUploadedFile($uploadedFile, $videoFolder);
		
		// Create memcache connection
		$memcache = new Memcache();
		$memcache->connect('localhost', 22201);
		
		// Init video converting command
		$videoConvertingCommand = new FFMpegConvertingCommand(
			$videoFolder . DIRECTORY_SEPARATOR . $uploadedFile->getName(),
			$videoFolder . DIRECTORY_SEPARATOR . uniqid(),
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
		
		echo 1;
	}
}

$app = new VideoProcessingApplication();
$app->main();