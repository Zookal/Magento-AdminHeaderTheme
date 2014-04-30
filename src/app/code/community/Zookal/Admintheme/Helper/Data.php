<?php

/**
 * @category    Zookal_Admintheme
 * @package     Model
 * @author      Cyrill Schumacher | {firstName}@{lastName}.fm | @SchumacherFM
 * @copyright   Copyright (c) Zookal Pty Ltd
 * @license     OSL - Open Software Licence 3.0 | http://opensource.org/licenses/osl-3.0.php
 */
class Zookal_Admintheme_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * @return string
     */
    public function getVersion()
    {
        return trim(Mage::getStoreConfig('zookaladmintheme/headerbar/version'));
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        $domain       = $this->getDomain();
        $environments = array(
            'production',
            'staging',
            'development',
        );
        foreach ($environments as $env) {
            if ($domain === Mage::getStoreConfig('zookaladmintheme/headerbar/' . $env . '_path')) {
                return $env;
            }
        }
        return '';
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        $path = strtolower(rtrim(trim(Mage::getStoreConfig('web/unsecure/base_url')), '/'));
        return str_replace(array('http://', 'https://'), '', $path);
    }
}
