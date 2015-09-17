<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test default route');

$I->amOnRoute('default', ['controller' => 'rest', 'action' => 'index']);
$I->seeCurrentRouteIs('default', ['controller' => 'rest', 'action' => 'index']);
