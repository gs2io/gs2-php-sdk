<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Formation;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Exception\Gs2Exception;
use Gs2\Core\Model\AsyncAction;
use Gs2\Core\Model\AsyncResult;
use Gs2\Core\Net\Gs2RestResponse;
use Gs2\Core\Net\Gs2RestSession;
use Gs2\Core\Net\Gs2RestSessionTask;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;


use Gs2\Formation\Request\DescribeNamespacesRequest;
use Gs2\Formation\Result\DescribeNamespacesResult;
use Gs2\Formation\Request\CreateNamespaceRequest;
use Gs2\Formation\Result\CreateNamespaceResult;
use Gs2\Formation\Request\GetNamespaceStatusRequest;
use Gs2\Formation\Result\GetNamespaceStatusResult;
use Gs2\Formation\Request\GetNamespaceRequest;
use Gs2\Formation\Result\GetNamespaceResult;
use Gs2\Formation\Request\UpdateNamespaceRequest;
use Gs2\Formation\Result\UpdateNamespaceResult;
use Gs2\Formation\Request\DeleteNamespaceRequest;
use Gs2\Formation\Result\DeleteNamespaceResult;
use Gs2\Formation\Request\GetServiceVersionRequest;
use Gs2\Formation\Result\GetServiceVersionResult;
use Gs2\Formation\Request\DumpUserDataByUserIdRequest;
use Gs2\Formation\Result\DumpUserDataByUserIdResult;
use Gs2\Formation\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Formation\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Formation\Request\CleanUserDataByUserIdRequest;
use Gs2\Formation\Result\CleanUserDataByUserIdResult;
use Gs2\Formation\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Formation\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Formation\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Formation\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Formation\Request\ImportUserDataByUserIdRequest;
use Gs2\Formation\Result\ImportUserDataByUserIdResult;
use Gs2\Formation\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Formation\Result\CheckImportUserDataByUserIdResult;
use Gs2\Formation\Request\GetFormModelRequest;
use Gs2\Formation\Result\GetFormModelResult;
use Gs2\Formation\Request\DescribeFormModelMastersRequest;
use Gs2\Formation\Result\DescribeFormModelMastersResult;
use Gs2\Formation\Request\CreateFormModelMasterRequest;
use Gs2\Formation\Result\CreateFormModelMasterResult;
use Gs2\Formation\Request\GetFormModelMasterRequest;
use Gs2\Formation\Result\GetFormModelMasterResult;
use Gs2\Formation\Request\UpdateFormModelMasterRequest;
use Gs2\Formation\Result\UpdateFormModelMasterResult;
use Gs2\Formation\Request\DeleteFormModelMasterRequest;
use Gs2\Formation\Result\DeleteFormModelMasterResult;
use Gs2\Formation\Request\DescribeMoldModelsRequest;
use Gs2\Formation\Result\DescribeMoldModelsResult;
use Gs2\Formation\Request\GetMoldModelRequest;
use Gs2\Formation\Result\GetMoldModelResult;
use Gs2\Formation\Request\DescribeMoldModelMastersRequest;
use Gs2\Formation\Result\DescribeMoldModelMastersResult;
use Gs2\Formation\Request\CreateMoldModelMasterRequest;
use Gs2\Formation\Result\CreateMoldModelMasterResult;
use Gs2\Formation\Request\GetMoldModelMasterRequest;
use Gs2\Formation\Result\GetMoldModelMasterResult;
use Gs2\Formation\Request\UpdateMoldModelMasterRequest;
use Gs2\Formation\Result\UpdateMoldModelMasterResult;
use Gs2\Formation\Request\DeleteMoldModelMasterRequest;
use Gs2\Formation\Result\DeleteMoldModelMasterResult;
use Gs2\Formation\Request\DescribePropertyFormModelsRequest;
use Gs2\Formation\Result\DescribePropertyFormModelsResult;
use Gs2\Formation\Request\GetPropertyFormModelRequest;
use Gs2\Formation\Result\GetPropertyFormModelResult;
use Gs2\Formation\Request\DescribePropertyFormModelMastersRequest;
use Gs2\Formation\Result\DescribePropertyFormModelMastersResult;
use Gs2\Formation\Request\CreatePropertyFormModelMasterRequest;
use Gs2\Formation\Result\CreatePropertyFormModelMasterResult;
use Gs2\Formation\Request\GetPropertyFormModelMasterRequest;
use Gs2\Formation\Result\GetPropertyFormModelMasterResult;
use Gs2\Formation\Request\UpdatePropertyFormModelMasterRequest;
use Gs2\Formation\Result\UpdatePropertyFormModelMasterResult;
use Gs2\Formation\Request\DeletePropertyFormModelMasterRequest;
use Gs2\Formation\Result\DeletePropertyFormModelMasterResult;
use Gs2\Formation\Request\ExportMasterRequest;
use Gs2\Formation\Result\ExportMasterResult;
use Gs2\Formation\Request\GetCurrentFormMasterRequest;
use Gs2\Formation\Result\GetCurrentFormMasterResult;
use Gs2\Formation\Request\PreUpdateCurrentFormMasterRequest;
use Gs2\Formation\Result\PreUpdateCurrentFormMasterResult;
use Gs2\Formation\Request\UpdateCurrentFormMasterRequest;
use Gs2\Formation\Result\UpdateCurrentFormMasterResult;
use Gs2\Formation\Request\UpdateCurrentFormMasterFromGitHubRequest;
use Gs2\Formation\Result\UpdateCurrentFormMasterFromGitHubResult;
use Gs2\Formation\Request\DescribeMoldsRequest;
use Gs2\Formation\Result\DescribeMoldsResult;
use Gs2\Formation\Request\DescribeMoldsByUserIdRequest;
use Gs2\Formation\Result\DescribeMoldsByUserIdResult;
use Gs2\Formation\Request\GetMoldRequest;
use Gs2\Formation\Result\GetMoldResult;
use Gs2\Formation\Request\GetMoldByUserIdRequest;
use Gs2\Formation\Result\GetMoldByUserIdResult;
use Gs2\Formation\Request\SetMoldCapacityByUserIdRequest;
use Gs2\Formation\Result\SetMoldCapacityByUserIdResult;
use Gs2\Formation\Request\AddMoldCapacityByUserIdRequest;
use Gs2\Formation\Result\AddMoldCapacityByUserIdResult;
use Gs2\Formation\Request\SubMoldCapacityRequest;
use Gs2\Formation\Result\SubMoldCapacityResult;
use Gs2\Formation\Request\SubMoldCapacityByUserIdRequest;
use Gs2\Formation\Result\SubMoldCapacityByUserIdResult;
use Gs2\Formation\Request\DeleteMoldRequest;
use Gs2\Formation\Result\DeleteMoldResult;
use Gs2\Formation\Request\DeleteMoldByUserIdRequest;
use Gs2\Formation\Result\DeleteMoldByUserIdResult;
use Gs2\Formation\Request\AddCapacityByStampSheetRequest;
use Gs2\Formation\Result\AddCapacityByStampSheetResult;
use Gs2\Formation\Request\SubCapacityByStampTaskRequest;
use Gs2\Formation\Result\SubCapacityByStampTaskResult;
use Gs2\Formation\Request\SetCapacityByStampSheetRequest;
use Gs2\Formation\Result\SetCapacityByStampSheetResult;
use Gs2\Formation\Request\DescribeFormsRequest;
use Gs2\Formation\Result\DescribeFormsResult;
use Gs2\Formation\Request\DescribeFormsByUserIdRequest;
use Gs2\Formation\Result\DescribeFormsByUserIdResult;
use Gs2\Formation\Request\GetFormRequest;
use Gs2\Formation\Result\GetFormResult;
use Gs2\Formation\Request\GetFormByUserIdRequest;
use Gs2\Formation\Result\GetFormByUserIdResult;
use Gs2\Formation\Request\GetFormWithSignatureRequest;
use Gs2\Formation\Result\GetFormWithSignatureResult;
use Gs2\Formation\Request\GetFormWithSignatureByUserIdRequest;
use Gs2\Formation\Result\GetFormWithSignatureByUserIdResult;
use Gs2\Formation\Request\SetFormRequest;
use Gs2\Formation\Result\SetFormResult;
use Gs2\Formation\Request\SetFormByUserIdRequest;
use Gs2\Formation\Result\SetFormByUserIdResult;
use Gs2\Formation\Request\SetFormWithSignatureRequest;
use Gs2\Formation\Result\SetFormWithSignatureResult;
use Gs2\Formation\Request\AcquireActionsToFormPropertiesRequest;
use Gs2\Formation\Result\AcquireActionsToFormPropertiesResult;
use Gs2\Formation\Request\DeleteFormRequest;
use Gs2\Formation\Result\DeleteFormResult;
use Gs2\Formation\Request\DeleteFormByUserIdRequest;
use Gs2\Formation\Result\DeleteFormByUserIdResult;
use Gs2\Formation\Request\AcquireActionToFormPropertiesByStampSheetRequest;
use Gs2\Formation\Result\AcquireActionToFormPropertiesByStampSheetResult;
use Gs2\Formation\Request\SetFormByStampSheetRequest;
use Gs2\Formation\Result\SetFormByStampSheetResult;
use Gs2\Formation\Request\DescribePropertyFormsRequest;
use Gs2\Formation\Result\DescribePropertyFormsResult;
use Gs2\Formation\Request\DescribePropertyFormsByUserIdRequest;
use Gs2\Formation\Result\DescribePropertyFormsByUserIdResult;
use Gs2\Formation\Request\GetPropertyFormRequest;
use Gs2\Formation\Result\GetPropertyFormResult;
use Gs2\Formation\Request\GetPropertyFormByUserIdRequest;
use Gs2\Formation\Result\GetPropertyFormByUserIdResult;
use Gs2\Formation\Request\GetPropertyFormWithSignatureRequest;
use Gs2\Formation\Result\GetPropertyFormWithSignatureResult;
use Gs2\Formation\Request\GetPropertyFormWithSignatureByUserIdRequest;
use Gs2\Formation\Result\GetPropertyFormWithSignatureByUserIdResult;
use Gs2\Formation\Request\SetPropertyFormRequest;
use Gs2\Formation\Result\SetPropertyFormResult;
use Gs2\Formation\Request\SetPropertyFormByUserIdRequest;
use Gs2\Formation\Result\SetPropertyFormByUserIdResult;
use Gs2\Formation\Request\SetPropertyFormWithSignatureRequest;
use Gs2\Formation\Result\SetPropertyFormWithSignatureResult;
use Gs2\Formation\Request\AcquireActionsToPropertyFormPropertiesRequest;
use Gs2\Formation\Result\AcquireActionsToPropertyFormPropertiesResult;
use Gs2\Formation\Request\DeletePropertyFormRequest;
use Gs2\Formation\Result\DeletePropertyFormResult;
use Gs2\Formation\Request\DeletePropertyFormByUserIdRequest;
use Gs2\Formation\Result\DeletePropertyFormByUserIdResult;
use Gs2\Formation\Request\AcquireActionToPropertyFormPropertiesByStampSheetRequest;
use Gs2\Formation\Result\AcquireActionToPropertyFormPropertiesByStampSheetResult;

class DescribeNamespacesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNamespacesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNamespacesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNamespacesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNamespacesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNamespacesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var CreateNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param CreateNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            CreateNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getUpdateMoldScript() !== null) {
            $json["updateMoldScript"] = $this->request->getUpdateMoldScript()->toJson();
        }
        if ($this->request->getUpdateFormScript() !== null) {
            $json["updateFormScript"] = $this->request->getUpdateFormScript()->toJson();
        }
        if ($this->request->getUpdatePropertyFormScript() !== null) {
            $json["updatePropertyFormScript"] = $this->request->getUpdatePropertyFormScript()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetNamespaceStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetNamespaceStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNamespaceStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetNamespaceStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNamespaceStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetNamespaceStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var GetNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param GetNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            GetNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var UpdateNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getUpdateMoldScript() !== null) {
            $json["updateMoldScript"] = $this->request->getUpdateMoldScript()->toJson();
        }
        if ($this->request->getUpdateFormScript() !== null) {
            $json["updateFormScript"] = $this->request->getUpdateFormScript()->toJson();
        }
        if ($this->request->getUpdatePropertyFormScript() !== null) {
            $json["updatePropertyFormScript"] = $this->request->getUpdatePropertyFormScript()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var DeleteNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetServiceVersionTask extends Gs2RestSessionTask {

    /**
     * @var GetServiceVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetServiceVersionTask constructor.
     * @param Gs2RestSession $session
     * @param GetServiceVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetServiceVersionRequest $request
    ) {
        parent::__construct(
            $session,
            GetServiceVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckDumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckDumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckDumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckDumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckDumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckDumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckCleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckCleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckCleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckCleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckCleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckCleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PrepareImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetFormModelTask extends Gs2RestSessionTask {

    /**
     * @var GetFormModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{moldModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeFormModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeMoldModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/mold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetMoldModelTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeMoldModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getFormModelName() !== null) {
            $json["formModelName"] = $this->request->getFormModelName();
        }
        if ($this->request->getInitialMaxCapacity() !== null) {
            $json["initialMaxCapacity"] = $this->request->getInitialMaxCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getFormModelName() !== null) {
            $json["formModelName"] = $this->request->getFormModelName();
        }
        if ($this->request->getInitialMaxCapacity() !== null) {
            $json["initialMaxCapacity"] = $this->request->getInitialMaxCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribePropertyFormModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribePropertyFormModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePropertyFormModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePropertyFormModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePropertyFormModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePropertyFormModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/propertyForm";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormModelTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/propertyForm/{propertyFormModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribePropertyFormModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribePropertyFormModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePropertyFormModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePropertyFormModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePropertyFormModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePropertyFormModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/propertyForm";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreatePropertyFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreatePropertyFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreatePropertyFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreatePropertyFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreatePropertyFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreatePropertyFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/propertyForm";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/propertyForm/{propertyFormModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdatePropertyFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdatePropertyFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdatePropertyFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdatePropertyFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdatePropertyFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdatePropertyFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/propertyForm/{propertyFormModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeletePropertyFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeletePropertyFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePropertyFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePropertyFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePropertyFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePropertyFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/propertyForm/{propertyFormModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class ExportMasterTask extends Gs2RestSessionTask {

    /**
     * @var ExportMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExportMasterTask constructor.
     * @param Gs2RestSession $session
     * @param ExportMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExportMasterRequest $request
    ) {
        parent::__construct(
            $session,
            ExportMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetCurrentFormMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentFormMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentFormMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentFormMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentFormMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentFormMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class PreUpdateCurrentFormMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentFormMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentFormMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentFormMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentFormMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentFormMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentFormMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFormMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFormMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFormMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFormMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFormMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentFormMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentFormMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentFormMasterResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getSettings(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withSettings(null);
        }

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentFormMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFormMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFormMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFormMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFormMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() !== null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeMoldsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeMoldsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetMoldTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetMoldByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetMoldCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetMoldCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMoldCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetMoldCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMoldCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetMoldCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AddMoldCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddMoldCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddMoldCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddMoldCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddMoldCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddMoldCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SubMoldCapacityTask extends Gs2RestSessionTask {

    /**
     * @var SubMoldCapacityRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubMoldCapacityTask constructor.
     * @param Gs2RestSession $session
     * @param SubMoldCapacityRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubMoldCapacityRequest $request
    ) {
        parent::__construct(
            $session,
            SubMoldCapacityResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class SubMoldCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubMoldCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubMoldCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubMoldCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubMoldCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubMoldCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteMoldTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteMoldByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AddCapacityByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddCapacityByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddCapacityByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddCapacityByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddCapacityByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddCapacityByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/mold/capacity/add";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class SubCapacityByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var SubCapacityByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubCapacityByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param SubCapacityByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubCapacityByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            SubCapacityByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/mold/capacity/sub";

        $json = [];
        if ($this->request->getStampTask() !== null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class SetCapacityByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetCapacityByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetCapacityByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetCapacityByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetCapacityByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetCapacityByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/mold/capacity/set";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeFormsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeFormsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetFormTask extends Gs2RestSessionTask {

    /**
     * @var GetFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form/{index}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetFormWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFormWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form/{index}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetFormTask extends Gs2RestSessionTask {

    /**
     * @var SetFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form/{index}/raw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class SetFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var SetFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AcquireActionsToFormPropertiesTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionsToFormPropertiesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionsToFormPropertiesTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionsToFormPropertiesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionsToFormPropertiesRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionsToFormPropertiesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form/{index}/stamp/delegate";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getAcquireAction() !== null) {
            $json["acquireAction"] = $this->request->getAcquireAction()->toJson();
        }
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteFormTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldModelName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireActionToFormPropertiesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionToFormPropertiesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionToFormPropertiesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionToFormPropertiesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionToFormPropertiesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/form/acquire";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class SetFormByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetFormByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/form/set";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribePropertyFormsTask extends Gs2RestSessionTask {

    /**
     * @var DescribePropertyFormsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePropertyFormsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePropertyFormsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePropertyFormsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePropertyFormsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribePropertyFormsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribePropertyFormsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePropertyFormsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePropertyFormsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePropertyFormsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePropertyFormsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form/{propertyId}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetPropertyFormWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetPropertyFormWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPropertyFormWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetPropertyFormWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPropertyFormWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetPropertyFormWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form/{propertyId}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetPropertyFormTask extends Gs2RestSessionTask {

    /**
     * @var SetPropertyFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetPropertyFormTask constructor.
     * @param Gs2RestSession $session
     * @param SetPropertyFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetPropertyFormRequest $request
    ) {
        parent::__construct(
            $session,
            SetPropertyFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form/{propertyId}/raw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class SetPropertyFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetPropertyFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetPropertyFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetPropertyFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetPropertyFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetPropertyFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetPropertyFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var SetPropertyFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetPropertyFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param SetPropertyFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetPropertyFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            SetPropertyFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AcquireActionsToPropertyFormPropertiesTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionsToPropertyFormPropertiesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionsToPropertyFormPropertiesTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionsToPropertyFormPropertiesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionsToPropertyFormPropertiesRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionsToPropertyFormPropertiesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form/{propertyId}/stamp/delegate";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getAcquireAction() !== null) {
            $json["acquireAction"] = $this->request->getAcquireAction()->toJson();
        }
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeletePropertyFormTask extends Gs2RestSessionTask {

    /**
     * @var DeletePropertyFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePropertyFormTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePropertyFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePropertyFormRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePropertyFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeletePropertyFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeletePropertyFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePropertyFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePropertyFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePropertyFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePropertyFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/property/{propertyFormModelName}/form/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyFormModelName}", $this->request->getPropertyFormModelName() === null|| strlen($this->request->getPropertyFormModelName()) == 0 ? "null" : $this->request->getPropertyFormModelName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireActionToPropertyFormPropertiesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionToPropertyFormPropertiesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionToPropertyFormPropertiesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionToPropertyFormPropertiesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/property/form/acquire";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2-Formation API client
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/
 */
class Gs2FormationRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describenamespaces
     */
    public function describeNamespacesAsync(
            DescribeNamespacesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNamespacesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return DescribeNamespacesResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describenamespaces
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {
        return $this->describeNamespacesAsync(
            $request
        )->wait();
    }

    /**
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createnamespace
     */
    public function createNamespaceAsync(
            CreateNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return CreateNamespaceResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createnamespace
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getnamespacestatus
     */
    public function getNamespaceStatusAsync(
            GetNamespaceStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNamespaceStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return GetNamespaceStatusResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getnamespacestatus
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getnamespace
     */
    public function getNamespaceAsync(
            GetNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return GetNamespaceResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getnamespace
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {
        return $this->getNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatenamespace
     */
    public function updateNamespaceAsync(
            UpdateNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return UpdateNamespaceResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatenamespace
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {
        return $this->updateNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletenamespace
     */
    public function deleteNamespaceAsync(
            DeleteNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return DeleteNamespaceResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletenamespace
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getserviceversion
     */
    public function getServiceVersionAsync(
            GetServiceVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetServiceVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getserviceversion
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#dumpuserdatabyuserid
     */
    public function dumpUserDataByUserIdAsync(
            DumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#dumpuserdatabyuserid
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkdumpuserdatabyuserid
     */
    public function checkDumpUserDataByUserIdAsync(
            CheckDumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckDumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkdumpuserdatabyuserid
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserIdAsync(
            CleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkcleanuserdatabyuserid
     */
    public function checkCleanUserDataByUserIdAsync(
            CheckCleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckCleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkcleanuserdatabyuserid
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#prepareimportuserdatabyuserid
     */
    public function prepareImportUserDataByUserIdAsync(
            PrepareImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#prepareimportuserdatabyuserid
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#importuserdatabyuserid
     */
    public function importUserDataByUserIdAsync(
            ImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#importuserdatabyuserid
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserIdAsync(
            CheckImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Model
     *
     * @param GetFormModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformmodel
     */
    public function getFormModelAsync(
            GetFormModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Model
     *
     * @param GetFormModelRequest $request
     * @return GetFormModelResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformmodel
     */
    public function getFormModel (
            GetFormModelRequest $request
    ): GetFormModelResult {
        return $this->getFormModelAsync(
            $request
        )->wait();
    }

    /**
     * List Form Model Masters
     *
     * @param DescribeFormModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeformmodelmasters
     */
    public function describeFormModelMastersAsync(
            DescribeFormModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Form Model Masters
     *
     * @param DescribeFormModelMastersRequest $request
     * @return DescribeFormModelMastersResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeformmodelmasters
     */
    public function describeFormModelMasters (
            DescribeFormModelMastersRequest $request
    ): DescribeFormModelMastersResult {
        return $this->describeFormModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Form Model Master
     *
     * @param CreateFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createformmodelmaster
     */
    public function createFormModelMasterAsync(
            CreateFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Form Model Master
     *
     * @param CreateFormModelMasterRequest $request
     * @return CreateFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createformmodelmaster
     */
    public function createFormModelMaster (
            CreateFormModelMasterRequest $request
    ): CreateFormModelMasterResult {
        return $this->createFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Model Master
     *
     * @param GetFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformmodelmaster
     */
    public function getFormModelMasterAsync(
            GetFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Model Master
     *
     * @param GetFormModelMasterRequest $request
     * @return GetFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformmodelmaster
     */
    public function getFormModelMaster (
            GetFormModelMasterRequest $request
    ): GetFormModelMasterResult {
        return $this->getFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Form Model Master
     *
     * @param UpdateFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updateformmodelmaster
     */
    public function updateFormModelMasterAsync(
            UpdateFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Form Model Master
     *
     * @param UpdateFormModelMasterRequest $request
     * @return UpdateFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updateformmodelmaster
     */
    public function updateFormModelMaster (
            UpdateFormModelMasterRequest $request
    ): UpdateFormModelMasterResult {
        return $this->updateFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Form Model Master
     *
     * @param DeleteFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteformmodelmaster
     */
    public function deleteFormModelMasterAsync(
            DeleteFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Form Model Master
     *
     * @param DeleteFormModelMasterRequest $request
     * @return DeleteFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteformmodelmaster
     */
    public function deleteFormModelMaster (
            DeleteFormModelMasterRequest $request
    ): DeleteFormModelMasterResult {
        return $this->deleteFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Form Storage Area Models
     *
     * @param DescribeMoldModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldmodels
     */
    public function describeMoldModelsAsync(
            DescribeMoldModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Form Storage Area Models
     *
     * @param DescribeMoldModelsRequest $request
     * @return DescribeMoldModelsResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldmodels
     */
    public function describeMoldModels (
            DescribeMoldModelsRequest $request
    ): DescribeMoldModelsResult {
        return $this->describeMoldModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Storage Area Model
     *
     * @param GetMoldModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldmodel
     */
    public function getMoldModelAsync(
            GetMoldModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Storage Area Model
     *
     * @param GetMoldModelRequest $request
     * @return GetMoldModelResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldmodel
     */
    public function getMoldModel (
            GetMoldModelRequest $request
    ): GetMoldModelResult {
        return $this->getMoldModelAsync(
            $request
        )->wait();
    }

    /**
     * List Form Storage Area Masters
     *
     * @param DescribeMoldModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldmodelmasters
     */
    public function describeMoldModelMastersAsync(
            DescribeMoldModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Form Storage Area Masters
     *
     * @param DescribeMoldModelMastersRequest $request
     * @return DescribeMoldModelMastersResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldmodelmasters
     */
    public function describeMoldModelMasters (
            DescribeMoldModelMastersRequest $request
    ): DescribeMoldModelMastersResult {
        return $this->describeMoldModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Form Storage Area Master
     *
     * @param CreateMoldModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createmoldmodelmaster
     */
    public function createMoldModelMasterAsync(
            CreateMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Form Storage Area Master
     *
     * @param CreateMoldModelMasterRequest $request
     * @return CreateMoldModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createmoldmodelmaster
     */
    public function createMoldModelMaster (
            CreateMoldModelMasterRequest $request
    ): CreateMoldModelMasterResult {
        return $this->createMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Storage Area Master
     *
     * @param GetMoldModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldmodelmaster
     */
    public function getMoldModelMasterAsync(
            GetMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Storage Area Master
     *
     * @param GetMoldModelMasterRequest $request
     * @return GetMoldModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldmodelmaster
     */
    public function getMoldModelMaster (
            GetMoldModelMasterRequest $request
    ): GetMoldModelMasterResult {
        return $this->getMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Form Storage Area Master
     *
     * @param UpdateMoldModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatemoldmodelmaster
     */
    public function updateMoldModelMasterAsync(
            UpdateMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Form Storage Area Master
     *
     * @param UpdateMoldModelMasterRequest $request
     * @return UpdateMoldModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatemoldmodelmaster
     */
    public function updateMoldModelMaster (
            UpdateMoldModelMasterRequest $request
    ): UpdateMoldModelMasterResult {
        return $this->updateMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Form Storage Area Master
     *
     * @param DeleteMoldModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemoldmodelmaster
     */
    public function deleteMoldModelMasterAsync(
            DeleteMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Form Storage Area Master
     *
     * @param DeleteMoldModelMasterRequest $request
     * @return DeleteMoldModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemoldmodelmaster
     */
    public function deleteMoldModelMaster (
            DeleteMoldModelMasterRequest $request
    ): DeleteMoldModelMasterResult {
        return $this->deleteMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Property Form Models
     *
     * @param DescribePropertyFormModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformmodels
     */
    public function describePropertyFormModelsAsync(
            DescribePropertyFormModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePropertyFormModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Property Form Models
     *
     * @param DescribePropertyFormModelsRequest $request
     * @return DescribePropertyFormModelsResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformmodels
     */
    public function describePropertyFormModels (
            DescribePropertyFormModelsRequest $request
    ): DescribePropertyFormModelsResult {
        return $this->describePropertyFormModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Property Form Model
     *
     * @param GetPropertyFormModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodel
     */
    public function getPropertyFormModelAsync(
            GetPropertyFormModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Property Form Model
     *
     * @param GetPropertyFormModelRequest $request
     * @return GetPropertyFormModelResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodel
     */
    public function getPropertyFormModel (
            GetPropertyFormModelRequest $request
    ): GetPropertyFormModelResult {
        return $this->getPropertyFormModelAsync(
            $request
        )->wait();
    }

    /**
     * List Property Form Model Masters
     *
     * @param DescribePropertyFormModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformmodelmasters
     */
    public function describePropertyFormModelMastersAsync(
            DescribePropertyFormModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePropertyFormModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Property Form Model Masters
     *
     * @param DescribePropertyFormModelMastersRequest $request
     * @return DescribePropertyFormModelMastersResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformmodelmasters
     */
    public function describePropertyFormModelMasters (
            DescribePropertyFormModelMastersRequest $request
    ): DescribePropertyFormModelMastersResult {
        return $this->describePropertyFormModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Property Form Model Master
     *
     * @param CreatePropertyFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createpropertyformmodelmaster
     */
    public function createPropertyFormModelMasterAsync(
            CreatePropertyFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreatePropertyFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Property Form Model Master
     *
     * @param CreatePropertyFormModelMasterRequest $request
     * @return CreatePropertyFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#createpropertyformmodelmaster
     */
    public function createPropertyFormModelMaster (
            CreatePropertyFormModelMasterRequest $request
    ): CreatePropertyFormModelMasterResult {
        return $this->createPropertyFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Property Form Model Master
     *
     * @param GetPropertyFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodelmaster
     */
    public function getPropertyFormModelMasterAsync(
            GetPropertyFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Property Form Model Master
     *
     * @param GetPropertyFormModelMasterRequest $request
     * @return GetPropertyFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodelmaster
     */
    public function getPropertyFormModelMaster (
            GetPropertyFormModelMasterRequest $request
    ): GetPropertyFormModelMasterResult {
        return $this->getPropertyFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Property Form Model Master
     *
     * @param UpdatePropertyFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatepropertyformmodelmaster
     */
    public function updatePropertyFormModelMasterAsync(
            UpdatePropertyFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdatePropertyFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Property Form Model Master
     *
     * @param UpdatePropertyFormModelMasterRequest $request
     * @return UpdatePropertyFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatepropertyformmodelmaster
     */
    public function updatePropertyFormModelMaster (
            UpdatePropertyFormModelMasterRequest $request
    ): UpdatePropertyFormModelMasterResult {
        return $this->updatePropertyFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Property Form Model Master
     *
     * @param DeletePropertyFormModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyformmodelmaster
     */
    public function deletePropertyFormModelMasterAsync(
            DeletePropertyFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePropertyFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Property Form Model Master
     *
     * @param DeletePropertyFormModelMasterRequest $request
     * @return DeletePropertyFormModelMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyformmodelmaster
     */
    public function deletePropertyFormModelMaster (
            DeletePropertyFormModelMasterRequest $request
    ): DeletePropertyFormModelMasterResult {
        return $this->deletePropertyFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Form Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#exportmaster
     */
    public function exportMasterAsync(
            ExportMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExportMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Export Form Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Form Model master data
     *
     * @param GetCurrentFormMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getcurrentformmaster
     */
    public function getCurrentFormMasterAsync(
            GetCurrentFormMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentFormMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Form Model master data
     *
     * @param GetCurrentFormMasterRequest $request
     * @return GetCurrentFormMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getcurrentformmaster
     */
    public function getCurrentFormMaster (
            GetCurrentFormMasterRequest $request
    ): GetCurrentFormMasterResult {
        return $this->getCurrentFormMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Currently active Form Model master data (3-phase version)
     *
     * @param PreUpdateCurrentFormMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#preupdatecurrentformmaster
     */
    public function preUpdateCurrentFormMasterAsync(
            PreUpdateCurrentFormMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentFormMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Currently active Form Model master data (3-phase version)
     *
     * @param PreUpdateCurrentFormMasterRequest $request
     * @return PreUpdateCurrentFormMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#preupdatecurrentformmaster
     */
    public function preUpdateCurrentFormMaster (
            PreUpdateCurrentFormMasterRequest $request
    ): PreUpdateCurrentFormMasterResult {
        return $this->preUpdateCurrentFormMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Form Model master data
     *
     * @param UpdateCurrentFormMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatecurrentformmaster
     */
    public function updateCurrentFormMasterAsync(
            UpdateCurrentFormMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFormMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Form Model master data
     *
     * @param UpdateCurrentFormMasterRequest $request
     * @return UpdateCurrentFormMasterResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatecurrentformmaster
     */
    public function updateCurrentFormMaster (
            UpdateCurrentFormMasterRequest $request
    ): UpdateCurrentFormMasterResult {
        return $this->updateCurrentFormMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Form Model master data from GitHub
     *
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatecurrentformmasterfromgithub
     */
    public function updateCurrentFormMasterFromGitHubAsync(
            UpdateCurrentFormMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFormMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Form Model master data from GitHub
     *
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     * @return UpdateCurrentFormMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#updatecurrentformmasterfromgithub
     */
    public function updateCurrentFormMasterFromGitHub (
            UpdateCurrentFormMasterFromGitHubRequest $request
    ): UpdateCurrentFormMasterFromGitHubResult {
        return $this->updateCurrentFormMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Form Storage Areas
     *
     * @param DescribeMoldsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemolds
     */
    public function describeMoldsAsync(
            DescribeMoldsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Form Storage Areas
     *
     * @param DescribeMoldsRequest $request
     * @return DescribeMoldsResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemolds
     */
    public function describeMolds (
            DescribeMoldsRequest $request
    ): DescribeMoldsResult {
        return $this->describeMoldsAsync(
            $request
        )->wait();
    }

    /**
     * List Form Storage Areas by User ID
     *
     * @param DescribeMoldsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldsbyuserid
     */
    public function describeMoldsByUserIdAsync(
            DescribeMoldsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Form Storage Areas by User ID
     *
     * @param DescribeMoldsByUserIdRequest $request
     * @return DescribeMoldsByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldsbyuserid
     */
    public function describeMoldsByUserId (
            DescribeMoldsByUserIdRequest $request
    ): DescribeMoldsByUserIdResult {
        return $this->describeMoldsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Storage Area
     *
     * @param GetMoldRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmold
     */
    public function getMoldAsync(
            GetMoldRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Storage Area
     *
     * @param GetMoldRequest $request
     * @return GetMoldResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmold
     */
    public function getMold (
            GetMoldRequest $request
    ): GetMoldResult {
        return $this->getMoldAsync(
            $request
        )->wait();
    }

    /**
     * Get Form Storage Area by User ID
     *
     * @param GetMoldByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldbyuserid
     */
    public function getMoldByUserIdAsync(
            GetMoldByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form Storage Area by User ID
     *
     * @param GetMoldByUserIdRequest $request
     * @return GetMoldByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getmoldbyuserid
     */
    public function getMoldByUserId (
            GetMoldByUserIdRequest $request
    ): GetMoldByUserIdResult {
        return $this->getMoldByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Set capacity size with specified user ID
     *
     * @param SetMoldCapacityByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setmoldcapacitybyuserid
     */
    public function setMoldCapacityByUserIdAsync(
            SetMoldCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMoldCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set capacity size with specified user ID
     *
     * @param SetMoldCapacityByUserIdRequest $request
     * @return SetMoldCapacityByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setmoldcapacitybyuserid
     */
    public function setMoldCapacityByUserId (
            SetMoldCapacityByUserIdRequest $request
    ): SetMoldCapacityByUserIdResult {
        return $this->setMoldCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Add capacity size by User ID
     *
     * @param AddMoldCapacityByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#addmoldcapacitybyuserid
     */
    public function addMoldCapacityByUserIdAsync(
            AddMoldCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddMoldCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add capacity size by User ID
     *
     * @param AddMoldCapacityByUserIdRequest $request
     * @return AddMoldCapacityByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#addmoldcapacitybyuserid
     */
    public function addMoldCapacityByUserId (
            AddMoldCapacityByUserIdRequest $request
    ): AddMoldCapacityByUserIdResult {
        return $this->addMoldCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Subtract capacity size
     *
     * @param SubMoldCapacityRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#submoldcapacity
     */
    public function subMoldCapacityAsync(
            SubMoldCapacityRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubMoldCapacityTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract capacity size
     *
     * @param SubMoldCapacityRequest $request
     * @return SubMoldCapacityResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#submoldcapacity
     */
    public function subMoldCapacity (
            SubMoldCapacityRequest $request
    ): SubMoldCapacityResult {
        return $this->subMoldCapacityAsync(
            $request
        )->wait();
    }

    /**
     * Subtract capacity size by User ID
     *
     * @param SubMoldCapacityByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#submoldcapacitybyuserid
     */
    public function subMoldCapacityByUserIdAsync(
            SubMoldCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubMoldCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract capacity size by User ID
     *
     * @param SubMoldCapacityByUserIdRequest $request
     * @return SubMoldCapacityByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#submoldcapacitybyuserid
     */
    public function subMoldCapacityByUserId (
            SubMoldCapacityByUserIdRequest $request
    ): SubMoldCapacityByUserIdResult {
        return $this->subMoldCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Form Storage Area
     *
     * @param DeleteMoldRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemold
     */
    public function deleteMoldAsync(
            DeleteMoldRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Form Storage Area
     *
     * @param DeleteMoldRequest $request
     * @return DeleteMoldResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemold
     */
    public function deleteMold (
            DeleteMoldRequest $request
    ): DeleteMoldResult {
        return $this->deleteMoldAsync(
            $request
        )->wait();
    }

    /**
     * Delete Form Storage Area by User ID
     *
     * @param DeleteMoldByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemoldbyuserid
     */
    public function deleteMoldByUserIdAsync(
            DeleteMoldByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Form Storage Area by User ID
     *
     * @param DeleteMoldByUserIdRequest $request
     * @return DeleteMoldByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletemoldbyuserid
     */
    public function deleteMoldByUserId (
            DeleteMoldByUserIdRequest $request
    ): DeleteMoldByUserIdResult {
        return $this->deleteMoldByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute capacity size addition as acquire action
     *
     * @param AddCapacityByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationaddmoldcapacitybyuserid
     */
    public function addCapacityByStampSheetAsync(
            AddCapacityByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddCapacityByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute capacity size addition as acquire action
     *
     * @param AddCapacityByStampSheetRequest $request
     * @return AddCapacityByStampSheetResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationaddmoldcapacitybyuserid
     */
    public function addCapacityByStampSheet (
            AddCapacityByStampSheetRequest $request
    ): AddCapacityByStampSheetResult {
        return $this->addCapacityByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute capacity size subtraction as consume action
     *
     * @param SubCapacityByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsubmoldcapacitybyuserid
     */
    public function subCapacityByStampTaskAsync(
            SubCapacityByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubCapacityByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute capacity size subtraction as consume action
     *
     * @param SubCapacityByStampTaskRequest $request
     * @return SubCapacityByStampTaskResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsubmoldcapacitybyuserid
     */
    public function subCapacityByStampTask (
            SubCapacityByStampTaskRequest $request
    ): SubCapacityByStampTaskResult {
        return $this->subCapacityByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute capacity size setting as acquire action
     *
     * @param SetCapacityByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsetmoldcapacitybyuserid
     */
    public function setCapacityByStampSheetAsync(
            SetCapacityByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetCapacityByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute capacity size setting as acquire action
     *
     * @param SetCapacityByStampSheetRequest $request
     * @return SetCapacityByStampSheetResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsetmoldcapacitybyuserid
     */
    public function setCapacityByStampSheet (
            SetCapacityByStampSheetRequest $request
    ): SetCapacityByStampSheetResult {
        return $this->setCapacityByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * List Forms
     *
     * @param DescribeFormsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeforms
     */
    public function describeFormsAsync(
            DescribeFormsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Forms
     *
     * @param DescribeFormsRequest $request
     * @return DescribeFormsResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeforms
     */
    public function describeForms (
            DescribeFormsRequest $request
    ): DescribeFormsResult {
        return $this->describeFormsAsync(
            $request
        )->wait();
    }

    /**
     * List Forms by User ID
     *
     * @param DescribeFormsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeformsbyuserid
     */
    public function describeFormsByUserIdAsync(
            DescribeFormsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Forms by User ID
     *
     * @param DescribeFormsByUserIdRequest $request
     * @return DescribeFormsByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describeformsbyuserid
     */
    public function describeFormsByUserId (
            DescribeFormsByUserIdRequest $request
    ): DescribeFormsByUserIdResult {
        return $this->describeFormsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Form
     *
     * @param GetFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getform
     */
    public function getFormAsync(
            GetFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form
     *
     * @param GetFormRequest $request
     * @return GetFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getform
     */
    public function getForm (
            GetFormRequest $request
    ): GetFormResult {
        return $this->getFormAsync(
            $request
        )->wait();
    }

    /**
     * Get Form by User ID
     *
     * @param GetFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformbyuserid
     */
    public function getFormByUserIdAsync(
            GetFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Form by User ID
     *
     * @param GetFormByUserIdRequest $request
     * @return GetFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformbyuserid
     */
    public function getFormByUserId (
            GetFormByUserIdRequest $request
    ): GetFormByUserIdResult {
        return $this->getFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Retrieve signed forms
     *
     * @param GetFormWithSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformwithsignature
     */
    public function getFormWithSignatureAsync(
            GetFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Retrieve signed forms
     *
     * @param GetFormWithSignatureRequest $request
     * @return GetFormWithSignatureResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformwithsignature
     */
    public function getFormWithSignature (
            GetFormWithSignatureRequest $request
    ): GetFormWithSignatureResult {
        return $this->getFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Get signed Form by User ID
     *
     * @param GetFormWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformwithsignaturebyuserid
     */
    public function getFormWithSignatureByUserIdAsync(
            GetFormWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get signed Form by User ID
     *
     * @param GetFormWithSignatureByUserIdRequest $request
     * @return GetFormWithSignatureByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getformwithsignaturebyuserid
     */
    public function getFormWithSignatureByUserId (
            GetFormWithSignatureByUserIdRequest $request
    ): GetFormWithSignatureByUserIdResult {
        return $this->getFormWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Set form
     *
     * @param SetFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setform
     */
    public function setFormAsync(
            SetFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set form
     *
     * @param SetFormRequest $request
     * @return SetFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setform
     */
    public function setForm (
            SetFormRequest $request
    ): SetFormResult {
        return $this->setFormAsync(
            $request
        )->wait();
    }

    /**
     * Set form by User ID
     *
     * @param SetFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setformbyuserid
     */
    public function setFormByUserIdAsync(
            SetFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set form by User ID
     *
     * @param SetFormByUserIdRequest $request
     * @return SetFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setformbyuserid
     */
    public function setFormByUserId (
            SetFormByUserIdRequest $request
    ): SetFormByUserIdResult {
        return $this->setFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update forms with signed slots
     *
     * @param SetFormWithSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setformwithsignature
     */
    public function setFormWithSignatureAsync(
            SetFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update forms with signed slots
     *
     * @param SetFormWithSignatureRequest $request
     * @return SetFormWithSignatureResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setformwithsignature
     */
    public function setFormWithSignature (
            SetFormWithSignatureRequest $request
    ): SetFormWithSignatureResult {
        return $this->setFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Apply acquire action to Form Properties by User ID
     *
     * @param AcquireActionsToFormPropertiesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstoformproperties
     */
    public function acquireActionsToFormPropertiesAsync(
            AcquireActionsToFormPropertiesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionsToFormPropertiesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Apply acquire action to Form Properties by User ID
     *
     * @param AcquireActionsToFormPropertiesRequest $request
     * @return AcquireActionsToFormPropertiesResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstoformproperties
     */
    public function acquireActionsToFormProperties (
            AcquireActionsToFormPropertiesRequest $request
    ): AcquireActionsToFormPropertiesResult {
        return $this->acquireActionsToFormPropertiesAsync(
            $request
        )->wait();
    }

    /**
     * Delete form
     *
     * @param DeleteFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteform
     */
    public function deleteFormAsync(
            DeleteFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete form
     *
     * @param DeleteFormRequest $request
     * @return DeleteFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteform
     */
    public function deleteForm (
            DeleteFormRequest $request
    ): DeleteFormResult {
        return $this->deleteFormAsync(
            $request
        )->wait();
    }

    /**
     * Delete Form by User ID
     *
     * @param DeleteFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteformbyuserid
     */
    public function deleteFormByUserIdAsync(
            DeleteFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Form by User ID
     *
     * @param DeleteFormByUserIdRequest $request
     * @return DeleteFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteformbyuserid
     */
    public function deleteFormByUserId (
            DeleteFormByUserIdRequest $request
    ): DeleteFormByUserIdResult {
        return $this->deleteFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the acquire action application to form properties as an acquire action
     *
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationacquireactionstoformproperties
     */
    public function acquireActionToFormPropertiesByStampSheetAsync(
            AcquireActionToFormPropertiesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionToFormPropertiesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the acquire action application to form properties as an acquire action
     *
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     * @return AcquireActionToFormPropertiesByStampSheetResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationacquireactionstoformproperties
     */
    public function acquireActionToFormPropertiesByStampSheet (
            AcquireActionToFormPropertiesByStampSheetRequest $request
    ): AcquireActionToFormPropertiesByStampSheetResult {
        return $this->acquireActionToFormPropertiesByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute the form setting as an acquire action
     *
     * @param SetFormByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsetformbyuserid
     */
    public function setFormByStampSheetAsync(
            SetFormByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the form setting as an acquire action
     *
     * @param SetFormByStampSheetRequest $request
     * @return SetFormByStampSheetResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationsetformbyuserid
     */
    public function setFormByStampSheet (
            SetFormByStampSheetRequest $request
    ): SetFormByStampSheetResult {
        return $this->setFormByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * List Property Forms
     *
     * @param DescribePropertyFormsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyforms
     */
    public function describePropertyFormsAsync(
            DescribePropertyFormsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePropertyFormsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Property Forms
     *
     * @param DescribePropertyFormsRequest $request
     * @return DescribePropertyFormsResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyforms
     */
    public function describePropertyForms (
            DescribePropertyFormsRequest $request
    ): DescribePropertyFormsResult {
        return $this->describePropertyFormsAsync(
            $request
        )->wait();
    }

    /**
     * List Property Forms by User ID
     *
     * @param DescribePropertyFormsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformsbyuserid
     */
    public function describePropertyFormsByUserIdAsync(
            DescribePropertyFormsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePropertyFormsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Property Forms by User ID
     *
     * @param DescribePropertyFormsByUserIdRequest $request
     * @return DescribePropertyFormsByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#describepropertyformsbyuserid
     */
    public function describePropertyFormsByUserId (
            DescribePropertyFormsByUserIdRequest $request
    ): DescribePropertyFormsByUserIdResult {
        return $this->describePropertyFormsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Property Form
     *
     * @param GetPropertyFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyform
     */
    public function getPropertyFormAsync(
            GetPropertyFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Property Form
     *
     * @param GetPropertyFormRequest $request
     * @return GetPropertyFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyform
     */
    public function getPropertyForm (
            GetPropertyFormRequest $request
    ): GetPropertyFormResult {
        return $this->getPropertyFormAsync(
            $request
        )->wait();
    }

    /**
     * Get Property Form by User ID
     *
     * @param GetPropertyFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformbyuserid
     */
    public function getPropertyFormByUserIdAsync(
            GetPropertyFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Property Form by User ID
     *
     * @param GetPropertyFormByUserIdRequest $request
     * @return GetPropertyFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformbyuserid
     */
    public function getPropertyFormByUserId (
            GetPropertyFormByUserIdRequest $request
    ): GetPropertyFormByUserIdResult {
        return $this->getPropertyFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Retrieve signed Property Forms
     *
     * @param GetPropertyFormWithSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformwithsignature
     */
    public function getPropertyFormWithSignatureAsync(
            GetPropertyFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Retrieve signed Property Forms
     *
     * @param GetPropertyFormWithSignatureRequest $request
     * @return GetPropertyFormWithSignatureResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformwithsignature
     */
    public function getPropertyFormWithSignature (
            GetPropertyFormWithSignatureRequest $request
    ): GetPropertyFormWithSignatureResult {
        return $this->getPropertyFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Get signed property form by User ID
     *
     * @param GetPropertyFormWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformwithsignaturebyuserid
     */
    public function getPropertyFormWithSignatureByUserIdAsync(
            GetPropertyFormWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPropertyFormWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get signed property form by User ID
     *
     * @param GetPropertyFormWithSignatureByUserIdRequest $request
     * @return GetPropertyFormWithSignatureByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformwithsignaturebyuserid
     */
    public function getPropertyFormWithSignatureByUserId (
            GetPropertyFormWithSignatureByUserIdRequest $request
    ): GetPropertyFormWithSignatureByUserIdResult {
        return $this->getPropertyFormWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update Property Form
     *
     * @param SetPropertyFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyform
     */
    public function setPropertyFormAsync(
            SetPropertyFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetPropertyFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Property Form
     *
     * @param SetPropertyFormRequest $request
     * @return SetPropertyFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyform
     */
    public function setPropertyForm (
            SetPropertyFormRequest $request
    ): SetPropertyFormResult {
        return $this->setPropertyFormAsync(
            $request
        )->wait();
    }

    /**
     * Update Property Form by User ID
     *
     * @param SetPropertyFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformbyuserid
     */
    public function setPropertyFormByUserIdAsync(
            SetPropertyFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetPropertyFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Property Form by User ID
     *
     * @param SetPropertyFormByUserIdRequest $request
     * @return SetPropertyFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformbyuserid
     */
    public function setPropertyFormByUserId (
            SetPropertyFormByUserIdRequest $request
    ): SetPropertyFormByUserIdResult {
        return $this->setPropertyFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update Property Form with signed slots
     *
     * @param SetPropertyFormWithSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformwithsignature
     */
    public function setPropertyFormWithSignatureAsync(
            SetPropertyFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetPropertyFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Property Form with signed slots
     *
     * @param SetPropertyFormWithSignatureRequest $request
     * @return SetPropertyFormWithSignatureResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformwithsignature
     */
    public function setPropertyFormWithSignature (
            SetPropertyFormWithSignatureRequest $request
    ): SetPropertyFormWithSignatureResult {
        return $this->setPropertyFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Apply acquire action to property form properties
     *
     * @param AcquireActionsToPropertyFormPropertiesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstopropertyformproperties
     */
    public function acquireActionsToPropertyFormPropertiesAsync(
            AcquireActionsToPropertyFormPropertiesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionsToPropertyFormPropertiesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Apply acquire action to property form properties
     *
     * @param AcquireActionsToPropertyFormPropertiesRequest $request
     * @return AcquireActionsToPropertyFormPropertiesResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstopropertyformproperties
     */
    public function acquireActionsToPropertyFormProperties (
            AcquireActionsToPropertyFormPropertiesRequest $request
    ): AcquireActionsToPropertyFormPropertiesResult {
        return $this->acquireActionsToPropertyFormPropertiesAsync(
            $request
        )->wait();
    }

    /**
     * Delete Property Form
     *
     * @param DeletePropertyFormRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyform
     */
    public function deletePropertyFormAsync(
            DeletePropertyFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePropertyFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Property Form
     *
     * @param DeletePropertyFormRequest $request
     * @return DeletePropertyFormResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyform
     */
    public function deletePropertyForm (
            DeletePropertyFormRequest $request
    ): DeletePropertyFormResult {
        return $this->deletePropertyFormAsync(
            $request
        )->wait();
    }

    /**
     * Delete Property Form by User ID
     *
     * @param DeletePropertyFormByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyformbyuserid
     */
    public function deletePropertyFormByUserIdAsync(
            DeletePropertyFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePropertyFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Property Form by User ID
     *
     * @param DeletePropertyFormByUserIdRequest $request
     * @return DeletePropertyFormByUserIdResult
     * @see https://docs.gs2.io/api_reference/formation/sdk/#deletepropertyformbyuserid
     */
    public function deletePropertyFormByUserId (
            DeletePropertyFormByUserIdRequest $request
    ): DeletePropertyFormByUserIdResult {
        return $this->deletePropertyFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Apply acquire action to property form properties via transaction
     *
     * @param AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationacquireactionstopropertyformproperties
     */
    public function acquireActionToPropertyFormPropertiesByStampSheetAsync(
            AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionToPropertyFormPropertiesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Apply acquire action to property form properties via transaction
     *
     * @param AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
     * @return AcquireActionToPropertyFormPropertiesByStampSheetResult
     * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationacquireactionstopropertyformproperties
     */
    public function acquireActionToPropertyFormPropertiesByStampSheet (
            AcquireActionToPropertyFormPropertiesByStampSheetRequest $request
    ): AcquireActionToPropertyFormPropertiesByStampSheetResult {
        return $this->acquireActionToPropertyFormPropertiesByStampSheetAsync(
            $request
        )->wait();
    }
}