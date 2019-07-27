<?php

namespace MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;



class MainController extends Controller
{
    /**
     * @Route("/", name="main_index")
     */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user instanceof UserInterface) {
            $this->container->get('session')->getFlashBag()->set('sonata_user_error', 'sonata_user_already_authenticated');
            $url = $this->container->get('router')->generate('fos_user_profile_show');

            return new RedirectResponse($url);
        }
        else {
            $url =$this->generateUrl('sonata_user_security_login');
            return new RedirectResponse($url);
        }
//        return $this->render('MainBundle:Main:index.html.twig');
    }
}
