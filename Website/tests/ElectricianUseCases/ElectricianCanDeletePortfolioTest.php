<?php


namespace App\Tests\ElectricianUseCases;


use App\Repository\QualificationRepository;
use App\Repository\UserRepository;

class ElectricianCanDeletePortfolioTest
{
    public function testRoleAdminCanCreateSolicitors(){
        $client = static::createClient();
        $client->followRedirects();

        $qualificationRepository = static::getContainer()->get(QualificationRepository::class);
        $userRepository = static::getContainer()->get(UserRepository::class);

        $userName = 'electrician';
        $electricianName = $userRepository->findOneByusername($userName);

        $Qualification_Name = 'Manual Handling';
        $qualification = $qualificationRepository->findOneBy(['Qualification_Name'=>$Qualification_Name]);

        $httpMethod = 'GET';
        $url = '/qualification/new';

        $qualification = $qualificationRepository->findAll();
        $numberOfQualificationsBeforeOneCreated = count($qualification);
        $expectedNumberOfQualificationsAfterOneCreated = $numberOfQualificationsBeforeOneCreated + 1;

        $client->loginUser($electricianName);

        $submitButtonName = 'Save';
        $client->submit($client->request($httpMethod, $url)->selectButton($submitButtonName)->form([
            'qualification[Qualification_Name]'  => 'Test',
            'qualification[Expiry_Date]'  => '12/12/1212',
            'qualification[user]'  => "5",
        ]));

        $qualification = $qualificationRepository->findAll();

        $this->assertCount($expectedNumberOfQualificationsAfterOneCreated, $qualification);
    }


}