<?php


namespace App\Tests\UserTests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserPortfolioAccessTest extends WebTestCase
{
    public function testIfUserCanNavigateToPortfolioPage(){
        $client = static::createClient();

        $userName = 'user';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($userName);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/portfolio');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', "Welcome to the portfolio page");

    }
}