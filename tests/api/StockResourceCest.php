<?php

use Codeception\Util\HttpCode;

class StockResourceCest
{
    const ENDPOINT = '/products/';
    const MODEL = 'stocks';

    public function getAllStock(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $stockOneId = $I->haveRecord(self::MODEL, ['product_id' => $productOneId, 'quantity' => 10]);

        $I->sendGET(self::ENDPOINT.$productOneId.'/stocks/');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('items are in response');
        $I->seeResponseContainsJson(['id' => $stockOneId, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function getSingleStock(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $stockOneId = $I->haveRecord(self::MODEL, ['product_id' => $productOneId, 'quantity' => 10]);

        $I->sendGET(self::ENDPOINT.'stocks/'.$stockOneId);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('item is present in response');
        $I->seeResponseContainsJson(['id' => $stockOneId, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function createStock(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);

        $I->sendPOST(self::ENDPOINT.$productOneId.'/stocks', json_encode([
            'quantity' => 10
        ]));
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseContainsJson();

        $I->expect('item is created and is available in response');
        $I->seeResponseContainsJson(['id' => 1, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function updateStock(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $stockOneId = $I->haveRecord(self::MODEL, ['product_id' => $productOneId, 'quantity' => 10]);

        $I->sendPATCH(self::ENDPOINT.'stocks/'.$stockOneId, json_encode([
            'quantity' => 20
        ]));
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is updated');
        $I->seeRecord(self::MODEL, ['id' => 1, 'product_id' => $productOneId, 'quantity' => 20]);
    }

    public function deleteStock(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $stockOneId = $I->haveRecord(self::MODEL, ['product_id' => $productOneId, 'quantity' => 10]);
        $I->sendDELETE(self::ENDPOINT.'stocks/'.$stockOneId);

        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is deleted');
        $I->dontSeeRecord(self::MODEL, ['id' => 1, 'product_id' => $productOneId, 'quantity' => 10]);
    }
}
