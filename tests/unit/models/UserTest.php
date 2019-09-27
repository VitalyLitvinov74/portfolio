<?php

namespace tests\unit\models;

use app\models\UserRecord;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = UserRecord::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(UserRecord::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = UserRecord::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(UserRecord::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = UserRecord::findByUsername('admin'));
        expect_not(UserRecord::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = UserRecord::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
