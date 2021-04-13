<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow'); // akcja/Ĺ›cieĹĽka domyĹ›lna
getRouter()->setLoginRoute('login'); // akcja/Ĺ›cieĹĽka na potrzeby logowania (przekierowanie, gdy nie ma dostÄ™pu)

getRouter()->addRoute('calcShow',    'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('login',       'LoginCtrl');
getRouter()->addRoute('logout',      'LoginCtrl', ['user','admin']);

getRouter()->go();
