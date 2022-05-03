<?php


namespace App\Tests\DB_Test;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\ModuleRepository;

class DataBaseTest extends WebTestCase
{
    public function testNumberOfUsersMatchFixtures(): void{
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        $expectedNumberOfEntities = 5;

        $userEntities = $userRepository->findall();

        $this->assertCount($expectedNumberOfEntities, $userEntities);

    }

}