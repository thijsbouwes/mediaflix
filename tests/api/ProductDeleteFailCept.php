<?php 
$I = new ApiTester($scenario);
$I->wantTo('fail deleting a non-existing product');

$I->sendDELETE('/products/100101');
$I->canSeeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Record not found']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND);
