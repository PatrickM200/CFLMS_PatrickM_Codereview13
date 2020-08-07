<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Events; //import the entity

// Classes for the form inputs
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EventManagementController extends AbstractController
{
    /**
     * @Route("/", name="event_management")
     */
    public function showEvents()
    {
        $events = $this->getDoctrine()->getRepository('App:Events')->findAll();

        return $this->render('event_management/index.html.twig', array('events' => $events));
    }

    /**
     * @Route("/admin", name="admin_backend")
     */
    public function backend()
    {
        $events = $this->getDoctrine()->getRepository('App:Events')->findAll();

        return $this->render('event_management/backend.html.twig', array('events' => $events));
    }

    /**
     * @Route("/create", name="create_page")
     */
    public  function createAction(Request $request)
    {

        $event = new Events;

        /* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add
        then we select the input type then an array to add an attribute that we want in our input field */

        $form = $this->createFormBuilder($event)

            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('date', DateTimeType::class, array('attr' => array('style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('image', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('contact_mail', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('contact_phone', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('url', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('type', ChoiceType::class, array('choices' => array('party' => 'party', 'outdoor' => 'outdoor', 'music' => 'music', 'sport' => 'sport', 'movie' => 'movie', 'theater' => 'theater'), 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            ->add('create_event', SubmitType::class, array('label' => 'Create Event', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))

            ->getForm();

        $form->handleRequest($request);


        /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
        if ($form->isSubmitted() && $form->isValid()) {
            //fetching data

            // taking the data from the inputs by the name of the inputs then getData() function
            $name = $form['name']->getData();
            $date = $form['date']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $capacity = $form['capacity']->getData();
            $contact_mail = $form['contact_mail']->getData();
            $contact_phone = $form['contact_phone']->getData();
            $address = $form['address']->getData();
            $url = $form['url']->getData();
            $type = $form['type']->getData();



            /* these functions we bring from our entities, every column has a set function and we put the value that we get from the form */
            $event->setName($name);
            $event->setDate($date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setContactMail($contact_mail);
            $event->setContactPhone($contact_phone);
            $event->setAddress($address);
            $event->setURL($url);
            $event->setType($type);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush(); // actually executes the queries (i.e. the INSERT query)

            $this->addFlash(
                'notice',
                'Event Added'
            );

            return $this->redirectToRoute('event_management');
        }
        /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
        return $this->render('event_management/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/{id}/edit", name="edit_page")
     */
    public  function editAction($id, Request $request)
    {

        $event = $this->getDoctrine()->getRepository('App:Events')->find($id);

        $event->setName($event->getName());
        $event->setDate($event->getDate());
        $event->setDescription($event->getDescription());
        $event->setImage($event->getImage());
        $event->setCapacity($event->getCapacity());
        $event->setContactMail($event->getContactMail());
        $event->setContactPhone($event->getContactPhone());
        $event->setAddress($event->getAddress());
        $event->setURL($event->getURL());
        $event->setType($event->getType());

        $form = $this->createFormBuilder($event)

            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('date', DateTimeType::class, array('attr' => array('style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('image', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('contact_mail', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('contact_phone', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('url', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('type', ChoiceType::class, array('choices' => array('party' => 'party', 'outdoor' => 'outdoor', 'music' => 'music', 'sport' => 'sport', 'movie' => 'movie', 'theater' => 'theater'), 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            ->add('edit_event', SubmitType::class, array('label' => 'Edit Event', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))

            ->getForm();

        $form->handleRequest($request);


        /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
        if ($form->isSubmitted() && $form->isValid()) {
            //fetching data

            // taking the data from the inputs by the name of the inputs then getData() function
            $name = $form['name']->getData();
            $date = $form['date']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $capacity = $form['capacity']->getData();
            $contact_mail = $form['contact_mail']->getData();
            $contact_phone = $form['contact_phone']->getData();
            $address = $form['address']->getData();
            $url = $form['url']->getData();
            $type = $form['type']->getData();



            /* these functions we bring from our entities, every column has a set function and we put the value that we get from the form */
            $event->setName($name);
            $event->setDate($date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setContactMail($contact_mail);
            $event->setContactPhone($contact_phone);
            $event->setAddress($address);
            $event->setURL($url);
            $event->setType($type);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush(); // actually executes the queries (i.e. the INSERT query)

            $this->addFlash(
                'notice',
                'Event Updated'
            );
            return $this->redirectToRoute('event_management');
        }

        /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
        return $this->render('event_management/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/{id}", name="details_page")
     */
    public  function detailsAction($id)
    {
        $event = $this->getDoctrine()->getRepository('App:Events')->find($id);
        return $this->render('event_management/details.html.twig', [
            'event' => $event
        ]);
    }

    /**
     * @Route("/{id}/delete", name="event_delete")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $event = $entityManager->getRepository('App:Events')->find($id);
        $entityManager->remove($event);

        $entityManager->flush();
        $this->addFlash(
            'notice',
            'Event Removed'
        );
        return $this->redirectToRoute('event_management');
    }
}
