<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 28.11.15
 * Time: 13:15
 */

namespace AppBundle\Model;


class CountryModel
{

    private $name;
    private $key;
    private $photo;
    private $description;

    /**
     * CountryModel constructor.
     *
     * @param $name
     */
    public function __construct($name = '')
    {
        $faker = \Faker\Factory::create();

        $this->name = $name;
        $this->key = $name;
        $this->photo = $faker->imageUrl($width = 400, $height = 400, 'city');
        $this->description = $faker->text($maxNbChars = 200);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}