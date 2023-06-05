<?php
namespace Ecommage\Blog\Block;
class Blog extends \Magento\Framework\View\Element\Template
{
	protected $_blogFactory;
	protected $helperData;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Ecommage\Blog\Helper\Data $helperData,
		\Ecommage\Blog\Model\BlogFactory $blogFactory
	)
	{
		$this->helperData = $helperData;
		$this->_blogFactory = $blogFactory;
		parent::__construct($context);
	}

	public function isEnabled()
	{

		return ($this->helperData->getGeneralConfig('enable') &&
			$this->helperData->getGeneralConfig('enable') == 1) ?  1 : 0;

	}

	public function  getBlogHelperData() {
		return $this->helperData;
	}

	public function getBlogData($id)
    {
        $blog = $this->_blogFactory->create();

        if ($id) {
            $blog->load($id);
        }

        return $blog;
    }

	public function getAllBlogs() {
		$allBlog  = $this->_blogFactory->create()
			->getCollection()
			->addFieldToFilter('author_id', $this->helperData->getCustomerId());
		if($allBlog)
			return $allBlog;
		return null;
	}

	public function getBlogId() {
		return $this->getRequest()->getParam('id') ? $this->getRequest()->getParam('id') : null;
	}



}


