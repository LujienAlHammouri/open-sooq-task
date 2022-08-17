<?php

namespace app\controllers;

use app\models\City;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class CityController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        //Creating The object for City
        $city = Yii::$app->request->post('City');
        $city = new City($city);

        $client = new Client;


        try {
            $response = $client->request('GET','https://api.openweathermap.org/data/2.5/weather',[
                'query' => [
                    'q' => $city->country_name,
                    'appid' => 'a3c7ad49ec98427252d217166a51f39a',
                    'units' => 'imperial',
                ],
            ]);

            //get the date from Weather API
            $city_weather = json_decode($response->getBody(),true);

            $city->country_name = $city_weather['name'];
            $city->wind = $city_weather['wind'];
            $city->temp = $city_weather['main']['temp'];
            $city->weather = $city_weather['weather'];
            $city->pressure = $city_weather['main']['pressure'];


            //fill the needed data to the object
            return $this->render('index', [
                'city' => $city,
            ]);

        }
        catch (RequestException $e) {
            if ($e->hasResponse()) {
                $content = json_decode($e->getResponse()->getBody()->getContents(),1);
                $message = $content['message'];
                return $this->render('error', [
                    'message' => $message,
                ]);
            }
        }

        return '';

    }

    public function actionSearch()
    {
        $model = new City();
        return $this->render('search', [
            'model' => $model,
        ]);
    }

}