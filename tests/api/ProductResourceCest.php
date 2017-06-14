<?php

use Codeception\Util\HttpCode;

class ProductResourceCest
{
    protected const ENDPOINT = '/products';

    public function getAllProducts(ApiTester $I)
    {
        $productOneId = $this->haveProduct($I, ['name' => 'xbox', 'cost' => '100.55']);
        $productTwoId = $this->haveProduct($I, ['name' => 'playstation', 'cost' => '222.22']);

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

    }

    public function createProduct(ApiTester $I)
    {

    }

    public function updateProduct(ApiTester $I)
    {

    }

    private function haveProduct(ApiTester $I, array $data = [])
    {
        $data = array_merge([
            'name' => 'Example product',
            'cost' => '100.55'
        ], $data);

        return $I->haveRecord('products', $data);
    }
}
