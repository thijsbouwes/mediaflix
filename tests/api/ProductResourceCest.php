<?php

use Codeception\Util\HttpCode;

class ProductResourceCest
{
    const ENDPOINT = '/products/';
    const MODEL = 'products';

    public function getAllProducts(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'Heineken', 'price' => '12.34']);
        $productTwoId = $I->haveRecord(self::MODEL, ['name' => 'Chips', 'price' => '2.22']);

        $I->sendGET(self::ENDPOINT);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('both items are in response');
        $I->seeResponseContainsJson(['id' => $productOneId, 'name' => 'Heineken', 'price' => '12.34']);
        $I->seeResponseContainsJson(['id' => $productTwoId, 'name' => 'Chips', 'price' => '2.22']);

        $I->expect('both items are in root array');
        $I->canSeeResponseIsJson([['id' => $productOneId], ['id' => $productTwoId]]);
    }

    public function getSingleProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'Heineken', 'price' => '12.34']);
        $I->sendGET(self::ENDPOINT.$productOneId);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('item is present in response');
        $I->seeResponseContainsJson(['id' => $productOneId, 'name' => 'Heineken', 'price' => '12.34']);
    }

    public function createProduct(ApiTester $I)
    {
        $I->sendPOST(self::ENDPOINT, json_encode([
            'name' => 'Heineken',
            'price' => '12.34'
        ]));
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseContainsJson();

        $I->expect('item is created and is available in response');
        $I->seeResponseContainsJson(['id' => 1, 'name' => 'Heineken', 'price' => '12.34']);
    }

    public function updateProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'Heineken', 'price' => '12.34']);
        $I->sendPATCH(self::ENDPOINT.$productOneId, json_encode([
            'name' => 'Chips',
            'price' => '2.22'
        ]));
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is updated');
        $I->seeRecord(self::MODEL, ['id' => 1, 'name' => 'Chips', 'price' => '2.22']);
    }

    public function deleteProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'Heineken', 'price' => '12.34']);
        $I->sendDELETE(self::ENDPOINT.$productOneId);

        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);
        $I->dontSeeRecord(self::MODEL, ['name' => 'Heineken', 'price' => '12.34']);
    }
}
