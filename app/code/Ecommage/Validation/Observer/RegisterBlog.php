<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ecommage\Validation\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RegisterBlog implements ObserverInterface
{
    private $_blogFactory;
    public function __construct(
        \Ecommage\Blog\Model\BlogFactory $blogFactory
    )
    {
        $this->_blogFactory = $blogFactory;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $email = $customer->getEmail();
        $first_name = $customer->getFirstname();
        $last_name = $customer->getLastname();
        $blogModel = $this->_blogFactory->create();
        $blogData = [
            'title' => 'blog data title',
            'author_id' =>$customer->getId(),
            'status' => 1,
            'content' => __('Hello '). $customer->getEmail()
        ];
        if($customer->getEmail()) {
            $blogModel->addData($blogData)->save();
        }

    }
}
