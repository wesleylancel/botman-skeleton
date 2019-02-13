<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @Template()
     */
    public function index(): array
    {
        return [];
    }

    /**
     * @Route("/chat")
     * @Template()
     */
    public function chat(): array
    {
        return [];
    }
}
