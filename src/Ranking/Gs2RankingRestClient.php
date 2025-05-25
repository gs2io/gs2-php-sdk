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
 * GS2 Ranking API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2RankingRestClient extends AbstractGs2Client {

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
     * @param DescribeCategoryModelsRequest $request
     * @return PromiseInterface
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
     * @param DescribeCategoryModelsRequest $request
     * @return DescribeCategoryModelsResult
     */
    public function describeCategoryModels (
            DescribeCategoryModelsRequest $request
    ): DescribeCategoryModelsResult {
        return $this->describeCategoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCategoryModelRequest $request
     * @return PromiseInterface
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
     * @param GetCategoryModelRequest $request
     * @return GetCategoryModelResult
     */
    public function getCategoryModel (
            GetCategoryModelRequest $request
    ): GetCategoryModelResult {
        return $this->getCategoryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCategoryModelMastersRequest $request
     * @return PromiseInterface
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
     * @param DescribeCategoryModelMastersRequest $request
     * @return DescribeCategoryModelMastersResult
     */
    public function describeCategoryModelMasters (
            DescribeCategoryModelMastersRequest $request
    ): DescribeCategoryModelMastersResult {
        return $this->describeCategoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateCategoryModelMasterRequest $request
     * @return PromiseInterface
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
     * @param CreateCategoryModelMasterRequest $request
     * @return CreateCategoryModelMasterResult
     */
    public function createCategoryModelMaster (
            CreateCategoryModelMasterRequest $request
    ): CreateCategoryModelMasterResult {
        return $this->createCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCategoryModelMasterRequest $request
     * @return PromiseInterface
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
     * @param GetCategoryModelMasterRequest $request
     * @return GetCategoryModelMasterResult
     */
    public function getCategoryModelMaster (
            GetCategoryModelMasterRequest $request
    ): GetCategoryModelMasterResult {
        return $this->getCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCategoryModelMasterRequest $request
     * @return PromiseInterface
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
     * @param UpdateCategoryModelMasterRequest $request
     * @return UpdateCategoryModelMasterResult
     */
    public function updateCategoryModelMaster (
            UpdateCategoryModelMasterRequest $request
    ): UpdateCategoryModelMasterResult {
        return $this->updateCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCategoryModelMasterRequest $request
     * @return PromiseInterface
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
     * @param DeleteCategoryModelMasterRequest $request
     * @return DeleteCategoryModelMasterResult
     */
    public function deleteCategoryModelMaster (
            DeleteCategoryModelMasterRequest $request
    ): DeleteCategoryModelMasterResult {
        return $this->deleteCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param SubscribeRequest $request
     * @return PromiseInterface
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
     * @param SubscribeRequest $request
     * @return SubscribeResult
     */
    public function subscribe (
            SubscribeRequest $request
    ): SubscribeResult {
        return $this->subscribeAsync(
            $request
        )->wait();
    }

    /**
     * @param SubscribeByUserIdRequest $request
     * @return PromiseInterface
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
     * @param SubscribeByUserIdRequest $request
     * @return SubscribeByUserIdResult
     */
    public function subscribeByUserId (
            SubscribeByUserIdRequest $request
    ): SubscribeByUserIdResult {
        return $this->subscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeScoresRequest $request
     * @return PromiseInterface
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
     * @param DescribeScoresRequest $request
     * @return DescribeScoresResult
     */
    public function describeScores (
            DescribeScoresRequest $request
    ): DescribeScoresResult {
        return $this->describeScoresAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeScoresByUserIdRequest $request
     * @return PromiseInterface
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
     * @param DescribeScoresByUserIdRequest $request
     * @return DescribeScoresByUserIdResult
     */
    public function describeScoresByUserId (
            DescribeScoresByUserIdRequest $request
    ): DescribeScoresByUserIdResult {
        return $this->describeScoresByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetScoreRequest $request
     * @return PromiseInterface
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
     * @param GetScoreRequest $request
     * @return GetScoreResult
     */
    public function getScore (
            GetScoreRequest $request
    ): GetScoreResult {
        return $this->getScoreAsync(
            $request
        )->wait();
    }

    /**
     * @param GetScoreByUserIdRequest $request
     * @return PromiseInterface
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
     * @param GetScoreByUserIdRequest $request
     * @return GetScoreByUserIdResult
     */
    public function getScoreByUserId (
            GetScoreByUserIdRequest $request
    ): GetScoreByUserIdResult {
        return $this->getScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRankingsRequest $request
     * @return PromiseInterface
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
     * @param DescribeRankingsRequest $request
     * @return DescribeRankingsResult
     */
    public function describeRankings (
            DescribeRankingsRequest $request
    ): DescribeRankingsResult {
        return $this->describeRankingsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRankingssByUserIdRequest $request
     * @return PromiseInterface
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
     * @param DescribeRankingssByUserIdRequest $request
     * @return DescribeRankingssByUserIdResult
     */
    public function describeRankingssByUserId (
            DescribeRankingssByUserIdRequest $request
    ): DescribeRankingssByUserIdResult {
        return $this->describeRankingssByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeNearRankingsRequest $request
     * @return PromiseInterface
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
     * @param DescribeNearRankingsRequest $request
     * @return DescribeNearRankingsResult
     */
    public function describeNearRankings (
            DescribeNearRankingsRequest $request
    ): DescribeNearRankingsResult {
        return $this->describeNearRankingsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRankingRequest $request
     * @return PromiseInterface
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
     * @param GetRankingRequest $request
     * @return GetRankingResult
     */
    public function getRanking (
            GetRankingRequest $request
    ): GetRankingResult {
        return $this->getRankingAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRankingByUserIdRequest $request
     * @return PromiseInterface
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
     * @param GetRankingByUserIdRequest $request
     * @return GetRankingByUserIdResult
     */
    public function getRankingByUserId (
            GetRankingByUserIdRequest $request
    ): GetRankingByUserIdResult {
        return $this->getRankingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PutScoreRequest $request
     * @return PromiseInterface
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
     * @param PutScoreRequest $request
     * @return PutScoreResult
     */
    public function putScore (
            PutScoreRequest $request
    ): PutScoreResult {
        return $this->putScoreAsync(
            $request
        )->wait();
    }

    /**
     * @param PutScoreByUserIdRequest $request
     * @return PromiseInterface
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
     * @param PutScoreByUserIdRequest $request
     * @return PutScoreByUserIdResult
     */
    public function putScoreByUserId (
            PutScoreByUserIdRequest $request
    ): PutScoreByUserIdResult {
        return $this->putScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CalcRankingRequest $request
     * @return PromiseInterface
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
     * @param CalcRankingRequest $request
     * @return CalcRankingResult
     */
    public function calcRanking (
            CalcRankingRequest $request
    ): CalcRankingResult {
        return $this->calcRankingAsync(
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
     * @param GetCurrentRankingMasterRequest $request
     * @return PromiseInterface
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
     * @param GetCurrentRankingMasterRequest $request
     * @return GetCurrentRankingMasterResult
     */
    public function getCurrentRankingMaster (
            GetCurrentRankingMasterRequest $request
    ): GetCurrentRankingMasterResult {
        return $this->getCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentRankingMasterRequest $request
     * @return PromiseInterface
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
     * @param PreUpdateCurrentRankingMasterRequest $request
     * @return PreUpdateCurrentRankingMasterResult
     */
    public function preUpdateCurrentRankingMaster (
            PreUpdateCurrentRankingMasterRequest $request
    ): PreUpdateCurrentRankingMasterResult {
        return $this->preUpdateCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRankingMasterRequest $request
     * @return PromiseInterface
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
     * @param UpdateCurrentRankingMasterRequest $request
     * @return UpdateCurrentRankingMasterResult
     */
    public function updateCurrentRankingMaster (
            UpdateCurrentRankingMasterRequest $request
    ): UpdateCurrentRankingMasterResult {
        return $this->updateCurrentRankingMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRankingMasterFromGitHubRequest $request
     * @return PromiseInterface
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
     * @param UpdateCurrentRankingMasterFromGitHubRequest $request
     * @return UpdateCurrentRankingMasterFromGitHubResult
     */
    public function updateCurrentRankingMasterFromGitHub (
            UpdateCurrentRankingMasterFromGitHubRequest $request
    ): UpdateCurrentRankingMasterFromGitHubResult {
        return $this->updateCurrentRankingMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSubscribeRequest $request
     * @return PromiseInterface
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
     * @param GetSubscribeRequest $request
     * @return GetSubscribeResult
     */
    public function getSubscribe (
            GetSubscribeRequest $request
    ): GetSubscribeResult {
        return $this->getSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSubscribeByUserIdRequest $request
     * @return PromiseInterface
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
     * @param GetSubscribeByUserIdRequest $request
     * @return GetSubscribeByUserIdResult
     */
    public function getSubscribeByUserId (
            GetSubscribeByUserIdRequest $request
    ): GetSubscribeByUserIdResult {
        return $this->getSubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UnsubscribeRequest $request
     * @return PromiseInterface
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
     * @param UnsubscribeRequest $request
     * @return UnsubscribeResult
     */
    public function unsubscribe (
            UnsubscribeRequest $request
    ): UnsubscribeResult {
        return $this->unsubscribeAsync(
            $request
        )->wait();
    }

    /**
     * @param UnsubscribeByUserIdRequest $request
     * @return PromiseInterface
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
     * @param UnsubscribeByUserIdRequest $request
     * @return UnsubscribeByUserIdResult
     */
    public function unsubscribeByUserId (
            UnsubscribeByUserIdRequest $request
    ): UnsubscribeByUserIdResult {
        return $this->unsubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSubscribesByCategoryNameRequest $request
     * @return PromiseInterface
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
     * @param DescribeSubscribesByCategoryNameRequest $request
     * @return DescribeSubscribesByCategoryNameResult
     */
    public function describeSubscribesByCategoryName (
            DescribeSubscribesByCategoryNameRequest $request
    ): DescribeSubscribesByCategoryNameResult {
        return $this->describeSubscribesByCategoryNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSubscribesByCategoryNameAndUserIdRequest $request
     * @return PromiseInterface
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
     * @param DescribeSubscribesByCategoryNameAndUserIdRequest $request
     * @return DescribeSubscribesByCategoryNameAndUserIdResult
     */
    public function describeSubscribesByCategoryNameAndUserId (
            DescribeSubscribesByCategoryNameAndUserIdRequest $request
    ): DescribeSubscribesByCategoryNameAndUserIdResult {
        return $this->describeSubscribesByCategoryNameAndUserIdAsync(
            $request
        )->wait();
    }
}