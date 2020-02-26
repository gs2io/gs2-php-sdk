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

namespace Gs2\News;

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
use Gs2\News\Request\DescribeNamespacesRequest;
use Gs2\News\Result\DescribeNamespacesResult;
use Gs2\News\Request\CreateNamespaceRequest;
use Gs2\News\Result\CreateNamespaceResult;
use Gs2\News\Request\GetNamespaceStatusRequest;
use Gs2\News\Result\GetNamespaceStatusResult;
use Gs2\News\Request\GetNamespaceRequest;
use Gs2\News\Result\GetNamespaceResult;
use Gs2\News\Request\UpdateNamespaceRequest;
use Gs2\News\Result\UpdateNamespaceResult;
use Gs2\News\Request\DeleteNamespaceRequest;
use Gs2\News\Result\DeleteNamespaceResult;
use Gs2\News\Request\PrepareUpdateCurrentNewsMasterRequest;
use Gs2\News\Result\PrepareUpdateCurrentNewsMasterResult;
use Gs2\News\Request\UpdateCurrentNewsMasterRequest;
use Gs2\News\Result\UpdateCurrentNewsMasterResult;
use Gs2\News\Request\PrepareUpdateCurrentNewsMasterFromGitHubRequest;
use Gs2\News\Result\PrepareUpdateCurrentNewsMasterFromGitHubResult;
use Gs2\News\Request\DescribeNewsRequest;
use Gs2\News\Result\DescribeNewsResult;
use Gs2\News\Request\DescribeNewsByUserIdRequest;
use Gs2\News\Result\DescribeNewsByUserIdResult;
use Gs2\News\Request\WantGrantRequest;
use Gs2\News\Result\WantGrantResult;
use Gs2\News\Request\WantGrantByUserIdRequest;
use Gs2\News\Result\WantGrantByUserIdResult;

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class PrepareUpdateCurrentNewsMasterTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUpdateCurrentNewsMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUpdateCurrentNewsMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUpdateCurrentNewsMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUpdateCurrentNewsMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUpdateCurrentNewsMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/prepare";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
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

class UpdateCurrentNewsMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentNewsMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentNewsMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentNewsMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentNewsMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentNewsMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getUploadToken() != null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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

class PrepareUpdateCurrentNewsMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUpdateCurrentNewsMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUpdateCurrentNewsMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUpdateCurrentNewsMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() != null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
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

class DescribeNewsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNewsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNewsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNewsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNewsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNewsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/news";

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeNewsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNewsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNewsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNewsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNewsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNewsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/news";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class WantGrantTask extends Gs2RestSessionTask {

    /**
     * @var WantGrantRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WantGrantTask constructor.
     * @param Gs2RestSession $session
     * @param WantGrantRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WantGrantRequest $request
    ) {
        parent::__construct(
            $session,
            WantGrantResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/news/grant";

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class WantGrantByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var WantGrantByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WantGrantByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param WantGrantByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WantGrantByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            WantGrantByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/news/grant";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 News API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2NewsRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * ネームスペースの一覧を取得します<br>
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
     * ネームスペースの一覧を取得します<br>
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
     * ネームスペースを新規作成します<br>
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
     * ネームスペースを新規作成します<br>
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
     * ネームスペースの状態を取得します<br>
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
     * ネームスペースの状態を取得します<br>
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
     * ネームスペースを取得します<br>
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
     * ネームスペースを取得します<br>
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
     * ネームスペースを更新します<br>
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
     * ネームスペースを更新します<br>
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
     * ネームスペースを削除します<br>
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
     * ネームスペースを削除します<br>
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
     * 現在有効なお知らせを更新準備する<br>
     *   <br>
     *   応答に含まれるURLにサイトデータを圧縮したzipファイルをアップロードし<br>
     *   アップロード完了後に updateCurrentNewsMaster を呼び出して反映します。<br>
     *   <br>
     *   zipファイルをアップロードする際には Content-Type に application/zip を指定する必要があります。<br>
     *
     * @param PrepareUpdateCurrentNewsMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareUpdateCurrentNewsMasterAsync(
            PrepareUpdateCurrentNewsMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUpdateCurrentNewsMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なお知らせを更新準備する<br>
     *   <br>
     *   応答に含まれるURLにサイトデータを圧縮したzipファイルをアップロードし<br>
     *   アップロード完了後に updateCurrentNewsMaster を呼び出して反映します。<br>
     *   <br>
     *   zipファイルをアップロードする際には Content-Type に application/zip を指定する必要があります。<br>
     *
     * @param PrepareUpdateCurrentNewsMasterRequest $request リクエストパラメータ
     * @return PrepareUpdateCurrentNewsMasterResult
     */
    public function prepareUpdateCurrentNewsMaster (
            PrepareUpdateCurrentNewsMasterRequest $request
    ): PrepareUpdateCurrentNewsMasterResult {

        $resultAsyncResult = [];
        $this->prepareUpdateCurrentNewsMasterAsync(
            $request
        )->then(
            function (PrepareUpdateCurrentNewsMasterResult $result) use (&$resultAsyncResult) {
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
     * 現在有効なお知らせを更新します<br>
     *
     * @param UpdateCurrentNewsMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentNewsMasterAsync(
            UpdateCurrentNewsMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentNewsMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なお知らせを更新します<br>
     *
     * @param UpdateCurrentNewsMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentNewsMasterResult
     */
    public function updateCurrentNewsMaster (
            UpdateCurrentNewsMasterRequest $request
    ): UpdateCurrentNewsMasterResult {

        $resultAsyncResult = [];
        $this->updateCurrentNewsMasterAsync(
            $request
        )->then(
            function (UpdateCurrentNewsMasterResult $result) use (&$resultAsyncResult) {
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
     * 現在有効なお知らせを更新します<br>
     *
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareUpdateCurrentNewsMasterFromGitHubAsync(
            PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUpdateCurrentNewsMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なお知らせを更新します<br>
     *
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request リクエストパラメータ
     * @return PrepareUpdateCurrentNewsMasterFromGitHubResult
     */
    public function prepareUpdateCurrentNewsMasterFromGitHub (
            PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ): PrepareUpdateCurrentNewsMasterFromGitHubResult {

        $resultAsyncResult = [];
        $this->prepareUpdateCurrentNewsMasterFromGitHubAsync(
            $request
        )->then(
            function (PrepareUpdateCurrentNewsMasterFromGitHubResult $result) use (&$resultAsyncResult) {
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
     * お知らせ記事の一覧を取得<br>
     *
     * @param DescribeNewsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeNewsAsync(
            DescribeNewsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNewsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * お知らせ記事の一覧を取得<br>
     *
     * @param DescribeNewsRequest $request リクエストパラメータ
     * @return DescribeNewsResult
     */
    public function describeNews (
            DescribeNewsRequest $request
    ): DescribeNewsResult {

        $resultAsyncResult = [];
        $this->describeNewsAsync(
            $request
        )->then(
            function (DescribeNewsResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してお知らせ記事の一覧を取得<br>
     *
     * @param DescribeNewsByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeNewsByUserIdAsync(
            DescribeNewsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNewsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してお知らせ記事の一覧を取得<br>
     *
     * @param DescribeNewsByUserIdRequest $request リクエストパラメータ
     * @return DescribeNewsByUserIdResult
     */
    public function describeNewsByUserId (
            DescribeNewsByUserIdRequest $request
    ): DescribeNewsByUserIdResult {

        $resultAsyncResult = [];
        $this->describeNewsByUserIdAsync(
            $request
        )->then(
            function (DescribeNewsByUserIdResult $result) use (&$resultAsyncResult) {
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
     * お知らせ記事に加算<br>
     *
     * @param WantGrantRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function wantGrantAsync(
            WantGrantRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WantGrantTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * お知らせ記事に加算<br>
     *
     * @param WantGrantRequest $request リクエストパラメータ
     * @return WantGrantResult
     */
    public function wantGrant (
            WantGrantRequest $request
    ): WantGrantResult {

        $resultAsyncResult = [];
        $this->wantGrantAsync(
            $request
        )->then(
            function (WantGrantResult $result) use (&$resultAsyncResult) {
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
     * お知らせ記事に加算<br>
     *
     * @param WantGrantByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function wantGrantByUserIdAsync(
            WantGrantByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WantGrantByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * お知らせ記事に加算<br>
     *
     * @param WantGrantByUserIdRequest $request リクエストパラメータ
     * @return WantGrantByUserIdResult
     */
    public function wantGrantByUserId (
            WantGrantByUserIdRequest $request
    ): WantGrantByUserIdResult {

        $resultAsyncResult = [];
        $this->wantGrantByUserIdAsync(
            $request
        )->then(
            function (WantGrantByUserIdResult $result) use (&$resultAsyncResult) {
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