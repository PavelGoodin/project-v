<?php
namespace App\Http\Controllers;

//use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class YandexGptController extends Controller
{

static function getIamToken()
{

$response = Http::acceptJson()->post('https://iam.api.cloud.yandex.net/iam/v1/tokens',
[
    'yandexPassportOauthToken' => 'y0_AgAAAAABGrj-AATuwQAAAAEFbrfkAABbTBgoxPVPFKnuqPvF79X-H_RwVA',
]);

$response = json_decode($response->body());
$response->iamToken;
setcookie('iamToken', $response->iamToken, strtotime($response->expiresAt));

}

function sendMessage(Request $request)
{
    $promt_message = "Придумай миссию для своего ученика";
    //$promt_message = $request->promt_message;
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
                "text"=> "Ты, ментор!"
            ],  
            [
                "role"=> "user",
                "text"=> $promt_message
            ]
            ],
    ];


    $response = Http::acceptJson()->withToken($token)->post('https://llm.api.cloud.yandex.net/foundationModels/v1/completion', $body);

    $response = $response->body();

    $response = json_decode($response, true);

    dd($response);
    dd($response["error"]);
    dd($response["result"]["alternatives"][0]["message"]["text"]);


}


}