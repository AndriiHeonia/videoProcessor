<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IVideoConvertingCommand.php';
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'FFMpegConverter.php';

/**
 * FFMpegConvertingCommand class
 * 
 * @author Andrey Geonya
 */
class FFMpegConvertingCommand implements IVideoConvertingCommand
{
	private $_inputFileName;
	private $_outputFileName;
	private $_inputFileParams;
	private $_outputFileParams;
	
	public function __construct($inputFileName, $outputFileName, $inputFileParams = array(), $outputFileParams = array())
	{
		$this->_inputFileName = $inputFileName;
		$this->_outputFileName = $outputFileName;
		$this->_inputFileParams = $inputFileParams;
		$this->_outputFileParams = $outputFileParams;
	}

	public function execute()
	{
		$videoConverter = new FFMpegConverter();
		
		$videoConverter->setInputFileName($this->_inputFileName);
		$videoConverter->setOutputFileName($this->_outputFileName);
		$videoConverter->setInputFileParams($this->_inputFileParams);
		$videoConverter->setOutputFileParams($this->_outputFileParams);

		return $videoConverter->execute();		
	}
}