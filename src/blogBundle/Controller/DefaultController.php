<?php

namespace blogBundle\Controller;

use blogBundle\Entity\Mensaje;
use blogBundle\Entity\Usuario;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('blogBundle:Home:index.html.twig');
    }
	
	public function entradasAction($id)
    {
		/*
		$em = $this->getDoctrine()
					->getRepository('blogBundle:Mensaje')
						->find($id);
		*/
		$em=$this->getDoctrine()->getManager();
		$query = $em->createQuery(
            'SELECT u FROM blogBundle:Mensaje m, blogBundle:Usuario u
			 	WHERE u.id = m.usuarioId and m.id= :id
        ')->setParameter('id', $id);
		$resultado=$query->getResult();
		
        return $this->render('blogBundle:Blog:entradas.html.twig', array('usuario'=> $resultado));
    }
	


    /*
    public function entradaAction(Request $request, $id)
    {
        $session = $request->getSession();

        if($session->has("id")){
            $em = $this->getDoctrine()->getManager();

            $query = $em->createQuery(
                'SELECT  m.titulo, m.contenido, u.nombre
			 FROM blogBundle:Mensaje m, blogBundle:Usuario u
			 	WHERE u.id = m.usuarioId and m.id= :id
        ')->setParameter('id', $id);

            $resultado=$query->getResult();

            return $this->render('blogBundle:Blog:entradas.html.twig', array('datos'=>$resultado));
        }
        else{
            $this->get('session')->getFlashbag()->add(
                'mensaje',
                'Debe iniciar sesion para ver el contenido de esta pagina');
            return $this->redirect($this->generateUrl('blog_login'));
        }

    }
    */
	
	// public function mensajesCategoriaAction
	
}
