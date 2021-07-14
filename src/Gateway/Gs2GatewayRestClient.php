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

namespace Gs2\Gateway;

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


use Gs2\Gateway\Request\DescribeNamespacesRequest;
use Gs2\Gateway\Result\DescribeNamespacesResult;
use Gs2\Gateway\Request\CreateNamespaceRequest;
use Gs2\Gateway\Result\CreateNamespaceResult;
use Gs2\Gateway\Request\GetNamespaceStatusRequest;
use Gs2\Gateway\Result\GetNamespaceStatusResult;
use Gs2\Gateway\Request\GetNamespaceRequest;
use Gs2\Gateway\Result\GetNamespaceResult;
use Gs2\Gateway\Request\UpdateNamespaceRequest;
use Gs2\Gateway\Result\UpdateNamespaceResult;
use Gs2\Gateway\Request\DeleteNamespaceRequest;
use Gs2\Gateway\Result\DeleteNamespaceResult;
use Gs2\Gateway\Request\DescribeWebSocketSessionsRequest;
use Gs2\Gateway\Result\DescribeWebSocketSessionsResult;
use Gs2\Gateway\Request\DescribeWebSocketSessionsByUserIdRequest;
use Gs2\Gateway\Result\DescribeWebSocketSessionsByUserIdResult;
use Gs2\Gateway\Request\SetUserIdRequest;
use Gs2\Gateway\Result\SetUserIdResult;
use Gs2\Gateway\Request\SetUserIdByUserIdRequest;
use Gs2\Gateway\Result\SetUserIdByUserIdResult;
use Gs2\Gateway\Request\SendNotificationRequest;
use Gs2\Gateway\Result\SendNotificationResult;
use Gs2\Gateway\Request\SetFirebaseTokenRequest;
use Gs2\Gateway\Result\SetFirebaseTokenResult;
use Gs2\Gateway\Request\SetFirebaseTokenByUserIdRequest;
use Gs2\Gateway\Result\SetFirebaseTokenByUserIdResult;
use Gs2\Gateway\Request\GetFirebaseTokenRequest;
use Gs2\Gateway\Result\GetFirebaseTokenResult;
use Gs2\Gateway\Request\GetFirebaseTokenByUserIdRequest;
use Gs2\Gateway\Result\GetFirebaseTokenByUserIdResult;
use Gs2\Gateway\Request\DeleteFirebaseTokenRequest;
use Gs2\Gateway\Result\DeleteFirebaseTokenResult;
use Gs2\Gateway\Request\DeleteFirebaseTokenByUserIdRequest;
use Gs2\Gateway\Result\DeleteFirebaseTokenByUserIdResult;
use Gs2\Gateway\Request\SendMobileNotificationByUserIdRequest;
use Gs2\Gateway\Result\SendMobileNotificationByUserIdResult;

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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getFirebaseSecret() !== null) {
            $json["firebaseSecret"] = $this->request->getFirebaseSecret();
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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getFirebaseSecret() !== null) {
            $json["firebaseSecret"] = $this->request->getFirebaseSecret();
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

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeWebSocketSessionsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeWebSocketSessionsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeWebSocketSessionsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeWebSocketSessionsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeWebSocketSessionsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeWebSocketSessionsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/session/user/me";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeWebSocketSessionsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeWebSocketSessionsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeWebSocketSessionsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeWebSocketSessionsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeWebSocketSessionsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeWebSocketSessionsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/session/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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

class SetUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/session/user/me/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getAllowConcurrentAccess() !== null) {
            $json["allowConcurrentAccess"] = $this->request->getAllowConcurrentAccess();
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

        return parent::executeImpl();
    }
}

class SetUserIdByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetUserIdByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetUserIdByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetUserIdByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetUserIdByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetUserIdByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/session/user/{userId}/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAllowConcurrentAccess() !== null) {
            $json["allowConcurrentAccess"] = $this->request->getAllowConcurrentAccess();
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

class SendNotificationTask extends Gs2RestSessionTask {

    /**
     * @var SendNotificationRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendNotificationTask constructor.
     * @param Gs2RestSession $session
     * @param SendNotificationRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendNotificationRequest $request
    ) {
        parent::__construct(
            $session,
            SendNotificationResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/session/user/{userId}/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getSubject() !== null) {
            $json["subject"] = $this->request->getSubject();
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
        }
        if ($this->request->getEnableTransferMobileNotification() !== null) {
            $json["enableTransferMobileNotification"] = $this->request->getEnableTransferMobileNotification();
        }
        if ($this->request->getSound() !== null) {
            $json["sound"] = $this->request->getSound();
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

class SetFirebaseTokenTask extends Gs2RestSessionTask {

    /**
     * @var SetFirebaseTokenRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFirebaseTokenTask constructor.
     * @param Gs2RestSession $session
     * @param SetFirebaseTokenRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFirebaseTokenRequest $request
    ) {
        parent::__construct(
            $session,
            SetFirebaseTokenResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/firebase/token";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getToken() !== null) {
            $json["token"] = $this->request->getToken();
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

        return parent::executeImpl();
    }
}

class SetFirebaseTokenByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetFirebaseTokenByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFirebaseTokenByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetFirebaseTokenByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFirebaseTokenByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetFirebaseTokenByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/firebase/token";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getToken() !== null) {
            $json["token"] = $this->request->getToken();
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

class GetFirebaseTokenTask extends Gs2RestSessionTask {

    /**
     * @var GetFirebaseTokenRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFirebaseTokenTask constructor.
     * @param Gs2RestSession $session
     * @param GetFirebaseTokenRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFirebaseTokenRequest $request
    ) {
        parent::__construct(
            $session,
            GetFirebaseTokenResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/firebase/token";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetFirebaseTokenByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFirebaseTokenByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFirebaseTokenByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFirebaseTokenByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFirebaseTokenByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFirebaseTokenByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/firebase/token";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        return parent::executeImpl();
    }
}

class DeleteFirebaseTokenTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFirebaseTokenRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFirebaseTokenTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFirebaseTokenRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFirebaseTokenRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFirebaseTokenResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/firebase/token";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DeleteFirebaseTokenByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFirebaseTokenByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFirebaseTokenByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFirebaseTokenByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFirebaseTokenByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFirebaseTokenByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/firebase/token";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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

class SendMobileNotificationByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SendMobileNotificationByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendMobileNotificationByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SendMobileNotificationByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendMobileNotificationByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SendMobileNotificationByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "gateway", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/firebase/token/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getSubject() !== null) {
            $json["subject"] = $this->request->getSubject();
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
        }
        if ($this->request->getSound() !== null) {
            $json["sound"] = $this->request->getSound();
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

/**
 * GS2 Gateway API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2GatewayRestClient extends AbstractGs2Client {

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
     * @param DescribeWebSocketSessionsRequest $request
     * @return PromiseInterface
     */
    public function describeWebSocketSessionsAsync(
            DescribeWebSocketSessionsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeWebSocketSessionsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeWebSocketSessionsRequest $request
     * @return DescribeWebSocketSessionsResult
     */
    public function describeWebSocketSessions (
            DescribeWebSocketSessionsRequest $request
    ): DescribeWebSocketSessionsResult {
        return $this->describeWebSocketSessionsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeWebSocketSessionsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeWebSocketSessionsByUserIdAsync(
            DescribeWebSocketSessionsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeWebSocketSessionsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeWebSocketSessionsByUserIdRequest $request
     * @return DescribeWebSocketSessionsByUserIdResult
     */
    public function describeWebSocketSessionsByUserId (
            DescribeWebSocketSessionsByUserIdRequest $request
    ): DescribeWebSocketSessionsByUserIdResult {
        return $this->describeWebSocketSessionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetUserIdRequest $request
     * @return PromiseInterface
     */
    public function setUserIdAsync(
            SetUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetUserIdRequest $request
     * @return SetUserIdResult
     */
    public function setUserId (
            SetUserIdRequest $request
    ): SetUserIdResult {
        return $this->setUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetUserIdByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setUserIdByUserIdAsync(
            SetUserIdByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetUserIdByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetUserIdByUserIdRequest $request
     * @return SetUserIdByUserIdResult
     */
    public function setUserIdByUserId (
            SetUserIdByUserIdRequest $request
    ): SetUserIdByUserIdResult {
        return $this->setUserIdByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SendNotificationRequest $request
     * @return PromiseInterface
     */
    public function sendNotificationAsync(
            SendNotificationRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendNotificationTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendNotificationRequest $request
     * @return SendNotificationResult
     */
    public function sendNotification (
            SendNotificationRequest $request
    ): SendNotificationResult {
        return $this->sendNotificationAsync(
            $request
        )->wait();
    }

    /**
     * @param SetFirebaseTokenRequest $request
     * @return PromiseInterface
     */
    public function setFirebaseTokenAsync(
            SetFirebaseTokenRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFirebaseTokenTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetFirebaseTokenRequest $request
     * @return SetFirebaseTokenResult
     */
    public function setFirebaseToken (
            SetFirebaseTokenRequest $request
    ): SetFirebaseTokenResult {
        return $this->setFirebaseTokenAsync(
            $request
        )->wait();
    }

    /**
     * @param SetFirebaseTokenByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setFirebaseTokenByUserIdAsync(
            SetFirebaseTokenByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFirebaseTokenByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetFirebaseTokenByUserIdRequest $request
     * @return SetFirebaseTokenByUserIdResult
     */
    public function setFirebaseTokenByUserId (
            SetFirebaseTokenByUserIdRequest $request
    ): SetFirebaseTokenByUserIdResult {
        return $this->setFirebaseTokenByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFirebaseTokenRequest $request
     * @return PromiseInterface
     */
    public function getFirebaseTokenAsync(
            GetFirebaseTokenRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFirebaseTokenTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFirebaseTokenRequest $request
     * @return GetFirebaseTokenResult
     */
    public function getFirebaseToken (
            GetFirebaseTokenRequest $request
    ): GetFirebaseTokenResult {
        return $this->getFirebaseTokenAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFirebaseTokenByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getFirebaseTokenByUserIdAsync(
            GetFirebaseTokenByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFirebaseTokenByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFirebaseTokenByUserIdRequest $request
     * @return GetFirebaseTokenByUserIdResult
     */
    public function getFirebaseTokenByUserId (
            GetFirebaseTokenByUserIdRequest $request
    ): GetFirebaseTokenByUserIdResult {
        return $this->getFirebaseTokenByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFirebaseTokenRequest $request
     * @return PromiseInterface
     */
    public function deleteFirebaseTokenAsync(
            DeleteFirebaseTokenRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFirebaseTokenTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFirebaseTokenRequest $request
     * @return DeleteFirebaseTokenResult
     */
    public function deleteFirebaseToken (
            DeleteFirebaseTokenRequest $request
    ): DeleteFirebaseTokenResult {
        return $this->deleteFirebaseTokenAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFirebaseTokenByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteFirebaseTokenByUserIdAsync(
            DeleteFirebaseTokenByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFirebaseTokenByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFirebaseTokenByUserIdRequest $request
     * @return DeleteFirebaseTokenByUserIdResult
     */
    public function deleteFirebaseTokenByUserId (
            DeleteFirebaseTokenByUserIdRequest $request
    ): DeleteFirebaseTokenByUserIdResult {
        return $this->deleteFirebaseTokenByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SendMobileNotificationByUserIdRequest $request
     * @return PromiseInterface
     */
    public function sendMobileNotificationByUserIdAsync(
            SendMobileNotificationByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendMobileNotificationByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendMobileNotificationByUserIdRequest $request
     * @return SendMobileNotificationByUserIdResult
     */
    public function sendMobileNotificationByUserId (
            SendMobileNotificationByUserIdRequest $request
    ): SendMobileNotificationByUserIdResult {
        return $this->sendMobileNotificationByUserIdAsync(
            $request
        )->wait();
    }
}