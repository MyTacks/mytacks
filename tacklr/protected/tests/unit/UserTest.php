<?php

class UserTest extends CDbTestCase {

    public function testUserPassword() {
        
        //Create a new Board
        $newUser = new User;
        $newUserPassword = 'test5';
        $newUser->setAttributes(
                array(
                    'username' => 'test5',
                    'password' => 'test5',
                    'firstName' => 'test5',
                    'lastName' => 'test5',
                    'email' => 'cool@cool.com',
                    'updateDate' => '0000-00-00',
                )
        );
        $this->assertTrue($newUser->save(false));
        
        //READ back the newly created User's passoword
        $retrievedUser = User::model()->findByPk($newUser->userID);
        $this->assertTrue($retrievedUser instanceof User);
        $this->assertNotEquals($newUserPassword, $retrievedUser->password);
        
    }

}
