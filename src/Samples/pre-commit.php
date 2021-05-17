#!/usr/bin/env php
<?php

use SGitHooks\PreCom;


require __DIR__ . '/../../vendor/autoload.php';

$hook = new PreCom();

$hook->run();