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

namespace Gs2\Stamina;

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


use Gs2\Stamina\Request\DescribeNamespacesRequest;
use Gs2\Stamina\Result\DescribeNamespacesResult;
use Gs2\Stamina\Request\CreateNamespaceRequest;
use Gs2\Stamina\Result\CreateNamespaceResult;
use Gs2\Stamina\Request\GetNamespaceStatusRequest;
use Gs2\Stamina\Result\GetNamespaceStatusResult;
use Gs2\Stamina\Request\GetNamespaceRequest;
use Gs2\Stamina\Result\GetNamespaceResult;
use Gs2\Stamina\Request\UpdateNamespaceRequest;
use Gs2\Stamina\Result\UpdateNamespaceResult;
use Gs2\Stamina\Request\DeleteNamespaceRequest;
use Gs2\Stamina\Result\DeleteNamespaceResult;
use Gs2\Stamina\Request\GetServiceVersionRequest;
use Gs2\Stamina\Result\GetServiceVersionResult;
use Gs2\Stamina\Request\DumpUserDataByUserIdRequest;
use Gs2\Stamina\Result\DumpUserDataByUserIdResult;
use Gs2\Stamina\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Stamina\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Stamina\Request\CleanUserDataByUserIdRequest;
use Gs2\Stamina\Result\CleanUserDataByUserIdResult;
use Gs2\Stamina\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Stamina\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Stamina\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Stamina\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Stamina\Request\ImportUserDataByUserIdRequest;
use Gs2\Stamina\Result\ImportUserDataByUserIdResult;
use Gs2\Stamina\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Stamina\Result\CheckImportUserDataByUserIdResult;
use Gs2\Stamina\Request\DescribeStaminaModelMastersRequest;
use Gs2\Stamina\Result\DescribeStaminaModelMastersResult;
use Gs2\Stamina\Request\CreateStaminaModelMasterRequest;
use Gs2\Stamina\Result\CreateStaminaModelMasterResult;
use Gs2\Stamina\Request\GetStaminaModelMasterRequest;
use Gs2\Stamina\Result\GetStaminaModelMasterResult;
use Gs2\Stamina\Request\UpdateStaminaModelMasterRequest;
use Gs2\Stamina\Result\UpdateStaminaModelMasterResult;
use Gs2\Stamina\Request\DeleteStaminaModelMasterRequest;
use Gs2\Stamina\Result\DeleteStaminaModelMasterResult;
use Gs2\Stamina\Request\DescribeMaxStaminaTableMastersRequest;
use Gs2\Stamina\Result\DescribeMaxStaminaTableMastersResult;
use Gs2\Stamina\Request\CreateMaxStaminaTableMasterRequest;
use Gs2\Stamina\Result\CreateMaxStaminaTableMasterResult;
use Gs2\Stamina\Request\GetMaxStaminaTableMasterRequest;
use Gs2\Stamina\Result\GetMaxStaminaTableMasterResult;
use Gs2\Stamina\Request\UpdateMaxStaminaTableMasterRequest;
use Gs2\Stamina\Result\UpdateMaxStaminaTableMasterResult;
use Gs2\Stamina\Request\DeleteMaxStaminaTableMasterRequest;
use Gs2\Stamina\Result\DeleteMaxStaminaTableMasterResult;
use Gs2\Stamina\Request\DescribeRecoverIntervalTableMastersRequest;
use Gs2\Stamina\Result\DescribeRecoverIntervalTableMastersResult;
use Gs2\Stamina\Request\CreateRecoverIntervalTableMasterRequest;
use Gs2\Stamina\Result\CreateRecoverIntervalTableMasterResult;
use Gs2\Stamina\Request\GetRecoverIntervalTableMasterRequest;
use Gs2\Stamina\Result\GetRecoverIntervalTableMasterResult;
use Gs2\Stamina\Request\UpdateRecoverIntervalTableMasterRequest;
use Gs2\Stamina\Result\UpdateRecoverIntervalTableMasterResult;
use Gs2\Stamina\Request\DeleteRecoverIntervalTableMasterRequest;
use Gs2\Stamina\Result\DeleteRecoverIntervalTableMasterResult;
use Gs2\Stamina\Request\DescribeRecoverValueTableMastersRequest;
use Gs2\Stamina\Result\DescribeRecoverValueTableMastersResult;
use Gs2\Stamina\Request\CreateRecoverValueTableMasterRequest;
use Gs2\Stamina\Result\CreateRecoverValueTableMasterResult;
use Gs2\Stamina\Request\GetRecoverValueTableMasterRequest;
use Gs2\Stamina\Result\GetRecoverValueTableMasterResult;
use Gs2\Stamina\Request\UpdateRecoverValueTableMasterRequest;
use Gs2\Stamina\Result\UpdateRecoverValueTableMasterResult;
use Gs2\Stamina\Request\DeleteRecoverValueTableMasterRequest;
use Gs2\Stamina\Result\DeleteRecoverValueTableMasterResult;
use Gs2\Stamina\Request\ExportMasterRequest;
use Gs2\Stamina\Result\ExportMasterResult;
use Gs2\Stamina\Request\GetCurrentStaminaMasterRequest;
use Gs2\Stamina\Result\GetCurrentStaminaMasterResult;
use Gs2\Stamina\Request\PreUpdateCurrentStaminaMasterRequest;
use Gs2\Stamina\Result\PreUpdateCurrentStaminaMasterResult;
use Gs2\Stamina\Request\UpdateCurrentStaminaMasterRequest;
use Gs2\Stamina\Result\UpdateCurrentStaminaMasterResult;
use Gs2\Stamina\Request\UpdateCurrentStaminaMasterFromGitHubRequest;
use Gs2\Stamina\Result\UpdateCurrentStaminaMasterFromGitHubResult;
use Gs2\Stamina\Request\DescribeStaminaModelsRequest;
use Gs2\Stamina\Result\DescribeStaminaModelsResult;
use Gs2\Stamina\Request\GetStaminaModelRequest;
use Gs2\Stamina\Result\GetStaminaModelResult;
use Gs2\Stamina\Request\DescribeStaminasRequest;
use Gs2\Stamina\Result\DescribeStaminasResult;
use Gs2\Stamina\Request\DescribeStaminasByUserIdRequest;
use Gs2\Stamina\Result\DescribeStaminasByUserIdResult;
use Gs2\Stamina\Request\GetStaminaRequest;
use Gs2\Stamina\Result\GetStaminaResult;
use Gs2\Stamina\Request\GetStaminaByUserIdRequest;
use Gs2\Stamina\Result\GetStaminaByUserIdResult;
use Gs2\Stamina\Request\UpdateStaminaByUserIdRequest;
use Gs2\Stamina\Result\UpdateStaminaByUserIdResult;
use Gs2\Stamina\Request\ConsumeStaminaRequest;
use Gs2\Stamina\Result\ConsumeStaminaResult;
use Gs2\Stamina\Request\ConsumeStaminaByUserIdRequest;
use Gs2\Stamina\Result\ConsumeStaminaByUserIdResult;
use Gs2\Stamina\Request\ApplyStaminaRequest;
use Gs2\Stamina\Result\ApplyStaminaResult;
use Gs2\Stamina\Request\ApplyStaminaByUserIdRequest;
use Gs2\Stamina\Result\ApplyStaminaByUserIdResult;
use Gs2\Stamina\Request\RecoverStaminaByUserIdRequest;
use Gs2\Stamina\Result\RecoverStaminaByUserIdResult;
use Gs2\Stamina\Request\RaiseMaxValueByUserIdRequest;
use Gs2\Stamina\Result\RaiseMaxValueByUserIdResult;
use Gs2\Stamina\Request\DecreaseMaxValueRequest;
use Gs2\Stamina\Result\DecreaseMaxValueResult;
use Gs2\Stamina\Request\DecreaseMaxValueByUserIdRequest;
use Gs2\Stamina\Result\DecreaseMaxValueByUserIdResult;
use Gs2\Stamina\Request\SetMaxValueByUserIdRequest;
use Gs2\Stamina\Result\SetMaxValueByUserIdResult;
use Gs2\Stamina\Request\SetRecoverIntervalByUserIdRequest;
use Gs2\Stamina\Result\SetRecoverIntervalByUserIdResult;
use Gs2\Stamina\Request\SetRecoverValueByUserIdRequest;
use Gs2\Stamina\Result\SetRecoverValueByUserIdResult;
use Gs2\Stamina\Request\SetMaxValueByStatusRequest;
use Gs2\Stamina\Result\SetMaxValueByStatusResult;
use Gs2\Stamina\Request\SetRecoverIntervalByStatusRequest;
use Gs2\Stamina\Result\SetRecoverIntervalByStatusResult;
use Gs2\Stamina\Request\SetRecoverValueByStatusRequest;
use Gs2\Stamina\Result\SetRecoverValueByStatusResult;
use Gs2\Stamina\Request\DeleteStaminaByUserIdRequest;
use Gs2\Stamina\Result\DeleteStaminaByUserIdResult;
use Gs2\Stamina\Request\VerifyStaminaValueRequest;
use Gs2\Stamina\Result\VerifyStaminaValueResult;
use Gs2\Stamina\Request\VerifyStaminaValueByUserIdRequest;
use Gs2\Stamina\Result\VerifyStaminaValueByUserIdResult;
use Gs2\Stamina\Request\VerifyStaminaMaxValueRequest;
use Gs2\Stamina\Result\VerifyStaminaMaxValueResult;
use Gs2\Stamina\Request\VerifyStaminaMaxValueByUserIdRequest;
use Gs2\Stamina\Result\VerifyStaminaMaxValueByUserIdResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverIntervalMinutesRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverIntervalMinutesResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverIntervalMinutesByUserIdRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverIntervalMinutesByUserIdResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverValueRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverValueResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverValueByUserIdRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverValueByUserIdResult;
use Gs2\Stamina\Request\VerifyStaminaOverflowValueRequest;
use Gs2\Stamina\Result\VerifyStaminaOverflowValueResult;
use Gs2\Stamina\Request\VerifyStaminaOverflowValueByUserIdRequest;
use Gs2\Stamina\Result\VerifyStaminaOverflowValueByUserIdResult;
use Gs2\Stamina\Request\RecoverStaminaByStampSheetRequest;
use Gs2\Stamina\Result\RecoverStaminaByStampSheetResult;
use Gs2\Stamina\Request\RaiseMaxValueByStampSheetRequest;
use Gs2\Stamina\Result\RaiseMaxValueByStampSheetResult;
use Gs2\Stamina\Request\DecreaseMaxValueByStampTaskRequest;
use Gs2\Stamina\Result\DecreaseMaxValueByStampTaskResult;
use Gs2\Stamina\Request\SetMaxValueByStampSheetRequest;
use Gs2\Stamina\Result\SetMaxValueByStampSheetResult;
use Gs2\Stamina\Request\SetRecoverIntervalByStampSheetRequest;
use Gs2\Stamina\Result\SetRecoverIntervalByStampSheetResult;
use Gs2\Stamina\Request\SetRecoverValueByStampSheetRequest;
use Gs2\Stamina\Result\SetRecoverValueByStampSheetResult;
use Gs2\Stamina\Request\ConsumeStaminaByStampTaskRequest;
use Gs2\Stamina\Result\ConsumeStaminaByStampTaskResult;
use Gs2\Stamina\Request\VerifyStaminaValueByStampTaskRequest;
use Gs2\Stamina\Result\VerifyStaminaValueByStampTaskResult;
use Gs2\Stamina\Request\VerifyStaminaMaxValueByStampTaskRequest;
use Gs2\Stamina\Result\VerifyStaminaMaxValueByStampTaskResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverIntervalMinutesByStampTaskRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverIntervalMinutesByStampTaskResult;
use Gs2\Stamina\Request\VerifyStaminaRecoverValueByStampTaskRequest;
use Gs2\Stamina\Result\VerifyStaminaRecoverValueByStampTaskResult;
use Gs2\Stamina\Request\VerifyStaminaOverflowValueByStampTaskRequest;
use Gs2\Stamina\Result\VerifyStaminaOverflowValueByStampTaskResult;

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getOverflowTriggerScript() !== null) {
            $json["overflowTriggerScript"] = $this->request->getOverflowTriggerScript();
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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getOverflowTriggerScript() !== null) {
            $json["overflowTriggerScript"] = $this->request->getOverflowTriggerScript();
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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeStaminaModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminaModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminaModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminaModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminaModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminaModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

        return parent::executeImpl();
    }
}

class CreateStaminaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateStaminaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateStaminaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateStaminaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateStaminaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateStaminaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getRecoverIntervalMinutes() !== null) {
            $json["recoverIntervalMinutes"] = $this->request->getRecoverIntervalMinutes();
        }
        if ($this->request->getRecoverValue() !== null) {
            $json["recoverValue"] = $this->request->getRecoverValue();
        }
        if ($this->request->getInitialCapacity() !== null) {
            $json["initialCapacity"] = $this->request->getInitialCapacity();
        }
        if ($this->request->getIsOverflow() !== null) {
            $json["isOverflow"] = $this->request->getIsOverflow();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getMaxStaminaTableName() !== null) {
            $json["maxStaminaTableName"] = $this->request->getMaxStaminaTableName();
        }
        if ($this->request->getRecoverIntervalTableName() !== null) {
            $json["recoverIntervalTableName"] = $this->request->getRecoverIntervalTableName();
        }
        if ($this->request->getRecoverValueTableName() !== null) {
            $json["recoverValueTableName"] = $this->request->getRecoverValueTableName();
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

class GetStaminaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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

class UpdateStaminaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStaminaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStaminaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStaminaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStaminaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStaminaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getRecoverIntervalMinutes() !== null) {
            $json["recoverIntervalMinutes"] = $this->request->getRecoverIntervalMinutes();
        }
        if ($this->request->getRecoverValue() !== null) {
            $json["recoverValue"] = $this->request->getRecoverValue();
        }
        if ($this->request->getInitialCapacity() !== null) {
            $json["initialCapacity"] = $this->request->getInitialCapacity();
        }
        if ($this->request->getIsOverflow() !== null) {
            $json["isOverflow"] = $this->request->getIsOverflow();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getMaxStaminaTableName() !== null) {
            $json["maxStaminaTableName"] = $this->request->getMaxStaminaTableName();
        }
        if ($this->request->getRecoverIntervalTableName() !== null) {
            $json["recoverIntervalTableName"] = $this->request->getRecoverIntervalTableName();
        }
        if ($this->request->getRecoverValueTableName() !== null) {
            $json["recoverValueTableName"] = $this->request->getRecoverValueTableName();
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

class DeleteStaminaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStaminaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStaminaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStaminaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStaminaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStaminaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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

class DescribeMaxStaminaTableMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMaxStaminaTableMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMaxStaminaTableMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMaxStaminaTableMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMaxStaminaTableMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMaxStaminaTableMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/maxStaminaTable";

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

        return parent::executeImpl();
    }
}

class CreateMaxStaminaTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateMaxStaminaTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateMaxStaminaTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateMaxStaminaTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateMaxStaminaTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateMaxStaminaTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/maxStaminaTable";

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
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class GetMaxStaminaTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetMaxStaminaTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMaxStaminaTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetMaxStaminaTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMaxStaminaTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetMaxStaminaTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/maxStaminaTable/{maxStaminaTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{maxStaminaTableName}", $this->request->getMaxStaminaTableName() === null|| strlen($this->request->getMaxStaminaTableName()) == 0 ? "null" : $this->request->getMaxStaminaTableName(), $url);

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

class UpdateMaxStaminaTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMaxStaminaTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMaxStaminaTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMaxStaminaTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMaxStaminaTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMaxStaminaTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/maxStaminaTable/{maxStaminaTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{maxStaminaTableName}", $this->request->getMaxStaminaTableName() === null|| strlen($this->request->getMaxStaminaTableName()) == 0 ? "null" : $this->request->getMaxStaminaTableName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class DeleteMaxStaminaTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMaxStaminaTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMaxStaminaTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMaxStaminaTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMaxStaminaTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMaxStaminaTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/maxStaminaTable/{maxStaminaTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{maxStaminaTableName}", $this->request->getMaxStaminaTableName() === null|| strlen($this->request->getMaxStaminaTableName()) == 0 ? "null" : $this->request->getMaxStaminaTableName(), $url);

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

class DescribeRecoverIntervalTableMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRecoverIntervalTableMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRecoverIntervalTableMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRecoverIntervalTableMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRecoverIntervalTableMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRecoverIntervalTableMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverIntervalTable";

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

        return parent::executeImpl();
    }
}

class CreateRecoverIntervalTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRecoverIntervalTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRecoverIntervalTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRecoverIntervalTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRecoverIntervalTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRecoverIntervalTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverIntervalTable";

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
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class GetRecoverIntervalTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRecoverIntervalTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRecoverIntervalTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRecoverIntervalTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRecoverIntervalTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRecoverIntervalTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverIntervalTable/{recoverIntervalTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverIntervalTableName}", $this->request->getRecoverIntervalTableName() === null|| strlen($this->request->getRecoverIntervalTableName()) == 0 ? "null" : $this->request->getRecoverIntervalTableName(), $url);

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

class UpdateRecoverIntervalTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRecoverIntervalTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRecoverIntervalTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRecoverIntervalTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRecoverIntervalTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRecoverIntervalTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverIntervalTable/{recoverIntervalTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverIntervalTableName}", $this->request->getRecoverIntervalTableName() === null|| strlen($this->request->getRecoverIntervalTableName()) == 0 ? "null" : $this->request->getRecoverIntervalTableName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class DeleteRecoverIntervalTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRecoverIntervalTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRecoverIntervalTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRecoverIntervalTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRecoverIntervalTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRecoverIntervalTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverIntervalTable/{recoverIntervalTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverIntervalTableName}", $this->request->getRecoverIntervalTableName() === null|| strlen($this->request->getRecoverIntervalTableName()) == 0 ? "null" : $this->request->getRecoverIntervalTableName(), $url);

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

class DescribeRecoverValueTableMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRecoverValueTableMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRecoverValueTableMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRecoverValueTableMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRecoverValueTableMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRecoverValueTableMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverValueTable";

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

        return parent::executeImpl();
    }
}

class CreateRecoverValueTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRecoverValueTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRecoverValueTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRecoverValueTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRecoverValueTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRecoverValueTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverValueTable";

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
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class GetRecoverValueTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRecoverValueTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRecoverValueTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRecoverValueTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRecoverValueTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRecoverValueTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverValueTable/{recoverValueTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverValueTableName}", $this->request->getRecoverValueTableName() === null|| strlen($this->request->getRecoverValueTableName()) == 0 ? "null" : $this->request->getRecoverValueTableName(), $url);

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

class UpdateRecoverValueTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRecoverValueTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRecoverValueTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRecoverValueTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRecoverValueTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRecoverValueTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverValueTable/{recoverValueTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverValueTableName}", $this->request->getRecoverValueTableName() === null|| strlen($this->request->getRecoverValueTableName()) == 0 ? "null" : $this->request->getRecoverValueTableName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class DeleteRecoverValueTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRecoverValueTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRecoverValueTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRecoverValueTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRecoverValueTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRecoverValueTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/recoverValueTable/{recoverValueTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{recoverValueTableName}", $this->request->getRecoverValueTableName() === null|| strlen($this->request->getRecoverValueTableName()) == 0 ? "null" : $this->request->getRecoverValueTableName(), $url);

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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentStaminaMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentStaminaMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentStaminaMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentStaminaMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentStaminaMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentStaminaMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentStaminaMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentStaminaMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentStaminaMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentStaminaMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentStaminaMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentStaminaMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentStaminaMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentStaminaMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentStaminaMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentStaminaMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentStaminaMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentStaminaMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentStaminaMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentStaminaMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentStaminaMasterResult $res */
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

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentStaminaMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentStaminaMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentStaminaMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentStaminaMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentStaminaMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentStaminaMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeStaminaModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminaModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminaModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminaModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminaModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminaModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetStaminaModelTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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

class DescribeStaminasTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminasRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminasTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminasRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminasRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminasResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina";

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

class DescribeStaminasByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminasByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminasByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminasByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminasByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminasByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina";

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

class GetStaminaTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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

class GetStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
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

class UpdateStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
        }
        if ($this->request->getRecoverIntervalMinutes() !== null) {
            $json["recoverIntervalMinutes"] = $this->request->getRecoverIntervalMinutes();
        }
        if ($this->request->getRecoverValue() !== null) {
            $json["recoverValue"] = $this->request->getRecoverValue();
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

class ConsumeStaminaTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeStaminaRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeStaminaTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeStaminaRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeStaminaRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeStaminaResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getConsumeValue() !== null) {
            $json["consumeValue"] = $this->request->getConsumeValue();
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

class ConsumeStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getConsumeValue() !== null) {
            $json["consumeValue"] = $this->request->getConsumeValue();
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

class ApplyStaminaTask extends Gs2RestSessionTask {

    /**
     * @var ApplyStaminaRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ApplyStaminaTask constructor.
     * @param Gs2RestSession $session
     * @param ApplyStaminaRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ApplyStaminaRequest $request
    ) {
        parent::__construct(
            $session,
            ApplyStaminaResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/apply";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class ApplyStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ApplyStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ApplyStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ApplyStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ApplyStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ApplyStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/apply";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class RecoverStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RecoverStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RecoverStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RecoverStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RecoverStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RecoverStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/recover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRecoverValue() !== null) {
            $json["recoverValue"] = $this->request->getRecoverValue();
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

class RaiseMaxValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RaiseMaxValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RaiseMaxValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RaiseMaxValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RaiseMaxValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RaiseMaxValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/raise";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRaiseValue() !== null) {
            $json["raiseValue"] = $this->request->getRaiseValue();
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

class DecreaseMaxValueTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaxValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaxValueTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaxValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaxValueRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaxValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getDecreaseValue() !== null) {
            $json["decreaseValue"] = $this->request->getDecreaseValue();
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

class DecreaseMaxValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaxValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaxValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaxValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaxValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaxValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getDecreaseValue() !== null) {
            $json["decreaseValue"] = $this->request->getDecreaseValue();
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

class SetMaxValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetMaxValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMaxValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetMaxValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMaxValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetMaxValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
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

class SetRecoverIntervalByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverIntervalByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverIntervalByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverIntervalByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverIntervalByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverIntervalByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/recoverInterval/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRecoverIntervalMinutes() !== null) {
            $json["recoverIntervalMinutes"] = $this->request->getRecoverIntervalMinutes();
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

class SetRecoverValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/recoverValue/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRecoverValue() !== null) {
            $json["recoverValue"] = $this->request->getRecoverValue();
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

class SetMaxValueByStatusTask extends Gs2RestSessionTask {

    /**
     * @var SetMaxValueByStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMaxValueByStatusTask constructor.
     * @param Gs2RestSession $session
     * @param SetMaxValueByStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMaxValueByStatusRequest $request
    ) {
        parent::__construct(
            $session,
            SetMaxValueByStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getSignedStatusBody() !== null) {
            $json["signedStatusBody"] = $this->request->getSignedStatusBody();
        }
        if ($this->request->getSignedStatusSignature() !== null) {
            $json["signedStatusSignature"] = $this->request->getSignedStatusSignature();
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

class SetRecoverIntervalByStatusTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverIntervalByStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverIntervalByStatusTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverIntervalByStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverIntervalByStatusRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverIntervalByStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/recoverInterval/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getSignedStatusBody() !== null) {
            $json["signedStatusBody"] = $this->request->getSignedStatusBody();
        }
        if ($this->request->getSignedStatusSignature() !== null) {
            $json["signedStatusSignature"] = $this->request->getSignedStatusSignature();
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

class SetRecoverValueByStatusTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverValueByStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverValueByStatusTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverValueByStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverValueByStatusRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverValueByStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/recoverValue/set";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

        $json = [];
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getSignedStatusBody() !== null) {
            $json["signedStatusBody"] = $this->request->getSignedStatusBody();
        }
        if ($this->request->getSignedStatusSignature() !== null) {
            $json["signedStatusSignature"] = $this->request->getSignedStatusSignature();
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

class DeleteStaminaByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStaminaByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStaminaByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStaminaByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStaminaByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStaminaByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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

class VerifyStaminaValueTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaValueTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaValueRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaMaxValueTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaMaxValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaMaxValueTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaMaxValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaMaxValueRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaMaxValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/max/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaMaxValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaMaxValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaMaxValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaMaxValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaMaxValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaMaxValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/max/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaRecoverIntervalMinutesTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverIntervalMinutesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverIntervalMinutesTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverIntervalMinutesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverIntervalMinutesRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverIntervalMinutesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/recover/interval/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaRecoverIntervalMinutesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverIntervalMinutesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverIntervalMinutesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverIntervalMinutesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/recover/interval/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaRecoverValueTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverValueTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverValueRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/recover/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaRecoverValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/recover/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaOverflowValueTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaOverflowValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaOverflowValueTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaOverflowValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaOverflowValueRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaOverflowValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stamina/{staminaName}/overflow/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyStaminaOverflowValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaOverflowValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaOverflowValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaOverflowValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaOverflowValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaOverflowValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stamina/{staminaName}/overflow/value/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class RecoverStaminaByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RecoverStaminaByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RecoverStaminaByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RecoverStaminaByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RecoverStaminaByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RecoverStaminaByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/recover";

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

class RaiseMaxValueByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RaiseMaxValueByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RaiseMaxValueByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RaiseMaxValueByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RaiseMaxValueByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RaiseMaxValueByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/raise";

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

class DecreaseMaxValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaxValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaxValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaxValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaxValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaxValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/decrease";

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

class SetMaxValueByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetMaxValueByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMaxValueByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetMaxValueByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMaxValueByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetMaxValueByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/max/set";

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

class SetRecoverIntervalByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverIntervalByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverIntervalByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverIntervalByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverIntervalByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverIntervalByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/recoverInterval/set";

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

class SetRecoverValueByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetRecoverValueByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRecoverValueByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetRecoverValueByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRecoverValueByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetRecoverValueByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/recoverValue/set";

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

class ConsumeStaminaByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeStaminaByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeStaminaByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeStaminaByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeStaminaByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeStaminaByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/consume";

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

class VerifyStaminaValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/value/verify";

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

class VerifyStaminaMaxValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaMaxValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaMaxValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaMaxValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaMaxValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaMaxValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/max/verify";

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

class VerifyStaminaRecoverIntervalMinutesByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverIntervalMinutesByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverIntervalMinutesByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverIntervalMinutesByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/recover/interval/verify";

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

class VerifyStaminaRecoverValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaRecoverValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaRecoverValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaRecoverValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaRecoverValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaRecoverValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/recover/value/verify";

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

class VerifyStaminaOverflowValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyStaminaOverflowValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyStaminaOverflowValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyStaminaOverflowValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyStaminaOverflowValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyStaminaOverflowValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "stamina", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamina/overflow/value/verify";

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

/**
 * GS2 Stamina API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2StaminaRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
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
     * @param DescribeNamespacesRequest $request
     * @return DescribeNamespacesResult
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {
        return $this->describeNamespacesAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateNamespaceRequest $request
     * @return PromiseInterface
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
     * @param CreateNamespaceRequest $request
     * @return CreateNamespaceResult
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param GetNamespaceStatusRequest $request
     * @return PromiseInterface
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
     * @param GetNamespaceStatusRequest $request
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetNamespaceRequest $request
     * @return PromiseInterface
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
     * @param GetNamespaceRequest $request
     * @return GetNamespaceResult
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {
        return $this->getNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateNamespaceRequest $request
     * @return PromiseInterface
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
     * @param UpdateNamespaceRequest $request
     * @return UpdateNamespaceResult
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {
        return $this->updateNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteNamespaceRequest $request
     * @return PromiseInterface
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
     * @param DeleteNamespaceRequest $request
     * @return DeleteNamespaceResult
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
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
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminaModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeStaminaModelMastersAsync(
            DescribeStaminaModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminaModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminaModelMastersRequest $request
     * @return DescribeStaminaModelMastersResult
     */
    public function describeStaminaModelMasters (
            DescribeStaminaModelMastersRequest $request
    ): DescribeStaminaModelMastersResult {
        return $this->describeStaminaModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateStaminaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createStaminaModelMasterAsync(
            CreateStaminaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateStaminaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateStaminaModelMasterRequest $request
     * @return CreateStaminaModelMasterResult
     */
    public function createStaminaModelMaster (
            CreateStaminaModelMasterRequest $request
    ): CreateStaminaModelMasterResult {
        return $this->createStaminaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getStaminaModelMasterAsync(
            GetStaminaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaModelMasterRequest $request
     * @return GetStaminaModelMasterResult
     */
    public function getStaminaModelMaster (
            GetStaminaModelMasterRequest $request
    ): GetStaminaModelMasterResult {
        return $this->getStaminaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStaminaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateStaminaModelMasterAsync(
            UpdateStaminaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStaminaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateStaminaModelMasterRequest $request
     * @return UpdateStaminaModelMasterResult
     */
    public function updateStaminaModelMaster (
            UpdateStaminaModelMasterRequest $request
    ): UpdateStaminaModelMasterResult {
        return $this->updateStaminaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStaminaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteStaminaModelMasterAsync(
            DeleteStaminaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStaminaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStaminaModelMasterRequest $request
     * @return DeleteStaminaModelMasterResult
     */
    public function deleteStaminaModelMaster (
            DeleteStaminaModelMasterRequest $request
    ): DeleteStaminaModelMasterResult {
        return $this->deleteStaminaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMaxStaminaTableMastersRequest $request
     * @return PromiseInterface
     */
    public function describeMaxStaminaTableMastersAsync(
            DescribeMaxStaminaTableMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMaxStaminaTableMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMaxStaminaTableMastersRequest $request
     * @return DescribeMaxStaminaTableMastersResult
     */
    public function describeMaxStaminaTableMasters (
            DescribeMaxStaminaTableMastersRequest $request
    ): DescribeMaxStaminaTableMastersResult {
        return $this->describeMaxStaminaTableMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateMaxStaminaTableMasterRequest $request
     * @return PromiseInterface
     */
    public function createMaxStaminaTableMasterAsync(
            CreateMaxStaminaTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateMaxStaminaTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateMaxStaminaTableMasterRequest $request
     * @return CreateMaxStaminaTableMasterResult
     */
    public function createMaxStaminaTableMaster (
            CreateMaxStaminaTableMasterRequest $request
    ): CreateMaxStaminaTableMasterResult {
        return $this->createMaxStaminaTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMaxStaminaTableMasterRequest $request
     * @return PromiseInterface
     */
    public function getMaxStaminaTableMasterAsync(
            GetMaxStaminaTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMaxStaminaTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMaxStaminaTableMasterRequest $request
     * @return GetMaxStaminaTableMasterResult
     */
    public function getMaxStaminaTableMaster (
            GetMaxStaminaTableMasterRequest $request
    ): GetMaxStaminaTableMasterResult {
        return $this->getMaxStaminaTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMaxStaminaTableMasterRequest $request
     * @return PromiseInterface
     */
    public function updateMaxStaminaTableMasterAsync(
            UpdateMaxStaminaTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMaxStaminaTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMaxStaminaTableMasterRequest $request
     * @return UpdateMaxStaminaTableMasterResult
     */
    public function updateMaxStaminaTableMaster (
            UpdateMaxStaminaTableMasterRequest $request
    ): UpdateMaxStaminaTableMasterResult {
        return $this->updateMaxStaminaTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMaxStaminaTableMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteMaxStaminaTableMasterAsync(
            DeleteMaxStaminaTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMaxStaminaTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMaxStaminaTableMasterRequest $request
     * @return DeleteMaxStaminaTableMasterResult
     */
    public function deleteMaxStaminaTableMaster (
            DeleteMaxStaminaTableMasterRequest $request
    ): DeleteMaxStaminaTableMasterResult {
        return $this->deleteMaxStaminaTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRecoverIntervalTableMastersRequest $request
     * @return PromiseInterface
     */
    public function describeRecoverIntervalTableMastersAsync(
            DescribeRecoverIntervalTableMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRecoverIntervalTableMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRecoverIntervalTableMastersRequest $request
     * @return DescribeRecoverIntervalTableMastersResult
     */
    public function describeRecoverIntervalTableMasters (
            DescribeRecoverIntervalTableMastersRequest $request
    ): DescribeRecoverIntervalTableMastersResult {
        return $this->describeRecoverIntervalTableMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateRecoverIntervalTableMasterRequest $request
     * @return PromiseInterface
     */
    public function createRecoverIntervalTableMasterAsync(
            CreateRecoverIntervalTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRecoverIntervalTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateRecoverIntervalTableMasterRequest $request
     * @return CreateRecoverIntervalTableMasterResult
     */
    public function createRecoverIntervalTableMaster (
            CreateRecoverIntervalTableMasterRequest $request
    ): CreateRecoverIntervalTableMasterResult {
        return $this->createRecoverIntervalTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRecoverIntervalTableMasterRequest $request
     * @return PromiseInterface
     */
    public function getRecoverIntervalTableMasterAsync(
            GetRecoverIntervalTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRecoverIntervalTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRecoverIntervalTableMasterRequest $request
     * @return GetRecoverIntervalTableMasterResult
     */
    public function getRecoverIntervalTableMaster (
            GetRecoverIntervalTableMasterRequest $request
    ): GetRecoverIntervalTableMasterResult {
        return $this->getRecoverIntervalTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateRecoverIntervalTableMasterRequest $request
     * @return PromiseInterface
     */
    public function updateRecoverIntervalTableMasterAsync(
            UpdateRecoverIntervalTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRecoverIntervalTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateRecoverIntervalTableMasterRequest $request
     * @return UpdateRecoverIntervalTableMasterResult
     */
    public function updateRecoverIntervalTableMaster (
            UpdateRecoverIntervalTableMasterRequest $request
    ): UpdateRecoverIntervalTableMasterResult {
        return $this->updateRecoverIntervalTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRecoverIntervalTableMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteRecoverIntervalTableMasterAsync(
            DeleteRecoverIntervalTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRecoverIntervalTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRecoverIntervalTableMasterRequest $request
     * @return DeleteRecoverIntervalTableMasterResult
     */
    public function deleteRecoverIntervalTableMaster (
            DeleteRecoverIntervalTableMasterRequest $request
    ): DeleteRecoverIntervalTableMasterResult {
        return $this->deleteRecoverIntervalTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRecoverValueTableMastersRequest $request
     * @return PromiseInterface
     */
    public function describeRecoverValueTableMastersAsync(
            DescribeRecoverValueTableMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRecoverValueTableMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRecoverValueTableMastersRequest $request
     * @return DescribeRecoverValueTableMastersResult
     */
    public function describeRecoverValueTableMasters (
            DescribeRecoverValueTableMastersRequest $request
    ): DescribeRecoverValueTableMastersResult {
        return $this->describeRecoverValueTableMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateRecoverValueTableMasterRequest $request
     * @return PromiseInterface
     */
    public function createRecoverValueTableMasterAsync(
            CreateRecoverValueTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRecoverValueTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateRecoverValueTableMasterRequest $request
     * @return CreateRecoverValueTableMasterResult
     */
    public function createRecoverValueTableMaster (
            CreateRecoverValueTableMasterRequest $request
    ): CreateRecoverValueTableMasterResult {
        return $this->createRecoverValueTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRecoverValueTableMasterRequest $request
     * @return PromiseInterface
     */
    public function getRecoverValueTableMasterAsync(
            GetRecoverValueTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRecoverValueTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRecoverValueTableMasterRequest $request
     * @return GetRecoverValueTableMasterResult
     */
    public function getRecoverValueTableMaster (
            GetRecoverValueTableMasterRequest $request
    ): GetRecoverValueTableMasterResult {
        return $this->getRecoverValueTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateRecoverValueTableMasterRequest $request
     * @return PromiseInterface
     */
    public function updateRecoverValueTableMasterAsync(
            UpdateRecoverValueTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRecoverValueTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateRecoverValueTableMasterRequest $request
     * @return UpdateRecoverValueTableMasterResult
     */
    public function updateRecoverValueTableMaster (
            UpdateRecoverValueTableMasterRequest $request
    ): UpdateRecoverValueTableMasterResult {
        return $this->updateRecoverValueTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRecoverValueTableMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteRecoverValueTableMasterAsync(
            DeleteRecoverValueTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRecoverValueTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRecoverValueTableMasterRequest $request
     * @return DeleteRecoverValueTableMasterResult
     */
    public function deleteRecoverValueTableMaster (
            DeleteRecoverValueTableMasterRequest $request
    ): DeleteRecoverValueTableMasterResult {
        return $this->deleteRecoverValueTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param ExportMasterRequest $request
     * @return PromiseInterface
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
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCurrentStaminaMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentStaminaMasterAsync(
            GetCurrentStaminaMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentStaminaMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentStaminaMasterRequest $request
     * @return GetCurrentStaminaMasterResult
     */
    public function getCurrentStaminaMaster (
            GetCurrentStaminaMasterRequest $request
    ): GetCurrentStaminaMasterResult {
        return $this->getCurrentStaminaMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentStaminaMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentStaminaMasterAsync(
            PreUpdateCurrentStaminaMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentStaminaMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentStaminaMasterRequest $request
     * @return PreUpdateCurrentStaminaMasterResult
     */
    public function preUpdateCurrentStaminaMaster (
            PreUpdateCurrentStaminaMasterRequest $request
    ): PreUpdateCurrentStaminaMasterResult {
        return $this->preUpdateCurrentStaminaMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentStaminaMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentStaminaMasterAsync(
            UpdateCurrentStaminaMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentStaminaMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentStaminaMasterRequest $request
     * @return UpdateCurrentStaminaMasterResult
     */
    public function updateCurrentStaminaMaster (
            UpdateCurrentStaminaMasterRequest $request
    ): UpdateCurrentStaminaMasterResult {
        return $this->updateCurrentStaminaMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentStaminaMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentStaminaMasterFromGitHubAsync(
            UpdateCurrentStaminaMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentStaminaMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentStaminaMasterFromGitHubRequest $request
     * @return UpdateCurrentStaminaMasterFromGitHubResult
     */
    public function updateCurrentStaminaMasterFromGitHub (
            UpdateCurrentStaminaMasterFromGitHubRequest $request
    ): UpdateCurrentStaminaMasterFromGitHubResult {
        return $this->updateCurrentStaminaMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminaModelsRequest $request
     * @return PromiseInterface
     */
    public function describeStaminaModelsAsync(
            DescribeStaminaModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminaModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminaModelsRequest $request
     * @return DescribeStaminaModelsResult
     */
    public function describeStaminaModels (
            DescribeStaminaModelsRequest $request
    ): DescribeStaminaModelsResult {
        return $this->describeStaminaModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaModelRequest $request
     * @return PromiseInterface
     */
    public function getStaminaModelAsync(
            GetStaminaModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaModelRequest $request
     * @return GetStaminaModelResult
     */
    public function getStaminaModel (
            GetStaminaModelRequest $request
    ): GetStaminaModelResult {
        return $this->getStaminaModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminasRequest $request
     * @return PromiseInterface
     */
    public function describeStaminasAsync(
            DescribeStaminasRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminasTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminasRequest $request
     * @return DescribeStaminasResult
     */
    public function describeStaminas (
            DescribeStaminasRequest $request
    ): DescribeStaminasResult {
        return $this->describeStaminasAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminasByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeStaminasByUserIdAsync(
            DescribeStaminasByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminasByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminasByUserIdRequest $request
     * @return DescribeStaminasByUserIdResult
     */
    public function describeStaminasByUserId (
            DescribeStaminasByUserIdRequest $request
    ): DescribeStaminasByUserIdResult {
        return $this->describeStaminasByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaRequest $request
     * @return PromiseInterface
     */
    public function getStaminaAsync(
            GetStaminaRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaRequest $request
     * @return GetStaminaResult
     */
    public function getStamina (
            GetStaminaRequest $request
    ): GetStaminaResult {
        return $this->getStaminaAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getStaminaByUserIdAsync(
            GetStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaByUserIdRequest $request
     * @return GetStaminaByUserIdResult
     */
    public function getStaminaByUserId (
            GetStaminaByUserIdRequest $request
    ): GetStaminaByUserIdResult {
        return $this->getStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function updateStaminaByUserIdAsync(
            UpdateStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateStaminaByUserIdRequest $request
     * @return UpdateStaminaByUserIdResult
     */
    public function updateStaminaByUserId (
            UpdateStaminaByUserIdRequest $request
    ): UpdateStaminaByUserIdResult {
        return $this->updateStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeStaminaRequest $request
     * @return PromiseInterface
     */
    public function consumeStaminaAsync(
            ConsumeStaminaRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeStaminaTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeStaminaRequest $request
     * @return ConsumeStaminaResult
     */
    public function consumeStamina (
            ConsumeStaminaRequest $request
    ): ConsumeStaminaResult {
        return $this->consumeStaminaAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function consumeStaminaByUserIdAsync(
            ConsumeStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeStaminaByUserIdRequest $request
     * @return ConsumeStaminaByUserIdResult
     */
    public function consumeStaminaByUserId (
            ConsumeStaminaByUserIdRequest $request
    ): ConsumeStaminaByUserIdResult {
        return $this->consumeStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ApplyStaminaRequest $request
     * @return PromiseInterface
     */
    public function applyStaminaAsync(
            ApplyStaminaRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ApplyStaminaTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ApplyStaminaRequest $request
     * @return ApplyStaminaResult
     */
    public function applyStamina (
            ApplyStaminaRequest $request
    ): ApplyStaminaResult {
        return $this->applyStaminaAsync(
            $request
        )->wait();
    }

    /**
     * @param ApplyStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function applyStaminaByUserIdAsync(
            ApplyStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ApplyStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ApplyStaminaByUserIdRequest $request
     * @return ApplyStaminaByUserIdResult
     */
    public function applyStaminaByUserId (
            ApplyStaminaByUserIdRequest $request
    ): ApplyStaminaByUserIdResult {
        return $this->applyStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RecoverStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function recoverStaminaByUserIdAsync(
            RecoverStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RecoverStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RecoverStaminaByUserIdRequest $request
     * @return RecoverStaminaByUserIdResult
     */
    public function recoverStaminaByUserId (
            RecoverStaminaByUserIdRequest $request
    ): RecoverStaminaByUserIdResult {
        return $this->recoverStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RaiseMaxValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function raiseMaxValueByUserIdAsync(
            RaiseMaxValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RaiseMaxValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RaiseMaxValueByUserIdRequest $request
     * @return RaiseMaxValueByUserIdResult
     */
    public function raiseMaxValueByUserId (
            RaiseMaxValueByUserIdRequest $request
    ): RaiseMaxValueByUserIdResult {
        return $this->raiseMaxValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaxValueRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaxValueAsync(
            DecreaseMaxValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaxValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaxValueRequest $request
     * @return DecreaseMaxValueResult
     */
    public function decreaseMaxValue (
            DecreaseMaxValueRequest $request
    ): DecreaseMaxValueResult {
        return $this->decreaseMaxValueAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaxValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaxValueByUserIdAsync(
            DecreaseMaxValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaxValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaxValueByUserIdRequest $request
     * @return DecreaseMaxValueByUserIdResult
     */
    public function decreaseMaxValueByUserId (
            DecreaseMaxValueByUserIdRequest $request
    ): DecreaseMaxValueByUserIdResult {
        return $this->decreaseMaxValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMaxValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setMaxValueByUserIdAsync(
            SetMaxValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMaxValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMaxValueByUserIdRequest $request
     * @return SetMaxValueByUserIdResult
     */
    public function setMaxValueByUserId (
            SetMaxValueByUserIdRequest $request
    ): SetMaxValueByUserIdResult {
        return $this->setMaxValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverIntervalByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setRecoverIntervalByUserIdAsync(
            SetRecoverIntervalByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverIntervalByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverIntervalByUserIdRequest $request
     * @return SetRecoverIntervalByUserIdResult
     */
    public function setRecoverIntervalByUserId (
            SetRecoverIntervalByUserIdRequest $request
    ): SetRecoverIntervalByUserIdResult {
        return $this->setRecoverIntervalByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setRecoverValueByUserIdAsync(
            SetRecoverValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverValueByUserIdRequest $request
     * @return SetRecoverValueByUserIdResult
     */
    public function setRecoverValueByUserId (
            SetRecoverValueByUserIdRequest $request
    ): SetRecoverValueByUserIdResult {
        return $this->setRecoverValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMaxValueByStatusRequest $request
     * @return PromiseInterface
     */
    public function setMaxValueByStatusAsync(
            SetMaxValueByStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMaxValueByStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMaxValueByStatusRequest $request
     * @return SetMaxValueByStatusResult
     */
    public function setMaxValueByStatus (
            SetMaxValueByStatusRequest $request
    ): SetMaxValueByStatusResult {
        return $this->setMaxValueByStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverIntervalByStatusRequest $request
     * @return PromiseInterface
     */
    public function setRecoverIntervalByStatusAsync(
            SetRecoverIntervalByStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverIntervalByStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverIntervalByStatusRequest $request
     * @return SetRecoverIntervalByStatusResult
     */
    public function setRecoverIntervalByStatus (
            SetRecoverIntervalByStatusRequest $request
    ): SetRecoverIntervalByStatusResult {
        return $this->setRecoverIntervalByStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverValueByStatusRequest $request
     * @return PromiseInterface
     */
    public function setRecoverValueByStatusAsync(
            SetRecoverValueByStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverValueByStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverValueByStatusRequest $request
     * @return SetRecoverValueByStatusResult
     */
    public function setRecoverValueByStatus (
            SetRecoverValueByStatusRequest $request
    ): SetRecoverValueByStatusResult {
        return $this->setRecoverValueByStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStaminaByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteStaminaByUserIdAsync(
            DeleteStaminaByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStaminaByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStaminaByUserIdRequest $request
     * @return DeleteStaminaByUserIdResult
     */
    public function deleteStaminaByUserId (
            DeleteStaminaByUserIdRequest $request
    ): DeleteStaminaByUserIdResult {
        return $this->deleteStaminaByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaValueRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaValueAsync(
            VerifyStaminaValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaValueRequest $request
     * @return VerifyStaminaValueResult
     */
    public function verifyStaminaValue (
            VerifyStaminaValueRequest $request
    ): VerifyStaminaValueResult {
        return $this->verifyStaminaValueAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaValueByUserIdAsync(
            VerifyStaminaValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaValueByUserIdRequest $request
     * @return VerifyStaminaValueByUserIdResult
     */
    public function verifyStaminaValueByUserId (
            VerifyStaminaValueByUserIdRequest $request
    ): VerifyStaminaValueByUserIdResult {
        return $this->verifyStaminaValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaMaxValueRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaMaxValueAsync(
            VerifyStaminaMaxValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaMaxValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaMaxValueRequest $request
     * @return VerifyStaminaMaxValueResult
     */
    public function verifyStaminaMaxValue (
            VerifyStaminaMaxValueRequest $request
    ): VerifyStaminaMaxValueResult {
        return $this->verifyStaminaMaxValueAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaMaxValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaMaxValueByUserIdAsync(
            VerifyStaminaMaxValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaMaxValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaMaxValueByUserIdRequest $request
     * @return VerifyStaminaMaxValueByUserIdResult
     */
    public function verifyStaminaMaxValueByUserId (
            VerifyStaminaMaxValueByUserIdRequest $request
    ): VerifyStaminaMaxValueByUserIdResult {
        return $this->verifyStaminaMaxValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverIntervalMinutesAsync(
            VerifyStaminaRecoverIntervalMinutesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverIntervalMinutesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesRequest $request
     * @return VerifyStaminaRecoverIntervalMinutesResult
     */
    public function verifyStaminaRecoverIntervalMinutes (
            VerifyStaminaRecoverIntervalMinutesRequest $request
    ): VerifyStaminaRecoverIntervalMinutesResult {
        return $this->verifyStaminaRecoverIntervalMinutesAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverIntervalMinutesByUserIdAsync(
            VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverIntervalMinutesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
     * @return VerifyStaminaRecoverIntervalMinutesByUserIdResult
     */
    public function verifyStaminaRecoverIntervalMinutesByUserId (
            VerifyStaminaRecoverIntervalMinutesByUserIdRequest $request
    ): VerifyStaminaRecoverIntervalMinutesByUserIdResult {
        return $this->verifyStaminaRecoverIntervalMinutesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverValueRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverValueAsync(
            VerifyStaminaRecoverValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverValueRequest $request
     * @return VerifyStaminaRecoverValueResult
     */
    public function verifyStaminaRecoverValue (
            VerifyStaminaRecoverValueRequest $request
    ): VerifyStaminaRecoverValueResult {
        return $this->verifyStaminaRecoverValueAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverValueByUserIdAsync(
            VerifyStaminaRecoverValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverValueByUserIdRequest $request
     * @return VerifyStaminaRecoverValueByUserIdResult
     */
    public function verifyStaminaRecoverValueByUserId (
            VerifyStaminaRecoverValueByUserIdRequest $request
    ): VerifyStaminaRecoverValueByUserIdResult {
        return $this->verifyStaminaRecoverValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaOverflowValueRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaOverflowValueAsync(
            VerifyStaminaOverflowValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaOverflowValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaOverflowValueRequest $request
     * @return VerifyStaminaOverflowValueResult
     */
    public function verifyStaminaOverflowValue (
            VerifyStaminaOverflowValueRequest $request
    ): VerifyStaminaOverflowValueResult {
        return $this->verifyStaminaOverflowValueAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaOverflowValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaOverflowValueByUserIdAsync(
            VerifyStaminaOverflowValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaOverflowValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaOverflowValueByUserIdRequest $request
     * @return VerifyStaminaOverflowValueByUserIdResult
     */
    public function verifyStaminaOverflowValueByUserId (
            VerifyStaminaOverflowValueByUserIdRequest $request
    ): VerifyStaminaOverflowValueByUserIdResult {
        return $this->verifyStaminaOverflowValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RecoverStaminaByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function recoverStaminaByStampSheetAsync(
            RecoverStaminaByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RecoverStaminaByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RecoverStaminaByStampSheetRequest $request
     * @return RecoverStaminaByStampSheetResult
     */
    public function recoverStaminaByStampSheet (
            RecoverStaminaByStampSheetRequest $request
    ): RecoverStaminaByStampSheetResult {
        return $this->recoverStaminaByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param RaiseMaxValueByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function raiseMaxValueByStampSheetAsync(
            RaiseMaxValueByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RaiseMaxValueByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RaiseMaxValueByStampSheetRequest $request
     * @return RaiseMaxValueByStampSheetResult
     */
    public function raiseMaxValueByStampSheet (
            RaiseMaxValueByStampSheetRequest $request
    ): RaiseMaxValueByStampSheetResult {
        return $this->raiseMaxValueByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaxValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaxValueByStampTaskAsync(
            DecreaseMaxValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaxValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaxValueByStampTaskRequest $request
     * @return DecreaseMaxValueByStampTaskResult
     */
    public function decreaseMaxValueByStampTask (
            DecreaseMaxValueByStampTaskRequest $request
    ): DecreaseMaxValueByStampTaskResult {
        return $this->decreaseMaxValueByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMaxValueByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setMaxValueByStampSheetAsync(
            SetMaxValueByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMaxValueByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMaxValueByStampSheetRequest $request
     * @return SetMaxValueByStampSheetResult
     */
    public function setMaxValueByStampSheet (
            SetMaxValueByStampSheetRequest $request
    ): SetMaxValueByStampSheetResult {
        return $this->setMaxValueByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverIntervalByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setRecoverIntervalByStampSheetAsync(
            SetRecoverIntervalByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverIntervalByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverIntervalByStampSheetRequest $request
     * @return SetRecoverIntervalByStampSheetResult
     */
    public function setRecoverIntervalByStampSheet (
            SetRecoverIntervalByStampSheetRequest $request
    ): SetRecoverIntervalByStampSheetResult {
        return $this->setRecoverIntervalByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRecoverValueByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setRecoverValueByStampSheetAsync(
            SetRecoverValueByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRecoverValueByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetRecoverValueByStampSheetRequest $request
     * @return SetRecoverValueByStampSheetResult
     */
    public function setRecoverValueByStampSheet (
            SetRecoverValueByStampSheetRequest $request
    ): SetRecoverValueByStampSheetResult {
        return $this->setRecoverValueByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeStaminaByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function consumeStaminaByStampTaskAsync(
            ConsumeStaminaByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeStaminaByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeStaminaByStampTaskRequest $request
     * @return ConsumeStaminaByStampTaskResult
     */
    public function consumeStaminaByStampTask (
            ConsumeStaminaByStampTaskRequest $request
    ): ConsumeStaminaByStampTaskResult {
        return $this->consumeStaminaByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaValueByStampTaskAsync(
            VerifyStaminaValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaValueByStampTaskRequest $request
     * @return VerifyStaminaValueByStampTaskResult
     */
    public function verifyStaminaValueByStampTask (
            VerifyStaminaValueByStampTaskRequest $request
    ): VerifyStaminaValueByStampTaskResult {
        return $this->verifyStaminaValueByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaMaxValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaMaxValueByStampTaskAsync(
            VerifyStaminaMaxValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaMaxValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaMaxValueByStampTaskRequest $request
     * @return VerifyStaminaMaxValueByStampTaskResult
     */
    public function verifyStaminaMaxValueByStampTask (
            VerifyStaminaMaxValueByStampTaskRequest $request
    ): VerifyStaminaMaxValueByStampTaskResult {
        return $this->verifyStaminaMaxValueByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverIntervalMinutesByStampTaskAsync(
            VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverIntervalMinutesByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
     * @return VerifyStaminaRecoverIntervalMinutesByStampTaskResult
     */
    public function verifyStaminaRecoverIntervalMinutesByStampTask (
            VerifyStaminaRecoverIntervalMinutesByStampTaskRequest $request
    ): VerifyStaminaRecoverIntervalMinutesByStampTaskResult {
        return $this->verifyStaminaRecoverIntervalMinutesByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaRecoverValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaRecoverValueByStampTaskAsync(
            VerifyStaminaRecoverValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaRecoverValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaRecoverValueByStampTaskRequest $request
     * @return VerifyStaminaRecoverValueByStampTaskResult
     */
    public function verifyStaminaRecoverValueByStampTask (
            VerifyStaminaRecoverValueByStampTaskRequest $request
    ): VerifyStaminaRecoverValueByStampTaskResult {
        return $this->verifyStaminaRecoverValueByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyStaminaOverflowValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyStaminaOverflowValueByStampTaskAsync(
            VerifyStaminaOverflowValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyStaminaOverflowValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyStaminaOverflowValueByStampTaskRequest $request
     * @return VerifyStaminaOverflowValueByStampTaskResult
     */
    public function verifyStaminaOverflowValueByStampTask (
            VerifyStaminaOverflowValueByStampTaskRequest $request
    ): VerifyStaminaOverflowValueByStampTaskResult {
        return $this->verifyStaminaOverflowValueByStampTaskAsync(
            $request
        )->wait();
    }
}