<?php
/**
 * IUploadedFile interface
 * 
 * @author Andrey Geonya
 */
interface IUploadedFile
{	
	public function __construct($fileName);
	
	public function getName();

	public function getFileName();
	
	public function getType();
	
	public function getTmpName();
	
	public function getError();
	
	public function getSize();
}