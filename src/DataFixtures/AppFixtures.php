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
        $user->setUsername('test');
        $user->setPassword('test');
        $manager->persist($user);

        $manager->flush();
    }
}
