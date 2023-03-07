<?php

use Illuminate\Support\Facades\Route;

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

/*
********************************Auth CONTROOLER******************************************/




Route::get('/test_wallet', ['as'=>'login', 'uses'=>'user\WalletController@test_wallet']);


Route::get('/login', ['as'=>'login', 'uses'=>'Auth\AuthController@login']);

Route::post('/login_post', ['as'=>'login_post', 'uses'=>'Auth\AuthController@login_post']);

Route::get('/resistration', ['as'=>'resistration', 'uses'=>'Auth\AuthController@resistration']);

Route::post('/resistration_post', ['as'=>'resistration_post', 'uses'=>'Auth\AuthController@resistration_post']);

Route::get('/logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@logout']);

Route::get('/check', ['as'=>'check', 'uses'=>'Auth\AuthController@check']);

Route::get('/usercheck',['as'=>'usercheck',  'uses'=>'Auth\AuthController@usercheck']);

Route::get('/useridcheck',['as'=>'useridcheck',  'uses'=>'Auth\AuthController@useridcheck']);

Route::get('/usertrascheck',['as'=>'usertrascheck',  'uses'=>'Auth\AuthController@usertrascheck']);

Route::get('/registercheck',['as'=>'registercheck',  'uses'=>'Auth\AuthController@registercheck']);

Route::get('/package_user_check',['as'=>'package_user_check',  'uses'=>'Auth\AuthController@package_user_check']);

Route::get('/forgot_password',['as'=>'forgot_password',  'uses'=>'Auth\AuthController@forgot_password']);

Route::post('/forgot_password_post',['as'=>'forgot_password_post',  'uses'=>'Auth\AuthController@forgot_password_post']);


Route::get('/tester',['as'=>'tester',  'uses'=>'user\ActivationController@tester']);










Route::get('/test_mail',['as'=>'test_mail',  'uses'=>'admin\BroadcastController@test_mail']);

Route::get('/generate_level_income',['as'=>'generate_level_income',  'uses'=>'user\ActivationController@generate_level_income']);

Route::get('/generate_roi_income',['as'=>'generate_roi_income',  'uses'=>'user\ActivationController@generate_roi_income']);


Route::get('/generate_roi_level_income',['as'=>'generate_roi_level_income',  'uses'=>'user\ActivationController@generate_roi_level_income']);

Route::get('/getway_chenge', ['as'=>'getway_chenge', 'uses'=>'user\ActivationController@getway_chenge']);

Route::get('/solana_getway', ['as'=>'solana_getway', 'uses'=>'user\ActivationController@solana_getway']);






//******************************user1**********************//



 



 

/*************************************USER CONTROOLER******************************************/

Route::get('/', function () {
    
    return view('bitbnsf/index');
});

// Routes for User
Route::group(['prefix' => 'user', 'as' => 'user', 'middleware' => ['user']], function(){


Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'user\UserController@dashboard']);


Route::get('binary_income/{binary_sponcer}/{user_id}/{side}/{package_amt}', ['as'=> 'binary_income', 'uses'=>'user\ActivationController@binary_income']);





Route::get('/autopool', ['as'=>'autopool', 'uses'=>'user\UserController@autopool']);

Route::get('/directsponsorbonus', ['as'=>'directsponsorbonus', 'uses'=>'user\UserController@directsponsorbonus']);


Route::get('/change_profile', ['as'=>'change_profile', 'uses'=>'user\UserController@change_profile']);

Route::post('/change_profile_post', ['as'=>'change_profile_post', 'uses'=>'user\UserController@change_profile_post']);


Route::get('/view_profile', ['as'=>'view_profile', 'uses'=>'user\UserController@view_profile']);

Route::post('/view_profile_post', ['as'=>'view_profile_post', 'uses'=>'user\UserController@view_profile_post']);



Route::get('/change_password', ['as'=>'change_password', 'uses'=>'user\UserController@change_password']);

Route::post('/change_password_post', ['as'=>'change_password_post', 'uses'=>'user\UserController@change_password_post']);


Route::get('/change_transaction_pin', ['as'=>'change_transaction_pin', 'uses'=>'user\UserController@change_transaction_pin']);

Route::post('/change_transaction_pin_post', ['as'=>'change_transaction_pin_post', 'uses'=>'user\UserController@change_transaction_pin_post']);


Route::get('/change_bank_details', ['as'=>'change_bank_details', 'uses'=>'user\UserController@change_bank_details']);

Route::post('/change_bank_details_post', ['as'=>'change_bank_details_post', 'uses'=>'user\UserController@change_bank_details_post']);

Route::get('/add_name', ['as'=>'add_name', 'uses'=>'user\UserController@add_name']);


Route::get('/crypto_wallet', ['as'=>'crypto_wallet', 'uses'=>'user\UserController@crypto_wallet']);

Route::post('/crypto_wallet_post', ['as'=>'crypto_wallet_post', 'uses'=>'user\UserController@crypto_wallet_post']);

Route::get('/downline', ['as'=>'downline', 'uses'=>'user\UserController@my_downline']);

Route::get('/tree_view', ['as'=>'tree_view', 'uses'=>'user\UserController@tree_view']);



// End of User Routes



// Routes for Package

Route::get('/package_active', ['as'=>'package_active', 'uses'=>'user\ActivationController@package_active']);

Route::post('/package_active_post', ['as'=>'package_active_post', 'uses'=>'user\ActivationController@package_active_post']);

Route::get('/TBI_active', ['as'=>'TBI_active', 'uses'=>'user\ActivationController@TBI_active']);

Route::post('/TBI_active_post', ['as'=>'TBI_active_post', 'uses'=>'user\ActivationController@TBI_active_post']);

Route::get('/make_deposite', ['as'=>'make_deposite', 'uses'=>'user\ActivationController@make_deposite']);

Route::post('/make_deposite_post', ['as'=>'make_deposite_post', 'uses'=>'user\ActivationController@make_deposite_post']);

Route::get('/make_deposite_inr', ['as'=>'make_deposite_inr', 'uses'=>'user\ActivationController@make_deposite_inr']);


Route::get('/quiz_deposite', ['as'=>'quiz_deposite', 'uses'=>'user\ActivationController@quiz_deposite']);

Route::post('/quiz_deposite_post', ['as'=>'quiz_deposite_post', 'uses'=>'user\ActivationController@quiz_deposite_post']);





/*Route::get('/fund_transfer', ['as'=>'fund_transfer', 'uses'=>'user\ActivationController@fund_transfer']);

Route::post('/fund_transfer_post', ['as'=>'fund_transfer_post', 'uses'=>'user\ActivationController@fund_transfer_post']);*/

Route::get('/fund_transfer_user', ['as'=>'fund_transfer_user', 'uses'=>'user\ActivationController@fund_transfer_user']);

Route::post('/fund_transfer_user_post', ['as'=>'fund_transfer_user_post', 'uses'=>'user\ActivationController@fund_transfer_user_post']);


Route::get('/transfer_reward', ['as'=>'transfer_reward', 'uses'=>'user\ActivationController@transfer_reward']);

Route::post('/transfer_reward_post', ['as'=>'transfer_reward_post', 'uses'=>'user\ActivationController@transfer_reward_post']);



Route::get('/internal_transfer', ['as'=>'internal_transfer', 'uses'=>'user\ActivationController@internal_transfer']);

Route::post('/internal_transfer_post', ['as'=>'internal_transfer_post', 'uses'=>'user\ActivationController@internal_transfer_post']);


Route::get('/generate_roi_income', ['as'=>'generate_roi_income', 'uses'=>'user\ActivationController@generate_roi_income']);



// End of User Routes



// Routes for Withdraw

Route::get('/payment_withdraw', ['as'=>'payment_withdraw', 'uses'=>'user\WithdrawController@payment_withdraw']);

Route::get('/sell_gold', ['as'=>'sell_gold', 'uses'=>'user\WithdrawController@sell_gold']);
Route::get('/sell_gold_inr', ['as'=>'sell_gold_inr', 'uses'=>'user\WithdrawController@sell_gold_inr']);


Route::post('/payment_withdraw_post', ['as'=>'payment_withdraw_post', 'uses'=>'user\WithdrawController@payment_withdraw_post']);

// End Withdraw



//Routes for Report

Route::get('/level', ['as'=>'level', 'uses'=>'user\ReportController@level']);

Route::get('/pool', ['as'=>'pool', 'uses'=>'user\ReportController@pool']);

Route::get('/club', ['as'=>'club', 'uses'=>'user\ReportController@club']);

Route::get('/binary', ['as'=>'binary', 'uses'=>'user\ReportController@binary']);

Route::get('/single_leg', ['as'=>'single_leg', 'uses'=>'user\ReportController@single_leg']);

Route::get('/team_booster', ['as'=>'team_booster', 'uses'=>'user\ReportController@team_booster']);

Route::get('/fund_transfer', ['as'=>'fund_transfer', 'uses'=>'user\ReportController@fund_transfer']);

Route::get('/fund_generate', ['as'=>'fund_generate', 'uses'=>'user\ReportController@fund_generate']);

Route::get('/direct_member', ['as'=>'direct_member', 'uses'=>'user\ReportController@direct_member']);

Route::get('/package_activation_report', ['as'=>'package_activation_report', 'uses'=>'user\ReportController@package_activation_report']);

Route::get('/deposite_report', ['as'=>'deposite_report', 'uses'=>'user\ReportController@deposite_report']);

Route::get('/team_booster_income', ['as'=>'team_booster_income', 'uses'=>'user\ReportController@team_booster_income']);

Route::get('/fund_transfer_report', ['as'=>'fund_transfer_report', 'uses'=>'user\ReportController@fund_transfer_report']);

Route::get('/fund_receive_report', ['as'=>'fund_receive_report', 'uses'=>'user\ReportController@fund_receive_report']);

Route::get('/wallettoactivation', ['as'=>'wallettoactivation', 'uses'=>'user\ReportController@wallettoactivation']);

Route::get('/withdrwal_report', ['as'=>'withdrwal_report', 'uses'=>'user\ReportController@withdrwal_report']);


Route::get('/sender_transaction', ['as'=>'sender_transaction', 'uses'=>'user\ReportController@sender_transaction']);

Route::get('/fund_transfer_report_out', ['as'=>'fund_transfer_report_out', 'uses'=>'user\ReportController@fund_transfer_report_out']);

Route::get('/deposite_report', ['as'=>'deposite_report', 'uses'=>'user\ReportController@deposite_report']);


Route::get('/activation_package_deposite', ['as'=>'activation_package_deposite', 'uses'=>'user\ReportController@activation_package_deposite']);

Route::get('/receiver_transaction', ['as'=>'receiver_transaction', 'uses'=>'user\ReportController@receiver_transaction']);

Route::get('/income_table', ['as'=>'income_table', 'uses'=>'user\ReportController@income_table']);

Route::get('/roi_income', ['as'=>'roi_income', 'uses'=>'user\ReportController@roi_income']);

Route::get('/selfroi_income', ['as'=>'selfroi_income', 'uses'=>'user\ReportController@selfroi_income']);

Route::get('/autopool_report', ['as'=>'autopool_report', 'uses'=>'user\ReportController@autopool_report']);

Route::get('/tbireport', ['as'=>'tbireport', 'uses'=>'user\ReportController@tbireport']);

Route::get('/rapid_fire', ['as'=>'rapid_fire', 'uses'=>'user\ReportController@rapid_fire']);

Route::get('/roi_daily_report', ['as'=>'roi_daily_report', 'uses'=>'user\ReportController@roi_daily_report']);

Route::get('/level_roi_daily', ['as'=>'level_roi_daily', 'uses'=>'user\ReportController@level_roi_daily']);


Route::get('/quiz', ['as'=>'quiz', 'uses'=>'user\QuizController@quiz']);

Route::post('/quiz_post', ['as'=>'quiz_post', 'uses'=>'user\QuizController@quiz_post']);


Route::get('/quiz_start', ['as'=>'quiz_start', 'uses'=>'user\QuizController@quiz_start']);

Route::get('/quiz_quation', ['as'=>'quiz_quation', 'uses'=>'user\QuizController@quiz_quation']);

Route::post('/quiz_booking', ['as'=>'quiz_booking', 'uses'=>'user\QuizController@quiz_booking']);

Route::get('/quiz_result', ['as'=>'quiz_result', 'uses'=>'user\QuizController@quiz_result']);

Route::get('/spinner', ['as'=>'spinner', 'uses'=>'user\QuizController@spinner']);



Route::get('/empty', ['as'=>'empty', 'uses'=>'user\QuizController@empty']);



 });
// End Report
/*
********************************ADMIN CONTROOLER******************************************/

    Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function(){

     
     
     



    Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'admin\UserController@dashboard']);

    

    




    Route::get('/dashboard_2', ['as'=>'dashboard_2', 'uses'=>'admin\UserController@dashboard_2']);

     Route::get('/tbi_report', ['as'=>'tbi_report', 'uses'=>'admin\UserController@tbi_report']);
    

    Route::get('/view_user', ['as'=>'view_user', 'uses'=>'admin\UserController@view_user']);

    Route::get('/is_active_status', ['as'=>'is_active_status', 'uses'=>'admin\UserController@is_active_status']);

    Route::get('/user_edit', ['as'=>'user_edit', 'uses'=>'admin\UserController@user_edit']);

    Route::post('/user_edit_post', ['as'=>'user_edit_post', 'uses'=>'admin\UserController@user_edit_post']);


    Route::get('/view_details', ['as'=>'view_details', 'uses'=>'admin\UserController@view_details']);

    Route::get('/set_password', ['as'=>'set_password', 'uses'=>'admin\UserController@set_password']);

    Route::post('/set_password_post', ['as'=>'set_password_post', 'uses'=>'admin\UserController@set_password_post']);

     Route::get('/stop_withdraw', ['as'=>'stop_withdraw', 'uses'=>'admin\UserController@stop_withdraw']);

     Route::get('/count_clube_income',['as'=>'count_clube_income',  'uses'=>'admin\UserController@count_clube_income']);

     Route::get('/login_as', ['as'=>'login_as', 'uses'=>'admin\UserController@login_as']);

      Route::get('/admin_password',['as'=>'admin_password',  'uses'=>'admin\UserController@admin_password']);

     Route::get('/club_give',['as'=>'club_give',  'uses'=>'admin\UserController@club_give']);


       Route::get('/pakage_20', ['as'=>'pakage_20', 'uses'=>'admin\UserController@pakage_20']);

        Route::post('/admin_password_post', ['as'=>'admin_password_post', 'uses'=>'admin\UserController@admin_password_post']);



     //**Transaction controller**//

     Route::get('/status_change', ['as'=>'status_change', 'uses'=>'admin\TransactionController@status_change']);

     Route::get('/status_change_data', ['as'=>'status_change_data', 'uses'=>'admin\TransactionController@status_change_data']);

    Route::get('/sort_by_reason', ['as'=>'sort_by_reason', 'uses'=>'admin\TransactionController@sort_by_reason']);

    Route::get('/two_leg', ['as'=>'two_leg', 'uses'=>'admin\TransactionController@two_leg']);

    //**Transaction controller**//


     Route::get('/view_package', ['as'=>'view_package', 'uses'=>'admin\PackageController@view_package']);

    /**Site setting**/
     

     Route::get('/site_setting', ['as'=>'site_setting', 'uses'=>'admin\SiteSettingController@site_setting']); 
    
     Route::post('/site_setting_post', ['as'=>'site_setting_post', 'uses'=>'admin\SiteSettingController@site_setting_post']);

     Route::get('/change_frontpage', ['as'=>'change_frontpage', 'uses'=>'admin\SiteSettingController@change_frontpage']);

      Route::post('/change_frontpage_post', ['as'=>'change_frontpage_post', 'uses'=>'admin\SiteSettingController@change_frontpage_post']);


      Route::get('/quiz_setting', ['as'=>'quiz_setting', 'uses'=>'admin\SiteSettingController@quiz_setting']);

      Route::post('/quiz_setting_post', ['as'=>'quiz_setting_post', 'uses'=>'admin\SiteSettingController@quiz_setting_post']);


    /**QrSettingController**/

     Route::get('/qr_setting', ['as'=>'qr_setting', 'uses'=>'admin\QrSettingController@qr_setting']); 

      Route::get('/change_status', ['as'=>'change_status', 'uses'=>'admin\QrSettingController@change_status']);

      Route::get('/qr_update', ['as'=>'qr_update', 'uses'=>'admin\QrSettingController@qr_update']); 

       Route::post('/qr_update_post', ['as'=>'qr_update_post', 'uses'=>'admin\QrSettingController@qr_update_post']); 
      
    
                              
    //**Withdraw setting**//

     Route::get('/withdraw_setting', ['as'=>'withdraw_setting', 'uses'=>'admin\WithdrawSettingController@withdraw_setting']); 

    Route::post('/withdraw_setting_post', ['as'=>'withdraw_setting_post', 'uses'=>'admin\WithdrawSettingController@withdraw_setting_post']); 

    ///**Deposite setting**//

     Route::get('/deposite_setting', ['as'=>'deposite_setting', 'uses'=>'admin\DepositesettingController@deposite_setting']);


    Route::post('/deposite_setting_post', ['as'=>'deposite_setting_post', 'uses'=>'admin\DepositesettingController@deposite_setting_post']);

    //**Resistration setting**// 
    
    Route::get('/registration_setting', ['as'=>'registration_setting', 'uses'=>'admin\ResistrationsettingController@registration_setting']);


    Route::post('/resistration_setting_post', ['as'=>'resistration_setting_post', 'uses'=>'admin\ResistrationsettingController@resistration_setting_post']);

     //paymentsettingcontroller

      Route::get('/payment_setting', ['as'=>'payment_setting', 'uses'=>'admin\PaymentSettingController@payment_setting']);


     Route::post('/payment_setting_post', ['as'=>'payment_setting_post', 'uses'=>'admin\PaymentSettingController@payment_setting_post']);
     
     //Request Controller

     Route::get('/deposite_request', ['as'=>'deposite_request', 'uses'=>'admin\DepositeRequestController@deposite_request']);

     Route::get('/deposite_request_data', ['as'=>'deposite_request_data', 'uses'=>'admin\DepositeRequestController@deposite_request_data']);

     Route::get('/withdraw_request', ['as'=>'withdraw_request', 'uses'=>'admin\DepositeRequestController@withdraw_request']);

     Route::get('/withdraw_request_data', ['as'=>'withdraw_request_data', 'uses'=>'admin\DepositeRequestController@withdraw_request_data']);

     Route::get('/quiz_deposit_request', ['as'=>'quiz_deposit_request', 'uses'=>'admin\DepositeRequestController@quiz_deposit_request']);

     Route::get('/request_reject', ['as'=>'request_reject', 'uses'=>'admin\DepositeRequestController@request_reject']);

     Route::get('/withdraw_request_reject', ['as'=>'withdraw_request_reject', 'uses'=>'admin\DepositeRequestController@withdraw_request_reject']);




     //**Quiz setting**//

    Route::get('/quiz', ['as'=>'quiz', 'uses'=>'admin\QuizController@quiz']); 

    Route::get('/add_quiz', ['as'=>'add_quiz', 'uses'=>'admin\QuizController@add_quiz']);

    Route::post('/add_quiz_post', ['as'=>'add_quiz_post', 'uses'=>'admin\QuizController@add_quiz_post']);

    Route::get('/quiz_delete', ['as'=>'quiz_delete', 'uses'=>'admin\QuizController@quiz_delete']);

     Route::get('/quiz_edit', ['as'=>'quiz_edit', 'uses'=>'admin\QuizController@quiz_edit']);

    Route::post('/quiz_edit_post', ['as'=>'quiz_edit_post', 'uses'=>'admin\QuizController@quiz_edit_post']);

    Route::get('/view_quiz_result', ['as'=>'view_quiz_result', 'uses'=>'admin\QuizController@view_quiz_result']);

    Route::get('/quiz_result', ['as'=>'quiz_result', 'uses'=>'admin\QuizController@quiz_result']);

    Route::get('/winner', ['as'=>'winner', 'uses'=>'admin\QuizController@winner']);

     Route::get('/all_quiz', ['as'=>'all_quiz', 'uses'=>'admin\QuizController@all_quiz']);

         Route::get('/transfer_reward', ['as'=>'transfer_reward', 'uses'=>'admin\UserController@transfer_reward']);

         Route::post('/transfer_reward_post', ['as'=>'transfer_reward_post', 'uses'=>'admin\UserController@transfer_reward_post']);


    


});



 

//******************************end user1*******************//