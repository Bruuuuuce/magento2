<?php
/**
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
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
* Helper class that simplifies gz files stream reading and writing
*/
namespace Magento\Archive\Helper\File;

class Gz extends \Magento\Archive\Helper\File
{
    /**
     * @see \Magento\Archive\Helper\File::_open()
     */
    protected function _open($mode)
    {
        $this->_fileHandler = @gzopen($this->_filePath, $mode);

        if (false === $this->_fileHandler) {
            throw new \Magento\Exception('Failed to open file ' . $this->_filePath);
        }
    }

    /**
     * @see \Magento\Archive\Helper\File::_write()
     */
    protected function _write($data)
    {
        $result = @gzwrite($this->_fileHandler, $data);

        if (empty($result) && !empty($data)) {
            throw new \Magento\Exception('Failed to write data to ' . $this->_filePath);
        }
    }

    /**
     * @see \Magento\Archive\Helper\File::_read()
     */
    protected function _read($length)
    {
        return gzread($this->_fileHandler, $length);
    }

    /**
     * @see \Magento\Archive\Helper\File::_eof()
     */
    protected function _eof()
    {
        return gzeof($this->_fileHandler);
    }

    /**
     * @see \Magento\Archive\Helper\File::_close()
     */
    protected function _close()
    {
        gzclose($this->_fileHandler);
    }
}
