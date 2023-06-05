<?php

namespace Ecommage\Blog\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const XML_PATH_BLOG = 'blog/';

	protected $customerSessionFactory;

	/**
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;
	protected $_status;

	public function __construct(
		\Magento\Framework\App\Helper\Context $context,
		\Magento\Customer\Model\SessionFactory $customerSessionFactory,
		\Magento\Framework\App\Http\Context $httpContext,
		\Ecommage\Blog\Model\Config\Source\Enabledisable $status,
		array $data = []		
	) {

		$this->httpContext = $httpContext;
		$this->customerSessionFactory = $customerSessionFactory;
		$this->_status = $status;
		parent::__construct($context, $data);
		
	}

	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function getGeneralConfig($code, $storeId = null)
	{

		return $this->getConfigValue(self::XML_PATH_BLOG .'general/'. $code, $storeId);
	}

	public function isCustomerLogin() {
		if ($this->httpContext->getData('customer_logged_in')) {
			return true;
		} else {
			return false;
		}
	}

	public function getCustomerId(){
		$customer = $this->customerSessionFactory->create();
		return (int) $customer->getCustomer()->getId();
	}

	public function getStatus() {
		 $options = $this->_status->toOptionArray();
		 unset($options[0]);
		 return $options;
	}



	

}
