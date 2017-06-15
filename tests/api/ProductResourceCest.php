<?php

use Codeception\Util\HttpCode;

class ProductResourceCest
{
    protected const ENDPOINT = '/products';
    protected const MODEL = 'products';

    public function getAllProducts(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'xbox', 'cost' => '100.55']);
        $productTwoId = $I->haveRecord(self::MODEL, ['name' => 'playstation', 'cost' => '222.22']);

        $I->sendGET(self::ENDPOINT);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('both items are in response');
        $I->seeResponseContainsJson(['id' => $productOneId, 'name' => 'xbox', 'cost' => '100.55']);
        $I->seeResponseContainsJson(['id' => $productTwoId, 'name' => 'playstation', 'cost' => '222.22']);

        $I->expect('both items are in root array');
        $I->canSeeResponseIsJson([['id' => $productOneId], ['id' => $productTwoId]]);
    }

    public function getSingleProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'xbox', 'cost' => '100.55']);
        $I->sendGET(self::ENDPOINT."/{$productOneId}");
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('item is present in response');
        $I->seeResponseContainsJson(['id' => $productOneId, 'name' => 'xbox', 'cost' => '100.55']);
    }

    public function createProduct(ApiTester $I)
    {
        $I->sendPOST(self::ENDPOINT, json_encode([
            'name' => 'xbox',
            'cost' => '100.55'
        ]));
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseContainsJson();

        $I->expect('item is created and is available in response');
        $I->seeResponseContainsJson(['id' => 1, 'name' => 'xbox', 'cost' => '100.55']);
    }

    public function updateProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'xbox', 'cost' => '100.55']);
        $I->sendPATCH(self::ENDPOINT."/{$productOneId}", json_encode([
            'name' => 'playstation',
            'cost' => '222.22'
        ]));
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is updated');
        $I->seeRecord(self::MODEL, ['id' => 1, 'name' => 'playstation', 'cost' => '222.22']);
    }

    public function deleteProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord(self::MODEL, ['name' => 'xbox', 'cost' => '100.55']);
        $I->sendDELETE(self::ENDPOINT."/{$productOneId}");

        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);
        $I->dontSeeRecord(self::MODEL, ['name' => 'xbox', 'cost' => '100.55']);
    }
}
