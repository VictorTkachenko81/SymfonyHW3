<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 28.11.15
 * Time: 13:15
 */

namespace AppBundle\Model;

class PlayerModel
{
    private $firstName;
    private $lastName;
    private $position;
    private $statistic;
    private $age;
    private $biography;
    private $photo;

    /**
     * PlayerModel constructor.
     *
     * @param string $lastName
     */
    public function __construct($lastName = '')
    {
        $faker = \Faker\Factory::create();
        $faker->realText($maxNbChars = 200, $indexSize = 2);

        $lastName = ($lastName != '') ? $lastName : $faker->lastName;

        $this->setFirstName($faker->firstNameMale);
        $this->setLastName($lastName);
        $this->setPosition($faker->word);
        $this->setStatistic($faker->randomDigit);
        $this->setAge($faker->dateTimeBetween(
            $startDate = '-35 years',
            $endDate = '-20 years'
        )->format('d.m.Y'));
        $this->setBiography($faker->realText($maxNbChars = 200, $indexSize = 2));
        $this->setPhoto($faker->imageUrl($width = 400, $height = 400, 'people'));
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName = '')
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName = '')
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position = 'forward')
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param mixed $statistic
     */
    public function setStatistic($statistic = 0)
    {
        $this->statistic = $statistic;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age = '')
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography = '')
    {
        $this->biography = $biography;
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
    public function setPhoto($photo = '')
    {
        $this->photo = $photo;
    }

}