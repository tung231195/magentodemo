<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ecommage\Validation\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveBlog implements ObserverInterface
{
    protected $messageManager;
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager
    )
    {
        $this->messageManager = $messageManager;
    }

    public function execute(Observer $observer)
    {
        $blog = $observer->getEvent()->getData('blogEventData');
        $content = $blog->getData('content');
       // var_dump($blog->getData('content')); die;
        $check = $this->check_words($content);
        if($check == true) {
            $this->messageManager->addError(__('The bad words accquired, please update'));
            exit;
        }


    }
    function check_words($text) {
        $bad_words = ['fuck', 'fuck1','fuck2','what the hell','abcdef'];
        foreach($bad_words as $bad) {
            if(str_contains($text,$bad))
                return true;
        }
    }

}
