<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\SomeObject;
use App\Form\Type\SomeObjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'index')]
class SomeObjectController extends AbstractController
{
    public function __invoke(): Response
    {
        $object = new SomeObject();
        $form = $this->createForm(SomeObjectType::class, $object);

        return $this->render('simple_form.html.twig', [
            'form' => $form,
        ]);
    }
}
