<?php
namespace Ecommage\Blog\Cron;

class BlogCron
{
    protected $_blogFactory;
    protected $helperData;
    public function __construct(
        \Ecommage\Blog\Helper\Data $helperData,
        \Ecommage\Blog\Model\ResourceModel\Blog\CollectionFactory $blogFactory
    )
    {
        $this->helperData = $helperData;
        $this->_blogFactory = $blogFactory;
    }


    public function execute()
    {

        $blogCollection = $this->_blogFactory->create();
       // $blogCollection = $blog->getCollection();
        if($blogCollection->getSize()) {
            foreach($blogCollection as  $blogModel) {
                $blogModel->setStatus(1);
                $blogModel->save();
                var_dump($blogModel->getId());
            }
        }

        return $this;

    }
}
