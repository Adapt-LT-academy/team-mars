<?php

namespace App\Service;
use App\Traits\ContainerAwareConversationTrait;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Service\OptionsService;

/**
 * Class ShoeOrderConversation
 */
class PizzaOrderConversation extends Conversation
{
    use ContainerAwareConversationTrait;

    protected $firstname;
    protected $type;
    protected $color;
    protected $size;
    protected $price1=99.99;
    protected $price2=199.99;
    protected $price3=46.99;

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
                Button::create('42')->value('42'),
                Button::create('41')->value('41'),
                Button::create('40')->value('40'),
                Button::create('39')->value('39'),
                Button::create('38')->value('38'),
                Button::create('37')->value('37'),
                Button::create('36')->value('36'),
                Button::create('None of the above')->value('None of the above'),
            ]
        );
        $this->ask(
            $question,
            function ($answer) {
                $this->size = $answer->getText();
                if ($this->size=='None of the above') {
                    $this->say("Im sorry but we dont have bigger/smaller sizes at the moment. Sorry for the inconvenience.");
                }
                else if ($this->type=='Sports') {
                    $this->say("Thats all i need!");
                    $this->say('<img src="https://c.static-nike.com/a/images/t_PDP_1280_v1/f_auto/ms8jq491fqaacieyslpx/odyssey-react-mens-running-shoe-ODEY0A.jpg" style="width: 100%;">'
                        . 'Type: ' . $this->type . "</br>" . 'Color: ' . $this->color . "</br>" . 'Size: ' . $this->size . "</br>" . 'Price: ' . $this->price1);
                }
                else if ($this->type=='Classic') {
                $this->say("Thats all i need!");
                $this->say('<img src="data:image/jpeg;base64,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" style="width: 100%;">'
                    . 'Type: ' . $this->type . "</br>" . 'Color: ' . $this->color . "</br>" . 'Size: ' . $this->size . "</br>" . 'Price: ' . $this->price2);
                }
                else if ($this->type=='High heels') {
                    $this->say("Thats all i need!");
                    $this->say('<img src="https://i1.adis.ws/i/boohooamplience/dzz40331_tomato_xl?$product_image_category_page$" style="width: 100%;">'
                        . 'Type: ' . $this->type . "</br>" . 'Color: ' . $this->color . "</br>" . 'Size: ' . $this->size . "</br>" . 'Price: ' . $this->price3);
                }

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