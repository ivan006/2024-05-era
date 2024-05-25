<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // This route will be accessible only by authenticated users via Sanctum
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // All PostController routes will require authentication
    Route::apiResource('posts', PostController::class);
});

// API routes for address
Route::apiResource('addresses', 'Api\AddressController');
// API routes for attachment
Route::apiResource('attachments', 'Api\AttachmentController');
// API routes for audit
Route::apiResource('audits', 'Api\AuditController');
// API routes for bank
Route::apiResource('banks', 'Api\BankController');
// API routes for communication
Route::apiResource('communications', 'Api\CommunicationController');
// API routes for contactnumber
Route::apiResource('contactnumbers', 'Api\ContactnumberController');
// API routes for crm
Route::apiResource('crms', 'Api\CrmController');
// API routes for document
Route::apiResource('documents', 'Api\DocumentController');
// API routes for documentdetail
Route::apiResource('documentdetails', 'Api\DocumentdetailController');
// API routes for domainuser
Route::apiResource('domainusers', 'Api\DomainuserController');
// API routes for dummy
Route::apiResource('dummies', 'Api\DummyController');
// API routes for email
Route::apiResource('emails', 'Api\EmailController');
// API routes for entity
Route::apiResource('entities', 'Api\EntityController');
// API routes for entityaudit
Route::apiResource('entityaudits', 'Api\EntityauditController');
// API routes for entityevent
Route::apiResource('entityevents', 'Api\EntityeventController');
// API routes for entitygood
Route::apiResource('entitygoods', 'Api\EntitygoodController');
// API routes for entitygoodapproval
Route::apiResource('entitygoodapprovals', 'Api\EntitygoodapprovalController');
// API routes for entityrelationship
Route::apiResource('entityrelationships', 'Api\EntityrelationshipController');
// API routes for externalproducers
Route::apiResource('externalproducers', 'Api\ExternalproducerController');
// API routes for failed_jobs
Route::apiResource('failed_jobs', 'Api\FailedJobController');
// API routes for good
Route::apiResource('goods', 'Api\GoodController');
// API routes for instanceno
Route::apiResource('instancenos', 'Api\InstancenoController');
// API routes for migrations
Route::apiResource('migrations', 'Api\MigrationController');
// API routes for object
Route::apiResource('objects', 'Api\ObjectController');
// API routes for objecttrait
Route::apiResource('objecttraits', 'Api\ObjecttraitController');
// API routes for objectvalue
Route::apiResource('objectvalues', 'Api\ObjectvalueController');
// API routes for password_reset_tokens
Route::apiResource('password_reset_tokens', 'Api\PasswordResetTokenController');
// API routes for passwordhash
Route::apiResource('passwordhashes', 'Api\PasswordhashController');
// API routes for personal_access_tokens
Route::apiResource('personal_access_tokens', 'Api\PersonalAccessTokenController');
// API routes for post_tags
Route::apiResource('post_tags', 'Api\PostTagController');
// API routes for posts
Route::apiResource('posts', 'Api\PostController');
// API routes for productprovider
Route::apiResource('productproviders', 'Api\ProductproviderController');
// API routes for query
Route::apiResource('queries', 'Api\QueryController');
// API routes for queryheader
Route::apiResource('queryheaders', 'Api\QueryheaderController');
// API routes for relative
Route::apiResource('relatives', 'Api\RelativeController');
// API routes for requirement
Route::apiResource('requirements', 'Api\RequirementController');
// API routes for requirementdetail
Route::apiResource('requirementdetails', 'Api\RequirementdetailController');
// API routes for rule
Route::apiResource('rules', 'Api\RuleController');
// API routes for ruleaction
Route::apiResource('ruleactions', 'Api\RuleactionController');
// API routes for ruleactiondata
Route::apiResource('ruleactiondatas', 'Api\RuleactiondatumController');
// API routes for ruleconfig
Route::apiResource('ruleconfigs', 'Api\RuleconfigController');
// API routes for ruleentityrole
Route::apiResource('ruleentityroles', 'Api\RuleentityroleController');
// API routes for servicerequest
Route::apiResource('servicerequests', 'Api\ServicerequestController');
// API routes for servicerequestfrequency
Route::apiResource('servicerequestfrequencies', 'Api\ServicerequestfrequencyController');
// API routes for servicerequestreport
Route::apiResource('servicerequestreports', 'Api\ServicerequestreportController');
// API routes for systemaction
Route::apiResource('systemactions', 'Api\SystemactionController');
// API routes for systemcode
Route::apiResource('systemcodes', 'Api\SystemcodeController');
// API routes for systemconfiguration
Route::apiResource('systemconfigurations', 'Api\SystemconfigurationController');
// API routes for systemlog
Route::apiResource('systemlogs', 'Api\SystemlogController');
// API routes for systemuser
Route::apiResource('systemusers', 'Api\SystemuserController');
// API routes for tags
Route::apiResource('tags', 'Api\TagController');
// API routes for transactions
Route::apiResource('transactions', 'Api\TransactionController');
// API routes for treatmentdetails
Route::apiResource('treatmentdetails', 'Api\TreatmentdetailController');
// API routes for useraccess
Route::apiResource('useraccesses', 'Api\UseraccessController');
// API routes for userconfiguration
Route::apiResource('userconfigurations', 'Api\UserconfigurationController');
// API routes for userdevice
Route::apiResource('userdevices', 'Api\UserdeviceController');
// API routes for userrole
Route::apiResource('userroles', 'Api\UserroleController');
// API routes for userroleaccess
Route::apiResource('userroleaccesses', 'Api\UserroleaccessController');
// API routes for users
Route::apiResource('users', 'Api\UserController');
// API routes for website_producer_registrations
Route::apiResource('website_producer_registrations', 'Api\WebsiteProducerRegistrationController');