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
use Gs2\Watch\Request\GetDistributionRequest;
use Gs2\Watch\Result\GetDistributionResult;
use Gs2\Watch\Request\GetCumulativeRequest;
use Gs2\Watch\Result\GetCumulativeResult;
use Gs2\Watch\Request\DescribeBillingActivitiesRequest;
use Gs2\Watch\Result\DescribeBillingActivitiesResult;
use Gs2\Watch\Request\GetBillingActivityRequest;
use Gs2\Watch\Result\GetBillingActivityResult;
use Gs2\Watch\Request\GetGeneralMetricsRequest;
use Gs2\Watch\Result\GetGeneralMetricsResult;
use Gs2\Watch\Request\DescribeAccountNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeAccountNamespaceMetricsResult;
use Gs2\Watch\Request\GetAccountNamespaceMetricsRequest;
use Gs2\Watch\Result\GetAccountNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeChatNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeChatNamespaceMetricsResult;
use Gs2\Watch\Request\GetChatNamespaceMetricsRequest;
use Gs2\Watch\Result\GetChatNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeDatastoreNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeDatastoreNamespaceMetricsResult;
use Gs2\Watch\Request\GetDatastoreNamespaceMetricsRequest;
use Gs2\Watch\Result\GetDatastoreNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeDictionaryNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeDictionaryNamespaceMetricsResult;
use Gs2\Watch\Request\GetDictionaryNamespaceMetricsRequest;
use Gs2\Watch\Result\GetDictionaryNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeExchangeRateModelMetricsRequest;
use Gs2\Watch\Result\DescribeExchangeRateModelMetricsResult;
use Gs2\Watch\Request\GetExchangeRateModelMetricsRequest;
use Gs2\Watch\Result\GetExchangeRateModelMetricsResult;
use Gs2\Watch\Request\DescribeExchangeNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeExchangeNamespaceMetricsResult;
use Gs2\Watch\Request\GetExchangeNamespaceMetricsRequest;
use Gs2\Watch\Result\GetExchangeNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeExperienceStatusMetricsRequest;
use Gs2\Watch\Result\DescribeExperienceStatusMetricsResult;
use Gs2\Watch\Request\DescribeExperienceExperienceModelMetricsRequest;
use Gs2\Watch\Result\DescribeExperienceExperienceModelMetricsResult;
use Gs2\Watch\Request\GetExperienceExperienceModelMetricsRequest;
use Gs2\Watch\Result\GetExperienceExperienceModelMetricsResult;
use Gs2\Watch\Request\DescribeExperienceNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeExperienceNamespaceMetricsResult;
use Gs2\Watch\Request\GetExperienceNamespaceMetricsRequest;
use Gs2\Watch\Result\GetExperienceNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeFormationFormMetricsRequest;
use Gs2\Watch\Result\DescribeFormationFormMetricsResult;
use Gs2\Watch\Request\DescribeFormationMoldMetricsRequest;
use Gs2\Watch\Result\DescribeFormationMoldMetricsResult;
use Gs2\Watch\Request\DescribeFormationNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeFormationNamespaceMetricsResult;
use Gs2\Watch\Request\GetFormationNamespaceMetricsRequest;
use Gs2\Watch\Result\GetFormationNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeFriendNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeFriendNamespaceMetricsResult;
use Gs2\Watch\Request\GetFriendNamespaceMetricsRequest;
use Gs2\Watch\Result\GetFriendNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeInboxNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeInboxNamespaceMetricsResult;
use Gs2\Watch\Request\GetInboxNamespaceMetricsRequest;
use Gs2\Watch\Result\GetInboxNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeInventoryItemSetMetricsRequest;
use Gs2\Watch\Result\DescribeInventoryItemSetMetricsResult;
use Gs2\Watch\Request\DescribeInventoryInventoryMetricsRequest;
use Gs2\Watch\Result\DescribeInventoryInventoryMetricsResult;
use Gs2\Watch\Request\DescribeInventoryNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeInventoryNamespaceMetricsResult;
use Gs2\Watch\Request\GetInventoryNamespaceMetricsRequest;
use Gs2\Watch\Result\GetInventoryNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeKeyNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeKeyNamespaceMetricsResult;
use Gs2\Watch\Request\GetKeyNamespaceMetricsRequest;
use Gs2\Watch\Result\GetKeyNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeLimitCounterMetricsRequest;
use Gs2\Watch\Result\DescribeLimitCounterMetricsResult;
use Gs2\Watch\Request\DescribeLimitLimitModelMetricsRequest;
use Gs2\Watch\Result\DescribeLimitLimitModelMetricsResult;
use Gs2\Watch\Request\GetLimitLimitModelMetricsRequest;
use Gs2\Watch\Result\GetLimitLimitModelMetricsResult;
use Gs2\Watch\Request\DescribeLimitNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeLimitNamespaceMetricsResult;
use Gs2\Watch\Request\GetLimitNamespaceMetricsRequest;
use Gs2\Watch\Result\GetLimitNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeLotteryLotteryMetricsRequest;
use Gs2\Watch\Result\DescribeLotteryLotteryMetricsResult;
use Gs2\Watch\Request\GetLotteryLotteryMetricsRequest;
use Gs2\Watch\Result\GetLotteryLotteryMetricsResult;
use Gs2\Watch\Request\DescribeLotteryNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeLotteryNamespaceMetricsResult;
use Gs2\Watch\Request\GetLotteryNamespaceMetricsRequest;
use Gs2\Watch\Result\GetLotteryNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeMatchmakingNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeMatchmakingNamespaceMetricsResult;
use Gs2\Watch\Request\GetMatchmakingNamespaceMetricsRequest;
use Gs2\Watch\Result\GetMatchmakingNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeMissionCounterMetricsRequest;
use Gs2\Watch\Result\DescribeMissionCounterMetricsResult;
use Gs2\Watch\Request\DescribeMissionMissionGroupModelMetricsRequest;
use Gs2\Watch\Result\DescribeMissionMissionGroupModelMetricsResult;
use Gs2\Watch\Request\GetMissionMissionGroupModelMetricsRequest;
use Gs2\Watch\Result\GetMissionMissionGroupModelMetricsResult;
use Gs2\Watch\Request\DescribeMissionNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeMissionNamespaceMetricsResult;
use Gs2\Watch\Request\GetMissionNamespaceMetricsRequest;
use Gs2\Watch\Result\GetMissionNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeMoneyWalletMetricsRequest;
use Gs2\Watch\Result\DescribeMoneyWalletMetricsResult;
use Gs2\Watch\Request\DescribeMoneyReceiptMetricsRequest;
use Gs2\Watch\Result\DescribeMoneyReceiptMetricsResult;
use Gs2\Watch\Request\DescribeMoneyNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeMoneyNamespaceMetricsResult;
use Gs2\Watch\Request\GetMoneyNamespaceMetricsRequest;
use Gs2\Watch\Result\GetMoneyNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeQuestQuestModelMetricsRequest;
use Gs2\Watch\Result\DescribeQuestQuestModelMetricsResult;
use Gs2\Watch\Request\GetQuestQuestModelMetricsRequest;
use Gs2\Watch\Result\GetQuestQuestModelMetricsResult;
use Gs2\Watch\Request\DescribeQuestQuestGroupModelMetricsRequest;
use Gs2\Watch\Result\DescribeQuestQuestGroupModelMetricsResult;
use Gs2\Watch\Request\GetQuestQuestGroupModelMetricsRequest;
use Gs2\Watch\Result\GetQuestQuestGroupModelMetricsResult;
use Gs2\Watch\Request\DescribeQuestNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeQuestNamespaceMetricsResult;
use Gs2\Watch\Request\GetQuestNamespaceMetricsRequest;
use Gs2\Watch\Result\GetQuestNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeRankingCategoryModelMetricsRequest;
use Gs2\Watch\Result\DescribeRankingCategoryModelMetricsResult;
use Gs2\Watch\Request\GetRankingCategoryModelMetricsRequest;
use Gs2\Watch\Result\GetRankingCategoryModelMetricsResult;
use Gs2\Watch\Request\DescribeRankingNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeRankingNamespaceMetricsResult;
use Gs2\Watch\Request\GetRankingNamespaceMetricsRequest;
use Gs2\Watch\Result\GetRankingNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeShowcaseDisplayItemMetricsRequest;
use Gs2\Watch\Result\DescribeShowcaseDisplayItemMetricsResult;
use Gs2\Watch\Request\GetShowcaseDisplayItemMetricsRequest;
use Gs2\Watch\Result\GetShowcaseDisplayItemMetricsResult;
use Gs2\Watch\Request\DescribeShowcaseShowcaseMetricsRequest;
use Gs2\Watch\Result\DescribeShowcaseShowcaseMetricsResult;
use Gs2\Watch\Request\GetShowcaseShowcaseMetricsRequest;
use Gs2\Watch\Result\GetShowcaseShowcaseMetricsResult;
use Gs2\Watch\Request\DescribeShowcaseNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeShowcaseNamespaceMetricsResult;
use Gs2\Watch\Request\GetShowcaseNamespaceMetricsRequest;
use Gs2\Watch\Result\GetShowcaseNamespaceMetricsResult;
use Gs2\Watch\Request\DescribeStaminaStaminaModelMetricsRequest;
use Gs2\Watch\Result\DescribeStaminaStaminaModelMetricsResult;
use Gs2\Watch\Request\GetStaminaStaminaModelMetricsRequest;
use Gs2\Watch\Result\GetStaminaStaminaModelMetricsResult;
use Gs2\Watch\Request\DescribeStaminaNamespaceMetricsRequest;
use Gs2\Watch\Result\DescribeStaminaNamespaceMetricsResult;
use Gs2\Watch\Request\GetStaminaNamespaceMetricsRequest;
use Gs2\Watch\Result\GetStaminaNamespaceMetricsResult;

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

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/chart/{measure}";

        $url = str_replace("{measure}", $this->request->getMeasure() === null|| strlen($this->request->getMeasure()) == 0 ? "null" : $this->request->getMeasure(), $url);

        $json = [];
        if ($this->request->getGrn() !== null) {
            $json["grn"] = $this->request->getGrn();
        }
        if ($this->request->getRound() !== null) {
            $json["round"] = $this->request->getRound();
        }
        if ($this->request->getFilters() !== null) {
            $array = [];
            foreach ($this->request->getFilters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["filters"] = $array;
        }
        if ($this->request->getGroupBys() !== null) {
            $array = [];
            foreach ($this->request->getGroupBys() as $item)
            {
                array_push($array, $item);
            }
            $json["groupBys"] = $array;
        }
        if ($this->request->getCountBy() !== null) {
            $json["countBy"] = $this->request->getCountBy();
        }
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getPageToken() !== null) {
            $json["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $json["limit"] = $this->request->getLimit();
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

class GetDistributionTask extends Gs2RestSessionTask {

    /**
     * @var GetDistributionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDistributionTask constructor.
     * @param Gs2RestSession $session
     * @param GetDistributionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDistributionRequest $request
    ) {
        parent::__construct(
            $session,
            GetDistributionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/distribution/{measure}";

        $url = str_replace("{measure}", $this->request->getMeasure() === null|| strlen($this->request->getMeasure()) == 0 ? "null" : $this->request->getMeasure(), $url);

        $json = [];
        if ($this->request->getGrn() !== null) {
            $json["grn"] = $this->request->getGrn();
        }
        if ($this->request->getFilters() !== null) {
            $array = [];
            foreach ($this->request->getFilters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["filters"] = $array;
        }
        if ($this->request->getGroupBys() !== null) {
            $array = [];
            foreach ($this->request->getGroupBys() as $item)
            {
                array_push($array, $item);
            }
            $json["groupBys"] = $array;
        }
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getPageToken() !== null) {
            $json["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $json["limit"] = $this->request->getLimit();
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

class GetGeneralMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetGeneralMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGeneralMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetGeneralMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGeneralMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetGeneralMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/general";

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

class DescribeAccountNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAccountNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAccountNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAccountNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAccountNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAccountNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/account/namespace";

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

class GetAccountNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetAccountNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAccountNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetAccountNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAccountNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetAccountNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/account/namespace/{namespaceName}";

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

class DescribeChatNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeChatNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeChatNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeChatNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeChatNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeChatNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/chat/namespace";

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

class GetChatNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetChatNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetChatNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetChatNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetChatNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetChatNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/chat/namespace/{namespaceName}";

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

class DescribeDatastoreNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDatastoreNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDatastoreNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDatastoreNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDatastoreNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDatastoreNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/datastore/namespace";

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

class GetDatastoreNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetDatastoreNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDatastoreNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetDatastoreNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDatastoreNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetDatastoreNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/datastore/namespace/{namespaceName}";

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

class DescribeDictionaryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDictionaryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDictionaryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDictionaryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDictionaryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDictionaryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/dictionary/namespace";

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

class GetDictionaryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetDictionaryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDictionaryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetDictionaryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDictionaryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetDictionaryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/dictionary/namespace/{namespaceName}";

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

class DescribeExchangeRateModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExchangeRateModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExchangeRateModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExchangeRateModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExchangeRateModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExchangeRateModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/exchange/namespace/{namespaceName}/rateModel";

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

class GetExchangeRateModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetExchangeRateModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExchangeRateModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetExchangeRateModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExchangeRateModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetExchangeRateModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/exchange/namespace/{namespaceName}/rateModel/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

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

class DescribeExchangeNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExchangeNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExchangeNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExchangeNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExchangeNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExchangeNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/exchange/namespace";

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

class GetExchangeNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetExchangeNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExchangeNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetExchangeNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExchangeNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetExchangeNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/exchange/namespace/{namespaceName}";

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

class DescribeExperienceStatusMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExperienceStatusMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExperienceStatusMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExperienceStatusMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExperienceStatusMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExperienceStatusMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/experience/namespace/{namespaceName}/experienceModel/{experienceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

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

class DescribeExperienceExperienceModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExperienceExperienceModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExperienceExperienceModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExperienceExperienceModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExperienceExperienceModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExperienceExperienceModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/experience/namespace/{namespaceName}/experienceModel";

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

class GetExperienceExperienceModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetExperienceExperienceModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExperienceExperienceModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetExperienceExperienceModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExperienceExperienceModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetExperienceExperienceModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/experience/namespace/{namespaceName}/experienceModel/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

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

class DescribeExperienceNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExperienceNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExperienceNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExperienceNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExperienceNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExperienceNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/experience/namespace";

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

class GetExperienceNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetExperienceNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExperienceNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetExperienceNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExperienceNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetExperienceNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/experience/namespace/{namespaceName}";

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

class DescribeFormationFormMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormationFormMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormationFormMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormationFormMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormationFormMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormationFormMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/formation/namespace/{namespaceName}/mold/{moldModelName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldModelName}", $this->request->getMoldModelName() === null|| strlen($this->request->getMoldModelName()) == 0 ? "null" : $this->request->getMoldModelName(), $url);

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

class DescribeFormationMoldMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormationMoldMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormationMoldMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormationMoldMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormationMoldMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormationMoldMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/formation/namespace/{namespaceName}/mold";

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

class DescribeFormationNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormationNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormationNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormationNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormationNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormationNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/formation/namespace";

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

class GetFormationNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetFormationNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormationNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormationNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormationNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormationNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/formation/namespace/{namespaceName}";

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

class DescribeFriendNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFriendNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFriendNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFriendNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFriendNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFriendNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/friend/namespace";

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

class GetFriendNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetFriendNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFriendNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetFriendNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFriendNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetFriendNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/friend/namespace/{namespaceName}";

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

class DescribeInboxNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInboxNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInboxNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInboxNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInboxNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInboxNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inbox/namespace";

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

class GetInboxNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetInboxNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInboxNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetInboxNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInboxNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetInboxNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inbox/namespace/{namespaceName}";

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

class DescribeInventoryItemSetMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoryItemSetMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoryItemSetMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoryItemSetMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoryItemSetMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoryItemSetMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inventory/namespace/{namespaceName}/inventory/{inventoryName}/itemSet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class DescribeInventoryInventoryMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoryInventoryMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoryInventoryMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoryInventoryMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoryInventoryMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoryInventoryMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inventory/namespace/{namespaceName}/inventory";

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

class DescribeInventoryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inventory/namespace";

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

class GetInventoryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetInventoryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInventoryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetInventoryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInventoryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetInventoryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/inventory/namespace/{namespaceName}";

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

class DescribeKeyNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeKeyNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeKeyNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeKeyNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeKeyNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeKeyNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/key/namespace";

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

class GetKeyNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetKeyNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetKeyNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetKeyNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetKeyNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetKeyNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/key/namespace/{namespaceName}";

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

class DescribeLimitCounterMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitCounterMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitCounterMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitCounterMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitCounterMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitCounterMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/limit/namespace/{namespaceName}/limitModel/{limitName}/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

class DescribeLimitLimitModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitLimitModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitLimitModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitLimitModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitLimitModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitLimitModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/limit/namespace/{namespaceName}/limitModel";

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

class GetLimitLimitModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitLimitModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitLimitModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitLimitModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitLimitModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitLimitModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/limit/namespace/{namespaceName}/limitModel/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

class DescribeLimitNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/limit/namespace";

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

class GetLimitNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/limit/namespace/{namespaceName}";

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

class DescribeLotteryLotteryMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLotteryLotteryMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLotteryLotteryMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLotteryLotteryMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLotteryLotteryMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLotteryLotteryMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/lottery/namespace/{namespaceName}/lottery";

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

class GetLotteryLotteryMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetLotteryLotteryMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLotteryLotteryMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetLotteryLotteryMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLotteryLotteryMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetLotteryLotteryMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/lottery/namespace/{namespaceName}/lotteryModel/{lotteryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

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

class DescribeLotteryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLotteryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLotteryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLotteryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLotteryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLotteryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/lottery/namespace";

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

class GetLotteryNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetLotteryNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLotteryNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetLotteryNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLotteryNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetLotteryNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/lottery/namespace/{namespaceName}";

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

class DescribeMatchmakingNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMatchmakingNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMatchmakingNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMatchmakingNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMatchmakingNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMatchmakingNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/matchmaking/namespace";

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

class GetMatchmakingNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetMatchmakingNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMatchmakingNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetMatchmakingNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMatchmakingNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetMatchmakingNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/matchmaking/namespace/{namespaceName}";

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

class DescribeMissionCounterMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionCounterMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionCounterMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionCounterMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionCounterMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionCounterMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/mission/namespace/{namespaceName}/counter";

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

class DescribeMissionMissionGroupModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionMissionGroupModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionMissionGroupModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionMissionGroupModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionMissionGroupModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionMissionGroupModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/mission/namespace/{namespaceName}/missionGroupModel";

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

class GetMissionMissionGroupModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionMissionGroupModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionMissionGroupModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionMissionGroupModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionMissionGroupModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionMissionGroupModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/mission/namespace/{namespaceName}/missionGroupModel/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class DescribeMissionNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/mission/namespace";

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

class GetMissionNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/mission/namespace/{namespaceName}";

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

class DescribeMoneyWalletMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoneyWalletMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoneyWalletMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoneyWalletMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoneyWalletMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoneyWalletMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/money/namespace/{namespaceName}/wallet";

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

class DescribeMoneyReceiptMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoneyReceiptMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoneyReceiptMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoneyReceiptMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoneyReceiptMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoneyReceiptMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/money/namespace/{namespaceName}/receipt";

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

class DescribeMoneyNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoneyNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoneyNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoneyNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoneyNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoneyNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/money/namespace";

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

class GetMoneyNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetMoneyNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoneyNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoneyNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoneyNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoneyNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/money/namespace/{namespaceName}";

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

class DescribeQuestQuestModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestQuestModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestQuestModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestQuestModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestQuestModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestQuestModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace/{namespaceName}/questGroupModel/{questGroupName}/questModel";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class GetQuestQuestModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestQuestModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestQuestModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestQuestModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestQuestModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestQuestModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace/{namespaceName}/questGroupModel/{questGroupName}/questModel/{questName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

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

class DescribeQuestQuestGroupModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestQuestGroupModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestQuestGroupModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestQuestGroupModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestQuestGroupModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestQuestGroupModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace/{namespaceName}/questGroupModel";

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

class GetQuestQuestGroupModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestQuestGroupModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestQuestGroupModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestQuestGroupModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestQuestGroupModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestQuestGroupModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace/{namespaceName}/questGroupModel/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class DescribeQuestNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace";

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

class GetQuestNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/quest/namespace/{namespaceName}";

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

class DescribeRankingCategoryModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRankingCategoryModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRankingCategoryModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRankingCategoryModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRankingCategoryModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRankingCategoryModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/ranking/namespace/{namespaceName}/categoryModel";

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

class GetRankingCategoryModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetRankingCategoryModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRankingCategoryModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetRankingCategoryModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRankingCategoryModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetRankingCategoryModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/ranking/namespace/{namespaceName}/categoryModel/{categoryName}";

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

class DescribeRankingNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRankingNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRankingNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRankingNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRankingNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRankingNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/ranking/namespace";

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

class GetRankingNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetRankingNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRankingNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetRankingNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRankingNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetRankingNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/ranking/namespace/{namespaceName}";

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

class DescribeShowcaseDisplayItemMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcaseDisplayItemMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcaseDisplayItemMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcaseDisplayItemMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcaseDisplayItemMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcaseDisplayItemMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace/{namespaceName}/showcase/{showcaseName}/displayItem";

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

class GetShowcaseDisplayItemMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseDisplayItemMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseDisplayItemMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseDisplayItemMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseDisplayItemMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseDisplayItemMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace/{namespaceName}/showcase/{showcaseName}/displayItem/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() === null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);

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

class DescribeShowcaseShowcaseMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcaseShowcaseMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcaseShowcaseMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcaseShowcaseMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcaseShowcaseMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcaseShowcaseMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace/{namespaceName}/showcase";

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

class GetShowcaseShowcaseMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseShowcaseMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseShowcaseMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseShowcaseMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseShowcaseMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseShowcaseMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace/{namespaceName}/showcase/{showcaseName}";

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

class DescribeShowcaseNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcaseNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcaseNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcaseNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcaseNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcaseNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace";

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

class GetShowcaseNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/showcase/namespace/{namespaceName}";

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

class DescribeStaminaStaminaModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminaStaminaModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminaStaminaModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminaStaminaModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminaStaminaModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminaStaminaModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/stamina/namespace/{namespaceName}/staminaModel";

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

class GetStaminaStaminaModelMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaStaminaModelMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaStaminaModelMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaStaminaModelMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaStaminaModelMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaStaminaModelMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/stamina/namespace/{namespaceName}/staminaModel/{staminaName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{staminaName}", $this->request->getStaminaName() === null|| strlen($this->request->getStaminaName()) == 0 ? "null" : $this->request->getStaminaName(), $url);

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

class DescribeStaminaNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStaminaNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStaminaNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStaminaNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStaminaNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStaminaNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/stamina/namespace";

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

class GetStaminaNamespaceMetricsTask extends Gs2RestSessionTask {

    /**
     * @var GetStaminaNamespaceMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStaminaNamespaceMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param GetStaminaNamespaceMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStaminaNamespaceMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            GetStaminaNamespaceMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "watch", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/metrics/stamina/namespace/{namespaceName}";

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
     * @param GetChartRequest $request
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
     * @param GetChartRequest $request
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
     * @param GetDistributionRequest $request
     * @return PromiseInterface
     */
    public function getDistributionAsync(
            GetDistributionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDistributionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDistributionRequest $request
     * @return GetDistributionResult
     */
    public function getDistribution (
            GetDistributionRequest $request
    ): GetDistributionResult {
        return $this->getDistributionAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCumulativeRequest $request
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
     * @param GetCumulativeRequest $request
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
     * @param DescribeBillingActivitiesRequest $request
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
     * @param DescribeBillingActivitiesRequest $request
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
     * @param GetBillingActivityRequest $request
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
     * @param GetBillingActivityRequest $request
     * @return GetBillingActivityResult
     */
    public function getBillingActivity (
            GetBillingActivityRequest $request
    ): GetBillingActivityResult {
        return $this->getBillingActivityAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGeneralMetricsRequest $request
     * @return PromiseInterface
     */
    public function getGeneralMetricsAsync(
            GetGeneralMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGeneralMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGeneralMetricsRequest $request
     * @return GetGeneralMetricsResult
     */
    public function getGeneralMetrics (
            GetGeneralMetricsRequest $request
    ): GetGeneralMetricsResult {
        return $this->getGeneralMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAccountNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeAccountNamespaceMetricsAsync(
            DescribeAccountNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAccountNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAccountNamespaceMetricsRequest $request
     * @return DescribeAccountNamespaceMetricsResult
     */
    public function describeAccountNamespaceMetrics (
            DescribeAccountNamespaceMetricsRequest $request
    ): DescribeAccountNamespaceMetricsResult {
        return $this->describeAccountNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAccountNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getAccountNamespaceMetricsAsync(
            GetAccountNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAccountNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAccountNamespaceMetricsRequest $request
     * @return GetAccountNamespaceMetricsResult
     */
    public function getAccountNamespaceMetrics (
            GetAccountNamespaceMetricsRequest $request
    ): GetAccountNamespaceMetricsResult {
        return $this->getAccountNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeChatNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeChatNamespaceMetricsAsync(
            DescribeChatNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeChatNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeChatNamespaceMetricsRequest $request
     * @return DescribeChatNamespaceMetricsResult
     */
    public function describeChatNamespaceMetrics (
            DescribeChatNamespaceMetricsRequest $request
    ): DescribeChatNamespaceMetricsResult {
        return $this->describeChatNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetChatNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getChatNamespaceMetricsAsync(
            GetChatNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetChatNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetChatNamespaceMetricsRequest $request
     * @return GetChatNamespaceMetricsResult
     */
    public function getChatNamespaceMetrics (
            GetChatNamespaceMetricsRequest $request
    ): GetChatNamespaceMetricsResult {
        return $this->getChatNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeDatastoreNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeDatastoreNamespaceMetricsAsync(
            DescribeDatastoreNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDatastoreNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDatastoreNamespaceMetricsRequest $request
     * @return DescribeDatastoreNamespaceMetricsResult
     */
    public function describeDatastoreNamespaceMetrics (
            DescribeDatastoreNamespaceMetricsRequest $request
    ): DescribeDatastoreNamespaceMetricsResult {
        return $this->describeDatastoreNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDatastoreNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getDatastoreNamespaceMetricsAsync(
            GetDatastoreNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDatastoreNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDatastoreNamespaceMetricsRequest $request
     * @return GetDatastoreNamespaceMetricsResult
     */
    public function getDatastoreNamespaceMetrics (
            GetDatastoreNamespaceMetricsRequest $request
    ): GetDatastoreNamespaceMetricsResult {
        return $this->getDatastoreNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeDictionaryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeDictionaryNamespaceMetricsAsync(
            DescribeDictionaryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDictionaryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDictionaryNamespaceMetricsRequest $request
     * @return DescribeDictionaryNamespaceMetricsResult
     */
    public function describeDictionaryNamespaceMetrics (
            DescribeDictionaryNamespaceMetricsRequest $request
    ): DescribeDictionaryNamespaceMetricsResult {
        return $this->describeDictionaryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDictionaryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getDictionaryNamespaceMetricsAsync(
            GetDictionaryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDictionaryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDictionaryNamespaceMetricsRequest $request
     * @return GetDictionaryNamespaceMetricsResult
     */
    public function getDictionaryNamespaceMetrics (
            GetDictionaryNamespaceMetricsRequest $request
    ): GetDictionaryNamespaceMetricsResult {
        return $this->getDictionaryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExchangeRateModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeExchangeRateModelMetricsAsync(
            DescribeExchangeRateModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExchangeRateModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeExchangeRateModelMetricsRequest $request
     * @return DescribeExchangeRateModelMetricsResult
     */
    public function describeExchangeRateModelMetrics (
            DescribeExchangeRateModelMetricsRequest $request
    ): DescribeExchangeRateModelMetricsResult {
        return $this->describeExchangeRateModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExchangeRateModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getExchangeRateModelMetricsAsync(
            GetExchangeRateModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExchangeRateModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetExchangeRateModelMetricsRequest $request
     * @return GetExchangeRateModelMetricsResult
     */
    public function getExchangeRateModelMetrics (
            GetExchangeRateModelMetricsRequest $request
    ): GetExchangeRateModelMetricsResult {
        return $this->getExchangeRateModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExchangeNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeExchangeNamespaceMetricsAsync(
            DescribeExchangeNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExchangeNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeExchangeNamespaceMetricsRequest $request
     * @return DescribeExchangeNamespaceMetricsResult
     */
    public function describeExchangeNamespaceMetrics (
            DescribeExchangeNamespaceMetricsRequest $request
    ): DescribeExchangeNamespaceMetricsResult {
        return $this->describeExchangeNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExchangeNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getExchangeNamespaceMetricsAsync(
            GetExchangeNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExchangeNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetExchangeNamespaceMetricsRequest $request
     * @return GetExchangeNamespaceMetricsResult
     */
    public function getExchangeNamespaceMetrics (
            GetExchangeNamespaceMetricsRequest $request
    ): GetExchangeNamespaceMetricsResult {
        return $this->getExchangeNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExperienceStatusMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeExperienceStatusMetricsAsync(
            DescribeExperienceStatusMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExperienceStatusMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeExperienceStatusMetricsRequest $request
     * @return DescribeExperienceStatusMetricsResult
     */
    public function describeExperienceStatusMetrics (
            DescribeExperienceStatusMetricsRequest $request
    ): DescribeExperienceStatusMetricsResult {
        return $this->describeExperienceStatusMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExperienceExperienceModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeExperienceExperienceModelMetricsAsync(
            DescribeExperienceExperienceModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExperienceExperienceModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeExperienceExperienceModelMetricsRequest $request
     * @return DescribeExperienceExperienceModelMetricsResult
     */
    public function describeExperienceExperienceModelMetrics (
            DescribeExperienceExperienceModelMetricsRequest $request
    ): DescribeExperienceExperienceModelMetricsResult {
        return $this->describeExperienceExperienceModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExperienceExperienceModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getExperienceExperienceModelMetricsAsync(
            GetExperienceExperienceModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExperienceExperienceModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetExperienceExperienceModelMetricsRequest $request
     * @return GetExperienceExperienceModelMetricsResult
     */
    public function getExperienceExperienceModelMetrics (
            GetExperienceExperienceModelMetricsRequest $request
    ): GetExperienceExperienceModelMetricsResult {
        return $this->getExperienceExperienceModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExperienceNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeExperienceNamespaceMetricsAsync(
            DescribeExperienceNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExperienceNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeExperienceNamespaceMetricsRequest $request
     * @return DescribeExperienceNamespaceMetricsResult
     */
    public function describeExperienceNamespaceMetrics (
            DescribeExperienceNamespaceMetricsRequest $request
    ): DescribeExperienceNamespaceMetricsResult {
        return $this->describeExperienceNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExperienceNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getExperienceNamespaceMetricsAsync(
            GetExperienceNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExperienceNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetExperienceNamespaceMetricsRequest $request
     * @return GetExperienceNamespaceMetricsResult
     */
    public function getExperienceNamespaceMetrics (
            GetExperienceNamespaceMetricsRequest $request
    ): GetExperienceNamespaceMetricsResult {
        return $this->getExperienceNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFormationFormMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeFormationFormMetricsAsync(
            DescribeFormationFormMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormationFormMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormationFormMetricsRequest $request
     * @return DescribeFormationFormMetricsResult
     */
    public function describeFormationFormMetrics (
            DescribeFormationFormMetricsRequest $request
    ): DescribeFormationFormMetricsResult {
        return $this->describeFormationFormMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFormationMoldMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeFormationMoldMetricsAsync(
            DescribeFormationMoldMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormationMoldMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormationMoldMetricsRequest $request
     * @return DescribeFormationMoldMetricsResult
     */
    public function describeFormationMoldMetrics (
            DescribeFormationMoldMetricsRequest $request
    ): DescribeFormationMoldMetricsResult {
        return $this->describeFormationMoldMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFormationNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeFormationNamespaceMetricsAsync(
            DescribeFormationNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormationNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormationNamespaceMetricsRequest $request
     * @return DescribeFormationNamespaceMetricsResult
     */
    public function describeFormationNamespaceMetrics (
            DescribeFormationNamespaceMetricsRequest $request
    ): DescribeFormationNamespaceMetricsResult {
        return $this->describeFormationNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormationNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getFormationNamespaceMetricsAsync(
            GetFormationNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormationNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormationNamespaceMetricsRequest $request
     * @return GetFormationNamespaceMetricsResult
     */
    public function getFormationNamespaceMetrics (
            GetFormationNamespaceMetricsRequest $request
    ): GetFormationNamespaceMetricsResult {
        return $this->getFormationNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFriendNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeFriendNamespaceMetricsAsync(
            DescribeFriendNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFriendNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFriendNamespaceMetricsRequest $request
     * @return DescribeFriendNamespaceMetricsResult
     */
    public function describeFriendNamespaceMetrics (
            DescribeFriendNamespaceMetricsRequest $request
    ): DescribeFriendNamespaceMetricsResult {
        return $this->describeFriendNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFriendNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getFriendNamespaceMetricsAsync(
            GetFriendNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFriendNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFriendNamespaceMetricsRequest $request
     * @return GetFriendNamespaceMetricsResult
     */
    public function getFriendNamespaceMetrics (
            GetFriendNamespaceMetricsRequest $request
    ): GetFriendNamespaceMetricsResult {
        return $this->getFriendNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInboxNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeInboxNamespaceMetricsAsync(
            DescribeInboxNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInboxNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInboxNamespaceMetricsRequest $request
     * @return DescribeInboxNamespaceMetricsResult
     */
    public function describeInboxNamespaceMetrics (
            DescribeInboxNamespaceMetricsRequest $request
    ): DescribeInboxNamespaceMetricsResult {
        return $this->describeInboxNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInboxNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getInboxNamespaceMetricsAsync(
            GetInboxNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInboxNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInboxNamespaceMetricsRequest $request
     * @return GetInboxNamespaceMetricsResult
     */
    public function getInboxNamespaceMetrics (
            GetInboxNamespaceMetricsRequest $request
    ): GetInboxNamespaceMetricsResult {
        return $this->getInboxNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoryItemSetMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeInventoryItemSetMetricsAsync(
            DescribeInventoryItemSetMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoryItemSetMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoryItemSetMetricsRequest $request
     * @return DescribeInventoryItemSetMetricsResult
     */
    public function describeInventoryItemSetMetrics (
            DescribeInventoryItemSetMetricsRequest $request
    ): DescribeInventoryItemSetMetricsResult {
        return $this->describeInventoryItemSetMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoryInventoryMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeInventoryInventoryMetricsAsync(
            DescribeInventoryInventoryMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoryInventoryMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoryInventoryMetricsRequest $request
     * @return DescribeInventoryInventoryMetricsResult
     */
    public function describeInventoryInventoryMetrics (
            DescribeInventoryInventoryMetricsRequest $request
    ): DescribeInventoryInventoryMetricsResult {
        return $this->describeInventoryInventoryMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeInventoryNamespaceMetricsAsync(
            DescribeInventoryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoryNamespaceMetricsRequest $request
     * @return DescribeInventoryNamespaceMetricsResult
     */
    public function describeInventoryNamespaceMetrics (
            DescribeInventoryNamespaceMetricsRequest $request
    ): DescribeInventoryNamespaceMetricsResult {
        return $this->describeInventoryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInventoryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getInventoryNamespaceMetricsAsync(
            GetInventoryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInventoryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInventoryNamespaceMetricsRequest $request
     * @return GetInventoryNamespaceMetricsResult
     */
    public function getInventoryNamespaceMetrics (
            GetInventoryNamespaceMetricsRequest $request
    ): GetInventoryNamespaceMetricsResult {
        return $this->getInventoryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeKeyNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeKeyNamespaceMetricsAsync(
            DescribeKeyNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeKeyNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeKeyNamespaceMetricsRequest $request
     * @return DescribeKeyNamespaceMetricsResult
     */
    public function describeKeyNamespaceMetrics (
            DescribeKeyNamespaceMetricsRequest $request
    ): DescribeKeyNamespaceMetricsResult {
        return $this->describeKeyNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetKeyNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getKeyNamespaceMetricsAsync(
            GetKeyNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetKeyNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetKeyNamespaceMetricsRequest $request
     * @return GetKeyNamespaceMetricsResult
     */
    public function getKeyNamespaceMetrics (
            GetKeyNamespaceMetricsRequest $request
    ): GetKeyNamespaceMetricsResult {
        return $this->getKeyNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLimitCounterMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeLimitCounterMetricsAsync(
            DescribeLimitCounterMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitCounterMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLimitCounterMetricsRequest $request
     * @return DescribeLimitCounterMetricsResult
     */
    public function describeLimitCounterMetrics (
            DescribeLimitCounterMetricsRequest $request
    ): DescribeLimitCounterMetricsResult {
        return $this->describeLimitCounterMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLimitLimitModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeLimitLimitModelMetricsAsync(
            DescribeLimitLimitModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitLimitModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLimitLimitModelMetricsRequest $request
     * @return DescribeLimitLimitModelMetricsResult
     */
    public function describeLimitLimitModelMetrics (
            DescribeLimitLimitModelMetricsRequest $request
    ): DescribeLimitLimitModelMetricsResult {
        return $this->describeLimitLimitModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLimitLimitModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getLimitLimitModelMetricsAsync(
            GetLimitLimitModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitLimitModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLimitLimitModelMetricsRequest $request
     * @return GetLimitLimitModelMetricsResult
     */
    public function getLimitLimitModelMetrics (
            GetLimitLimitModelMetricsRequest $request
    ): GetLimitLimitModelMetricsResult {
        return $this->getLimitLimitModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLimitNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeLimitNamespaceMetricsAsync(
            DescribeLimitNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLimitNamespaceMetricsRequest $request
     * @return DescribeLimitNamespaceMetricsResult
     */
    public function describeLimitNamespaceMetrics (
            DescribeLimitNamespaceMetricsRequest $request
    ): DescribeLimitNamespaceMetricsResult {
        return $this->describeLimitNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLimitNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getLimitNamespaceMetricsAsync(
            GetLimitNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLimitNamespaceMetricsRequest $request
     * @return GetLimitNamespaceMetricsResult
     */
    public function getLimitNamespaceMetrics (
            GetLimitNamespaceMetricsRequest $request
    ): GetLimitNamespaceMetricsResult {
        return $this->getLimitNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLotteryLotteryMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeLotteryLotteryMetricsAsync(
            DescribeLotteryLotteryMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLotteryLotteryMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLotteryLotteryMetricsRequest $request
     * @return DescribeLotteryLotteryMetricsResult
     */
    public function describeLotteryLotteryMetrics (
            DescribeLotteryLotteryMetricsRequest $request
    ): DescribeLotteryLotteryMetricsResult {
        return $this->describeLotteryLotteryMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLotteryLotteryMetricsRequest $request
     * @return PromiseInterface
     */
    public function getLotteryLotteryMetricsAsync(
            GetLotteryLotteryMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLotteryLotteryMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLotteryLotteryMetricsRequest $request
     * @return GetLotteryLotteryMetricsResult
     */
    public function getLotteryLotteryMetrics (
            GetLotteryLotteryMetricsRequest $request
    ): GetLotteryLotteryMetricsResult {
        return $this->getLotteryLotteryMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLotteryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeLotteryNamespaceMetricsAsync(
            DescribeLotteryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLotteryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLotteryNamespaceMetricsRequest $request
     * @return DescribeLotteryNamespaceMetricsResult
     */
    public function describeLotteryNamespaceMetrics (
            DescribeLotteryNamespaceMetricsRequest $request
    ): DescribeLotteryNamespaceMetricsResult {
        return $this->describeLotteryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLotteryNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getLotteryNamespaceMetricsAsync(
            GetLotteryNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLotteryNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLotteryNamespaceMetricsRequest $request
     * @return GetLotteryNamespaceMetricsResult
     */
    public function getLotteryNamespaceMetrics (
            GetLotteryNamespaceMetricsRequest $request
    ): GetLotteryNamespaceMetricsResult {
        return $this->getLotteryNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMatchmakingNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMatchmakingNamespaceMetricsAsync(
            DescribeMatchmakingNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMatchmakingNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMatchmakingNamespaceMetricsRequest $request
     * @return DescribeMatchmakingNamespaceMetricsResult
     */
    public function describeMatchmakingNamespaceMetrics (
            DescribeMatchmakingNamespaceMetricsRequest $request
    ): DescribeMatchmakingNamespaceMetricsResult {
        return $this->describeMatchmakingNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMatchmakingNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getMatchmakingNamespaceMetricsAsync(
            GetMatchmakingNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMatchmakingNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMatchmakingNamespaceMetricsRequest $request
     * @return GetMatchmakingNamespaceMetricsResult
     */
    public function getMatchmakingNamespaceMetrics (
            GetMatchmakingNamespaceMetricsRequest $request
    ): GetMatchmakingNamespaceMetricsResult {
        return $this->getMatchmakingNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionCounterMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMissionCounterMetricsAsync(
            DescribeMissionCounterMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionCounterMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionCounterMetricsRequest $request
     * @return DescribeMissionCounterMetricsResult
     */
    public function describeMissionCounterMetrics (
            DescribeMissionCounterMetricsRequest $request
    ): DescribeMissionCounterMetricsResult {
        return $this->describeMissionCounterMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionMissionGroupModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMissionMissionGroupModelMetricsAsync(
            DescribeMissionMissionGroupModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionMissionGroupModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionMissionGroupModelMetricsRequest $request
     * @return DescribeMissionMissionGroupModelMetricsResult
     */
    public function describeMissionMissionGroupModelMetrics (
            DescribeMissionMissionGroupModelMetricsRequest $request
    ): DescribeMissionMissionGroupModelMetricsResult {
        return $this->describeMissionMissionGroupModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionMissionGroupModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getMissionMissionGroupModelMetricsAsync(
            GetMissionMissionGroupModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionMissionGroupModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionMissionGroupModelMetricsRequest $request
     * @return GetMissionMissionGroupModelMetricsResult
     */
    public function getMissionMissionGroupModelMetrics (
            GetMissionMissionGroupModelMetricsRequest $request
    ): GetMissionMissionGroupModelMetricsResult {
        return $this->getMissionMissionGroupModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMissionNamespaceMetricsAsync(
            DescribeMissionNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionNamespaceMetricsRequest $request
     * @return DescribeMissionNamespaceMetricsResult
     */
    public function describeMissionNamespaceMetrics (
            DescribeMissionNamespaceMetricsRequest $request
    ): DescribeMissionNamespaceMetricsResult {
        return $this->describeMissionNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getMissionNamespaceMetricsAsync(
            GetMissionNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionNamespaceMetricsRequest $request
     * @return GetMissionNamespaceMetricsResult
     */
    public function getMissionNamespaceMetrics (
            GetMissionNamespaceMetricsRequest $request
    ): GetMissionNamespaceMetricsResult {
        return $this->getMissionNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoneyWalletMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMoneyWalletMetricsAsync(
            DescribeMoneyWalletMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoneyWalletMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoneyWalletMetricsRequest $request
     * @return DescribeMoneyWalletMetricsResult
     */
    public function describeMoneyWalletMetrics (
            DescribeMoneyWalletMetricsRequest $request
    ): DescribeMoneyWalletMetricsResult {
        return $this->describeMoneyWalletMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoneyReceiptMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMoneyReceiptMetricsAsync(
            DescribeMoneyReceiptMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoneyReceiptMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoneyReceiptMetricsRequest $request
     * @return DescribeMoneyReceiptMetricsResult
     */
    public function describeMoneyReceiptMetrics (
            DescribeMoneyReceiptMetricsRequest $request
    ): DescribeMoneyReceiptMetricsResult {
        return $this->describeMoneyReceiptMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoneyNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMoneyNamespaceMetricsAsync(
            DescribeMoneyNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoneyNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoneyNamespaceMetricsRequest $request
     * @return DescribeMoneyNamespaceMetricsResult
     */
    public function describeMoneyNamespaceMetrics (
            DescribeMoneyNamespaceMetricsRequest $request
    ): DescribeMoneyNamespaceMetricsResult {
        return $this->describeMoneyNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMoneyNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getMoneyNamespaceMetricsAsync(
            GetMoneyNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoneyNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMoneyNamespaceMetricsRequest $request
     * @return GetMoneyNamespaceMetricsResult
     */
    public function getMoneyNamespaceMetrics (
            GetMoneyNamespaceMetricsRequest $request
    ): GetMoneyNamespaceMetricsResult {
        return $this->getMoneyNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeQuestQuestModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeQuestQuestModelMetricsAsync(
            DescribeQuestQuestModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestQuestModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeQuestQuestModelMetricsRequest $request
     * @return DescribeQuestQuestModelMetricsResult
     */
    public function describeQuestQuestModelMetrics (
            DescribeQuestQuestModelMetricsRequest $request
    ): DescribeQuestQuestModelMetricsResult {
        return $this->describeQuestQuestModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetQuestQuestModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getQuestQuestModelMetricsAsync(
            GetQuestQuestModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestQuestModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetQuestQuestModelMetricsRequest $request
     * @return GetQuestQuestModelMetricsResult
     */
    public function getQuestQuestModelMetrics (
            GetQuestQuestModelMetricsRequest $request
    ): GetQuestQuestModelMetricsResult {
        return $this->getQuestQuestModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeQuestQuestGroupModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeQuestQuestGroupModelMetricsAsync(
            DescribeQuestQuestGroupModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestQuestGroupModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeQuestQuestGroupModelMetricsRequest $request
     * @return DescribeQuestQuestGroupModelMetricsResult
     */
    public function describeQuestQuestGroupModelMetrics (
            DescribeQuestQuestGroupModelMetricsRequest $request
    ): DescribeQuestQuestGroupModelMetricsResult {
        return $this->describeQuestQuestGroupModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetQuestQuestGroupModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getQuestQuestGroupModelMetricsAsync(
            GetQuestQuestGroupModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestQuestGroupModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetQuestQuestGroupModelMetricsRequest $request
     * @return GetQuestQuestGroupModelMetricsResult
     */
    public function getQuestQuestGroupModelMetrics (
            GetQuestQuestGroupModelMetricsRequest $request
    ): GetQuestQuestGroupModelMetricsResult {
        return $this->getQuestQuestGroupModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeQuestNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeQuestNamespaceMetricsAsync(
            DescribeQuestNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeQuestNamespaceMetricsRequest $request
     * @return DescribeQuestNamespaceMetricsResult
     */
    public function describeQuestNamespaceMetrics (
            DescribeQuestNamespaceMetricsRequest $request
    ): DescribeQuestNamespaceMetricsResult {
        return $this->describeQuestNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetQuestNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getQuestNamespaceMetricsAsync(
            GetQuestNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetQuestNamespaceMetricsRequest $request
     * @return GetQuestNamespaceMetricsResult
     */
    public function getQuestNamespaceMetrics (
            GetQuestNamespaceMetricsRequest $request
    ): GetQuestNamespaceMetricsResult {
        return $this->getQuestNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRankingCategoryModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeRankingCategoryModelMetricsAsync(
            DescribeRankingCategoryModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRankingCategoryModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRankingCategoryModelMetricsRequest $request
     * @return DescribeRankingCategoryModelMetricsResult
     */
    public function describeRankingCategoryModelMetrics (
            DescribeRankingCategoryModelMetricsRequest $request
    ): DescribeRankingCategoryModelMetricsResult {
        return $this->describeRankingCategoryModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRankingCategoryModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getRankingCategoryModelMetricsAsync(
            GetRankingCategoryModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRankingCategoryModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRankingCategoryModelMetricsRequest $request
     * @return GetRankingCategoryModelMetricsResult
     */
    public function getRankingCategoryModelMetrics (
            GetRankingCategoryModelMetricsRequest $request
    ): GetRankingCategoryModelMetricsResult {
        return $this->getRankingCategoryModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRankingNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeRankingNamespaceMetricsAsync(
            DescribeRankingNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRankingNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRankingNamespaceMetricsRequest $request
     * @return DescribeRankingNamespaceMetricsResult
     */
    public function describeRankingNamespaceMetrics (
            DescribeRankingNamespaceMetricsRequest $request
    ): DescribeRankingNamespaceMetricsResult {
        return $this->describeRankingNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRankingNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getRankingNamespaceMetricsAsync(
            GetRankingNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRankingNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRankingNamespaceMetricsRequest $request
     * @return GetRankingNamespaceMetricsResult
     */
    public function getRankingNamespaceMetrics (
            GetRankingNamespaceMetricsRequest $request
    ): GetRankingNamespaceMetricsResult {
        return $this->getRankingNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcaseDisplayItemMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeShowcaseDisplayItemMetricsAsync(
            DescribeShowcaseDisplayItemMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcaseDisplayItemMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcaseDisplayItemMetricsRequest $request
     * @return DescribeShowcaseDisplayItemMetricsResult
     */
    public function describeShowcaseDisplayItemMetrics (
            DescribeShowcaseDisplayItemMetricsRequest $request
    ): DescribeShowcaseDisplayItemMetricsResult {
        return $this->describeShowcaseDisplayItemMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseDisplayItemMetricsRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseDisplayItemMetricsAsync(
            GetShowcaseDisplayItemMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseDisplayItemMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseDisplayItemMetricsRequest $request
     * @return GetShowcaseDisplayItemMetricsResult
     */
    public function getShowcaseDisplayItemMetrics (
            GetShowcaseDisplayItemMetricsRequest $request
    ): GetShowcaseDisplayItemMetricsResult {
        return $this->getShowcaseDisplayItemMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcaseShowcaseMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeShowcaseShowcaseMetricsAsync(
            DescribeShowcaseShowcaseMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcaseShowcaseMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcaseShowcaseMetricsRequest $request
     * @return DescribeShowcaseShowcaseMetricsResult
     */
    public function describeShowcaseShowcaseMetrics (
            DescribeShowcaseShowcaseMetricsRequest $request
    ): DescribeShowcaseShowcaseMetricsResult {
        return $this->describeShowcaseShowcaseMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseShowcaseMetricsRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseShowcaseMetricsAsync(
            GetShowcaseShowcaseMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseShowcaseMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseShowcaseMetricsRequest $request
     * @return GetShowcaseShowcaseMetricsResult
     */
    public function getShowcaseShowcaseMetrics (
            GetShowcaseShowcaseMetricsRequest $request
    ): GetShowcaseShowcaseMetricsResult {
        return $this->getShowcaseShowcaseMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcaseNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeShowcaseNamespaceMetricsAsync(
            DescribeShowcaseNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcaseNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeShowcaseNamespaceMetricsRequest $request
     * @return DescribeShowcaseNamespaceMetricsResult
     */
    public function describeShowcaseNamespaceMetrics (
            DescribeShowcaseNamespaceMetricsRequest $request
    ): DescribeShowcaseNamespaceMetricsResult {
        return $this->describeShowcaseNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getShowcaseNamespaceMetricsAsync(
            GetShowcaseNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetShowcaseNamespaceMetricsRequest $request
     * @return GetShowcaseNamespaceMetricsResult
     */
    public function getShowcaseNamespaceMetrics (
            GetShowcaseNamespaceMetricsRequest $request
    ): GetShowcaseNamespaceMetricsResult {
        return $this->getShowcaseNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminaStaminaModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeStaminaStaminaModelMetricsAsync(
            DescribeStaminaStaminaModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminaStaminaModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminaStaminaModelMetricsRequest $request
     * @return DescribeStaminaStaminaModelMetricsResult
     */
    public function describeStaminaStaminaModelMetrics (
            DescribeStaminaStaminaModelMetricsRequest $request
    ): DescribeStaminaStaminaModelMetricsResult {
        return $this->describeStaminaStaminaModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaStaminaModelMetricsRequest $request
     * @return PromiseInterface
     */
    public function getStaminaStaminaModelMetricsAsync(
            GetStaminaStaminaModelMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaStaminaModelMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaStaminaModelMetricsRequest $request
     * @return GetStaminaStaminaModelMetricsResult
     */
    public function getStaminaStaminaModelMetrics (
            GetStaminaStaminaModelMetricsRequest $request
    ): GetStaminaStaminaModelMetricsResult {
        return $this->getStaminaStaminaModelMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStaminaNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeStaminaNamespaceMetricsAsync(
            DescribeStaminaNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStaminaNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStaminaNamespaceMetricsRequest $request
     * @return DescribeStaminaNamespaceMetricsResult
     */
    public function describeStaminaNamespaceMetrics (
            DescribeStaminaNamespaceMetricsRequest $request
    ): DescribeStaminaNamespaceMetricsResult {
        return $this->describeStaminaNamespaceMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStaminaNamespaceMetricsRequest $request
     * @return PromiseInterface
     */
    public function getStaminaNamespaceMetricsAsync(
            GetStaminaNamespaceMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStaminaNamespaceMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStaminaNamespaceMetricsRequest $request
     * @return GetStaminaNamespaceMetricsResult
     */
    public function getStaminaNamespaceMetrics (
            GetStaminaNamespaceMetricsRequest $request
    ): GetStaminaNamespaceMetricsResult {
        return $this->getStaminaNamespaceMetricsAsync(
            $request
        )->wait();
    }
}