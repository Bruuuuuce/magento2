<?php
/**
 * \Magento\Webhook\Model\Resource\Event
 *
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Webhook
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Webhook\Model\Resource;

/**
 * @magentoDbIsolation enabled
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Magento\Webhook\Model\Resource\Event::_init
     */
    public function testInit()
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $resource = $objectManager->create('Magento\App\Resource', array('tablePrefix' => 'prefix_'));

        /** @var \Magento\Webhook\Model\Resource\Event $eventResource */
        $eventResource = $objectManager->create('Magento\Webhook\Model\Resource\Event', array('resource' => $resource));

        $this->assertEquals('prefix_webhook_event', $eventResource->getMainTable());
        $this->assertEquals('event_id', $eventResource->getIdFieldName());
    }
}
