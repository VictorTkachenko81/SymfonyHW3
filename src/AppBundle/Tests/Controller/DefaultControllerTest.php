<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'European Qualifiers',
            $crawler->filter('.navbar-nav')->text()
        );
    }

    /**
     * @param $team
     * @dataProvider countryList
     */
    public function testTeam($team)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team/' . $team);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'European Qualifiers',
            $crawler->filter('.navbar-nav')->text()
        );
    }

    /**
     * @param $country
     * @dataProvider countryList
     */
    public function testCountry($country)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/country/' . $country);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'European Qualifiers',
            $crawler->filter('.navbar-nav')->text()
        );
    }

    /**
     * @param $team
     * @param $player
     * @dataProvider playerList
     */
    public function testPlayer($team, $player)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team/' . $team . '/player/' . $player);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'European Qualifiers',
            $crawler->filter('.navbar-nav')->text()
        );
    }

    /**
     * @return array
     */
    public function countryList()
    {
        return [
            ['England'],
            ['France'],
            ['Germany'],
        ];
    }

    /**
     * @return array
     */
    public function playerList()
    {
        return [
            ['Ukraine', 'Pyatov'],
            ['Ukraine', 'Tymoschuk'],
            ['Ukraine', 'Gusev'],
        ];
    }
}
