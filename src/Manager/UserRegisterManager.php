<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserRegisterManager
{
    private SerializerInterface $serializer;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(SerializerInterface $serializer, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function saveUser($userData): void
    {
        $user = $this->serializer->deserialize($userData, User::class, 'json');

        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}