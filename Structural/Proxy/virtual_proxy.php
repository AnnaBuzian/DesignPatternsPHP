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
     * @param $size
     * @return string
     */
    public static function convert($size)
    {
        $unit=array('b','kb','mb','gb','tb','pb');
        $size = $size/pow(1024,($i=floor(log($size,1024))));
        return @round($size, 2).' '.$unit[$i];
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

$img1 = new ImageVirtualProxy(__DIR__ .'/images/image1.jpg');
var_dump(ImageVirtualProxy::convert(memory_get_usage()));
$img2 = new ImageVirtualProxy(__DIR__ .'/images/image2.jpg');
var_dump(ImageVirtualProxy::convert(memory_get_usage()));
$img3 = new ImageVirtualProxy(__DIR__ .'/images/image3.jpg');
var_dump(ImageVirtualProxy::convert(memory_get_usage()));

$size1 = $img1->getSize();
var_dump(ImageVirtualProxy::convert(memory_get_usage()));
$size2 = $img2->getSize();
var_dump(ImageVirtualProxy::convert(memory_get_usage()));
$size3 = $img3->getSize();
var_dump(ImageVirtualProxy::convert(memory_get_usage()));