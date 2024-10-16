<?php

use App\adms\Controllers\Services\PageController;

require 'vendor/autoload.php';

$url = new PageController;

$url->loadPage();