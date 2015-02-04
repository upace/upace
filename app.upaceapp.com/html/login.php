<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../site_init.php';

$renderer = new TemplateRenderer(array(), array(), $SITE);
$metadata = array(
    'title' => 'UPACE - Login and Registration',
    'description' => '',
    'keywords' => ''
);
print $renderer->render('login.twig', array('metadata' => $metadata, 'anonymousUsersAllowed' => true));