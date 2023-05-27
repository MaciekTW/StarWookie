<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('login with empty form');

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');
$I->dontSee('Whoops! Something went wrong.');
$I->click('Log in');

$I->seeCurrentUrlEquals('/login');
$I->see('Whoops! Something went wrong.');
$I->see('The email field is required.');
$I->see("The password field is required.");

$I->wantTo('login with wrong email style');

$I->fillField('email', 'name');
$I->fillField('password', 'secret');
$I->click('Log in');

$I->seeCurrentUrlEquals('/login');
$I->see('Whoops! Something went wrong.');
$I->see('The email must be a valid email address.');

$I->wantTo('login with unregistered user');

$I->fillField('email', 'name@gmail.com');
$I->fillField('password', 'secret');

$I->click('Log in');

$I->seeCurrentUrlEquals('/login');
$I->see('Whoops! Something went wrong.');
$I->see('These credentials do not match our records.');
