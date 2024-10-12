<?php

namespace App\Controller;

use App\Manager\UserRegisterManager;
use App\Validator\UserDataValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Attribute\Route;

class ApiUserRegisterController extends AbstractController
{
    #[Route('/api/user/register', name: 'app_api_user_register', methods: ['POST'])]
    public function index(RequestStack $requestStack, UserRegisterManager $userRegisterManager): JsonResponse
    {
        $userData = $requestStack->getCurrentRequest()?->getContent();
        if (UserDataValidator::isValidData(json_decode($userData, true))) {
            $userRegisterManager->saveUser($userData);
        }

        return new JsonResponse(['success' => true], 201);
    }
}
