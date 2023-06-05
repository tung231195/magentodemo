<?php

namespace Ecommage\Blog\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddData implements DataPatchInterface
{
     private $blogFactory;

     public function __construct(
          \Ecommage\Blog\Model\BlogFactory $blogFactory
     ) {
          $this->blogFactory = $blogFactory;
     }

     public function apply()
     {
          $sampleData = [
               [
                    'status' => 1, 
                    'title' => 'Sample Text 1 for Data 1', 
                    'content' => 'Sample Text 2 for Data 1',
                    'author_id' => 12
               ],
               [
                'status' => 2, 
                'title' => 'Sample Text 1 for Data 2', 
                'content' => 'Sample Text 2 for Data 12',
                'author_id' => 22
              ],
              [
                'status' => 3, 
                'title' => 'Sample Text 1 for Data 3', 
                'content' => 'Sample Text 2 for Data 3',
                'author_id' => 33
              ]
          ];
          foreach ($sampleData as $data) {
               $this->blogFactory->create()->setData($data)->save();
          }
     }

     public static function getDependencies()
     {
          return [];
     }

     public function getAliases()
     {
          return [];
     }
     
}
