<?php
class LoginFormTest extends CTestCase
{
	public function testUserNameRequired()
	{
		$form = new LoginForm();
		$form->username = '';
		$form->password = 'test1';
		$form->rememberMe = true;
		$this->assertFalse($form->validate());
		$form->username = 'test1';
		$this->assertTrue($form->validate());
	}
}