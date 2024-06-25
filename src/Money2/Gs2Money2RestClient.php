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

namespace Gs2\Money2;

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


use Gs2\Money2\Request\DescribeNamespacesRequest;
use Gs2\Money2\Result\DescribeNamespacesResult;
use Gs2\Money2\Request\CreateNamespaceRequest;
use Gs2\Money2\Result\CreateNamespaceResult;
use Gs2\Money2\Request\GetNamespaceStatusRequest;
use Gs2\Money2\Result\GetNamespaceStatusResult;
use Gs2\Money2\Request\GetNamespaceRequest;
use Gs2\Money2\Result\GetNamespaceResult;
use Gs2\Money2\Request\UpdateNamespaceRequest;
use Gs2\Money2\Result\UpdateNamespaceResult;
use Gs2\Money2\Request\DeleteNamespaceRequest;
use Gs2\Money2\Result\DeleteNamespaceResult;
use Gs2\Money2\Request\DumpUserDataByUserIdRequest;
use Gs2\Money2\Result\DumpUserDataByUserIdResult;
use Gs2\Money2\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Money2\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Money2\Request\CleanUserDataByUserIdRequest;
use Gs2\Money2\Result\CleanUserDataByUserIdResult;
use Gs2\Money2\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Money2\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Money2\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Money2\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Money2\Request\ImportUserDataByUserIdRequest;
use Gs2\Money2\Result\ImportUserDataByUserIdResult;
use Gs2\Money2\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Money2\Result\CheckImportUserDataByUserIdResult;
use Gs2\Money2\Request\DescribeWalletsRequest;
use Gs2\Money2\Result\DescribeWalletsResult;
use Gs2\Money2\Request\DescribeWalletsByUserIdRequest;
use Gs2\Money2\Result\DescribeWalletsByUserIdResult;
use Gs2\Money2\Request\GetWalletRequest;
use Gs2\Money2\Result\GetWalletResult;
use Gs2\Money2\Request\GetWalletByUserIdRequest;
use Gs2\Money2\Result\GetWalletByUserIdResult;
use Gs2\Money2\Request\DepositByUserIdRequest;
use Gs2\Money2\Result\DepositByUserIdResult;
use Gs2\Money2\Request\WithdrawRequest;
use Gs2\Money2\Result\WithdrawResult;
use Gs2\Money2\Request\WithdrawByUserIdRequest;
use Gs2\Money2\Result\WithdrawByUserIdResult;
use Gs2\Money2\Request\DepositByStampSheetRequest;
use Gs2\Money2\Result\DepositByStampSheetResult;
use Gs2\Money2\Request\WithdrawByStampTaskRequest;
use Gs2\Money2\Result\WithdrawByStampTaskResult;
use Gs2\Money2\Request\DescribeEventsByUserIdRequest;
use Gs2\Money2\Result\DescribeEventsByUserIdResult;
use Gs2\Money2\Request\GetEventByTransactionIdRequest;
use Gs2\Money2\Result\GetEventByTransactionIdResult;
use Gs2\Money2\Request\VerifyReceiptRequest;
use Gs2\Money2\Result\VerifyReceiptResult;
use Gs2\Money2\Request\VerifyReceiptByUserIdRequest;
use Gs2\Money2\Result\VerifyReceiptByUserIdResult;
use Gs2\Money2\Request\VerifyReceiptByStampTaskRequest;
use Gs2\Money2\Result\VerifyReceiptByStampTaskResult;
use Gs2\Money2\Request\DescribeStoreContentModelsRequest;
use Gs2\Money2\Result\DescribeStoreContentModelsResult;
use Gs2\Money2\Request\GetStoreContentModelRequest;
use Gs2\Money2\Result\GetStoreContentModelResult;
use Gs2\Money2\Request\DescribeStoreContentModelMastersRequest;
use Gs2\Money2\Result\DescribeStoreContentModelMastersResult;
use Gs2\Money2\Request\CreateStoreContentModelMasterRequest;
use Gs2\Money2\Result\CreateStoreContentModelMasterResult;
use Gs2\Money2\Request\GetStoreContentModelMasterRequest;
use Gs2\Money2\Result\GetStoreContentModelMasterResult;
use Gs2\Money2\Request\UpdateStoreContentModelMasterRequest;
use Gs2\Money2\Result\UpdateStoreContentModelMasterResult;
use Gs2\Money2\Request\DeleteStoreContentModelMasterRequest;
use Gs2\Money2\Result\DeleteStoreContentModelMasterResult;
use Gs2\Money2\Request\ExportMasterRequest;
use Gs2\Money2\Result\ExportMasterResult;
use Gs2\Money2\Request\GetCurrentModelMasterRequest;
use Gs2\Money2\Result\GetCurrentModelMasterResult;
use Gs2\Money2\Request\UpdateCurrentModelMasterRequest;
use Gs2\Money2\Result\UpdateCurrentModelMasterResult;
use Gs2\Money2\Request\UpdateCurrentModelMasterFromGitHubRequest;
use Gs2\Money2\Result\UpdateCurrentModelMasterFromGitHubResult;

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getCurrencyUsagePriority() !== null) {
            $json["currencyUsagePriority"] = $this->request->getCurrencyUsagePriority();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getSharedFreeCurrency() !== null) {
            $json["sharedFreeCurrency"] = $this->request->getSharedFreeCurrency();
        }
        if ($this->request->getPlatformSetting() !== null) {
            $json["platformSetting"] = $this->request->getPlatformSetting()->toJson();
        }
        if ($this->request->getChangeBalanceScript() !== null) {
            $json["changeBalanceScript"] = $this->request->getChangeBalanceScript()->toJson();
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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCurrencyUsagePriority() !== null) {
            $json["currencyUsagePriority"] = $this->request->getCurrencyUsagePriority();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPlatformSetting() !== null) {
            $json["platformSetting"] = $this->request->getPlatformSetting()->toJson();
        }
        if ($this->request->getChangeBalanceScript() !== null) {
            $json["changeBalanceScript"] = $this->request->getChangeBalanceScript()->toJson();
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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeWalletsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeWalletsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeWalletsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeWalletsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeWalletsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeWalletsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet";

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

class DescribeWalletsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeWalletsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeWalletsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeWalletsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeWalletsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeWalletsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet";

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

class GetWalletTask extends Gs2RestSessionTask {

    /**
     * @var GetWalletRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetWalletTask constructor.
     * @param Gs2RestSession $session
     * @param GetWalletRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetWalletRequest $request
    ) {
        parent::__construct(
            $session,
            GetWalletResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet/{slot}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

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

class GetWalletByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetWalletByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetWalletByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetWalletByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetWalletByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetWalletByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

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

class DepositByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DepositByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DepositByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DepositByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DepositByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DepositByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/deposit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getDepositTransactions() !== null) {
            $array = [];
            foreach ($this->request->getDepositTransactions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["depositTransactions"] = $array;
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

class WithdrawTask extends Gs2RestSessionTask {

    /**
     * @var WithdrawRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WithdrawTask constructor.
     * @param Gs2RestSession $session
     * @param WithdrawRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WithdrawRequest $request
    ) {
        parent::__construct(
            $session,
            WithdrawResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getWithdrawCount() !== null) {
            $json["withdrawCount"] = $this->request->getWithdrawCount();
        }
        if ($this->request->getPaidOnly() !== null) {
            $json["paidOnly"] = $this->request->getPaidOnly();
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

class WithdrawByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var WithdrawByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WithdrawByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param WithdrawByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WithdrawByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            WithdrawByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getWithdrawCount() !== null) {
            $json["withdrawCount"] = $this->request->getWithdrawCount();
        }
        if ($this->request->getPaidOnly() !== null) {
            $json["paidOnly"] = $this->request->getPaidOnly();
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

class DepositByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DepositByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DepositByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DepositByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DepositByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DepositByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/deposit";

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

class WithdrawByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var WithdrawByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WithdrawByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param WithdrawByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WithdrawByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            WithdrawByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/withdraw";

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

class DescribeEventsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEventsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEventsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEventsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEventsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEventsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/event/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
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

class GetEventByTransactionIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEventByTransactionIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEventByTransactionIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEventByTransactionIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEventByTransactionIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEventByTransactionIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/event/{transactionId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class VerifyReceiptTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReceiptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReceiptTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReceiptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReceiptRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReceiptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/content/{contentName}/receipt/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

        $json = [];
        if ($this->request->getReceipt() !== null) {
            $json["receipt"] = $this->request->getReceipt()->toJson();
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

class VerifyReceiptByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReceiptByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReceiptByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReceiptByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReceiptByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReceiptByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/content/{contentName}/receipt/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

        $json = [];
        if ($this->request->getReceipt() !== null) {
            $json["receipt"] = $this->request->getReceipt()->toJson();
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

class VerifyReceiptByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReceiptByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReceiptByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReceiptByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReceiptByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReceiptByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/receipt/verify";

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

class DescribeStoreContentModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStoreContentModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStoreContentModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStoreContentModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStoreContentModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStoreContentModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/content";

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

class GetStoreContentModelTask extends Gs2RestSessionTask {

    /**
     * @var GetStoreContentModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStoreContentModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetStoreContentModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStoreContentModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetStoreContentModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/content/{contentName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

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

class DescribeStoreContentModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStoreContentModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStoreContentModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStoreContentModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStoreContentModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStoreContentModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateStoreContentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateStoreContentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateStoreContentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateStoreContentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateStoreContentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateStoreContentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getAppleAppStore() !== null) {
            $json["appleAppStore"] = $this->request->getAppleAppStore()->toJson();
        }
        if ($this->request->getGooglePlay() !== null) {
            $json["googlePlay"] = $this->request->getGooglePlay()->toJson();
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

class GetStoreContentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetStoreContentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStoreContentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetStoreContentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStoreContentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetStoreContentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{contentName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

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

class UpdateStoreContentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStoreContentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStoreContentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStoreContentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStoreContentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStoreContentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{contentName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getAppleAppStore() !== null) {
            $json["appleAppStore"] = $this->request->getAppleAppStore()->toJson();
        }
        if ($this->request->getGooglePlay() !== null) {
            $json["googlePlay"] = $this->request->getGooglePlay()->toJson();
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

class DeleteStoreContentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStoreContentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStoreContentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStoreContentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStoreContentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStoreContentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{contentName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{contentName}", $this->request->getContentName() === null|| strlen($this->request->getContentName()) == 0 ? "null" : $this->request->getContentName(), $url);

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

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Money2 API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2Money2RestClient extends AbstractGs2Client {

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
     * @param DescribeWalletsRequest $request
     * @return PromiseInterface
     */
    public function describeWalletsAsync(
            DescribeWalletsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeWalletsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeWalletsRequest $request
     * @return DescribeWalletsResult
     */
    public function describeWallets (
            DescribeWalletsRequest $request
    ): DescribeWalletsResult {
        return $this->describeWalletsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeWalletsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeWalletsByUserIdAsync(
            DescribeWalletsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeWalletsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeWalletsByUserIdRequest $request
     * @return DescribeWalletsByUserIdResult
     */
    public function describeWalletsByUserId (
            DescribeWalletsByUserIdRequest $request
    ): DescribeWalletsByUserIdResult {
        return $this->describeWalletsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetWalletRequest $request
     * @return PromiseInterface
     */
    public function getWalletAsync(
            GetWalletRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetWalletTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetWalletRequest $request
     * @return GetWalletResult
     */
    public function getWallet (
            GetWalletRequest $request
    ): GetWalletResult {
        return $this->getWalletAsync(
            $request
        )->wait();
    }

    /**
     * @param GetWalletByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getWalletByUserIdAsync(
            GetWalletByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetWalletByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetWalletByUserIdRequest $request
     * @return GetWalletByUserIdResult
     */
    public function getWalletByUserId (
            GetWalletByUserIdRequest $request
    ): GetWalletByUserIdResult {
        return $this->getWalletByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DepositByUserIdRequest $request
     * @return PromiseInterface
     */
    public function depositByUserIdAsync(
            DepositByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DepositByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DepositByUserIdRequest $request
     * @return DepositByUserIdResult
     */
    public function depositByUserId (
            DepositByUserIdRequest $request
    ): DepositByUserIdResult {
        return $this->depositByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param WithdrawRequest $request
     * @return PromiseInterface
     */
    public function withdrawAsync(
            WithdrawRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WithdrawTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WithdrawRequest $request
     * @return WithdrawResult
     */
    public function withdraw (
            WithdrawRequest $request
    ): WithdrawResult {
        return $this->withdrawAsync(
            $request
        )->wait();
    }

    /**
     * @param WithdrawByUserIdRequest $request
     * @return PromiseInterface
     */
    public function withdrawByUserIdAsync(
            WithdrawByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WithdrawByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WithdrawByUserIdRequest $request
     * @return WithdrawByUserIdResult
     */
    public function withdrawByUserId (
            WithdrawByUserIdRequest $request
    ): WithdrawByUserIdResult {
        return $this->withdrawByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DepositByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function depositByStampSheetAsync(
            DepositByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DepositByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DepositByStampSheetRequest $request
     * @return DepositByStampSheetResult
     */
    public function depositByStampSheet (
            DepositByStampSheetRequest $request
    ): DepositByStampSheetResult {
        return $this->depositByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param WithdrawByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function withdrawByStampTaskAsync(
            WithdrawByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WithdrawByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WithdrawByStampTaskRequest $request
     * @return WithdrawByStampTaskResult
     */
    public function withdrawByStampTask (
            WithdrawByStampTaskRequest $request
    ): WithdrawByStampTaskResult {
        return $this->withdrawByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeEventsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeEventsByUserIdAsync(
            DescribeEventsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEventsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeEventsByUserIdRequest $request
     * @return DescribeEventsByUserIdResult
     */
    public function describeEventsByUserId (
            DescribeEventsByUserIdRequest $request
    ): DescribeEventsByUserIdResult {
        return $this->describeEventsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEventByTransactionIdRequest $request
     * @return PromiseInterface
     */
    public function getEventByTransactionIdAsync(
            GetEventByTransactionIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEventByTransactionIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEventByTransactionIdRequest $request
     * @return GetEventByTransactionIdResult
     */
    public function getEventByTransactionId (
            GetEventByTransactionIdRequest $request
    ): GetEventByTransactionIdResult {
        return $this->getEventByTransactionIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReceiptRequest $request
     * @return PromiseInterface
     */
    public function verifyReceiptAsync(
            VerifyReceiptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReceiptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReceiptRequest $request
     * @return VerifyReceiptResult
     */
    public function verifyReceipt (
            VerifyReceiptRequest $request
    ): VerifyReceiptResult {
        return $this->verifyReceiptAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReceiptByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyReceiptByUserIdAsync(
            VerifyReceiptByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReceiptByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReceiptByUserIdRequest $request
     * @return VerifyReceiptByUserIdResult
     */
    public function verifyReceiptByUserId (
            VerifyReceiptByUserIdRequest $request
    ): VerifyReceiptByUserIdResult {
        return $this->verifyReceiptByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReceiptByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyReceiptByStampTaskAsync(
            VerifyReceiptByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReceiptByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReceiptByStampTaskRequest $request
     * @return VerifyReceiptByStampTaskResult
     */
    public function verifyReceiptByStampTask (
            VerifyReceiptByStampTaskRequest $request
    ): VerifyReceiptByStampTaskResult {
        return $this->verifyReceiptByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStoreContentModelsRequest $request
     * @return PromiseInterface
     */
    public function describeStoreContentModelsAsync(
            DescribeStoreContentModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStoreContentModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStoreContentModelsRequest $request
     * @return DescribeStoreContentModelsResult
     */
    public function describeStoreContentModels (
            DescribeStoreContentModelsRequest $request
    ): DescribeStoreContentModelsResult {
        return $this->describeStoreContentModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStoreContentModelRequest $request
     * @return PromiseInterface
     */
    public function getStoreContentModelAsync(
            GetStoreContentModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStoreContentModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStoreContentModelRequest $request
     * @return GetStoreContentModelResult
     */
    public function getStoreContentModel (
            GetStoreContentModelRequest $request
    ): GetStoreContentModelResult {
        return $this->getStoreContentModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStoreContentModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeStoreContentModelMastersAsync(
            DescribeStoreContentModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStoreContentModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStoreContentModelMastersRequest $request
     * @return DescribeStoreContentModelMastersResult
     */
    public function describeStoreContentModelMasters (
            DescribeStoreContentModelMastersRequest $request
    ): DescribeStoreContentModelMastersResult {
        return $this->describeStoreContentModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateStoreContentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createStoreContentModelMasterAsync(
            CreateStoreContentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateStoreContentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateStoreContentModelMasterRequest $request
     * @return CreateStoreContentModelMasterResult
     */
    public function createStoreContentModelMaster (
            CreateStoreContentModelMasterRequest $request
    ): CreateStoreContentModelMasterResult {
        return $this->createStoreContentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStoreContentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getStoreContentModelMasterAsync(
            GetStoreContentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStoreContentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStoreContentModelMasterRequest $request
     * @return GetStoreContentModelMasterResult
     */
    public function getStoreContentModelMaster (
            GetStoreContentModelMasterRequest $request
    ): GetStoreContentModelMasterResult {
        return $this->getStoreContentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStoreContentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateStoreContentModelMasterAsync(
            UpdateStoreContentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStoreContentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateStoreContentModelMasterRequest $request
     * @return UpdateStoreContentModelMasterResult
     */
    public function updateStoreContentModelMaster (
            UpdateStoreContentModelMasterRequest $request
    ): UpdateStoreContentModelMasterResult {
        return $this->updateStoreContentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStoreContentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteStoreContentModelMasterAsync(
            DeleteStoreContentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStoreContentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStoreContentModelMasterRequest $request
     * @return DeleteStoreContentModelMasterResult
     */
    public function deleteStoreContentModelMaster (
            DeleteStoreContentModelMasterRequest $request
    ): DeleteStoreContentModelMasterResult {
        return $this->deleteStoreContentModelMasterAsync(
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
     * @param GetCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentModelMasterAsync(
            GetCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentModelMasterRequest $request
     * @return GetCurrentModelMasterResult
     */
    public function getCurrentModelMaster (
            GetCurrentModelMasterRequest $request
    ): GetCurrentModelMasterResult {
        return $this->getCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterAsync(
            UpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return UpdateCurrentModelMasterResult
     */
    public function updateCurrentModelMaster (
            UpdateCurrentModelMasterRequest $request
    ): UpdateCurrentModelMasterResult {
        return $this->updateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterFromGitHubAsync(
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return UpdateCurrentModelMasterFromGitHubResult
     */
    public function updateCurrentModelMasterFromGitHub (
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): UpdateCurrentModelMasterFromGitHubResult {
        return $this->updateCurrentModelMasterFromGitHubAsync(
            $request
        )->wait();
    }
}