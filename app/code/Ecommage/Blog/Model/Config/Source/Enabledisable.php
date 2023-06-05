<?php
namespace Ecommage\Blog\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class Enabledisable implements ArrayInterface
{
    public function toOptionArray()
    {
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
        return $options;
    }
}