<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestDataController extends Controller
{

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
     * @Route("/test_data_add", name="testDataAdd")
     * @Template("AppBundle::index.html.twig")
     *
     * @return Response
     */
    public function createAction()
    {

        $faker = \Faker\Factory::create();

        $ids = '';

        foreach ($this->dataCountry as $key => $dataCollection) {
            $team = new Team();
            $team->setCode($key);
            $team->setName($dataCollection['name']);
            $team->setCountry($dataCollection['title']);
            $team->setLogo('/images/' . $key . '.png');
            $team->setDescription($faker->text($maxNbChars = 300));

            $em = $this->getDoctrine()->getManager();

            $em->persist($team);
            $em->flush();

            $ids .= ', ' . $team->getId();
        }

        return new Response('Created team id ' . $ids);
    }
}