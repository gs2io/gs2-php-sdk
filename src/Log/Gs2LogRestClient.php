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

namespace Gs2\Log;

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


use Gs2\Log\Request\DescribeNamespacesRequest;
use Gs2\Log\Result\DescribeNamespacesResult;
use Gs2\Log\Request\CreateNamespaceRequest;
use Gs2\Log\Result\CreateNamespaceResult;
use Gs2\Log\Request\GetNamespaceStatusRequest;
use Gs2\Log\Result\GetNamespaceStatusResult;
use Gs2\Log\Request\GetNamespaceRequest;
use Gs2\Log\Result\GetNamespaceResult;
use Gs2\Log\Request\UpdateNamespaceRequest;
use Gs2\Log\Result\UpdateNamespaceResult;
use Gs2\Log\Request\DeleteNamespaceRequest;
use Gs2\Log\Result\DeleteNamespaceResult;
use Gs2\Log\Request\GetServiceVersionRequest;
use Gs2\Log\Result\GetServiceVersionResult;
use Gs2\Log\Request\QueryAccessLogRequest;
use Gs2\Log\Result\QueryAccessLogResult;
use Gs2\Log\Request\CountAccessLogRequest;
use Gs2\Log\Result\CountAccessLogResult;
use Gs2\Log\Request\QueryIssueStampSheetLogRequest;
use Gs2\Log\Result\QueryIssueStampSheetLogResult;
use Gs2\Log\Request\CountIssueStampSheetLogRequest;
use Gs2\Log\Result\CountIssueStampSheetLogResult;
use Gs2\Log\Request\QueryExecuteStampSheetLogRequest;
use Gs2\Log\Result\QueryExecuteStampSheetLogResult;
use Gs2\Log\Request\CountExecuteStampSheetLogRequest;
use Gs2\Log\Result\CountExecuteStampSheetLogResult;
use Gs2\Log\Request\QueryExecuteStampTaskLogRequest;
use Gs2\Log\Result\QueryExecuteStampTaskLogResult;
use Gs2\Log\Request\CountExecuteStampTaskLogRequest;
use Gs2\Log\Result\CountExecuteStampTaskLogResult;
use Gs2\Log\Request\QueryInGameLogRequest;
use Gs2\Log\Result\QueryInGameLogResult;
use Gs2\Log\Request\SendInGameLogRequest;
use Gs2\Log\Result\SendInGameLogResult;
use Gs2\Log\Request\SendInGameLogByUserIdRequest;
use Gs2\Log\Result\SendInGameLogByUserIdResult;
use Gs2\Log\Request\QueryAccessLogWithTelemetryRequest;
use Gs2\Log\Result\QueryAccessLogWithTelemetryResult;
use Gs2\Log\Request\DescribeInsightsRequest;
use Gs2\Log\Result\DescribeInsightsResult;
use Gs2\Log\Request\CreateInsightRequest;
use Gs2\Log\Result\CreateInsightResult;
use Gs2\Log\Request\GetInsightRequest;
use Gs2\Log\Result\GetInsightResult;
use Gs2\Log\Request\DeleteInsightRequest;
use Gs2\Log\Result\DeleteInsightResult;
use Gs2\Log\Request\DescribeFacetModelsRequest;
use Gs2\Log\Result\DescribeFacetModelsResult;
use Gs2\Log\Request\CreateFacetModelRequest;
use Gs2\Log\Result\CreateFacetModelResult;
use Gs2\Log\Request\GetFacetModelRequest;
use Gs2\Log\Result\GetFacetModelResult;
use Gs2\Log\Request\UpdateFacetModelRequest;
use Gs2\Log\Result\UpdateFacetModelResult;
use Gs2\Log\Request\DeleteFacetModelRequest;
use Gs2\Log\Result\DeleteFacetModelResult;
use Gs2\Log\Request\DescribeDashboardsRequest;
use Gs2\Log\Result\DescribeDashboardsResult;
use Gs2\Log\Request\CreateDashboardRequest;
use Gs2\Log\Result\CreateDashboardResult;
use Gs2\Log\Request\GetDashboardRequest;
use Gs2\Log\Result\GetDashboardResult;
use Gs2\Log\Request\UpdateDashboardRequest;
use Gs2\Log\Result\UpdateDashboardResult;
use Gs2\Log\Request\DuplicateDashboardRequest;
use Gs2\Log\Result\DuplicateDashboardResult;
use Gs2\Log\Request\DeleteDashboardRequest;
use Gs2\Log\Result\DeleteDashboardResult;
use Gs2\Log\Request\QueryLogRequest;
use Gs2\Log\Result\QueryLogResult;
use Gs2\Log\Request\GetLogRequest;
use Gs2\Log\Result\GetLogResult;
use Gs2\Log\Request\QueryFacetsRequest;
use Gs2\Log\Result\QueryFacetsResult;
use Gs2\Log\Request\QueryTimeseriesRequest;
use Gs2\Log\Result\QueryTimeseriesResult;
use Gs2\Log\Request\GetTraceRequest;
use Gs2\Log\Result\GetTraceResult;
use Gs2\Log\Request\QueryMetricsTimeseriesRequest;
use Gs2\Log\Result\QueryMetricsTimeseriesResult;
use Gs2\Log\Request\DescribeMetricsRequest;
use Gs2\Log\Result\DescribeMetricsResult;
use Gs2\Log\Request\DescribeLabelValuesRequest;
use Gs2\Log\Result\DescribeLabelValuesResult;

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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getGcpCredentialJson() !== null) {
            $json["gcpCredentialJson"] = $this->request->getGcpCredentialJson();
        }
        if ($this->request->getBigQueryDatasetName() !== null) {
            $json["bigQueryDatasetName"] = $this->request->getBigQueryDatasetName();
        }
        if ($this->request->getLogExpireDays() !== null) {
            $json["logExpireDays"] = $this->request->getLogExpireDays();
        }
        if ($this->request->getAwsRegion() !== null) {
            $json["awsRegion"] = $this->request->getAwsRegion();
        }
        if ($this->request->getAwsAccessKeyId() !== null) {
            $json["awsAccessKeyId"] = $this->request->getAwsAccessKeyId();
        }
        if ($this->request->getAwsSecretAccessKey() !== null) {
            $json["awsSecretAccessKey"] = $this->request->getAwsSecretAccessKey();
        }
        if ($this->request->getFirehoseStreamName() !== null) {
            $json["firehoseStreamName"] = $this->request->getFirehoseStreamName();
        }
        if ($this->request->getFirehoseCompressData() !== null) {
            $json["firehoseCompressData"] = $this->request->getFirehoseCompressData();
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getGcpCredentialJson() !== null) {
            $json["gcpCredentialJson"] = $this->request->getGcpCredentialJson();
        }
        if ($this->request->getBigQueryDatasetName() !== null) {
            $json["bigQueryDatasetName"] = $this->request->getBigQueryDatasetName();
        }
        if ($this->request->getLogExpireDays() !== null) {
            $json["logExpireDays"] = $this->request->getLogExpireDays();
        }
        if ($this->request->getAwsRegion() !== null) {
            $json["awsRegion"] = $this->request->getAwsRegion();
        }
        if ($this->request->getAwsAccessKeyId() !== null) {
            $json["awsAccessKeyId"] = $this->request->getAwsAccessKeyId();
        }
        if ($this->request->getAwsSecretAccessKey() !== null) {
            $json["awsSecretAccessKey"] = $this->request->getAwsSecretAccessKey();
        }
        if ($this->request->getFirehoseStreamName() !== null) {
            $json["firehoseStreamName"] = $this->request->getFirehoseStreamName();
        }
        if ($this->request->getFirehoseCompressData() !== null) {
            $json["firehoseCompressData"] = $this->request->getFirehoseCompressData();
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

class QueryAccessLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryAccessLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryAccessLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryAccessLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryAccessLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryAccessLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/access";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class CountAccessLogTask extends Gs2RestSessionTask {

    /**
     * @var CountAccessLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountAccessLogTask constructor.
     * @param Gs2RestSession $session
     * @param CountAccessLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountAccessLogRequest $request
    ) {
        parent::__construct(
            $session,
            CountAccessLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/access/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService() ? "true" : "false";
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod() ? "true" : "false";
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId() ? "true" : "false";
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class QueryIssueStampSheetLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryIssueStampSheetLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryIssueStampSheetLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryIssueStampSheetLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryIssueStampSheetLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryIssueStampSheetLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/issue/stamp/sheet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class CountIssueStampSheetLogTask extends Gs2RestSessionTask {

    /**
     * @var CountIssueStampSheetLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountIssueStampSheetLogTask constructor.
     * @param Gs2RestSession $session
     * @param CountIssueStampSheetLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountIssueStampSheetLogRequest $request
    ) {
        parent::__construct(
            $session,
            CountIssueStampSheetLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/issue/stamp/sheet/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService() ? "true" : "false";
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod() ? "true" : "false";
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId() ? "true" : "false";
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction() ? "true" : "false";
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class QueryExecuteStampSheetLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryExecuteStampSheetLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryExecuteStampSheetLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryExecuteStampSheetLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryExecuteStampSheetLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryExecuteStampSheetLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/execute/stamp/sheet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class CountExecuteStampSheetLogTask extends Gs2RestSessionTask {

    /**
     * @var CountExecuteStampSheetLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountExecuteStampSheetLogTask constructor.
     * @param Gs2RestSession $session
     * @param CountExecuteStampSheetLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountExecuteStampSheetLogRequest $request
    ) {
        parent::__construct(
            $session,
            CountExecuteStampSheetLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/execute/stamp/sheet/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService() ? "true" : "false";
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod() ? "true" : "false";
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId() ? "true" : "false";
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction() ? "true" : "false";
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class QueryExecuteStampTaskLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryExecuteStampTaskLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryExecuteStampTaskLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryExecuteStampTaskLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryExecuteStampTaskLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryExecuteStampTaskLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/execute/stamp/task";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class CountExecuteStampTaskLogTask extends Gs2RestSessionTask {

    /**
     * @var CountExecuteStampTaskLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountExecuteStampTaskLogTask constructor.
     * @param Gs2RestSession $session
     * @param CountExecuteStampTaskLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountExecuteStampTaskLogRequest $request
    ) {
        parent::__construct(
            $session,
            CountExecuteStampTaskLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/execute/stamp/task/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService() ? "true" : "false";
        }
        if ($this->request->getMethod() !== null) {
            $queryStrings["method"] = $this->request->getMethod() ? "true" : "false";
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId() ? "true" : "false";
        }
        if ($this->request->getAction() !== null) {
            $queryStrings["action"] = $this->request->getAction() ? "true" : "false";
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class QueryInGameLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryInGameLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryInGameLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryInGameLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryInGameLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryInGameLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ingame/log";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getTags() !== null) {
            $array = [];
            foreach ($this->request->getTags() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["tags"] = $array;
        }
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $json["longTerm"] = $this->request->getLongTerm();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SendInGameLogTask extends Gs2RestSessionTask {

    /**
     * @var SendInGameLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendInGameLogTask constructor.
     * @param Gs2RestSession $session
     * @param SendInGameLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendInGameLogRequest $request
    ) {
        parent::__construct(
            $session,
            SendInGameLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ingame/log/user/me/send";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTags() !== null) {
            $array = [];
            foreach ($this->request->getTags() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["tags"] = $array;
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
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

class SendInGameLogByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SendInGameLogByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendInGameLogByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SendInGameLogByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendInGameLogByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SendInGameLogByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/ingame/log/user/{userId}/send";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTags() !== null) {
            $array = [];
            foreach ($this->request->getTags() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["tags"] = $array;
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
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

class QueryAccessLogWithTelemetryTask extends Gs2RestSessionTask {

    /**
     * @var QueryAccessLogWithTelemetryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryAccessLogWithTelemetryTask constructor.
     * @param Gs2RestSession $session
     * @param QueryAccessLogWithTelemetryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryAccessLogWithTelemetryRequest $request
    ) {
        parent::__construct(
            $session,
            QueryAccessLogWithTelemetryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/access/telemetry";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
        }
        if ($this->request->getLongTerm() !== null) {
            $queryStrings["longTerm"] = $this->request->getLongTerm() ? "true" : "false";
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

class DescribeInsightsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInsightsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInsightsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInsightsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInsightsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInsightsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/insight";

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

class CreateInsightTask extends Gs2RestSessionTask {

    /**
     * @var CreateInsightRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateInsightTask constructor.
     * @param Gs2RestSession $session
     * @param CreateInsightRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateInsightRequest $request
    ) {
        parent::__construct(
            $session,
            CreateInsightResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/insight";

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

class GetInsightTask extends Gs2RestSessionTask {

    /**
     * @var GetInsightRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInsightTask constructor.
     * @param Gs2RestSession $session
     * @param GetInsightRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInsightRequest $request
    ) {
        parent::__construct(
            $session,
            GetInsightResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/insight/{insightName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{insightName}", $this->request->getInsightName() === null|| strlen($this->request->getInsightName()) == 0 ? "null" : $this->request->getInsightName(), $url);

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

class DeleteInsightTask extends Gs2RestSessionTask {

    /**
     * @var DeleteInsightRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteInsightTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteInsightRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteInsightRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteInsightResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/insight/{insightName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{insightName}", $this->request->getInsightName() === null|| strlen($this->request->getInsightName()) == 0 ? "null" : $this->request->getInsightName(), $url);

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

class DescribeFacetModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFacetModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFacetModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFacetModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFacetModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFacetModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/facet";

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

class CreateFacetModelTask extends Gs2RestSessionTask {

    /**
     * @var CreateFacetModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateFacetModelTask constructor.
     * @param Gs2RestSession $session
     * @param CreateFacetModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateFacetModelRequest $request
    ) {
        parent::__construct(
            $session,
            CreateFacetModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/facet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getField() !== null) {
            $json["field"] = $this->request->getField();
        }
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getOrder() !== null) {
            $json["order"] = $this->request->getOrder();
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

class GetFacetModelTask extends Gs2RestSessionTask {

    /**
     * @var GetFacetModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFacetModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetFacetModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFacetModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetFacetModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/facet/{field}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{field}", $this->request->getField() === null|| strlen($this->request->getField()) == 0 ? "null" : $this->request->getField(), $url);

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

class UpdateFacetModelTask extends Gs2RestSessionTask {

    /**
     * @var UpdateFacetModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateFacetModelTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateFacetModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateFacetModelRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateFacetModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/facet/{field}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{field}", $this->request->getField() === null|| strlen($this->request->getField()) == 0 ? "null" : $this->request->getField(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getOrder() !== null) {
            $json["order"] = $this->request->getOrder();
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

class DeleteFacetModelTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFacetModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFacetModelTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFacetModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFacetModelRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFacetModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/facet/{field}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{field}", $this->request->getField() === null|| strlen($this->request->getField()) == 0 ? "null" : $this->request->getField(), $url);

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

class DescribeDashboardsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDashboardsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDashboardsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDashboardsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDashboardsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDashboardsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard";

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

class CreateDashboardTask extends Gs2RestSessionTask {

    /**
     * @var CreateDashboardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateDashboardTask constructor.
     * @param Gs2RestSession $session
     * @param CreateDashboardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateDashboardRequest $request
    ) {
        parent::__construct(
            $session,
            CreateDashboardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

class GetDashboardTask extends Gs2RestSessionTask {

    /**
     * @var GetDashboardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDashboardTask constructor.
     * @param Gs2RestSession $session
     * @param GetDashboardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDashboardRequest $request
    ) {
        parent::__construct(
            $session,
            GetDashboardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard/{dashboardName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dashboardName}", $this->request->getDashboardName() === null|| strlen($this->request->getDashboardName()) == 0 ? "null" : $this->request->getDashboardName(), $url);

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

class UpdateDashboardTask extends Gs2RestSessionTask {

    /**
     * @var UpdateDashboardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateDashboardTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateDashboardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateDashboardRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateDashboardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard/{dashboardName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dashboardName}", $this->request->getDashboardName() === null|| strlen($this->request->getDashboardName()) == 0 ? "null" : $this->request->getDashboardName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
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

class DuplicateDashboardTask extends Gs2RestSessionTask {

    /**
     * @var DuplicateDashboardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DuplicateDashboardTask constructor.
     * @param Gs2RestSession $session
     * @param DuplicateDashboardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DuplicateDashboardRequest $request
    ) {
        parent::__construct(
            $session,
            DuplicateDashboardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard/{dashboardName}/copy";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dashboardName}", $this->request->getDashboardName() === null|| strlen($this->request->getDashboardName()) == 0 ? "null" : $this->request->getDashboardName(), $url);

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

class DeleteDashboardTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDashboardRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDashboardTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDashboardRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDashboardRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDashboardResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/dashboard/{dashboardName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dashboardName}", $this->request->getDashboardName() === null|| strlen($this->request->getDashboardName()) == 0 ? "null" : $this->request->getDashboardName(), $url);

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

class QueryLogTask extends Gs2RestSessionTask {

    /**
     * @var QueryLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryLogTask constructor.
     * @param Gs2RestSession $session
     * @param QueryLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryLogRequest $request
    ) {
        parent::__construct(
            $session,
            QueryLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/v2/query";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getQuery() !== null) {
            $json["query"] = $this->request->getQuery();
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

class GetLogTask extends Gs2RestSessionTask {

    /**
     * @var GetLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLogTask constructor.
     * @param Gs2RestSession $session
     * @param GetLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLogRequest $request
    ) {
        parent::__construct(
            $session,
            GetLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/v2/query/{logRequestId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{logRequestId}", $this->request->getLogRequestId() === null|| strlen($this->request->getLogRequestId()) == 0 ? "null" : $this->request->getLogRequestId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
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

class QueryFacetsTask extends Gs2RestSessionTask {

    /**
     * @var QueryFacetsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryFacetsTask constructor.
     * @param Gs2RestSession $session
     * @param QueryFacetsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryFacetsRequest $request
    ) {
        parent::__construct(
            $session,
            QueryFacetsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/v2/query/facet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getQuery() !== null) {
            $json["query"] = $this->request->getQuery();
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

class QueryTimeseriesTask extends Gs2RestSessionTask {

    /**
     * @var QueryTimeseriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryTimeseriesTask constructor.
     * @param Gs2RestSession $session
     * @param QueryTimeseriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryTimeseriesRequest $request
    ) {
        parent::__construct(
            $session,
            QueryTimeseriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/v2/timeseries";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getQuery() !== null) {
            $json["query"] = $this->request->getQuery();
        }
        if ($this->request->getGroupBy() !== null) {
            $array = [];
            foreach ($this->request->getGroupBy() as $item)
            {
                array_push($array, $item);
            }
            $json["groupBy"] = $array;
        }
        if ($this->request->getAggregation() !== null) {
            $json["aggregation"] = $this->request->getAggregation()->toJson();
        }
        if ($this->request->getInterval() !== null) {
            $json["interval"] = $this->request->getInterval();
        }
        if ($this->request->getSeriesLimit() !== null) {
            $json["seriesLimit"] = $this->request->getSeriesLimit();
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

class GetTraceTask extends Gs2RestSessionTask {

    /**
     * @var GetTraceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTraceTask constructor.
     * @param Gs2RestSession $session
     * @param GetTraceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTraceRequest $request
    ) {
        parent::__construct(
            $session,
            GetTraceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/log/v2/trace/{traceId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{traceId}", $this->request->getTraceId() === null|| strlen($this->request->getTraceId()) == 0 ? "null" : $this->request->getTraceId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getBegin() !== null) {
            $queryStrings["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $queryStrings["end"] = $this->request->getEnd();
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

class QueryMetricsTimeseriesTask extends Gs2RestSessionTask {

    /**
     * @var QueryMetricsTimeseriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * QueryMetricsTimeseriesTask constructor.
     * @param Gs2RestSession $session
     * @param QueryMetricsTimeseriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        QueryMetricsTimeseriesRequest $request
    ) {
        parent::__construct(
            $session,
            QueryMetricsTimeseriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/metrics/timeseries";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBegin() !== null) {
            $json["begin"] = $this->request->getBegin();
        }
        if ($this->request->getEnd() !== null) {
            $json["end"] = $this->request->getEnd();
        }
        if ($this->request->getQuery() !== null) {
            $json["query"] = $this->request->getQuery();
        }
        if ($this->request->getGroupBy() !== null) {
            $array = [];
            foreach ($this->request->getGroupBy() as $item)
            {
                array_push($array, $item);
            }
            $json["groupBy"] = $array;
        }
        if ($this->request->getAggregations() !== null) {
            $array = [];
            foreach ($this->request->getAggregations() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["aggregations"] = $array;
        }
        if ($this->request->getInterval() !== null) {
            $json["interval"] = $this->request->getInterval();
        }
        if ($this->request->getSeriesLimit() !== null) {
            $json["seriesLimit"] = $this->request->getSeriesLimit();
        }
        if ($this->request->getOrderKey() !== null) {
            $json["orderKey"] = $this->request->getOrderKey();
        }
        if ($this->request->getOrderBy() !== null) {
            $json["orderBy"] = $this->request->getOrderBy();
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

class DescribeMetricsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMetricsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMetricsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMetricsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMetricsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMetricsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/metrics";

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

class DescribeLabelValuesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLabelValuesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLabelValuesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLabelValuesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLabelValuesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLabelValuesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/metrics/{metricName}/label";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{metricName}", $this->request->getMetricName() === null|| strlen($this->request->getMetricName()) == 0 ? "null" : $this->request->getMetricName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getLabelNamePrefix() !== null) {
            $queryStrings["labelNamePrefix"] = $this->request->getLabelNamePrefix();
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

/**
 * GS2 Log API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LogRestClient extends AbstractGs2Client {

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
     * @param QueryAccessLogRequest $request
     * @return PromiseInterface
     */
    public function queryAccessLogAsync(
            QueryAccessLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryAccessLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryAccessLogRequest $request
     * @return QueryAccessLogResult
     */
    public function queryAccessLog (
            QueryAccessLogRequest $request
    ): QueryAccessLogResult {
        return $this->queryAccessLogAsync(
            $request
        )->wait();
    }

    /**
     * @param CountAccessLogRequest $request
     * @return PromiseInterface
     */
    public function countAccessLogAsync(
            CountAccessLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountAccessLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountAccessLogRequest $request
     * @return CountAccessLogResult
     */
    public function countAccessLog (
            CountAccessLogRequest $request
    ): CountAccessLogResult {
        return $this->countAccessLogAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryIssueStampSheetLogRequest $request
     * @return PromiseInterface
     */
    public function queryIssueStampSheetLogAsync(
            QueryIssueStampSheetLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryIssueStampSheetLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryIssueStampSheetLogRequest $request
     * @return QueryIssueStampSheetLogResult
     */
    public function queryIssueStampSheetLog (
            QueryIssueStampSheetLogRequest $request
    ): QueryIssueStampSheetLogResult {
        return $this->queryIssueStampSheetLogAsync(
            $request
        )->wait();
    }

    /**
     * @param CountIssueStampSheetLogRequest $request
     * @return PromiseInterface
     */
    public function countIssueStampSheetLogAsync(
            CountIssueStampSheetLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountIssueStampSheetLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountIssueStampSheetLogRequest $request
     * @return CountIssueStampSheetLogResult
     */
    public function countIssueStampSheetLog (
            CountIssueStampSheetLogRequest $request
    ): CountIssueStampSheetLogResult {
        return $this->countIssueStampSheetLogAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryExecuteStampSheetLogRequest $request
     * @return PromiseInterface
     */
    public function queryExecuteStampSheetLogAsync(
            QueryExecuteStampSheetLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryExecuteStampSheetLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryExecuteStampSheetLogRequest $request
     * @return QueryExecuteStampSheetLogResult
     */
    public function queryExecuteStampSheetLog (
            QueryExecuteStampSheetLogRequest $request
    ): QueryExecuteStampSheetLogResult {
        return $this->queryExecuteStampSheetLogAsync(
            $request
        )->wait();
    }

    /**
     * @param CountExecuteStampSheetLogRequest $request
     * @return PromiseInterface
     */
    public function countExecuteStampSheetLogAsync(
            CountExecuteStampSheetLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountExecuteStampSheetLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountExecuteStampSheetLogRequest $request
     * @return CountExecuteStampSheetLogResult
     */
    public function countExecuteStampSheetLog (
            CountExecuteStampSheetLogRequest $request
    ): CountExecuteStampSheetLogResult {
        return $this->countExecuteStampSheetLogAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryExecuteStampTaskLogRequest $request
     * @return PromiseInterface
     */
    public function queryExecuteStampTaskLogAsync(
            QueryExecuteStampTaskLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryExecuteStampTaskLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryExecuteStampTaskLogRequest $request
     * @return QueryExecuteStampTaskLogResult
     */
    public function queryExecuteStampTaskLog (
            QueryExecuteStampTaskLogRequest $request
    ): QueryExecuteStampTaskLogResult {
        return $this->queryExecuteStampTaskLogAsync(
            $request
        )->wait();
    }

    /**
     * @param CountExecuteStampTaskLogRequest $request
     * @return PromiseInterface
     */
    public function countExecuteStampTaskLogAsync(
            CountExecuteStampTaskLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountExecuteStampTaskLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountExecuteStampTaskLogRequest $request
     * @return CountExecuteStampTaskLogResult
     */
    public function countExecuteStampTaskLog (
            CountExecuteStampTaskLogRequest $request
    ): CountExecuteStampTaskLogResult {
        return $this->countExecuteStampTaskLogAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryInGameLogRequest $request
     * @return PromiseInterface
     */
    public function queryInGameLogAsync(
            QueryInGameLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryInGameLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryInGameLogRequest $request
     * @return QueryInGameLogResult
     */
    public function queryInGameLog (
            QueryInGameLogRequest $request
    ): QueryInGameLogResult {
        return $this->queryInGameLogAsync(
            $request
        )->wait();
    }

    /**
     * @param SendInGameLogRequest $request
     * @return PromiseInterface
     */
    public function sendInGameLogAsync(
            SendInGameLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendInGameLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendInGameLogRequest $request
     * @return SendInGameLogResult
     */
    public function sendInGameLog (
            SendInGameLogRequest $request
    ): SendInGameLogResult {
        return $this->sendInGameLogAsync(
            $request
        )->wait();
    }

    /**
     * @param SendInGameLogByUserIdRequest $request
     * @return PromiseInterface
     */
    public function sendInGameLogByUserIdAsync(
            SendInGameLogByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendInGameLogByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendInGameLogByUserIdRequest $request
     * @return SendInGameLogByUserIdResult
     */
    public function sendInGameLogByUserId (
            SendInGameLogByUserIdRequest $request
    ): SendInGameLogByUserIdResult {
        return $this->sendInGameLogByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryAccessLogWithTelemetryRequest $request
     * @return PromiseInterface
     */
    public function queryAccessLogWithTelemetryAsync(
            QueryAccessLogWithTelemetryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryAccessLogWithTelemetryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryAccessLogWithTelemetryRequest $request
     * @return QueryAccessLogWithTelemetryResult
     */
    public function queryAccessLogWithTelemetry (
            QueryAccessLogWithTelemetryRequest $request
    ): QueryAccessLogWithTelemetryResult {
        return $this->queryAccessLogWithTelemetryAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInsightsRequest $request
     * @return PromiseInterface
     */
    public function describeInsightsAsync(
            DescribeInsightsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInsightsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInsightsRequest $request
     * @return DescribeInsightsResult
     */
    public function describeInsights (
            DescribeInsightsRequest $request
    ): DescribeInsightsResult {
        return $this->describeInsightsAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateInsightRequest $request
     * @return PromiseInterface
     */
    public function createInsightAsync(
            CreateInsightRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateInsightTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateInsightRequest $request
     * @return CreateInsightResult
     */
    public function createInsight (
            CreateInsightRequest $request
    ): CreateInsightResult {
        return $this->createInsightAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInsightRequest $request
     * @return PromiseInterface
     */
    public function getInsightAsync(
            GetInsightRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInsightTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInsightRequest $request
     * @return GetInsightResult
     */
    public function getInsight (
            GetInsightRequest $request
    ): GetInsightResult {
        return $this->getInsightAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteInsightRequest $request
     * @return PromiseInterface
     */
    public function deleteInsightAsync(
            DeleteInsightRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteInsightTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteInsightRequest $request
     * @return DeleteInsightResult
     */
    public function deleteInsight (
            DeleteInsightRequest $request
    ): DeleteInsightResult {
        return $this->deleteInsightAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFacetModelsRequest $request
     * @return PromiseInterface
     */
    public function describeFacetModelsAsync(
            DescribeFacetModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFacetModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFacetModelsRequest $request
     * @return DescribeFacetModelsResult
     */
    public function describeFacetModels (
            DescribeFacetModelsRequest $request
    ): DescribeFacetModelsResult {
        return $this->describeFacetModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateFacetModelRequest $request
     * @return PromiseInterface
     */
    public function createFacetModelAsync(
            CreateFacetModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateFacetModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateFacetModelRequest $request
     * @return CreateFacetModelResult
     */
    public function createFacetModel (
            CreateFacetModelRequest $request
    ): CreateFacetModelResult {
        return $this->createFacetModelAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFacetModelRequest $request
     * @return PromiseInterface
     */
    public function getFacetModelAsync(
            GetFacetModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFacetModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFacetModelRequest $request
     * @return GetFacetModelResult
     */
    public function getFacetModel (
            GetFacetModelRequest $request
    ): GetFacetModelResult {
        return $this->getFacetModelAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateFacetModelRequest $request
     * @return PromiseInterface
     */
    public function updateFacetModelAsync(
            UpdateFacetModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateFacetModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateFacetModelRequest $request
     * @return UpdateFacetModelResult
     */
    public function updateFacetModel (
            UpdateFacetModelRequest $request
    ): UpdateFacetModelResult {
        return $this->updateFacetModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFacetModelRequest $request
     * @return PromiseInterface
     */
    public function deleteFacetModelAsync(
            DeleteFacetModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFacetModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFacetModelRequest $request
     * @return DeleteFacetModelResult
     */
    public function deleteFacetModel (
            DeleteFacetModelRequest $request
    ): DeleteFacetModelResult {
        return $this->deleteFacetModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeDashboardsRequest $request
     * @return PromiseInterface
     */
    public function describeDashboardsAsync(
            DescribeDashboardsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDashboardsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDashboardsRequest $request
     * @return DescribeDashboardsResult
     */
    public function describeDashboards (
            DescribeDashboardsRequest $request
    ): DescribeDashboardsResult {
        return $this->describeDashboardsAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateDashboardRequest $request
     * @return PromiseInterface
     */
    public function createDashboardAsync(
            CreateDashboardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateDashboardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateDashboardRequest $request
     * @return CreateDashboardResult
     */
    public function createDashboard (
            CreateDashboardRequest $request
    ): CreateDashboardResult {
        return $this->createDashboardAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDashboardRequest $request
     * @return PromiseInterface
     */
    public function getDashboardAsync(
            GetDashboardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDashboardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDashboardRequest $request
     * @return GetDashboardResult
     */
    public function getDashboard (
            GetDashboardRequest $request
    ): GetDashboardResult {
        return $this->getDashboardAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateDashboardRequest $request
     * @return PromiseInterface
     */
    public function updateDashboardAsync(
            UpdateDashboardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateDashboardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateDashboardRequest $request
     * @return UpdateDashboardResult
     */
    public function updateDashboard (
            UpdateDashboardRequest $request
    ): UpdateDashboardResult {
        return $this->updateDashboardAsync(
            $request
        )->wait();
    }

    /**
     * @param DuplicateDashboardRequest $request
     * @return PromiseInterface
     */
    public function duplicateDashboardAsync(
            DuplicateDashboardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DuplicateDashboardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DuplicateDashboardRequest $request
     * @return DuplicateDashboardResult
     */
    public function duplicateDashboard (
            DuplicateDashboardRequest $request
    ): DuplicateDashboardResult {
        return $this->duplicateDashboardAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteDashboardRequest $request
     * @return PromiseInterface
     */
    public function deleteDashboardAsync(
            DeleteDashboardRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDashboardTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteDashboardRequest $request
     * @return DeleteDashboardResult
     */
    public function deleteDashboard (
            DeleteDashboardRequest $request
    ): DeleteDashboardResult {
        return $this->deleteDashboardAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryLogRequest $request
     * @return PromiseInterface
     */
    public function queryLogAsync(
            QueryLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryLogRequest $request
     * @return QueryLogResult
     */
    public function queryLog (
            QueryLogRequest $request
    ): QueryLogResult {
        return $this->queryLogAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLogRequest $request
     * @return PromiseInterface
     */
    public function getLogAsync(
            GetLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLogRequest $request
     * @return GetLogResult
     */
    public function getLog (
            GetLogRequest $request
    ): GetLogResult {
        return $this->getLogAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryFacetsRequest $request
     * @return PromiseInterface
     */
    public function queryFacetsAsync(
            QueryFacetsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryFacetsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryFacetsRequest $request
     * @return QueryFacetsResult
     */
    public function queryFacets (
            QueryFacetsRequest $request
    ): QueryFacetsResult {
        return $this->queryFacetsAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryTimeseriesRequest $request
     * @return PromiseInterface
     */
    public function queryTimeseriesAsync(
            QueryTimeseriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryTimeseriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryTimeseriesRequest $request
     * @return QueryTimeseriesResult
     */
    public function queryTimeseries (
            QueryTimeseriesRequest $request
    ): QueryTimeseriesResult {
        return $this->queryTimeseriesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTraceRequest $request
     * @return PromiseInterface
     */
    public function getTraceAsync(
            GetTraceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTraceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetTraceRequest $request
     * @return GetTraceResult
     */
    public function getTrace (
            GetTraceRequest $request
    ): GetTraceResult {
        return $this->getTraceAsync(
            $request
        )->wait();
    }

    /**
     * @param QueryMetricsTimeseriesRequest $request
     * @return PromiseInterface
     */
    public function queryMetricsTimeseriesAsync(
            QueryMetricsTimeseriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new QueryMetricsTimeseriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param QueryMetricsTimeseriesRequest $request
     * @return QueryMetricsTimeseriesResult
     */
    public function queryMetricsTimeseries (
            QueryMetricsTimeseriesRequest $request
    ): QueryMetricsTimeseriesResult {
        return $this->queryMetricsTimeseriesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMetricsRequest $request
     * @return PromiseInterface
     */
    public function describeMetricsAsync(
            DescribeMetricsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMetricsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMetricsRequest $request
     * @return DescribeMetricsResult
     */
    public function describeMetrics (
            DescribeMetricsRequest $request
    ): DescribeMetricsResult {
        return $this->describeMetricsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLabelValuesRequest $request
     * @return PromiseInterface
     */
    public function describeLabelValuesAsync(
            DescribeLabelValuesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLabelValuesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLabelValuesRequest $request
     * @return DescribeLabelValuesResult
     */
    public function describeLabelValues (
            DescribeLabelValuesRequest $request
    ): DescribeLabelValuesResult {
        return $this->describeLabelValuesAsync(
            $request
        )->wait();
    }
}