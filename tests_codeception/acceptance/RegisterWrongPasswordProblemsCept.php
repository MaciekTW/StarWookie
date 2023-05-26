<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('check wrong password cases');

$I->amOnPage("/register");

$username = "TestUser";
$favItem = "Aayla Secura";
$email = "user@test.com";

$I->wantTo('check case where password doesnt equal password confirmation');

$password = "TestPass_11223344";
$password_confirmation = "WrongPassword";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->see("The password confirmation does not match.");

$I->wantTo('check case where password is too short');

$password = "Te_12";
$password_confirmation = "Te_12";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->DontSee("The password confirmation does not match.");
$I->see("The password must be at least 6 characters.");



$I->wantTo('check case where password has not uppercase letters');

$password = "test_123";
$password_confirmation = "test_123";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->DontSee("The password must be at least 6 characters.");
$I->see("The password must contain at least one uppercase and one lowercase letter.");



$I->wantTo('check case where password has no lowercase letters');

$password = "TEST_123";
$password_confirmation = "TEST_123";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->see("The password must contain at least one uppercase and one lowercase letter.");

$I->wantTo('check case where password has no special characters');

$password = "Test123";
$password_confirmation = "Test123";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->DontSee("The password must contain at least one uppercase and one lowercase letter.");
$I->see("The password must contain at least one symbol.");



$I->wantTo('check case where password has no numbers');

$password = "TestPass_";
$password_confirmation = "TestPass_";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->dontSee("The password must contain at least one symbol.");
$I->see("The password must contain at least one number.");




$I->wantTo('check case where password can be easily compromised');

$password = "Password_123";
$password_confirmation = "Password_123";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password_confirmation);

$I->click("Register");
$I->seeInCurrentUrl("/register");
$I->dontSeeInDatabase('users', ['username' => $username, 'email' => $email]);

$I->see("Whoops! Something went wrong.");
$I->dontSee("The password must contain at least one number.");
$I->see("The given password has appeared in a data leak. Please choose a different password.");
