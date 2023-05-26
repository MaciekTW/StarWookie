<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('check if taken username and email can be user in register');

$I->amOnPage("/register");

$username = "TestUser";
$favItem = "Aayla Secura";
$email = "user@test.com";
$password = "TestPass_11223344";
$password_confirmation = "TestPass_11223344";

$I->haveInDatabase('users', array('username' => $username, 'favItem' => $favItem, 'email' => $email,
    'password' => $password, 'image' => "test.jpg", 'customAvatar' => false));

$I->wantTo('check if taken username can be used');

$I->fillField("username", $username);
$I->fillField("favItem", "Aayla Secura");
$I->fillField("email", "new@email.com");
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => "new@email.com"]);

$I->see("Whoops! Something went wrong.");
$I->DontSee("The username field is required.");
$I->see("The username has already been taken.");

$I->wantTo('check if taken email can be used');

$I->fillField("username", "NewUsername");
$I->fillField("favItem", "Aayla Secura");
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => "NewUsername", 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->DontSee("The username has already been taken.");
$I->DontSee("The email field is required.");
$I->see("The email has already been taken.");

