<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Job;
use App\Entity\Qualification;
use App\Entity\User;
use App\Factory\UserFactory;
use App\Factory\JobFactory;
use App\Factory\QualificationFactory;
use App\Factory\MakeFactory;
use App\Factory\PhoneFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'username' => 'matt',
            'password' => 'smith',
            'role' => 'ROLE_ADMIN'
        ]);

        UserFactory::createOne([
            'username' => 'john',
            'password' => 'doe',
            'role' => 'ROLE_ADMIN'
        ]);

        UserFactory::createOne([
            'username' => 'user',
            'password' => 'pass',
            'role' => 'ROLE_USER'
        ]);

        UserFactory::createOne([
            'username' => 'manager',
            'password' => 'pass',
            'role' => 'ROLE_MANAGER'
        ]);

        $electrician1 =  UserFactory::createOne([
            'username' => 'electrician',
            'password' => 'pass',
            'role' => 'ROLE_ELECTRICIAN'
        ]);


        JobFactory::createOne([
            'location' => 'santry',
            'jobType' => 'Lighting + fixtures',
            'electrician'=> $electrician1,
            'fileName' => 'electrician 1-62702fb0af46b.jpg'
        ]);

        QualificationFactory::createOne([
            'Qualification_Name'=> 'Manual Handling',
            'Expiry_Date' => '12/12/2012',
            'user' =>$electrician1
        ]);
    }
}
