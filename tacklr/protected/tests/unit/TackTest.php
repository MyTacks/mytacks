<?php

class TackTest extends CDbTestCase {

    public function testTackBasics() {
        
        //Create a new Board
        $newTack = new Tack;
        $newTackName = 'cool';
        $newTack->setAttributes(
                array(
                    'tackName' => 'cool',
                )
        );
        $this->assertTrue($newTack->save(false));
        
        //READ back the newly created Tack
        $retrievedTack = Tack::model()->findByPk($newTack->tackID);
        $this->assertTrue($retrievedTack instanceof Tack);
        $this->assertEquals($newTackName, $retrievedTack->tackName);
        
        //DELETE the Tack
        $newTackId = $newTack->tackID;
        $this->assertTrue($newTack->delete());
        $deletedTack = Tack::model()->findByPk($newTackId);
        $this->assertEquals(NULL, $deletedTack);
    }

}
