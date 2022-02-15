<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\User;
use Illuminate\Http\Request;

class cardsController extends Controller
{



    public function updateCards(){
        $shuffledCards = [
            '10Clubs',
            '10Diamonds',
            '10Hearts',
            '10Spades',
            '2Clubs',
            '2Diamonds',
            '2Hearts',
            '2Spades',
            '3Clubs',
            '3Diamonds',
            '3Hearts',
            '3Spades',
            '4Clubs',
            '4Diamonds',
            '4Hearts',
            '4Spades',
            '5Clubs',
            '5Diamonds',
            '5Hearts',
            '5Spades',
            '6Clubs',
            '6Diamonds',
            '6Hearts',
            '6Spades',
            '7Clubs',
            '7Diamonds',
            '7Hearts',
            '7Spades',
            '8Clubs',
            '8Diamonds',
            '8Hearts',
            '8Spades',
            '9Clubs',
            '9Diamonds',
            '9Hearts',
            '9Spades',
            'AClubs',
            'ADiamonds',
            'AHearts',
            'ASpades',
            'JClubs',
            'JDiamonds',
            'JHearts',
            'JSpades',
            'KClubs',
            'KDiamonds',
            'KHearts',
            'KSpades',
            'QClubs',
            'QDiamonds',
            'QHearts',
            'QSpades',
        ];

        shuffle($shuffledCards);

        $onCard = 0;

        $users = User::all();





        foreach (User::where('currentlyPlaying', '1')->cursor() as $user) {
            $user->card1 = $shuffledCards[$onCard];
            $onCard++;
            $user->card2 = $shuffledCards[$onCard];
            $onCard++;
            $user->save();

        }

        $cardsTable = Cards::find(1);

        $cardsTable->tableCard1 = $shuffledCards[$onCard];
        $onCard++;
        $cardsTable->tableCard2 = $shuffledCards[$onCard];
        $onCard++;
        $cardsTable->tableCard3 = $shuffledCards[$onCard];
        $onCard++;
        $cardsTable->tableCard4 = $shuffledCards[$onCard];
        $onCard++;
        $cardsTable->tableCard5 = $shuffledCards[$onCard];
        $cardsTable->currently_on = 'preGame';



        $cardsTable->save();


        event(new \App\Events\MessageNotification('this is a test message'));
        return view('adminView', compact('cardsTable', 'users'));

    }

    public function currentPlayers(){
        $users = User::all();

        return view('currentPlayers', compact('users'));
    }

    public function updateCurrentPlayers(Request $request){
        $users = User::all();

        $currentPlayers = $request->input('name');

        foreach ($users as $user){
            $user->currentlyPlaying = '0';

            $user->save();
        }


        foreach ($currentPlayers as $player){

            $thisPlayer = User::find($player);

            $thisPlayer->currentlyPlaying = '1';

            $thisPlayer->save();

        }

        $users = User::all();

        return view('currentPlayers', compact('users'));
    }

    public function playerView(){
        $cardsTable = Cards::find(1);

        $currentState = $cardsTable->currently_on;

        $highestBet = User::orderBy('currentBet', 'DESC')->where('currentlyPlaying', '=', 1)->first();

        $users = User::orderBy('id', 'ASC')->where('currentlyPlaying', '=', 1)->cursor();

        if ($currentState == 'preGame') {
            return view('preGame', compact('cardsTable', 'highestBet', 'users'));
        }

        if ($currentState == 'flop') {

            return view('flop', compact('cardsTable', 'highestBet', 'users'));

        }

        if ($currentState == 'turn') {
            return view('turn', compact('cardsTable', 'highestBet', 'users'));
        }

        if ($currentState == 'river') {
            return view('river', compact('cardsTable', 'highestBet', 'users'));
        }

    }

    public function adminView(){
        $cardsTable = Cards::find(1);

        $highestBet = User::orderBy('currentBet', 'DESC')->where('currentlyPlaying', '=', 1)->first();





        $users = User::orderBy('id', 'ASC')->where('currentlyPlaying', '=', 1)->cursor();





        return view('adminView',  compact('cardsTable', 'users', 'highestBet'));
    }

    public function preGame(){
        $cardsTable = Cards::find(1);

        $users = User::all();

        $cardsTable->currently_on = 'preGame';

        $cardsTable->save();

        event(new \App\Events\MessageNotification('this is a test message'));

        return view('adminView',  compact('cardsTable', 'users'));

    }

    public function flop(){
        $cardsTable = Cards::find(1);

        $users = User::all();

        $cardsTable->currently_on = 'flop';

        $cardsTable->save();

        event(new \App\Events\MessageNotification('this is a test message'));
        return view('adminView',  compact('cardsTable', 'users'));

    }

    public function turn(){
        $cardsTable = Cards::find(1);

        $users = User::all();

        $cardsTable->currently_on = 'turn';

        $cardsTable->save();

        event(new \App\Events\MessageNotification('this is a test message'));

        return view('adminView',  compact('cardsTable', 'users'));

    }

    public function river(){
        $cardsTable = Cards::find(1);

        $users = User::all();

        $cardsTable->currently_on = 'river';

        $cardsTable->save();

        event(new \App\Events\MessageNotification('this is a test message'));


        return view('adminView',  compact('cardsTable', 'users'));

    }

    public function betting(Request $request){
        $inzet = $request->input('inzet');
        $id = auth()->user()->id;


        $user = User::find($id);

        $user->currentBet = $inzet;

        $user->save();

        event(new \App\Events\MessageNotification('this is a test message'));
        return $this->playerView();



    }

    public function call(){


        $id = auth()->user()->id;

        $highestBet = User::orderBy('currentBet', 'DESC')->where('currentlyPlaying', '=', 1)->first();

        $user = User::find($id);

        $user->currentBet = $highestBet->currentBet;

        $user->save();

        event(new \App\Events\MessageNotification('this is a test message'));
        return $this->playerView();


    }

    public function transferToWinner(Request $request){
        $winnerId = $request->input('id');



        $winner = User::find($winnerId);
        $users = User::orderBy('id', 'ASC')->where('currentlyPlaying', '=', 1)->cursor();
        $winnerCredits = $winner->credits;
        foreach ($users as $user) {

            if ($user->id == $winner->id) {
                continue;
            } else {
                $winnerCredits = $winnerCredits + $user->currentBet;

                $user->credits = $user->credits - $user->currentBet;

                $user->currentBet = 0;

                $user->save();
            }

        }


        $winner->credits = $winnerCredits;
        $winner->currentBet = 0;
        $winner->save();


        event(new \App\Events\MessageNotification('this is a test message'));
        return $this->playerView();


    }



}
