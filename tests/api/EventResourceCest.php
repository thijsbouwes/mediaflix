<?php

use Codeception\Util\HttpCode;

class EventResourceCest
{
    const ENDPOINT = '/events';
    const MODEL = 'events';

    public function getAllEvents(ApiTester $I)
    {
        $eventOneId = $I->haveRecord(self::MODEL, ['name' => 'Christmas eve', 'price' => '15.45']);
        $eventTwoId = $I->haveRecord(self::MODEL, ['name' => 'Birthday party', 'price' => '30.33']);

        $I->sendGET(self::ENDPOINT);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('both items are in response');
        $I->seeResponseContainsJson(['id' => $eventOneId, 'name' => 'Christmas eve', 'price' => '15.45']);
        $I->seeResponseContainsJson(['id' => $eventTwoId, 'name' => 'Birthday party', 'price' => '30.33']);

        $I->expect('both items are in root array');
        $I->canSeeResponseIsJson([['id' => $eventOneId], ['id' => $eventTwoId]]);
    }

    public function getSingleEvent(ApiTester $I)
    {
        $eventOneId = $I->haveRecord(self::MODEL, ['name' => 'Christmas eve', 'price' => '15.45']);
        $I->sendGET(self::ENDPOINT."/{$eventOneId}");
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->canSeeResponseIsJson();

        $I->expect('item is present in response');
        $I->seeResponseContainsJson(['id' => $eventOneId, 'name' => 'Christmas eve', 'price' => '15.45']);
    }

    public function createEvent(ApiTester $I)
    {
        $I->sendPOST(self::ENDPOINT, json_encode([
            'name' => 'Christmas eve',
            'price' => '15.45'
        ]));
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseContainsJson();

        $I->expect('item is created and is available in response');
        $I->seeResponseContainsJson(['id' => 1, 'name' => 'Christmas eve', 'price' => '15.45']);
    }

    public function updateEvent(ApiTester $I)
    {
        $eventOneId = $I->haveRecord(self::MODEL, ['name' => 'Christmas eve', 'price' => '15.45']);
        $I->sendPATCH(self::ENDPOINT."/{$eventOneId}", json_encode([
            'name' => 'Birthday party',
            'price' => '30.33'
        ]));
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);

        $I->expect('item is updated');
        $I->seeRecord(self::MODEL, ['id' => 1, 'name' => 'Birthday party', 'price' => '30.33']);
    }

    public function deleteEvent(ApiTester $I)
    {
        $eventOneId = $I->haveRecord(self::MODEL, ['name' => 'Christmas eve', 'price' => '15.45']);
        $I->sendDELETE(self::ENDPOINT."/{$eventOneId}");

        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);
        $I->dontSeeRecord(self::MODEL, ['name' => 'Christmas eve', 'price' => '15.45']);
    }
}
