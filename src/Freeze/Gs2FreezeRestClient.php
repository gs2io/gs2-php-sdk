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

namespace Gs2\Freeze;

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


use Gs2\Freeze\Request\DescribeStagesRequest;
use Gs2\Freeze\Result\DescribeStagesResult;
use Gs2\Freeze\Request\GetStageRequest;
use Gs2\Freeze\Result\GetStageResult;
use Gs2\Freeze\Request\PromoteStageRequest;
use Gs2\Freeze\Result\PromoteStageResult;
use Gs2\Freeze\Request\RollbackStageRequest;
use Gs2\Freeze\Result\RollbackStageResult;
use Gs2\Freeze\Request\DescribeOutputsRequest;
use Gs2\Freeze\Result\DescribeOutputsResult;
use Gs2\Freeze\Request\GetOutputRequest;
use Gs2\Freeze\Result\GetOutputResult;

class DescribeStagesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStagesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStagesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStagesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStagesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStagesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

class GetStageTask extends Gs2RestSessionTask {

    /**
     * @var GetStageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStageTask constructor.
     * @param Gs2RestSession $session
     * @param GetStageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStageRequest $request
    ) {
        parent::__construct(
            $session,
            GetStageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{stageName}";

        $url = str_replace("{stageName}", $this->request->getStageName() === null|| strlen($this->request->getStageName()) == 0 ? "null" : $this->request->getStageName(), $url);

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

class PromoteStageTask extends Gs2RestSessionTask {

    /**
     * @var PromoteStageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PromoteStageTask constructor.
     * @param Gs2RestSession $session
     * @param PromoteStageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PromoteStageRequest $request
    ) {
        parent::__construct(
            $session,
            PromoteStageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{stageName}/promote";

        $url = str_replace("{stageName}", $this->request->getStageName() === null|| strlen($this->request->getStageName()) == 0 ? "null" : $this->request->getStageName(), $url);

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

class RollbackStageTask extends Gs2RestSessionTask {

    /**
     * @var RollbackStageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RollbackStageTask constructor.
     * @param Gs2RestSession $session
     * @param RollbackStageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RollbackStageRequest $request
    ) {
        parent::__construct(
            $session,
            RollbackStageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{stageName}/rollback";

        $url = str_replace("{stageName}", $this->request->getStageName() === null|| strlen($this->request->getStageName()) == 0 ? "null" : $this->request->getStageName(), $url);

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

class DescribeOutputsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeOutputsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeOutputsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeOutputsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeOutputsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeOutputsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{stageName}/progress/output";

        $url = str_replace("{stageName}", $this->request->getStageName() === null|| strlen($this->request->getStageName()) == 0 ? "null" : $this->request->getStageName(), $url);

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

class GetOutputTask extends Gs2RestSessionTask {

    /**
     * @var GetOutputRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetOutputTask constructor.
     * @param Gs2RestSession $session
     * @param GetOutputRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetOutputRequest $request
    ) {
        parent::__construct(
            $session,
            GetOutputResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "freeze", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{stageName}/progress/output/{outputName}";

        $url = str_replace("{stageName}", $this->request->getStageName() === null|| strlen($this->request->getStageName()) == 0 ? "null" : $this->request->getStageName(), $url);
        $url = str_replace("{outputName}", $this->request->getOutputName() === null|| strlen($this->request->getOutputName()) == 0 ? "null" : $this->request->getOutputName(), $url);

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

/**
 * GS2 Freeze API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2FreezeRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * @param DescribeStagesRequest $request
     * @return PromiseInterface
     */
    public function describeStagesAsync(
            DescribeStagesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStagesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStagesRequest $request
     * @return DescribeStagesResult
     */
    public function describeStages (
            DescribeStagesRequest $request
    ): DescribeStagesResult {
        return $this->describeStagesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStageRequest $request
     * @return PromiseInterface
     */
    public function getStageAsync(
            GetStageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStageRequest $request
     * @return GetStageResult
     */
    public function getStage (
            GetStageRequest $request
    ): GetStageResult {
        return $this->getStageAsync(
            $request
        )->wait();
    }

    /**
     * @param PromoteStageRequest $request
     * @return PromiseInterface
     */
    public function promoteStageAsync(
            PromoteStageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PromoteStageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PromoteStageRequest $request
     * @return PromoteStageResult
     */
    public function promoteStage (
            PromoteStageRequest $request
    ): PromoteStageResult {
        return $this->promoteStageAsync(
            $request
        )->wait();
    }

    /**
     * @param RollbackStageRequest $request
     * @return PromiseInterface
     */
    public function rollbackStageAsync(
            RollbackStageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RollbackStageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RollbackStageRequest $request
     * @return RollbackStageResult
     */
    public function rollbackStage (
            RollbackStageRequest $request
    ): RollbackStageResult {
        return $this->rollbackStageAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeOutputsRequest $request
     * @return PromiseInterface
     */
    public function describeOutputsAsync(
            DescribeOutputsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeOutputsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeOutputsRequest $request
     * @return DescribeOutputsResult
     */
    public function describeOutputs (
            DescribeOutputsRequest $request
    ): DescribeOutputsResult {
        return $this->describeOutputsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetOutputRequest $request
     * @return PromiseInterface
     */
    public function getOutputAsync(
            GetOutputRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetOutputTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetOutputRequest $request
     * @return GetOutputResult
     */
    public function getOutput (
            GetOutputRequest $request
    ): GetOutputResult {
        return $this->getOutputAsync(
            $request
        )->wait();
    }
}