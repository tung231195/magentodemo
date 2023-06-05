<?php
namespace Ecommage\Blog\Model;
class Blog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'ecommage_blog_blog';

	protected $_cacheTag = 'ecommage_blog_blog';

	protected $_eventPrefix = 'ecommage_blog_blog';

	protected function _construct()
	{
		$this->_init('Ecommage\Blog\Model\ResourceModel\Blog');
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
