<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Country;
use AppBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
//        $teamTestData = array(
//            'id' => null,
//            'name' => 'name',
//            'code' => 'code',
//            'photo' => 'photo',
//            'description' => 'description',
//        );
//
//        $entityCountry = new Country();
//        $this->assertEquals($teamTestData['id'],
//            $entityCountry->getId());
//        $this->assertEquals($teamTestData['name'],
//            $entityCountry->setName($teamTestData['name'])->getName());
//        $this->assertEquals($teamTestData['code'],
//            $entityCountry->setCode($teamTestData['code'])->getCode());
//        $this->assertEquals($teamTestData['photo'],
//            $entityCountry->setPhoto($teamTestData['photo'])->getPhoto());
//        $this->assertEquals($teamTestData['description'],
//            $entityCountry->setDescription($teamTestData['description'])->getDescription());

        // First, mock the object to be used in the test
//        $team = $this->getMock('\AppBundle\Entity\Team');
//        $team->expects($this->once())
//            ->method('getId')
//            ->will($this->returnValue(1000));
//        $team->expects($this->once())
//            ->method('getCode')
//            ->will($this->returnValue(1000));
//        $team->expects($this->once())
//            ->method('getName')
//            ->will($this->returnValue(1000));
//        $team->expects($this->once())
//            ->method('getDescription')
//            ->will($this->returnValue(1000));
//        $team->expects($this->once())
//            ->method('getCountry')
//            ->will($this->returnValue(1000));
//        $team->expects($this->once())
//            ->method('getLogo')
//            ->will($this->returnValue(1100));
//        $team->expects($this->once())
//            ->method('getPlayers')
//            ->will($this->returnValue(1100));

//        $team = new Team();
//
//        // Now, mock the repository so it returns the mock of the country
//        $teamRepository = $this
//            ->getMockBuilder('\Doctrine\ORM\EntityRepository')
//            ->disableOriginalConstructor()
//            ->getMock();
//        $teamRepository->expects($this->once())
//            ->method('findAll')
//            ->will($this->returnValue(array($team)));
//
//        // Last, mock the EntityManager to return the mock of the repository
//        $entityManager = $this
//            ->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
//            ->disableOriginalConstructor()
//            ->getMock();
//        $entityManager->expects($this->once())
//            ->method('getRepository')
//            ->will($this->returnValue($teamRepository));


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
     * @param $team
     * @dataProvider countryList
     */
    public function testCountry($team)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/country/' . $team);
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
