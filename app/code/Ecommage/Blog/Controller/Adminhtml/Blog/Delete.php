<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecommage\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Ecommage\Blog\Model\BlogFactory;
class Delete extends \Magento\Backend\App\Action
{

    protected $filter;
 
    protected $blogFactory;

    protected $resultRedirectFactory;
 
    public function __construct(Context $context, Filter $filter, BlogFactory $blogFactory) {
        $this->filter = $filter;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }
 
    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {  
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = (int)$this->getRequest()->getParam('id');
        if($id) {
            $this->blogFactory->create()->load($id)->delete();
            $this->messageManager->addSuccessMessage(__('Delete Blog Success.'));
            return $resultRedirect->setPath('*/*/index');
        }
        
    }
}