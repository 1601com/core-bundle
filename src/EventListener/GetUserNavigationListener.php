<?php

/*
 * This file is part of agentur1601com/core-bundle.
 *
 * (c) Agentur1601com
 *
 * @license LGPL-3.0-or-later
 */

namespace Agentur1601com\CoreBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Symfony\Component\Routing\RouterInterface;
/**
 * @Hook("getUserNavigation")
 */
class GetUserNavigationListener
{
    /**
     * @var RouterInterface
     */
    private $_routerInterface;

    /**
     * GetUserNavigationListener constructor.
     * @param RouterInterface $_routerInterface
     */
    public function __construct(RouterInterface $_routerInterface)
    {
        $this->_routerInterface = $_routerInterface;
    }

    /**
     * @param array $modules
     * @param bool $showAll
     * @return array
     */
    public function __invoke(array $modules, bool $showAll): array
    {
        $user = \Contao\BackendUser::getInstance();

        if ($user->hasAccess(['core'], 'modules')) {
            $modules['agentur1601com']['modules']['core'] = [
                'label' => 'Unterstützen',
                'title' => 'The core bundle',
                'class' => 'agentur1601com',
                'href' => $this->_routerInterface->generate('agentur1601com_core_backend'),
            ];
        }

        return $modules;
    }
}
