<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('register correctly and see new user in database');

$I->amOnPage("/pokemons");

$I->click("Register");

$I->seeInCurrentUrl("/register");

$username = "TestUser";
$favItem = "Aayla Secura";
$email = "user@test.com";
$password = "TestPass_11223344";
$password_confirmation = "TestPass_11223344";

$I->fillField("username", $username);
$I->fillField("favItem", $favItem);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", $password);

$I->dontSeeInDatabase("users", ["username" => $username, "favPokemon" => $favItem,"email" => $email]);

$I->click("Register");

$I->seeInDatabase('users', ['username' => $username, "favPokemon" => $favItem,"email" => $email]);
