<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'interfaces'.DIRECTORY_SEPARATOR.'IFileManager.php';

/**
 * FileManager class
 * 
 * @author Andrey Geonya
 */
class FileManager implements IFileManager
{
	private static $_instance;
	
	private function __constructor()
	{}

	public static function getInstance()
	{
		if(self::$_instance===null)
			self::$_instance = new self();
		
		return self::$_instance;
	}

	public function moveUploadedFile(IUploadedFile $uploadedFile, $destination)
	{
		return move_uploaded_file($uploadedFile->getTmpName(), $destination.DIRECTORY_SEPARATOR.$uploadedFile->getName());
	}
}