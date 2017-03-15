<?php

namespace blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function indexAction(Request $request)
    {
		if($request->getMethod()=="POST")
		{
			$usuario = $request->get("usuario");
			$password = $request->get("password");
			//var_dump( $usuario . " / " . $password); die();
			$user = $this->getDoctrine()
					->getRepository("blogBundle:Usuario")
					->findOneBy(array("nombreUsuario"=>$usuario, "contrasena"=>$password));
			if($user){
				$session = $request->getSession();
				$session->set("id", $user->getID());
				$session->set("nombreUsuario", $user->getNombreUsuario());
				
				$em = $this->getDoctrine()
					->getManager();
		
		$mensaje = $em->getRepository('blogBundle:Mensaje')
						->findAll();
        return $this->render('blogBundle:Blog:index.html.twig', array('mensajes'=> $mensaje));
			}
			else{
				$this->get('session')->getFlashbag()->add(
				'mensaje',
				'Los datos no son válidos');
				return $this->redirect($this->generateUrl('blog_login'));
			}
		}
        return $this->render('blogBundle:Login:index.html.twig');
    }
	
	public function logoutAction(Request $request){
		$session = $request->getSession();
		$session->clear();
		$this->get('session')->getFlashbag()->add(
				'mensaje',
				'Adios');
				return $this->redirect($this->generateUrl('blog_login'));
	}
}
