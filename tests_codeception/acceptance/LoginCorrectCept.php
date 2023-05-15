<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('login with correct user');

$I->amOnPage('/dashboard');

$I->seeCurrentUrlEquals('/login');
$I->seeInField("email", "");
$I->seeInField("password", "");
$I->seeLink('Forgot your password?', '/forgot-password');
$I->dontSeeCheckboxIsChecked('remember');

$I->fillField('email', 'maciek@gmail.com');
$I->fillField('password', 'TajneHaslo_112233');

$I->checkOption('remember');
$I->seeCheckboxIsChecked('remember');

$I->click('Log in');

$I->seeCurrentUrlEquals('/dashboard');
