<?php

/*
 * This file is part of agentur1601com/core-bundle.
 *
 * (c) Agentur1601com
 *
 * @license LGPL-3.0-or-later
 */

namespace Agentur1601com\CoreBundle\ContaoManager;

use Agentur1601com\CoreBundle\Agentur1601comCoreBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouteCollection;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(Agentur1601comCoreBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }

    /**
     * Allows a plugin to load container configuration.
     */
    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig)
    {
        $loader->load('@Agentur1601comCoreBundle/Resources/config/config.yml');
    }

    /**
     * @throws \Exception
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel): ?RouteCollection
    {
        return $resolver
            ->resolve(__DIR__.'/../Resources/config/routing.yml')
            ->load(__DIR__.'/../Resources/config/routing.yml')
            ;
    }
}
