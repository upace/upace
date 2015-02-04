<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../site_init.php';

$renderer = new TemplateRenderer(array(), array(), $SITE);
$metadata = array(
    'title' => 'UPACE - Reservations',
    'description' => '',
    'keywords' => ''
);
print $renderer->render('reservations.twig', array('metadata' => $metadata));