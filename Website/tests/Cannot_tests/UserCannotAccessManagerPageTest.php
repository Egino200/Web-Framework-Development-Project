<?php


namespace App\Tests\Cannot_tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class UserCannotAccessManagerPageTest extends WebTestCase
{

   public function testRoleUserCannotSeeManagerPage(): void{
       $client = static::createClient();

       $userName = 'user';
       $userRepository = static::getContainer()->get(UserRepository::class);
       $testUser = $userRepository->findOneByUsername($userName);
       $client->loginUser($testUser);

       $crawler = $client->request('GET', '/user/');

       $this->assertResponseIsSuccessful();
       $this->assertSelectorTextContains('p', "You do not have access to this page. Sorry!");

   }

}