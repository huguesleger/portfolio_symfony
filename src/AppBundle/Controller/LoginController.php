<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of LoginController
 *
 * @author hugues
 */
class LoginController extends Controller {
    
      /**
     * @Route("/loginCheck",name="loginCheck")
     * @throws Exception
     */
    public function check() {
        throw new Exception('Verifiez votre fichier security');
    }
    /**
     * idem déconnexion
     * @Route("/loginOut",name="loginOut")
     * @throws Exception
     */
    public function logout() {
        throw new Exception('Verifiez votre fichier security');
    }
    
}
