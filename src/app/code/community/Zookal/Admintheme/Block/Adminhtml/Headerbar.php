<?php

/**
 * @category    Zookal_Admintheme
 * @package     Admintheme
 * @author      Cyrill Schumacher | {firstName}@{lastName}.fm | @SchumacherFM
 * @copyright   Copyright (c) Zookal Pty Ltd
 * @license     OSL - Open Software Licence 3.0 | http://opensource.org/licenses/osl-3.0.php
 */
class Zookal_Admintheme_Block_Adminhtml_Headerbar extends Mage_Core_Block_Template
{
    /**
     *
     * @return string
     */
    protected function _toHtml()
    {
        /** @var Zookal_Admintheme_Helper_Data $helper */
        $helper = $this->helper('zookaladmintheme');

        return '<div id="headerbar" class="' . $helper->getClassName() . '"><span>' . (
            $helper->getDomain() . ' ' . $helper->getVersion()
        ) . '</span></div>';
    }
}
