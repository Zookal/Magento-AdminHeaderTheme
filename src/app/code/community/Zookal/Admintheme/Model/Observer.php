<?php

/**
 * @category    Zookal_Admintheme
 * @package     Model
 * @author      Cyrill Schumacher | {firstName}@{lastName}.fm | @SchumacherFM
 * @copyright   Copyright (c) Zookal Pty Ltd
 * @license     OSL - Open Software Licence 3.0 | http://opensource.org/licenses/osl-3.0.php
 */
class Zookal_Admintheme_Model_Observer
{
    /**
     * @fire adminhtml_controller_action_predispatch_start
     *
     * @return null
     */
    public function overrideTheme()
    {
        $theme = trim(Mage::getStoreConfig('design/admin/theme'));

        if (empty($theme)) {
            return null;
        }

        Mage::getDesign()->setArea('adminhtml')->setTheme($theme);
    }

    /**
     * @fire adminhtml_block_html_before
     *
     * @param Varien_Event_Observer $observer
     */
    public function setBodyClass(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getBlock();
        if ($block instanceof Mage_Adminhtml_Block_Page) {
            $block->addBodyClass('headerbar-added');
        }
    }
}
