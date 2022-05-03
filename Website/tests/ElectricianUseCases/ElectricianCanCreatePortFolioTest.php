<?php


namespace App\Tests\ElectricianUseCases;
use App\Repository\QualificationRepository;
use ContainerHBW1uSA\getDoctrineMigrations_StatusCommandService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;



class ElectricianCanCreatePortFolioTest extends WebTestCase
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