<?php

use Codeception\Util\HttpCode;

class ExpenseResourceCest
{
    const ENDPOINT = '/events/';
    const MODEL = 'expenses';

    public function getAllExpenses(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $eventOneId = $I->haveRecord('events', ['name' => 'Birthday party', 'price' => '30.33']);
        $expenseOneId = $I->haveRecord(self::MODEL, ['event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 10]);

        $I->sendGET(self::ENDPOINT.$eventOneId.'/expenses');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('items are in response');
        $I->seeResponseContainsJson(['id' => $expenseOneId, 'event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function getSingleProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $eventOneId = $I->haveRecord('events', ['name' => 'Birthday party', 'price' => '30.33']);
        $expenseOneId = $I->haveRecord(self::MODEL, ['event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 10]);

        $I->sendGET(self::ENDPOINT.'expenses/'.$expenseOneId);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('item is present in response');
        $I->seeResponseContainsJson(['id' => $expenseOneId, 'event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function createExpense(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $eventOneId = $I->haveRecord('events', ['name' => 'Birthday party', 'price' => '30.33']);

        $I->sendPOST(self::ENDPOINT.$eventOneId.'/expenses', json_encode([
            'product_id' => $productOneId,
            'quantity' => 10
        ]));
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseContainsJson();

        $I->expect('item is created and is available in response');
        $I->seeResponseContainsJson(['id' => 1, 'event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 10]);
    }

    public function updateProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $productTwoId = $I->haveRecord('products', ['name' => 'Chips', 'price' => '2.22']);
        $eventOneId = $I->haveRecord('events', ['name' => 'Birthday party', 'price' => '30.33']);
        $expenseOneId = $I->haveRecord(self::MODEL, ['event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 20]);

        $I->sendPATCH(self::ENDPOINT.'expenses/'.$expenseOneId, json_encode([
            'product_id' => $productTwoId,
            'quantity' => 10
        ]));
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is updated');
        $I->seeRecord(self::MODEL, ['id' => 1, 'event_id' => $eventOneId, 'product_id' => $productTwoId, 'quantity' => 10]);
    }

    public function deleteProduct(ApiTester $I)
    {
        $productOneId = $I->haveRecord('products', ['name' => 'Heineken', 'price' => '12.34']);
        $eventOneId = $I->haveRecord('events', ['name' => 'Birthday party', 'price' => '30.33']);
        $expenseOneId = $I->haveRecord(self::MODEL, ['event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 20]);
        $I->sendDELETE(self::ENDPOINT.'expenses/'.$expenseOneId);

        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);
        $I->dontSeeRecord(self::MODEL, ['id' => 1, 'event_id' => $eventOneId, 'product_id' => $productOneId, 'quantity' => 20]);
    }

}
