<?php

namespace ContainerGTwgPCp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_KEzMhfsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.kEzMhfs' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Handler/HandlerDescriptor.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Messenger/RunCommandMessageHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Application.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Console/Application.php';

        $a = new \Symfony\Bundle\FrameworkBundle\Console\Application(($container->services['kernel'] ?? $container->get('kernel', 1)));
        $a->setAutoExit(false);

        return $container->privates['.messenger.handler_descriptor.kEzMhfs'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(new \Symfony\Component\Console\Messenger\RunCommandMessageHandler($a), []);
    }
}