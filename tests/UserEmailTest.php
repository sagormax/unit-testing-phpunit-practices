<?php

use Code\Mailer;
use Code\User;

class UserEmailTest extends \PHPUnit\Framework\TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function testEmailFieldIsSet()
    {
        $this->user->setEmail('sagor.touch@gmail.com');

        $this->assertEquals('sagor.touch@gmail.com', $this->user->email);
    }

    public function testSendEmail()
    {
        $this->user = new User();
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('send')
            ->with($this->equalTo('sagor.touch@gmail.com'), $this->equalTo('Greetings'))
            ->willReturn(true);

        $this->user->setEmail('sagor.touch@gmail.com');

        $this->user->setMailer($mock_mailer);

        $mailer_response = $this->user->notify("Greetings");

        $this->assertTrue($mailer_response);
    }

    public function testExpectSendMailException()
    {
        $this->user = new User();

        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->setMethods(null)
                            ->getMock();

        $this->user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $this->user->notify("Hello");
    }
}