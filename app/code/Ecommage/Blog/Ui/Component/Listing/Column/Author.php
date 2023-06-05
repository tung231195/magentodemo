<?php

namespace Ecommage\Blog\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Author extends Column
{

    const ALT_FIELD = 'title';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;


    protected $customer; 


    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        \Magento\Customer\Model\CustomerFactory $customer,
        array $components = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->customer = $customer;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {  
        if (isset($dataSource['data']['items'])) {
			//echo"<pre>"; print_r($dataSource['data']['items']); die;
            $fieldName = $this->getData('name');
           
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[$fieldName])) {
                    $custom = $this->customer->create();
                    $custom_name = $custom->load($item[$fieldName])->getName();
                    if($custom_name!==null) {
                        $item[$fieldName] = $custom_name;
                    } else {
                        $item[$fieldName] = 'No Register';
                    }

                } 

            }
        }
        return $dataSource;
    }

    protected function getAlt($row)
    {
        $altField = $this->getData('config/altField') ?: self::ALT_FIELD;
        return isset($row[$altField]) ? $row[$altField] : null;
    }
}