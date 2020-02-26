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

namespace Gs2\Account;

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
use Gs2\Account\Request\DescribeNamespacesRequest;
use Gs2\Account\Result\DescribeNamespacesResult;
use Gs2\Account\Request\CreateNamespaceRequest;
use Gs2\Account\Result\CreateNamespaceResult;
use Gs2\Account\Request\GetNamespaceStatusRequest;
use Gs2\Account\Result\GetNamespaceStatusResult;
use Gs2\Account\Request\GetNamespaceRequest;
use Gs2\Account\Result\GetNamespaceResult;
use Gs2\Account\Request\UpdateNamespaceRequest;
use Gs2\Account\Result\UpdateNamespaceResult;
use Gs2\Account\Request\DeleteNamespaceRequest;
use Gs2\Account\Result\DeleteNamespaceResult;
use Gs2\Account\Request\DescribeAccountsRequest;
use Gs2\Account\Result\DescribeAccountsResult;
use Gs2\Account\Request\CreateAccountRequest;
use Gs2\Account\Result\CreateAccountResult;
use Gs2\Account\Request\UpdateTimeOffsetRequest;
use Gs2\Account\Result\UpdateTimeOffsetResult;
use Gs2\Account\Request\GetAccountRequest;
use Gs2\Account\Result\GetAccountResult;
use Gs2\Account\Request\DeleteAccountRequest;
use Gs2\Account\Result\DeleteAccountResult;
use Gs2\Account\Request\AuthenticationRequest;
use Gs2\Account\Result\AuthenticationResult;
use Gs2\Account\Request\DescribeTakeOversRequest;
use Gs2\Account\Result\DescribeTakeOversResult;
use Gs2\Account\Request\DescribeTakeOversByUserIdRequest;
use Gs2\Account\Result\DescribeTakeOversByUserIdResult;
use Gs2\Account\Request\CreateTakeOverRequest;
use Gs2\Account\Result\CreateTakeOverResult;
use Gs2\Account\Request\CreateTakeOverByUserIdRequest;
use Gs2\Account\Result\CreateTakeOverByUserIdResult;
use Gs2\Account\Request\GetTakeOverRequest;
use Gs2\Account\Result\GetTakeOverResult;
use Gs2\Account\Request\GetTakeOverByUserIdRequest;
use Gs2\Account\Result\GetTakeOverByUserIdResult;
use Gs2\Account\Request\UpdateTakeOverRequest;
use Gs2\Account\Result\UpdateTakeOverResult;
use Gs2\Account\Request\UpdateTakeOverByUserIdRequest;
use Gs2\Account\Result\UpdateTakeOverByUserIdResult;
use Gs2\Account\Request\DeleteTakeOverRequest;
use Gs2\Account\Result\DeleteTakeOverResult;
use Gs2\Account\Request\DeleteTakeOverByUserIdentifierRequest;
use Gs2\Account\Result\DeleteTakeOverByUserIdentifierResult;
use Gs2\Account\Request\DoTakeOverRequest;
use Gs2\Account\Result\DoTakeOverResult;

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangePasswordIfTakeOver() != null) {
            $json["changePasswordIfTakeOver"] = $this->request->getChangePasswordIfTakeOver();
        }
        if ($this->request->getCreateAccountScript() != null) {
            $json["createAccountScript"] = $this->request->getCreateAccountScript()->toJson();
        }
        if ($this->request->getAuthenticationScript() != null) {
            $json["authenticationScript"] = $this->request->getAuthenticationScript()->toJson();
        }
        if ($this->request->getCreateTakeOverScript() != null) {
            $json["createTakeOverScript"] = $this->request->getCreateTakeOverScript()->toJson();
        }
        if ($this->request->getDoTakeOverScript() != null) {
            $json["doTakeOverScript"] = $this->request->getDoTakeOverScript()->toJson();
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangePasswordIfTakeOver() != null) {
            $json["changePasswordIfTakeOver"] = $this->request->getChangePasswordIfTakeOver();
        }
        if ($this->request->getCreateAccountScript() != null) {
            $json["createAccountScript"] = $this->request->getCreateAccountScript()->toJson();
        }
        if ($this->request->getAuthenticationScript() != null) {
            $json["authenticationScript"] = $this->request->getAuthenticationScript()->toJson();
        }
        if ($this->request->getCreateTakeOverScript() != null) {
            $json["createTakeOverScript"] = $this->request->getCreateTakeOverScript()->toJson();
        }
        if ($this->request->getDoTakeOverScript() != null) {
            $json["doTakeOverScript"] = $this->request->getDoTakeOverScript()->toJson();
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeAccountsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAccountsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAccountsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAccountsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAccountsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAccountsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account";

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

        return parent::executeImpl();
    }
}

class CreateAccountTask extends Gs2RestSessionTask {

    /**
     * @var CreateAccountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateAccountTask constructor.
     * @param Gs2RestSession $session
     * @param CreateAccountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateAccountRequest $request
    ) {
        parent::__construct(
            $session,
            CreateAccountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account";

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

class UpdateTimeOffsetTask extends Gs2RestSessionTask {

    /**
     * @var UpdateTimeOffsetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateTimeOffsetTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateTimeOffsetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateTimeOffsetRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateTimeOffsetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}/time_offset";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTimeOffset() != null) {
            $json["timeOffset"] = $this->request->getTimeOffset();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetAccountTask extends Gs2RestSessionTask {

    /**
     * @var GetAccountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAccountTask constructor.
     * @param Gs2RestSession $session
     * @param GetAccountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAccountRequest $request
    ) {
        parent::__construct(
            $session,
            GetAccountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}";

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

class DeleteAccountTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAccountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAccountTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAccountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAccountRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAccountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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

class AuthenticationTask extends Gs2RestSessionTask {

    /**
     * @var AuthenticationRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AuthenticationTask constructor.
     * @param Gs2RestSession $session
     * @param AuthenticationRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AuthenticationRequest $request
    ) {
        parent::__construct(
            $session,
            AuthenticationResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeTakeOversTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTakeOversRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTakeOversTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTakeOversRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTakeOversRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTakeOversResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/me/takeover";

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

class DescribeTakeOversByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTakeOversByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTakeOversByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTakeOversByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTakeOversByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTakeOversByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}/takeover";

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

class CreateTakeOverTask extends Gs2RestSessionTask {

    /**
     * @var CreateTakeOverRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateTakeOverTask constructor.
     * @param Gs2RestSession $session
     * @param CreateTakeOverRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateTakeOverRequest $request
    ) {
        parent::__construct(
            $session,
            CreateTakeOverResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/me/takeover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getType() != null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() != null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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

class CreateTakeOverByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateTakeOverByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateTakeOverByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateTakeOverByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateTakeOverByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateTakeOverByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}/takeover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getType() != null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() != null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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

class GetTakeOverTask extends Gs2RestSessionTask {

    /**
     * @var GetTakeOverRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTakeOverTask constructor.
     * @param Gs2RestSession $session
     * @param GetTakeOverRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTakeOverRequest $request
    ) {
        parent::__construct(
            $session,
            GetTakeOverResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

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

class GetTakeOverByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetTakeOverByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTakeOverByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetTakeOverByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTakeOverByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetTakeOverByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

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

class UpdateTakeOverTask extends Gs2RestSessionTask {

    /**
     * @var UpdateTakeOverRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateTakeOverTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateTakeOverRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateTakeOverRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateTakeOverResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getOldPassword() != null) {
            $json["oldPassword"] = $this->request->getOldPassword();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UpdateTakeOverByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateTakeOverByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateTakeOverByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateTakeOverByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateTakeOverByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateTakeOverByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/{userId}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getOldPassword() != null) {
            $json["oldPassword"] = $this->request->getOldPassword();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteTakeOverTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTakeOverRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTakeOverTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTakeOverRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTakeOverRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTakeOverResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserIdentifier() != null) {
            $queryStrings["userIdentifier"] = $this->request->getUserIdentifier();
        }

        $this->builder->setMethod("DELETE")
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

class DeleteTakeOverByUserIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTakeOverByUserIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTakeOverByUserIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTakeOverByUserIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTakeOverByUserIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTakeOverByUserIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/takeover/type/{type}/userIdentifier/{userIdentifier}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);
        $url = str_replace("{userIdentifier}", $this->request->getUserIdentifier() == null|| strlen($this->request->getUserIdentifier()) == 0 ? "null" : $this->request->getUserIdentifier(), $url);

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

class DoTakeOverTask extends Gs2RestSessionTask {

    /**
     * @var DoTakeOverRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoTakeOverTask constructor.
     * @param Gs2RestSession $session
     * @param DoTakeOverRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoTakeOverRequest $request
    ) {
        parent::__construct(
            $session,
            DoTakeOverResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() == null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getUserIdentifier() != null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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

/**
 * GS2 Account API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2AccountRestClient extends AbstractGs2Client {

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
        return $this->describeNamespacesAsync(
            $request
        )->wait();
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
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * ネームスペースを取得<br>
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
        return $this->getNamespaceAsync(
            $request
        )->wait();
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
        return $this->updateNamespaceAsync(
            $request
        )->wait();
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
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントの一覧を取得<br>
     *
     * @param DescribeAccountsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeAccountsAsync(
            DescribeAccountsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAccountsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントの一覧を取得<br>
     *
     * @param DescribeAccountsRequest $request リクエストパラメータ
     * @return DescribeAccountsResult
     */
    public function describeAccounts (
            DescribeAccountsRequest $request
    ): DescribeAccountsResult {
        return $this->describeAccountsAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントを新規作成<br>
     *
     * @param CreateAccountRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createAccountAsync(
            CreateAccountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateAccountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントを新規作成<br>
     *
     * @param CreateAccountRequest $request リクエストパラメータ
     * @return CreateAccountResult
     */
    public function createAccount (
            CreateAccountRequest $request
    ): CreateAccountResult {
        return $this->createAccountAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントの現在時刻に対する補正値を更新<br>
     *
     * @param UpdateTimeOffsetRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateTimeOffsetAsync(
            UpdateTimeOffsetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateTimeOffsetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントの現在時刻に対する補正値を更新<br>
     *
     * @param UpdateTimeOffsetRequest $request リクエストパラメータ
     * @return UpdateTimeOffsetResult
     */
    public function updateTimeOffset (
            UpdateTimeOffsetRequest $request
    ): UpdateTimeOffsetResult {
        return $this->updateTimeOffsetAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントを取得<br>
     *
     * @param GetAccountRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getAccountAsync(
            GetAccountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAccountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントを取得<br>
     *
     * @param GetAccountRequest $request リクエストパラメータ
     * @return GetAccountResult
     */
    public function getAccount (
            GetAccountRequest $request
    ): GetAccountResult {
        return $this->getAccountAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントを削除<br>
     *
     * @param DeleteAccountRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteAccountAsync(
            DeleteAccountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAccountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントを削除<br>
     *
     * @param DeleteAccountRequest $request リクエストパラメータ
     * @return DeleteAccountResult
     */
    public function deleteAccount (
            DeleteAccountRequest $request
    ): DeleteAccountResult {
        return $this->deleteAccountAsync(
            $request
        )->wait();
    }

    /**
     * ゲームプレイヤーアカウントを認証<br>
     *
     * @param AuthenticationRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function authenticationAsync(
            AuthenticationRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AuthenticationTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ゲームプレイヤーアカウントを認証<br>
     *
     * @param AuthenticationRequest $request リクエストパラメータ
     * @return AuthenticationResult
     */
    public function authentication (
            AuthenticationRequest $request
    ): AuthenticationResult {
        return $this->authenticationAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定の一覧を取得<br>
     *
     * @param DescribeTakeOversRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeTakeOversAsync(
            DescribeTakeOversRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTakeOversTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定の一覧を取得<br>
     *
     * @param DescribeTakeOversRequest $request リクエストパラメータ
     * @return DescribeTakeOversResult
     */
    public function describeTakeOvers (
            DescribeTakeOversRequest $request
    ): DescribeTakeOversResult {
        return $this->describeTakeOversAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定の一覧を取得<br>
     *
     * @param DescribeTakeOversByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeTakeOversByUserIdAsync(
            DescribeTakeOversByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTakeOversByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定の一覧を取得<br>
     *
     * @param DescribeTakeOversByUserIdRequest $request リクエストパラメータ
     * @return DescribeTakeOversByUserIdResult
     */
    public function describeTakeOversByUserId (
            DescribeTakeOversByUserIdRequest $request
    ): DescribeTakeOversByUserIdResult {
        return $this->describeTakeOversByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を新規作成<br>
     *
     * @param CreateTakeOverRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createTakeOverAsync(
            CreateTakeOverRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateTakeOverTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を新規作成<br>
     *
     * @param CreateTakeOverRequest $request リクエストパラメータ
     * @return CreateTakeOverResult
     */
    public function createTakeOver (
            CreateTakeOverRequest $request
    ): CreateTakeOverResult {
        return $this->createTakeOverAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定を新規作成<br>
     *
     * @param CreateTakeOverByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createTakeOverByUserIdAsync(
            CreateTakeOverByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateTakeOverByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定を新規作成<br>
     *
     * @param CreateTakeOverByUserIdRequest $request リクエストパラメータ
     * @return CreateTakeOverByUserIdResult
     */
    public function createTakeOverByUserId (
            CreateTakeOverByUserIdRequest $request
    ): CreateTakeOverByUserIdResult {
        return $this->createTakeOverByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を取得<br>
     *
     * @param GetTakeOverRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getTakeOverAsync(
            GetTakeOverRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTakeOverTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を取得<br>
     *
     * @param GetTakeOverRequest $request リクエストパラメータ
     * @return GetTakeOverResult
     */
    public function getTakeOver (
            GetTakeOverRequest $request
    ): GetTakeOverResult {
        return $this->getTakeOverAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定を取得<br>
     *
     * @param GetTakeOverByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getTakeOverByUserIdAsync(
            GetTakeOverByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTakeOverByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定して引き継ぎ設定を取得<br>
     *
     * @param GetTakeOverByUserIdRequest $request リクエストパラメータ
     * @return GetTakeOverByUserIdResult
     */
    public function getTakeOverByUserId (
            GetTakeOverByUserIdRequest $request
    ): GetTakeOverByUserIdResult {
        return $this->getTakeOverByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param UpdateTakeOverRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateTakeOverAsync(
            UpdateTakeOverRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateTakeOverTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param UpdateTakeOverRequest $request リクエストパラメータ
     * @return UpdateTakeOverResult
     */
    public function updateTakeOver (
            UpdateTakeOverRequest $request
    ): UpdateTakeOverResult {
        return $this->updateTakeOverAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param UpdateTakeOverByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateTakeOverByUserIdAsync(
            UpdateTakeOverByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateTakeOverByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param UpdateTakeOverByUserIdRequest $request リクエストパラメータ
     * @return UpdateTakeOverByUserIdResult
     */
    public function updateTakeOverByUserId (
            UpdateTakeOverByUserIdRequest $request
    ): UpdateTakeOverByUserIdResult {
        return $this->updateTakeOverByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を削除<br>
     *
     * @param DeleteTakeOverRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteTakeOverAsync(
            DeleteTakeOverRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTakeOverTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を削除<br>
     *
     * @param DeleteTakeOverRequest $request リクエストパラメータ
     * @return DeleteTakeOverResult
     */
    public function deleteTakeOver (
            DeleteTakeOverRequest $request
    ): DeleteTakeOverResult {
        return $this->deleteTakeOverAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を削除<br>
     *
     * @param DeleteTakeOverByUserIdentifierRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteTakeOverByUserIdentifierAsync(
            DeleteTakeOverByUserIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTakeOverByUserIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を削除<br>
     *
     * @param DeleteTakeOverByUserIdentifierRequest $request リクエストパラメータ
     * @return DeleteTakeOverByUserIdentifierResult
     */
    public function deleteTakeOverByUserIdentifier (
            DeleteTakeOverByUserIdentifierRequest $request
    ): DeleteTakeOverByUserIdentifierResult {
        return $this->deleteTakeOverByUserIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param DoTakeOverRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function doTakeOverAsync(
            DoTakeOverRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoTakeOverTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 引き継ぎ設定を更新<br>
     *
     * @param DoTakeOverRequest $request リクエストパラメータ
     * @return DoTakeOverResult
     */
    public function doTakeOver (
            DoTakeOverRequest $request
    ): DoTakeOverResult {
        return $this->doTakeOverAsync(
            $request
        )->wait();
    }
}