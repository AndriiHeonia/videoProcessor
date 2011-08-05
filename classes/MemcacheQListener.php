<?php
/**
 * MemcacheQBasedListener class
 * 
 * @author Andrey Geonya
 */
class MemcacheQBasedListener implements IQueueListenerImpl
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
			if($obj = $this->_memcache->get($key))
				$a = 1;
		}
	}
}