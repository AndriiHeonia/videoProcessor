<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IQueueListenerCommand.php';

/**
 * IVideoConvertingCommand interface
 * 
 * @author Andrey Geonya
 */
interface IVideoConvertingCommand extends IQueueListenerCommand
{
	public function __construct($inputFileName, $outputFileName, $inputFileParams, $outputFileParams);
}