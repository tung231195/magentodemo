<?php
namespace Ecommage\Blog\Block\Adminhtml\Edit\Button;
 
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

 
class DeleteButton extends  GenericButton implements ButtonProviderInterface
{    
    public function getButtonData()
    {
     
        if($this->getId()) {
            return [
                'label' => __('Delete'),
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this log?') . '\', \'' . $this->getDeleteUrl() . '\')',
                'class' => 'delete',
                'sort_order' => 20
            ];
         }
    }
 
    public function getDeleteUrl()
    {
        $id = $this->getId();        
        return $this->getUrl('*/*/delete', ['id' => $id]);
    }
}