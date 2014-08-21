<?php

namespace Julien\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/posts/list")
     * @Template()
     */
    public function listPostAction()
    {
        $em = $this->getDoctrine()->getManager();
        $postRepo = $em->getRepository('JulienForumBundle:Post');

        $listPosts = $postRepo->findAll();
        return array('listPosts' => $listPosts);
    }

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
