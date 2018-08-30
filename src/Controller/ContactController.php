<?php

namespace App\Controller;

use \Swift_Attachment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)

    {

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        $this->addFlash('secondary', 'Some useful info');

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->get('service')->getData();
            $contactFormData = $form->getData();

            dump($service);
           // if ($service === true) {
                $contactMail = $contactFormData['from'];

                $message = (new \Swift_Message('Message de Réciprocité!'))
                    ->setFrom($contactMail)
                    ->setTo('testdevprojet@gmail.com')
                    ->setBody(
                        $contactFormData['message'],
                        'text/plain');
                $attachment = Swift_Attachment::fromPath($contactFormData['file'])->setFilename('fichier.pdf');

                $message->attach($attachment);


                $mailer->send($message);


            //}
                $this->addFlash('success', 'Message envoyé!');

                return $this->redirectToRoute('contact');

        }

        return $this->render('contact/index.html.twig', [

            'our_form' => $form->createView(),
            'controller_name' => 'ContactController',
            'title' => 'Nous contacter',

        ]);
    }

}