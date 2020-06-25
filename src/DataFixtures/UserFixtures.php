<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $date = new \DateTime('1988-04-11');
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setName('K');
        $admin->setFirstName('Max');
        $admin->setBirthday($date);
        $admin->setSex(true);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'adminpass'));

        $manager->persist($admin);
        $manager->flush();
    }
}
