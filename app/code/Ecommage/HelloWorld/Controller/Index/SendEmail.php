<?php
namespace Ecommage\HelloWorld\Controller\Index;

class SendEmail extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $helperData;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \Ecommage\HelloWorld\Helper\Email $helperData,)
	{
		$this->_pageFactory = $pageFactory;
        $this->helperData = $helperData;
		return parent::__construct($context);
	}
	public function execute()
	{
        $this->helperData->sendEmail();
		die('sendEmail');
	}

}
