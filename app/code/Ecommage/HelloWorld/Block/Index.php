<?php
namespace Ecommage\HelloWorld\Block;
class Index extends \Magento\Framework\View\Element\Template
{	protected $_postFactory;
	protected $helperData;
	//image product size
	protected $_productRepository;
    protected $_productImageHelper;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Ecommage\HelloWorld\Model\PostFactory $postFactory,
		\Ecommage\HelloWorld\Helper\Data $helperData,
		\Magento\Catalog\Model\ProductRepository $productRepository,
		\Magento\Catalog\Helper\Image $productImageHelper
	)
	{
		$this->_postFactory = $postFactory;
		$this->helperData = $helperData;

		$this->_productRepository = $productRepository;
        $this->_productImageHelper = $productImageHelper;
		parent::__construct($context);
	}

	public function sayHello()
	{
		//echo $this->helperData->getGeneralConfig('enable');
		//echo $this->helperData->getGeneralConfig('display_text'); die;
		//exit();
		return __('say Hello World');
	}
	public function getPostCollection(){
		$post = $this->_postFactory->create();
		return $post->getCollection();
	}

    public function getImageHelper() {
        return $this->_productImageHelper;
    }


    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }

    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }

    /**
     * Schedule resize of the image
     * $width *or* $height can be null - in this case, lacking dimension will be calculated.
     *
     * @see \Magento\Catalog\Model\Product\Image
     * @param int $width
     * @param int $height
     * @return $this
     */
    public function resizeImage($product, $imageId, $width, $height = null)
    {
        $resizedImage = $this->_productImageHelper
                           ->init($product, $imageId)
                           ->constrainOnly(TRUE)
                           ->keepAspectRatio(TRUE)
                           ->keepTransparency(TRUE)
                           ->keepFrame(FALSE)
                           ->resize($width, $height);
        return $resizedImage;
    }


}


