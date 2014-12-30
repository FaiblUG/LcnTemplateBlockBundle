<?php

namespace Lcn\TemplateBlockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function indexAction()
    {

        $this->container->get('lcn.template_block')->add('test_php', '<div>TEST PHP ADD 1</div>');

        return $this->render('LcnTemplateBlockBundle:Demo:index.html.twig');
    }
}
