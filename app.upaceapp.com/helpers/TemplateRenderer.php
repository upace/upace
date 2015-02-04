<?php
require_once $SITE['libraries_path'] . '/Twig/Autoloader.php';
Twig_Autoloader::register();

class TemplateRenderer
{
    public $loader; // Instance of Twig_Loader_Filesystem
    public $environment; // Instance of Twig_Environment
    public $siteConfig;

    public function __construct($envOptions = array(), $templateDirs = array(), $siteConfig = array())
    {
        $this->siteConfig = $siteConfig;
        // Merge default options
        $envOptions += array(
            'debug' => true,
            'charset' => 'utf-8',
            'cache' => $this->siteConfig['templates_cache_path'],
            'strict_variables' => false
        );
        $templateDirs = array_merge(
            array($this->siteConfig['templates_path'])
        );
        $this->loader = new Twig_Loader_Filesystem($templateDirs);
        $this->environment = new Twig_Environment($this->loader, $envOptions);
    }

    public function render($templateFile, array $variables)
    {
        // these values will be passed into all templates
        $variables['site'] = array(
            'name' => $this->siteConfig['name'],
			'parse_app_id' => $this->siteConfig['parse_app_id'],
			'parse_js_key' => $this->siteConfig['parse_js_key'],
            'fb_app_id' => $this->siteConfig['fb_app_id'],
            'fonts_path' => $this->siteConfig['fonts_path'],
            'css_path' => $this->siteConfig['css_path'],
            'images_path' => $this->siteConfig['images_path'],
            'js_path' => $this->siteConfig['js_path'],
        );
        return $this->environment->render($templateFile, $variables);
    }
}
