<?php

namespace App\Http\Controllers;

use App\Models\Product;
class ProductController extends Controller
{
    //
    
    public function create_product()
    {
        $productsArr = array([
        'title' => 'Вязаный плюшевый заяц - ручная работа',
        'description'  => 'Вязаный кролик, связан из плюшевой пряжи. Ручная работа. Возможны другие цвета. Очень мягкий на ощупь. Рост 27см, с ушами -45см.',
        'foto' => 'https://59.img.avito.st/image/1/1.unHLeLaxFpj9z5SVs0qwKFXbFpx32Rya.q6vSgWKOJWZmjkUOQtuZRvNOMGQ-ztUvXCTGAnzpRGg',
        'category' => 1,
        'size' => 27,
        'bgcolor' => 'white',
        'trade_price' => 2000,
        'retail_price' => 2400,
        'discount' => 50,
        'hide' => 0
        ],
        [
            'title' => 'Чехол кожанный (ручная работа)',
            'description'  => 'Чехол для телефона,выполнен из натуральной кожи растительного дубления. Скроен и сшит вручную. Возможно нанесение рисунка, пишите обо всем договоримся.',
            'foto' => 'https://cs5.livemaster.ru/storage/0a/3a/4749c31d186284e86c8fe49a8410.jpg',
            'category' => 2,
            'size' => 80,
            'bgcolor' => 'black-brown',
            'trade_price' => 1000,
            'retail_price' => 1500,
            'discount' => 0,
            'hide' => 0
        ],
        [
            'title' => 'Часы мужские - Герб СССР',
            'description'  => 'Часы наручные мужские - СССР. В часах качественный Японский механизм. Ремешок часов натуральная кожа, ручная работа.',
            'foto' => 'https://cs5.livemaster.ru/storage/b1/b7/c62e9593c60d0ff1ffe58ad042zg.jpg',
            'category' => 5,
            'size' => 10,
            'bgcolor' => 'red',
            'trade_price' => 3200,
            'retail_price' => 3800,
            'discount' => 50,
            'hide' => 0
        ],
        [
            'title' => 'Винтажные наручные часы Vitruvian',
            'description'  => 'Наручные часы на широком браслете из натуральной кожи тёмно коричневого цвета с витрувианским человеком.Механизм наручных часов заключён в гранёный корпус с золотистым покрытием ( IPG - Ion Platinum Gold) и прозрачным циферблатом, в котором видно вращение всех шестерёнок.',
            'foto' => 'https://cs2.livemaster.ru/storage/6b/5d/f8a6b3b03f1ff65f069361acfamk.jpg',
            'category' => 5,
            'size' => 45,
            'bgcolor' => 'gold',
            'trade_price' => 3900,
            'retail_price' => 4500,
            'discount' => 0,
            'hide' => 0
        ],
        [
            'title' => 'Наручные черные часы Tiny, классические',
            'description'  => 'Наручные механические часы Tiny - это строгость и стиль. Прозрачные механические часы с резным циферблатом на монолитном кожаном ремне черного цвета.
            Часы механические, работают не от батарейки, а от ручного завода. Благодаря прозрачному циферблату, вы можете наблюдать рождение каждой секунды, видны все маленькие шестеренки.
            Ремешок сделан из натуральной кожи черного цвета, очень мягкой и приятной для руки. Черная классика. Офис, прогулка, торжественный вечер - этот аксессуар для важных событий вашей жизни.',
            'foto' => 'https://cs5.livemaster.ru/storage/55/22/abfd8d8944532c5b4ec18810e2fs.jpg',
            'category' => 5,
            'size' => 50,
            'bgcolor' => 'black',
            'trade_price' => 3500,
            'retail_price' => 3900,
            'discount' => 0,
            'hide' => 0
        ],
        [
            'title' => 'Настольная игра - Виконты западного королевства',
            'description'  => 'Настольная игра "Виконты западного королевства" переносит игроков в 980-й год.
            Выбрав мир вместо процветания, некогда сильный король пошёл на вынужденные меры – чтобы усмирить врагов, он стал предлагать им золото и земли. Впоследствии, как и следовало ожидать, подобное решение вопроса и временный "мир" привели к всеобщему упадку, и, как следствие, росту бедности. Именно поэтому многие потеряли веру в то, что король способен вести людей за собой, и всерьёз задумались над тем, чтобы обрести независимость от короны. К счастью, не всё ещё потеряно, ведь есть последняя надежда – виконты, им наверняка под силу вернуть былое процветание и мир в королевство.',
            'foto' => 'https://hobbygames.cdnvideo.ru/image/cache/hobbygames_beta/data/Lavka_Games/Vikonty_Zapadnogo_Korolevstva/HG/Vikonti-1024x1024-wm.jpg',
            'category' => 6,
            'size' => 50,
            'bgcolor' => 'black',
            'trade_price' => 3000,
            'retail_price' => 3250,
            'discount' => 0,
            'hide' => 0
        ]);
        
        //dd($productsArr);
        
        foreach($productsArr as $product)
        {
            Product::create($product);
        }

        


    }

    public function GetTitle()
    {
        $products = Product::where('hide',1)->get();
        return $products;

    }

    public  function index() {

        
        
        $products = Product::all();

        return view('products',compact('products'));
    }
}
