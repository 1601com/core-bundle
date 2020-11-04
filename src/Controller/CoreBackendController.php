<?php

/*
 * This file is part of agentur1601com/core-bundle.
 *
 * (c) Agentur1601com
 *
 * @license LGPL-3.0-or-later
 */

namespace Agentur1601com\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;
use Agentur1601com\CoreBundle\Service\GetPackagesOverview;

/**
 * Handles back end routes.
 */
class CoreBackendController extends AbstractController
{
    /**
     * @var TwigEnvironment
     */
    private $_twig;

    /**
     * @var GetPackagesOverview
     */
    private $_getPackageOverview;

    /**
     * CoreBackendController constructor.
     * @param TwigEnvironment $_twig
     * @param GetPackagesOverview $_getPackageOverview
     */
    public function __construct(TwigEnvironment $_twig, GetPackagesOverview $_getPackageOverview)
    {
        $this->_twig = $_twig;
        $this->_getPackageOverview = $_getPackageOverview;
    }

    public function execute()
    {
        return new Response($this->_twig->render('@Agentur1601comCore/agentur1601com_backend_core.html.twig', [
                'packages' => $this->_getPackageOverview->execute()
            ]
        ));
    }
}
