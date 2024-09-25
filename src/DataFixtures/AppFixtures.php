<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $manager;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->loadAdmin();

        $manager->flush();
    }

    /**
     *creation des adherents
     */
    public function loadAdmin()
    {

        $admin = new Admin();
        $admin->setEmail("admin@openup.com")
              ->setPassword($this->passwordEncoder->encodePassword($admin, "admin"));
        $this->manager->persist($admin);

        $this->manager->flush();
    }


}
