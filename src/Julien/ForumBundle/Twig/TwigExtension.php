<?php

namespace Julien\ForumBundle\Twig;

use Symfony\Component\DependencyInjection\Container;
use Julien\ForumBundle\Services\AntiSpam;


class TwigExtension extends \Twig_Extension
{

    private $AntiSpam;

    public function __construct(AntiSpam $AntiSpam) {
        $this->AntiSpam = $AntiSpam;
    }

    public function getFunctions()
    {
        return array(
            'is_spam' => new \Twig_Function_Method($this, 'isSpam'),
        );
    }

    /**
     * Verify if the content of the post is a spam based on the antispam service
     *
     * @param \Julien\ForumBundle\Entity\Post $post
     * @return bool
     */
    public function isSpam(\Julien\ForumBundle\Entity\Post $post){
        return $this->AntiSpam->isSpam($post->getContent());
    }

    public function getName()
    {
        return 'julien_forum_extension';
    }

}
