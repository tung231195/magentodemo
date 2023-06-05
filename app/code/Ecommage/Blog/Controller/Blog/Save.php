<?php
namespace Ecommage\Blog\Controller\Blog;

class Save extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $helperData;
	protected $_blogFactory;
	private $resultJsonFactory;
    /**
     * @var EventManager
     */
    private $eventManager;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Ecommage\Blog\Helper\Data $helperData,
		\Ecommage\Blog\Model\BlogFactory $blogFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager
		)
	{

		$this->_pageFactory = $pageFactory;
        $this->helperData = $helperData;
		$this->_blogFactory = $blogFactory;
		$this->resultJsonFactory = $resultJsonFactory;
        $this->eventManager = $eventManager;
		return parent::__construct($context);
	}

	public function execute()
	{
		$blog = $this->_blogFactory->create();
		$data = $this->getRequest()->getPost();
		$params = $this->getRequest()->getParams();
		$resultRedirect = $this->resultRedirectFactory->create();
		try {


			//save data
			if(isset($params['data']) && $params['data']['id']) {

				$blog->load($params['data']['id']);

				$blog->setData($params['data'])->save();

                //add event
                $eventData = $blog;
                // Code...
                $this->eventManager->dispatch('ecommage_blog_event_after_save', ['blogEventData' => $eventData]);

				$this->messageManager->addSuccessMessage(__('Updage Blog Success.'));

				$resultJson = $this->resultJsonFactory->create();
				return $resultJson->setData($blog->getData());

			} else {

				if($data) {
					$newData = [
						'title' => $data['title'],
						'content' => $data['content'],
						'author_id' => $this->helperData->getCustomerId(),
						'status' => 1
					   ];
					$blog->addData($newData);
					$blog->save();
					$this->messageManager->addSuccessMessage(__('Create Blog Success.'));

				}
				return $resultRedirect->setPath('*/*/');
			}


		} catch (\Throwable $th) {
			throw $th;
		}
		return $this->_pageFactory->create();
		//return $resultRedirect->setPath('*/*/');
	}
}
