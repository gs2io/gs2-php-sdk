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

namespace Gs2\Ranking2;

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


use Gs2\Ranking2\Request\DescribeNamespacesRequest;
use Gs2\Ranking2\Result\DescribeNamespacesResult;
use Gs2\Ranking2\Request\CreateNamespaceRequest;
use Gs2\Ranking2\Result\CreateNamespaceResult;
use Gs2\Ranking2\Request\GetNamespaceStatusRequest;
use Gs2\Ranking2\Result\GetNamespaceStatusResult;
use Gs2\Ranking2\Request\GetNamespaceRequest;
use Gs2\Ranking2\Result\GetNamespaceResult;
use Gs2\Ranking2\Request\UpdateNamespaceRequest;
use Gs2\Ranking2\Result\UpdateNamespaceResult;
use Gs2\Ranking2\Request\DeleteNamespaceRequest;
use Gs2\Ranking2\Result\DeleteNamespaceResult;
use Gs2\Ranking2\Request\GetServiceVersionRequest;
use Gs2\Ranking2\Result\GetServiceVersionResult;
use Gs2\Ranking2\Request\DumpUserDataByUserIdRequest;
use Gs2\Ranking2\Result\DumpUserDataByUserIdResult;
use Gs2\Ranking2\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Ranking2\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Ranking2\Request\CleanUserDataByUserIdRequest;
use Gs2\Ranking2\Result\CleanUserDataByUserIdResult;
use Gs2\Ranking2\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Ranking2\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Ranking2\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Ranking2\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Ranking2\Request\ImportUserDataByUserIdRequest;
use Gs2\Ranking2\Result\ImportUserDataByUserIdResult;
use Gs2\Ranking2\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Ranking2\Result\CheckImportUserDataByUserIdResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingModelsRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingModelsResult;
use Gs2\Ranking2\Request\GetGlobalRankingModelRequest;
use Gs2\Ranking2\Result\GetGlobalRankingModelResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingModelMastersRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingModelMastersResult;
use Gs2\Ranking2\Request\CreateGlobalRankingModelMasterRequest;
use Gs2\Ranking2\Result\CreateGlobalRankingModelMasterResult;
use Gs2\Ranking2\Request\GetGlobalRankingModelMasterRequest;
use Gs2\Ranking2\Result\GetGlobalRankingModelMasterResult;
use Gs2\Ranking2\Request\UpdateGlobalRankingModelMasterRequest;
use Gs2\Ranking2\Result\UpdateGlobalRankingModelMasterResult;
use Gs2\Ranking2\Request\DeleteGlobalRankingModelMasterRequest;
use Gs2\Ranking2\Result\DeleteGlobalRankingModelMasterResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingScoresRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingScoresResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingScoresByUserIdRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingScoresByUserIdResult;
use Gs2\Ranking2\Request\PutGlobalRankingScoreRequest;
use Gs2\Ranking2\Result\PutGlobalRankingScoreResult;
use Gs2\Ranking2\Request\PutGlobalRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\PutGlobalRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\GetGlobalRankingScoreRequest;
use Gs2\Ranking2\Result\GetGlobalRankingScoreResult;
use Gs2\Ranking2\Request\GetGlobalRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\GetGlobalRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\DeleteGlobalRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\DeleteGlobalRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifyGlobalRankingScoreRequest;
use Gs2\Ranking2\Result\VerifyGlobalRankingScoreResult;
use Gs2\Ranking2\Request\VerifyGlobalRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\VerifyGlobalRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifyGlobalRankingScoreByStampTaskRequest;
use Gs2\Ranking2\Result\VerifyGlobalRankingScoreByStampTaskResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingReceivedRewardsRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingReceivedRewardsResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingReceivedRewardsByUserIdRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingReceivedRewardsByUserIdResult;
use Gs2\Ranking2\Request\CreateGlobalRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\CreateGlobalRankingReceivedRewardResult;
use Gs2\Ranking2\Request\CreateGlobalRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\CreateGlobalRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\ReceiveGlobalRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\ReceiveGlobalRankingReceivedRewardResult;
use Gs2\Ranking2\Request\ReceiveGlobalRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\ReceiveGlobalRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\GetGlobalRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\GetGlobalRankingReceivedRewardResult;
use Gs2\Ranking2\Request\GetGlobalRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\GetGlobalRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\DeleteGlobalRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\DeleteGlobalRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\CreateGlobalRankingReceivedRewardByStampTaskRequest;
use Gs2\Ranking2\Result\CreateGlobalRankingReceivedRewardByStampTaskResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingsRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingsResult;
use Gs2\Ranking2\Request\DescribeGlobalRankingsByUserIdRequest;
use Gs2\Ranking2\Result\DescribeGlobalRankingsByUserIdResult;
use Gs2\Ranking2\Request\GetGlobalRankingRequest;
use Gs2\Ranking2\Result\GetGlobalRankingResult;
use Gs2\Ranking2\Request\GetGlobalRankingByUserIdRequest;
use Gs2\Ranking2\Result\GetGlobalRankingByUserIdResult;
use Gs2\Ranking2\Request\DescribeClusterRankingModelsRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingModelsResult;
use Gs2\Ranking2\Request\GetClusterRankingModelRequest;
use Gs2\Ranking2\Result\GetClusterRankingModelResult;
use Gs2\Ranking2\Request\DescribeClusterRankingModelMastersRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingModelMastersResult;
use Gs2\Ranking2\Request\CreateClusterRankingModelMasterRequest;
use Gs2\Ranking2\Result\CreateClusterRankingModelMasterResult;
use Gs2\Ranking2\Request\GetClusterRankingModelMasterRequest;
use Gs2\Ranking2\Result\GetClusterRankingModelMasterResult;
use Gs2\Ranking2\Request\UpdateClusterRankingModelMasterRequest;
use Gs2\Ranking2\Result\UpdateClusterRankingModelMasterResult;
use Gs2\Ranking2\Request\DeleteClusterRankingModelMasterRequest;
use Gs2\Ranking2\Result\DeleteClusterRankingModelMasterResult;
use Gs2\Ranking2\Request\DescribeClusterRankingScoresRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingScoresResult;
use Gs2\Ranking2\Request\DescribeClusterRankingScoresByUserIdRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingScoresByUserIdResult;
use Gs2\Ranking2\Request\PutClusterRankingScoreRequest;
use Gs2\Ranking2\Result\PutClusterRankingScoreResult;
use Gs2\Ranking2\Request\PutClusterRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\PutClusterRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\GetClusterRankingScoreRequest;
use Gs2\Ranking2\Result\GetClusterRankingScoreResult;
use Gs2\Ranking2\Request\GetClusterRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\GetClusterRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\DeleteClusterRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\DeleteClusterRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifyClusterRankingScoreRequest;
use Gs2\Ranking2\Result\VerifyClusterRankingScoreResult;
use Gs2\Ranking2\Request\VerifyClusterRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\VerifyClusterRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifyClusterRankingScoreByStampTaskRequest;
use Gs2\Ranking2\Result\VerifyClusterRankingScoreByStampTaskResult;
use Gs2\Ranking2\Request\DescribeClusterRankingReceivedRewardsRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingReceivedRewardsResult;
use Gs2\Ranking2\Request\DescribeClusterRankingReceivedRewardsByUserIdRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingReceivedRewardsByUserIdResult;
use Gs2\Ranking2\Request\CreateClusterRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\CreateClusterRankingReceivedRewardResult;
use Gs2\Ranking2\Request\CreateClusterRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\CreateClusterRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\ReceiveClusterRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\ReceiveClusterRankingReceivedRewardResult;
use Gs2\Ranking2\Request\ReceiveClusterRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\ReceiveClusterRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\GetClusterRankingReceivedRewardRequest;
use Gs2\Ranking2\Result\GetClusterRankingReceivedRewardResult;
use Gs2\Ranking2\Request\GetClusterRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\GetClusterRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\DeleteClusterRankingReceivedRewardByUserIdRequest;
use Gs2\Ranking2\Result\DeleteClusterRankingReceivedRewardByUserIdResult;
use Gs2\Ranking2\Request\CreateClusterRankingReceivedRewardByStampTaskRequest;
use Gs2\Ranking2\Result\CreateClusterRankingReceivedRewardByStampTaskResult;
use Gs2\Ranking2\Request\DescribeClusterRankingsRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingsResult;
use Gs2\Ranking2\Request\DescribeClusterRankingsByUserIdRequest;
use Gs2\Ranking2\Result\DescribeClusterRankingsByUserIdResult;
use Gs2\Ranking2\Request\GetClusterRankingRequest;
use Gs2\Ranking2\Result\GetClusterRankingResult;
use Gs2\Ranking2\Request\GetClusterRankingByUserIdRequest;
use Gs2\Ranking2\Result\GetClusterRankingByUserIdResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingModelsRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingModelsResult;
use Gs2\Ranking2\Request\GetSubscribeRankingModelRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingModelResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingModelMastersRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingModelMastersResult;
use Gs2\Ranking2\Request\CreateSubscribeRankingModelMasterRequest;
use Gs2\Ranking2\Result\CreateSubscribeRankingModelMasterResult;
use Gs2\Ranking2\Request\GetSubscribeRankingModelMasterRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingModelMasterResult;
use Gs2\Ranking2\Request\UpdateSubscribeRankingModelMasterRequest;
use Gs2\Ranking2\Result\UpdateSubscribeRankingModelMasterResult;
use Gs2\Ranking2\Request\DeleteSubscribeRankingModelMasterRequest;
use Gs2\Ranking2\Result\DeleteSubscribeRankingModelMasterResult;
use Gs2\Ranking2\Request\DescribeSubscribesRequest;
use Gs2\Ranking2\Result\DescribeSubscribesResult;
use Gs2\Ranking2\Request\DescribeSubscribesByUserIdRequest;
use Gs2\Ranking2\Result\DescribeSubscribesByUserIdResult;
use Gs2\Ranking2\Request\AddSubscribeRequest;
use Gs2\Ranking2\Result\AddSubscribeResult;
use Gs2\Ranking2\Request\AddSubscribeByUserIdRequest;
use Gs2\Ranking2\Result\AddSubscribeByUserIdResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingScoresRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingScoresResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingScoresByUserIdRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingScoresByUserIdResult;
use Gs2\Ranking2\Request\PutSubscribeRankingScoreRequest;
use Gs2\Ranking2\Result\PutSubscribeRankingScoreResult;
use Gs2\Ranking2\Request\PutSubscribeRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\PutSubscribeRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\GetSubscribeRankingScoreRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingScoreResult;
use Gs2\Ranking2\Request\GetSubscribeRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\DeleteSubscribeRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\DeleteSubscribeRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifySubscribeRankingScoreRequest;
use Gs2\Ranking2\Result\VerifySubscribeRankingScoreResult;
use Gs2\Ranking2\Request\VerifySubscribeRankingScoreByUserIdRequest;
use Gs2\Ranking2\Result\VerifySubscribeRankingScoreByUserIdResult;
use Gs2\Ranking2\Request\VerifySubscribeRankingScoreByStampTaskRequest;
use Gs2\Ranking2\Result\VerifySubscribeRankingScoreByStampTaskResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingsRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingsResult;
use Gs2\Ranking2\Request\DescribeSubscribeRankingsByUserIdRequest;
use Gs2\Ranking2\Result\DescribeSubscribeRankingsByUserIdResult;
use Gs2\Ranking2\Request\GetSubscribeRankingRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingResult;
use Gs2\Ranking2\Request\GetSubscribeRankingByUserIdRequest;
use Gs2\Ranking2\Result\GetSubscribeRankingByUserIdResult;
use Gs2\Ranking2\Request\ExportMasterRequest;
use Gs2\Ranking2\Result\ExportMasterResult;
use Gs2\Ranking2\Request\GetCurrentRankingMasterRequest;
use Gs2\Ranking2\Result\GetCurrentRankingMasterResult;
use Gs2\Ranking2\Request\PreUpdateCurrentRankingMasterRequest;
use Gs2\Ranking2\Result\PreUpdateCurrentRankingMasterResult;
use Gs2\Ranking2\Request\UpdateCurrentRankingMasterRequest;
use Gs2\Ranking2\Result\UpdateCurrentRankingMasterResult;
use Gs2\Ranking2\Request\UpdateCurrentRankingMasterFromGitHubRequest;
use Gs2\Ranking2\Result\UpdateCurrentRankingMasterFromGitHubResult;
use Gs2\Ranking2\Request\GetSubscribeRequest;
use Gs2\Ranking2\Result\GetSubscribeResult;
use Gs2\Ranking2\Request\GetSubscribeByUserIdRequest;
use Gs2\Ranking2\Result\GetSubscribeByUserIdResult;
use Gs2\Ranking2\Request\DeleteSubscribeRequest;
use Gs2\Ranking2\Result\DeleteSubscribeResult;
use Gs2\Ranking2\Request\DeleteSubscribeByUserIdRequest;
use Gs2\Ranking2\Result\DeleteSubscribeByUserIdResult;

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeGlobalRankingModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/global";

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

class GetGlobalRankingModelTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeGlobalRankingModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/global";

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

class CreateGlobalRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateGlobalRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGlobalRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGlobalRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGlobalRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGlobalRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/global";

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
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getRankingRewards() !== null) {
            $array = [];
            foreach ($this->request->getRankingRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rankingRewards"] = $array;
        }
        if ($this->request->getRewardCalculationIndex() !== null) {
            $json["rewardCalculationIndex"] = $this->request->getRewardCalculationIndex();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class GetGlobalRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class UpdateGlobalRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGlobalRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGlobalRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGlobalRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGlobalRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGlobalRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getRankingRewards() !== null) {
            $array = [];
            foreach ($this->request->getRankingRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rankingRewards"] = $array;
        }
        if ($this->request->getRewardCalculationIndex() !== null) {
            $json["rewardCalculationIndex"] = $this->request->getRewardCalculationIndex();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class DeleteGlobalRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGlobalRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGlobalRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGlobalRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGlobalRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGlobalRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeGlobalRankingScoresTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingScoresRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingScoresTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingScoresRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingScoresRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingScoresResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/global";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class DescribeGlobalRankingScoresByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingScoresByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingScoresByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingScoresByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingScoresByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingScoresByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class PutGlobalRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var PutGlobalRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutGlobalRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param PutGlobalRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutGlobalRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            PutGlobalRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class PutGlobalRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PutGlobalRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutGlobalRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PutGlobalRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutGlobalRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PutGlobalRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

class GetGlobalRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetGlobalRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DeleteGlobalRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGlobalRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGlobalRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGlobalRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGlobalRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGlobalRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global/{rankingName}/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class VerifyGlobalRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGlobalRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGlobalRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGlobalRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGlobalRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGlobalRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global/{rankingName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifyGlobalRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGlobalRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGlobalRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGlobalRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGlobalRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGlobalRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/global/{rankingName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifyGlobalRankingScoreByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyGlobalRankingScoreByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyGlobalRankingScoreByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyGlobalRankingScoreByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyGlobalRankingScoreByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyGlobalRankingScoreByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/global/score/verify";

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

class DescribeGlobalRankingReceivedRewardsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingReceivedRewardsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingReceivedRewardsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingReceivedRewardsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingReceivedRewardsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingReceivedRewardsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/global/reward/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeGlobalRankingReceivedRewardsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingReceivedRewardsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingReceivedRewardsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingReceivedRewardsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/global/reward/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class CreateGlobalRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var CreateGlobalRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGlobalRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGlobalRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGlobalRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGlobalRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/global/reward/received/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
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

class CreateGlobalRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateGlobalRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGlobalRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGlobalRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGlobalRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGlobalRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/global/reward/received/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
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

class ReceiveGlobalRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveGlobalRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveGlobalRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveGlobalRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveGlobalRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveGlobalRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/global/reward/received/{rankingName}/{season}/reward/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

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

class ReceiveGlobalRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveGlobalRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveGlobalRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveGlobalRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/global/reward/received/{rankingName}/{season}/reward/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

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

class GetGlobalRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/global/reward/received/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetGlobalRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/global/reward/received/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DeleteGlobalRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGlobalRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGlobalRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGlobalRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGlobalRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/global/reward/received/{rankingName}/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class CreateGlobalRankingReceivedRewardByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var CreateGlobalRankingReceivedRewardByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGlobalRankingReceivedRewardByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGlobalRankingReceivedRewardByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGlobalRankingReceivedRewardByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGlobalRankingReceivedRewardByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/ranking/global/reward/receive";

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

class DescribeGlobalRankingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/global/{rankingName}/user/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeGlobalRankingsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalRankingsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalRankingsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalRankingsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalRankingsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalRankingsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/global/{rankingName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetGlobalRankingTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/global/{rankingName}/user/me/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetGlobalRankingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalRankingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalRankingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalRankingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalRankingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalRankingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/global/{rankingName}/user/{userId}/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeClusterRankingModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/cluster";

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

class GetClusterRankingModelTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/cluster/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeClusterRankingModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/cluster";

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

class CreateClusterRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateClusterRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateClusterRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateClusterRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateClusterRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateClusterRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/cluster";

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
        if ($this->request->getClusterType() !== null) {
            $json["clusterType"] = $this->request->getClusterType();
        }
        if ($this->request->getMinimumValue() !== null) {
            $json["minimumValue"] = $this->request->getMinimumValue();
        }
        if ($this->request->getMaximumValue() !== null) {
            $json["maximumValue"] = $this->request->getMaximumValue();
        }
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getRankingRewards() !== null) {
            $array = [];
            foreach ($this->request->getRankingRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rankingRewards"] = $array;
        }
        if ($this->request->getRewardCalculationIndex() !== null) {
            $json["rewardCalculationIndex"] = $this->request->getRewardCalculationIndex();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class GetClusterRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/cluster/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class UpdateClusterRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateClusterRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateClusterRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateClusterRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateClusterRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateClusterRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/cluster/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getClusterType() !== null) {
            $json["clusterType"] = $this->request->getClusterType();
        }
        if ($this->request->getMinimumValue() !== null) {
            $json["minimumValue"] = $this->request->getMinimumValue();
        }
        if ($this->request->getMaximumValue() !== null) {
            $json["maximumValue"] = $this->request->getMaximumValue();
        }
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getRankingRewards() !== null) {
            $array = [];
            foreach ($this->request->getRankingRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rankingRewards"] = $array;
        }
        if ($this->request->getRewardCalculationIndex() !== null) {
            $json["rewardCalculationIndex"] = $this->request->getRewardCalculationIndex();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class DeleteClusterRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteClusterRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteClusterRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteClusterRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteClusterRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteClusterRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/cluster/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeClusterRankingScoresTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingScoresRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingScoresTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingScoresRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingScoresRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingScoresResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/cluster";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getClusterName() !== null) {
            $queryStrings["clusterName"] = $this->request->getClusterName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeClusterRankingScoresByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingScoresByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingScoresByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingScoresByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingScoresByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingScoresByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getClusterName() !== null) {
            $queryStrings["clusterName"] = $this->request->getClusterName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class PutClusterRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var PutClusterRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutClusterRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param PutClusterRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutClusterRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            PutClusterRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/cluster/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

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

class PutClusterRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PutClusterRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutClusterRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PutClusterRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutClusterRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PutClusterRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
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

class GetClusterRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/cluster/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetClusterRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DeleteClusterRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteClusterRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteClusterRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteClusterRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteClusterRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteClusterRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster/{rankingName}/{clusterName}/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class VerifyClusterRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var VerifyClusterRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyClusterRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyClusterRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyClusterRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyClusterRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster/{rankingName}/{clusterName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifyClusterRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyClusterRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyClusterRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyClusterRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyClusterRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyClusterRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/cluster/{rankingName}/{clusterName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifyClusterRankingScoreByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyClusterRankingScoreByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyClusterRankingScoreByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyClusterRankingScoreByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyClusterRankingScoreByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyClusterRankingScoreByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/cluster/score/verify";

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

class DescribeClusterRankingReceivedRewardsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingReceivedRewardsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingReceivedRewardsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingReceivedRewardsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingReceivedRewardsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingReceivedRewardsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/cluster/reward/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getClusterName() !== null) {
            $queryStrings["clusterName"] = $this->request->getClusterName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeClusterRankingReceivedRewardsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingReceivedRewardsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingReceivedRewardsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingReceivedRewardsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingReceivedRewardsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingReceivedRewardsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/cluster/reward/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
        }
        if ($this->request->getClusterName() !== null) {
            $queryStrings["clusterName"] = $this->request->getClusterName();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class CreateClusterRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var CreateClusterRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateClusterRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param CreateClusterRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateClusterRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            CreateClusterRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/cluster/reward/received/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
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

class CreateClusterRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateClusterRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateClusterRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateClusterRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateClusterRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateClusterRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/cluster/reward/received/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
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

class ReceiveClusterRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveClusterRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveClusterRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveClusterRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveClusterRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveClusterRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/cluster/reward/received/{rankingName}/{clusterName}/{season}/reward/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

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

class ReceiveClusterRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveClusterRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveClusterRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveClusterRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveClusterRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveClusterRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/cluster/reward/received/{rankingName}/{clusterName}/{season}/reward/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

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

class GetClusterRankingReceivedRewardTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingReceivedRewardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingReceivedRewardTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingReceivedRewardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingReceivedRewardRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingReceivedRewardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/cluster/reward/received/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetClusterRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/cluster/reward/received/{rankingName}/{clusterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DeleteClusterRankingReceivedRewardByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteClusterRankingReceivedRewardByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteClusterRankingReceivedRewardByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteClusterRankingReceivedRewardByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteClusterRankingReceivedRewardByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteClusterRankingReceivedRewardByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/cluster/reward/received/{rankingName}/{clusterName}/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class CreateClusterRankingReceivedRewardByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var CreateClusterRankingReceivedRewardByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateClusterRankingReceivedRewardByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param CreateClusterRankingReceivedRewardByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateClusterRankingReceivedRewardByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            CreateClusterRankingReceivedRewardByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/ranking/cluster/reward/receive";

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

class DescribeClusterRankingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/cluster/{rankingName}/{clusterName}/user/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeClusterRankingsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeClusterRankingsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeClusterRankingsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeClusterRankingsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeClusterRankingsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeClusterRankingsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/cluster/{rankingName}/{clusterName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetClusterRankingTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/cluster/{rankingName}/{clusterName}/user/me/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetClusterRankingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetClusterRankingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetClusterRankingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetClusterRankingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetClusterRankingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetClusterRankingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/cluster/{rankingName}/{clusterName}/user/{userId}/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{clusterName}", $this->request->getClusterName() === null|| strlen($this->request->getClusterName()) == 0 ? "null" : $this->request->getClusterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeSubscribeRankingModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/subscribe";

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

class GetSubscribeRankingModelTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeSubscribeRankingModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/subscribe";

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

class CreateSubscribeRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSubscribeRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSubscribeRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSubscribeRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSubscribeRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSubscribeRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/subscribe";

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
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class GetSubscribeRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class UpdateSubscribeRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSubscribeRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSubscribeRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSubscribeRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSubscribeRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSubscribeRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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
        if ($this->request->getSum() !== null) {
            $json["sum"] = $this->request->getSum();
        }
        if ($this->request->getOrderDirection() !== null) {
            $json["orderDirection"] = $this->request->getOrderDirection();
        }
        if ($this->request->getEntryPeriodEventId() !== null) {
            $json["entryPeriodEventId"] = $this->request->getEntryPeriodEventId();
        }
        if ($this->request->getAccessPeriodEventId() !== null) {
            $json["accessPeriodEventId"] = $this->request->getAccessPeriodEventId();
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

class DeleteSubscribeRankingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSubscribeRankingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSubscribeRankingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSubscribeRankingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSubscribeRankingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSubscribeRankingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class DescribeSubscribesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/score";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class DescribeSubscribesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/score";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class AddSubscribeTask extends Gs2RestSessionTask {

    /**
     * @var AddSubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddSubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param AddSubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddSubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            AddSubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class AddSubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddSubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddSubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddSubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddSubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddSubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeSubscribeRankingScoresTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingScoresRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingScoresTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingScoresRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingScoresRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingScoresResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class DescribeSubscribeRankingScoresByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingScoresByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingScoresByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingScoresByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingScoresByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingScoresByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRankingName() !== null) {
            $queryStrings["rankingName"] = $this->request->getRankingName();
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

class PutSubscribeRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var PutSubscribeRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutSubscribeRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param PutSubscribeRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutSubscribeRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            PutSubscribeRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

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

class PutSubscribeRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PutSubscribeRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutSubscribeRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PutSubscribeRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutSubscribeRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PutSubscribeRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

class GetSubscribeRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/score/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetSubscribeRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe/{rankingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DeleteSubscribeRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSubscribeRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSubscribeRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSubscribeRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSubscribeRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSubscribeRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe/{rankingName}/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class VerifySubscribeRankingScoreTask extends Gs2RestSessionTask {

    /**
     * @var VerifySubscribeRankingScoreRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySubscribeRankingScoreTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySubscribeRankingScoreRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySubscribeRankingScoreRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySubscribeRankingScoreResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe/{rankingName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifySubscribeRankingScoreByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifySubscribeRankingScoreByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySubscribeRankingScoreByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySubscribeRankingScoreByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySubscribeRankingScoreByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySubscribeRankingScoreByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/score/subscribe/{rankingName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getSeason() !== null) {
            $json["season"] = $this->request->getSeason();
        }
        if ($this->request->getScore() !== null) {
            $json["score"] = $this->request->getScore();
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

class VerifySubscribeRankingScoreByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifySubscribeRankingScoreByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySubscribeRankingScoreByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySubscribeRankingScoreByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySubscribeRankingScoreByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySubscribeRankingScoreByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/subscribe/score/verify";

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

class DescribeSubscribeRankingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/subscribe/{rankingName}/user/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class DescribeSubscribeRankingsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribeRankingsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribeRankingsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribeRankingsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribeRankingsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribeRankingsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/subscribe/{rankingName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
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

class GetSubscribeRankingTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/subscribe/{rankingName}/user/me/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
        }
        if ($this->request->getScorerUserId() !== null) {
            $queryStrings["scorerUserId"] = $this->request->getScorerUserId();
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

class GetSubscribeRankingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRankingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeRankingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRankingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRankingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeRankingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ranking/subscribe/{rankingName}/user/{userId}/rank";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getSeason() !== null) {
            $queryStrings["season"] = $this->request->getSeason();
        }
        if ($this->request->getScorerUserId() !== null) {
            $queryStrings["scorerUserId"] = $this->request->getScorerUserId();
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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

class DeleteSubscribeTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

class DeleteSubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "ranking2", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/subscribe/{rankingName}/target/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rankingName}", $this->request->getRankingName() === null|| strlen($this->request->getRankingName()) == 0 ? "null" : $this->request->getRankingName(), $url);
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

/**
 * GS2-Ranking2 API client
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/
 */
class Gs2Ranking2RestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Models
     *
     * @param DescribeGlobalRankingModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingmodels
     */
    public function describeGlobalRankingModelsAsync(
            DescribeGlobalRankingModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Models
     *
     * @param DescribeGlobalRankingModelsRequest $request
     * @return DescribeGlobalRankingModelsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingmodels
     */
    public function describeGlobalRankingModels (
            DescribeGlobalRankingModelsRequest $request
    ): DescribeGlobalRankingModelsResult {
        return $this->describeGlobalRankingModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Model
     *
     * @param GetGlobalRankingModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingmodel
     */
    public function getGlobalRankingModelAsync(
            GetGlobalRankingModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Model
     *
     * @param GetGlobalRankingModelRequest $request
     * @return GetGlobalRankingModelResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingmodel
     */
    public function getGlobalRankingModel (
            GetGlobalRankingModelRequest $request
    ): GetGlobalRankingModelResult {
        return $this->getGlobalRankingModelAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Model Masters
     *
     * @param DescribeGlobalRankingModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingmodelmasters
     */
    public function describeGlobalRankingModelMastersAsync(
            DescribeGlobalRankingModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Model Masters
     *
     * @param DescribeGlobalRankingModelMastersRequest $request
     * @return DescribeGlobalRankingModelMastersResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingmodelmasters
     */
    public function describeGlobalRankingModelMasters (
            DescribeGlobalRankingModelMastersRequest $request
    ): DescribeGlobalRankingModelMastersResult {
        return $this->describeGlobalRankingModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Global Ranking Model Master
     *
     * @param CreateGlobalRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingmodelmaster
     */
    public function createGlobalRankingModelMasterAsync(
            CreateGlobalRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGlobalRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Global Ranking Model Master
     *
     * @param CreateGlobalRankingModelMasterRequest $request
     * @return CreateGlobalRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingmodelmaster
     */
    public function createGlobalRankingModelMaster (
            CreateGlobalRankingModelMasterRequest $request
    ): CreateGlobalRankingModelMasterResult {
        return $this->createGlobalRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Model Master
     *
     * @param GetGlobalRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingmodelmaster
     */
    public function getGlobalRankingModelMasterAsync(
            GetGlobalRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Model Master
     *
     * @param GetGlobalRankingModelMasterRequest $request
     * @return GetGlobalRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingmodelmaster
     */
    public function getGlobalRankingModelMaster (
            GetGlobalRankingModelMasterRequest $request
    ): GetGlobalRankingModelMasterResult {
        return $this->getGlobalRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Global Ranking Model Master
     *
     * @param UpdateGlobalRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updateglobalrankingmodelmaster
     */
    public function updateGlobalRankingModelMasterAsync(
            UpdateGlobalRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGlobalRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Global Ranking Model Master
     *
     * @param UpdateGlobalRankingModelMasterRequest $request
     * @return UpdateGlobalRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updateglobalrankingmodelmaster
     */
    public function updateGlobalRankingModelMaster (
            UpdateGlobalRankingModelMasterRequest $request
    ): UpdateGlobalRankingModelMasterResult {
        return $this->updateGlobalRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Global Ranking Model Master
     *
     * @param DeleteGlobalRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingmodelmaster
     */
    public function deleteGlobalRankingModelMasterAsync(
            DeleteGlobalRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGlobalRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Global Ranking Model Master
     *
     * @param DeleteGlobalRankingModelMasterRequest $request
     * @return DeleteGlobalRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingmodelmaster
     */
    public function deleteGlobalRankingModelMaster (
            DeleteGlobalRankingModelMasterRequest $request
    ): DeleteGlobalRankingModelMasterResult {
        return $this->deleteGlobalRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Scores
     *
     * @param DescribeGlobalRankingScoresRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingscores
     */
    public function describeGlobalRankingScoresAsync(
            DescribeGlobalRankingScoresRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingScoresTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Scores
     *
     * @param DescribeGlobalRankingScoresRequest $request
     * @return DescribeGlobalRankingScoresResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingscores
     */
    public function describeGlobalRankingScores (
            DescribeGlobalRankingScoresRequest $request
    ): DescribeGlobalRankingScoresResult {
        return $this->describeGlobalRankingScoresAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Scores by User ID
     *
     * @param DescribeGlobalRankingScoresByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingscoresbyuserid
     */
    public function describeGlobalRankingScoresByUserIdAsync(
            DescribeGlobalRankingScoresByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingScoresByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Scores by User ID
     *
     * @param DescribeGlobalRankingScoresByUserIdRequest $request
     * @return DescribeGlobalRankingScoresByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingscoresbyuserid
     */
    public function describeGlobalRankingScoresByUserId (
            DescribeGlobalRankingScoresByUserIdRequest $request
    ): DescribeGlobalRankingScoresByUserIdResult {
        return $this->describeGlobalRankingScoresByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Register Global Ranking Score
     *
     * @param PutGlobalRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putglobalrankingscore
     */
    public function putGlobalRankingScoreAsync(
            PutGlobalRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutGlobalRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Global Ranking Score
     *
     * @param PutGlobalRankingScoreRequest $request
     * @return PutGlobalRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putglobalrankingscore
     */
    public function putGlobalRankingScore (
            PutGlobalRankingScoreRequest $request
    ): PutGlobalRankingScoreResult {
        return $this->putGlobalRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Register Global Ranking Score specifying User ID
     *
     * @param PutGlobalRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putglobalrankingscorebyuserid
     */
    public function putGlobalRankingScoreByUserIdAsync(
            PutGlobalRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutGlobalRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Global Ranking Score specifying User ID
     *
     * @param PutGlobalRankingScoreByUserIdRequest $request
     * @return PutGlobalRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putglobalrankingscorebyuserid
     */
    public function putGlobalRankingScoreByUserId (
            PutGlobalRankingScoreByUserIdRequest $request
    ): PutGlobalRankingScoreByUserIdResult {
        return $this->putGlobalRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Score
     *
     * @param GetGlobalRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingscore
     */
    public function getGlobalRankingScoreAsync(
            GetGlobalRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Score
     *
     * @param GetGlobalRankingScoreRequest $request
     * @return GetGlobalRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingscore
     */
    public function getGlobalRankingScore (
            GetGlobalRankingScoreRequest $request
    ): GetGlobalRankingScoreResult {
        return $this->getGlobalRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Score specifying User ID
     *
     * @param GetGlobalRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingscorebyuserid
     */
    public function getGlobalRankingScoreByUserIdAsync(
            GetGlobalRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Score specifying User ID
     *
     * @param GetGlobalRankingScoreByUserIdRequest $request
     * @return GetGlobalRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingscorebyuserid
     */
    public function getGlobalRankingScoreByUserId (
            GetGlobalRankingScoreByUserIdRequest $request
    ): GetGlobalRankingScoreByUserIdResult {
        return $this->getGlobalRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Global Ranking Score specifying User ID
     *
     * @param DeleteGlobalRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingscorebyuserid
     */
    public function deleteGlobalRankingScoreByUserIdAsync(
            DeleteGlobalRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGlobalRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Global Ranking Score specifying User ID
     *
     * @param DeleteGlobalRankingScoreByUserIdRequest $request
     * @return DeleteGlobalRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingscorebyuserid
     */
    public function deleteGlobalRankingScoreByUserId (
            DeleteGlobalRankingScoreByUserIdRequest $request
    ): DeleteGlobalRankingScoreByUserIdResult {
        return $this->deleteGlobalRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the global ranking
     *
     * @param VerifyGlobalRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyglobalrankingscore
     */
    public function verifyGlobalRankingScoreAsync(
            VerifyGlobalRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGlobalRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the global ranking
     *
     * @param VerifyGlobalRankingScoreRequest $request
     * @return VerifyGlobalRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyglobalrankingscore
     */
    public function verifyGlobalRankingScore (
            VerifyGlobalRankingScoreRequest $request
    ): VerifyGlobalRankingScoreResult {
        return $this->verifyGlobalRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the global ranking specifying User ID
     *
     * @param VerifyGlobalRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyglobalrankingscorebyuserid
     */
    public function verifyGlobalRankingScoreByUserIdAsync(
            VerifyGlobalRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGlobalRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the global ranking specifying User ID
     *
     * @param VerifyGlobalRankingScoreByUserIdRequest $request
     * @return VerifyGlobalRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyglobalrankingscorebyuserid
     */
    public function verifyGlobalRankingScoreByUserId (
            VerifyGlobalRankingScoreByUserIdRequest $request
    ): VerifyGlobalRankingScoreByUserIdResult {
        return $this->verifyGlobalRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the verification of the global ranking score as a verification action
     *
     * @param VerifyGlobalRankingScoreByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyglobalrankingscorebyuserid
     */
    public function verifyGlobalRankingScoreByStampTaskAsync(
            VerifyGlobalRankingScoreByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyGlobalRankingScoreByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the verification of the global ranking score as a verification action
     *
     * @param VerifyGlobalRankingScoreByStampTaskRequest $request
     * @return VerifyGlobalRankingScoreByStampTaskResult
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyglobalrankingscorebyuserid
     */
    public function verifyGlobalRankingScoreByStampTask (
            VerifyGlobalRankingScoreByStampTaskRequest $request
    ): VerifyGlobalRankingScoreByStampTaskResult {
        return $this->verifyGlobalRankingScoreByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Rewards Received
     *
     * @param DescribeGlobalRankingReceivedRewardsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingreceivedrewards
     */
    public function describeGlobalRankingReceivedRewardsAsync(
            DescribeGlobalRankingReceivedRewardsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingReceivedRewardsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Rewards Received
     *
     * @param DescribeGlobalRankingReceivedRewardsRequest $request
     * @return DescribeGlobalRankingReceivedRewardsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingreceivedrewards
     */
    public function describeGlobalRankingReceivedRewards (
            DescribeGlobalRankingReceivedRewardsRequest $request
    ): DescribeGlobalRankingReceivedRewardsResult {
        return $this->describeGlobalRankingReceivedRewardsAsync(
            $request
        )->wait();
    }

    /**
     * List Global Ranking Rewards Received by User ID
     *
     * @param DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingreceivedrewardsbyuserid
     */
    public function describeGlobalRankingReceivedRewardsByUserIdAsync(
            DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingReceivedRewardsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Ranking Rewards Received by User ID
     *
     * @param DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
     * @return DescribeGlobalRankingReceivedRewardsByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingreceivedrewardsbyuserid
     */
    public function describeGlobalRankingReceivedRewardsByUserId (
            DescribeGlobalRankingReceivedRewardsByUserIdRequest $request
    ): DescribeGlobalRankingReceivedRewardsByUserIdResult {
        return $this->describeGlobalRankingReceivedRewardsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Record global ranking reward receipt history
     *
     * @param CreateGlobalRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingreceivedreward
     */
    public function createGlobalRankingReceivedRewardAsync(
            CreateGlobalRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGlobalRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Record global ranking reward receipt history
     *
     * @param CreateGlobalRankingReceivedRewardRequest $request
     * @return CreateGlobalRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingreceivedreward
     */
    public function createGlobalRankingReceivedReward (
            CreateGlobalRankingReceivedRewardRequest $request
    ): CreateGlobalRankingReceivedRewardResult {
        return $this->createGlobalRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Record global ranking reward receipt history specifying User ID
     *
     * @param CreateGlobalRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingreceivedrewardbyuserid
     */
    public function createGlobalRankingReceivedRewardByUserIdAsync(
            CreateGlobalRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGlobalRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Record global ranking reward receipt history specifying User ID
     *
     * @param CreateGlobalRankingReceivedRewardByUserIdRequest $request
     * @return CreateGlobalRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingreceivedrewardbyuserid
     */
    public function createGlobalRankingReceivedRewardByUserId (
            CreateGlobalRankingReceivedRewardByUserIdRequest $request
    ): CreateGlobalRankingReceivedRewardByUserIdResult {
        return $this->createGlobalRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Receive Global Ranking Reward
     *
     * @param ReceiveGlobalRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveglobalrankingreceivedreward
     */
    public function receiveGlobalRankingReceivedRewardAsync(
            ReceiveGlobalRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveGlobalRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Receive Global Ranking Reward
     *
     * @param ReceiveGlobalRankingReceivedRewardRequest $request
     * @return ReceiveGlobalRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveglobalrankingreceivedreward
     */
    public function receiveGlobalRankingReceivedReward (
            ReceiveGlobalRankingReceivedRewardRequest $request
    ): ReceiveGlobalRankingReceivedRewardResult {
        return $this->receiveGlobalRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Receive Global Ranking Reward specifying User ID
     *
     * @param ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveglobalrankingreceivedrewardbyuserid
     */
    public function receiveGlobalRankingReceivedRewardByUserIdAsync(
            ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveGlobalRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Receive Global Ranking Reward specifying User ID
     *
     * @param ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
     * @return ReceiveGlobalRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveglobalrankingreceivedrewardbyuserid
     */
    public function receiveGlobalRankingReceivedRewardByUserId (
            ReceiveGlobalRankingReceivedRewardByUserIdRequest $request
    ): ReceiveGlobalRankingReceivedRewardByUserIdResult {
        return $this->receiveGlobalRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Reward Received History
     *
     * @param GetGlobalRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingreceivedreward
     */
    public function getGlobalRankingReceivedRewardAsync(
            GetGlobalRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Reward Received History
     *
     * @param GetGlobalRankingReceivedRewardRequest $request
     * @return GetGlobalRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingreceivedreward
     */
    public function getGlobalRankingReceivedReward (
            GetGlobalRankingReceivedRewardRequest $request
    ): GetGlobalRankingReceivedRewardResult {
        return $this->getGlobalRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking Reward Received History specifying User ID
     *
     * @param GetGlobalRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingreceivedrewardbyuserid
     */
    public function getGlobalRankingReceivedRewardByUserIdAsync(
            GetGlobalRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking Reward Received History specifying User ID
     *
     * @param GetGlobalRankingReceivedRewardByUserIdRequest $request
     * @return GetGlobalRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingreceivedrewardbyuserid
     */
    public function getGlobalRankingReceivedRewardByUserId (
            GetGlobalRankingReceivedRewardByUserIdRequest $request
    ): GetGlobalRankingReceivedRewardByUserIdResult {
        return $this->getGlobalRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Global Ranking Reward Received History specifying User ID
     *
     * @param DeleteGlobalRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingreceivedrewardbyuserid
     */
    public function deleteGlobalRankingReceivedRewardByUserIdAsync(
            DeleteGlobalRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGlobalRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Global Ranking Reward Received History specifying User ID
     *
     * @param DeleteGlobalRankingReceivedRewardByUserIdRequest $request
     * @return DeleteGlobalRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingreceivedrewardbyuserid
     */
    public function deleteGlobalRankingReceivedRewardByUserId (
            DeleteGlobalRankingReceivedRewardByUserIdRequest $request
    ): DeleteGlobalRankingReceivedRewardByUserIdResult {
        return $this->deleteGlobalRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute record global ranking reward receipt history as consume action
     *
     * @param CreateGlobalRankingReceivedRewardByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createglobalrankingreceivedrewardbyuserid
     */
    public function createGlobalRankingReceivedRewardByStampTaskAsync(
            CreateGlobalRankingReceivedRewardByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGlobalRankingReceivedRewardByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute record global ranking reward receipt history as consume action
     *
     * @param CreateGlobalRankingReceivedRewardByStampTaskRequest $request
     * @return CreateGlobalRankingReceivedRewardByStampTaskResult
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createglobalrankingreceivedrewardbyuserid
     */
    public function createGlobalRankingReceivedRewardByStampTask (
            CreateGlobalRankingReceivedRewardByStampTaskRequest $request
    ): CreateGlobalRankingReceivedRewardByStampTaskResult {
        return $this->createGlobalRankingReceivedRewardByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Global Rankings
     *
     * @param DescribeGlobalRankingsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankings
     */
    public function describeGlobalRankingsAsync(
            DescribeGlobalRankingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Rankings
     *
     * @param DescribeGlobalRankingsRequest $request
     * @return DescribeGlobalRankingsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankings
     */
    public function describeGlobalRankings (
            DescribeGlobalRankingsRequest $request
    ): DescribeGlobalRankingsResult {
        return $this->describeGlobalRankingsAsync(
            $request
        )->wait();
    }

    /**
     * List Global Rankings by User ID
     *
     * @param DescribeGlobalRankingsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingsbyuserid
     */
    public function describeGlobalRankingsByUserIdAsync(
            DescribeGlobalRankingsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalRankingsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Global Rankings by User ID
     *
     * @param DescribeGlobalRankingsByUserIdRequest $request
     * @return DescribeGlobalRankingsByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeglobalrankingsbyuserid
     */
    public function describeGlobalRankingsByUserId (
            DescribeGlobalRankingsByUserIdRequest $request
    ): DescribeGlobalRankingsByUserIdResult {
        return $this->describeGlobalRankingsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking
     *
     * @param GetGlobalRankingRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalranking
     */
    public function getGlobalRankingAsync(
            GetGlobalRankingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking
     *
     * @param GetGlobalRankingRequest $request
     * @return GetGlobalRankingResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalranking
     */
    public function getGlobalRanking (
            GetGlobalRankingRequest $request
    ): GetGlobalRankingResult {
        return $this->getGlobalRankingAsync(
            $request
        )->wait();
    }

    /**
     * Get Global Ranking by specifying the user ID
     *
     * @param GetGlobalRankingByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingbyuserid
     */
    public function getGlobalRankingByUserIdAsync(
            GetGlobalRankingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalRankingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Global Ranking by specifying the user ID
     *
     * @param GetGlobalRankingByUserIdRequest $request
     * @return GetGlobalRankingByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getglobalrankingbyuserid
     */
    public function getGlobalRankingByUserId (
            GetGlobalRankingByUserIdRequest $request
    ): GetGlobalRankingByUserIdResult {
        return $this->getGlobalRankingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Models
     *
     * @param DescribeClusterRankingModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingmodels
     */
    public function describeClusterRankingModelsAsync(
            DescribeClusterRankingModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Models
     *
     * @param DescribeClusterRankingModelsRequest $request
     * @return DescribeClusterRankingModelsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingmodels
     */
    public function describeClusterRankingModels (
            DescribeClusterRankingModelsRequest $request
    ): DescribeClusterRankingModelsResult {
        return $this->describeClusterRankingModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Model
     *
     * @param GetClusterRankingModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingmodel
     */
    public function getClusterRankingModelAsync(
            GetClusterRankingModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Model
     *
     * @param GetClusterRankingModelRequest $request
     * @return GetClusterRankingModelResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingmodel
     */
    public function getClusterRankingModel (
            GetClusterRankingModelRequest $request
    ): GetClusterRankingModelResult {
        return $this->getClusterRankingModelAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Model Masters
     *
     * @param DescribeClusterRankingModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingmodelmasters
     */
    public function describeClusterRankingModelMastersAsync(
            DescribeClusterRankingModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Model Masters
     *
     * @param DescribeClusterRankingModelMastersRequest $request
     * @return DescribeClusterRankingModelMastersResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingmodelmasters
     */
    public function describeClusterRankingModelMasters (
            DescribeClusterRankingModelMastersRequest $request
    ): DescribeClusterRankingModelMastersResult {
        return $this->describeClusterRankingModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Cluster Ranking Model Master
     *
     * @param CreateClusterRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingmodelmaster
     */
    public function createClusterRankingModelMasterAsync(
            CreateClusterRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateClusterRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Cluster Ranking Model Master
     *
     * @param CreateClusterRankingModelMasterRequest $request
     * @return CreateClusterRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingmodelmaster
     */
    public function createClusterRankingModelMaster (
            CreateClusterRankingModelMasterRequest $request
    ): CreateClusterRankingModelMasterResult {
        return $this->createClusterRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Model Master
     *
     * @param GetClusterRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingmodelmaster
     */
    public function getClusterRankingModelMasterAsync(
            GetClusterRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Model Master
     *
     * @param GetClusterRankingModelMasterRequest $request
     * @return GetClusterRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingmodelmaster
     */
    public function getClusterRankingModelMaster (
            GetClusterRankingModelMasterRequest $request
    ): GetClusterRankingModelMasterResult {
        return $this->getClusterRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Cluster Ranking Model Master
     *
     * @param UpdateClusterRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updateclusterrankingmodelmaster
     */
    public function updateClusterRankingModelMasterAsync(
            UpdateClusterRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateClusterRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Cluster Ranking Model Master
     *
     * @param UpdateClusterRankingModelMasterRequest $request
     * @return UpdateClusterRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updateclusterrankingmodelmaster
     */
    public function updateClusterRankingModelMaster (
            UpdateClusterRankingModelMasterRequest $request
    ): UpdateClusterRankingModelMasterResult {
        return $this->updateClusterRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Cluster Ranking Model Master
     *
     * @param DeleteClusterRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingmodelmaster
     */
    public function deleteClusterRankingModelMasterAsync(
            DeleteClusterRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteClusterRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Cluster Ranking Model Master
     *
     * @param DeleteClusterRankingModelMasterRequest $request
     * @return DeleteClusterRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingmodelmaster
     */
    public function deleteClusterRankingModelMaster (
            DeleteClusterRankingModelMasterRequest $request
    ): DeleteClusterRankingModelMasterResult {
        return $this->deleteClusterRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Scores
     *
     * @param DescribeClusterRankingScoresRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingscores
     */
    public function describeClusterRankingScoresAsync(
            DescribeClusterRankingScoresRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingScoresTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Scores
     *
     * @param DescribeClusterRankingScoresRequest $request
     * @return DescribeClusterRankingScoresResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingscores
     */
    public function describeClusterRankingScores (
            DescribeClusterRankingScoresRequest $request
    ): DescribeClusterRankingScoresResult {
        return $this->describeClusterRankingScoresAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Scores by User ID
     *
     * @param DescribeClusterRankingScoresByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingscoresbyuserid
     */
    public function describeClusterRankingScoresByUserIdAsync(
            DescribeClusterRankingScoresByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingScoresByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Scores by User ID
     *
     * @param DescribeClusterRankingScoresByUserIdRequest $request
     * @return DescribeClusterRankingScoresByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingscoresbyuserid
     */
    public function describeClusterRankingScoresByUserId (
            DescribeClusterRankingScoresByUserIdRequest $request
    ): DescribeClusterRankingScoresByUserIdResult {
        return $this->describeClusterRankingScoresByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Register Cluster Ranking Score
     *
     * @param PutClusterRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putclusterrankingscore
     */
    public function putClusterRankingScoreAsync(
            PutClusterRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutClusterRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Cluster Ranking Score
     *
     * @param PutClusterRankingScoreRequest $request
     * @return PutClusterRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putclusterrankingscore
     */
    public function putClusterRankingScore (
            PutClusterRankingScoreRequest $request
    ): PutClusterRankingScoreResult {
        return $this->putClusterRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Register Cluster Ranking Score specifying User ID
     *
     * @param PutClusterRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putclusterrankingscorebyuserid
     */
    public function putClusterRankingScoreByUserIdAsync(
            PutClusterRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutClusterRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Cluster Ranking Score specifying User ID
     *
     * @param PutClusterRankingScoreByUserIdRequest $request
     * @return PutClusterRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putclusterrankingscorebyuserid
     */
    public function putClusterRankingScoreByUserId (
            PutClusterRankingScoreByUserIdRequest $request
    ): PutClusterRankingScoreByUserIdResult {
        return $this->putClusterRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Score
     *
     * @param GetClusterRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingscore
     */
    public function getClusterRankingScoreAsync(
            GetClusterRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Score
     *
     * @param GetClusterRankingScoreRequest $request
     * @return GetClusterRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingscore
     */
    public function getClusterRankingScore (
            GetClusterRankingScoreRequest $request
    ): GetClusterRankingScoreResult {
        return $this->getClusterRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Score specifying User ID
     *
     * @param GetClusterRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingscorebyuserid
     */
    public function getClusterRankingScoreByUserIdAsync(
            GetClusterRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Score specifying User ID
     *
     * @param GetClusterRankingScoreByUserIdRequest $request
     * @return GetClusterRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingscorebyuserid
     */
    public function getClusterRankingScoreByUserId (
            GetClusterRankingScoreByUserIdRequest $request
    ): GetClusterRankingScoreByUserIdResult {
        return $this->getClusterRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Cluster Ranking Score specifying User ID
     *
     * @param DeleteClusterRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingscorebyuserid
     */
    public function deleteClusterRankingScoreByUserIdAsync(
            DeleteClusterRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteClusterRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Cluster Ranking Score specifying User ID
     *
     * @param DeleteClusterRankingScoreByUserIdRequest $request
     * @return DeleteClusterRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingscorebyuserid
     */
    public function deleteClusterRankingScoreByUserId (
            DeleteClusterRankingScoreByUserIdRequest $request
    ): DeleteClusterRankingScoreByUserIdResult {
        return $this->deleteClusterRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the cluster ranking
     *
     * @param VerifyClusterRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyclusterrankingscore
     */
    public function verifyClusterRankingScoreAsync(
            VerifyClusterRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyClusterRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the cluster ranking
     *
     * @param VerifyClusterRankingScoreRequest $request
     * @return VerifyClusterRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyclusterrankingscore
     */
    public function verifyClusterRankingScore (
            VerifyClusterRankingScoreRequest $request
    ): VerifyClusterRankingScoreResult {
        return $this->verifyClusterRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the cluster ranking specifying User ID
     *
     * @param VerifyClusterRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyclusterrankingscorebyuserid
     */
    public function verifyClusterRankingScoreByUserIdAsync(
            VerifyClusterRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyClusterRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the cluster ranking specifying User ID
     *
     * @param VerifyClusterRankingScoreByUserIdRequest $request
     * @return VerifyClusterRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyclusterrankingscorebyuserid
     */
    public function verifyClusterRankingScoreByUserId (
            VerifyClusterRankingScoreByUserIdRequest $request
    ): VerifyClusterRankingScoreByUserIdResult {
        return $this->verifyClusterRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the verification of the cluster ranking score as a verification action
     *
     * @param VerifyClusterRankingScoreByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyclusterrankingscorebyuserid
     */
    public function verifyClusterRankingScoreByStampTaskAsync(
            VerifyClusterRankingScoreByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyClusterRankingScoreByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the verification of the cluster ranking score as a verification action
     *
     * @param VerifyClusterRankingScoreByStampTaskRequest $request
     * @return VerifyClusterRankingScoreByStampTaskResult
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyclusterrankingscorebyuserid
     */
    public function verifyClusterRankingScoreByStampTask (
            VerifyClusterRankingScoreByStampTaskRequest $request
    ): VerifyClusterRankingScoreByStampTaskResult {
        return $this->verifyClusterRankingScoreByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Rewards Received
     *
     * @param DescribeClusterRankingReceivedRewardsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingreceivedrewards
     */
    public function describeClusterRankingReceivedRewardsAsync(
            DescribeClusterRankingReceivedRewardsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingReceivedRewardsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Rewards Received
     *
     * @param DescribeClusterRankingReceivedRewardsRequest $request
     * @return DescribeClusterRankingReceivedRewardsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingreceivedrewards
     */
    public function describeClusterRankingReceivedRewards (
            DescribeClusterRankingReceivedRewardsRequest $request
    ): DescribeClusterRankingReceivedRewardsResult {
        return $this->describeClusterRankingReceivedRewardsAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Ranking Rewards Received by specifying a User ID
     *
     * @param DescribeClusterRankingReceivedRewardsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingreceivedrewardsbyuserid
     */
    public function describeClusterRankingReceivedRewardsByUserIdAsync(
            DescribeClusterRankingReceivedRewardsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingReceivedRewardsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Ranking Rewards Received by specifying a User ID
     *
     * @param DescribeClusterRankingReceivedRewardsByUserIdRequest $request
     * @return DescribeClusterRankingReceivedRewardsByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingreceivedrewardsbyuserid
     */
    public function describeClusterRankingReceivedRewardsByUserId (
            DescribeClusterRankingReceivedRewardsByUserIdRequest $request
    ): DescribeClusterRankingReceivedRewardsByUserIdResult {
        return $this->describeClusterRankingReceivedRewardsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Record Cluster Ranking Reward Received History
     *
     * @param CreateClusterRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingreceivedreward
     */
    public function createClusterRankingReceivedRewardAsync(
            CreateClusterRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateClusterRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Record Cluster Ranking Reward Received History
     *
     * @param CreateClusterRankingReceivedRewardRequest $request
     * @return CreateClusterRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingreceivedreward
     */
    public function createClusterRankingReceivedReward (
            CreateClusterRankingReceivedRewardRequest $request
    ): CreateClusterRankingReceivedRewardResult {
        return $this->createClusterRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Record Cluster Ranking Reward Received History by User ID
     *
     * @param CreateClusterRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingreceivedrewardbyuserid
     */
    public function createClusterRankingReceivedRewardByUserIdAsync(
            CreateClusterRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateClusterRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Record Cluster Ranking Reward Received History by User ID
     *
     * @param CreateClusterRankingReceivedRewardByUserIdRequest $request
     * @return CreateClusterRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createclusterrankingreceivedrewardbyuserid
     */
    public function createClusterRankingReceivedRewardByUserId (
            CreateClusterRankingReceivedRewardByUserIdRequest $request
    ): CreateClusterRankingReceivedRewardByUserIdResult {
        return $this->createClusterRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Receive Cluster Ranking Reward
     *
     * @param ReceiveClusterRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveclusterrankingreceivedreward
     */
    public function receiveClusterRankingReceivedRewardAsync(
            ReceiveClusterRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveClusterRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Receive Cluster Ranking Reward
     *
     * @param ReceiveClusterRankingReceivedRewardRequest $request
     * @return ReceiveClusterRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveclusterrankingreceivedreward
     */
    public function receiveClusterRankingReceivedReward (
            ReceiveClusterRankingReceivedRewardRequest $request
    ): ReceiveClusterRankingReceivedRewardResult {
        return $this->receiveClusterRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Receive Cluster Ranking Reward specifying User ID
     *
     * @param ReceiveClusterRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveclusterrankingreceivedrewardbyuserid
     */
    public function receiveClusterRankingReceivedRewardByUserIdAsync(
            ReceiveClusterRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveClusterRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Receive Cluster Ranking Reward specifying User ID
     *
     * @param ReceiveClusterRankingReceivedRewardByUserIdRequest $request
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveclusterrankingreceivedrewardbyuserid
     */
    public function receiveClusterRankingReceivedRewardByUserId (
            ReceiveClusterRankingReceivedRewardByUserIdRequest $request
    ): ReceiveClusterRankingReceivedRewardByUserIdResult {
        return $this->receiveClusterRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Reward Received History
     *
     * @param GetClusterRankingReceivedRewardRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingreceivedreward
     */
    public function getClusterRankingReceivedRewardAsync(
            GetClusterRankingReceivedRewardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingReceivedRewardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Reward Received History
     *
     * @param GetClusterRankingReceivedRewardRequest $request
     * @return GetClusterRankingReceivedRewardResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingreceivedreward
     */
    public function getClusterRankingReceivedReward (
            GetClusterRankingReceivedRewardRequest $request
    ): GetClusterRankingReceivedRewardResult {
        return $this->getClusterRankingReceivedRewardAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking Reward Received History specifying User ID
     *
     * @param GetClusterRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingreceivedrewardbyuserid
     */
    public function getClusterRankingReceivedRewardByUserIdAsync(
            GetClusterRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking Reward Received History specifying User ID
     *
     * @param GetClusterRankingReceivedRewardByUserIdRequest $request
     * @return GetClusterRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingreceivedrewardbyuserid
     */
    public function getClusterRankingReceivedRewardByUserId (
            GetClusterRankingReceivedRewardByUserIdRequest $request
    ): GetClusterRankingReceivedRewardByUserIdResult {
        return $this->getClusterRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Cluster Ranking Reward Received History specifying User ID
     *
     * @param DeleteClusterRankingReceivedRewardByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingreceivedrewardbyuserid
     */
    public function deleteClusterRankingReceivedRewardByUserIdAsync(
            DeleteClusterRankingReceivedRewardByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteClusterRankingReceivedRewardByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Cluster Ranking Reward Received History specifying User ID
     *
     * @param DeleteClusterRankingReceivedRewardByUserIdRequest $request
     * @return DeleteClusterRankingReceivedRewardByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteclusterrankingreceivedrewardbyuserid
     */
    public function deleteClusterRankingReceivedRewardByUserId (
            DeleteClusterRankingReceivedRewardByUserIdRequest $request
    ): DeleteClusterRankingReceivedRewardByUserIdResult {
        return $this->deleteClusterRankingReceivedRewardByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute record history of cluster ranking rewards received as consume action
     *
     * @param CreateClusterRankingReceivedRewardByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createclusterrankingreceivedrewardbyuserid
     */
    public function createClusterRankingReceivedRewardByStampTaskAsync(
            CreateClusterRankingReceivedRewardByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateClusterRankingReceivedRewardByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute record history of cluster ranking rewards received as consume action
     *
     * @param CreateClusterRankingReceivedRewardByStampTaskRequest $request
     * @return CreateClusterRankingReceivedRewardByStampTaskResult
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createclusterrankingreceivedrewardbyuserid
     */
    public function createClusterRankingReceivedRewardByStampTask (
            CreateClusterRankingReceivedRewardByStampTaskRequest $request
    ): CreateClusterRankingReceivedRewardByStampTaskResult {
        return $this->createClusterRankingReceivedRewardByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Rankings
     *
     * @param DescribeClusterRankingsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankings
     */
    public function describeClusterRankingsAsync(
            DescribeClusterRankingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Rankings
     *
     * @param DescribeClusterRankingsRequest $request
     * @return DescribeClusterRankingsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankings
     */
    public function describeClusterRankings (
            DescribeClusterRankingsRequest $request
    ): DescribeClusterRankingsResult {
        return $this->describeClusterRankingsAsync(
            $request
        )->wait();
    }

    /**
     * List Cluster Rankings by User ID
     *
     * @param DescribeClusterRankingsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingsbyuserid
     */
    public function describeClusterRankingsByUserIdAsync(
            DescribeClusterRankingsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeClusterRankingsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Cluster Rankings by User ID
     *
     * @param DescribeClusterRankingsByUserIdRequest $request
     * @return DescribeClusterRankingsByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingsbyuserid
     */
    public function describeClusterRankingsByUserId (
            DescribeClusterRankingsByUserIdRequest $request
    ): DescribeClusterRankingsByUserIdResult {
        return $this->describeClusterRankingsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking
     *
     * @param GetClusterRankingRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterranking
     */
    public function getClusterRankingAsync(
            GetClusterRankingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking
     *
     * @param GetClusterRankingRequest $request
     * @return GetClusterRankingResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterranking
     */
    public function getClusterRanking (
            GetClusterRankingRequest $request
    ): GetClusterRankingResult {
        return $this->getClusterRankingAsync(
            $request
        )->wait();
    }

    /**
     * Get Cluster Ranking by specifying the user ID
     *
     * @param GetClusterRankingByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingbyuserid
     */
    public function getClusterRankingByUserIdAsync(
            GetClusterRankingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetClusterRankingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Cluster Ranking by specifying the user ID
     *
     * @param GetClusterRankingByUserIdRequest $request
     * @return GetClusterRankingByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingbyuserid
     */
    public function getClusterRankingByUserId (
            GetClusterRankingByUserIdRequest $request
    ): GetClusterRankingByUserIdResult {
        return $this->getClusterRankingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Ranking Models
     *
     * @param DescribeSubscribeRankingModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingmodels
     */
    public function describeSubscribeRankingModelsAsync(
            DescribeSubscribeRankingModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Ranking Models
     *
     * @param DescribeSubscribeRankingModelsRequest $request
     * @return DescribeSubscribeRankingModelsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingmodels
     */
    public function describeSubscribeRankingModels (
            DescribeSubscribeRankingModelsRequest $request
    ): DescribeSubscribeRankingModelsResult {
        return $this->describeSubscribeRankingModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking Model
     *
     * @param GetSubscribeRankingModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingmodel
     */
    public function getSubscribeRankingModelAsync(
            GetSubscribeRankingModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking Model
     *
     * @param GetSubscribeRankingModelRequest $request
     * @return GetSubscribeRankingModelResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingmodel
     */
    public function getSubscribeRankingModel (
            GetSubscribeRankingModelRequest $request
    ): GetSubscribeRankingModelResult {
        return $this->getSubscribeRankingModelAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Ranking Model Masters
     *
     * @param DescribeSubscribeRankingModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingmodelmasters
     */
    public function describeSubscribeRankingModelMastersAsync(
            DescribeSubscribeRankingModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Ranking Model Masters
     *
     * @param DescribeSubscribeRankingModelMastersRequest $request
     * @return DescribeSubscribeRankingModelMastersResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingmodelmasters
     */
    public function describeSubscribeRankingModelMasters (
            DescribeSubscribeRankingModelMastersRequest $request
    ): DescribeSubscribeRankingModelMastersResult {
        return $this->describeSubscribeRankingModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Subscribe Ranking Model Master
     *
     * @param CreateSubscribeRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createsubscriberankingmodelmaster
     */
    public function createSubscribeRankingModelMasterAsync(
            CreateSubscribeRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSubscribeRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Subscribe Ranking Model Master
     *
     * @param CreateSubscribeRankingModelMasterRequest $request
     * @return CreateSubscribeRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createsubscriberankingmodelmaster
     */
    public function createSubscribeRankingModelMaster (
            CreateSubscribeRankingModelMasterRequest $request
    ): CreateSubscribeRankingModelMasterResult {
        return $this->createSubscribeRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking Model Master
     *
     * @param GetSubscribeRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingmodelmaster
     */
    public function getSubscribeRankingModelMasterAsync(
            GetSubscribeRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking Model Master
     *
     * @param GetSubscribeRankingModelMasterRequest $request
     * @return GetSubscribeRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingmodelmaster
     */
    public function getSubscribeRankingModelMaster (
            GetSubscribeRankingModelMasterRequest $request
    ): GetSubscribeRankingModelMasterResult {
        return $this->getSubscribeRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Subscribe Ranking Model Master
     *
     * @param UpdateSubscribeRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatesubscriberankingmodelmaster
     */
    public function updateSubscribeRankingModelMasterAsync(
            UpdateSubscribeRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSubscribeRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Subscribe Ranking Model Master
     *
     * @param UpdateSubscribeRankingModelMasterRequest $request
     * @return UpdateSubscribeRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatesubscriberankingmodelmaster
     */
    public function updateSubscribeRankingModelMaster (
            UpdateSubscribeRankingModelMasterRequest $request
    ): UpdateSubscribeRankingModelMasterResult {
        return $this->updateSubscribeRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Subscribe Ranking Model Master
     *
     * @param DeleteSubscribeRankingModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscriberankingmodelmaster
     */
    public function deleteSubscribeRankingModelMasterAsync(
            DeleteSubscribeRankingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSubscribeRankingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Subscribe Ranking Model Master
     *
     * @param DeleteSubscribeRankingModelMasterRequest $request
     * @return DeleteSubscribeRankingModelMasterResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscriberankingmodelmaster
     */
    public function deleteSubscribeRankingModelMaster (
            DeleteSubscribeRankingModelMasterRequest $request
    ): DeleteSubscribeRankingModelMasterResult {
        return $this->deleteSubscribeRankingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribed User Information
     *
     * @param DescribeSubscribesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscribes
     */
    public function describeSubscribesAsync(
            DescribeSubscribesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribed User Information
     *
     * @param DescribeSubscribesRequest $request
     * @return DescribeSubscribesResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscribes
     */
    public function describeSubscribes (
            DescribeSubscribesRequest $request
    ): DescribeSubscribesResult {
        return $this->describeSubscribesAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribed User Information by User ID
     *
     * @param DescribeSubscribesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscribesbyuserid
     */
    public function describeSubscribesByUserIdAsync(
            DescribeSubscribesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribed User Information by User ID
     *
     * @param DescribeSubscribesByUserIdRequest $request
     * @return DescribeSubscribesByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscribesbyuserid
     */
    public function describeSubscribesByUserId (
            DescribeSubscribesByUserIdRequest $request
    ): DescribeSubscribesByUserIdResult {
        return $this->describeSubscribesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Register Subscribe Target User ID
     *
     * @param AddSubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#addsubscribe
     */
    public function addSubscribeAsync(
            AddSubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddSubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Subscribe Target User ID
     *
     * @param AddSubscribeRequest $request
     * @return AddSubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#addsubscribe
     */
    public function addSubscribe (
            AddSubscribeRequest $request
    ): AddSubscribeResult {
        return $this->addSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Register Subscribe Target User ID specifying User ID
     *
     * @param AddSubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#addsubscribebyuserid
     */
    public function addSubscribeByUserIdAsync(
            AddSubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddSubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Subscribe Target User ID specifying User ID
     *
     * @param AddSubscribeByUserIdRequest $request
     * @return AddSubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#addsubscribebyuserid
     */
    public function addSubscribeByUserId (
            AddSubscribeByUserIdRequest $request
    ): AddSubscribeByUserIdResult {
        return $this->addSubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Ranking Scores
     *
     * @param DescribeSubscribeRankingScoresRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingscores
     */
    public function describeSubscribeRankingScoresAsync(
            DescribeSubscribeRankingScoresRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingScoresTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Ranking Scores
     *
     * @param DescribeSubscribeRankingScoresRequest $request
     * @return DescribeSubscribeRankingScoresResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingscores
     */
    public function describeSubscribeRankingScores (
            DescribeSubscribeRankingScoresRequest $request
    ): DescribeSubscribeRankingScoresResult {
        return $this->describeSubscribeRankingScoresAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Ranking Scores by specifying a User ID
     *
     * @param DescribeSubscribeRankingScoresByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingscoresbyuserid
     */
    public function describeSubscribeRankingScoresByUserIdAsync(
            DescribeSubscribeRankingScoresByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingScoresByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Ranking Scores by specifying a User ID
     *
     * @param DescribeSubscribeRankingScoresByUserIdRequest $request
     * @return DescribeSubscribeRankingScoresByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingscoresbyuserid
     */
    public function describeSubscribeRankingScoresByUserId (
            DescribeSubscribeRankingScoresByUserIdRequest $request
    ): DescribeSubscribeRankingScoresByUserIdResult {
        return $this->describeSubscribeRankingScoresByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Register Subscribe Ranking Score
     *
     * @param PutSubscribeRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscore
     */
    public function putSubscribeRankingScoreAsync(
            PutSubscribeRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutSubscribeRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Subscribe Ranking Score
     *
     * @param PutSubscribeRankingScoreRequest $request
     * @return PutSubscribeRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscore
     */
    public function putSubscribeRankingScore (
            PutSubscribeRankingScoreRequest $request
    ): PutSubscribeRankingScoreResult {
        return $this->putSubscribeRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Register Subscribe Ranking Score specifying User ID
     *
     * @param PutSubscribeRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscorebyuserid
     */
    public function putSubscribeRankingScoreByUserIdAsync(
            PutSubscribeRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutSubscribeRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Register Subscribe Ranking Score specifying User ID
     *
     * @param PutSubscribeRankingScoreByUserIdRequest $request
     * @return PutSubscribeRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscorebyuserid
     */
    public function putSubscribeRankingScoreByUserId (
            PutSubscribeRankingScoreByUserIdRequest $request
    ): PutSubscribeRankingScoreByUserIdResult {
        return $this->putSubscribeRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking Score
     *
     * @param GetSubscribeRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingscore
     */
    public function getSubscribeRankingScoreAsync(
            GetSubscribeRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking Score
     *
     * @param GetSubscribeRankingScoreRequest $request
     * @return GetSubscribeRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingscore
     */
    public function getSubscribeRankingScore (
            GetSubscribeRankingScoreRequest $request
    ): GetSubscribeRankingScoreResult {
        return $this->getSubscribeRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking Score specifying User ID
     *
     * @param GetSubscribeRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingscorebyuserid
     */
    public function getSubscribeRankingScoreByUserIdAsync(
            GetSubscribeRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking Score specifying User ID
     *
     * @param GetSubscribeRankingScoreByUserIdRequest $request
     * @return GetSubscribeRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingscorebyuserid
     */
    public function getSubscribeRankingScoreByUserId (
            GetSubscribeRankingScoreByUserIdRequest $request
    ): GetSubscribeRankingScoreByUserIdResult {
        return $this->getSubscribeRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Subscribe Ranking Score specifying User ID
     *
     * @param DeleteSubscribeRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscriberankingscorebyuserid
     */
    public function deleteSubscribeRankingScoreByUserIdAsync(
            DeleteSubscribeRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSubscribeRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Subscribe Ranking Score specifying User ID
     *
     * @param DeleteSubscribeRankingScoreByUserIdRequest $request
     * @return DeleteSubscribeRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscriberankingscorebyuserid
     */
    public function deleteSubscribeRankingScoreByUserId (
            DeleteSubscribeRankingScoreByUserIdRequest $request
    ): DeleteSubscribeRankingScoreByUserIdResult {
        return $this->deleteSubscribeRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the subscribe ranking
     *
     * @param VerifySubscribeRankingScoreRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifysubscriberankingscore
     */
    public function verifySubscribeRankingScoreAsync(
            VerifySubscribeRankingScoreRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySubscribeRankingScoreTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the subscribe ranking
     *
     * @param VerifySubscribeRankingScoreRequest $request
     * @return VerifySubscribeRankingScoreResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifysubscriberankingscore
     */
    public function verifySubscribeRankingScore (
            VerifySubscribeRankingScoreRequest $request
    ): VerifySubscribeRankingScoreResult {
        return $this->verifySubscribeRankingScoreAsync(
            $request
        )->wait();
    }

    /**
     * Verify the score of the subscribe ranking specifying User ID
     *
     * @param VerifySubscribeRankingScoreByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifysubscriberankingscorebyuserid
     */
    public function verifySubscribeRankingScoreByUserIdAsync(
            VerifySubscribeRankingScoreByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySubscribeRankingScoreByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify the score of the subscribe ranking specifying User ID
     *
     * @param VerifySubscribeRankingScoreByUserIdRequest $request
     * @return VerifySubscribeRankingScoreByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifysubscriberankingscorebyuserid
     */
    public function verifySubscribeRankingScoreByUserId (
            VerifySubscribeRankingScoreByUserIdRequest $request
    ): VerifySubscribeRankingScoreByUserIdResult {
        return $this->verifySubscribeRankingScoreByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the verification of the subscribe ranking score as a verification action
     *
     * @param VerifySubscribeRankingScoreByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifysubscriberankingscorebyuserid
     */
    public function verifySubscribeRankingScoreByStampTaskAsync(
            VerifySubscribeRankingScoreByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySubscribeRankingScoreByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the verification of the subscribe ranking score as a verification action
     *
     * @param VerifySubscribeRankingScoreByStampTaskRequest $request
     * @return VerifySubscribeRankingScoreByStampTaskResult
     * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifysubscriberankingscorebyuserid
     */
    public function verifySubscribeRankingScoreByStampTask (
            VerifySubscribeRankingScoreByStampTaskRequest $request
    ): VerifySubscribeRankingScoreByStampTaskResult {
        return $this->verifySubscribeRankingScoreByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Rankings
     *
     * @param DescribeSubscribeRankingsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankings
     */
    public function describeSubscribeRankingsAsync(
            DescribeSubscribeRankingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Rankings
     *
     * @param DescribeSubscribeRankingsRequest $request
     * @return DescribeSubscribeRankingsResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankings
     */
    public function describeSubscribeRankings (
            DescribeSubscribeRankingsRequest $request
    ): DescribeSubscribeRankingsResult {
        return $this->describeSubscribeRankingsAsync(
            $request
        )->wait();
    }

    /**
     * List Subscribe Rankings by User ID
     *
     * @param DescribeSubscribeRankingsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingsbyuserid
     */
    public function describeSubscribeRankingsByUserIdAsync(
            DescribeSubscribeRankingsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribeRankingsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Subscribe Rankings by User ID
     *
     * @param DescribeSubscribeRankingsByUserIdRequest $request
     * @return DescribeSubscribeRankingsByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describesubscriberankingsbyuserid
     */
    public function describeSubscribeRankingsByUserId (
            DescribeSubscribeRankingsByUserIdRequest $request
    ): DescribeSubscribeRankingsByUserIdResult {
        return $this->describeSubscribeRankingsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking
     *
     * @param GetSubscribeRankingRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberanking
     */
    public function getSubscribeRankingAsync(
            GetSubscribeRankingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking
     *
     * @param GetSubscribeRankingRequest $request
     * @return GetSubscribeRankingResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberanking
     */
    public function getSubscribeRanking (
            GetSubscribeRankingRequest $request
    ): GetSubscribeRankingResult {
        return $this->getSubscribeRankingAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Ranking by specifying the user ID
     *
     * @param GetSubscribeRankingByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingbyuserid
     */
    public function getSubscribeRankingByUserIdAsync(
            GetSubscribeRankingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeRankingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Subscribe Ranking by specifying the user ID
     *
     * @param GetSubscribeRankingByUserIdRequest $request
     * @return GetSubscribeRankingByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingbyuserid
     */
    public function getSubscribeRankingByUserId (
            GetSubscribeRankingByUserIdRequest $request
    ): GetSubscribeRankingByUserIdResult {
        return $this->getSubscribeRankingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Export Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#exportmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#exportmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getcurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getcurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#preupdatecurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#preupdatecurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatecurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatecurrentrankingmaster
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatecurrentrankingmasterfromgithub
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
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatecurrentrankingmasterfromgithub
     */
    public function updateCurrentRankingMasterFromGitHub (
            UpdateCurrentRankingMasterFromGitHubRequest $request
    ): UpdateCurrentRankingMasterFromGitHubResult {
        return $this->updateCurrentRankingMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Target User ID
     *
     * @param GetSubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscribe
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
     * Get Subscribe Target User ID
     *
     * @param GetSubscribeRequest $request
     * @return GetSubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscribe
     */
    public function getSubscribe (
            GetSubscribeRequest $request
    ): GetSubscribeResult {
        return $this->getSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Get Subscribe Target User ID specifying User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscribebyuserid
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
     * Get Subscribe Target User ID specifying User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return GetSubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscribebyuserid
     */
    public function getSubscribeByUserId (
            GetSubscribeByUserIdRequest $request
    ): GetSubscribeByUserIdResult {
        return $this->getSubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Subscribe Target User ID
     *
     * @param DeleteSubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscribe
     */
    public function deleteSubscribeAsync(
            DeleteSubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Subscribe Target User ID
     *
     * @param DeleteSubscribeRequest $request
     * @return DeleteSubscribeResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscribe
     */
    public function deleteSubscribe (
            DeleteSubscribeRequest $request
    ): DeleteSubscribeResult {
        return $this->deleteSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Delete Subscribe Target User ID specifying User ID
     *
     * @param DeleteSubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscribebyuserid
     */
    public function deleteSubscribeByUserIdAsync(
            DeleteSubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Subscribe Target User ID specifying User ID
     *
     * @param DeleteSubscribeByUserIdRequest $request
     * @return DeleteSubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deletesubscribebyuserid
     */
    public function deleteSubscribeByUserId (
            DeleteSubscribeByUserIdRequest $request
    ): DeleteSubscribeByUserIdResult {
        return $this->deleteSubscribeByUserIdAsync(
            $request
        )->wait();
    }
}