<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IUploadedFile.php';

/**
 * UploadedFile class
 *
 * @author Andrey Geonya
 */
class UploadedFile implements IUploadedFile
{
	private $_fileName;
	private $_name;
	private $_type;
	private $_tmp_name;
	private $_error;
	private $_size;

	public function __construct($fileName)
	{
		$this->_fileName = $fileName;
		
		foreach($_FILES[$this->_fileName] as $property=>$value)
		{
			$privateProperty = '_'.$property;
			$this->$privateProperty = $value;
		}
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getFileName()
	{
		return $this->_fileName;
	}	
	
	public function getType()
	{
		return $this->_type;
	}

	public function getTmpName()
	{
		return $this->_tmp_name;
	}

	public function getError()
	{
		return $this->_error;
	}

	public function getSize()
	{
		return $this->_size;
	}	
}