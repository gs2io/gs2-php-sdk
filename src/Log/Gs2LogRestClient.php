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
}