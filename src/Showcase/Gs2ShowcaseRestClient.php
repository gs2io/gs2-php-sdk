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

namespace Gs2\Showcase;

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


use Gs2\Showcase\Request\DescribeNamespacesRequest;
use Gs2\Showcase\Result\DescribeNamespacesResult;
use Gs2\Showcase\Request\CreateNamespaceRequest;
use Gs2\Showcase\Result\CreateNamespaceResult;
use Gs2\Showcase\Request\GetNamespaceStatusRequest;
use Gs2\Showcase\Result\GetNamespaceStatusResult;
use Gs2\Showcase\Request\GetNamespaceRequest;
use Gs2\Showcase\Result\GetNamespaceResult;
use Gs2\Showcase\Request\UpdateNamespaceRequest;
use Gs2\Showcase\Result\UpdateNamespaceResult;
use Gs2\Showcase\Request\DeleteNamespaceRequest;
use Gs2\Showcase\Result\DeleteNamespaceResult;
use Gs2\Showcase\Request\DumpUserDataByUserIdRequest;
use Gs2\Showcase\Result\DumpUserDataByUserIdResult;
use Gs2\Showcase\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Showcase\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Showcase\Request\CleanUserDataByUserIdRequest;
use Gs2\Showcase\Result\CleanUserDataByUserIdResult;
use Gs2\Showcase\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Showcase\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Showcase\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Showcase\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Showcase\Request\ImportUserDataByUserIdRequest;
use Gs2\Showcase\Result\ImportUserDataByUserIdResult;
use Gs2\Showcase\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Showcase\Result\CheckImportUserDataByUserIdResult;
use Gs2\Showcase\Request\DescribeSalesItemMastersRequest;
use Gs2\Showcase\Result\DescribeSalesItemMastersResult;
use Gs2\Showcase\Request\CreateSalesItemMasterRequest;
use Gs2\Showcase\Result\CreateSalesItemMasterResult;
use Gs2\Showcase\Request\GetSalesItemMasterRequest;
use Gs2\Showcase\Result\GetSalesItemMasterResult;
use Gs2\Showcase\Request\UpdateSalesItemMasterRequest;
use Gs2\Showcase\Result\UpdateSalesItemMasterResult;
use Gs2\Showcase\Request\DeleteSalesItemMasterRequest;
use Gs2\Showcase\Result\DeleteSalesItemMasterResult;
use Gs2\Showcase\Request\DescribeSalesItemGroupMastersRequest;
use Gs2\Showcase\Result\DescribeSalesItemGroupMastersResult;
use Gs2\Showcase\Request\CreateSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\CreateSalesItemGroupMasterResult;
use Gs2\Showcase\Request\GetSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\GetSalesItemGroupMasterResult;
use Gs2\Showcase\Request\UpdateSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\UpdateSalesItemGroupMasterResult;
use Gs2\Showcase\Request\DeleteSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\DeleteSalesItemGroupMasterResult;
use Gs2\Showcase\Request\DescribeShowcaseMastersRequest;
use Gs2\Showcase\Result\DescribeShowcaseMastersResult;
use Gs2\Showcase\Request\CreateShowcaseMasterRequest;
use Gs2\Showcase\Result\CreateShowcaseMasterResult;
use Gs2\Showcase\Request\GetShowcaseMasterRequest;
use Gs2\Showcase\Result\GetShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateShowcaseMasterRequest;
use Gs2\Showcase\Result\UpdateShowcaseMasterResult;
use Gs2\Showcase\Request\DeleteShowcaseMasterRequest;
use Gs2\Showcase\Result\DeleteShowcaseMasterResult;
use Gs2\Showcase\Request\ExportMasterRequest;
use Gs2\Showcase\Result\ExportMasterResult;
use Gs2\Showcase\Request\GetCurrentShowcaseMasterRequest;
use Gs2\Showcase\Result\GetCurrentShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateCurrentShowcaseMasterRequest;
use Gs2\Showcase\Result\UpdateCurrentShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateCurrentShowcaseMasterFromGitHubRequest;
use Gs2\Showcase\Result\UpdateCurrentShowcaseMasterFromGitHubResult;
use Gs2\Showcase\Request\DescribeShowcasesRequest;
use Gs2\Showcase\Result\DescribeShowcasesResult;
use Gs2\Showcase\Request\DescribeShowcasesByUserIdRequest;
use Gs2\Showcase\Result\DescribeShowcasesByUserIdResult;
use Gs2\Showcase\Request\GetShowcaseRequest;
use Gs2\Showcase\Result\GetShowcaseResult;
use Gs2\Showcase\Request\GetShowcaseByUserIdRequest;
use Gs2\Showcase\Result\GetShowcaseByUserIdResult;
use Gs2\Showcase\Request\BuyRequest;
use Gs2\Showcase\Result\BuyResult;
use Gs2\Showcase\Request\BuyByUserIdRequest;
use Gs2\Showcase\Result\BuyByUserIdResult;
use Gs2\Showcase\Request\DescribeRandomShowcaseMastersRequest;
use Gs2\Showcase\Result\DescribeRandomShowcaseMastersResult;
use Gs2\Showcase\Request\CreateRandomShowcaseMasterRequest;
use Gs2\Showcase\Result\CreateRandomShowcaseMasterResult;
use Gs2\Showcase\Request\GetRandomShowcaseMasterRequest;
use Gs2\Showcase\Result\GetRandomShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateRandomShowcaseMasterRequest;
use Gs2\Showcase\Result\UpdateRandomShowcaseMasterResult;
use Gs2\Showcase\Request\DeleteRandomShowcaseMasterRequest;
use Gs2\Showcase\Result\DeleteRandomShowcaseMasterResult;
use Gs2\Showcase\Request\IncrementPurchaseCountByUserIdRequest;
use Gs2\Showcase\Result\IncrementPurchaseCountByUserIdResult;
use Gs2\Showcase\Request\DecrementPurchaseCountByUserIdRequest;
use Gs2\Showcase\Result\DecrementPurchaseCountByUserIdResult;
use Gs2\Showcase\Request\IncrementPurchaseCountByStampTaskRequest;
use Gs2\Showcase\Result\IncrementPurchaseCountByStampTaskResult;
use Gs2\Showcase\Request\DecrementPurchaseCountByStampSheetRequest;
use Gs2\Showcase\Result\DecrementPurchaseCountByStampSheetResult;
use Gs2\Showcase\Request\ForceReDrawByUserIdRequest;
use Gs2\Showcase\Result\ForceReDrawByUserIdResult;
use Gs2\Showcase\Request\ForceReDrawByUserIdByStampSheetRequest;
use Gs2\Showcase\Result\ForceReDrawByUserIdByStampSheetResult;
use Gs2\Showcase\Request\DescribeRandomDisplayItemsRequest;
use Gs2\Showcase\Result\DescribeRandomDisplayItemsResult;
use Gs2\Showcase\Request\DescribeRandomDisplayItemsByUserIdRequest;
use Gs2\Showcase\Result\DescribeRandomDisplayItemsByUserIdResult;
use Gs2\Showcase\Request\GetRandomDisplayItemRequest;
use Gs2\Showcase\Result\GetRandomDisplayItemResult;
use Gs2\Showcase\Request\GetRandomDisplayItemByUserIdRequest;
use Gs2\Showcase\Result\GetRandomDisplayItemByUserIdResult;
use Gs2\Showcase\Request\RandomShowcaseBuyRequest;
use Gs2\Showcase\Result\RandomShowcaseBuyResult;
use Gs2\Showcase\Request\RandomShowcaseBuyByUserIdRequest;
use Gs2\Showcase\Result\RandomShowcaseBuyByUserIdResult;

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getBuyScript() !== null) {
            $json["buyScript"] = $this->request->getBuyScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getBuyScript() !== null) {
            $json["buyScript"] = $this->request->getBuyScript()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/dump";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/dump";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/clean";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/clean";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import/prepare";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import";

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

class DescribeSalesItemMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSalesItemMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSalesItemMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSalesItemMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSalesItemMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSalesItemMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem";

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

class CreateSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem";

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
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
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

        return parent::executeImpl();
    }
}

class GetSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

class UpdateSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
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

class DeleteSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

class DescribeSalesItemGroupMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSalesItemGroupMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSalesItemGroupMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSalesItemGroupMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSalesItemGroupMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSalesItemGroupMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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

class CreateSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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
        if ($this->request->getSalesItemNames() !== null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

class GetSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

class UpdateSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSalesItemNames() !== null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

class DeleteSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

class DescribeShowcaseMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcaseMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcaseMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcaseMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcaseMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcaseMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase";

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

class CreateShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase";

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
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class GetShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class UpdateShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class DeleteShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentShowcaseMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentShowcaseMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentShowcaseMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentShowcaseMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeShowcasesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcasesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcasesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcasesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcasesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcasesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeShowcasesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcasesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcasesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcasesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcasesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcasesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        return parent::executeImpl();
    }
}

class GetShowcaseTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class GetShowcaseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
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

        return parent::executeImpl();
    }
}

class BuyTask extends Gs2RestSessionTask {

    /**
     * @var BuyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BuyTask constructor.
     * @param Gs2RestSession $session
     * @param BuyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BuyRequest $request
    ) {
        parent::__construct(
            $session,
            BuyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() === null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);

        $json = [];
        if ($this->request->getQuantity() !== null) {
            $json["quantity"] = $this->request->getQuantity();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class BuyByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var BuyByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BuyByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param BuyByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BuyByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            BuyByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() === null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getQuantity() !== null) {
            $json["quantity"] = $this->request->getQuantity();
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

        return parent::executeImpl();
    }
}

class DescribeRandomShowcaseMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRandomShowcaseMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRandomShowcaseMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRandomShowcaseMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRandomShowcaseMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRandomShowcaseMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/random/showcase";

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

class CreateRandomShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRandomShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRandomShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRandomShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRandomShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRandomShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/random/showcase";

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
        if ($this->request->getMaximumNumberOfChoice() !== null) {
            $json["maximumNumberOfChoice"] = $this->request->getMaximumNumberOfChoice();
        }
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getBaseTimestamp() !== null) {
            $json["baseTimestamp"] = $this->request->getBaseTimestamp();
        }
        if ($this->request->getResetIntervalHours() !== null) {
            $json["resetIntervalHours"] = $this->request->getResetIntervalHours();
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class GetRandomShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRandomShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRandomShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRandomShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRandomShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRandomShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/random/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class UpdateRandomShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRandomShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRandomShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRandomShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRandomShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRandomShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/random/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMaximumNumberOfChoice() !== null) {
            $json["maximumNumberOfChoice"] = $this->request->getMaximumNumberOfChoice();
        }
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getBaseTimestamp() !== null) {
            $json["baseTimestamp"] = $this->request->getBaseTimestamp();
        }
        if ($this->request->getResetIntervalHours() !== null) {
            $json["resetIntervalHours"] = $this->request->getResetIntervalHours();
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class DeleteRandomShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRandomShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRandomShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRandomShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRandomShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRandomShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/random/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class IncrementPurchaseCountByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var IncrementPurchaseCountByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncrementPurchaseCountByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param IncrementPurchaseCountByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncrementPurchaseCountByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            IncrementPurchaseCountByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/random/showcase/user/{userId}/status/{showcaseName}/{displayItemName}/purchase/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
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

        return parent::executeImpl();
    }
}

class DecrementPurchaseCountByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DecrementPurchaseCountByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecrementPurchaseCountByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DecrementPurchaseCountByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecrementPurchaseCountByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DecrementPurchaseCountByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/random/showcase/user/{userId}/status/{showcaseName}/{displayItemName}/purchase/count/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
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

        return parent::executeImpl();
    }
}

class IncrementPurchaseCountByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var IncrementPurchaseCountByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncrementPurchaseCountByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param IncrementPurchaseCountByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncrementPurchaseCountByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            IncrementPurchaseCountByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/random/showcase/status/purchase/count";

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

class DecrementPurchaseCountByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DecrementPurchaseCountByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecrementPurchaseCountByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DecrementPurchaseCountByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecrementPurchaseCountByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DecrementPurchaseCountByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/random/showcase/status/purchase/count/decrease";

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

class ForceReDrawByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ForceReDrawByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ForceReDrawByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ForceReDrawByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ForceReDrawByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ForceReDrawByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/random/showcase/{showcaseName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
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

        return parent::executeImpl();
    }
}

class ForceReDrawByUserIdByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var ForceReDrawByUserIdByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ForceReDrawByUserIdByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param ForceReDrawByUserIdByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ForceReDrawByUserIdByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            ForceReDrawByUserIdByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/random/showcase/status/redraw";

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

class DescribeRandomDisplayItemsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRandomDisplayItemsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRandomDisplayItemsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRandomDisplayItemsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRandomDisplayItemsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRandomDisplayItemsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/random/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class DescribeRandomDisplayItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRandomDisplayItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRandomDisplayItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRandomDisplayItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRandomDisplayItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRandomDisplayItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/random/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
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

        return parent::executeImpl();
    }
}

class GetRandomDisplayItemTask extends Gs2RestSessionTask {

    /**
     * @var GetRandomDisplayItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRandomDisplayItemTask constructor.
     * @param Gs2RestSession $session
     * @param GetRandomDisplayItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRandomDisplayItemRequest $request
    ) {
        parent::__construct(
            $session,
            GetRandomDisplayItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/random/showcase/{showcaseName}/displayItem/{displayItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);

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

class GetRandomDisplayItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetRandomDisplayItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRandomDisplayItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetRandomDisplayItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRandomDisplayItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetRandomDisplayItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/random/showcase/{showcaseName}/displayItem/{displayItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);
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

        return parent::executeImpl();
    }
}

class RandomShowcaseBuyTask extends Gs2RestSessionTask {

    /**
     * @var RandomShowcaseBuyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RandomShowcaseBuyTask constructor.
     * @param Gs2RestSession $session
     * @param RandomShowcaseBuyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RandomShowcaseBuyRequest $request
    ) {
        parent::__construct(
            $session,
            RandomShowcaseBuyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/random/showcase/{showcaseName}/{displayItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);

        $json = [];
        if ($this->request->getQuantity() !== null) {
            $json["quantity"] = $this->request->getQuantity();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RandomShowcaseBuyByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RandomShowcaseBuyByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RandomShowcaseBuyByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RandomShowcaseBuyByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RandomShowcaseBuyByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RandomShowcaseBuyByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/random/showcase/{showcaseName}/{displayItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemName}", $this->request->getDisplayItemName() === null|| strlen($this->request->getDisplayItemName()) == 0 ? "null" : $this->request->getDisplayItemName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getQuantity() !== null) {
            $json["quantity"] = $this->request->getQuantity();
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

        return parent::executeImpl();
    }
}

/**
 * GS2 Showcase API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ShowcaseRestClient extends AbstractGs2Client {

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
     * @param DescribeSalesItemMastersRequest $request
     * @return PromiseInterface
     */
    public function describeSalesItemMastersAsync(
            DescribeSalesItemMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSalesItemMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSalesItemMastersRequest $request
     * @return DescribeSalesItemMastersResult
     */
    public function describeSalesItemMasters (
            DescribeSalesItemMastersRequest $request
    ): DescribeSalesItemMastersResult {
        return $this->describeSalesItemMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSalesItemMasterRequest $request
     * @return PromiseInterface
     */
    public function createSalesItemMasterAsync(
            CreateSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateSalesItemMasterRequest $request
     * @return CreateSalesItemMasterResult
     */
    public function createSalesItemMaster (
            CreateSalesItemMasterRequest $request
    ): CreateSalesItemMasterResult {
        return $this->createSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSalesItemMasterRequest $request
     * @return PromiseInterface
     */
    public function getSalesItemMasterAsync(
            GetSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSalesItemMasterRequest $request
     * @return GetSalesItemMasterResult
     */
    public function getSalesItemMaster (
            GetSalesItemMasterRequest $request
    ): GetSalesItemMasterResult {
        return $this->getSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSalesItemMasterRequest $request
     * @return PromiseInterface
     */
    public function updateSalesItemMasterAsync(
            UpdateSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateSalesItemMasterRequest $request
     * @return UpdateSalesItemMasterResult
     */
    public function updateSalesItemMaster (
            UpdateSalesItemMasterRequest $request
    ): UpdateSalesItemMasterResult {
        return $this->updateSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSalesItemMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteSalesItemMasterAsync(
            DeleteSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSalesItemMasterRequest $request
     * @return DeleteSalesItemMasterResult
     */
    public function deleteSalesItemMaster (
            DeleteSalesItemMasterRequest $request
    ): DeleteSalesItemMasterResult {
        return $this->deleteSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSalesItemGroupMastersRequest $request
     * @return PromiseInterface
     */
    public function describeSalesItemGroupMastersAsync(
            DescribeSalesItemGroupMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSalesItemGroupMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSalesItemGroupMastersRequest $request
     * @return DescribeSalesItemGroupMastersResult
     */
    public function describeSalesItemGroupMasters (
            DescribeSalesItemGroupMastersRequest $request
    ): DescribeSalesItemGroupMastersResult {
        return $this->describeSalesItemGroupMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSalesItemGroupMasterRequest $request
     * @return PromiseInterface
     */
    public function createSalesItemGroupMasterAsync(
            CreateSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateSalesItemGroupMasterRequest $request
     * @return CreateSalesItemGroupMasterResult
     */
    public function createSalesItemGroupMaster (
            CreateSalesItemGroupMasterRequest $request
    ): CreateSalesItemGroupMasterResult {
        return $this->createSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSalesItemGroupMasterRequest $request
     * @return PromiseInterface
     */
    public function getSalesItemGroupMasterAsync(
            GetSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSalesItemGroupMasterRequest $request
     * @return GetSalesItemGroupMasterResult
     */
    public function getSalesItemGroupMaster (
            GetSalesItemGroupMasterRequest $request
    ): GetSalesItemGroupMasterResult {
        return $this->getSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSalesItemGroupMasterRequest $request
     * @return PromiseInterface
     */
    public function updateSalesItemGroupMasterAsync(
            UpdateSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateSalesItemGroupMasterRequest $request
     * @return UpdateSalesItemGroupMasterResult
     */
    public function updateSalesItemGroupMaster (
            UpdateSalesItemGroupMasterRequest $request
    ): UpdateSalesItemGroupMasterResult {
        return $this->updateSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSalesItemGroupMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteSalesItemGroupMasterAsync(
            DeleteSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSalesItemGroupMasterRequest $request
     * @return DeleteSalesItemGroupMasterResult
     */
    public function deleteSalesItemGroupMaster (
            DeleteSalesItemGroupMasterRequest $request
    ): DeleteSalesItemGroupMasterResult {
        return $this->deleteSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcaseMastersRequest $request
     * @return PromiseInterface
     */
    public function describeShowcaseMastersAsync(
            DescribeShowcaseMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcaseMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcaseMastersRequest $request
     * @return DescribeShowcaseMastersResult
     */
    public function describeShowcaseMasters (
            DescribeShowcaseMastersRequest $request
    ): DescribeShowcaseMastersResult {
        return $this->describeShowcaseMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function createShowcaseMasterAsync(
            CreateShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateShowcaseMasterRequest $request
     * @return CreateShowcaseMasterResult
     */
    public function createShowcaseMaster (
            CreateShowcaseMasterRequest $request
    ): CreateShowcaseMasterResult {
        return $this->createShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseMasterAsync(
            GetShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseMasterRequest $request
     * @return GetShowcaseMasterResult
     */
    public function getShowcaseMaster (
            GetShowcaseMasterRequest $request
    ): GetShowcaseMasterResult {
        return $this->getShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function updateShowcaseMasterAsync(
            UpdateShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateShowcaseMasterRequest $request
     * @return UpdateShowcaseMasterResult
     */
    public function updateShowcaseMaster (
            UpdateShowcaseMasterRequest $request
    ): UpdateShowcaseMasterResult {
        return $this->updateShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteShowcaseMasterAsync(
            DeleteShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteShowcaseMasterRequest $request
     * @return DeleteShowcaseMasterResult
     */
    public function deleteShowcaseMaster (
            DeleteShowcaseMasterRequest $request
    ): DeleteShowcaseMasterResult {
        return $this->deleteShowcaseMasterAsync(
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
     * @param GetCurrentShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentShowcaseMasterAsync(
            GetCurrentShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentShowcaseMasterRequest $request
     * @return GetCurrentShowcaseMasterResult
     */
    public function getCurrentShowcaseMaster (
            GetCurrentShowcaseMasterRequest $request
    ): GetCurrentShowcaseMasterResult {
        return $this->getCurrentShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentShowcaseMasterAsync(
            UpdateCurrentShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentShowcaseMasterRequest $request
     * @return UpdateCurrentShowcaseMasterResult
     */
    public function updateCurrentShowcaseMaster (
            UpdateCurrentShowcaseMasterRequest $request
    ): UpdateCurrentShowcaseMasterResult {
        return $this->updateCurrentShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentShowcaseMasterFromGitHubAsync(
            UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentShowcaseMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
     * @return UpdateCurrentShowcaseMasterFromGitHubResult
     */
    public function updateCurrentShowcaseMasterFromGitHub (
            UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): UpdateCurrentShowcaseMasterFromGitHubResult {
        return $this->updateCurrentShowcaseMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcasesRequest $request
     * @return PromiseInterface
     */
    public function describeShowcasesAsync(
            DescribeShowcasesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcasesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcasesRequest $request
     * @return DescribeShowcasesResult
     */
    public function describeShowcases (
            DescribeShowcasesRequest $request
    ): DescribeShowcasesResult {
        return $this->describeShowcasesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcasesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeShowcasesByUserIdAsync(
            DescribeShowcasesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcasesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcasesByUserIdRequest $request
     * @return DescribeShowcasesByUserIdResult
     */
    public function describeShowcasesByUserId (
            DescribeShowcasesByUserIdRequest $request
    ): DescribeShowcasesByUserIdResult {
        return $this->describeShowcasesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseAsync(
            GetShowcaseRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseRequest $request
     * @return GetShowcaseResult
     */
    public function getShowcase (
            GetShowcaseRequest $request
    ): GetShowcaseResult {
        return $this->getShowcaseAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseByUserIdAsync(
            GetShowcaseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseByUserIdRequest $request
     * @return GetShowcaseByUserIdResult
     */
    public function getShowcaseByUserId (
            GetShowcaseByUserIdRequest $request
    ): GetShowcaseByUserIdResult {
        return $this->getShowcaseByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param BuyRequest $request
     * @return PromiseInterface
     */
    public function buyAsync(
            BuyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BuyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param BuyRequest $request
     * @return BuyResult
     */
    public function buy (
            BuyRequest $request
    ): BuyResult {
        return $this->buyAsync(
            $request
        )->wait();
    }

    /**
     * @param BuyByUserIdRequest $request
     * @return PromiseInterface
     */
    public function buyByUserIdAsync(
            BuyByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BuyByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param BuyByUserIdRequest $request
     * @return BuyByUserIdResult
     */
    public function buyByUserId (
            BuyByUserIdRequest $request
    ): BuyByUserIdResult {
        return $this->buyByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRandomShowcaseMastersRequest $request
     * @return PromiseInterface
     */
    public function describeRandomShowcaseMastersAsync(
            DescribeRandomShowcaseMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRandomShowcaseMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRandomShowcaseMastersRequest $request
     * @return DescribeRandomShowcaseMastersResult
     */
    public function describeRandomShowcaseMasters (
            DescribeRandomShowcaseMastersRequest $request
    ): DescribeRandomShowcaseMastersResult {
        return $this->describeRandomShowcaseMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateRandomShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function createRandomShowcaseMasterAsync(
            CreateRandomShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRandomShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateRandomShowcaseMasterRequest $request
     * @return CreateRandomShowcaseMasterResult
     */
    public function createRandomShowcaseMaster (
            CreateRandomShowcaseMasterRequest $request
    ): CreateRandomShowcaseMasterResult {
        return $this->createRandomShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRandomShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function getRandomShowcaseMasterAsync(
            GetRandomShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRandomShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRandomShowcaseMasterRequest $request
     * @return GetRandomShowcaseMasterResult
     */
    public function getRandomShowcaseMaster (
            GetRandomShowcaseMasterRequest $request
    ): GetRandomShowcaseMasterResult {
        return $this->getRandomShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateRandomShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function updateRandomShowcaseMasterAsync(
            UpdateRandomShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRandomShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateRandomShowcaseMasterRequest $request
     * @return UpdateRandomShowcaseMasterResult
     */
    public function updateRandomShowcaseMaster (
            UpdateRandomShowcaseMasterRequest $request
    ): UpdateRandomShowcaseMasterResult {
        return $this->updateRandomShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRandomShowcaseMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteRandomShowcaseMasterAsync(
            DeleteRandomShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRandomShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRandomShowcaseMasterRequest $request
     * @return DeleteRandomShowcaseMasterResult
     */
    public function deleteRandomShowcaseMaster (
            DeleteRandomShowcaseMasterRequest $request
    ): DeleteRandomShowcaseMasterResult {
        return $this->deleteRandomShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param IncrementPurchaseCountByUserIdRequest $request
     * @return PromiseInterface
     */
    public function incrementPurchaseCountByUserIdAsync(
            IncrementPurchaseCountByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncrementPurchaseCountByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncrementPurchaseCountByUserIdRequest $request
     * @return IncrementPurchaseCountByUserIdResult
     */
    public function incrementPurchaseCountByUserId (
            IncrementPurchaseCountByUserIdRequest $request
    ): IncrementPurchaseCountByUserIdResult {
        return $this->incrementPurchaseCountByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DecrementPurchaseCountByUserIdRequest $request
     * @return PromiseInterface
     */
    public function decrementPurchaseCountByUserIdAsync(
            DecrementPurchaseCountByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecrementPurchaseCountByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecrementPurchaseCountByUserIdRequest $request
     * @return DecrementPurchaseCountByUserIdResult
     */
    public function decrementPurchaseCountByUserId (
            DecrementPurchaseCountByUserIdRequest $request
    ): DecrementPurchaseCountByUserIdResult {
        return $this->decrementPurchaseCountByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncrementPurchaseCountByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function incrementPurchaseCountByStampTaskAsync(
            IncrementPurchaseCountByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncrementPurchaseCountByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncrementPurchaseCountByStampTaskRequest $request
     * @return IncrementPurchaseCountByStampTaskResult
     */
    public function incrementPurchaseCountByStampTask (
            IncrementPurchaseCountByStampTaskRequest $request
    ): IncrementPurchaseCountByStampTaskResult {
        return $this->incrementPurchaseCountByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DecrementPurchaseCountByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function decrementPurchaseCountByStampSheetAsync(
            DecrementPurchaseCountByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecrementPurchaseCountByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecrementPurchaseCountByStampSheetRequest $request
     * @return DecrementPurchaseCountByStampSheetResult
     */
    public function decrementPurchaseCountByStampSheet (
            DecrementPurchaseCountByStampSheetRequest $request
    ): DecrementPurchaseCountByStampSheetResult {
        return $this->decrementPurchaseCountByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ForceReDrawByUserIdRequest $request
     * @return PromiseInterface
     */
    public function forceReDrawByUserIdAsync(
            ForceReDrawByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ForceReDrawByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ForceReDrawByUserIdRequest $request
     * @return ForceReDrawByUserIdResult
     */
    public function forceReDrawByUserId (
            ForceReDrawByUserIdRequest $request
    ): ForceReDrawByUserIdResult {
        return $this->forceReDrawByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ForceReDrawByUserIdByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function forceReDrawByUserIdByStampSheetAsync(
            ForceReDrawByUserIdByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ForceReDrawByUserIdByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ForceReDrawByUserIdByStampSheetRequest $request
     * @return ForceReDrawByUserIdByStampSheetResult
     */
    public function forceReDrawByUserIdByStampSheet (
            ForceReDrawByUserIdByStampSheetRequest $request
    ): ForceReDrawByUserIdByStampSheetResult {
        return $this->forceReDrawByUserIdByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRandomDisplayItemsRequest $request
     * @return PromiseInterface
     */
    public function describeRandomDisplayItemsAsync(
            DescribeRandomDisplayItemsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRandomDisplayItemsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRandomDisplayItemsRequest $request
     * @return DescribeRandomDisplayItemsResult
     */
    public function describeRandomDisplayItems (
            DescribeRandomDisplayItemsRequest $request
    ): DescribeRandomDisplayItemsResult {
        return $this->describeRandomDisplayItemsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRandomDisplayItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeRandomDisplayItemsByUserIdAsync(
            DescribeRandomDisplayItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRandomDisplayItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRandomDisplayItemsByUserIdRequest $request
     * @return DescribeRandomDisplayItemsByUserIdResult
     */
    public function describeRandomDisplayItemsByUserId (
            DescribeRandomDisplayItemsByUserIdRequest $request
    ): DescribeRandomDisplayItemsByUserIdResult {
        return $this->describeRandomDisplayItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRandomDisplayItemRequest $request
     * @return PromiseInterface
     */
    public function getRandomDisplayItemAsync(
            GetRandomDisplayItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRandomDisplayItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRandomDisplayItemRequest $request
     * @return GetRandomDisplayItemResult
     */
    public function getRandomDisplayItem (
            GetRandomDisplayItemRequest $request
    ): GetRandomDisplayItemResult {
        return $this->getRandomDisplayItemAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRandomDisplayItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getRandomDisplayItemByUserIdAsync(
            GetRandomDisplayItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRandomDisplayItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRandomDisplayItemByUserIdRequest $request
     * @return GetRandomDisplayItemByUserIdResult
     */
    public function getRandomDisplayItemByUserId (
            GetRandomDisplayItemByUserIdRequest $request
    ): GetRandomDisplayItemByUserIdResult {
        return $this->getRandomDisplayItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RandomShowcaseBuyRequest $request
     * @return PromiseInterface
     */
    public function randomShowcaseBuyAsync(
            RandomShowcaseBuyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RandomShowcaseBuyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RandomShowcaseBuyRequest $request
     * @return RandomShowcaseBuyResult
     */
    public function randomShowcaseBuy (
            RandomShowcaseBuyRequest $request
    ): RandomShowcaseBuyResult {
        return $this->randomShowcaseBuyAsync(
            $request
        )->wait();
    }

    /**
     * @param RandomShowcaseBuyByUserIdRequest $request
     * @return PromiseInterface
     */
    public function randomShowcaseBuyByUserIdAsync(
            RandomShowcaseBuyByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RandomShowcaseBuyByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RandomShowcaseBuyByUserIdRequest $request
     * @return RandomShowcaseBuyByUserIdResult
     */
    public function randomShowcaseBuyByUserId (
            RandomShowcaseBuyByUserIdRequest $request
    ): RandomShowcaseBuyByUserIdResult {
        return $this->randomShowcaseBuyByUserIdAsync(
            $request
        )->wait();
    }
}