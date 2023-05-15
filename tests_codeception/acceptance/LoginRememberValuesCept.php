<?php
$I = new AcceptanceTester($scenario ?? null);

$I->amGoingTo("refresh page and see that old values have disappeared");

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');
$I->dontSee('Whoops! Something went wrong.');

$I->fillField('email', 'maciek@gmail.com');
$I->click('Log in');

$I->seeCurrentUrlEquals('/login');
$I->see('Whoops! Something went wrong.');
$I->dontSee('The email field is required.');
$I->see("The password field is required.");

$I->amOnPage('/login');
$I->dontSee("Whoops! Something went wrong.");
$I->dontSee("The email field is required.");
$I->dontSee("The password field is required.");
$I->seeInField("email", "");
$I->seeInField("password", "");

$I->amGoingTo("make sure password is not remembered");

$I->amOnPage('/login');
$I->seeCurrentUrlEquals('/login');
$I->dontSee("Whoops! Something went wrong.");
$I->dontSee("The email field is required.");
$I->dontSee("The password field is required.");

$I->fillField('email', 'maciek@gmail.com');
$I->fillField('password', 'secret');
$I->click('Log in');

$I->see("Whoops! Something went wrong.");
$I->dontSee("The email field is required.");
$I->dontSee("The password field is required.");
$I->see("These credentials do not match our records.");
$I->dontSeeInField("email", "");
$I->seeInField("password", "");

$I->amGoingTo("login with previously remembered email");

$I->seeCurrentUrlEquals('/login');
$I->fillField('password', 'TajneHaslo_112233');
$I->click('Log in');
$I->dontSee("Whoops! Something went wrong.");
$I->dontSee("The email field is required.");
$I->seeCurrentUrlEquals('/dashboard');
