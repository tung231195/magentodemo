<?php
namespace Ecommage\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'ecommage_helloworld_post_collection';
	protected $_eventObject = 'post_collection';
	protected $_productWebsiteTable="";
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Ecommage\HelloWorld\Model\Post', 'Ecommage\HelloWorld\Model\ResourceModel\Post');
	}


	public function getProductStore() {
		$productWebsites = array(2,3,5);
		$this->_productWebsiteTable = $this->getResource()->getTable('catalog_product_website');
		$select = $this->getConnection()->select()->from(
			['product_website' => $this->_productWebsiteTable]
		)->join(
			['website' => $this->getResource()->getTable('store_website')],
			'website.website_id = product_website.website_id',
			['name']
		)->where(
			'product_website.product_id IN (?)',
			array_keys($productWebsites),
			\Zend_Db::INT_TYPE
		)->where(
			'website.website_id > ?',
			0
		);
		$select->join(
			['category' => $this->getResource()->getTable('catalog_category_product')],
			'category.product_id = product_website.product_id',
			['category_id']
		);


		$data = $this->getConnection()->fetchAll($select);
	
		echo "<pre>"; print_r($data); echo "</pre>";;
	}

}

