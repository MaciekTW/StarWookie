<?php

$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('make sure welcome page looks fine');

$I->amOnPage('/');

$I->seeCurrentUrlEquals('/');

$I->seeLink('Login', '/login');
$I->seeLink('As guest', '/wiki');

$I->see('Wookiepedia');
$I->seeInTitle('Wookiepedia');

$I->dontSee('Dashboard');
$I->dontSee('Random');
$I->dontSee('Wiki');
