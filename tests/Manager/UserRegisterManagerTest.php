<?php

namespace App\Tests\Manager;

use App\Manager\UserRegisterManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserRegisterManagerTest extends TestCase
{
    public function testSaveUser(): void
    {
        $mockUserData = json_encode([
            "username" => "test@test.com",
            "password" => "password",
        ]);

        $userManager = $this->createMock(UserRegisterManager::class);

        try {
            $userManager->saveUser($mockUserData);
        } catch (\Exception $e) {
            $this->fail('An unexpected exception was thrown: ' . $e->getMessage());
        }

        $this->assertTrue(true);
    }
}
