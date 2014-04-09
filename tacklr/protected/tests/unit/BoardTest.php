<?php

class BoardTest extends CDbTestCase {

    public function testBoardBasics() {
        
        //Create a new Board
        $newBoard = new Board;
        $newBoardName = 'cool';
        $newBoard->setAttributes(
                array(
                    'boardTitle' => 'cool',
                )
        );
        $this->assertTrue($newBoard->save(false));

        //READ back the newly created Board
        $retrievedBoard = Board::model()->findByPk($newBoard->boardID);
        $this->assertTrue($retrievedBoard instanceof Board);
        $this->assertEquals($newBoardName, $retrievedBoard->boardTitle);

        //UPDATE the newly created Board
        $updatedBoardName = 'UpdatedTestBoard';
        $newBoard->boardTitle = $updatedBoardName;
        $this->assertTrue($newBoard->save(false));
        
        //read back the record again to ensure the update worked
        $updatedBoard = Board::model()->findByPk($newBoard->boardID);
        $this->assertTrue($updatedBoard instanceof Board);
        $this->assertEquals($updatedBoardName, $updatedBoard->boardTitle);
        
        //DELETE the Board
        $newBoardId = $newBoard->boardID;
        $this->assertTrue($newBoard->delete());
        $deletedBoard = Board::model()->findByPk($newBoardId);
        $this->assertEquals(NULL, $deletedBoard);
    }

}
