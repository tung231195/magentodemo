<?php
namespace Ecommage\Blog\Controller\Adminhtml\Blog;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Ecommage\Blog\Model\BlogFactory;
 
class Save extends Action
{
    protected $request;
    protected $_blogFactory;
    protected $resultRedirectFactory;
    protected $jsonHelper;
    protected $date;
 
    public function __construct(
        Context $context, 
        BlogFactory $blogFactory, 
        \Magento\Framework\Json\Helper\Data $jsonHelper, 
        \Magento\Framework\Stdlib\DateTime\DateTime $date)
    {
        $this->jsonHelper = $jsonHelper;
        $this->date = $date;
        $this->_blogFactory = $blogFactory;
        parent::__construct($context);
    }   
 
    public function execute() {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        $blogModel = $this->_blogFactory->create();
        try {
            $id = (int)$this->getRequest()->getParam('id');
            if($id){
                $blogModel->load($id);
                $blogModel->setData($data)->save();
                $this->messageManager->addSuccessMessage(__('Update Blog Success.'));
            }else {
                $newData = [
                    'title' => $data['title'],
                    'status' => $data['status'],
                    'author_id' => $data['author_id']
                   ];
                
                $blogModel->addData($newData);
                $blogModel->save();
                $this->messageManager->addSuccessMessage(__('Create Blog Success.'));
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }    
        
        return $resultRedirect->setPath('*/*/index');
    }
}