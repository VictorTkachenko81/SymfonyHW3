<?php

namespace AppBundle\Controller;

use AppBundle\Model\CountryModel;
use AppBundle\Model\TeamModel;
use AppBundle\Model\PlayerModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("AppBundle::index.html.twig")
     *
     * @return Response
     */
    public function indexAction()
    {
        $teams = new TeamModel();

        return ['teams' => $teams->getAllTeam()];
    }

    /**
     * @param $teamName
     * @Route("/team/{teamName}", name="team", requirements={
     *     "team": "[A-Za-z]+"
     *     })
     * @Method("GET")
     * @Template("AppBundle:team:team.html.twig")
     *
     * @return Response
     */
    public function teamAction($teamName)
    {
        $team = new TeamModel($teamName);

        return ['team' => $team];
    }

    /**
     * @param $country
     * @Route("/country/{country}", name="country", requirements={
     *     "country": "[A-Za-z]+"
     *     })
     * @Method("GET")
     * @Template("AppBundle:country:country.html.twig")
     *
     * @return Response
     */
    public function countryAction($country)
    {
        $country = new CountryModel($country);

        return ['country' => $country];
    }

    /**
     * @param $team
     * @param $player
     * @Route("/team/{team}/player/{player}", name="player", requirements={
     *     "team": "Albania|Austria|Belgium|Croatia|CzechRepublic|England|France|Germany|Hungary|Iceland|Italy|NorthernIreland|Poland|Portugal|RepublicOfIreland|Romania|Russia|Slovakia|Spain|Sweden|Switzerland|Turkey|Ukraine|Wales",
     *     "player": "[A-Za-z]+"
     *     })
     * @Method("GET")
     * @Template("AppBundle:player:player.html.twig")
     *
     * @return Response
     */
    public function playerAction($team, $player)
    {
        $player = new PlayerModel($player);

        return [
            'team'      => $team,
            'player'    => $player,
        ];
    }

}
