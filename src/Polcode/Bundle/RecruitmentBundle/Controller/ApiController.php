<?php

namespace Polcode\Bundle\RecruitmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    public function employeeListAction()
    {
        $repository = $this->getDoctrine()->getRepository('@PolcodeRecruitmentBundle:Employee');
        $employees = $repository->findAll();
        $serializedEntity = $this->container->get('serializer')->serialize($employees, 'json');
        return new Response($serializedEntity);
    }
    
    public function employeeListForAmAction($am)
    {
        $repository = $this->getDoctrine()->getRepository('@PolcodeRecruitmentBundle:Employee');
        $employees = $repository->findBy(array('am' => $am));
        $serializedEntity = $this->container->get('serializer')->serialize($employees, 'json');
        return new Response($serializedEntity);
    }
}
