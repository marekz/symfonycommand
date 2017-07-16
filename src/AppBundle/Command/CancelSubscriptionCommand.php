<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand as Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CancelSubscriptionCommand extends Command {

    protected function configure() {
        $this
                ->setName('app:cancel-subscription')
                ->setDescription('Auto-canceling subscription')
                ->setHelp('This command deactivate subscriptions users who forgot buy new subscribe by seven days');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln([
            'Subscription cancel',
            '===================',
            '',
        ]);
        
        $dm = $this->getContainer()->get('doctrine')->getManager();
        $subscriptionPayment = $dm->getRepository('AppBundle:SubsriptionPayment')->findByCanceledSubscription();
        
        foreach ($subscriptionPayment as $element) {
            $canceledSubscription = $dm->getRepository('AppBundle:Subsription')->findOneBy(['id'=>$element->getSubscription()]);
            $canceledSubscription->setStatus("canceled");
            $dm->flush();
        }
    }
}