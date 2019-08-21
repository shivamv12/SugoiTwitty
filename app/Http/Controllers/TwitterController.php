<?php

namespace App\Http\Controllers;

require __DIR__ . '/../../../vendor/paralleldots/apis/autoload.php';
# Setting your API key
set_api_key("9lk4luN7Mv6R6r3w2gD5cUIzOSNug1AWEBUjRFSqfWs");


use Twitter;
use Paralleldots;

use Illuminate\Http\Request;

class TwitterController extends Controller
{

    public function getTweet() {
        $tweets = Twitter::getSearch(array('q' => $_GET['key'], 'count' => 5, 'format' => 'array'));
        $tweetsArr = array();
        $flag = 0;
        foreach($tweets['statuses'] as $data) {
            array_push($tweetsArr, $data['text']);
        }
        foreach($tweets['statuses'] as $data) {
            // $data = '{"sentiment":{"negative":0.198,"neutral":0.391,"positive":0.412}}';
            // Get Sentiments
            $data = sentiment($tweetsArr[$flag]);
            // Make object of that String
            $objData = json_decode($data);
            // Get inner object of sentiments
            $objSentim = $objData->sentiment;
            // Make an array of Sentiments Values
            $sentims = array($objSentim->negative, $objSentim->positive, $objSentim->neutral);
            // Get max between them
            $max = max($sentims);
            // Make an Array of Sentiments Object
            $myArray = json_decode(json_encode($objSentim), true);
            // Array Search to get Highest Magnitude Value.
            $finalSentiment = array_search($max, $myArray);

            $tweets['statuses'][$flag]['sentims'] = $finalSentiment;
            $flag++;
        }
        echo json_encode( $tweets['statuses'] );
    }
}
