<?php
/**
 * IQueueListener interface
 * 
 * @author Andrey Geonya
 */
interface IQueueListener
{
	public function listenQueue($key);
}