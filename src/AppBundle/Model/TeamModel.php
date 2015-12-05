<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 28.11.15
 * Time: 13:15
 */

namespace AppBundle\Model;

use AppBundle\Model\PlayerModel;

class TeamModel
{
    private $name;
    private $description;
    private $squad;
    private $country;
    private $dataCountry
        = array(
            'Albania'           => array(
                'name'  => 'Albania',
                'title' => 'Albania - ALB',
            ),
            'Austria'           => array(
                'name'  => 'Austria',
                'title' => 'Austria - AUT',
            ),
            'Croatia'           => array(
                'name'  => 'Croatia',
                'title' => 'Croatia - CRO',
            ),
            'CzechRepublic'     => array(
                'name'  => 'Czech Republic',
                'title' => 'Czech Republic - CZE',
            ),
            'England'           => array(
                'name'  => 'England',
                'title' => 'England - ENG',
            ),
            'France'            => array(
                'name'  => 'France',
                'title' => 'France - FRA',
            ),
            'Germany'           => array(
                'name'  => 'Germany',
                'title' => 'Germany - GER',
            ),
            'Hungary'           => array(
                'name'  => 'Hungary',
                'title' => 'Hungary - HUN',
            ),
            'Iceland'           => array(
                'name'  => 'Iceland',
                'title' => 'Iceland - ISL',
            ),
            'Italy'             => array(
                'name'  => 'Italy',
                'title' => 'Italy - ITA',
            ),
            'NorthernIreland'   => array(
                'name'  => 'Northern Ireland',
                'title' => 'Northern Ireland - NIR',
            ),
            'Poland'            => array(
                'name'  => 'Poland',
                'title' => 'Poland - POL',
            ),
            'Portugal'          => array(
                'name'  => 'Portugal',
                'title' => 'Portugal - POR',
            ),
            'RepublicOfIreland' => array(
                'name'  => 'Republic of Ireland',
                'title' => 'Republic of Ireland - IRL',
            ),
            'Romania'           => array(
                'name'  => 'Romania',
                'title' => 'Romania - ROU',
            ),
            'Russia'            => array(
                'name'  => 'Russia',
                'title' => 'Russia - RUS',
            ),
            'Slovakia'          => array(
                'name'  => 'Slovakia',
                'title' => 'Slovakia - SVK',
            ),
            'Spain'             => array(
                'name'  => 'Spain',
                'title' => 'Spain - ESP',
            ),
            'Sweden'            => array(
                'name'  => 'Sweden',
                'title' => 'Sweden - SWE',
            ),
            'Switzerland'       => array(
                'name'  => 'Switzerland',
                'title' => 'Switzerland - SUI',
            ),
            'Turkey'            => array(
                'name'  => 'Turkey',
                'title' => 'Turkey - TUR',
            ),
            'Ukraine'           => array(
                'name'  => 'Ukraine',
                'title' => 'Ukraine - UKR',
            ),
            'Wales'             => array(
                'name'  => 'Wales',
                'title' => 'Wales - WAL',
            ),
        );

    /**
     * TeamModel constructor.
     *
     * @param $name
     */
    public function __construct($name = '')
    {
        if ($name != '') {
            $faker = \Faker\Factory::create();
            $description = $faker->realText($maxNbChars = 200, $indexSize = 2);

            $this->name = $name;
            $this->setDescription($description);
            $this->setSquad();
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
    public function setDescription($description = '')
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSquad()
    {
        return $this->squad;
    }

    /**
     * @param mixed $squad
     */
    public function setSquad($squad = array())
    {
        for ($i = 0; $i <= 5; $i++) {
            $player = new PlayerModel();
            $squad[] = $player;
        }

        $this->squad = $squad;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country = '')
    {
        $this->country = $country;
    }

    /**
     * @return array
     */
    public function getAllTeam()
    {
        $faker = \Faker\Factory::create();

        $collection = array();

        foreach ($this->dataCountry as $key => $dataCollection) {
            $collection[] = array(
                'key'         => $key,
                'name'        => $dataCollection['name'],
                'title'       => $dataCollection['title'],
                'description' => $faker->text($maxNbChars = 200),
            );
        }

        return $collection;
    }

}