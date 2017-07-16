<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\CreditCard;
use AppBundle\Form\CreditCardType;
use AppBundle\Entity\Subsription;
use AppBundle\Entity\SubsriptionPayment;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer) {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $userStatus = $this->checkUserStatus($user);
        if (!$userStatus) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $creditCard = new CreditCard();
        $form = $this->createForm(CreditCardType::class, $creditCard);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cardNumber = $creditCard->getCardNumber();
            $cardType = $creditCard->getCardType();
            $cardStatus = $this->checkCardTypeViaCardNumber(array($cardNumber, $cardType));
            $this->changeSubscriptionStatus($cardStatus);

            $this->sendMessage($user->getEmail(), $mailer);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
                    'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/subscription", name="subscription")
     */
    public function showSubscriptionListAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $subscriptions = $em->getRepository('AppBundle:Subsription')->findBy(['user'=>$user->getId()]);
        
        return $this->render('default/subsriptionList.html.twig', [
            'item' => $subscriptions
        ]);
    }

    private function sendMessage($email, $mailer) {

        $message = (new \Swift_Message('dzień dobry'))
                ->setFrom('system@localhost')
                ->setTo($email)
                ->setBody(
                $this->renderView(
                        'Emails/payment.html.twig'
                ), 'text/html'
        );

        $mailer->send($message);
    }

    private function changeSubscriptionStatus($cardStatus) {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($cardStatus) {
            $em = $this->getDoctrine()->getManager();
            $subscription = $em->getRepository('AppBundle:Subsription')->findOneBy(["id" => $user->getId()]);
            $subscription->setStatus("active");
            $em->flush();
        }
    }

    private function checkCardTypeViaCardNumber($cardData) {
        $cardNumber = $cardData[0];
        $cardLength = strlen($cardNumber);
        $cardType = $cardData[1];
        $cardTypeViaNumber = $cardNumber[0];

        if ($cardLength == 15 && $cardType == "AE" && $cardTypeViaNumber == 3) {
            return "AE";
        } elseif ($cardLength == 16 && $cardType == "MS" && $cardTypeViaNumber == 5) {
            return "MS";
        } elseif (($cardLength == 13 || $cardLength == 16) && $cardType == "VI" && $cardTypeViaNumber == 4) {
            return "VI";
        } else {
            return null;
        }
    }

    private function checkUserStatus($user) {
        $result = ($user == "anon.") ? false : true;
        return $result;
    }

}
