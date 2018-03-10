<?php

/**
 * @package Jquery Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\jquery_mobile;

use gplcart\core\Library;

/**
 * Main class for Jquery Mobile module
 */
class Main
{

    /**
     * Library class instance
     * @var \gplcart\core\Library $library
     */
    protected $library;

    /**
     * @param Library $library
     */
    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['jquery_mobile'] = array(
            'name' => 'Jquery Mobile', // @text
            'description' => 'A HTML5-based user interface system designed to make responsive web sites and apps that are accessible on all smartphone, tablet and desktop devices', // @text
            'type' => 'asset',
            'module' => 'jquery_mobile',
            'url' => 'http://jquerymobile.com',
            'download' => 'http://jquerymobile.com/resources/download/jquery.mobile-1.4.5.zip',
            'version' => '1.4.5',
            'files' => array(
                'jquery.mobile-1.4.5.min.js',
                'jquery.mobile-1.4.5.min.css'
            ),
        );
    }

    /**
     * Implements hook "module.install.before"
     * @param null|string
     */
    public function hookModuleInstallBefore(&$result)
    {
        $library = $this->library->get('jquery');

        if (empty($library['version']) || version_compare($library['version'], '1.8.0', '<')) {
            $result = gplcart_text('Jquery Mobile requires Jquery >= 1.8.0');
        }
    }

    /**
     * Implements hook "module.enable.after"
     */
    public function hookModuleEnableAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.disable.after"
     */
    public function hookModuleDisableAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.install.after"
     */
    public function hookModuleInstallAfter()
    {
        $this->library->clearCache();
    }

    /**
     * Implements hook "module.uninstall.after"
     */
    public function hookModuleUninstallAfter()
    {
        $this->library->clearCache();
    }

}
