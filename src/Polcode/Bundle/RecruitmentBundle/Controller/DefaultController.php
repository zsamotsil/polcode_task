<?php

namespace Polcode\Bundle\RecruitmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PolcodeRecruitmentBundle:Default:index.html.twig', array('name' => $name));
    }
}
