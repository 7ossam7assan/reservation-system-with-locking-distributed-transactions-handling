<?php
use Dotenv\Dotenv;
use Check24\Support\config;
require_once __DIR__ . '/../src/Support/helpers.php';
require_once base_path() . 'vendor/autoload.php';
require_once base_path().'routes/web.php';
//require_once base_path().'database/db.php';

$env = Dotenv::createImmutable(base_path());

$env->load();

app()->run();
//dump(class_baseName(\App\Models\User::all()));
//dump(\Check24\Database\Grammers\MySQLGrammer::buildDeleteQuery());
//dump(\Check24\Database\Grammers\MySQLGrammer::buildInsertQuery([
//    'username','password','email'
//]));
//dump(\Check24\Database\Grammers\MySQLGrammer::buildSelectQuery([
//    'username','password','email'
//], ['username','=','sayed']));
//dump(\Check24\Database\Grammers\MySQLGrammer::buildUpdateQuery([
//    'username','password','email'
//]));
//dump(app()->db->raw("SELECT * FROM users"));
//dump(\Check24\Support\Arr::has(['db'=>['connection'=>['default'=>'mysql']]],'default'));
//dump(\Check24\Support\Arr::last(['one','two','three'],function ($item , $key){
//    return (strlen($item) >= 3);
//}));
$arr = [
    'db'=>[
        'connections'=>[
            'default'=>'mysql'
        ]
    ]
];
//dump($arr);
//(\Check24\Support\Arr::forget($arr,'db.connections.default'));
//dump($arr);

//dump(\Check24\Support\Arr::flatten([[1],[2],[[3]],[[[[[4]]]]]],3));

$array = ['db' => ['connection' => ['default' => 'mysql','secondary'=>'sqlite'] ] ];
//var_dump(\Check24\Support\Arr::get($array,'db.connection'));

//(\Check24\Support\Arr::set($array , 'db.connection.secondary','mongo'));
//var_dump($array);
//dump(\Check24\Support\Arr::unset($array , 'db.connection.secondary'));

//$config = new config($arr);

//var_dump($config->get('db.connections'));


//dump(config_path());
//var_dump(app()->config);

//dump(config(['Database.default'=>'mmmm']));
//dump(config());

//dump(\Check24\Support\Hash::password(123));

//dump(\Check24\Support\Hash::verify('123',\Check24\Support\Hash::password(123)));

//dump(\Check24\Support\Hash::make('token'));

//$validator = new \Check24\Validation\Validator();
//$validator->setRules([
//    'username'=>'required|alnum',
//    'email'=>'required|email'
//]);
//$validator->make([
//    'username'=> '',
//    'email'=>'sayed@yahoo.com'
//]);

//$validator->setRules([
//    'username'=>[new \Check24\Validation\Rules\RequiredRule()]
//]);
//$validator->make([
//    'username'=> '',
//]);

//$validator->setRules([
//    'username'=>['required','alnum']
////    'username'=>[new \Check24\Validation\Rules\RequiredRule(),new \Check24\Validation\Rules\AlphaNumericalRule()]
//]);
//$validator->make([
//    'username'=> '',
//]);

//$validator->setRules([
////    'username'=>'required|between:3,20',
////    'email' => 'required|email|between:10,64',
//    'password' =>  'required|between:2,64|confirmed',
//    'password_confirmation' =>  'required',
//]);
//
//$validator->setAliases([
//    'username'=>'user'
//]);
//$validator->make([
////    'username'=> 'sayed@yahoo.com',
////    'email'=>'eng.sayed151@yahoo.com',
//    'password'=> 'abc',
//    'password_confirmation'=>'abcd'
//]);
//dump($validator->errors());
//dump($validator->passess());

//\App\Models\User::create([
//   'username'=>'sayed mohamed',
//   'email'=>'eng.sayed151@gmail.com',
//   'password'=>bcrypt(123)
//]);

//\App\Models\User::update(2,[
//    'username'=>'mohamed'
//]);

//\App\Models\User::delete(2);
//dump(\App\Models\User::all());
//dump(\App\Models\User::where(['id','>=',1]));

//dump(app()->session);
//app()->session->setFlash('errors',['username'=>['empty']]);
//dump(app()->session->getFlash('errors'));