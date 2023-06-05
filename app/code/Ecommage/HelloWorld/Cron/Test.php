<?php
namespace Ecommage\HelloWorld\Cron;

class Test
{

	public function execute()
	{

		$writer = new \Zend_Log_Writer_Stream(BP . '/var/log/cron_test.log');
		$logger = new \Zend_Log();
		$logger->addWriter($writer);
		$logger->info(__METHOD__);

		return $this;

	}
}
