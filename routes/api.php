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


    // API routes for addresses
    Route::apiResource('addresses', \App\Http\Controllers\Api\AddressController::class);
    // API routes for attachments
    Route::apiResource('attachments', \App\Http\Controllers\Api\AttachmentController::class);
    // API routes for audits
    Route::apiResource('audits', \App\Http\Controllers\Api\AuditController::class);
    // API routes for banks
    Route::apiResource('banks', \App\Http\Controllers\Api\BankController::class);
    // API routes for communications
    Route::apiResource('communications', \App\Http\Controllers\Api\CommunicationController::class);
    // API routes for contact-numbers
    Route::apiResource('contact-numbers', \App\Http\Controllers\Api\ContactNumberController::class);
    // API routes for crms
    Route::apiResource('crms', \App\Http\Controllers\Api\CrmController::class);
    // API routes for documents
    Route::apiResource('documents', \App\Http\Controllers\Api\DocumentController::class);
    // API routes for document-details
    Route::apiResource('document-details', \App\Http\Controllers\Api\DocumentDetailController::class);
    // API routes for domain-users
    Route::apiResource('domain-users', \App\Http\Controllers\Api\DomainUserController::class);
    // API routes for dummies
    Route::apiResource('dummies', \App\Http\Controllers\Api\DummyController::class);
    // API routes for emails
    Route::apiResource('emails', \App\Http\Controllers\Api\EmailController::class);
    // API routes for entities
    Route::apiResource('entities', \App\Http\Controllers\Api\EntityController::class);
    // API routes for entity-audits
    Route::apiResource('entity-audits', \App\Http\Controllers\Api\EntityAuditController::class);
    // API routes for entity-events
    Route::apiResource('entity-events', \App\Http\Controllers\Api\EntityEventController::class);
    // API routes for entity-goods
    Route::apiResource('entity-goods', \App\Http\Controllers\Api\EntityGoodController::class);
    // API routes for entity-good-approvals
    Route::apiResource('entity-good-approvals', \App\Http\Controllers\Api\EntityGoodApprovalController::class);
    // API routes for entity-relationships
    Route::apiResource('entity-relationships', \App\Http\Controllers\Api\EntityRelationshipController::class);
    // API routes for external-producers
    Route::apiResource('external-producers', \App\Http\Controllers\Api\ExternalProducerController::class);
    // API routes for goods
    Route::apiResource('goods', \App\Http\Controllers\Api\GoodController::class);
    // API routes for instance-nos
    Route::apiResource('instance-nos', \App\Http\Controllers\Api\InstanceNoController::class);
    // API routes for migration-s
    Route::apiResource('migration-s', \App\Http\Controllers\Api\MigrationController::class);
    // API routes for objects
    Route::apiResource('objects', \App\Http\Controllers\Api\ObjectController::class);
    // API routes for object-traits
    Route::apiResource('object-traits', \App\Http\Controllers\Api\ObjectTraitController::class);
    // API routes for object-values
    Route::apiResource('object-values', \App\Http\Controllers\Api\ObjectValueController::class);
    // API routes for password-hashes
    Route::apiResource('password-hashes', \App\Http\Controllers\Api\PasswordHashController::class);
    // API routes for product-providers
    Route::apiResource('product-providers', \App\Http\Controllers\Api\ProductProviderController::class);
    // API routes for queries
    Route::apiResource('queries', \App\Http\Controllers\Api\QueryController::class);
    // API routes for query-headers
    Route::apiResource('query-headers', \App\Http\Controllers\Api\QueryHeaderController::class);
    // API routes for relatives
    Route::apiResource('relatives', \App\Http\Controllers\Api\RelativeController::class);
    // API routes for requirements
    Route::apiResource('requirements', \App\Http\Controllers\Api\RequirementController::class);
    // API routes for requirement-details
    Route::apiResource('requirement-details', \App\Http\Controllers\Api\RequirementDetailController::class);
    // API routes for rules
    Route::apiResource('rules', \App\Http\Controllers\Api\RuleController::class);
    // API routes for rule-actions
    Route::apiResource('rule-actions', \App\Http\Controllers\Api\RuleActionController::class);
    // API routes for rule-action-datas
    Route::apiResource('rule-action-datas', \App\Http\Controllers\Api\RuleActionDatumController::class);
    // API routes for rule-configs
    Route::apiResource('rule-configs', \App\Http\Controllers\Api\RuleConfigController::class);
    // API routes for rule-entity-roles
    Route::apiResource('rule-entity-roles', \App\Http\Controllers\Api\RuleEntityRoleController::class);
    // API routes for service-requests
    Route::apiResource('service-requests', \App\Http\Controllers\Api\ServiceRequestController::class);
    // API routes for service-request-frequencies
    Route::apiResource('service-request-frequencies', \App\Http\Controllers\Api\ServiceRequestFrequencyController::class);
    // API routes for service-request-reports
    Route::apiResource('service-request-reports', \App\Http\Controllers\Api\ServiceRequestReportController::class);
    // API routes for system-actions
    Route::apiResource('system-actions', \App\Http\Controllers\Api\SystemActionController::class);
    // API routes for system-codes
    Route::apiResource('system-codes', \App\Http\Controllers\Api\SystemCodeController::class);
    // API routes for system-configurations
    Route::apiResource('system-configurations', \App\Http\Controllers\Api\SystemConfigurationController::class);
    // API routes for system-logs
    Route::apiResource('system-logs', \App\Http\Controllers\Api\SystemLogController::class);
    // API routes for system-users
    Route::apiResource('system-users', \App\Http\Controllers\Api\SystemUserController::class);
    // API routes for transactions
    Route::apiResource('transactions', \App\Http\Controllers\Api\TransactionController::class);
    // API routes for treatment-details
    Route::apiResource('treatment-details', \App\Http\Controllers\Api\TreatmentDetailController::class);
    // API routes for user-accesses
    Route::apiResource('user-accesses', \App\Http\Controllers\Api\UserAccessController::class);
    // API routes for user-configurations
    Route::apiResource('user-configurations', \App\Http\Controllers\Api\UserConfigurationController::class);
    // API routes for user-devices
    Route::apiResource('user-devices', \App\Http\Controllers\Api\UserDeviceController::class);
    // API routes for user-roles
    Route::apiResource('user-roles', \App\Http\Controllers\Api\UserRoleController::class);
    // API routes for user-role-accesses
    Route::apiResource('user-role-accesses', \App\Http\Controllers\Api\UserRoleAccessController::class);
    // API routes for website-producer-registrations
    Route::apiResource('website-producer-registrations', \App\Http\Controllers\Api\WebsiteProducerRegistrationController::class);



//    Route::apiResource('posts', PostController::class);
});
