<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  
use BotMan\BotMan\BotMan;

use BotMan\BotMan\Messages\Incoming\Answer;

use BotMan\BotMan\Messages\Outgoing\Question;

use BotMan\BotMan\Messages\Outgoing\Actions\Button;

use BotMan\BotMan\Messages\Conversations\Conversation;

use BotMan\BotMan\Messages\Attachments\File;

class BotManController extends Controller
{
    //

     public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            
            if ($message == 'hi') {
                $this->askName($botman);
                // $this->askForOrder($botman);
            }
            elseif ($message == 'i have a complaint') {
                # code...
                $botman->reply("Thanks For Contacting Us...");

            }
            else{
                 $question = Question::create('Way To Create Order Selcet Gievn Below...')
                ->fallback('Unable to create a new database')
                ->callbackId('create_Order')
                ->addButtons([
                    Button::create('Product Category')->value('Yes'),
                    Button::create('Return')->value('no'),
                ]);

            $botman->ask($question, function (Answer $answer) {
        // Detect if button was clicked:
        if ($answer->isInteractiveMessageReply()) {
            $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
            $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
           if( $selectedValue == 'Yes')
           {
                 
                 $question = Question::create('Please Select Category Given Below...')
                    ->fallback('Unable to create a new database')
                    ->callbackId('create_database')
                    ->addButtons([
                        Button::create('Traditional Food')->value('Traditional'),
                        Button::create('Fast Food')->value('Fast'),
                        Button::create('Juices')->value('Juices'),
                    ]);

                $this->ask($question, function (Answer $answer) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                        $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
                    }
                            if( $selectedValue == 'Traditional')
                                 {
                                   $this->say('Select Product Category  and then select Traditional from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Fast')
                                 {
                                   $this->say('Select Product Category  and then select Fast from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Juices')
                                 {
                                   $this->say('Select Product Category  and then select Juices from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                    
                });
           }
           if($selectedValue == 'no'){
                $this->say("Hope It Helped You...");
                $this->say("Thanks For Contacting Us...");
           }

        }
    });
                   // $this->xyz($botman);
                // $botman->reply("Thanks For Contacting Us...");
            }  
        });
        $botman->listen();
    }
    public function askName($botman)
    {
        
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name);
            $this->say("How We help You...");
            $question = Question::create('Please Select Category Given Below...')->addButtons([
            Button::create('Product Category')->value('Yes'),
            Button::create('Return')->value('no'),
        ]);
            $this->ask($question, function (Answer $answer) {
        // Detect if button was clicked:
        if ($answer->isInteractiveMessageReply()) {
            $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
            $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
            if( $selectedValue == 'Yes')
           {
                 
                 $question = Question::create('Please Select Category Given Below...')
                    ->fallback('Unable to create a new database')
                    ->callbackId('create_database')
                    ->addButtons([
                        Button::create('Traditional Food')->value('Traditional'),
                        Button::create('Fast Food')->value('Fast'),
                        Button::create('Juices')->value('Juices'),
                    ]);

                $this->ask($question, function (Answer $answer) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                        $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
                            if( $selectedValue == 'Traditional')
                                 {
                                   $this->say('Select Product Category  and then select Traditional from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Fast')
                                 {
                                   $this->say('Select Product Category  and then select Fast from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Juices')
                                 {
                                   $this->say('Select Product Category  and then select Juices from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                    }
                     
                    
                });
           }
           if($selectedValue == 'no'){
                $this->say("Hope It Helped You...");
                $this->say("Thanks For Contacting Us...");
           }
        }
    });

        });

    }
    
    public function xyz ($botman)
    {
        $botman->ask('Traditional food Or Fast FOOD', [
        [
            'pattern' => 'Traditional|traditional',
            'callback' => function () {
                $this->say('Select Product Category  and then select Traditional from drop down  and order foods');
                $this->say("Thanks For Contacting Us...");
            }
        ],
        [
            'pattern' => 'Fast|fast',
            'callback' => function () {
                $this->url('/usercategory');
                $this->say("Thanks For Contacting Us...");
            }
        ]
    ]);
    }
    public function askForOrder($botman)
    {
    $question = Question::create('Way To Create Order Selcet Gievn Below...')
        ->fallback('Unable to create a new database')
        ->callbackId('create_Order')
        ->addButtons([
            Button::create('Product Category')->value('Yes'),
            Button::create('Return')->value('no'),
        ]);

    $botman->ask($question, function (Answer $answer) {
        // Detect if button was clicked:
        if ($answer->isInteractiveMessageReply()) {
            $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
            $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
           if( $selectedValue == 'Yes')
           {
                 
                 $question = Question::create('Please Select Category Given Below...')
                    ->fallback('Unable to create a new database')
                    ->callbackId('create_database')
                    ->addButtons([
                        Button::create('Traditional Food')->value('Traditional'),
                        Button::create('Fast Food')->value('Fast'),
                        Button::create('Juices')->value('Juices'),
                    ]);

                $this->ask($question, function (Answer $answer) {
                    // Detect if button was clicked:
                    if ($answer->isInteractiveMessageReply()) {
                        $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                        $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
                            if( $selectedValue == 'Traditional')
                                 {
                                   $this->say('Select Product Category  and then select Traditional from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Fast')
                                 {
                                   $this->say('Select Product Category  and then select Fast from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                            if( $selectedValue == 'Juices')
                                 {
                                   $this->say('Select Product Category  and then select Juices from drop down  and order foods');
                                    $this->say("Thanks For Contacting Us...");
                                 }
                    }
                     
                    
                });
           }
           if($selectedValue == 'no'){
                $this->say("Hope It Helped You...");
                $this->say("Thanks For Contacting Us...");
           }

        }
    });
    }

}
