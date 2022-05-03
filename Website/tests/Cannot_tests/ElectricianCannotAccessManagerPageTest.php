<?php


namespace App\Tests\Cannot_tests;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class ElectricianCannotAccessManagerPageTest extends WebTestCase
{
    public function testRoleElectricianCannotSeeManagerPage(): void{
        $client = static::createClient();

        $electricianName = 'electrician';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($electricianName);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/user/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('p', "You do not have access to this page. Sorry!");

    }
}