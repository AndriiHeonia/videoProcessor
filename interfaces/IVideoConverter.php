<?php
/**
 * IVideoConverter interface
 * 
 * @author Andrey Geonya
 */
interface IVideoConverter
{
	public function getConverterFileName();	
	
	public function setConverterFileName($path);
	
	public function getInputFileName();
	
	public function setInputFileName($filename);
	
	public function getOutputFileName();
	
	public function setOutputFileName($filename);
	
	public function getInputFileParams();
	
	public function setInputFileParams($params);
	
	public function getOutputFileParams();
	
	public function setOutputFileParams($params);

	public function execute();
}