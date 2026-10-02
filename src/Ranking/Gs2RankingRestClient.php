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

namespace Gs2\Ranking;

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


use Gs2\Ranking\Request\DescribeNamespacesRequest;
use Gs2\Ranking\Result\DescribeNamespacesResult;
use Gs2\Ranking\Request\CreateNamespaceRequest;
use Gs2\Ranking\Result\CreateNamespaceResult;
use Gs2\Ranking\Request\GetNamespaceStatusRequest;
use Gs2\Ranking\Result\GetNamespaceStatusResult;
use Gs2\Ranking\Request\GetNamespaceRequest;
use Gs2\Ranking\Result\GetNamespaceResult;
use Gs2\Ranking\Request\UpdateNamespaceRequest;
use Gs2\Ranking\Result\UpdateNamespaceResult;
use Gs2\Ranking\Request\DeleteNamespaceRequest;
use Gs2\Ranking\Result\DeleteNamespaceResult;
use Gs2\Ranking\Request\GetServiceVersionRequest;
use Gs2\Ranking\Result\GetServiceVersionResult;
use Gs2\Ranking\Request\DumpUserDataByUserIdRequest;
use Gs2\Ranking\Result\DumpUserDataByUserIdResult;
use Gs2\Ranking\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Ranking\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Ranking\Request\CleanUserDataByUserIdRequest;
use Gs2\Ranking\Result\CleanUserDataByUserIdResult;
use Gs2\Ranking\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Ranking\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Ranking\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Ranking\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Ranking\Request\ImportUserDataByUserIdRequest;
use Gs2\Ranking\Result\ImportUserDataByUserIdResult;
use Gs2\Ranking\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Ranking\Result\CheckImportUserDataByUserIdResult;
use Gs2\Ranking\Request\DescribeCategoryModelsRequest;
use Gs2\Ranking\Result\DescribeCategoryModelsResult;
use Gs2\Ranking\Request\GetCategoryModelRequest;
use Gs2\Ranking\Result\GetCategoryModelResult;
use Gs2\Ranking\Request\DescribeCategoryModelMastersRequest;
use Gs2\Ranking\Result\DescribeCategoryModelMastersResult;
use Gs2\Ranking\Request\CreateCategoryModelMasterRequest;
use Gs2\Ranking\Result\CreateCategoryModelMasterResult;
use Gs2\Ranking\Request\GetCategoryModelMasterRequest;
use Gs2\Ranking\Result\GetCategoryModelMasterResult;
use Gs2\Ranking\Request\UpdateCategoryModelMasterRequest;
use Gs2\Ranking\Result\UpdateCategoryModelMasterResult;
use Gs2\Ranking\Request\DeleteCategoryModelMasterRequest;
use Gs2\Ranking\Result\DeleteCategoryModelMasterResult;
use Gs2\Ranking\Request\SubscribeRequest;
use Gs2\Ranking\Result\SubscribeResult;
use Gs2\Ranking\Request\SubscribeByUserIdRequest;
use Gs2\Ranking\Result\SubscribeByUserIdResult;
use Gs2\Ranking\Request\DescribeScoresRequest;
use Gs2\Ranking\Result\DescribeScoresResult;
use Gs2\Ranking\Request\DescribeScoresByUserIdRequest;
use Gs2\Ranking\Result\DescribeScoresByUserIdResult;
use Gs2\Ranking\Request\GetScoreRequest;
use Gs2\Ranking\Result\GetScoreResult;
use Gs2\Ranking\Request\GetScoreByUserIdRequest;
use Gs2\Ranking\Result\GetScoreByUserIdResult;
use Gs2\Ranking\Request\DescribeRankingsRequest;
use Gs2\Ranking\Result\DescribeRankingsResult;
use Gs2\Ranking\Request\DescribeRankingssByUserIdRequest;
use Gs2\Ranking\Result\DescribeRankingssByUserIdResult;
use Gs2\Ranking\Request\DescribeNearRankingsRequest;
use Gs2\Ranking\Result\DescribeNearRankingsResult;
use Gs2\Ranking\Request\GetRankingRequest;
use Gs2\Ranking\Result\GetRankingResult;
use Gs2\Ranking\Request\GetRankingByUserIdRequest;
use Gs2\Ranking\Result\GetRankingByUserIdResult;
use Gs2\Ranking\Request\PutScoreRequest;
use Gs2\Ranking\Result\PutScoreResult;
use Gs2\Ranking\Request\PutScoreByUserIdRequest;
use Gs2\Ranking\Result\PutScoreByUserIdResult;
use Gs2\Ranking\Request\CalcRankingRequest;
use Gs2\Ranking\Result\CalcRankingResult;
use Gs2\Ranking\Request\ExportMasterRequest;
use Gs2\Ranking\Result\ExportMasterResult;
use Gs2\Ranking\Request\GetCurrentRankingMasterRequest;
use Gs2\Ranking\Result\GetCurrentRankingMasterResult;
use Gs2\Ranking\Request\PreUpdateCurrentRankingMasterRequest;
use Gs2\Ranking\Result\PreUpdateCurrentRankingMasterResult;
use Gs2\Ranking\Request\UpdateCurrentRankingMasterRequest;
use Gs2\Ranking\Result\UpdateCurrentRankingMasterResult;
use Gs2\Ranking\Request\UpdateCurrentRankingMasterFromGitHubRequest;
use Gs2\Ranking\Result\UpdateCurrentRankingMasterFromGitHubResult;
use Gs2\Ranking\Request\GetSubscribeRequest;
use Gs2\Ranking\Result\GetSubscribeResult;
use Gs2\Ranking\Request\GetSubscribeByUserIdRequest;
use Gs2\Ranking\Result\GetSubscribeByUserIdResult;
use Gs2\Ranking\Request\UnsubscribeRequest;
use Gs2\Ranking\Result\UnsubscribeResult;
use Gs2\Ranking\Request\UnsubscribeByUserIdRequest;
use Gs2\Ranking\Result\UnsubscribeByUserIdResult;
use Gs2\Ranking\Request\DescribeSubscribesByCategoryNameRequest;
use Gs2\Ranking\Result\DescribeSubscribesByCategoryNameResult;
use Gs2\Ranking\Request\DescribeSubscribesByCategoryNameAndUserIdRequest;
use Gs2\Ranking\Result\DescribeSubscribesByCategoryNameAndUserIdResult;

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeCategoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/category";

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

class GetCategoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class DescribeCategoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/category";

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

class CreateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/category";

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
        if ($this->request->getMinimumValue() !== null) {
            $json["minimumValue"] = $this->request->getMinimumValue();
        }
        if ($this->request->getMaximumValue() !== null) {
            $json["maximumValue"] = $this->request->getMaximumValue();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getGlobalRankingSetting() !== null) {
            $json["globalRankingSetting"] = $this->request->getGlobalRankingSetting()->toJson();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
        }
        if ($this->request->getUniqueByUserId() !== null) {
            $json["uniqueByUserId"] = $this->request->getUniqueByUserId();
        }
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getCalculateFixedTimingHour() !== null) {
            $json["calculateFixedTimingHour"] = $this->request->getCalculateFixedTimingHour();
        }
        if ($this->request->getCalculateFixedTimingMinute() !== null) {
            $json["calculateFixedTimingMinute"] = $this->request->getCalculateFixedTimingMinute();
        }
        if ($this->request->getCalculateIntervalMinutes() !== null) {
            $json["calculateIntervalMinutes"] = $this->request->getCalculateIntervalMinutes();
        }
        if ($this->request->getAdditionalScopes() !== null) {
            $array = [];
            foreach ($this->request->getAdditionalScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["additionalScopes"] = $array;
        }
        if ($this->request->getIgnoreUserIds() !== null) {
            $array = [];
            foreach ($this->request->getIgnoreUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["ignoreUserIds"] = $array;
        }
        if ($this->request->getGeneration() !== null) {
            $json["generation"] = $this->request->getGeneration();
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

class GetCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class UpdateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMinimumValue() !== null) {
            $json["minimumValue"] = $this->request->getMinimumValue();
        }
        if ($this->request->getMaximumValue() !== null) {
            $json["maximumValue"] = $this->request->getMaximumValue();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getGlobalRankingSetting() !== null) {
            $json["globalRankingSetting"] = $this->request->getGlobalRankingSetting()->toJson();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
        }
        if ($this->request->getUniqueByUserId() !== null) {
            $json["uniqueByUserId"] = $this->request->getUniqueByUserId();
        }
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getCalculateFixedTimingHour() !== null) {
            $json["calculateFixedTimingHour"] = $this->request->getCalculateFixedTimingHour();
        }
        if ($this->request->getCalculateFixedTimingMinute() !== null) {
            $json["calculateFixedTimingMinute"] = $this->request->getCalculateFixedTimingMinute();
        }
        if ($this->request->getCalculateIntervalMinutes() !== null) {
            $json["calculateIntervalMinutes"] = $this->request->getCalculateIntervalMinutes();
        }
        if ($this->request->getAdditionalScopes() !== null) {
            $array = [];
            foreach ($this->request->getAdditionalScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["additionalScopes"] = $array;
        }
        if ($this->request->getIgnoreUserIds() !== null) {
            $array = [];
            foreach ($this->request->getIgnoreUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["ignoreUserIds"] = $array;
        }
        if ($this->request->getGeneration() !== null) {
            $json["generation"] = $this->request->getGeneration();
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

class DeleteCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class SubscribeTask extends Gs2RestSessionTask {

    /**
     * @var SubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param SubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            SubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class SubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class DescribeScoresTask extends Gs2RestSessionTask {

    /**
     * @var DescribeScoresRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeScoresTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeScoresRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeScoresRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeScoresResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/scorer/{scorerUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);

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

class DescribeScoresByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeScoresByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeScoresByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeScoresByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeScoresByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeScoresByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/category/{categoryName}/scorer/{scorerUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);

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

class GetScoreTask extends Gs2RestSessionTask {

    /**
     * @var GetScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetScoreTask constructor.
     * @param Gs2RestSession $session
     * @param GetScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetScoreRequest $request
    ) {
        parent::__construct(
            $session,
            GetScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/scorer/{scorerUserId}/score/{uniqueId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);
        $url = str_replace("{uniqueId}", $this->request->getUniqueId() === null|| strlen($this->request->getUniqueId()) == 0 ? "null" : $this->request->getUniqueId(), $url);

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

class GetScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/category/{categoryName}/scorer/{scorerUserId}/score/{uniqueId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);
        $url = str_replace("{uniqueId}", $this->request->getUniqueId() === null|| strlen($this->request->getUniqueId()) == 0 ? "null" : $this->request->getUniqueId(), $url);

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

class DescribeRankingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRankingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRankingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRankingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRankingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRankingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/ranking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAdditionalScopeName() !== null) {
            $queryStrings["additionalScopeName"] = $this->request->getAdditionalScopeName();
        }
        if ($this->request->getStartIndex() !== null) {
            $queryStrings["startIndex"] = $this->request->getStartIndex();
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

class DescribeRankingssByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRankingssByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRankingssByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRankingssByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRankingssByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRankingssByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/category/{categoryName}/ranking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAdditionalScopeName() !== null) {
            $queryStrings["additionalScopeName"] = $this->request->getAdditionalScopeName();
        }
        if ($this->request->getStartIndex() !== null) {
            $queryStrings["startIndex"] = $this->request->getStartIndex();
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

class DescribeNearRankingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNearRankingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNearRankingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNearRankingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNearRankingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNearRankingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/ranking/near";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAdditionalScopeName() !== null) {
            $queryStrings["additionalScopeName"] = $this->request->getAdditionalScopeName();
        }
        if ($this->request->getScore() !== null) {
            $queryStrings["score"] = $this->request->getScore();
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

class GetRankingTask extends Gs2RestSessionTask {

    /**
     * @var GetRankingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRankingTask constructor.
     * @param Gs2RestSession $session
     * @param GetRankingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRankingRequest $request
    ) {
        parent::__construct(
            $session,
            GetRankingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/ranking/scorer/{scorerUserId}/score/{uniqueId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);
        $url = str_replace("{uniqueId}", $this->request->getUniqueId() === null|| strlen($this->request->getUniqueId()) == 0 ? "null" : $this->request->getUniqueId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAdditionalScopeName() !== null) {
            $queryStrings["additionalScopeName"] = $this->request->getAdditionalScopeName();
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

class GetRankingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetRankingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRankingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetRankingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRankingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetRankingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/category/{categoryName}/ranking/scorer/{scorerUserId}/score/{uniqueId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{scorerUserId}", $this->request->getScorerUserId() === null|| strlen($this->request->getScorerUserId()) == 0 ? "null" : $this->request->getScorerUserId(), $url);
        $url = str_replace("{uniqueId}", $this->request->getUniqueId() === null|| strlen($this->request->getUniqueId()) == 0 ? "null" : $this->request->getUniqueId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAdditionalScopeName() !== null) {
            $queryStrings["additionalScopeName"] = $this->request->getAdditionalScopeName();
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

class PutScoreTask extends Gs2RestSessionTask {

    /**
     * @var PutScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutScoreTask constructor.
     * @param Gs2RestSession $session
     * @param PutScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutScoreRequest $request
    ) {
        parent::__construct(
            $session,
            PutScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/category/{categoryName}/ranking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $json = [];
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class PutScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PutScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PutScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PutScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/category/{categoryName}/ranking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class CalcRankingTask extends Gs2RestSessionTask {

    /**
     * @var CalcRankingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CalcRankingTask constructor.
     * @param Gs2RestSession $session
     * @param CalcRankingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CalcRankingRequest $request
    ) {
        parent::__construct(
            $session,
            CalcRankingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/category/{categoryName}/calc/ranking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $json = [];
        if ($this->request->getAdditionalScopeName() !== null) {
            $json["additionalScopeName"] = $this->request->getAdditionalScopeName();
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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentRankingMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentRankingMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentRankingMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentRankingMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentRankingMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentRankingMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentRankingMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentRankingMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentRankingMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentRankingMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentRankingMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentRankingMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentRankingMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRankingMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRankingMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRankingMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRankingMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRankingMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentRankingMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentRankingMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentRankingMasterResult $res */
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

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentRankingMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRankingMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRankingMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRankingMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRankingMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRankingMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class GetSubscribeTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class GetSubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class UnsubscribeTask extends Gs2RestSessionTask {

    /**
     * @var UnsubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnsubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param UnsubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnsubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            UnsubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class UnsubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnsubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnsubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnsubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnsubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnsubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/category/{categoryName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class DescribeSubscribesByCategoryNameTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesByCategoryNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesByCategoryNameTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesByCategoryNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesByCategoryNameRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesByCategoryNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class DescribeSubscribesByCategoryNameAndUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesByCategoryNameAndUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesByCategoryNameAndUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesByCategoryNameAndUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesByCategoryNameAndUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesByCategoryNameAndUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/category/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);
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

/**
 * GS2-Ranking API client
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/
 */
class Gs2RankingRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the clean of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkcleanuserdatabyuserid
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
     * Check if the clean of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Category Models
     *
     * @param DescribeCategoryModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describecategorymodels
     */
    public function describeCategoryModelsAsync(
            DescribeCategoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Category Models
     *
     * @param DescribeCategoryModelsRequest $request
     * @return DescribeCategoryModelsResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describecategorymodels
     */
    public function describeCategoryModels (
            DescribeCategoryModelsRequest $request
    ): DescribeCategoryModelsResult {
        return $this->describeCategoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Category Model
     *
     * @param GetCategoryModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcategorymodel
     */
    public function getCategoryModelAsync(
            GetCategoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Category Model
     *
     * @param GetCategoryModelRequest $request
     * @return GetCategoryModelResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcategorymodel
     */
    public function getCategoryModel (
            GetCategoryModelRequest $request
    ): GetCategoryModelResult {
        return $this->getCategoryModelAsync(
            $request
        )->wait();
    }

    /**
     * List Category Model Masters
     *
     * @param DescribeCategoryModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describecategorymodelmasters
     */
    public function describeCategoryModelMastersAsync(
            DescribeCategoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Category Model Masters
     *
     * @param DescribeCategoryModelMastersRequest $request
     * @return DescribeCategoryModelMastersResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describecategorymodelmasters
     */
    public function describeCategoryModelMasters (
            DescribeCategoryModelMastersRequest $request
    ): DescribeCategoryModelMastersResult {
        return $this->describeCategoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Category Model Master
     *
     * @param CreateCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#createcategorymodelmaster
     */
    public function createCategoryModelMasterAsync(
            CreateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Category Model Master
     *
     * @param CreateCategoryModelMasterRequest $request
     * @return CreateCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#createcategorymodelmaster
     */
    public function createCategoryModelMaster (
            CreateCategoryModelMasterRequest $request
    ): CreateCategoryModelMasterResult {
        return $this->createCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Category Model Master
     *
     * @param GetCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcategorymodelmaster
     */
    public function getCategoryModelMasterAsync(
            GetCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Category Model Master
     *
     * @param GetCategoryModelMasterRequest $request
     * @return GetCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcategorymodelmaster
     */
    public function getCategoryModelMaster (
            GetCategoryModelMasterRequest $request
    ): GetCategoryModelMasterResult {
        return $this->getCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Category Model Master
     *
     * @param UpdateCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecategorymodelmaster
     */
    public function updateCategoryModelMasterAsync(
            UpdateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Category Model Master
     *
     * @param UpdateCategoryModelMasterRequest $request
     * @return UpdateCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecategorymodelmaster
     */
    public function updateCategoryModelMaster (
            UpdateCategoryModelMasterRequest $request
    ): UpdateCategoryModelMasterResult {
        return $this->updateCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Category Model Master
     *
     * @param DeleteCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#deletecategorymodelmaster
     */
    public function deleteCategoryModelMasterAsync(
            DeleteCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Category Model Master
     *
     * @param DeleteCategoryModelMasterRequest $request
     * @return DeleteCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#deletecategorymodelmaster
     */
    public function deleteCategoryModelMaster (
            DeleteCategoryModelMasterRequest $request
    ): DeleteCategoryModelMasterResult {
        return $this->deleteCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Subscribe to target users
     *
     * @param SubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribe-1
     */
    public function subscribeAsync(
            SubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subscribe to target users
     *
     * @param SubscribeRequest $request
     * @return SubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribe-1
     */
    public function subscribe (
            SubscribeRequest $request
    ): SubscribeResult {
        return $this->subscribeAsync(
            $request
        )->wait();
    }

    /**
     * Subscribe to the target user by User ID
     *
     * @param SubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribebyuserid
     */
    public function subscribeByUserIdAsync(
            SubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subscribe to the target user by User ID
     *
     * @param SubscribeByUserIdRequest $request
     * @return SubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribebyuserid
     */
    public function subscribeByUserId (
            SubscribeByUserIdRequest $request
    ): SubscribeByUserIdResult {
        return $this->subscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Scores
     *
     * @param DescribeScoresRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describescores
     */
    public function describeScoresAsync(
            DescribeScoresRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeScoresTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Scores
     *
     * @param DescribeScoresRequest $request
     * @return DescribeScoresResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describescores
     */
    public function describeScores (
            DescribeScoresRequest $request
    ): DescribeScoresResult {
        return $this->describeScoresAsync(
            $request
        )->wait();
    }

    /**
     * List Scores by User ID
     *
     * @param DescribeScoresByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describescoresbyuserid
     */
    public function describeScoresByUserIdAsync(
            DescribeScoresByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeScoresByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Scores by User ID
     *
     * @param DescribeScoresByUserIdRequest $request
     * @return DescribeScoresByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describescoresbyuserid
     */
    public function describeScoresByUserId (
            DescribeScoresByUserIdRequest $request
    ): DescribeScoresByUserIdResult {
        return $this->describeScoresByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Score
     *
     * @param GetScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getscore
     */
    public function getScoreAsync(
            GetScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Score
     *
     * @param GetScoreRequest $request
     * @return GetScoreResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getscore
     */
    public function getScore (
            GetScoreRequest $request
    ): GetScoreResult {
        return $this->getScoreAsync(
            $request
        )->wait();
    }

    /**
     * Get score by User ID
     *
     * @param GetScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getscorebyuserid
     */
    public function getScoreByUserIdAsync(
            GetScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get score by User ID
     *
     * @param GetScoreByUserIdRequest $request
     * @return GetScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getscorebyuserid
     */
    public function getScoreByUserId (
            GetScoreByUserIdRequest $request
    ): GetScoreByUserIdResult {
        return $this->getScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Ranking
     *
     * @param DescribeRankingsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankings
     */
    public function describeRankingsAsync(
            DescribeRankingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRankingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Ranking
     *
     * @param DescribeRankingsRequest $request
     * @return DescribeRankingsResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankings
     */
    public function describeRankings (
            DescribeRankingsRequest $request
    ): DescribeRankingsResult {
        return $this->describeRankingsAsync(
            $request
        )->wait();
    }

    /**
     * Get ranking by User ID
     *
     * @param DescribeRankingssByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankingssbyuserid
     */
    public function describeRankingssByUserIdAsync(
            DescribeRankingssByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRankingssByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get ranking by User ID
     *
     * @param DescribeRankingssByUserIdRequest $request
     * @return DescribeRankingssByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankingssbyuserid
     */
    public function describeRankingssByUserId (
            DescribeRankingssByUserIdRequest $request
    ): DescribeRankingssByUserIdResult {
        return $this->describeRankingssByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get ranking near the specified score
     *
     * @param DescribeNearRankingsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describenearrankings
     */
    public function describeNearRankingsAsync(
            DescribeNearRankingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNearRankingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get ranking near the specified score
     *
     * @param DescribeNearRankingsRequest $request
     * @return DescribeNearRankingsResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describenearrankings
     */
    public function describeNearRankings (
            DescribeNearRankingsRequest $request
    ): DescribeNearRankingsResult {
        return $this->describeNearRankingsAsync(
            $request
        )->wait();
    }

    /**
     * Get Ranking
     *
     * @param GetRankingRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getranking
     */
    public function getRankingAsync(
            GetRankingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRankingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Ranking
     *
     * @param GetRankingRequest $request
     * @return GetRankingResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getranking
     */
    public function getRanking (
            GetRankingRequest $request
    ): GetRankingResult {
        return $this->getRankingAsync(
            $request
        )->wait();
    }

    /**
     * Get ranking by User ID
     *
     * @param GetRankingByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getrankingbyuserid
     */
    public function getRankingByUserIdAsync(
            GetRankingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRankingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get ranking by User ID
     *
     * @param GetRankingByUserIdRequest $request
     * @return GetRankingByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getrankingbyuserid
     */
    public function getRankingByUserId (
            GetRankingByUserIdRequest $request
    ): GetRankingByUserIdResult {
        return $this->getRankingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Register score
     *
     * @param PutScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#putscore
     */
    public function putScoreAsync(
            PutScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register score
     *
     * @param PutScoreRequest $request
     * @return PutScoreResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#putscore
     */
    public function putScore (
            PutScoreRequest $request
    ): PutScoreResult {
        return $this->putScoreAsync(
            $request
        )->wait();
    }

    /**
     * Register scores by User ID
     *
     * @param PutScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#putscorebyuserid
     */
    public function putScoreByUserIdAsync(
            PutScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register scores by User ID
     *
     * @param PutScoreByUserIdRequest $request
     * @return PutScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#putscorebyuserid
     */
    public function putScoreByUserId (
            PutScoreByUserIdRequest $request
    ): PutScoreByUserIdResult {
        return $this->putScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Forced execution of the ranking calculation process
     *
     * @param CalcRankingRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#calcranking
     */
    public function calcRankingAsync(
            CalcRankingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CalcRankingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Forced execution of the ranking calculation process
     *
     * @param CalcRankingRequest $request
     * @return CalcRankingResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#calcranking
     */
    public function calcRanking (
            CalcRankingRequest $request
    ): CalcRankingResult {
        return $this->calcRankingAsync(
            $request
        )->wait();
    }

    /**
     * Export Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#exportmaster
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
     * Export Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Ranking Model master data
     *
     * @param GetCurrentRankingMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcurrentrankingmaster
     */
    public function getCurrentRankingMasterAsync(
            GetCurrentRankingMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentRankingMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Ranking Model master data
     *
     * @param GetCurrentRankingMasterRequest $request
     * @return GetCurrentRankingMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getcurrentrankingmaster
     */
    public function getCurrentRankingMaster (
            GetCurrentRankingMasterRequest $request
    ): GetCurrentRankingMasterResult {
        return $this->getCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Ranking Model master data (3-phase version)
     *
     * @param PreUpdateCurrentRankingMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#preupdatecurrentrankingmaster
     */
    public function preUpdateCurrentRankingMasterAsync(
            PreUpdateCurrentRankingMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentRankingMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Ranking Model master data (3-phase version)
     *
     * @param PreUpdateCurrentRankingMasterRequest $request
     * @return PreUpdateCurrentRankingMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#preupdatecurrentrankingmaster
     */
    public function preUpdateCurrentRankingMaster (
            PreUpdateCurrentRankingMasterRequest $request
    ): PreUpdateCurrentRankingMasterResult {
        return $this->preUpdateCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Ranking Model master data
     *
     * @param UpdateCurrentRankingMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecurrentrankingmaster
     */
    public function updateCurrentRankingMasterAsync(
            UpdateCurrentRankingMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRankingMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Ranking Model master data
     *
     * @param UpdateCurrentRankingMasterRequest $request
     * @return UpdateCurrentRankingMasterResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecurrentrankingmaster
     */
    public function updateCurrentRankingMaster (
            UpdateCurrentRankingMasterRequest $request
    ): UpdateCurrentRankingMasterResult {
        return $this->updateCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Ranking Model master data from GitHub
     *
     * @param UpdateCurrentRankingMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecurrentrankingmasterfromgithub
     */
    public function updateCurrentRankingMasterFromGitHubAsync(
            UpdateCurrentRankingMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRankingMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Ranking Model master data from GitHub
     *
     * @param UpdateCurrentRankingMasterFromGitHubRequest $request
     * @return UpdateCurrentRankingMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#updatecurrentrankingmasterfromgithub
     */
    public function updateCurrentRankingMasterFromGitHub (
            UpdateCurrentRankingMasterFromGitHubRequest $request
    ): UpdateCurrentRankingMasterFromGitHubResult {
        return $this->updateCurrentRankingMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribed User Information
     *
     * @param GetSubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getsubscribe
     */
    public function getSubscribeAsync(
            GetSubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribed User Information
     *
     * @param GetSubscribeRequest $request
     * @return GetSubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getsubscribe
     */
    public function getSubscribe (
            GetSubscribeRequest $request
    ): GetSubscribeResult {
        return $this->getSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribed User Information by User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getsubscribebyuserid
     */
    public function getSubscribeByUserIdAsync(
            GetSubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribed User Information by User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return GetSubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#getsubscribebyuserid
     */
    public function getSubscribeByUserId (
            GetSubscribeByUserIdRequest $request
    ): GetSubscribeByUserIdResult {
        return $this->getSubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Unsubscribe the target user
     *
     * @param UnsubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#unsubscribe
     */
    public function unsubscribeAsync(
            UnsubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnsubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Unsubscribe the target user
     *
     * @param UnsubscribeRequest $request
     * @return UnsubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#unsubscribe
     */
    public function unsubscribe (
            UnsubscribeRequest $request
    ): UnsubscribeResult {
        return $this->unsubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Unsubscribe the target user by User ID
     *
     * @param UnsubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#unsubscribebyuserid
     */
    public function unsubscribeByUserIdAsync(
            UnsubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnsubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Unsubscribe the target user by User ID
     *
     * @param UnsubscribeByUserIdRequest $request
     * @return UnsubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#unsubscribebyuserid
     */
    public function unsubscribeByUserId (
            UnsubscribeByUserIdRequest $request
    ): UnsubscribeByUserIdResult {
        return $this->unsubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Obtaining a list of user IDs of subscribed users
     *
     * @param DescribeSubscribesByCategoryNameRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describesubscribesbycategoryname
     */
    public function describeSubscribesByCategoryNameAsync(
            DescribeSubscribesByCategoryNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesByCategoryNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Obtaining a list of user IDs of subscribed users
     *
     * @param DescribeSubscribesByCategoryNameRequest $request
     * @return DescribeSubscribesByCategoryNameResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describesubscribesbycategoryname
     */
    public function describeSubscribesByCategoryName (
            DescribeSubscribesByCategoryNameRequest $request
    ): DescribeSubscribesByCategoryNameResult {
        return $this->describeSubscribesByCategoryNameAsync(
            $request
        )->wait();
    }

    /**
     * Obtaining a list of users to which the user is subscribed by specifying the user ID
     *
     * @param DescribeSubscribesByCategoryNameAndUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describesubscribesbycategorynameanduserid
     */
    public function describeSubscribesByCategoryNameAndUserIdAsync(
            DescribeSubscribesByCategoryNameAndUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesByCategoryNameAndUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Obtaining a list of users to which the user is subscribed by specifying the user ID
     *
     * @param DescribeSubscribesByCategoryNameAndUserIdRequest $request
     * @return DescribeSubscribesByCategoryNameAndUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking/sdk/#describesubscribesbycategorynameanduserid
     */
    public function describeSubscribesByCategoryNameAndUserId (
            DescribeSubscribesByCategoryNameAndUserIdRequest $request
    ): DescribeSubscribesByCategoryNameAndUserIdResult {
        return $this->describeSubscribesByCategoryNameAndUserIdAsync(
            $request
        )->wait();
    }
}