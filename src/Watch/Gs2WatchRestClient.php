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

namespace Gs2\Watch;

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
use Gs2\Watch\Request\GetChartRequest;
use Gs2\Watch\Result\GetChartResult;
use Gs2\Watch\Request\GetCumulativeRequest;
use Gs2\Watch\Result\GetCumulativeResult;
use Gs2\Watch\Request\DescribeBillingActivitiesRequest;
use Gs2\Watch\Result\DescribeBillingActivitiesResult;
use Gs2\Watch\Request\GetBillingActivityRequest;
use Gs2\Watch\Result\GetBillingActivityResult;

class GetChartTask extends Gs2RestSessionTask {

    /**
     * @var GetChartRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetChartTask constructor.
     * @param Gs2RestSession $session
     * @param GetChartRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetChartRequest $request
    ) {
        parent::__construct(
            $session,
            GetChartResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/chart/{metrics}";

        $url = str_replace("{metrics}", $this->request->getMetrics() === null|| strlen($this->request->getMetrics()) == 0 ? "null" : $this->request->getMetrics(), $url);

        $json = [];
        if ($this->request->getGrn() !== null) {
            $json["grn"] = $this->request->getGrn();
        }
        if ($this->request->getQueries() !== null) {
            $array = [];
            foreach ($this->request->getQueries() as $item)
            {
                array_push($array, $item);
            }
            $json["queries"] = $array;
        }
        if ($this->request->getBy() !== null) {
            $json["by"] = $this->request->getBy();
        }
        if ($this->request->getTimeframe() !== null) {
            $json["timeframe"] = $this->request->getTimeframe();
        }
        if ($this->request->getSize() !== null) {
            $json["size"] = $this->request->getSize();
        }
        if ($this->request->getFormat() !== null) {
            $json["format"] = $this->request->getFormat();
        }
        if ($this->request->getAggregator() !== null) {
            $json["aggregator"] = $this->request->getAggregator();
        }
        if ($this->request->getStyle() !== null) {
            $json["style"] = $this->request->getStyle();
        }
        if ($this->request->getTitle() !== null) {
            $json["title"] = $this->request->getTitle();
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

class GetCumulativeTask extends Gs2RestSessionTask {

    /**
     * @var GetCumulativeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCumulativeTask constructor.
     * @param Gs2RestSession $session
     * @param GetCumulativeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCumulativeRequest $request
    ) {
        parent::__construct(
            $session,
            GetCumulativeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/cumulative/{name}";

        $url = str_replace("{name}", $this->request->getName() === null|| strlen($this->request->getName()) == 0 ? "null" : $this->request->getName(), $url);

        $json = [];
        if ($this->request->getResourceGrn() !== null) {
            $json["resourceGrn"] = $this->request->getResourceGrn();
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

class DescribeBillingActivitiesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBillingActivitiesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBillingActivitiesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBillingActivitiesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBillingActivitiesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBillingActivitiesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/billingActivity/{year}/{month}";

        $url = str_replace("{year}", $this->request->getYear() === null ? "null" : $this->request->getYear(), $url);
        $url = str_replace("{month}", $this->request->getMonth() === null ? "null" : $this->request->getMonth(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
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

class GetBillingActivityTask extends Gs2RestSessionTask {

    /**
     * @var GetBillingActivityRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBillingActivityTask constructor.
     * @param Gs2RestSession $session
     * @param GetBillingActivityRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBillingActivityRequest $request
    ) {
        parent::__construct(
            $session,
            GetBillingActivityResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/billingActivity/{year}/{month}/{service}/{activityType}";

        $url = str_replace("{year}", $this->request->getYear() === null ? "null" : $this->request->getYear(), $url);
        $url = str_replace("{month}", $this->request->getMonth() === null ? "null" : $this->request->getMonth(), $url);
        $url = str_replace("{service}", $this->request->getService() === null|| strlen($this->request->getService()) == 0 ? "null" : $this->request->getService(), $url);
        $url = str_replace("{activityType}", $this->request->getActivityType() === null|| strlen($this->request->getActivityType()) == 0 ? "null" : $this->request->getActivityType(), $url);

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

/**
 * GS2 Watch API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2WatchRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * チャートを取得<br>
     *
     * @param GetChartRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getChartAsync(
            GetChartRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetChartTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * チャートを取得<br>
     *
     * @param GetChartRequest $request リクエストパラメータ
     * @return GetChartResult
     */
    public function getChart (
            GetChartRequest $request
    ): GetChartResult {
        return $this->getChartAsync(
            $request
        )->wait();
    }

    /**
     * 累積値を取得<br>
     *
     * @param GetCumulativeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getCumulativeAsync(
            GetCumulativeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCumulativeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 累積値を取得<br>
     *
     * @param GetCumulativeRequest $request リクエストパラメータ
     * @return GetCumulativeResult
     */
    public function getCumulative (
            GetCumulativeRequest $request
    ): GetCumulativeResult {
        return $this->getCumulativeAsync(
            $request
        )->wait();
    }

    /**
     * 請求にまつわるアクティビティの一覧を取得<br>
     *
     * @param DescribeBillingActivitiesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeBillingActivitiesAsync(
            DescribeBillingActivitiesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBillingActivitiesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 請求にまつわるアクティビティの一覧を取得<br>
     *
     * @param DescribeBillingActivitiesRequest $request リクエストパラメータ
     * @return DescribeBillingActivitiesResult
     */
    public function describeBillingActivities (
            DescribeBillingActivitiesRequest $request
    ): DescribeBillingActivitiesResult {
        return $this->describeBillingActivitiesAsync(
            $request
        )->wait();
    }

    /**
     * 請求にまつわるアクティビティを取得<br>
     *
     * @param GetBillingActivityRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getBillingActivityAsync(
            GetBillingActivityRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBillingActivityTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 請求にまつわるアクティビティを取得<br>
     *
     * @param GetBillingActivityRequest $request リクエストパラメータ
     * @return GetBillingActivityResult
     */
    public function getBillingActivity (
            GetBillingActivityRequest $request
    ): GetBillingActivityResult {
        return $this->getBillingActivityAsync(
            $request
        )->wait();
    }
}