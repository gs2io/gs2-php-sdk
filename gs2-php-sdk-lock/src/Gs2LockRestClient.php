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

namespace Gs2\Lock;

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
use Gs2\Lock\Request\DescribeNamespacesRequest;
use Gs2\Lock\Result\DescribeNamespacesResult;
use Gs2\Lock\Request\CreateNamespaceRequest;
use Gs2\Lock\Result\CreateNamespaceResult;
use Gs2\Lock\Request\GetNamespaceStatusRequest;
use Gs2\Lock\Result\GetNamespaceStatusResult;
use Gs2\Lock\Request\GetNamespaceRequest;
use Gs2\Lock\Result\GetNamespaceResult;
use Gs2\Lock\Request\UpdateNamespaceRequest;
use Gs2\Lock\Result\UpdateNamespaceResult;
use Gs2\Lock\Request\DeleteNamespaceRequest;
use Gs2\Lock\Result\DeleteNamespaceResult;
use Gs2\Lock\Request\DescribeMutexesRequest;
use Gs2\Lock\Result\DescribeMutexesResult;
use Gs2\Lock\Request\DescribeMutexesByUserIdRequest;
use Gs2\Lock\Result\DescribeMutexesByUserIdResult;
use Gs2\Lock\Request\LockRequest;
use Gs2\Lock\Result\LockResult;
use Gs2\Lock\Request\LockByUserIdRequest;
use Gs2\Lock\Result\LockByUserIdResult;
use Gs2\Lock\Request\UnlockRequest;
use Gs2\Lock\Result\UnlockResult;
use Gs2\Lock\Request\UnlockByUserIdRequest;
use Gs2\Lock\Result\UnlockByUserIdResult;
use Gs2\Lock\Request\GetMutexRequest;
use Gs2\Lock\Result\GetMutexResult;
use Gs2\Lock\Request\GetMutexByUserIdRequest;
use Gs2\Lock\Result\GetMutexByUserIdResult;
use Gs2\Lock\Request\DeleteMutexByUserIdRequest;
use Gs2\Lock\Result\DeleteMutexByUserIdResult;

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeMutexesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMutexesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMutexesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMutexesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMutexesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMutexesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/mutex";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeMutexesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMutexesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMutexesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMutexesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMutexesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMutexesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/mutex";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class LockTask extends Gs2RestSessionTask {

    /**
     * @var LockRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * LockTask constructor.
     * @param Gs2RestSession $session
     * @param LockRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        LockRequest $request
    ) {
        parent::__construct(
            $session,
            LockResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/mutex/{propertyId}/lock";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getTransactionId() != null) {
            $json["transactionId"] = $this->request->getTransactionId();
        }
        if ($this->request->getTtl() != null) {
            $json["ttl"] = $this->request->getTtl();
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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class LockByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var LockByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * LockByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param LockByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        LockByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            LockByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/mutex/{propertyId}/lock";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTransactionId() != null) {
            $json["transactionId"] = $this->request->getTransactionId();
        }
        if ($this->request->getTtl() != null) {
            $json["ttl"] = $this->request->getTtl();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UnlockTask extends Gs2RestSessionTask {

    /**
     * @var UnlockRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnlockTask constructor.
     * @param Gs2RestSession $session
     * @param UnlockRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnlockRequest $request
    ) {
        parent::__construct(
            $session,
            UnlockResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/mutex/{propertyId}/unlock";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getTransactionId() != null) {
            $json["transactionId"] = $this->request->getTransactionId();
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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UnlockByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnlockByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnlockByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnlockByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnlockByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnlockByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/mutex/{propertyId}/unlock";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTransactionId() != null) {
            $json["transactionId"] = $this->request->getTransactionId();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetMutexTask extends Gs2RestSessionTask {

    /**
     * @var GetMutexRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMutexTask constructor.
     * @param Gs2RestSession $session
     * @param GetMutexRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMutexRequest $request
    ) {
        parent::__construct(
            $session,
            GetMutexResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/mutex/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class GetMutexByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetMutexByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMutexByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetMutexByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMutexByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetMutexByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/mutex/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
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

class DeleteMutexByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMutexByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMutexByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMutexByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMutexByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMutexByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lock", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/mutex/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 Lock API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LockRestClient extends AbstractGs2Client {

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
     * ミューテックスの一覧を取得<br>
     *
     * @param DescribeMutexesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeMutexesAsync(
            DescribeMutexesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMutexesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスの一覧を取得<br>
     *
     * @param DescribeMutexesRequest $request リクエストパラメータ
     * @return DescribeMutexesResult
     */
    public function describeMutexes (
            DescribeMutexesRequest $request
    ): DescribeMutexesResult {

        $resultAsyncResult = [];
        $this->describeMutexesAsync(
            $request
        )->then(
            function (DescribeMutexesResult $result) use (&$resultAsyncResult) {
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
     * ミューテックスの一覧を取得<br>
     *
     * @param DescribeMutexesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeMutexesByUserIdAsync(
            DescribeMutexesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMutexesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスの一覧を取得<br>
     *
     * @param DescribeMutexesByUserIdRequest $request リクエストパラメータ
     * @return DescribeMutexesByUserIdResult
     */
    public function describeMutexesByUserId (
            DescribeMutexesByUserIdRequest $request
    ): DescribeMutexesByUserIdResult {

        $resultAsyncResult = [];
        $this->describeMutexesByUserIdAsync(
            $request
        )->then(
            function (DescribeMutexesByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ミューテックスを取得<br>
     *
     * @param LockRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function lockAsync(
            LockRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new LockTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスを取得<br>
     *
     * @param LockRequest $request リクエストパラメータ
     * @return LockResult
     */
    public function lock (
            LockRequest $request
    ): LockResult {

        $resultAsyncResult = [];
        $this->lockAsync(
            $request
        )->then(
            function (LockResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してミューテックスを取得<br>
     *
     * @param LockByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function lockByUserIdAsync(
            LockByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new LockByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してミューテックスを取得<br>
     *
     * @param LockByUserIdRequest $request リクエストパラメータ
     * @return LockByUserIdResult
     */
    public function lockByUserId (
            LockByUserIdRequest $request
    ): LockByUserIdResult {

        $resultAsyncResult = [];
        $this->lockByUserIdAsync(
            $request
        )->then(
            function (LockByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ミューテックスを解放<br>
     *
     * @param UnlockRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function unlockAsync(
            UnlockRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnlockTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスを解放<br>
     *
     * @param UnlockRequest $request リクエストパラメータ
     * @return UnlockResult
     */
    public function unlock (
            UnlockRequest $request
    ): UnlockResult {

        $resultAsyncResult = [];
        $this->unlockAsync(
            $request
        )->then(
            function (UnlockResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してミューテックスを解放<br>
     *
     * @param UnlockByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function unlockByUserIdAsync(
            UnlockByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnlockByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してミューテックスを解放<br>
     *
     * @param UnlockByUserIdRequest $request リクエストパラメータ
     * @return UnlockByUserIdResult
     */
    public function unlockByUserId (
            UnlockByUserIdRequest $request
    ): UnlockByUserIdResult {

        $resultAsyncResult = [];
        $this->unlockByUserIdAsync(
            $request
        )->then(
            function (UnlockByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ミューテックスを取得<br>
     *
     * @param GetMutexRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getMutexAsync(
            GetMutexRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMutexTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスを取得<br>
     *
     * @param GetMutexRequest $request リクエストパラメータ
     * @return GetMutexResult
     */
    public function getMutex (
            GetMutexRequest $request
    ): GetMutexResult {

        $resultAsyncResult = [];
        $this->getMutexAsync(
            $request
        )->then(
            function (GetMutexResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してミューテックスを取得<br>
     *
     * @param GetMutexByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getMutexByUserIdAsync(
            GetMutexByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMutexByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してミューテックスを取得<br>
     *
     * @param GetMutexByUserIdRequest $request リクエストパラメータ
     * @return GetMutexByUserIdResult
     */
    public function getMutexByUserId (
            GetMutexByUserIdRequest $request
    ): GetMutexByUserIdResult {

        $resultAsyncResult = [];
        $this->getMutexByUserIdAsync(
            $request
        )->then(
            function (GetMutexByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ミューテックスを削除<br>
     *
     * @param DeleteMutexByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteMutexByUserIdAsync(
            DeleteMutexByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMutexByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ミューテックスを削除<br>
     *
     * @param DeleteMutexByUserIdRequest $request リクエストパラメータ
     * @return DeleteMutexByUserIdResult
     */
    public function deleteMutexByUserId (
            DeleteMutexByUserIdRequest $request
    ): DeleteMutexByUserIdResult {

        $resultAsyncResult = [];
        $this->deleteMutexByUserIdAsync(
            $request
        )->then(
            function (DeleteMutexByUserIdResult $result) use (&$resultAsyncResult) {
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