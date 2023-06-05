<?php
namespace Ecommage\Blog\Controller\Blog;

class Add extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $helperData; 

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \Ecommage\Blog\Helper\Data $helperData
		)
	{

		$this->_pageFactory = $pageFactory;
        $this->helperData = $helperData;

		return parent::__construct($context);
	}

	public function execute()
	{   
		return $this->_pageFactory->create();
	}
}
