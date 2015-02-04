<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../site_init.php';

$renderer = new TemplateRenderer(array(), array(), $SITE);
$metadata = array(
    'title' => 'UPACE',
    'description' => '',
    'keywords' => ''
);
print $renderer->render('index.twig', array('metadata' => $metadata));
