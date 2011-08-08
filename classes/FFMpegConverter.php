<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IVideoConverter.php';

/**
 * FFMpegConverter class.
 * 
 * Video converter based on ffmpeg solution.
 * @see http://www.ffmpeg.org/
 * 
 * @author Andrey Geonya
 */
class FFMpegConverter implements IVideoConverter
{
	private $_converterFileName = '/usr/bin/ffmpeg';
	private $_inputFileName;
	private $_outputFileName;	
	private $_inputFileParams = array();
	private $_outputFileParams = array();
	
	public function getConverterFileName()
	{
		return $this->_converterFileName;
	}
	
	public function setConverterFileName($filename)
	{
		$this->_converterFileName = $filename;
	}
	
	public function getInputFileName()
	{
		return $this->_inputFileName;
	}	
	
	public function setInputFileName($filename)
	{
		$this->_inputFileName = $filename;
	}
	
	public function getOutputFileName()
	{
		return $this->_outputFileName;
	}
	
	public function setOutputFileName($filename)
	{
		$this->_outputFileName = $filename;
	}

	public function getInputFileParams()
	{
		return $this->_inputFileParams;
	}	
	
	public function setInputFileParams($params)
	{
		$this->_inputFileParams = $params;
	}
	
	public function getOutputFileParams()
	{
		return $this->_outputFileParams;
	}	
	
	public function setOutputFileParams($params)
	{
		$this->_outputFileParams = $params;
	}
	
	public function execute()
	{		
		$command = "{$this->getConverterFileName()} ";
		
		foreach($this->getInputFileParams() as $key=>$value)
			$command .= "$key $value ";
		
		$command .= "-i {$this->getInputFileName()} ";

		foreach($this->getOutputFileParams() as $key=>$value)
			$command .= "$key $value ";
		
		$command .= $this->getOutputFileName();
		exec($command, $commandOutput, $result);
				
		return $result!==0 ? false : true;
	}
}