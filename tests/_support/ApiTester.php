<?php

use Codeception\Util\HttpCode;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

    public function authenticateUser()
    {
        $this->haveRecord('users', [
            'name' => 'Sapiens',
            'email' => 'test@example.org',
            'password' => bcrypt('12345678')
        ]);
        $clientId =$this->haveRecord('oauth_clients', [
            'user_id' => 1,
            'name' => 'Dummy Client One',
            'secret' => '12345678',
            'redirect' => 'http://www.example.org/redirect',
            'personal_access_client' => 1,
            'password_client' => 1,
            'revoked' => 0,
        ]);

        $this->sendPost('/oauth/token',
            json_encode([
                'grant_type' => 'password',
                'client_id' => $clientId,
                'client_secret' => '12345678',
                'username' => 'test@example.org',
                'password' => '12345678',
                'scope' => '',
            ])
        );
        $this->seeResponseCodeIs(HttpCode::OK);
        $this->seeResponseContainsJson();
        $this->seeResponseContainsJson(['token_type' => 'Bearer']);

        $response = json_decode($this->grabResponse(), true);
        $this->amBearerAuthenticated($response['access_token']);
    }
}
