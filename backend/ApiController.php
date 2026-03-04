<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;



final class ApiController extends AbstractController
{
    #[Route('/api/sum', name: 'app_api', methods: ['POST', 'OPTIONS'])]
    public function index(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $validator = Validation::createValidator();
        $constraints = new Assert\Collection([
            'a' => [new Assert\NotBlank(message: 'Parameter "a" is required.'), new Assert\Type('numeric', message: 'Parameter "a" must be numeric.')],
            'b' => [new Assert\NotBlank(message: 'Parameter "b" is required.'), new Assert\Type('numeric', message: 'Parameter "b" must be numeric.')],
        ]);
        $violations = $validator->validate($data, $constraints);
        if (count($violations) > 0) {
            $message = $violations->get(0)->getMessage();
            return $this->json([
                'error' => $message,
            ], 400);
        }
        $sum = $data['a'] + $data['b'];
        return $this->json([
            'sum' => $sum,
        ]);
    }
}
