<?php
namespace App\Helpers;

use App\Models\Colour;
use App\Models\Size;

class Helper
{
    /* public static function shout(string $string)
    {
        return strtoupper($string);
    } */

    public static function cmTofeet($inch){
       //Convert the cm into inches by multiplying the figure by 0.393701
        //$inches = round($cm * 0.393701);
        $inches = $inch;
        //Get the feet by dividing the inches by 12.
        $feet = intval($inch / 12);
        //Then, get the remainder of that division.
        $inches = $inches % 12;
        //If there is no remainder, then it's an even figure
        if($inches == 0){
            return $feet ."'";
        }
        //Otherwise, return it in ft and inches.
        return sprintf('%d'."'".'%d'.'"', $feet, $inches);
        //return $feet."'".$inches.'"'; 
    }

    public static function kgToLb ($val) {
        return (int)($val * 2.20462);
    }

    public static function getColoursByAttr($type=''){
        if($type){
            return Colour::where($type,1)->get(['id','name']);
        }
    }

    public static function getColoursById($id=''){
        if($id){
            return Colour::where('id',$id)->first();
        }
    }    


    public static function getSizeByAttr($type=''){
        if($type){
            return Size::where($type,1)->orderBy('size','ASC')->get(['id','size']);
        }
    }

    public static function getSizeById($id=''){
        if($id){
            return Size::where('id',$id)->first();
        }
    }

    public static function categoryTypeArray(){
        //return $array = ['models','actors','child-model-and-actor'];
        return $array = ['models'];
    }

    public static function shoeSizeArr(){
        $shoeSizeArr = [
            '4','4.5','5','5.5','6','6.5','7','7.5','8','8.5','9','9.5','10','10.5','11','11.5','12','12.5','13','13.5'
        ];
        return $shoeSizeArr;
    }

    public static function experienceArr(){
        $exceprienceArr = [
            '1'=>'No Experience',
            '2'=>'Some Experience',
            '3'=>'Experienced',
            '4'=>'Very Experienced',
            '5'=>'Advanced',
        ];
        return $exceprienceArr;
    }
    public static function compensationArr(){
        $compensationArr = [
            '1'=>'Paid Assignment Only',
            '2'=>'TFP',
        ];
        return $compensationArr;
    }

    public static function interestedArr(){
        $interestedArr = [
            '1'=>'Acting',
            '2'=>'Dance',
            '3'=>'Fashion',
            '4'=>'Fitness',
        ];
        return $interestedArr;
    }

    public static function acceptedJobTypeArr(){
        return [
            '1'=>'Acting',
            '2'=>'Dance',
            '3'=>'Fashion',
            '4'=>'Fitness',
        ];
    }
    public static function languageArr(){
        return [
            '1'=>'English',
            '2'=>'Hindi',
            '3'=>'Espanol',
        ];
    }

    public static function getDataById($model,$column,$value){
        return $model::where($column, $value)->first();
    }
}