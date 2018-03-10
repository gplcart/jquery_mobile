[![Build Status](https://scrutinizer-ci.com/g/gplcart/jquery_mobile/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/jquery_mobile/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/jquery_mobile/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/jquery_mobile/?branch=master)

Jquery Mobile is a [GPL Cart](https://github.com/gplcart/gplcart) module that adds [Jquery Mobile](http://jquerymobile.com) library which can be used by other modules. Do not install unless your modules require it.

**Installation**

This module requires 3-d party library which should be downloaded separately. You have to use [Composer](https://getcomposer.org) to download all the dependencies.

1. From your web root directory: `composer require gplcart/jquery_mobile`. If the module was downloaded and placed into `system/modules` manually, run `composer update` to make sure that all 3-d party files are presented in the `vendor` directory.
2. Go to `admin/module/list` end enable the module