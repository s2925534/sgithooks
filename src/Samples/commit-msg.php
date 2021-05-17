#!/usr/bin/env php
<?php

use SGitHooks\ComMsg;


require __DIR__ . '/../../vendor/autoload.php';

$hook = new ComMsg();

$hook->run();