<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setApiKey('test_api_key');
        $user->setUsername('john');
        $user->setEmail('jo@ogmail.fr');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$2y$13$xRi8GRMATcvcCP4dh3f/duboTMB8BR/T9aub8qEo8QM8leXDrInKO');
        $manager->persist($user);

        $manager->flush();
    }
}
