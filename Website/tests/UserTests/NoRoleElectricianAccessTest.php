<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class NoRoleElectricianAccessTest extends WebTestCase
{

    public function testIfNoRoleCanAccessElectricianPage(): void{
        $client = static::createClient();
        $crawler = $client->request('GET','/electrician');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to our electricians page');
    }


}

