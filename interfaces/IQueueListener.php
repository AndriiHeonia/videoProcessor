<?php
/**
 * IQueueListenerImpl interface
 * 
 * @author Andrey Geonya
 */
interface IQueueListenerImpl
{
	public function listenQueue($key);
}