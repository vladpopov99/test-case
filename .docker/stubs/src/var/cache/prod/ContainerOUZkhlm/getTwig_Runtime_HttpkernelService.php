<?php

namespace ContainerOUZkhlm;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTwig_Runtime_HttpkernelService extends App_KernelProdContainer
{
    /*
     * Gets the private 'twig.runtime.httpkernel' shared service.
     *
     * @return \Symfony\Bridge\Twig\Extension\HttpKernelRuntime
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack());

        return $container->privates['twig.runtime.httpkernel'] = new \Symfony\Bridge\Twig\Extension\HttpKernelRuntime(new \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'inline' => ['privates', 'fragment.renderer.inline', 'getFragment_Renderer_InlineService', true],
        ], [
            'inline' => '?',
        ]), $a, false), new \Symfony\Component\HttpKernel\Fragment\FragmentUriGenerator('/_fragment', new \Symfony\Component\HttpFoundation\UriSigner($container->getEnv('APP_SECRET')), $a));
    }
}
