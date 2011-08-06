<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'MemcacheQBasedListener.php';

/**
 * VideoProcessingCLIApplication class
 * 
 * @author Andrey Geonya
 */
class VideoProcessingCLIApplication
{
	public function main()
	{		
		// Create memcache connection
		$memcache = new Memcache();
		$memcache->connect('localhost', 22201);
				
		// Init memcache based queue listener
		$queueListener = new MemcacheQBasedListener($memcache);
		$queueListener->listenQueue('videoToConvert');
	}
}

$app = new VideoProcessingCLIApplication();
$app->main();