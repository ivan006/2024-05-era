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

//    Route::apiResource('posts', PostController::class);
});

// API routes for address
Route::apiResource('addresses', \App\Http\Controllers\Api\AddressController::class);
// API routes for attachment
Route::apiResource('attachments', \App\Http\Controllers\Api\AttachmentController::class);
// API routes for audit
Route::apiResource('audits', \App\Http\Controllers\Api\AuditController::class);
// API routes for bank
Route::apiResource('banks', \App\Http\Controllers\Api\BankController::class);
// API routes for communication
Route::apiResource('communications', \App\Http\Controllers\Api\CommunicationController::class);
// API routes for contactnumber
Route::apiResource('contactnumbers', \App\Http\Controllers\Api\ContactnumberController::class);
// API routes for crm
Route::apiResource('crms', \App\Http\Controllers\Api\CrmController::class);
// API routes for document
Route::apiResource('documents', \App\Http\Controllers\Api\DocumentController::class);
// API routes for documentdetail
Route::apiResource('documentdetails', \App\Http\Controllers\Api\DocumentdetailController::class);
// API routes for domainuser
Route::apiResource('domainusers', \App\Http\Controllers\Api\DomainuserController::class);
// API routes for dummy
Route::apiResource('dummies', \App\Http\Controllers\Api\DummyController::class);
// API routes for email
Route::apiResource('emails', \App\Http\Controllers\Api\EmailController::class);
// API routes for entity
Route::apiResource('entities', \App\Http\Controllers\Api\EntityController::class);
// API routes for entityaudit
Route::apiResource('entityaudits', \App\Http\Controllers\Api\EntityauditController::class);
// API routes for entityevent
Route::apiResource('entityevents', \App\Http\Controllers\Api\EntityeventController::class);
// API routes for entitygood
Route::apiResource('entitygoods', \App\Http\Controllers\Api\EntitygoodController::class);
// API routes for entitygoodapproval
Route::apiResource('entitygoodapprovals', \App\Http\Controllers\Api\EntitygoodapprovalController::class);
// API routes for entityrelationship
Route::apiResource('entityrelationships', \App\Http\Controllers\Api\EntityrelationshipController::class);
// API routes for externalproducers
Route::apiResource('externalproducers', \App\Http\Controllers\Api\ExternalproducerController::class);
// API routes for failed_jobs
Route::apiResource('failed_jobs', \App\Http\Controllers\Api\FailedJobController::class);
// API routes for good
Route::apiResource('goods', \App\Http\Controllers\Api\GoodController::class);
// API routes for instanceno
Route::apiResource('instancenos', \App\Http\Controllers\Api\InstancenoController::class);
// API routes for migrations
Route::apiResource('migrations', \App\Http\Controllers\Api\MigrationController::class);
// API routes for object
Route::apiResource('objects', \App\Http\Controllers\Api\ObjectController::class);
// API routes for objecttrait
Route::apiResource('objecttraits', \App\Http\Controllers\Api\ObjecttraitController::class);
// API routes for objectvalue
Route::apiResource('objectvalues', \App\Http\Controllers\Api\ObjectvalueController::class);
// API routes for password_reset_tokens
Route::apiResource('password_reset_tokens', \App\Http\Controllers\Api\PasswordResetTokenController::class);
// API routes for passwordhash
Route::apiResource('passwordhashes', \App\Http\Controllers\Api\PasswordhashController::class);
// API routes for personal_access_tokens
Route::apiResource('personal_access_tokens', \App\Http\Controllers\Api\PersonalAccessTokenController::class);
// API routes for post_tags
Route::apiResource('post_tags', \App\Http\Controllers\Api\PostTagController::class);
// API routes for posts
Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);
// API routes for productprovider
Route::apiResource('productproviders', \App\Http\Controllers\Api\ProductproviderController::class);
// API routes for query
Route::apiResource('queries', \App\Http\Controllers\Api\QueryController::class);
// API routes for queryheader
Route::apiResource('queryheaders', \App\Http\Controllers\Api\QueryheaderController::class);
// API routes for relative
Route::apiResource('relatives', \App\Http\Controllers\Api\RelativeController::class);
// API routes for requirement
Route::apiResource('requirements', \App\Http\Controllers\Api\RequirementController::class);
// API routes for requirementdetail
Route::apiResource('requirementdetails', \App\Http\Controllers\Api\RequirementdetailController::class);
// API routes for rule
Route::apiResource('rules', \App\Http\Controllers\Api\RuleController::class);
// API routes for ruleaction
Route::apiResource('ruleactions', \App\Http\Controllers\Api\RuleactionController::class);
// API routes for ruleactiondata
Route::apiResource('ruleactiondatas', \App\Http\Controllers\Api\RuleactiondatumController::class);
// API routes for ruleconfig
Route::apiResource('ruleconfigs', \App\Http\Controllers\Api\RuleconfigController::class);
// API routes for ruleentityrole
Route::apiResource('ruleentityroles', \App\Http\Controllers\Api\RuleentityroleController::class);
// API routes for servicerequest
Route::apiResource('servicerequests', \App\Http\Controllers\Api\ServicerequestController::class);
// API routes for servicerequestfrequency
Route::apiResource('servicerequestfrequencies', \App\Http\Controllers\Api\ServicerequestfrequencyController::class);
// API routes for servicerequestreport
Route::apiResource('servicerequestreports', \App\Http\Controllers\Api\ServicerequestreportController::class);
// API routes for systemaction
Route::apiResource('systemactions', \App\Http\Controllers\Api\SystemactionController::class);
// API routes for systemcode
Route::apiResource('systemcodes', \App\Http\Controllers\Api\SystemcodeController::class);
// API routes for systemconfiguration
Route::apiResource('systemconfigurations', \App\Http\Controllers\Api\SystemconfigurationController::class);
// API routes for systemlog
Route::apiResource('systemlogs', \App\Http\Controllers\Api\SystemlogController::class);
// API routes for systemuser
Route::apiResource('systemusers', \App\Http\Controllers\Api\SystemuserController::class);
// API routes for tags
Route::apiResource('tags', \App\Http\Controllers\Api\TagController::class);
// API routes for transactions
Route::apiResource('transactions', \App\Http\Controllers\Api\TransactionController::class);
// API routes for treatmentdetails
Route::apiResource('treatmentdetails', \App\Http\Controllers\Api\TreatmentdetailController::class);
// API routes for useraccess
Route::apiResource('useraccesses', \App\Http\Controllers\Api\UseraccessController::class);
// API routes for userconfiguration
Route::apiResource('userconfigurations', \App\Http\Controllers\Api\UserconfigurationController::class);
// API routes for userdevice
Route::apiResource('userdevices', \App\Http\Controllers\Api\UserdeviceController::class);
// API routes for userrole
Route::apiResource('userroles', \App\Http\Controllers\Api\UserroleController::class);
// API routes for userroleaccess
Route::apiResource('userroleaccesses', \App\Http\Controllers\Api\UserroleaccessController::class);
// API routes for users
Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
// API routes for website_producer_registrations
Route::apiResource('website_producer_registrations', \App\Http\Controllers\Api\WebsiteProducerRegistrationController::class);
// API routes for address
Route::apiResource('addresses', \App\Http\Controllers\Api\AddressController::class);
// API routes for attachment
Route::apiResource('attachments', \App\Http\Controllers\Api\AttachmentController::class);
// API routes for audit
Route::apiResource('audits', \App\Http\Controllers\Api\AuditController::class);
// API routes for bank
Route::apiResource('banks', \App\Http\Controllers\Api\BankController::class);
// API routes for communication
Route::apiResource('communications', \App\Http\Controllers\Api\CommunicationController::class);
// API routes for contactnumber
Route::apiResource('contactnumbers', \App\Http\Controllers\Api\ContactnumberController::class);
// API routes for crm
Route::apiResource('crms', \App\Http\Controllers\Api\CrmController::class);
// API routes for document
Route::apiResource('documents', \App\Http\Controllers\Api\DocumentController::class);
// API routes for documentdetail
Route::apiResource('documentdetails', \App\Http\Controllers\Api\DocumentdetailController::class);
// API routes for domainuser
Route::apiResource('domainusers', \App\Http\Controllers\Api\DomainuserController::class);
// API routes for dummy
Route::apiResource('dummies', \App\Http\Controllers\Api\DummyController::class);
// API routes for email
Route::apiResource('emails', \App\Http\Controllers\Api\EmailController::class);
// API routes for entity
Route::apiResource('entities', \App\Http\Controllers\Api\EntityController::class);
// API routes for entityaudit
Route::apiResource('entityaudits', \App\Http\Controllers\Api\EntityauditController::class);
// API routes for entityevent
Route::apiResource('entityevents', \App\Http\Controllers\Api\EntityeventController::class);
// API routes for entitygood
Route::apiResource('entitygoods', \App\Http\Controllers\Api\EntitygoodController::class);
// API routes for entitygoodapproval
Route::apiResource('entitygoodapprovals', \App\Http\Controllers\Api\EntitygoodapprovalController::class);
// API routes for entityrelationship
Route::apiResource('entityrelationships', \App\Http\Controllers\Api\EntityrelationshipController::class);
// API routes for externalproducers
Route::apiResource('externalproducers', \App\Http\Controllers\Api\ExternalproducerController::class);
// API routes for failed_jobs
Route::apiResource('failed_jobs', \App\Http\Controllers\Api\FailedJobController::class);
// API routes for good
Route::apiResource('goods', \App\Http\Controllers\Api\GoodController::class);
// API routes for instanceno
Route::apiResource('instancenos', \App\Http\Controllers\Api\InstancenoController::class);
// API routes for migrations
Route::apiResource('migrations', \App\Http\Controllers\Api\MigrationController::class);
// API routes for object
Route::apiResource('objects', \App\Http\Controllers\Api\ObjectController::class);
// API routes for objecttrait
Route::apiResource('objecttraits', \App\Http\Controllers\Api\ObjecttraitController::class);
// API routes for objectvalue
Route::apiResource('objectvalues', \App\Http\Controllers\Api\ObjectvalueController::class);
// API routes for password_reset_tokens
Route::apiResource('password_reset_tokens', \App\Http\Controllers\Api\PasswordResetTokenController::class);
// API routes for passwordhash
Route::apiResource('passwordhashes', \App\Http\Controllers\Api\PasswordhashController::class);
// API routes for personal_access_tokens
Route::apiResource('personal_access_tokens', \App\Http\Controllers\Api\PersonalAccessTokenController::class);
// API routes for post_tags
Route::apiResource('post_tags', \App\Http\Controllers\Api\PostTagController::class);
// API routes for posts
Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);
// API routes for productprovider
Route::apiResource('productproviders', \App\Http\Controllers\Api\ProductproviderController::class);
// API routes for query
Route::apiResource('queries', \App\Http\Controllers\Api\QueryController::class);
// API routes for queryheader
Route::apiResource('queryheaders', \App\Http\Controllers\Api\QueryheaderController::class);
// API routes for relative
Route::apiResource('relatives', \App\Http\Controllers\Api\RelativeController::class);
// API routes for requirement
Route::apiResource('requirements', \App\Http\Controllers\Api\RequirementController::class);
// API routes for requirementdetail
Route::apiResource('requirementdetails', \App\Http\Controllers\Api\RequirementdetailController::class);
// API routes for rule
Route::apiResource('rules', \App\Http\Controllers\Api\RuleController::class);
// API routes for ruleaction
Route::apiResource('ruleactions', \App\Http\Controllers\Api\RuleactionController::class);
// API routes for ruleactiondata
Route::apiResource('ruleactiondatas', \App\Http\Controllers\Api\RuleactiondatumController::class);
// API routes for ruleconfig
Route::apiResource('ruleconfigs', \App\Http\Controllers\Api\RuleconfigController::class);
// API routes for ruleentityrole
Route::apiResource('ruleentityroles', \App\Http\Controllers\Api\RuleentityroleController::class);
// API routes for servicerequest
Route::apiResource('servicerequests', \App\Http\Controllers\Api\ServicerequestController::class);
// API routes for servicerequestfrequency
Route::apiResource('servicerequestfrequencies', \App\Http\Controllers\Api\ServicerequestfrequencyController::class);
// API routes for servicerequestreport
Route::apiResource('servicerequestreports', \App\Http\Controllers\Api\ServicerequestreportController::class);
// API routes for systemaction
Route::apiResource('systemactions', \App\Http\Controllers\Api\SystemactionController::class);
// API routes for systemcode
Route::apiResource('systemcodes', \App\Http\Controllers\Api\SystemcodeController::class);
// API routes for systemconfiguration
Route::apiResource('systemconfigurations', \App\Http\Controllers\Api\SystemconfigurationController::class);
// API routes for systemlog
Route::apiResource('systemlogs', \App\Http\Controllers\Api\SystemlogController::class);
// API routes for systemuser
Route::apiResource('systemusers', \App\Http\Controllers\Api\SystemuserController::class);
// API routes for tags
Route::apiResource('tags', \App\Http\Controllers\Api\TagController::class);
// API routes for transactions
Route::apiResource('transactions', \App\Http\Controllers\Api\TransactionController::class);
// API routes for treatmentdetails
Route::apiResource('treatmentdetails', \App\Http\Controllers\Api\TreatmentdetailController::class);
// API routes for useraccess
Route::apiResource('useraccesses', \App\Http\Controllers\Api\UseraccessController::class);
// API routes for userconfiguration
Route::apiResource('userconfigurations', \App\Http\Controllers\Api\UserconfigurationController::class);
// API routes for userdevice
Route::apiResource('userdevices', \App\Http\Controllers\Api\UserdeviceController::class);
// API routes for userrole
Route::apiResource('userroles', \App\Http\Controllers\Api\UserroleController::class);
// API routes for userroleaccess
Route::apiResource('userroleaccesses', \App\Http\Controllers\Api\UserroleaccessController::class);
// API routes for users
Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
// API routes for website_producer_registrations
Route::apiResource('website_producer_registrations', \App\Http\Controllers\Api\WebsiteProducerRegistrationController::class);