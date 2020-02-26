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
use Gs2\Money\Request\DescribeWalletsRequest;
use Gs2\Money\Result\DescribeWalletsResult;
use Gs2\Money\Request\DescribeWalletsByUserIdRequest;
use Gs2\Money\Result\DescribeWalletsByUserIdResult;
use Gs2\Money\Request\QueryWalletsRequest;
use Gs2\Money\Result\QueryWalletsResult;
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
use Gs2\Money\Request\RecordReceiptByStampTaskRequest;
use Gs2\Money\Result\RecordReceiptByStampTaskResult;

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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPriority() != null) {
            $json["priority"] = $this->request->getPriority();
        }
        if ($this->request->getShareFree() != null) {
            $json["shareFree"] = $this->request->getShareFree();
        }
        if ($this->request->getCurrency() != null) {
            $json["currency"] = $this->request->getCurrency();
        }
        if ($this->request->getAppleKey() != null) {
            $json["appleKey"] = $this->request->getAppleKey();
        }
        if ($this->request->getGoogleKey() != null) {
            $json["googleKey"] = $this->request->getGoogleKey();
        }
        if ($this->request->getEnableFakeReceipt() != null) {
            $json["enableFakeReceipt"] = $this->request->getEnableFakeReceipt();
        }
        if ($this->request->getCreateWalletScript() != null) {
            $json["createWalletScript"] = $this->request->getCreateWalletScript()->toJson();
        }
        if ($this->request->getDepositScript() != null) {
            $json["depositScript"] = $this->request->getDepositScript()->toJson();
        }
        if ($this->request->getWithdrawScript() != null) {
            $json["withdrawScript"] = $this->request->getWithdrawScript()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPriority() != null) {
            $json["priority"] = $this->request->getPriority();
        }
        if ($this->request->getAppleKey() != null) {
            $json["appleKey"] = $this->request->getAppleKey();
        }
        if ($this->request->getGoogleKey() != null) {
            $json["googleKey"] = $this->request->getGoogleKey();
        }
        if ($this->request->getEnableFakeReceipt() != null) {
            $json["enableFakeReceipt"] = $this->request->getEnableFakeReceipt();
        }
        if ($this->request->getCreateWalletScript() != null) {
            $json["createWalletScript"] = $this->request->getCreateWalletScript()->toJson();
        }
        if ($this->request->getDepositScript() != null) {
            $json["depositScript"] = $this->request->getDepositScript()->toJson();
        }
        if ($this->request->getWithdrawScript() != null) {
            $json["withdrawScript"] = $this->request->getWithdrawScript()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/wallet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/wallet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class QueryWalletsTask extends Gs2RestSessionTask {

    /**
     * @var QueryWalletsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryWalletsTask constructor.
     * @param Gs2RestSession $session
     * @param QueryWalletsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryWalletsRequest $request
    ) {
        parent::__construct(
            $session,
            QueryWalletsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/wallet/query";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/wallet/{slot}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() == null ? "null" : $this->request->getSlot(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() == null ? "null" : $this->request->getSlot(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/deposit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() == null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getPrice() != null) {
            $json["price"] = $this->request->getPrice();
        }
        if ($this->request->getCount() != null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() == null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getCount() != null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getPaidOnly() != null) {
            $json["paidOnly"] = $this->request->getPaidOnly();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/wallet/{slot}/withdraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{slot}", $this->request->getSlot() == null ? "null" : $this->request->getSlot(), $url);

        $json = [];
        if ($this->request->getCount() != null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getPaidOnly() != null) {
            $json["paidOnly"] = $this->request->getPaidOnly();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/deposit";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/withdraw";

        $json = [];
        if ($this->request->getStampTask() != null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/receipt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getSlot() != null) {
            $queryStrings["slot"] = $this->request->getSlot();
        }
        if ($this->request->getBegin() != null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() != null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/receipt/{transactionId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{transactionId}", $this->request->getTransactionId() == null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/receipt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContentsId() != null) {
            $json["contentsId"] = $this->request->getContentsId();
        }
        if ($this->request->getReceipt() != null) {
            $json["receipt"] = $this->request->getReceipt();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "money", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/receipt/record";

        $json = [];
        if ($this->request->getStampTask() != null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 Money API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MoneyRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * ネームスペースの一覧を取得します<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
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
     * ネームスペースの一覧を取得します<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
     * @return DescribeNamespacesResult
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {

        $resultAsyncResult = [];
        $this->describeNamespacesAsync(
            $request
        )->then(
            function (DescribeNamespacesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを新規作成します<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを新規作成します<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
     * @return CreateNamespaceResult
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {

        $resultAsyncResult = [];
        $this->createNamespaceAsync(
            $request
        )->then(
            function (CreateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースの状態を取得します<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
     * ネームスペースの状態を取得します<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {

        $resultAsyncResult = [];
        $this->getNamespaceStatusAsync(
            $request
        )->then(
            function (GetNamespaceStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを取得します<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを取得します<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
     * @return GetNamespaceResult
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {

        $resultAsyncResult = [];
        $this->getNamespaceAsync(
            $request
        )->then(
            function (GetNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを更新します<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを更新します<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
     * @return UpdateNamespaceResult
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {

        $resultAsyncResult = [];
        $this->updateNamespaceAsync(
            $request
        )->then(
            function (UpdateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを削除します<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを削除します<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
     * @return DeleteNamespaceResult
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {

        $resultAsyncResult = [];
        $this->deleteNamespaceAsync(
            $request
        )->then(
            function (DeleteNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレット一覧を取得します<br>
     *
     * @param DescribeWalletsRequest $request リクエストパラメータ
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
     * ウォレット一覧を取得します<br>
     *
     * @param DescribeWalletsRequest $request リクエストパラメータ
     * @return DescribeWalletsResult
     */
    public function describeWallets (
            DescribeWalletsRequest $request
    ): DescribeWalletsResult {

        $resultAsyncResult = [];
        $this->describeWalletsAsync(
            $request
        )->then(
            function (DescribeWalletsResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレット一覧を取得します<br>
     *
     * @param DescribeWalletsByUserIdRequest $request リクエストパラメータ
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
     * ウォレット一覧を取得します<br>
     *
     * @param DescribeWalletsByUserIdRequest $request リクエストパラメータ
     * @return DescribeWalletsByUserIdResult
     */
    public function describeWalletsByUserId (
            DescribeWalletsByUserIdRequest $request
    ): DescribeWalletsByUserIdResult {

        $resultAsyncResult = [];
        $this->describeWalletsByUserIdAsync(
            $request
        )->then(
            function (DescribeWalletsByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレット一覧を取得します<br>
     *
     * @param QueryWalletsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function queryWalletsAsync(
            QueryWalletsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryWalletsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ウォレット一覧を取得します<br>
     *
     * @param QueryWalletsRequest $request リクエストパラメータ
     * @return QueryWalletsResult
     */
    public function queryWallets (
            QueryWalletsRequest $request
    ): QueryWalletsResult {

        $resultAsyncResult = [];
        $this->queryWalletsAsync(
            $request
        )->then(
            function (QueryWalletsResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレットを取得します<br>
     *
     * @param GetWalletRequest $request リクエストパラメータ
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
     * ウォレットを取得します<br>
     *
     * @param GetWalletRequest $request リクエストパラメータ
     * @return GetWalletResult
     */
    public function getWallet (
            GetWalletRequest $request
    ): GetWalletResult {

        $resultAsyncResult = [];
        $this->getWalletAsync(
            $request
        )->then(
            function (GetWalletResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザーIDを指定してウォレットを取得します<br>
     *
     * @param GetWalletByUserIdRequest $request リクエストパラメータ
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
     * ユーザーIDを指定してウォレットを取得します<br>
     *
     * @param GetWalletByUserIdRequest $request リクエストパラメータ
     * @return GetWalletByUserIdResult
     */
    public function getWalletByUserId (
            GetWalletByUserIdRequest $request
    ): GetWalletByUserIdResult {

        $resultAsyncResult = [];
        $this->getWalletByUserIdAsync(
            $request
        )->then(
            function (GetWalletByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザーIDを指定してウォレットに残高を加算します<br>
     *
     * @param DepositByUserIdRequest $request リクエストパラメータ
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
     * ユーザーIDを指定してウォレットに残高を加算します<br>
     *
     * @param DepositByUserIdRequest $request リクエストパラメータ
     * @return DepositByUserIdResult
     */
    public function depositByUserId (
            DepositByUserIdRequest $request
    ): DepositByUserIdResult {

        $resultAsyncResult = [];
        $this->depositByUserIdAsync(
            $request
        )->then(
            function (DepositByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレットから残高を消費します<br>
     *
     * @param WithdrawRequest $request リクエストパラメータ
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
     * ウォレットから残高を消費します<br>
     *
     * @param WithdrawRequest $request リクエストパラメータ
     * @return WithdrawResult
     */
    public function withdraw (
            WithdrawRequest $request
    ): WithdrawResult {

        $resultAsyncResult = [];
        $this->withdrawAsync(
            $request
        )->then(
            function (WithdrawResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザーIDを指定してウォレットから残高を消費します<br>
     *
     * @param WithdrawByUserIdRequest $request リクエストパラメータ
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
     * ユーザーIDを指定してウォレットから残高を消費します<br>
     *
     * @param WithdrawByUserIdRequest $request リクエストパラメータ
     * @return WithdrawByUserIdResult
     */
    public function withdrawByUserId (
            WithdrawByUserIdRequest $request
    ): WithdrawByUserIdResult {

        $resultAsyncResult = [];
        $this->withdrawByUserIdAsync(
            $request
        )->then(
            function (WithdrawByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシートを使用してウォレットに残高を加算します<br>
     *
     * @param DepositByStampSheetRequest $request リクエストパラメータ
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
     * スタンプシートを使用してウォレットに残高を加算します<br>
     *
     * @param DepositByStampSheetRequest $request リクエストパラメータ
     * @return DepositByStampSheetResult
     */
    public function depositByStampSheet (
            DepositByStampSheetRequest $request
    ): DepositByStampSheetResult {

        $resultAsyncResult = [];
        $this->depositByStampSheetAsync(
            $request
        )->then(
            function (DepositByStampSheetResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ウォレットから残高を消費します<br>
     *
     * @param WithdrawByStampTaskRequest $request リクエストパラメータ
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
     * ウォレットから残高を消費します<br>
     *
     * @param WithdrawByStampTaskRequest $request リクエストパラメータ
     * @return WithdrawByStampTaskResult
     */
    public function withdrawByStampTask (
            WithdrawByStampTaskRequest $request
    ): WithdrawByStampTaskResult {

        $resultAsyncResult = [];
        $this->withdrawByStampTaskAsync(
            $request
        )->then(
            function (WithdrawByStampTaskResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * レシートの一覧を取得<br>
     *
     * @param DescribeReceiptsRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * レシートの一覧を取得<br>
     *
     * @param DescribeReceiptsRequest $request リクエストパラメータ
     * @return DescribeReceiptsResult
     */
    public function describeReceipts (
            DescribeReceiptsRequest $request
    ): DescribeReceiptsResult {

        $resultAsyncResult = [];
        $this->describeReceiptsAsync(
            $request
        )->then(
            function (DescribeReceiptsResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * レシートの一覧を取得<br>
     *
     * @param GetByUserIdAndTransactionIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * レシートの一覧を取得<br>
     *
     * @param GetByUserIdAndTransactionIdRequest $request リクエストパラメータ
     * @return GetByUserIdAndTransactionIdResult
     */
    public function getByUserIdAndTransactionId (
            GetByUserIdAndTransactionIdRequest $request
    ): GetByUserIdAndTransactionIdResult {

        $resultAsyncResult = [];
        $this->getByUserIdAndTransactionIdAsync(
            $request
        )->then(
            function (GetByUserIdAndTransactionIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * レシートを記録<br>
     *
     * @param RecordReceiptRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * レシートを記録<br>
     *
     * @param RecordReceiptRequest $request リクエストパラメータ
     * @return RecordReceiptResult
     */
    public function recordReceipt (
            RecordReceiptRequest $request
    ): RecordReceiptResult {

        $resultAsyncResult = [];
        $this->recordReceiptAsync(
            $request
        )->then(
            function (RecordReceiptResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシートを使用してレシートを記録<br>
     *
     * @param RecordReceiptByStampTaskRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * スタンプシートを使用してレシートを記録<br>
     *
     * @param RecordReceiptByStampTaskRequest $request リクエストパラメータ
     * @return RecordReceiptByStampTaskResult
     */
    public function recordReceiptByStampTask (
            RecordReceiptByStampTaskRequest $request
    ): RecordReceiptByStampTaskResult {

        $resultAsyncResult = [];
        $this->recordReceiptByStampTaskAsync(
            $request
        )->then(
            function (RecordReceiptByStampTaskResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }
}