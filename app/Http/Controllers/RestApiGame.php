<?php

namespace App\Http\Controllers;

use App\Models\UserGame;
use App\Models\GameRoom;
use App\Models\Planet;
use App\Models\DicePlayer;
use App\Models\Chat;
use App\Models\GearAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Http\Request;

class RestApiGame extends Controller
{
        //
        public  function index() {

            return UserGame::all();
        }
        
        
       public  function getUsersRa(){
           
         $users = UserGame::all();
         $users = $users->sortByDesc('rating_arena');
            $result=[];
            $pos = 1;
            foreach($users as $user)  
            {
                $result["id-$pos"]   = $user->id;
                $result["nik_name-$pos"]   = $user->nik_name;
                $result["rating_arena-$pos"]   = $user->rating_arena;
                $result["ship_level-$pos"]   = $user->ship_level;
                $result["select_ship-$pos"]   = $user->select_ship;
                $result["status-$pos"]   = $user->status;
                //$result["planet-$pos"]   = $user->planets->name;

                $pos++;
            }  
           return $result;
       }

        public  function get_user_id(int $id) {

            return UserGame::find($id);
        }
        
        public function storeuser(Request $request)//создаем нового игрока
        {

            $player = new UserGame();
            $user_test = UserGame::where('device','=',$request->input('device'))->first();

            if(!isset($user_test)){
            $player->nik_name=$request->input('nik_name');
            $player->device=$request->input('device');
            $player->ship_rang=$request->input('ship_rang');
            $player->ship_level=$request->input('ship_level');
            $player->select_ship=$request->input('select_ship');
            $player->max_hp=$request->input('max_hp');
            $player->max_energy=$request->input('max_energy');
            $player->pr_krit=$request->input('pr_krit');

            $player->atk=$request->input('atk');
            $player->kub=$request->input('kub');
            $player->def=$request->input('def');

            $player->gear1_id=$request->input('gear1_id');
            $player->gear2_id=$request->input('gear2_id');
            $player->gear3_id=$request->input('gear3_id');
            $player->gear4_id=$request->input('gear4_id');
            $player->gear5_id=$request->input('gear5_id');
            $player->gear6_id=$request->input('gear6_id');

            $player->kub1_id=$request->input('kub1_id');
            $player->kub2_id=$request->input('kub2_id');
            $player->kub3_id=$request->input('kub3_id');
            $player->kub4_id=$request->input('kub4_id');
            $player->kub5_id=$request->input('kub5_id');

            $player->pl_shild=$request->input('pl_shild');
            $player->fire_dmg=$request->input('fire_dmg');
            $player->generator_shield=$request->input('generator_shield');
            $player->soln_panel=$request->input('soln_panel');
            $player->comment=$request->input('comment');
            $player->hide=$request->input('hide');
            
            $player->save();
            $player->where('device','=',$request->input('device'))->first();
            return['user_id'=>$player->id];
            }
            else
            {
            $user_test->update($request->all());
            return['user_id'=>$user_test->id];
            }


        }
        
            public function update(int $id, Request $request)
        {

            $player = new UserGame();
            $player = $player->find($id);
            $player->update($request->all());

        }
        
            public function sendDuel(int $id, Request $request)//Запрос на дуэль
        {

            $player = new UserGame();
            $player = $player->find($id);
            $player->update($request->all());

        }
        
            public function duelListener(int $id, Request $request)//Проверка запроса
        {

            $player = new UserGame();
            $player = $player->find($id);
            $result = ["enemy_id" => $player->enemy_id, "room_id"=>$player->room_id];
            return  $result;  //json_encode($result);

        }
        
            public function resetEnemyId(int $id)//сброс enemy_id=0
        {

            $player = new UserGame();
            $player = $player->find($id);
            $player->enemy_id = 0;
            $player->room_id = 0;
            
            $player->save();

        } 
        
            public function updateDevice(string $dev, Request $request)//обновить данные по номеру устройства
        {

            $player = UserGame::where('device',$dev)->first();
            $player->update($request->all());
            return $player->id;

        }
        
            public function updateNikName(string $dev, Request $request)
        {

            $player = UserGame::where('device',$dev)->first();
            $player->update($request->all());
            return $player->nik_name;

        }
        
        public function createRoom(Request $request)//создаем новую комнату
        {

            //dd($request);
            $room = new GameRoom();
            $room->master_id = $request->input('master_id');
            $room->master_hp = $request->input('master_hp');
            $room->master_shield = $request->input('master_shield');
            $room->master_dmg = $request->input('master_dmg');
            $room->master_energy = $request->input('master_energy');
            
            $room->quest_connected = $request->input('quest_connected');
            
            $room->quest_id = $request->input('quest_id');
            $room->quest_hp = $request->input('quest_hp');
            $room->quest_shield = $request->input('quest_shield');
            $room->quest_dmg = $request->input('quest_dmg');
            $room->quest_energy = $request->input('quest_energy');

            
            
            $room->first_xod = $request->input('first_xod');
            $room->n_xod = $request->input('n_xod');
            $room->comment = $request->input('comment');
            $room->hide = $request->input('hide');

            $room->save();
            
            return ['room_id'=>$room->id];


        }
        
            public function connectedListener(int $room_id, Request $request)//Проверка запроса
        {

            $room = new GameRoom();
            $room = $room->find($room_id);
            return ['quest_connected'=>$room->quest_connected];
            //return $room->quest_connected;

        }
              public function questConnect(int $room_id)// подключение гостя
        {

            $room = new GameRoom();
            $room = $room->find($room_id);
            $room->quest_connected = 1;
            $room->save();
            
        }
        
            public function infoPlanet(int $planet_id)//возвращает инфу о планете
        {

            $planet = new Planet();
            $planet = $planet->find($planet_id);
            $player = new UserGame();
            $kol_player = $player->where('planet_id',$planet_id)->count();
            $result = ['planet_id'=>$planet->id, 'name'=>$planet->name, 'planet_level'=>$planet->planet_level, 'max_ships'=>$planet->max_ships, 'energy'=>$planet->energy, 'max_energy'=>$planet->max_energy, 'population'=>$planet->population, 'ore_mining'=>$planet->ore_mining, 'kol_player'=> $kol_player, 'hide'=>$planet->hide];

            return $result;
            
        }
            public function sendMessage(Request $request )  //Отправка сообщения в чат
        {
             $chat = new Chat();   
             $chat->user_id = $request->user_id;
             $chat->planet_id = $request->planet_id;
             $chat->message = $request->message;
             $chat->save();
        }

            public function getMessage(int $planet_id)
        {
            $chat = new Chat();
            //Считываем кол-во сообщений
            $count = $chat->where('planet_id','=',$planet_id)->count();
            //Берем только последние 20
            $chat = $chat   ->where('planet_id', '=', $planet_id)
                            ->where('id', '>', $count-20)
                            ->get();
            $result=[];
            
            $pos=1;
            foreach($chat as $ch)  
            {
                $result["nik-$pos"]   = $ch->usergame->nik_name;
                $result["mes-$pos"]   = $ch->message;
                $pos++;
            } 
            
            return $result;
        }
           public function kolMessages($planet_id) 
        {
            $chat = new Chat();
            $result = $chat->where('planet_id','=',$planet_id)->count();
            
            return $result;
        }
        
        
            public function updatePlanet(int $planet_id, Request $request)//обновляет данные на планете
        {

            $planet = new Planet();
            $planet = $planet->find($planet_id);

            $planet->update($request->all());
            
        }
        public function updateGameRoom(int $room_id, Request $request)//обновляет данные об онлайн игре

        {

            $room = new GameRoom();
            $room = $room->find($room_id);

            $room->update($request->all());
            
        }

        public function readGameRoom(int $room_id)//возвращает инфу об игровой комнате
        {

            $room = new GameRoom();
            $room = $room->find($room_id);

            $result = ['master_id'=>$room->master_id, 'master_hp'=>$room->master_hp, 'master_shield'=>$room->master_shield, 'master_dmg'=>$room->master_dmg, 'master_energy'=>$room->master_energy, 'master_atk'=>$room->master_atk, 'master_kub'=>$room->master_kub, 'quest_connected'=>$room->quest_connected, 'quest_id'=>$room->quest_id, 'quest_hp'=>$room->quest_hp, 'quest_shield'=> $room->quest_shield, 'quest_dmg'=>$room->quest_dmg, 'quest_energy'=>$room->quest_energy, 'quest_atk'=>$room->quest_atk, 'quest_kub'=>$room->quest_kub, 'first_xod'=>$room->first_xod, 'n_xod'=>$room->n_xod, 'comment'=>$room->comment, 'hide'=>$room->hide];

            return $result;
            
        }
    //Создать кубик игроку    
        public function createDiceUser(int $user_id)
        {
            for($i=1; $i<31; $i++){
                
            $dice = new DicePlayer();
            $dice->user_id=$user_id;
            $dice->position=$i;
            $dice->k=1;
            $dice->visible=0;
            $dice->exclusive=0;
            $dice->pos_x=0;
            $dice->pos_y=0;
            $dice->stun=0;
            $dice->fire=0;
            $dice->shock=0;
            $dice->temp=0;
            $dice->obj_id=0;
            $dice->save();
            
            }

        }

        //Прочитать кубики игрока
        public function readDicesUser(int $user_id,int $enemy_kol_dice, Request $request)
        {

            $dices = new DicePlayer();
            $dices = $dices   ->where('user_id', '=', $user_id)
                            //->where('position', '=', $position)
                            ->get();
            $result=[];
            $pos = 1;
            foreach($dices as $dice)  
            {
                $result["k-$pos"]   = $dice->k;
                $result["exclusive-$pos"]   = $dice->exclusive;
                $result["stun-$pos"]   = $dice->stun;
                $result["fire-$pos"]   = $dice->fire;
                $result["shock-$pos"]   = $dice->shock;
                //$result["temp-$pos"]   = $dice->temp;
                //$result[]
                $pos++;
                if($pos>$enemy_kol_dice)break;
            }              
            //$result = ['user_id'=>$dice->user_id, 'position'=>$dice->position, 'k'=>$dice->k, 'visible'=>$dice->visible, 'exclusive'=>$dice->exclusive, 'pos_x'=>$dice->pos_x, 'pos_y'=>$dice->pos_y, 'stun'=>$dice->stun, 'temp'=> $dice->temp, 'obj_id'=>$dice->obj_id];
            
            return $result;
            
            

        }
        //Установить кубик
        public function setDiceUser(int $user_id, int $position, Request $request)
        {

            $dice = new DicePlayer();
            $dice = $dice   ->where('user_id', '=', $user_id)
                            ->where('position', '=', $position)
                            ->first();
            $dice->k = $request->input('k');
            $dice->visible=$request->input('visible');
            $dice->exclusive=$request->input('exclusive');
            $dice->pos_x=$request->input('pos_x');
            $dice->pos_y=$request->input('pos_y');
            $dice->stun=$request->input('stun');
            $dice->fire=$request->input('fire');
            $dice->shock=$request->input('shock');
            $dice->temp=$request->input('temp');
            $dice->obj_id=$request->input('obj_id');
            

            $dice->save();

        }
        
        //Прочитать кубик
        public function getDiceUser(int $user_id, int $position)
        {

            $dice = new DicePlayer();
            $dice = $dice   ->where('user_id', '=', $user_id)
                            ->where('position', '=', $position)
                            ->first();
            
            $result = ['user_id'=>$dice->user_id, 'position'=>$dice->position, 'k'=>$dice->k, 'visible'=>$dice->visible, 'exclusive'=>$dice->exclusive, 'pos_x'=>$dice->pos_x, 'pos_y'=>$dice->pos_y, 'stun'=>$dice->stun, 'fire'=>$dice->fire, 'shock'=>$dice->shock, 'temp'=> $dice->temp, 'obj_id'=>$dice->obj_id];

            return $result;
        }
        
        //Логи действий
        public function addGearActionLog(int $user_id, int $num_action, Request $request)
        {

            $action = new GearAction();
            $action->user_id = $user_id;
            $action->num_action = $num_action;
            $action->gear_id = $request->input('gear_id');
            $action->dice_position = $request->input('dice_position');
            $action->gear_position = $request->input('gear_position');
            $action->n_xod = $request->input('n_xod');
            $action->dmg_enemy = $request->input('dmg_enemy');
            $action->crit = $request->input('crit');
            $action->dmg_player = $request->input('dmg_player');
            $action->bonus_dmg = $request->input('bonus_dmg');
            $action->dodge_enemy = $request->input('dodge_enemy');
            $action->heel = $request->input('heel');
            $action->shield = $request->input('shield');

            $action->korr = $request->input('korr');
            $action->atk_temp = $request->input('atk_temp');
            $action->fire_dices = $request->input('fire_dices');
            $action->stun_dices = $request->input('stun_dices');
            $action->freze = $request->input('freze');
            $action->start_games_id = $request->input('start_games_id');
            $action->read_action = $request->input('read_action');
            $action->last = $request->input('last');

            $action->save();

        }
        
        public function readAction(int $num_action,int $num_xod, int $user_id, int $start_games_id)//считываем действие игрока
        {

            $action = new GearAction();
            
            $action = $action->where('start_games_id','=', $start_games_id)
                            ->where('num_action','=', $num_action)
                            ->where('n_xod','=', $num_xod)
                            ->where('user_id','=', $user_id)
                            ->first();
                            
            if(isset($action))
            {
                $action->read_action=1;
                $action->save();
            $result = ['num_action'=>$action->num_action, 'user_id'=>$action->user_id, 'gear_id'=>$action->gear_id, 'dice_position'=>$action->dice_position,'gear_position'=>$action->gear_position, 'n_xod'=>$action->n_xod, 'dmg_enemy'=>$action->dmg_enemy, 'crit'=>$action->crit, 'dmg_player'=>$action->dmg_player, 'bonus_dmg'=>$action->bonus_dmg, 'dodge_enemy'=>$action->dodge_enemy, 'heel'=>$action->heel, 'shield'=> $action->shield, 'korr'=>$action->korr, 'atk_temp'=>$action->atk_temp, 'fire_dices'=>$action->fire_dices, 'stun_dices'=>$action->stun_dices, 'freze'=>$action->freze,'read_action'=>$action->read_action, 'last'=>$action->last];
            }
            else
            {
            $result = ['num_action' => 0];//нет запроса по таким параметрам
            }
            return $result;
            
        }
        
                public function postSecretKey(Request $request)//привязка секретного ключа
        {

            $player = new UserGame();
            $user_web = new User();
            $user_web = $user_web->where('secret_key', '=', $request->secret_key)->first();
            if(isset($user_web))// если такой пользователь существует
            {
                $player = $player->where('device', '=', $request->device)->first();
                $player->user_web_id = $user_web->id;
                $player->save();
                return ['user_web_id'=> $user_web->id, 'secret_key'=> 1];//успешно привязали
            }
            else
            {
                return ['secret_key'=> 0];//не было пользователя с таким ключом
            }

        }
        
            public function karmaUpdate(Request $request)//Обновление баланса кармы
        {

            $player = new UserGame();
            $user_web = new User();
            $player = $player->find($request->id);
            if($player->user_web_id > 0)
            {
                $user_web = $player->user->first();
                if(isset($user_web))// если такой пользователь существует
                {
                    $player->user->karma = $request->karma;
                    $player->user->save();
                    return ['karma_update'=> 1];//успешно обновили
                }
                else
                {
                  return ['karma_update'=> 0];  
                }
            }
            else
            {
                 return ['karma_update'=> 0];
            }
            

        }
        
             public function karmaGet(Request $request)//Запрос баланса кармы
        {

            $player = new UserGame();
            $user_web = new User();
            $player = $player->find($request->id);
            if($player->user_web_id > 0)
            {
                $user_web = $player->user->first();
                if(isset($user_web))// если такой пользователь существует
                {
                    return ['user_web_id'=>$user_web->id, 'karma'=> $player->user->karma];//показываем баланс
                }
                else
                {
                  return ['user_web_id'=> 0];  
                }
            }
            else
            {
                 return ['user_web_id'=> 0];
            }
            

        }

}
