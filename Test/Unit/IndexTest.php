<?php
/***
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mage\Import\Test\Unit\Controller\Index;

class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        // Create dependency mocks
        $page = $this->getMockBuilder('Magento\Framework\View\Result\Page')
            ->disableOriginalConstructor()
            ->getMock();
        $resultFactory = $this->getMockBuilder('Magento\Framework\View\Result\PageFactory')
            ->disableOriginalConstructor()
            ->getMock();

        // Set up SUT
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $model = $objectManager->getObject('Mage\Import\Controller\Index\Index',
            ['resultPageFactory' => $resultFactory]
        );

        // Expectations of test
        $resultFactory->expects($this->once())->method('create')->willReturn($page);
        $this->assertSame($page, $model->execute());
    }
}
