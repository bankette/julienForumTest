<?php
/**
 *
 * Created by : jmaquet / Nordsoft
 * Date: 20/08/14
 * Time: 16:57
 *
 */
namespace Julien\ForumBundle\Services;

class AntiSpam
{

    private $activated;

    /**
     * @param $plainValue string
     * @param $var string
     */
    public function __construct($activated){
        $this->activated = $activated;
    }

    /**
     * Verify if the text passed as parameter is a spam.
     * This is a dummy function for now.
     *
     * @param \Julien\ForumBundle\Entity\Post $post
     * @return bool
     */
    public function isSpam($text){
        if(!$this->isActivated())
                return false;
        if(strlen($text) > 10){
            return true;
        }
        return false;
    }

    /**
     * Return true if the service is actiovated in configuration, false otherwise
     *
     * @return bool
     */
    protected function isActivated(){
        if($this->activated == "true"){
            return true;
        }
        return false;
    }

}
