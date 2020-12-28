<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  
use BotMan\BotMan\BotMan;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    //
     public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
  
            if ($message == 'hi') {
                $this->askName($botman);
            }
            elseif ($message == 'i have a complaint') {
                # code...
                 $this->askQuestion($botman);     
            }
            else{
                $botman->reply("write 'hi' for testing...");
            }
  
        });
        $botman->listen();
    }
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
        });
    }
    public function askQuestion($botman)
    {
        $botman->ask('How may i help you?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('OK i try to resolve your issue ');
        });
    }
}
