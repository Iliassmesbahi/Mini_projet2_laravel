<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::view('/frais/{cout?}','fraisTransfertView')->name("frais");
Route::post('/fraisTransfert',function(Request $request){
$poids=$request->input('colis');
$distance=$request->input('distance');
$express=$request->input('express');
if($poids<10){
    $cout=$distance*0.5; 
}else{
    $cout=$distance*($poids/10)*0.3;
}
if($express){
    $cout+=$cout+0.2;
}
return redirect()->route('frais',['cout' => $cout]);
});








