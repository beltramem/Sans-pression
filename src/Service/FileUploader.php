<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $fileName);

        return $fileName;
    }
	
	public function updateUpload(UploadedFile $file, string $fileName)
	{
		$file->move($this->getTargetDirectory(), $fileName);
	}	
	public function removeUpload(string $fileName)
	{
		$file = new Filesystem();
		$file->remove($this->getTargetDirectory()."/".$fileName);
	}

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}