<?php
/**
 * @copyright  Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Core\Filter;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter()
    {
        $localeMock = $this->getMock('\Magento\Core\Model\LocaleInterface');
        $localeMock->expects($this->once())
            ->method('getDateTimeFormat')
            ->with(\Magento\Core\Model\LocaleInterface::FORMAT_TYPE_SHORT)
            ->will($this->returnValue('HH:mm:ss MM-dd-yyyy'));
        $model = new DateTime($localeMock);
        // Check that datetime is converted to 'yyyy-MM-dd HH:mm:ss' format
        $this->assertEquals('2241-12-31 23:59:53', $model->filter('23:59:53 12-31-2241'));
    }
}
