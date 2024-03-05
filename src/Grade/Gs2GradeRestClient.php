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

namespace Gs2\Grade;

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


use Gs2\Grade\Request\DescribeNamespacesRequest;
use Gs2\Grade\Result\DescribeNamespacesResult;
use Gs2\Grade\Request\CreateNamespaceRequest;
use Gs2\Grade\Result\CreateNamespaceResult;
use Gs2\Grade\Request\GetNamespaceStatusRequest;
use Gs2\Grade\Result\GetNamespaceStatusResult;
use Gs2\Grade\Request\GetNamespaceRequest;
use Gs2\Grade\Result\GetNamespaceResult;
use Gs2\Grade\Request\UpdateNamespaceRequest;
use Gs2\Grade\Result\UpdateNamespaceResult;
use Gs2\Grade\Request\DeleteNamespaceRequest;
use Gs2\Grade\Result\DeleteNamespaceResult;
use Gs2\Grade\Request\DumpUserDataByUserIdRequest;
use Gs2\Grade\Result\DumpUserDataByUserIdResult;
use Gs2\Grade\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Grade\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Grade\Request\CleanUserDataByUserIdRequest;
use Gs2\Grade\Result\CleanUserDataByUserIdResult;
use Gs2\Grade\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Grade\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Grade\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Grade\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Grade\Request\ImportUserDataByUserIdRequest;
use Gs2\Grade\Result\ImportUserDataByUserIdResult;
use Gs2\Grade\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Grade\Result\CheckImportUserDataByUserIdResult;
use Gs2\Grade\Request\DescribeGradeModelMastersRequest;
use Gs2\Grade\Result\DescribeGradeModelMastersResult;
use Gs2\Grade\Request\CreateGradeModelMasterRequest;
use Gs2\Grade\Result\CreateGradeModelMasterResult;
use Gs2\Grade\Request\GetGradeModelMasterRequest;
use Gs2\Grade\Result\GetGradeModelMasterResult;
use Gs2\Grade\Request\UpdateGradeModelMasterRequest;
use Gs2\Grade\Result\UpdateGradeModelMasterResult;
use Gs2\Grade\Request\DeleteGradeModelMasterRequest;
use Gs2\Grade\Result\DeleteGradeModelMasterResult;
use Gs2\Grade\Request\DescribeGradeModelsRequest;
use Gs2\Grade\Result\DescribeGradeModelsResult;
use Gs2\Grade\Request\GetGradeModelRequest;
use Gs2\Grade\Result\GetGradeModelResult;
use Gs2\Grade\Request\DescribeStatusesRequest;
use Gs2\Grade\Result\DescribeStatusesResult;
use Gs2\Grade\Request\DescribeStatusesByUserIdRequest;
use Gs2\Grade\Result\DescribeStatusesByUserIdResult;
use Gs2\Grade\Request\GetStatusRequest;
use Gs2\Grade\Result\GetStatusResult;
use Gs2\Grade\Request\GetStatusByUserIdRequest;
use Gs2\Grade\Result\GetStatusByUserIdResult;
use Gs2\Grade\Request\AddGradeByUserIdRequest;
use Gs2\Grade\Result\AddGradeByUserIdResult;
use Gs2\Grade\Request\SubGradeByUserIdRequest;
use Gs2\Grade\Result\SubGradeByUserIdResult;
use Gs2\Grade\Request\SetGradeByUserIdRequest;
use Gs2\Grade\Result\SetGradeByUserIdResult;
use Gs2\Grade\Request\ApplyRankCapRequest;
use Gs2\Grade\Result\ApplyRankCapResult;
use Gs2\Grade\Request\ApplyRankCapByUserIdRequest;
use Gs2\Grade\Result\ApplyRankCapByUserIdResult;
use Gs2\Grade\Request\DeleteStatusByUserIdRequest;
use Gs2\Grade\Result\DeleteStatusByUserIdResult;
use Gs2\Grade\Request\VerifyGradeRequest;
use Gs2\Grade\Result\VerifyGradeResult;
use Gs2\Grade\Request\VerifyGradeByUserIdRequest;
use Gs2\Grade\Result\VerifyGradeByUserIdResult;
use Gs2\Grade\Request\VerifyGradeUpMaterialRequest;
use Gs2\Grade\Result\VerifyGradeUpMaterialResult;
use Gs2\Grade\Request\VerifyGradeUpMaterialByUserIdRequest;
use Gs2\Grade\Result\VerifyGradeUpMaterialByUserIdResult;
use Gs2\Grade\Request\AddGradeByStampSheetRequest;
use Gs2\Grade\Result\AddGradeByStampSheetResult;
use Gs2\Grade\Request\ApplyRankCapByStampSheetRequest;
use Gs2\Grade\Result\ApplyRankCapByStampSheetResult;
use Gs2\Grade\Request\SubGradeByStampTaskRequest;
use Gs2\Grade\Result\SubGradeByStampTaskResult;
use Gs2\Grade\Request\MultiplyAcquireActionsByUserIdRequest;
use Gs2\Grade\Result\MultiplyAcquireActionsByUserIdResult;
use Gs2\Grade\Request\MultiplyAcquireActionsByStampSheetRequest;
use Gs2\Grade\Result\MultiplyAcquireActionsByStampSheetResult;
use Gs2\Grade\Request\VerifyGradeByStampTaskRequest;
use Gs2\Grade\Result\VerifyGradeByStampTaskResult;
use Gs2\Grade\Request\VerifyGradeUpMaterialByStampTaskRequest;
use Gs2\Grade\Result\VerifyGradeUpMaterialByStampTaskResult;
use Gs2\Grade\Request\ExportMasterRequest;
use Gs2\Grade\Result\ExportMasterResult;
use Gs2\Grade\Request\GetCurrentGradeMasterRequest;
use Gs2\Grade\Result\GetCurrentGradeMasterResult;
use Gs2\Grade\Request\UpdateCurrentGradeMasterRequest;
use Gs2\Grade\Result\UpdateCurrentGradeMasterResult;
use Gs2\Grade\Request\UpdateCurrentGradeMasterFromGitHubRequest;
use Gs2\Grade\Result\UpdateCurrentGradeMasterFromGitHubResult;

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getChangeGradeScript() !== null) {
            $json["changeGradeScript"] = $this->request->getChangeGradeScript()->toJson();
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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getChangeGradeScript() !== null) {
            $json["changeGradeScript"] = $this->request->getChangeGradeScript()->toJson();
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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeGradeModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGradeModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGradeModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGradeModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGradeModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGradeModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateGradeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateGradeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGradeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGradeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGradeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGradeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getDefaultGrades() !== null) {
            $array = [];
            foreach ($this->request->getDefaultGrades() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["defaultGrades"] = $array;
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getGradeEntries() !== null) {
            $array = [];
            foreach ($this->request->getGradeEntries() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["gradeEntries"] = $array;
        }
        if ($this->request->getAcquireActionRates() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActionRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActionRates"] = $array;
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

class GetGradeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetGradeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGradeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetGradeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGradeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetGradeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{gradeName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);

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

class UpdateGradeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGradeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGradeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGradeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGradeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGradeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{gradeName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultGrades() !== null) {
            $array = [];
            foreach ($this->request->getDefaultGrades() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["defaultGrades"] = $array;
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getGradeEntries() !== null) {
            $array = [];
            foreach ($this->request->getGradeEntries() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["gradeEntries"] = $array;
        }
        if ($this->request->getAcquireActionRates() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActionRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActionRates"] = $array;
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

class DeleteGradeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGradeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGradeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGradeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGradeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGradeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{gradeName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);

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

class DescribeGradeModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGradeModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGradeModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGradeModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGradeModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGradeModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetGradeModelTask extends Gs2RestSessionTask {

    /**
     * @var GetGradeModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGradeModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetGradeModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGradeModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetGradeModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{gradeName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);

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

class DescribeStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getGradeName() !== null) {
            $queryStrings["gradeName"] = $this->request->getGradeName();
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

class DescribeStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getGradeName() !== null) {
            $queryStrings["gradeName"] = $this->request->getGradeName();
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

class GetStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{gradeName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
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

class GetStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
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

        return parent::executeImpl();
    }
}

class AddGradeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddGradeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddGradeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddGradeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddGradeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddGradeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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

        return parent::executeImpl();
    }
}

class SubGradeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubGradeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubGradeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubGradeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubGradeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubGradeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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

        return parent::executeImpl();
    }
}

class SetGradeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetGradeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetGradeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetGradeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetGradeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetGradeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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

        return parent::executeImpl();
    }
}

class ApplyRankCapTask extends Gs2RestSessionTask {

    /**
     * @var ApplyRankCapRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ApplyRankCapTask constructor.
     * @param Gs2RestSession $session
     * @param ApplyRankCapRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ApplyRankCapRequest $request
    ) {
        parent::__construct(
            $session,
            ApplyRankCapResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{gradeName}/property/{propertyId}/apply/rank/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
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

class ApplyRankCapByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ApplyRankCapByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ApplyRankCapByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ApplyRankCapByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ApplyRankCapByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ApplyRankCapByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}/apply/rank/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
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

        return parent::executeImpl();
    }
}

class DeleteStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
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

        return parent::executeImpl();
    }
}

class VerifyGradeTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{gradeName}/verify/grade/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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

class VerifyGradeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{gradeName}/verify/grade/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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

        return parent::executeImpl();
    }
}

class VerifyGradeUpMaterialTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeUpMaterialRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeUpMaterialTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeUpMaterialRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeUpMaterialRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeUpMaterialResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{gradeName}/verify/material/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getMaterialPropertyId() !== null) {
            $json["materialPropertyId"] = $this->request->getMaterialPropertyId();
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

class VerifyGradeUpMaterialByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeUpMaterialByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeUpMaterialByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeUpMaterialByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeUpMaterialByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeUpMaterialByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{gradeName}/verify/material/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getMaterialPropertyId() !== null) {
            $json["materialPropertyId"] = $this->request->getMaterialPropertyId();
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

        return parent::executeImpl();
    }
}

class AddGradeByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddGradeByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddGradeByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddGradeByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddGradeByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddGradeByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/grade/add";

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

class ApplyRankCapByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var ApplyRankCapByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ApplyRankCapByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param ApplyRankCapByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ApplyRankCapByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            ApplyRankCapByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/apply/rank/cap";

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

class SubGradeByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var SubGradeByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubGradeByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param SubGradeByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubGradeByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            SubGradeByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/grade/sub";

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

class MultiplyAcquireActionsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MultiplyAcquireActionsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MultiplyAcquireActionsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MultiplyAcquireActionsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MultiplyAcquireActionsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MultiplyAcquireActionsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{gradeName}/property/{propertyId}/acquire/rate/{rateName}/multiply";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{gradeName}", $this->request->getGradeName() === null|| strlen($this->request->getGradeName()) == 0 ? "null" : $this->request->getGradeName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
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

        return parent::executeImpl();
    }
}

class MultiplyAcquireActionsByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var MultiplyAcquireActionsByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MultiplyAcquireActionsByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MultiplyAcquireActionsByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            MultiplyAcquireActionsByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/form/acquire";

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

class VerifyGradeByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/grade/verify";

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

class VerifyGradeUpMaterialByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGradeUpMaterialByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGradeUpMaterialByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGradeUpMaterialByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGradeUpMaterialByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGradeUpMaterialByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/material/verify";

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

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentGradeMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentGradeMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentGradeMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentGradeMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentGradeMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentGradeMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentGradeMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentGradeMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentGradeMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentGradeMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentGradeMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentGradeMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
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

class UpdateCurrentGradeMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentGradeMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentGradeMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentGradeMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentGradeMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentGradeMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "grade", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

/**
 * GS2 Grade API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2GradeRestClient extends AbstractGs2Client {

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
     * @param DescribeGradeModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeGradeModelMastersAsync(
            DescribeGradeModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGradeModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGradeModelMastersRequest $request
     * @return DescribeGradeModelMastersResult
     */
    public function describeGradeModelMasters (
            DescribeGradeModelMastersRequest $request
    ): DescribeGradeModelMastersResult {
        return $this->describeGradeModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGradeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createGradeModelMasterAsync(
            CreateGradeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGradeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGradeModelMasterRequest $request
     * @return CreateGradeModelMasterResult
     */
    public function createGradeModelMaster (
            CreateGradeModelMasterRequest $request
    ): CreateGradeModelMasterResult {
        return $this->createGradeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGradeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getGradeModelMasterAsync(
            GetGradeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGradeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGradeModelMasterRequest $request
     * @return GetGradeModelMasterResult
     */
    public function getGradeModelMaster (
            GetGradeModelMasterRequest $request
    ): GetGradeModelMasterResult {
        return $this->getGradeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGradeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateGradeModelMasterAsync(
            UpdateGradeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGradeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGradeModelMasterRequest $request
     * @return UpdateGradeModelMasterResult
     */
    public function updateGradeModelMaster (
            UpdateGradeModelMasterRequest $request
    ): UpdateGradeModelMasterResult {
        return $this->updateGradeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGradeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteGradeModelMasterAsync(
            DeleteGradeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGradeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGradeModelMasterRequest $request
     * @return DeleteGradeModelMasterResult
     */
    public function deleteGradeModelMaster (
            DeleteGradeModelMasterRequest $request
    ): DeleteGradeModelMasterResult {
        return $this->deleteGradeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGradeModelsRequest $request
     * @return PromiseInterface
     */
    public function describeGradeModelsAsync(
            DescribeGradeModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGradeModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGradeModelsRequest $request
     * @return DescribeGradeModelsResult
     */
    public function describeGradeModels (
            DescribeGradeModelsRequest $request
    ): DescribeGradeModelsResult {
        return $this->describeGradeModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGradeModelRequest $request
     * @return PromiseInterface
     */
    public function getGradeModelAsync(
            GetGradeModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGradeModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGradeModelRequest $request
     * @return GetGradeModelResult
     */
    public function getGradeModel (
            GetGradeModelRequest $request
    ): GetGradeModelResult {
        return $this->getGradeModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesRequest $request
     * @return PromiseInterface
     */
    public function describeStatusesAsync(
            DescribeStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStatusesRequest $request
     * @return DescribeStatusesResult
     */
    public function describeStatuses (
            DescribeStatusesRequest $request
    ): DescribeStatusesResult {
        return $this->describeStatusesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeStatusesByUserIdAsync(
            DescribeStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStatusesByUserIdRequest $request
     * @return DescribeStatusesByUserIdResult
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {
        return $this->describeStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusRequest $request
     * @return PromiseInterface
     */
    public function getStatusAsync(
            GetStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStatusRequest $request
     * @return GetStatusResult
     */
    public function getStatus (
            GetStatusRequest $request
    ): GetStatusResult {
        return $this->getStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getStatusByUserIdAsync(
            GetStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStatusByUserIdRequest $request
     * @return GetStatusByUserIdResult
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {
        return $this->getStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddGradeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addGradeByUserIdAsync(
            AddGradeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddGradeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddGradeByUserIdRequest $request
     * @return AddGradeByUserIdResult
     */
    public function addGradeByUserId (
            AddGradeByUserIdRequest $request
    ): AddGradeByUserIdResult {
        return $this->addGradeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SubGradeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function subGradeByUserIdAsync(
            SubGradeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubGradeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SubGradeByUserIdRequest $request
     * @return SubGradeByUserIdResult
     */
    public function subGradeByUserId (
            SubGradeByUserIdRequest $request
    ): SubGradeByUserIdResult {
        return $this->subGradeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetGradeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setGradeByUserIdAsync(
            SetGradeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetGradeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetGradeByUserIdRequest $request
     * @return SetGradeByUserIdResult
     */
    public function setGradeByUserId (
            SetGradeByUserIdRequest $request
    ): SetGradeByUserIdResult {
        return $this->setGradeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ApplyRankCapRequest $request
     * @return PromiseInterface
     */
    public function applyRankCapAsync(
            ApplyRankCapRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ApplyRankCapTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ApplyRankCapRequest $request
     * @return ApplyRankCapResult
     */
    public function applyRankCap (
            ApplyRankCapRequest $request
    ): ApplyRankCapResult {
        return $this->applyRankCapAsync(
            $request
        )->wait();
    }

    /**
     * @param ApplyRankCapByUserIdRequest $request
     * @return PromiseInterface
     */
    public function applyRankCapByUserIdAsync(
            ApplyRankCapByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ApplyRankCapByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ApplyRankCapByUserIdRequest $request
     * @return ApplyRankCapByUserIdResult
     */
    public function applyRankCapByUserId (
            ApplyRankCapByUserIdRequest $request
    ): ApplyRankCapByUserIdResult {
        return $this->applyRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteStatusByUserIdAsync(
            DeleteStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStatusByUserIdRequest $request
     * @return DeleteStatusByUserIdResult
     */
    public function deleteStatusByUserId (
            DeleteStatusByUserIdRequest $request
    ): DeleteStatusByUserIdResult {
        return $this->deleteStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeAsync(
            VerifyGradeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeRequest $request
     * @return VerifyGradeResult
     */
    public function verifyGrade (
            VerifyGradeRequest $request
    ): VerifyGradeResult {
        return $this->verifyGradeAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeByUserIdAsync(
            VerifyGradeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeByUserIdRequest $request
     * @return VerifyGradeByUserIdResult
     */
    public function verifyGradeByUserId (
            VerifyGradeByUserIdRequest $request
    ): VerifyGradeByUserIdResult {
        return $this->verifyGradeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeUpMaterialRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeUpMaterialAsync(
            VerifyGradeUpMaterialRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeUpMaterialTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeUpMaterialRequest $request
     * @return VerifyGradeUpMaterialResult
     */
    public function verifyGradeUpMaterial (
            VerifyGradeUpMaterialRequest $request
    ): VerifyGradeUpMaterialResult {
        return $this->verifyGradeUpMaterialAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeUpMaterialByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeUpMaterialByUserIdAsync(
            VerifyGradeUpMaterialByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeUpMaterialByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeUpMaterialByUserIdRequest $request
     * @return VerifyGradeUpMaterialByUserIdResult
     */
    public function verifyGradeUpMaterialByUserId (
            VerifyGradeUpMaterialByUserIdRequest $request
    ): VerifyGradeUpMaterialByUserIdResult {
        return $this->verifyGradeUpMaterialByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddGradeByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function addGradeByStampSheetAsync(
            AddGradeByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddGradeByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddGradeByStampSheetRequest $request
     * @return AddGradeByStampSheetResult
     */
    public function addGradeByStampSheet (
            AddGradeByStampSheetRequest $request
    ): AddGradeByStampSheetResult {
        return $this->addGradeByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ApplyRankCapByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function applyRankCapByStampSheetAsync(
            ApplyRankCapByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ApplyRankCapByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ApplyRankCapByStampSheetRequest $request
     * @return ApplyRankCapByStampSheetResult
     */
    public function applyRankCapByStampSheet (
            ApplyRankCapByStampSheetRequest $request
    ): ApplyRankCapByStampSheetResult {
        return $this->applyRankCapByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SubGradeByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function subGradeByStampTaskAsync(
            SubGradeByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubGradeByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SubGradeByStampTaskRequest $request
     * @return SubGradeByStampTaskResult
     */
    public function subGradeByStampTask (
            SubGradeByStampTaskRequest $request
    ): SubGradeByStampTaskResult {
        return $this->subGradeByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function multiplyAcquireActionsByUserIdAsync(
            MultiplyAcquireActionsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MultiplyAcquireActionsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return MultiplyAcquireActionsByUserIdResult
     */
    public function multiplyAcquireActionsByUserId (
            MultiplyAcquireActionsByUserIdRequest $request
    ): MultiplyAcquireActionsByUserIdResult {
        return $this->multiplyAcquireActionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function multiplyAcquireActionsByStampSheetAsync(
            MultiplyAcquireActionsByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MultiplyAcquireActionsByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return MultiplyAcquireActionsByStampSheetResult
     */
    public function multiplyAcquireActionsByStampSheet (
            MultiplyAcquireActionsByStampSheetRequest $request
    ): MultiplyAcquireActionsByStampSheetResult {
        return $this->multiplyAcquireActionsByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeByStampTaskAsync(
            VerifyGradeByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeByStampTaskRequest $request
     * @return VerifyGradeByStampTaskResult
     */
    public function verifyGradeByStampTask (
            VerifyGradeByStampTaskRequest $request
    ): VerifyGradeByStampTaskResult {
        return $this->verifyGradeByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyGradeUpMaterialByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyGradeUpMaterialByStampTaskAsync(
            VerifyGradeUpMaterialByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGradeUpMaterialByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyGradeUpMaterialByStampTaskRequest $request
     * @return VerifyGradeUpMaterialByStampTaskResult
     */
    public function verifyGradeUpMaterialByStampTask (
            VerifyGradeUpMaterialByStampTaskRequest $request
    ): VerifyGradeUpMaterialByStampTaskResult {
        return $this->verifyGradeUpMaterialByStampTaskAsync(
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
     * @param GetCurrentGradeMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentGradeMasterAsync(
            GetCurrentGradeMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentGradeMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentGradeMasterRequest $request
     * @return GetCurrentGradeMasterResult
     */
    public function getCurrentGradeMaster (
            GetCurrentGradeMasterRequest $request
    ): GetCurrentGradeMasterResult {
        return $this->getCurrentGradeMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentGradeMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentGradeMasterAsync(
            UpdateCurrentGradeMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentGradeMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentGradeMasterRequest $request
     * @return UpdateCurrentGradeMasterResult
     */
    public function updateCurrentGradeMaster (
            UpdateCurrentGradeMasterRequest $request
    ): UpdateCurrentGradeMasterResult {
        return $this->updateCurrentGradeMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentGradeMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentGradeMasterFromGitHubAsync(
            UpdateCurrentGradeMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentGradeMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentGradeMasterFromGitHubRequest $request
     * @return UpdateCurrentGradeMasterFromGitHubResult
     */
    public function updateCurrentGradeMasterFromGitHub (
            UpdateCurrentGradeMasterFromGitHubRequest $request
    ): UpdateCurrentGradeMasterFromGitHubResult {
        return $this->updateCurrentGradeMasterFromGitHubAsync(
            $request
        )->wait();
    }
}