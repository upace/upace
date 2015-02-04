<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../site_init.php';

$renderer = new TemplateRenderer(array(), array(), $SITE);
$metadata = array(
    'title' => 'UPACE - Classes',
    'description' => '',
    'keywords' => ''
);
print $renderer->render('classes.twig', array('metadata' => $metadata));