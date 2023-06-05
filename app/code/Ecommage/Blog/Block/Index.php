<?php
namespace Ecommage\Blog\Block;
class Index extends \Magento\Framework\View\Element\Template
{	protected $_postFactory;
	protected $helperData;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Ecommage\Blog\Helper\Data $helperData
	)
	{  
		$this->helperData = $helperData;
		parent::__construct($context);
	}

	public function isEnabled()
	{

		return ($this->helperData->getGeneralConfig('enable') && 
			$this->helperData->getGeneralConfig('enable') == 1) ?  1 : 0;
		
	}


} 


