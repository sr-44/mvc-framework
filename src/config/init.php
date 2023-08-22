<?php

const DEBUG = true;
define("ROOT", dirname(__DIR__));
const WWW = ROOT . '/public_html';
const APP = ROOT . '/app';
const CORE = ROOT . '/vendor/framework';
const HELPERS = ROOT . '/vendor/framework/helpers';
const CACHE = ROOT . '/tmp/cache';
const LOGS = ROOT . '/tmp/logs';
const CONFIG = ROOT . '/config';
const LAYOUT = 'example';
const PATH = 'http://mvc.loc';
const ADMIN = PATH . '/admin';
const NO_IMAGES = 'uploads/no_image.png';

require_once ROOT . '/vendor/autoload.php';

require_once HELPERS . '/functions.php';