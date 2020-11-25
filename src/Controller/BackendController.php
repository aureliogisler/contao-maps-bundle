<?php
/*
 * This file is part of xippogmbh/maps-bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    XippoGmbHMaps
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-maps-bundle
 *
 */
declare(strict_types=1);

namespace XippoGmbH\MapsBundle\Controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

/**
 * @Route("/contao/xippo-maps",
 *     name=BackendController::class,
 *     defaults={"_scope" = "backend"}
 * )
 */
class BackendController extends AbstractController
{
    private $twig;
    
    public function __construct(TwigEnvironment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(): Response
    {
        return new Response($this->twig->render(
            'my_backend_route.html.twig', 
            []
        ));
    }
}