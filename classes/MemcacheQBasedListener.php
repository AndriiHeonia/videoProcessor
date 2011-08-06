<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IMemcacheQBasedListener.php';
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FFMpegConvertingCommand.php';

/**
 * MemcacheQBasedListener class
 * 
 * @author Andrey Geonya
 */
class MemcacheQBasedListener implements IMemcacheQBasedListener
{	
	private $_memcache;
	
	public function __construct(Memcache $memcache)
	{
		$this->_memcache = $memcache;
	}
	
	public function listenQueue($key)
	{
		while (true)
		{
			if($command = $this->_memcache->get($key))
				$command->execute();
			
			sleep(3);
		}
	}
}