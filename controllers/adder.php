<?php
require_once '../models/newsModel.php';
require_once __DIR__ . '/../classes/View.php';

$view = new View;

$view->display('form_add');