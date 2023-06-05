<?php
namespace Ecommage\Blog\Model;
 
use Ecommage\Blog\Model\ResourceModel\Blog\CollectionFactory;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $blogCollectionFactory
     * @param array $meta
     * @param array $data
     */
    private $blogCollectionFactory;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blogCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->blogCollectionFactory = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get data
     *
     * @return array
     */
      /**
     * Get data
     *
     * @return array
     */
    public function getData()
    { 
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->blogCollectionFactory->getItems();
		
        $this->loadedData = [];
        foreach ($items as $pattern) {
            $data = $pattern->getData();
            $this->loadedData[$pattern->getId()] = $data;
        }

        return $this->loadedData;
    }
    public function addFilter(\Magento\Framework\Api\Filter $filter)
	{
		return null;
	}
 
}