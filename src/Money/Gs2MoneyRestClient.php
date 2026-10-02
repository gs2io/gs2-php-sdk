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

namespace Gs2\Money;

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


use Gs2\Money\Request\DescribeNamespacesRequest;
use Gs2\Money\Result\DescribeNamespacesResult;
use Gs2\Money\Request\CreateNamespaceRequest;
use Gs2\Money\Result\CreateNamespaceResult;
use Gs2\Money\Request\GetNamespaceStatusRequest;
use Gs2\Money\Result\GetNamespaceStatusResult;
use Gs2\Money\Request\GetNamespaceRequest;
use Gs2\Money\Result\GetNamespaceResult;
use Gs2\Money\Request\UpdateNamespaceRequest;
use Gs2\Money\Result\UpdateNamespaceResult;
use Gs2\Money\Request\DeleteNamespaceRequest;
use Gs2\Money\Result\DeleteNamespaceResult;
use Gs2\Money\Request\GetServiceVersionRequest;
use Gs2\Money\Result\GetServiceVersionResult;
use Gs2\Money\Request\DumpUserDataByUserIdRequest;
use Gs2\Money\Result\DumpUserDataByUserIdResult;
use Gs2\Money\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Money\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Money\Request\CleanUserDataByUserIdRequest;
use Gs2\Money\Result\CleanUserDataByUserIdResult;
use Gs2\Money\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Money\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Money\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Money\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Money\Request\ImportUserDataByUserIdRequest;
use Gs2\Money\Result\ImportUserDataByUserIdResult;
use Gs2\Money\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Money\Result\CheckImportUserDataByUserIdResult;
use Gs2\Money\Request\DescribeWalletsRequest;
use Gs2\Money\Result\DescribeWalletsResult;
use Gs2\Money\Request\DescribeWalletsByUserIdRequest;
use Gs2\Money\Result\DescribeWalletsByUserIdResult;
use Gs2\Money\Request\GetWalletRequest;
use Gs2\Money\Result\GetWalletResult;
use Gs2\Money\Request\GetWalletByUserIdRequest;
use Gs2\Money\Result\GetWalletByUserIdResult;
use Gs2\Money\Request\DepositByUserIdRequest;
use Gs2\Money\Result\DepositByUserIdResult;
use Gs2\Money\Request\WithdrawRequest;
use Gs2\Money\Result\WithdrawResult;
use Gs2\Money\Request\WithdrawByUserIdRequest;
use Gs2\Money\Result\WithdrawByUserIdResult;
use Gs2\Money\Request\DepositByStampSheetRequest;
use Gs2\Money\Result\DepositByStampSheetResult;
use Gs2\Money\Request\WithdrawByStampTaskRequest;
use Gs2\Money\Result\WithdrawByStampTaskResult;
use Gs2\Money\Request\DescribeReceiptsRequest;
use Gs2\Money\Result\DescribeReceiptsResult;
use Gs2\Money\Request\GetByUserIdAndTransactionIdRequest;
use Gs2\Money\Result\GetByUserIdAndTransactionIdResult;
use Gs2\Money\Request\RecordReceiptRequest;
use Gs2\Money\Result\RecordReceiptResult;
use Gs2\Money\Request\RevertRecordReceiptRequest;
use Gs2\Money\Result\RevertRecordReceiptResult;
use Gs2\Money\Request\RecordReceiptByStampTaskRequest;
use Gs2\Money\Result\RecordReceiptByStampTaskResult;
use Gs2\Money\Request\RevertRecordReceiptByStampSheetRequest;
use Gs2\Money\Result\RevertRecordReceiptByStampSheetResult;

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getPriority() !== null) {
            $json["priority"] = $this->request->getPriority();
        }
        if ($this->request->getShareFree() !== null) {
            $json["shareFree"] = $this->request->getShareFree();
        }
        if ($this->request->getCurrency() !== null) {
            $json["currency"] = $this->request->getCurrency();
        }
        if ($this->request->getAppleKey() !== null) {
            $json["appleKey"] = $this->request->getAppleKey();
        }
        if ($this->request->getGoogleKey() !== null) {
            $json["googleKey"] = $this->request->getGoogleKey();
        }
        if ($this->request->getEnableFakeReceipt() !== null) {
            $json["enableFakeReceipt"] = $this->request->getEnableFakeReceipt();
        }
        if ($this->request->getCreateWalletScript() !== null) {
            $json["createWalletScript"] = $this->request->getCreateWalletScript()->toJson();
        }
        if ($this->request->getDepositScript() !== null) {
            $json["depositScript"] = $this->request->getDepositScript()->toJson();
        }
        if ($this->request->getWithdrawScript() !== null) {
            $json["withdrawScript"] = $this->request->getWithdrawScript()->toJson();
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getPriority() !== null) {
            $json["priority"] = $this->request->getPriority();
        }
        if ($this->request->getAppleKey() !== null) {
            $json["appleKey"] = $this->request->getAppleKey();
        }
        if ($this->request->getGoogleKey() !== null) {
            $json["googleKey"] = $this->request->getGoogleKey();
        }
        if ($this->request->getEnableFakeReceipt() !== null) {
            $json["enableFakeReceipt"] = $this->request->getEnableFakeReceipt();
        }
        if ($this->request->getCreateWalletScript() !== null) {
            $json["createWalletScript"] = $this->request->getCreateWalletScript()->toJson();
        }
        if ($this->request->getDepositScript() !== null) {
            $json["depositScript"] = $this->request->getDepositScript()->toJson();
        }
        if ($this->request->getWithdrawScript() !== null) {
            $json["withdrawScript"] = $this->request->getWithdrawScript()->toJson();
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet/{slot}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/deposit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getPrice() !== null) {
            $json["price"] = $this->request->getPrice();
        }
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() === null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/deposit";

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/withdraw";

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

class DescribeReceiptsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiptsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiptsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiptsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiptsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiptsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/receipt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getSlot() !== null) {
            $queryStrings["slot"] = $this->request->getSlot();
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

class GetByUserIdAndTransactionIdTask extends Gs2RestSessionTask {

    /**
     * @var GetByUserIdAndTransactionIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetByUserIdAndTransactionIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetByUserIdAndTransactionIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetByUserIdAndTransactionIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetByUserIdAndTransactionIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receipt/{transactionId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class RecordReceiptTask extends Gs2RestSessionTask {

    /**
     * @var RecordReceiptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RecordReceiptTask constructor.
     * @param Gs2RestSession $session
     * @param RecordReceiptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RecordReceiptRequest $request
    ) {
        parent::__construct(
            $session,
            RecordReceiptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receipt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContentsId() !== null) {
            $json["contentsId"] = $this->request->getContentsId();
        }
        if ($this->request->getReceipt() !== null) {
            $json["receipt"] = $this->request->getReceipt();
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

class RevertRecordReceiptTask extends Gs2RestSessionTask {

    /**
     * @var RevertRecordReceiptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertRecordReceiptTask constructor.
     * @param Gs2RestSession $session
     * @param RevertRecordReceiptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertRecordReceiptRequest $request
    ) {
        parent::__construct(
            $session,
            RevertRecordReceiptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receipt/revert";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getReceipt() !== null) {
            $json["receipt"] = $this->request->getReceipt();
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

class RecordReceiptByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var RecordReceiptByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RecordReceiptByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param RecordReceiptByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RecordReceiptByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            RecordReceiptByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/receipt/record";

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

class RevertRecordReceiptByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RevertRecordReceiptByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertRecordReceiptByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RevertRecordReceiptByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertRecordReceiptByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RevertRecordReceiptByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/receipt/record/revert";

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
 * GS2-Money API client
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/
 */
class Gs2MoneyRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#deletenamespace
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get Microservice Version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#getserviceversion
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
     * Get Microservice Version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/money/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List wallets
     *
     * @param DescribeWalletsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#describewallets
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
     * List wallets
     *
     * @param DescribeWalletsRequest $request
     * @return DescribeWalletsResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#describewallets
     */
    public function describeWallets (
            DescribeWalletsRequest $request
    ): DescribeWalletsResult {
        return $this->describeWalletsAsync(
            $request
        )->wait();
    }

    /**
     * List Wallets by User ID
     *
     * @param DescribeWalletsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#describewalletsbyuserid
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
     * List Wallets by User ID
     *
     * @param DescribeWalletsByUserIdRequest $request
     * @return DescribeWalletsByUserIdResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#describewalletsbyuserid
     */
    public function describeWalletsByUserId (
            DescribeWalletsByUserIdRequest $request
    ): DescribeWalletsByUserIdResult {
        return $this->describeWalletsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Wallet
     *
     * @param GetWalletRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#getwallet
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
     * Get Wallet
     *
     * @param GetWalletRequest $request
     * @return GetWalletResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#getwallet
     */
    public function getWallet (
            GetWalletRequest $request
    ): GetWalletResult {
        return $this->getWalletAsync(
            $request
        )->wait();
    }

    /**
     * Get Wallet by User ID
     *
     * @param GetWalletByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#getwalletbyuserid
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
     * Get Wallet by User ID
     *
     * @param GetWalletByUserIdRequest $request
     * @return GetWalletByUserIdResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#getwalletbyuserid
     */
    public function getWalletByUserId (
            GetWalletByUserIdRequest $request
    ): GetWalletByUserIdResult {
        return $this->getWalletByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Deposit balance to Wallet by User ID
     *
     * @param DepositByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#depositbyuserid
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
     * Deposit balance to Wallet by User ID
     *
     * @param DepositByUserIdRequest $request
     * @return DepositByUserIdResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#depositbyuserid
     */
    public function depositByUserId (
            DepositByUserIdRequest $request
    ): DepositByUserIdResult {
        return $this->depositByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Consume balance from wallet
     *
     * @param WithdrawRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#withdraw
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
     * Consume balance from wallet
     *
     * @param WithdrawRequest $request
     * @return WithdrawResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#withdraw
     */
    public function withdraw (
            WithdrawRequest $request
    ): WithdrawResult {
        return $this->withdrawAsync(
            $request
        )->wait();
    }

    /**
     * Consume balance from Wallet by User ID
     *
     * @param WithdrawByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#withdrawbyuserid
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
     * Consume balance from Wallet by User ID
     *
     * @param WithdrawByUserIdRequest $request
     * @return WithdrawByUserIdResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#withdrawbyuserid
     */
    public function withdrawByUserId (
            WithdrawByUserIdRequest $request
    ): WithdrawByUserIdResult {
        return $this->withdrawByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute balance addition to wallet as an acquire action
     *
     * @param DepositByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneydepositbyuserid
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
     * Execute balance addition to wallet as an acquire action
     *
     * @param DepositByStampSheetRequest $request
     * @return DepositByStampSheetResult
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneydepositbyuserid
     */
    public function depositByStampSheet (
            DepositByStampSheetRequest $request
    ): DepositByStampSheetResult {
        return $this->depositByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute balance consumption from wallet as a consume action
     *
     * @param WithdrawByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneywithdrawbyuserid
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
     * Execute balance consumption from wallet as a consume action
     *
     * @param WithdrawByStampTaskRequest $request
     * @return WithdrawByStampTaskResult
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneywithdrawbyuserid
     */
    public function withdrawByStampTask (
            WithdrawByStampTaskRequest $request
    ): WithdrawByStampTaskResult {
        return $this->withdrawByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List receipts
     *
     * @param DescribeReceiptsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#describereceipts
     */
    public function describeReceiptsAsync(
            DescribeReceiptsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiptsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List receipts
     *
     * @param DescribeReceiptsRequest $request
     * @return DescribeReceiptsResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#describereceipts
     */
    public function describeReceipts (
            DescribeReceiptsRequest $request
    ): DescribeReceiptsResult {
        return $this->describeReceiptsAsync(
            $request
        )->wait();
    }

    /**
     * Get receipt by specifying user ID and transaction ID
     *
     * @param GetByUserIdAndTransactionIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#getbyuseridandtransactionid
     */
    public function getByUserIdAndTransactionIdAsync(
            GetByUserIdAndTransactionIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetByUserIdAndTransactionIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get receipt by specifying user ID and transaction ID
     *
     * @param GetByUserIdAndTransactionIdRequest $request
     * @return GetByUserIdAndTransactionIdResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#getbyuseridandtransactionid
     */
    public function getByUserIdAndTransactionId (
            GetByUserIdAndTransactionIdRequest $request
    ): GetByUserIdAndTransactionIdResult {
        return $this->getByUserIdAndTransactionIdAsync(
            $request
        )->wait();
    }

    /**
     * Record receipt
     *
     * @param RecordReceiptRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#recordreceipt
     */
    public function recordReceiptAsync(
            RecordReceiptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RecordReceiptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Record receipt
     *
     * @param RecordReceiptRequest $request
     * @return RecordReceiptResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#recordreceipt
     */
    public function recordReceipt (
            RecordReceiptRequest $request
    ): RecordReceiptResult {
        return $this->recordReceiptAsync(
            $request
        )->wait();
    }

    /**
     * Delete receipt record by User ID
     *
     * @param RevertRecordReceiptRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/sdk/#revertrecordreceipt
     */
    public function revertRecordReceiptAsync(
            RevertRecordReceiptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertRecordReceiptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete receipt record by User ID
     *
     * @param RevertRecordReceiptRequest $request
     * @return RevertRecordReceiptResult
     * @see https://docs.gs2.io/api_reference/money/sdk/#revertrecordreceipt
     */
    public function revertRecordReceipt (
            RevertRecordReceiptRequest $request
    ): RevertRecordReceiptResult {
        return $this->revertRecordReceiptAsync(
            $request
        )->wait();
    }

    /**
     * Execute receipt recording as a consume action
     *
     * @param RecordReceiptByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneyrecordreceipt
     */
    public function recordReceiptByStampTaskAsync(
            RecordReceiptByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RecordReceiptByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute receipt recording as a consume action
     *
     * @param RecordReceiptByStampTaskRequest $request
     * @return RecordReceiptByStampTaskResult
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneyrecordreceipt
     */
    public function recordReceiptByStampTask (
            RecordReceiptByStampTaskRequest $request
    ): RecordReceiptByStampTaskResult {
        return $this->recordReceiptByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute receipt recording deletion as an acquire action
     *
     * @param RevertRecordReceiptByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneyrevertrecordreceipt
     */
    public function revertRecordReceiptByStampSheetAsync(
            RevertRecordReceiptByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertRecordReceiptByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute receipt recording deletion as an acquire action
     *
     * @param RevertRecordReceiptByStampSheetRequest $request
     * @return RevertRecordReceiptByStampSheetResult
     * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneyrevertrecordreceipt
     */
    public function revertRecordReceiptByStampSheet (
            RevertRecordReceiptByStampSheetRequest $request
    ): RevertRecordReceiptByStampSheetResult {
        return $this->revertRecordReceiptByStampSheetAsync(
            $request
        )->wait();
    }
}