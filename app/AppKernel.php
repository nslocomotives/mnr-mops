<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        	new Sylius\Bundle\ProductBundle\SyliusProductBundle(),
        	new Sylius\Bundle\AttributeBundle\SyliusAttributeBundle(),
        	new Sylius\Bundle\VariationBundle\SyliusVariationBundle(),
        	new Sylius\Bundle\TranslationBundle\SyliusTranslationBundle(),
        	new Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
        	new Sylius\Bundle\MoneyBundle\SyliusMoneyBundle(),
        	new Sylius\Bundle\OrderBundle\SyliusOrderBundle(),
        	new Sylius\Bundle\CartBundle\SyliusCartBundle(),
        	new Sylius\Bundle\ArchetypeBundle\SyliusArchetypeBundle(),

        	// Other bundles...
                new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
                new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
        	new FOS\RestBundle\FOSRestBundle(),
        	new JMS\SerializerBundle\JMSSerializerBundle($this),
        	
        	// standard bundles
            	new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            	new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            	new Symfony\Bundle\TwigBundle\TwigBundle(),
            	new Symfony\Bundle\MonologBundle\MonologBundle(),
            	new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            	new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            	new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            	new AppBundle\AppBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
