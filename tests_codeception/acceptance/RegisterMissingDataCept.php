<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Check results for empty forms');

$I->amOnPage("/pokemons");

$I->click("Register");

$I->seeInCurrentUrl("/register");

$I->seeInField("username", "");
$I->seeInField("favItem", "");
$I->seeInField("email", "");
$I->seeInField("password", "");
$I->seeInField("password_confirmation", "");

$I->click("Register");
$I->seeInCurrentUrl("/register");

$I->see("Whoops! Something went wrong.");
$I->see("The username field is required.");
$I->see("The fav item field is required.");
$I->see("The email field is required.");
$I->see("The password field is required.");

$I->wantTo('Check if field values are remembered');

$username = "TestUser";
$I->fillField("username", $username);
$I->click("Register");
$I->seeInCurrentUrl("/register");

$I->see("Whoops! Something went wrong.");
$I->dontSee("The username field is required.");
$I->see("The fav item field is required.");
$I->see("The email field is required.");
$I->see("The password field is required.");
$I->seeInField("username", $username);

$I->wantTo('Check if email format is checked');

$favItem = "Aayla Secura";
$email = "wrong_email_format";
$password = "TestPass_11223344";
$password_confirmation = "TestPass_11223344";

$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password);

$I->click("Register");
$I->seeInCurrentUrl("/register");

$I->see("Whoops! Something went wrong.");
$I->dontSee("The username field is required.");
$I->dontSee("The fav item field is required.");
$I->dontSee("The email field is required.");
$I->dontSee("The password field is required.");
$I->see("The email must be a valid email address.");

$I->wantTo('Check if pokemon names are validated');

$email = "test@email.com";
$favItem = "Unknown";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password);

$I->click("Register");
$I->seeInCurrentUrl("/register");

$I->see("Whoops! Something went wrong.");
$I->dontSee("The username field is required.");
$I->dontSee("The fav item field is required.");
$I->dontSee("The email field is required.");
$I->dontSee("The password field is required.");
$I->dontSee("The email must be a valid email address.");
$I->see("No such Item!");
