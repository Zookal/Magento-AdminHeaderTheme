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
    private $_domain = null;
    private $_className = null;

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
        if (null !== $this->_className) {
            return $this->_className;
        }
        $this->_className = '';
        $domain           = $this->getDomain();
        $environments     = array(
            'production',
            'staging',
            'development',
        );
        foreach ($environments as $env) {
            if ($domain === Mage::getStoreConfig('zookaladmintheme/headerbar/' . $env . '_path')) {
                $this->_className = $env;
                break;
            }
        }
        return $this->_className;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        if (null !== $this->_domain) {
            return $this->_domain;
        }
        $path          = strtolower(rtrim(trim(Mage::getStoreConfig('web/unsecure/base_url')), '/'));
        $this->_domain = str_replace(array('http://', 'https://'), '', $path);
        return $this->_domain;
    }
}
