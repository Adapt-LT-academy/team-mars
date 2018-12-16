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
    protected $type;
    protected $color;
    protected $size;
    protected $price=390;

    public function run()
    {
        $this->ask(
            'Hello! What is your name?',
            function ($answer) {
            // Save result
            $this->firstname = $answer->getText();
            //$this->say('Hello! All I need is some information. '.$this->firstname);
            $this->askToShow();
            }
        );
    }
    public function askToShow()
    {
        $question = Question::create('Would you like some shoes, '.$this->firstname);
        $question->addButtons(
            [
                Button::create('Yes')->value('Yes'),
                Button::create('No')->value('No'),
            ]
        );
        $this->ask(
            $question,
            function ($answer)  {
                if ($answer->getText()==='Yes'){
                    $this->askType();
                }
                else{
                    $this->say("Well, goodbye then, I guess");
                }
            }
        );
    }
    public function askType()
    {
        $question = Question::create('What shoe type would you preffer');

        $question->addButtons(
            [
                Button::create('Classic')->value('Classic'),
                Button::create('Sport')->value('Sport'),
                Button::create('High heels')->value('High heels'),
            ]
        );

        $this->ask(
            $question,
            function ($answer) {
                $this->type = $answer->getText();
                $this->askColor();

            }
        );
    }
    public function askColor()
    {
        $question = Question::create('What shoe color would you like');

        $question->addButtons(
            [
                Button::create('Red')->value('Red'),
                Button::create('Blue')->value('Blue'),
                Button::create('Black')->value('Black'),
            ]
        );
        $this->ask(
            $question,
            function ($answer) {
                $this->color = $answer->getText();
                $this->askSize();

            }
        );
    }
    public function askSize()
    {
        $question = Question::create('What shoe size do you wear');

        $question->addButtons(
            [
                Button::create('40')->value('40'),
                Button::create('42')->value('42'),
                Button::create('39')->value('39'),
            ]
        );
        $this->ask(
            $question,
            function ($answer) {
                $this->size = $answer->getText();
                $this->say("Thats all i need!");
                $this->say('<img src="https://c.static-nike.com/a/images/t_PDP_1280_v1/f_auto/ms8jq491fqaacieyslpx/odyssey-react-mens-running-shoe-ODEY0A.jpg" style="width: 100%;">'
                    .'Type: '.$this->type."</br>".'Color: '.$this->color."</br>".'Size: '.$this->size."</br>".'Price: '.$this->price);

            }
        );
    }
    public function stopConversation(IncomingMessage $message)
    {
        if($message->getMessage() === 'No'){
            return true;
        }
    }
}