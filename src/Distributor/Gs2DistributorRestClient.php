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

namespace Gs2\Distributor;

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


use Gs2\Distributor\Request\DescribeNamespacesRequest;
use Gs2\Distributor\Result\DescribeNamespacesResult;
use Gs2\Distributor\Request\CreateNamespaceRequest;
use Gs2\Distributor\Result\CreateNamespaceResult;
use Gs2\Distributor\Request\GetNamespaceStatusRequest;
use Gs2\Distributor\Result\GetNamespaceStatusResult;
use Gs2\Distributor\Request\GetNamespaceRequest;
use Gs2\Distributor\Result\GetNamespaceResult;
use Gs2\Distributor\Request\UpdateNamespaceRequest;
use Gs2\Distributor\Result\UpdateNamespaceResult;
use Gs2\Distributor\Request\DeleteNamespaceRequest;
use Gs2\Distributor\Result\DeleteNamespaceResult;
use Gs2\Distributor\Request\GetServiceVersionRequest;
use Gs2\Distributor\Result\GetServiceVersionResult;
use Gs2\Distributor\Request\DescribeDistributorModelMastersRequest;
use Gs2\Distributor\Result\DescribeDistributorModelMastersResult;
use Gs2\Distributor\Request\CreateDistributorModelMasterRequest;
use Gs2\Distributor\Result\CreateDistributorModelMasterResult;
use Gs2\Distributor\Request\GetDistributorModelMasterRequest;
use Gs2\Distributor\Result\GetDistributorModelMasterResult;
use Gs2\Distributor\Request\UpdateDistributorModelMasterRequest;
use Gs2\Distributor\Result\UpdateDistributorModelMasterResult;
use Gs2\Distributor\Request\DeleteDistributorModelMasterRequest;
use Gs2\Distributor\Result\DeleteDistributorModelMasterResult;
use Gs2\Distributor\Request\DescribeDistributorModelsRequest;
use Gs2\Distributor\Result\DescribeDistributorModelsResult;
use Gs2\Distributor\Request\GetDistributorModelRequest;
use Gs2\Distributor\Result\GetDistributorModelResult;
use Gs2\Distributor\Request\ExportMasterRequest;
use Gs2\Distributor\Result\ExportMasterResult;
use Gs2\Distributor\Request\GetCurrentDistributorMasterRequest;
use Gs2\Distributor\Result\GetCurrentDistributorMasterResult;
use Gs2\Distributor\Request\PreUpdateCurrentDistributorMasterRequest;
use Gs2\Distributor\Result\PreUpdateCurrentDistributorMasterResult;
use Gs2\Distributor\Request\UpdateCurrentDistributorMasterRequest;
use Gs2\Distributor\Result\UpdateCurrentDistributorMasterResult;
use Gs2\Distributor\Request\UpdateCurrentDistributorMasterFromGitHubRequest;
use Gs2\Distributor\Result\UpdateCurrentDistributorMasterFromGitHubResult;
use Gs2\Distributor\Request\DistributeRequest;
use Gs2\Distributor\Result\DistributeResult;
use Gs2\Distributor\Request\DistributeWithoutOverflowProcessRequest;
use Gs2\Distributor\Result\DistributeWithoutOverflowProcessResult;
use Gs2\Distributor\Request\RunVerifyTaskRequest;
use Gs2\Distributor\Result\RunVerifyTaskResult;
use Gs2\Distributor\Request\RunStampTaskRequest;
use Gs2\Distributor\Result\RunStampTaskResult;
use Gs2\Distributor\Request\RunStampSheetRequest;
use Gs2\Distributor\Result\RunStampSheetResult;
use Gs2\Distributor\Request\RunStampSheetExpressRequest;
use Gs2\Distributor\Result\RunStampSheetExpressResult;
use Gs2\Distributor\Request\RunVerifyTaskWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunVerifyTaskWithoutNamespaceResult;
use Gs2\Distributor\Request\RunStampTaskWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunStampTaskWithoutNamespaceResult;
use Gs2\Distributor\Request\RunStampSheetWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunStampSheetWithoutNamespaceResult;
use Gs2\Distributor\Request\RunStampSheetExpressWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunStampSheetExpressWithoutNamespaceResult;
use Gs2\Distributor\Request\SetTransactionDefaultConfigRequest;
use Gs2\Distributor\Result\SetTransactionDefaultConfigResult;
use Gs2\Distributor\Request\SetTransactionDefaultConfigByUserIdRequest;
use Gs2\Distributor\Result\SetTransactionDefaultConfigByUserIdResult;
use Gs2\Distributor\Request\FreezeMasterDataRequest;
use Gs2\Distributor\Result\FreezeMasterDataResult;
use Gs2\Distributor\Request\FreezeMasterDataByUserIdRequest;
use Gs2\Distributor\Result\FreezeMasterDataByUserIdResult;
use Gs2\Distributor\Request\SignFreezeMasterDataTimestampRequest;
use Gs2\Distributor\Result\SignFreezeMasterDataTimestampResult;
use Gs2\Distributor\Request\FreezeMasterDataBySignedTimestampRequest;
use Gs2\Distributor\Result\FreezeMasterDataBySignedTimestampResult;
use Gs2\Distributor\Request\FreezeMasterDataByTimestampRequest;
use Gs2\Distributor\Result\FreezeMasterDataByTimestampResult;
use Gs2\Distributor\Request\BatchExecuteApiRequest;
use Gs2\Distributor\Result\BatchExecuteApiResult;
use Gs2\Distributor\Request\IfExpressionByUserIdRequest;
use Gs2\Distributor\Result\IfExpressionByUserIdResult;
use Gs2\Distributor\Request\AndExpressionByUserIdRequest;
use Gs2\Distributor\Result\AndExpressionByUserIdResult;
use Gs2\Distributor\Request\OrExpressionByUserIdRequest;
use Gs2\Distributor\Result\OrExpressionByUserIdResult;
use Gs2\Distributor\Request\IfExpressionByStampTaskRequest;
use Gs2\Distributor\Result\IfExpressionByStampTaskResult;
use Gs2\Distributor\Request\AndExpressionByStampTaskRequest;
use Gs2\Distributor\Result\AndExpressionByStampTaskResult;
use Gs2\Distributor\Request\OrExpressionByStampTaskRequest;
use Gs2\Distributor\Result\OrExpressionByStampTaskResult;
use Gs2\Distributor\Request\GetStampSheetResultRequest;
use Gs2\Distributor\Result\GetStampSheetResultResult;
use Gs2\Distributor\Request\GetStampSheetResultByUserIdRequest;
use Gs2\Distributor\Result\GetStampSheetResultByUserIdResult;
use Gs2\Distributor\Request\RunTransactionRequest;
use Gs2\Distributor\Result\RunTransactionResult;
use Gs2\Distributor\Request\GetTransactionResultRequest;
use Gs2\Distributor\Result\GetTransactionResultResult;
use Gs2\Distributor\Request\GetTransactionResultByUserIdRequest;
use Gs2\Distributor\Result\GetTransactionResultByUserIdResult;

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAutoRunStampSheetNotification() !== null) {
            $json["autoRunStampSheetNotification"] = $this->request->getAutoRunStampSheetNotification()->toJson();
        }
        if ($this->request->getAutoRunTransactionNotification() !== null) {
            $json["autoRunTransactionNotification"] = $this->request->getAutoRunTransactionNotification()->toJson();
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAutoRunStampSheetNotification() !== null) {
            $json["autoRunStampSheetNotification"] = $this->request->getAutoRunStampSheetNotification()->toJson();
        }
        if ($this->request->getAutoRunTransactionNotification() !== null) {
            $json["autoRunTransactionNotification"] = $this->request->getAutoRunTransactionNotification()->toJson();
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

class DescribeDistributorModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDistributorModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDistributorModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDistributorModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDistributorModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDistributorModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/distributor";

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

class CreateDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/distributor";

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
        if ($this->request->getInboxNamespaceId() !== null) {
            $json["inboxNamespaceId"] = $this->request->getInboxNamespaceId();
        }
        if ($this->request->getWhiteListTargetIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListTargetIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListTargetIds"] = $array;
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

class GetDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() === null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

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

class UpdateDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() === null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInboxNamespaceId() !== null) {
            $json["inboxNamespaceId"] = $this->request->getInboxNamespaceId();
        }
        if ($this->request->getWhiteListTargetIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListTargetIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListTargetIds"] = $array;
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

class DeleteDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() === null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

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

class DescribeDistributorModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDistributorModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDistributorModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDistributorModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDistributorModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDistributorModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distributor";

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

class GetDistributorModelTask extends Gs2RestSessionTask {

    /**
     * @var GetDistributorModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDistributorModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetDistributorModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDistributorModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetDistributorModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() === null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentDistributorMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentDistributorMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentDistributorMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentDistributorMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentDistributorMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentDistributorMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentDistributorMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentDistributorMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentDistributorMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentDistributorMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentDistributorMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentDistributorMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentDistributorMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentDistributorMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentDistributorMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentDistributorMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentDistributorMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentDistributorMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentDistributorMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentDistributorMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentDistributorMasterResult $res */
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentDistributorMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentDistributorMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentDistributorMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentDistributorMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentDistributorMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DistributeTask extends Gs2RestSessionTask {

    /**
     * @var DistributeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DistributeTask constructor.
     * @param Gs2RestSession $session
     * @param DistributeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DistributeRequest $request
    ) {
        parent::__construct(
            $session,
            DistributeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distribute/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() === null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getDistributeResource() !== null) {
            $json["distributeResource"] = $this->request->getDistributeResource()->toJson();
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

class DistributeWithoutOverflowProcessTask extends Gs2RestSessionTask {

    /**
     * @var DistributeWithoutOverflowProcessRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DistributeWithoutOverflowProcessTask constructor.
     * @param Gs2RestSession $session
     * @param DistributeWithoutOverflowProcessRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DistributeWithoutOverflowProcessRequest $request
    ) {
        parent::__construct(
            $session,
            DistributeWithoutOverflowProcessResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/distribute";

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getDistributeResource() !== null) {
            $json["distributeResource"] = $this->request->getDistributeResource()->toJson();
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

class RunVerifyTaskTask extends Gs2RestSessionTask {

    /**
     * @var RunVerifyTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunVerifyTaskTask constructor.
     * @param Gs2RestSession $session
     * @param RunVerifyTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunVerifyTaskRequest $request
    ) {
        parent::__construct(
            $session,
            RunVerifyTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distribute/stamp/verifyTask/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVerifyTask() !== null) {
            $json["verifyTask"] = $this->request->getVerifyTask();
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

class RunStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var RunStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distribute/stamp/task/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class RunStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distribute/stamp/sheet/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class RunStampSheetExpressTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetExpressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetExpressTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetExpressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetExpressRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetExpressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/distribute/stamp/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class RunVerifyTaskWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunVerifyTaskWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunVerifyTaskWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunVerifyTaskWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunVerifyTaskWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunVerifyTaskWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/verifyTask/run";

        $json = [];
        if ($this->request->getVerifyTask() !== null) {
            $json["verifyTask"] = $this->request->getVerifyTask();
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

class RunStampTaskWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunStampTaskWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampTaskWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampTaskWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampTaskWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampTaskWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/task/run";

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

class RunStampSheetWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/sheet/run";

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

class RunStampSheetExpressWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetExpressWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetExpressWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetExpressWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetExpressWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetExpressWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/run";

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

class SetTransactionDefaultConfigTask extends Gs2RestSessionTask {

    /**
     * @var SetTransactionDefaultConfigRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetTransactionDefaultConfigTask constructor.
     * @param Gs2RestSession $session
     * @param SetTransactionDefaultConfigRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetTransactionDefaultConfigRequest $request
    ) {
        parent::__construct(
            $session,
            SetTransactionDefaultConfigResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/transaction/user/me/config";

        $json = [];
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

class SetTransactionDefaultConfigByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetTransactionDefaultConfigByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetTransactionDefaultConfigByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetTransactionDefaultConfigByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetTransactionDefaultConfigByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetTransactionDefaultConfigByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/transaction/user/{userId}/config";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
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

class FreezeMasterDataTask extends Gs2RestSessionTask {

    /**
     * @var FreezeMasterDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FreezeMasterDataTask constructor.
     * @param Gs2RestSession $session
     * @param FreezeMasterDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FreezeMasterDataRequest $request
    ) {
        parent::__construct(
            $session,
            FreezeMasterDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/masterdata/freeze";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class FreezeMasterDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var FreezeMasterDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FreezeMasterDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param FreezeMasterDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FreezeMasterDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            FreezeMasterDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/masterdata/freeze";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class SignFreezeMasterDataTimestampTask extends Gs2RestSessionTask {

    /**
     * @var SignFreezeMasterDataTimestampRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SignFreezeMasterDataTimestampTask constructor.
     * @param Gs2RestSession $session
     * @param SignFreezeMasterDataTimestampRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SignFreezeMasterDataTimestampRequest $request
    ) {
        parent::__construct(
            $session,
            SignFreezeMasterDataTimestampResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/masterdata/freeze/timestamp";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTimestamp() !== null) {
            $json["timestamp"] = $this->request->getTimestamp();
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

class FreezeMasterDataBySignedTimestampTask extends Gs2RestSessionTask {

    /**
     * @var FreezeMasterDataBySignedTimestampRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FreezeMasterDataBySignedTimestampTask constructor.
     * @param Gs2RestSession $session
     * @param FreezeMasterDataBySignedTimestampRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FreezeMasterDataBySignedTimestampRequest $request
    ) {
        parent::__construct(
            $session,
            FreezeMasterDataBySignedTimestampResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/masterdata/freeze/timestamp";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBody() !== null) {
            $json["body"] = $this->request->getBody();
        }
        if ($this->request->getSignature() !== null) {
            $json["signature"] = $this->request->getSignature();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class FreezeMasterDataByTimestampTask extends Gs2RestSessionTask {

    /**
     * @var FreezeMasterDataByTimestampRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FreezeMasterDataByTimestampTask constructor.
     * @param Gs2RestSession $session
     * @param FreezeMasterDataByTimestampRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FreezeMasterDataByTimestampRequest $request
    ) {
        parent::__construct(
            $session,
            FreezeMasterDataByTimestampResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/masterdata/freeze/timestamp/raw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTimestamp() !== null) {
            $json["timestamp"] = $this->request->getTimestamp();
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

        return parent::executeImpl();
    }
}

class BatchExecuteApiTask extends Gs2RestSessionTask {

    /**
     * @var BatchExecuteApiRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BatchExecuteApiTask constructor.
     * @param Gs2RestSession $session
     * @param BatchExecuteApiRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BatchExecuteApiRequest $request
    ) {
        parent::__construct(
            $session,
            BatchExecuteApiResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/batch/execute";

        $json = [];
        if ($this->request->getRequestPayloads() !== null) {
            $array = [];
            foreach ($this->request->getRequestPayloads() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["requestPayloads"] = $array;
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

class IfExpressionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var IfExpressionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IfExpressionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param IfExpressionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IfExpressionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            IfExpressionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/expression/if";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getCondition() !== null) {
            $json["condition"] = $this->request->getCondition()->toJson();
        }
        if ($this->request->getTrueActions() !== null) {
            $array = [];
            foreach ($this->request->getTrueActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["trueActions"] = $array;
        }
        if ($this->request->getFalseActions() !== null) {
            $array = [];
            foreach ($this->request->getFalseActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["falseActions"] = $array;
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

class AndExpressionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AndExpressionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AndExpressionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AndExpressionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AndExpressionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AndExpressionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/expression/and";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getActions() !== null) {
            $array = [];
            foreach ($this->request->getActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["actions"] = $array;
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

class OrExpressionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var OrExpressionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * OrExpressionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param OrExpressionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        OrExpressionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            OrExpressionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/expression/or";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getActions() !== null) {
            $array = [];
            foreach ($this->request->getActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["actions"] = $array;
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

class IfExpressionByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var IfExpressionByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IfExpressionByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param IfExpressionByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IfExpressionByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            IfExpressionByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/expression/if";

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

class AndExpressionByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var AndExpressionByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AndExpressionByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param AndExpressionByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AndExpressionByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            AndExpressionByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/expression/and";

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

class OrExpressionByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var OrExpressionByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * OrExpressionByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param OrExpressionByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        OrExpressionByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            OrExpressionByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/expression/or";

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

class GetStampSheetResultTask extends Gs2RestSessionTask {

    /**
     * @var GetStampSheetResultRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStampSheetResultTask constructor.
     * @param Gs2RestSession $session
     * @param GetStampSheetResultRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStampSheetResultRequest $request
    ) {
        parent::__construct(
            $session,
            GetStampSheetResultResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/stampSheet/{transactionId}/result";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetStampSheetResultByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStampSheetResultByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStampSheetResultByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStampSheetResultByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStampSheetResultByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStampSheetResultByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/stampSheet/{transactionId}/result";

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

class RunTransactionTask extends Gs2RestSessionTask {

    /**
     * @var RunTransactionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunTransactionTask constructor.
     * @param Gs2RestSession $session
     * @param RunTransactionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunTransactionRequest $request
    ) {
        parent::__construct(
            $session,
            RunTransactionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/{ownerId}/{namespaceName}/user/{userId}/transaction/run";

        $url = str_replace("{ownerId}", $this->request->getOwnerId() === null|| strlen($this->request->getOwnerId()) == 0 ? "null" : $this->request->getOwnerId(), $url);
        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTransaction() !== null) {
            $json["transaction"] = $this->request->getTransaction();
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

class GetTransactionResultTask extends Gs2RestSessionTask {

    /**
     * @var GetTransactionResultRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTransactionResultTask constructor.
     * @param Gs2RestSession $session
     * @param GetTransactionResultRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTransactionResultRequest $request
    ) {
        parent::__construct(
            $session,
            GetTransactionResultResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/transaction/{transactionId}/result";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetTransactionResultByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetTransactionResultByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTransactionResultByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetTransactionResultByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTransactionResultByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetTransactionResultByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/transaction/{transactionId}/result";

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

/**
 * GS2 Distributor API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DistributorRestClient extends AbstractGs2Client {

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
     * @param DescribeDistributorModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeDistributorModelMastersAsync(
            DescribeDistributorModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDistributorModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDistributorModelMastersRequest $request
     * @return DescribeDistributorModelMastersResult
     */
    public function describeDistributorModelMasters (
            DescribeDistributorModelMastersRequest $request
    ): DescribeDistributorModelMastersResult {
        return $this->describeDistributorModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateDistributorModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createDistributorModelMasterAsync(
            CreateDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateDistributorModelMasterRequest $request
     * @return CreateDistributorModelMasterResult
     */
    public function createDistributorModelMaster (
            CreateDistributorModelMasterRequest $request
    ): CreateDistributorModelMasterResult {
        return $this->createDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDistributorModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getDistributorModelMasterAsync(
            GetDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDistributorModelMasterRequest $request
     * @return GetDistributorModelMasterResult
     */
    public function getDistributorModelMaster (
            GetDistributorModelMasterRequest $request
    ): GetDistributorModelMasterResult {
        return $this->getDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateDistributorModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateDistributorModelMasterAsync(
            UpdateDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateDistributorModelMasterRequest $request
     * @return UpdateDistributorModelMasterResult
     */
    public function updateDistributorModelMaster (
            UpdateDistributorModelMasterRequest $request
    ): UpdateDistributorModelMasterResult {
        return $this->updateDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteDistributorModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteDistributorModelMasterAsync(
            DeleteDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteDistributorModelMasterRequest $request
     * @return DeleteDistributorModelMasterResult
     */
    public function deleteDistributorModelMaster (
            DeleteDistributorModelMasterRequest $request
    ): DeleteDistributorModelMasterResult {
        return $this->deleteDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeDistributorModelsRequest $request
     * @return PromiseInterface
     */
    public function describeDistributorModelsAsync(
            DescribeDistributorModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDistributorModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDistributorModelsRequest $request
     * @return DescribeDistributorModelsResult
     */
    public function describeDistributorModels (
            DescribeDistributorModelsRequest $request
    ): DescribeDistributorModelsResult {
        return $this->describeDistributorModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDistributorModelRequest $request
     * @return PromiseInterface
     */
    public function getDistributorModelAsync(
            GetDistributorModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDistributorModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDistributorModelRequest $request
     * @return GetDistributorModelResult
     */
    public function getDistributorModel (
            GetDistributorModelRequest $request
    ): GetDistributorModelResult {
        return $this->getDistributorModelAsync(
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
     * @param GetCurrentDistributorMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentDistributorMasterAsync(
            GetCurrentDistributorMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentDistributorMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentDistributorMasterRequest $request
     * @return GetCurrentDistributorMasterResult
     */
    public function getCurrentDistributorMaster (
            GetCurrentDistributorMasterRequest $request
    ): GetCurrentDistributorMasterResult {
        return $this->getCurrentDistributorMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentDistributorMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentDistributorMasterAsync(
            PreUpdateCurrentDistributorMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentDistributorMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentDistributorMasterRequest $request
     * @return PreUpdateCurrentDistributorMasterResult
     */
    public function preUpdateCurrentDistributorMaster (
            PreUpdateCurrentDistributorMasterRequest $request
    ): PreUpdateCurrentDistributorMasterResult {
        return $this->preUpdateCurrentDistributorMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentDistributorMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentDistributorMasterAsync(
            UpdateCurrentDistributorMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentDistributorMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentDistributorMasterRequest $request
     * @return UpdateCurrentDistributorMasterResult
     */
    public function updateCurrentDistributorMaster (
            UpdateCurrentDistributorMasterRequest $request
    ): UpdateCurrentDistributorMasterResult {
        return $this->updateCurrentDistributorMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentDistributorMasterFromGitHubAsync(
            UpdateCurrentDistributorMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentDistributorMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request
     * @return UpdateCurrentDistributorMasterFromGitHubResult
     */
    public function updateCurrentDistributorMasterFromGitHub (
            UpdateCurrentDistributorMasterFromGitHubRequest $request
    ): UpdateCurrentDistributorMasterFromGitHubResult {
        return $this->updateCurrentDistributorMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DistributeRequest $request
     * @return PromiseInterface
     */
    public function distributeAsync(
            DistributeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DistributeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DistributeRequest $request
     * @return DistributeResult
     */
    public function distribute (
            DistributeRequest $request
    ): DistributeResult {
        return $this->distributeAsync(
            $request
        )->wait();
    }

    /**
     * @param DistributeWithoutOverflowProcessRequest $request
     * @return PromiseInterface
     */
    public function distributeWithoutOverflowProcessAsync(
            DistributeWithoutOverflowProcessRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DistributeWithoutOverflowProcessTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DistributeWithoutOverflowProcessRequest $request
     * @return DistributeWithoutOverflowProcessResult
     */
    public function distributeWithoutOverflowProcess (
            DistributeWithoutOverflowProcessRequest $request
    ): DistributeWithoutOverflowProcessResult {
        return $this->distributeWithoutOverflowProcessAsync(
            $request
        )->wait();
    }

    /**
     * @param RunVerifyTaskRequest $request
     * @return PromiseInterface
     */
    public function runVerifyTaskAsync(
            RunVerifyTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunVerifyTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunVerifyTaskRequest $request
     * @return RunVerifyTaskResult
     */
    public function runVerifyTask (
            RunVerifyTaskRequest $request
    ): RunVerifyTaskResult {
        return $this->runVerifyTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampTaskRequest $request
     * @return PromiseInterface
     */
    public function runStampTaskAsync(
            RunStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampTaskRequest $request
     * @return RunStampTaskResult
     */
    public function runStampTask (
            RunStampTaskRequest $request
    ): RunStampTaskResult {
        return $this->runStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampSheetRequest $request
     * @return PromiseInterface
     */
    public function runStampSheetAsync(
            RunStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampSheetRequest $request
     * @return RunStampSheetResult
     */
    public function runStampSheet (
            RunStampSheetRequest $request
    ): RunStampSheetResult {
        return $this->runStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampSheetExpressRequest $request
     * @return PromiseInterface
     */
    public function runStampSheetExpressAsync(
            RunStampSheetExpressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetExpressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampSheetExpressRequest $request
     * @return RunStampSheetExpressResult
     */
    public function runStampSheetExpress (
            RunStampSheetExpressRequest $request
    ): RunStampSheetExpressResult {
        return $this->runStampSheetExpressAsync(
            $request
        )->wait();
    }

    /**
     * @param RunVerifyTaskWithoutNamespaceRequest $request
     * @return PromiseInterface
     */
    public function runVerifyTaskWithoutNamespaceAsync(
            RunVerifyTaskWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunVerifyTaskWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunVerifyTaskWithoutNamespaceRequest $request
     * @return RunVerifyTaskWithoutNamespaceResult
     */
    public function runVerifyTaskWithoutNamespace (
            RunVerifyTaskWithoutNamespaceRequest $request
    ): RunVerifyTaskWithoutNamespaceResult {
        return $this->runVerifyTaskWithoutNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampTaskWithoutNamespaceRequest $request
     * @return PromiseInterface
     */
    public function runStampTaskWithoutNamespaceAsync(
            RunStampTaskWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampTaskWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampTaskWithoutNamespaceRequest $request
     * @return RunStampTaskWithoutNamespaceResult
     */
    public function runStampTaskWithoutNamespace (
            RunStampTaskWithoutNamespaceRequest $request
    ): RunStampTaskWithoutNamespaceResult {
        return $this->runStampTaskWithoutNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampSheetWithoutNamespaceRequest $request
     * @return PromiseInterface
     */
    public function runStampSheetWithoutNamespaceAsync(
            RunStampSheetWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampSheetWithoutNamespaceRequest $request
     * @return RunStampSheetWithoutNamespaceResult
     */
    public function runStampSheetWithoutNamespace (
            RunStampSheetWithoutNamespaceRequest $request
    ): RunStampSheetWithoutNamespaceResult {
        return $this->runStampSheetWithoutNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param RunStampSheetExpressWithoutNamespaceRequest $request
     * @return PromiseInterface
     */
    public function runStampSheetExpressWithoutNamespaceAsync(
            RunStampSheetExpressWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetExpressWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunStampSheetExpressWithoutNamespaceRequest $request
     * @return RunStampSheetExpressWithoutNamespaceResult
     */
    public function runStampSheetExpressWithoutNamespace (
            RunStampSheetExpressWithoutNamespaceRequest $request
    ): RunStampSheetExpressWithoutNamespaceResult {
        return $this->runStampSheetExpressWithoutNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param SetTransactionDefaultConfigRequest $request
     * @return PromiseInterface
     */
    public function setTransactionDefaultConfigAsync(
            SetTransactionDefaultConfigRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetTransactionDefaultConfigTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetTransactionDefaultConfigRequest $request
     * @return SetTransactionDefaultConfigResult
     */
    public function setTransactionDefaultConfig (
            SetTransactionDefaultConfigRequest $request
    ): SetTransactionDefaultConfigResult {
        return $this->setTransactionDefaultConfigAsync(
            $request
        )->wait();
    }

    /**
     * @param SetTransactionDefaultConfigByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setTransactionDefaultConfigByUserIdAsync(
            SetTransactionDefaultConfigByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetTransactionDefaultConfigByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetTransactionDefaultConfigByUserIdRequest $request
     * @return SetTransactionDefaultConfigByUserIdResult
     */
    public function setTransactionDefaultConfigByUserId (
            SetTransactionDefaultConfigByUserIdRequest $request
    ): SetTransactionDefaultConfigByUserIdResult {
        return $this->setTransactionDefaultConfigByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param FreezeMasterDataRequest $request
     * @return PromiseInterface
     */
    public function freezeMasterDataAsync(
            FreezeMasterDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FreezeMasterDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FreezeMasterDataRequest $request
     * @return FreezeMasterDataResult
     */
    public function freezeMasterData (
            FreezeMasterDataRequest $request
    ): FreezeMasterDataResult {
        return $this->freezeMasterDataAsync(
            $request
        )->wait();
    }

    /**
     * @param FreezeMasterDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function freezeMasterDataByUserIdAsync(
            FreezeMasterDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FreezeMasterDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FreezeMasterDataByUserIdRequest $request
     * @return FreezeMasterDataByUserIdResult
     */
    public function freezeMasterDataByUserId (
            FreezeMasterDataByUserIdRequest $request
    ): FreezeMasterDataByUserIdResult {
        return $this->freezeMasterDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SignFreezeMasterDataTimestampRequest $request
     * @return PromiseInterface
     */
    public function signFreezeMasterDataTimestampAsync(
            SignFreezeMasterDataTimestampRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SignFreezeMasterDataTimestampTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SignFreezeMasterDataTimestampRequest $request
     * @return SignFreezeMasterDataTimestampResult
     */
    public function signFreezeMasterDataTimestamp (
            SignFreezeMasterDataTimestampRequest $request
    ): SignFreezeMasterDataTimestampResult {
        return $this->signFreezeMasterDataTimestampAsync(
            $request
        )->wait();
    }

    /**
     * @param FreezeMasterDataBySignedTimestampRequest $request
     * @return PromiseInterface
     */
    public function freezeMasterDataBySignedTimestampAsync(
            FreezeMasterDataBySignedTimestampRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FreezeMasterDataBySignedTimestampTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FreezeMasterDataBySignedTimestampRequest $request
     * @return FreezeMasterDataBySignedTimestampResult
     */
    public function freezeMasterDataBySignedTimestamp (
            FreezeMasterDataBySignedTimestampRequest $request
    ): FreezeMasterDataBySignedTimestampResult {
        return $this->freezeMasterDataBySignedTimestampAsync(
            $request
        )->wait();
    }

    /**
     * @param FreezeMasterDataByTimestampRequest $request
     * @return PromiseInterface
     */
    public function freezeMasterDataByTimestampAsync(
            FreezeMasterDataByTimestampRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FreezeMasterDataByTimestampTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FreezeMasterDataByTimestampRequest $request
     * @return FreezeMasterDataByTimestampResult
     */
    public function freezeMasterDataByTimestamp (
            FreezeMasterDataByTimestampRequest $request
    ): FreezeMasterDataByTimestampResult {
        return $this->freezeMasterDataByTimestampAsync(
            $request
        )->wait();
    }

    /**
     * @param BatchExecuteApiRequest $request
     * @return PromiseInterface
     */
    public function batchExecuteApiAsync(
            BatchExecuteApiRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BatchExecuteApiTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param BatchExecuteApiRequest $request
     * @return BatchExecuteApiResult
     */
    public function batchExecuteApi (
            BatchExecuteApiRequest $request
    ): BatchExecuteApiResult {
        return $this->batchExecuteApiAsync(
            $request
        )->wait();
    }

    /**
     * @param IfExpressionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function ifExpressionByUserIdAsync(
            IfExpressionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IfExpressionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IfExpressionByUserIdRequest $request
     * @return IfExpressionByUserIdResult
     */
    public function ifExpressionByUserId (
            IfExpressionByUserIdRequest $request
    ): IfExpressionByUserIdResult {
        return $this->ifExpressionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AndExpressionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function andExpressionByUserIdAsync(
            AndExpressionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AndExpressionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AndExpressionByUserIdRequest $request
     * @return AndExpressionByUserIdResult
     */
    public function andExpressionByUserId (
            AndExpressionByUserIdRequest $request
    ): AndExpressionByUserIdResult {
        return $this->andExpressionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param OrExpressionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function orExpressionByUserIdAsync(
            OrExpressionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new OrExpressionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param OrExpressionByUserIdRequest $request
     * @return OrExpressionByUserIdResult
     */
    public function orExpressionByUserId (
            OrExpressionByUserIdRequest $request
    ): OrExpressionByUserIdResult {
        return $this->orExpressionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IfExpressionByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function ifExpressionByStampTaskAsync(
            IfExpressionByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IfExpressionByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IfExpressionByStampTaskRequest $request
     * @return IfExpressionByStampTaskResult
     */
    public function ifExpressionByStampTask (
            IfExpressionByStampTaskRequest $request
    ): IfExpressionByStampTaskResult {
        return $this->ifExpressionByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param AndExpressionByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function andExpressionByStampTaskAsync(
            AndExpressionByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AndExpressionByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AndExpressionByStampTaskRequest $request
     * @return AndExpressionByStampTaskResult
     */
    public function andExpressionByStampTask (
            AndExpressionByStampTaskRequest $request
    ): AndExpressionByStampTaskResult {
        return $this->andExpressionByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param OrExpressionByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function orExpressionByStampTaskAsync(
            OrExpressionByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new OrExpressionByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param OrExpressionByStampTaskRequest $request
     * @return OrExpressionByStampTaskResult
     */
    public function orExpressionByStampTask (
            OrExpressionByStampTaskRequest $request
    ): OrExpressionByStampTaskResult {
        return $this->orExpressionByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStampSheetResultRequest $request
     * @return PromiseInterface
     */
    public function getStampSheetResultAsync(
            GetStampSheetResultRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStampSheetResultTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStampSheetResultRequest $request
     * @return GetStampSheetResultResult
     */
    public function getStampSheetResult (
            GetStampSheetResultRequest $request
    ): GetStampSheetResultResult {
        return $this->getStampSheetResultAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStampSheetResultByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getStampSheetResultByUserIdAsync(
            GetStampSheetResultByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStampSheetResultByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStampSheetResultByUserIdRequest $request
     * @return GetStampSheetResultByUserIdResult
     */
    public function getStampSheetResultByUserId (
            GetStampSheetResultByUserIdRequest $request
    ): GetStampSheetResultByUserIdResult {
        return $this->getStampSheetResultByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RunTransactionRequest $request
     * @return PromiseInterface
     */
    public function runTransactionAsync(
            RunTransactionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunTransactionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RunTransactionRequest $request
     * @return RunTransactionResult
     */
    public function runTransaction (
            RunTransactionRequest $request
    ): RunTransactionResult {
        return $this->runTransactionAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTransactionResultRequest $request
     * @return PromiseInterface
     */
    public function getTransactionResultAsync(
            GetTransactionResultRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTransactionResultTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetTransactionResultRequest $request
     * @return GetTransactionResultResult
     */
    public function getTransactionResult (
            GetTransactionResultRequest $request
    ): GetTransactionResultResult {
        return $this->getTransactionResultAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTransactionResultByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getTransactionResultByUserIdAsync(
            GetTransactionResultByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTransactionResultByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetTransactionResultByUserIdRequest $request
     * @return GetTransactionResultByUserIdResult
     */
    public function getTransactionResultByUserId (
            GetTransactionResultByUserIdRequest $request
    ): GetTransactionResultByUserIdResult {
        return $this->getTransactionResultByUserIdAsync(
            $request
        )->wait();
    }
}