<?php
namespace Ecommage\FirstModule\Block;
class Index extends \Magento\Framework\View\Element\Template
{	protected $_postFactory;
	protected $helperData;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Ecommage\FirstModule\Helper\Data $helperData
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

	public function getTextFirstModule()
	{

		return ($this->helperData->getGeneralConfig('display_text')) ?  $this->helperData->getGeneralConfig('display_text') : "";
		
	}


} 


