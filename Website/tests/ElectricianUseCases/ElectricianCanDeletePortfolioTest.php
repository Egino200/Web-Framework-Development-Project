<?php


namespace App\Tests\ElectricianUseCases;


use App\Repository\QualificationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ElectricianCanDeletePortfolioTest extends WebTestCase
{
    public function testRoleElectricianCanCreateQualifications(){
        $client = static::createClient();
        $client->followRedirects();



        $qualificationRepository = static::getContainer()->get(QualificationRepository::class);
        $userRepository = static::getContainer()->get(UserRepository::class);

        $userName = 'electrician';
        $electrician = $userRepository->findOneByusername($userName);

        $Qualification_Name = 'Manual Handling';
        $qualification = $qualificationRepository->findOneBy(['Qualification_Name'=>$Qualification_Name]);


        $httpMethod = 'GET';
        $url = '/qualification/'.$electrician->getId().'/edit';


        $client->loginUser($electrician);

        $submitButtonName = 'Update';
        $client->submit($client->request($httpMethod, $url)->selectButton($submitButtonName)->form([
            'qualification[Qualification_Name]'  => 'editedTest',
            'qualification[Expiry_Date]'  => '22/22/2222',
            'qualification[user]'  => $electrician->getId(),
        ]));

       $editedObject= $qualificationRepository->findOneBy(['Qualification_Name'=> 'editedTest']);

        $this->assertNotSame($electrician,$editedObject);
    }


}