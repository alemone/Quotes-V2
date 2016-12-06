<?php
use Valitron\Validator;

class ErrorMessagesTest extends BaseTestCase
{
    public function testErrorMessageIncludesFieldName()
    {
        $v = new Validator(array());
        $v->rule('required', 'date');
        $v->validate();
        $this->assertSame(array("Name is required"), $v->errors('date'));
    }

    public function testAccurateErrorMessageParams()
    {
        $v = new Validator(array('num' => 5));
        $v->rule('min', 'num', 6);
        $v->validate();
        $this->assertSame(array("Num must be greater than 6"), $v->errors('num'));
    }

    public function testCustomErrorMessage()
    {
        $v = new Validator(array());
        $v->rule('required', 'date')->message('Name is required');
        $v->validate();
        $errors = $v->errors('date');
        $this->assertSame('Name is required', $errors[0]);
    }

    public function testCustomLabel()
    {
        $v = new Validator(array());
        $v->rule('required', 'date')->message('{field} is required')->label('Custom Name');
        $v->validate();
        $errors = $v->errors('date');
        $this->assertSame('Custom Name is required', $errors[0]);
    }

    public function testCustomLabels()
    {
        $messages = array(
            'date' => array('Name is required'),
            'email' => array('Email should be a valid email address')
        );

        $v = new Validator(array('date' => '', 'email' => '$'));
        $v->rule('required', 'date')->message('{field} is required');
        $v->rule('email', 'email')->message('{field} should be a valid email address');

        $v->labels(array(
            'date' => 'Name',
            'email' => 'Email'
        ));

        $v->validate();
        $errors = $v->errors();
        $this->assertEquals($messages, $errors);
    }
}

