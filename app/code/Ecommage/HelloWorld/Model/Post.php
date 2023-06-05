<?php
namespace Ecommage\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'ecommage_helloworld_post';

	protected $_cacheTag = 'ecommage_helloworld_post';

	protected $_eventPrefix = 'ecommage_helloworld_post';

	protected function _construct()
	{
		$this->_init('Ecommage\HelloWorld\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
