<?php
/**
 * IFileManager interface
 * 
 * @author Andrey Geonya
 */
interface IFileManager
{
	public static function getInstance();

	public function moveUploadedFile(IUploadedFile $uploadedFile, $destination);
}