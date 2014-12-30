<?php

namespace Lcn\TemplateBlockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function indexAction()
    {
        return $this->render('LcnTemplateBlockBundle:Demo:index.html.twig');
    }
}
