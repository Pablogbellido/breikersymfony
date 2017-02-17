<?php

namespace blogBundle\Controller;

use blogBundle\Entity\Mensaje;
use blogBundle\Entity\Usuario;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    public function indexAction()
    {
		$em = $this->getDoctrine()
					->getManager();
		
		$mensaje = $em->getRepository('blogBundle:Mensaje')
						->findAll();
        return $this->render('blogBundle:Blog:index.html.twig', array('mensajes'=> $mensaje));
		
						 
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
	
	public function entradaAction($id)
    {
		$em = $this->getDoctrine()->getManager();

		$query = $em->createQuery(
            'SELECT  m.titulo, m.contenido, u.nombre 
			 FROM blogBundle:Mensaje m, blogBundle:Usuario u
			 	WHERE u.id = m.usuarioId and m.id= :id
        ')->setParameter('id', $id);		

		$resultado=$query->getResult();

        return $this->render('blogBundle:Blog:entradas.html.twig', array('datos'=>$resultado));
    }
}
