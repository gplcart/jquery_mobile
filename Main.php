<?php

/**
 * @package Jquery Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\jquery_mobile;

use gplcart\core\Library,
    gplcart\core\Container;

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
            'name' => /* @text */'Jquery Mobile',
            'description' => /* @text */'A HTML5-based user interface system designed to make responsive web sites and apps that are accessible on all smartphone, tablet and desktop devices',
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
     * @param null|string
     */
    public function hookModuleInstallBefore(&$result)
    {
        $this->checkJqueryVersion($result);
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

    /**
     * Check Jquery version
     * @param mixed $result
     */
    protected function checkJqueryVersion(&$result)
    {
        $library = $this->library->get('jquery');
        if (version_compare($library['version'], '1.8.0', '<')) {
            $result = $this->getTranslationModel()->text('Jquery Mobile requires Jquery >= 1.8.0');
        }
    }

    /**
     * Translation UI model class instance
     * @return \gplcart\core\models\Translation
     */
    protected function getTranslationModel()
    {
        return Container::get('gplcart\\core\\models\\Translation');
    }

}
