<?php
namespace Ecommage\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Ecommage\HelloWorld\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$post = $this->_postFactory->create();

		//$ps = $post->getCollection()->getProductStore();
		
		//test joi table
		//$test = $post->getCollection()->filterOrder('checkmo'); 
		//die('ss');
 		$collection = $post->getCollection();
 		
 		foreach($collection as $item){
			//echo "<pre>";
			//print_r($item->getData());
			//echo "</pre>";
		}
		//die('aaaaad');
		return $this->_pageFactory->create();
	}
}
