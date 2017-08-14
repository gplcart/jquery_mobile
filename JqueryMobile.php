<?php

/**
 * @package Jquery Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\jquery_mobile;

use gplcart\core\Module;

/**
 * Main class for Jquery Mobile module
 */
class JqueryMobile extends Module
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['jquery_mobile'] = array(
            'name' => 'Jquery Mobile',
            'description' => 'A HTML5-based user interface system designed to make responsive web sites and apps that are accessible on all smartphone, tablet and desktop devices',
            'type' => 'asset',
            'module' => 'jquery_mobile',
            'url' => 'http://jquerymobile.com',
            'download' => 'http://jquerymobile.com/resources/download/jquery.mobile-1.4.5.zip',
            'version_source' => array(
                'file' => 'vendor/jquery/jquery-mobile/jquery.mobile-1.4.5.min.js',
                'pattern' => '/jQuery Mobile (\\d+\\.+\\d+\\.+\\d+)/',
                'lines' => 2
            ),
            'files' => array(
                'vendor/jquery/jquery-mobile/jquery.mobile-1.4.5.min.js',
                'vendor/jquery/jquery-mobile/jquery.mobile-1.4.5.min.css'
            ),
        );
    }

    /**
     * Implements hook "module.install.before"
     */
    public function hookModuleInstallBefore(&$result)
    {
        $library = $this->getLibrary()->get('jquery');

        if (version_compare($library['version'], '1.8.0', '<')) {
            $result = $this->getLanguage()->text('Jquery Mobile requires Jquery >= 1.8.0');
        }
    }

    /**
     * Implements hook "module.enable.after"
     */
    public function hookModuleEnableAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.disable.after"
     */
    public function hookModuleDisableAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.install.after"
     */
    public function hookModuleInstallAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.uninstall.after"
     */
    public function hookModuleUninstallAfter()
    {
        $this->getLibrary()->clearCache();
    }

}
