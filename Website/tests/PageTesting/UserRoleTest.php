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

  /*  public function testAccessDeniedForRoleUserWhenTryAccessModuleCrud(): void
    {
        $client = static::createClient();
        $client->followRedirects();
        $client->catchExceptions(true);

        // login as ROLE_USER user
        $username = 'user';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

//        $this->expectException(AccessDeniedHttpException::class);

        $crawler = $client->request('GET', '/user');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertSame(Response::HTTP_FORBIDDEN, $statusCode);
    }
*/
}

