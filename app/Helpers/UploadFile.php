<?php
namespace App\Helpers;

use Request;
class UploadFile
{
	public $request;
	public $controller;
	public $destination_path;
	public function __construct()
	{
		$this->request = Request();
		$this->controller = $this->request->segment(2);
		$this->destination_path = public_path()."/uploads/images/{$this->controller}/";
	}

	public static function saveFile($request, $value = '', $folder = '')
	{
		if(!empty($folder)) {
			self::start()->controller = $folder;
		}

		if (empty($value)) {
			return false;
		}
		if ($request->hasFile($value)) {
			$file      = $request->file($value);
            $extension = $file->getClientOriginalExtension($value);
			$file_name = time() . '-' . rand(0, 1000) ."-" .self::start()->controller .".".$extension;
			$file->move(self::start()->destination_path, $file_name);
            return $file_name;
		}
		else {
			return '';
		}
	}

	public static function deleteFile($value = '', $folder = '')
	{
		if(!empty($folder)) {
			$this->controller = $folder;
		}

		if (empty($value)) {
			return false;
		}

		if (file_exists($this->destination_path.$value)) {
			unlink($this->destination_path.$value);
			return true;
		}
		else {
			return false;
		}
	}

	/**
	*@return $this
	*/
	public static function start()
	{
		return new UploadFile();
	}
}