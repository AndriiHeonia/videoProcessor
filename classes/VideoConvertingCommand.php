<?php
/**
 * VideoConvertingCommand class
 * 
 * @author Andrey Geonya
 */
class VideoConvertingCommand implements IQueueListenerCommand
{
	public function execute()
	{
		$videoConverter = new FFMpegConverter();
		$videoConverter->setInputFileName($videoFolder . DIRECTORY_SEPARATOR . $uploadedFile->getName());
		$videoConverter->setOutputFileName($videoFolder . DIRECTORY_SEPARATOR . uniqid() . '.flv');
		$videoConverter->setOutputFileParams(array(
			'-ab'=>56,
			'-ar'=>44100,
			'-b'=>200,
			'-r'=>15,
			'-s'=>'320x240',
			'-f'=>'flv',
		));

		return $videoConverter->execute();		
	}
}