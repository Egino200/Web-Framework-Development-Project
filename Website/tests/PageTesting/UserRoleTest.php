<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class UserRoleTest extends WebTestCase
{
    public function testHomePageTitleText(): void{
        $client = static::createClient();
        $crawler = $client->request('GET','/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to Egino.Co');

    }





}

