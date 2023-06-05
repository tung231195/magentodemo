<?php
namespace Ecommage\Blog\Model\ResourceModel;


class Blog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('ecommage_blogs', 'id');
      //  $this->getBlogData(5);
	}

	public function getBlogData($id)
    {
        $adapter = $this->getConnection();
        $tableName = $this->getMainTable();

       // $results = $this->getConnection()->fetchAll($query);

        $select  = $adapter->select()
            ->from(
                ['c' => $tableName],
                ['id','title','status']
            )
            ->where('id = :id');
        $binds   = ['id' => (int) $id];

        $t = $adapter->fetchRow($select, $binds);
       // echo "<pre>"; print_r($t); echo "</pre>";
        $this->getProductStore();
        return $adapter->fetchCol($select, $binds);
    }

    public function getProductStore() {
        $productWebsites = array(2,3,5);
        $this->_productWebsiteTable = $this->getTable('catalog_product_website');
        $select = $this->getConnection()->select()->from(
            ['product_website' => $this->_productWebsiteTable]
        )->join(
            ['website' => $this->getTable('store_website')],
            'website.website_id = product_website.website_id',
            ['name']
        )->where(
            'product_website.product_id IN (?)',
            $productWebsites
        )->where(
            'website.website_id > ?',
            0
        );
        $select->join(
            ['category' => $this->getTable('catalog_category_product')],
            'category.product_id = product_website.product_id',
            ['category_id']
        );


        $data = $this->getConnection()->fetchAll($select);

       // echo "<pre>"; print_r($data); echo "</pre>";;
    }


}
