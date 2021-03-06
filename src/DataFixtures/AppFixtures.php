<?php

namespace App\DataFixtures;

use App\Entity\Speaker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // 1
        $speaker = new Speaker();
        $speaker
            ->setName('danielle')
            ->setTalk('Inter microservices communication with gRPC');

        $manager->persist($speaker);

        // 2
        // will be put in a loop @todo
        $speaker = new Speaker();
        $speaker
            ->setName('Jean')
            ->setTalk('Microservices with Symfony');

        $manager->persist($speaker);

        $manager->flush();
    }
}
