<?php

namespace Ecommage\Validation\Plugin;

class ValidateBlog{
    protected $messageManager;
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager
    )
    {
        $this->messageManager = $messageManager;
    }

    public function beforeexecute(\Ecommage\Blog\Controller\Blog\Save $subject)
    {
        $postData =  $customerId = $subject->getRequest()->getParams();
        $content = $postData['data']['content'];
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
