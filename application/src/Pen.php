<?php

namespace Application;

/**
 * Class for working with Pen objects.
 */
class Pen
{
    /**
     * @var int Integer value of inks remaining.
     */
    private $inkContainerValue = 1000;
    /**
     * @var float Value of inks required for one symbol' print.
     */
    private $sizeLetter = 1.0;
    /**
     * @var string Pen color.
     */
    private $color = "BLUE";

    /**
     * Pen constructor.
     * @param $inkContainerValue Integer value of inks remaining.
     */
    public function __construct($inkContainerValue)
    {
        $this->inkContainerValue = $inkContainerValue;
    }

    /**
     * Pen constructor with possibility to pass both container and letter size values.
     * @param $inkContainerValue Integer value of inks remaining.
     * @param $sizeLetter Value of inks required for one symbol' print.
     * @return Pen Object.
     */
    public static function createPenWithSizeLetter($inkContainerValue, $sizeLetter)
    {
        $instance = new Pen($inkContainerValue);
        $instance->sizeLetter = $sizeLetter;
        return $instance;
    }

    /**
     * Pen constructor with possibility to pass both container and letter size values and also color.
     * @param $inkContainerValue Integer value of inks remaining.
     * @param $sizeLetter Value of inks required for one symbol' print.
     * @param $color Pen color.
     * @return Pen Object.
     */
    public static function createPenWithSizeLetterAndColor($inkContainerValue, $sizeLetter, $color)
    {
        $instance = Pen::createPenWithSizeLetter($inkContainerValue, $sizeLetter);
        $instance->color = $color;
        return $instance;
    }

    /**
     * Function returns passed word if ink count is enough, otherwise prints either part of word or empty string.
     * @param $word String to be printed.
     * @return string String that can be printed.
     */
	public function write($word)
    {
        if (!$this->isWork())
        {
            return "";
        }

        $sizeOfWord = strlen($word) * $this->sizeLetter;

        if ($sizeOfWord <= $this->inkContainerValue)
        {
            $this->inkContainerValue -= $sizeOfWord;
            return $word;
        }
        $partOfWord = substr($word, 0, $this->inkContainerValue);
        $this->inkContainerValue = 0;
        return $partOfWord;
    }

    /**
     * Function returns pen color (actually no, there's a bug).
     * @return string Pen color.
     */
	public function getColor()
    {
		return "BLUE";
	}

    /**
     * Function returns bool if pen can write or not.
     * @return bool Bool if pen can write.
     */
    public function isWork()
    {
         return ($this->inkContainerValue > 0);
    }

    /**
     * Function echoes class instance's color.
     */
    public function doSomethingElse()
    {
        echo $this->color;
    }
}

