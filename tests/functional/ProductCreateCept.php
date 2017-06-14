<?php 
$I = new FunctionalTester($scenario);

$I->am('An api user');
$I->wantTo('create a new product');

$I->sendPOST('/products', json_encode([
        'name' => 'Example product',
        'cost' => '100.55'
    ])
);
$I->canSeeResponseIsJson();
$I->seeResponseContainsJson(['name' => 'Example product']);
$I->seeResponseContainsJson(['cost' => '100.55']);
$I->seeResponseContainsJson(['id' => '1']);
$I->seeResponseCodeIs(201);

$I->sendGET('/products/1');
$I->canSeeResponseIsJson();
$I->seeResponseContainsJson(['name' => 'Example product']);
$I->seeResponseContainsJson(['cost' => '100.55']);
$I->seeResponseContainsJson(['id' => '1']);
$I->seeResponseCodeIs(200);

$I->seeRecord('products', ['name' => 'Example product', 'cost' => '100.55', 'id' => '1']);
