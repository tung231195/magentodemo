<?php
namespace Ecommage\Blog\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class Author implements ArrayInterface
{

    protected $_customer;
    protected $_customerFactory;

    public function __construct(
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Customer $customers
    )
    {
    
        $this->_customerFactory = $customerFactory;
        $this->_customer = $customers;
    }

    public function getCustomerCollection() {
        return $this->_customer->getCollection()
               ->addAttributeToSelect("*")
               ->load();
    }

    public function toOptionArray()
    {
        $customer = $this->getCustomerCollection();
        $customerOptions = array();
        if($customer) { 
            $i = 0;
            foreach($customer as $k=>$c) {
                
                $customerOptions[$i]  = array(
                    'label' =>  $c->getFirstname(). ' '. $c->getLastname(),
                    'value' => $c->getId()
                );
                $i++;
            }
        }
        $options = [
            0 => [
                'label' => 'public',
                'value' => 1
            ],
            1 => [
                'label' => 'draft',
                'value' => 2
            ],
            2 => [
                'label' => 'non publish',
                'value' => 3
            ]
        ];
        return $customerOptions;
    }
}