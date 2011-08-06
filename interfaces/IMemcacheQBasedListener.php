<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IQueueListener.php';

/**
 * IMemcacheQBasedListener interface
 * 
 * @author Andrey Geonya
 */
interface IMemcacheQBasedListener extends IQueueListener
{
	public function __construct(Memcache $memcache);
}