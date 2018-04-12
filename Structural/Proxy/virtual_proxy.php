<?php

interface ImageInterface
{
    public function getSize();
}

class Image implements ImageInterface
{
    /** @var string */
    public $path;

    /** @var resource $image */
    protected $image;

    /**
     * Image constructor.
     * @param $path
     */
    public function __construct($path) {
        $this->path = $path;
        $this->image = imagecreatefromjpeg($path);
    }

    public function getSize() {
        return array(
            imagesx($this->image),
            imagesy($this->image),
        );
    }
}

class ImageVirtualProxy implements ImageInterface
{
    /** @var string */
    public $path;

    /** @var Image */
    protected $wrapped;

    /**
     * ImageVirtualProxy constructor.
     * @param $path
     */
    public function __construct($path) {
        $this->path = $path;
    }

    /**
     * Получение размера изображения
     * @return array
     */
    public function getSize() {
        $this->init();
        return $this->wrapped->getSize();
    }

    /**
     * Инициализация
     */
    private function init() {
        if ( ! $this->wrapped) {
            $this->wrapped = new Image($this->path);
        }
    }
}

class Memory
{
    /**
     * @param $size
     * @return string
     */
    public static function getUsageConvert()
    {
        $size = memory_get_usage();
        $unit=array('b','kb','mb','gb','tb','pb');
        $size = $size/pow(1024,($i=floor(log($size,1024))));
        return @round($size, 2).' '.$unit[$i];
    }
}

$img1 = new ImageVirtualProxy(__DIR__ .'/images/image1.jpg');
echo 'Image1: ', Memory::getUsageConvert(), "<br>";
$img2 = new ImageVirtualProxy(__DIR__ .'/images/image2.jpg');
echo 'Image2: ', Memory::getUsageConvert(), "<br>";
$img3 = new ImageVirtualProxy(__DIR__ .'/images/image3.jpg');
echo 'Image3: ', Memory::getUsageConvert(), "<br>";
echo "----------------------------------------------<br><br>";

// Инициализация объекта класса Image
$size1 = $img1->getSize();
echo 'Image1: ', Memory::getUsageConvert(), "<br>";
$size2 = $img2->getSize();
echo 'Image2: ', Memory::getUsageConvert(), "<br>";
$size3 = $img3->getSize();
echo 'Image3: ', Memory::getUsageConvert(), "<br>";