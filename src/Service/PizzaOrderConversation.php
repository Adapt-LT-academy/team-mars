<?php

namespace App\Service;
use App\Traits\ContainerAwareConversationTrait;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Service\OptionsService;

/**
 * Class PizzaOrderConversation
 */
class PizzaOrderConversation extends Conversation
{
    use ContainerAwareConversationTrait;

    protected $firstname;
    protected $size;

    public function run()
    {
        $this->ask(
            'Hello! What is your first name?',
            function ($answer) {
            // Save result
            $this->firstname = $answer->getText();
            $this->say('Nice to meet you '.$this->firstname);
            $this->askSize();
            }
        );
    }

    public function askSize()
    {
        $question = Question::create('What Pizza size do you want?');

        $question->addButtons(
            [
                Button::create('Huge')->value('Huge'),
                Button::create('Medium')->value('Medium'),
                Button::create('Small')->value('Small'),
            ]
        );

        $this->ask(
            $question,
            function ($answer) {
                $this->size = $answer->getText();
                $this->say('Okay. That is all I need.');
                $this->say('Size: '.$this->size);
            }
        );
    }
}