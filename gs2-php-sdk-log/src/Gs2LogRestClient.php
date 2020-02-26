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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getType() != null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getGcpCredentialJson() != null) {
            $json["gcpCredentialJson"] = $this->request->getGcpCredentialJson();
        }
        if ($this->request->getBigQueryDatasetName() != null) {
            $json["bigQueryDatasetName"] = $this->request->getBigQueryDatasetName();
        }
        if ($this->request->getLogExpireDays() != null) {
            $json["logExpireDays"] = $this->request->getLogExpireDays();
        }
        if ($this->request->getAwsRegion() != null) {
            $json["awsRegion"] = $this->request->getAwsRegion();
        }
        if ($this->request->getAwsAccessKeyId() != null) {
            $json["awsAccessKeyId"] = $this->request->getAwsAccessKeyId();
        }
        if ($this->request->getAwsSecretAccessKey() != null) {
            $json["awsSecretAccessKey"] = $this->request->getAwsSecretAccessKey();
        }
        if ($this->request->getFirehoseStreamName() != null) {
            $json["firehoseStreamName"] = $this->request->getFirehoseStreamName();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getType() != null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getGcpCredentialJson() != null) {
            $json["gcpCredentialJson"] = $this->request->getGcpCredentialJson();
        }
        if ($this->request->getBigQueryDatasetName() != null) {
            $json["bigQueryDatasetName"] = $this->request->getBigQueryDatasetName();
        }
        if ($this->request->getLogExpireDays() != null) {
            $json["logExpireDays"] = $this->request->getLogExpireDays();
        }
        if ($this->request->getAwsRegion() != null) {
            $json["awsRegion"] = $this->request->getAwsRegion();
        }
        if ($this->request->getAwsAccessKeyId() != null) {
            $json["awsAccessKeyId"] = $this->request->getAwsAccessKeyId();
        }
        if ($this->request->getAwsSecretAccessKey() != null) {
            $json["awsSecretAccessKey"] = $this->request->getAwsSecretAccessKey();
        }
        if ($this->request->getFirehoseStreamName() != null) {
            $json["firehoseStreamName"] = $this->request->getFirehoseStreamName();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/access";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/access/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/issue/stamp/sheet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/issue/stamp/sheet/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/execute/stamp/sheet";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/execute/stamp/sheet/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/execute/stamp/task";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "log", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/log/execute/stamp/task/count";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getService() != null) {
            $queryStrings["service"] = $this->request->getService();
        }
        if ($this->request->getMethod() != null) {
            $queryStrings["method"] = $this->request->getMethod();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getAction() != null) {
            $queryStrings["action"] = $this->request->getAction();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
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
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
     * @return DescribeNamespacesResult
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {

        $resultAsyncResult = [];
        $this->describeNamespacesAsync(
            $request
        )->then(
            function (DescribeNamespacesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
     * @return CreateNamespaceResult
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {

        $resultAsyncResult = [];
        $this->createNamespaceAsync(
            $request
        )->then(
            function (CreateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースの状態を取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
     * ネームスペースの状態を取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {

        $resultAsyncResult = [];
        $this->getNamespaceStatusAsync(
            $request
        )->then(
            function (GetNamespaceStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
     * @return GetNamespaceResult
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {

        $resultAsyncResult = [];
        $this->getNamespaceAsync(
            $request
        )->then(
            function (GetNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
     * @return UpdateNamespaceResult
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {

        $resultAsyncResult = [];
        $this->updateNamespaceAsync(
            $request
        )->then(
            function (UpdateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
     * @return DeleteNamespaceResult
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {

        $resultAsyncResult = [];
        $this->deleteNamespaceAsync(
            $request
        )->then(
            function (DeleteNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * アクセスログの一覧を取得<br>
     *
     * @param QueryAccessLogRequest $request リクエストパラメータ
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
     * アクセスログの一覧を取得<br>
     *
     * @param QueryAccessLogRequest $request リクエストパラメータ
     * @return QueryAccessLogResult
     */
    public function queryAccessLog (
            QueryAccessLogRequest $request
    ): QueryAccessLogResult {

        $resultAsyncResult = [];
        $this->queryAccessLogAsync(
            $request
        )->then(
            function (QueryAccessLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * アクセスログの一覧を取得<br>
     *
     * @param CountAccessLogRequest $request リクエストパラメータ
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
     * アクセスログの一覧を取得<br>
     *
     * @param CountAccessLogRequest $request リクエストパラメータ
     * @return CountAccessLogResult
     */
    public function countAccessLog (
            CountAccessLogRequest $request
    ): CountAccessLogResult {

        $resultAsyncResult = [];
        $this->countAccessLogAsync(
            $request
        )->then(
            function (CountAccessLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシート発行ログの一覧を取得<br>
     *
     * @param QueryIssueStampSheetLogRequest $request リクエストパラメータ
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
     * スタンプシート発行ログの一覧を取得<br>
     *
     * @param QueryIssueStampSheetLogRequest $request リクエストパラメータ
     * @return QueryIssueStampSheetLogResult
     */
    public function queryIssueStampSheetLog (
            QueryIssueStampSheetLogRequest $request
    ): QueryIssueStampSheetLogResult {

        $resultAsyncResult = [];
        $this->queryIssueStampSheetLogAsync(
            $request
        )->then(
            function (QueryIssueStampSheetLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシート発行ログの一覧を取得<br>
     *
     * @param CountIssueStampSheetLogRequest $request リクエストパラメータ
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
     * スタンプシート発行ログの一覧を取得<br>
     *
     * @param CountIssueStampSheetLogRequest $request リクエストパラメータ
     * @return CountIssueStampSheetLogResult
     */
    public function countIssueStampSheetLog (
            CountIssueStampSheetLogRequest $request
    ): CountIssueStampSheetLogResult {

        $resultAsyncResult = [];
        $this->countIssueStampSheetLogAsync(
            $request
        )->then(
            function (CountIssueStampSheetLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシート実行ログの一覧を取得<br>
     *
     * @param QueryExecuteStampSheetLogRequest $request リクエストパラメータ
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
     * スタンプシート実行ログの一覧を取得<br>
     *
     * @param QueryExecuteStampSheetLogRequest $request リクエストパラメータ
     * @return QueryExecuteStampSheetLogResult
     */
    public function queryExecuteStampSheetLog (
            QueryExecuteStampSheetLogRequest $request
    ): QueryExecuteStampSheetLogResult {

        $resultAsyncResult = [];
        $this->queryExecuteStampSheetLogAsync(
            $request
        )->then(
            function (QueryExecuteStampSheetLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプシート実行ログの一覧を取得<br>
     *
     * @param CountExecuteStampSheetLogRequest $request リクエストパラメータ
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
     * スタンプシート実行ログの一覧を取得<br>
     *
     * @param CountExecuteStampSheetLogRequest $request リクエストパラメータ
     * @return CountExecuteStampSheetLogResult
     */
    public function countExecuteStampSheetLog (
            CountExecuteStampSheetLogRequest $request
    ): CountExecuteStampSheetLogResult {

        $resultAsyncResult = [];
        $this->countExecuteStampSheetLogAsync(
            $request
        )->then(
            function (CountExecuteStampSheetLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプタスク実行ログの一覧を取得<br>
     *
     * @param QueryExecuteStampTaskLogRequest $request リクエストパラメータ
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
     * スタンプタスク実行ログの一覧を取得<br>
     *
     * @param QueryExecuteStampTaskLogRequest $request リクエストパラメータ
     * @return QueryExecuteStampTaskLogResult
     */
    public function queryExecuteStampTaskLog (
            QueryExecuteStampTaskLogRequest $request
    ): QueryExecuteStampTaskLogResult {

        $resultAsyncResult = [];
        $this->queryExecuteStampTaskLogAsync(
            $request
        )->then(
            function (QueryExecuteStampTaskLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * スタンプタスク実行ログの一覧を取得<br>
     *
     * @param CountExecuteStampTaskLogRequest $request リクエストパラメータ
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
     * スタンプタスク実行ログの一覧を取得<br>
     *
     * @param CountExecuteStampTaskLogRequest $request リクエストパラメータ
     * @return CountExecuteStampTaskLogResult
     */
    public function countExecuteStampTaskLog (
            CountExecuteStampTaskLogRequest $request
    ): CountExecuteStampTaskLogResult {

        $resultAsyncResult = [];
        $this->countExecuteStampTaskLogAsync(
            $request
        )->then(
            function (CountExecuteStampTaskLogResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }
}