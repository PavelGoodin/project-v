<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Jobs\ShowImageJob;
use App\Models\GoodImage;

class AIBotController extends Controller
{
    public  function start() {

        //$user = User::find(1);
        $user = Auth::user();
        $seed = 5;
        $result="----";
        $placeholder=$this->RandomPlaceHolder();
        YandexGptController::getIamToken();
        return view('aibot',compact('result','placeholder','seed'));
    }
    
    public  function startGenImage() {

        $user = Auth::user();
        $seed = random_int(1,1000);
        $path_img = "resources/user_good_images/simple.png";
        $result="----";
        $placeholder=$this->RandomPlaceHolderImg();
        YandexGptController::getIamToken();
        return view('aigenimg',compact('result','placeholder','seed','path_img'));
    }

    function RandomPlaceHolder()
    {
    $i = random_int(1,11);
    switch  ($i)
    {
        case 1: $result = "Придумай анекдот про Чебурашку и Гену"; break;
        case 2: $result = "Каково население нашей планеты?"; break;
        case 3: $result = "Придумай историю про древних аборигенов";break;
        case 4: $result = "Что будет если засунуть яйцо в микроволновку?"; break;
        case 5: $result = "Как размножаются медузы?"; break;
        case 6: $result = "Придумай название моему Ютуб каналу на тему настольных игр!";break;
        case 7: $result = "Расскажи последнии достижения в генной инжинерии"; break;
        case 8: $result = "Придумай математическую загадку"; break;
        case 9: $result = "Придумай романтическую историю про Машу и Мишу"; break;
        case 10: $result = "Будь моим наставником! Разработай мне план тренировок для сжигания веса!"; break;
        case 11: $result = "Напиши 10 необычных хобби для молодого человека"; break;
    }
        
    return $result;
    }
    
        function RandomPlaceHolderImg()
    {
    $i = random_int(1,11);
    switch  ($i)
    {
        case 1: $result = "Нарисуй Чебурашку и Гену"; break;
        case 2: $result = "Красивые узоры в черно-белом стиле"; break;
        case 3: $result = "Нарисуй древних аборигенов";break;
        case 4: $result = "Красивая девушка в стиле аниме"; break;
        case 5: $result = "Медузы под водой танцуют танец"; break;
        case 6: $result = "Нарисуй молекулу";break;
        case 7: $result = "Иконку для моей игры 64х64"; break;
        case 8: $result = "Нарисуй красивый пейзаж с березами"; break;
        case 9: $result = "Нарисуй романтическую историю про Машу и Мишу"; break;
        case 10: $result = "Логотип для спортивного клуба"; break;
        case 11: $result = "Спрайт космического корабля для игры без фона"; break;
    }
        
    return $result;
    }
    
//    
public function speechKit($token,$text,$seed)
{
    //$token = '<IAM-токен>'; # Укажите IAM-токен.
    $folderId = "b1ga4vvk6ebp4eegn877"; # Укажите идентификатор каталога.

    $url = "https://tts.api.cloud.yandex.net/speech/v1/tts:synthesize";
    $headers = ['Authorization: Bearer ' . $token];
    $post = array(
        'text' => $text,
        'folderId' => $folderId,
        'lang' => 'ru-RU',
        'voice' => 'marina',
        );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    if ($post !== false) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        print "Error: " . curl_error($ch);
    }
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
         $decodedResponse = json_decode($response, true);
            echo "Error code: " . $decodedResponse["error_code"] . "\r\n";
            echo "Error message: " . $decodedResponse["error_message"] . "\r\n";
    } else {
        file_put_contents("resources/audio/speech".$seed.".mp3", $response);
    }
        curl_close($ch);
        
    }
    
   //отправка запроса на генерацию картинки 
    function sendPromtGenImage(Request $request)
    {
        $imageID="";
        $seed = $request->input("seed");
        if($seed==""){$seed = random_int(1,1000);}
        $user = Auth::user();
        $placeholder = $request->input("placeholder");
        $promt_message = $request->input("promt_message");
        if($promt_message=="")$promt_message = $placeholder;
        $token = $_COOKIE['iamToken'];
        $body =         
        [
            "modelUri" => "art://b1ga4vvk6ebp4eegn877/yandex-art/latest",
            "generationOptions" => [
                "seed"  => $seed,
                "aspectRatio" => [
                        "widthRatio"    => "1",
                        "heightRatio"   => "1",
                        ],
            ],
    
            "messages"  => [
                    [
                    "weight"=> "1",
                    "text"=> $promt_message,
                    ],
                
                ],
        ];
    
    if($user->karma > 0)
    {
        $response = Http::acceptJson()->withToken($token)->post('https://llm.api.cloud.yandex.net/foundationModels/v1/imageGenerationAsync', $body);
    
        $response = $response->body();
    
        $response = json_decode($response, true);
        
        
        if(isset($response["error"]))
        {
        $result = $response["error"]["message"];
        }
        else
        {
        $result = $response["id"];
        $imageID = $response["id"];
        $safeName = 'simple_'.time().'.'.'png';
        
        GoodImage::create([
        'promt'  => $promt_message,
        'imageID' => $imageID,    
        'foto' => 'resources/user_good_images/'.$safeName,
        'seed' => $seed,
        'user_id' => $user->id,
        
        ]);
        }
       $user->karma = $user->karma-1;
       $user->save();
    }
    else
    {
        $result = "Дорогой друг! У тебя закончилась карма! Приходи как накопишь!";
    }
    
    
    //$placeholder = $this->RandomPlaceHolderImg();
    sleep(10);
    $response = Http::withToken($token)->get('https://llm.api.cloud.yandex.net:443/operations/'.$imageID);
    $response = json_decode($response, true);
    
        if(isset($response["error"]))
        {
        $result = $response["error"]["message"];
        }
        else
        {
    $b64 = $response["response"]["image"];
    $file = base64_decode($b64);
    $path_img = "resources/user_good_images/".$safeName;
    file_put_contents($path_img, $file);
    
        }
        
        return view('aigenimg',compact('placeholder','seed','path_img'));


    }
    
    function getImage($imageID)
    {
        
       $response = Http::withToken($token)->get('https://llm.api.cloud.yandex.net:443/operations/'.$imageID); 
    
       
        
    dd( $response);
        
        
        
    }
    
    
    
//Отправить запрос в чат GPT
    function sendPromt(Request $request)
    {
        $seed = random_int(1,100);
        
        //$promt_message = "Придумай миссию для своего ученика";
        $user = Auth::user();
        $placeholder = $request->input("placeholder");
        $promt_message = $request->input("promt_message");
        if($promt_message=="")$promt_message = $placeholder;
        $token = $_COOKIE['iamToken'];
        $body =         
        [
            "modelUri"=> "gpt://b1g7gu4jfe6hch3jf058/yandexgpt-lite/latest",
            "completionOptions"=> [
            "stream"=> false,
            "temperature"=> 0.6,
            "maxTokens"=> "2000"
            ],
    
            "messages"=> [
                [
                    "role"=> "system",
                    "text"=> "Ты, хороший писатель"
                ],  
                [
                    "role"=> "user",
                    "text"=> $promt_message
                ]
                ],
        ];
    
    if($user->karma > 0)
    {
        $response = Http::acceptJson()->withToken($token)->post('https://llm.api.cloud.yandex.net/foundationModels/v1/completion', $body);
    
        $response = $response->body();
    
        $response = json_decode($response, true);

        if(isset($response["error"]))
        {
        $result = $response["error"]["message"];
        }
        else
        {
        $result = $response["result"]["alternatives"][0]["message"]["text"];
        AIBotController::speechKit($_COOKIE['iamToken'], $result, $seed);
        }
       $user->karma = $user->karma-1;
       $user->save();
    }
    else
    {
        $result = "Дорогой друг! У тебя закончилась карма! Приходи как накопишь!";
    }
    $placeholder = $this->RandomPlaceHolder();
        return view('aibot',compact('result','placeholder','seed'));
    }

}