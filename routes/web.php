<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

        /*-------------------- Gerer mot de passe---------------------------*/

Route::get('choixMdp',[
        'as'=>'chemin_choixMdp',
        'uses'=>'changerMdpController@choixMdp'
]);

Route::post('changerMdp',[
        'as'=>'chemin_changerMdp',
        'uses'=>'changerMdpController@changerMdp'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMoisAdmin',[
        'as'=>'chemin_selectionMoisAdmin',
        'uses'=>'etatFraisAdminController@selectionMoisAdmin'
]);


Route::post('listeFraisAdmin',[
        'as'=>'chemin_listeFraisAdmin',
        'uses'=>'etatFraisAdminController@voirFraisAdmin'
]);


         /*-------------------- Use case PDF---------------------------*/
Route::get('listepdf',[
        'as'=>'chemin_affichagePdf',
        'uses'=>'etatFraisController@getPostPdf'
]);

         /*-------------------- Use case PDF---------------------------*/
Route::get('listepdfAdmin',[
        'as'=>'chemin_affichagePdfAdmin',
        'uses'=>'etatFraisAdminController@getPostPdfAdmin'
]);
