<?php 
$I = new ApiTester($scenario);
$I->wantTo('delete a product via API');

$I->sendPOST('/products', json_encode([
        'name' => 'Example product',
        'cost' => '100.55'
    ])
);

$I->sendDELETE('/products/1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::NO_CONTENT);
