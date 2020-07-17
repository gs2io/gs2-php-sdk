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

namespace Gs2\Identifier;

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
use Gs2\Identifier\Request\DescribeUsersRequest;
use Gs2\Identifier\Result\DescribeUsersResult;
use Gs2\Identifier\Request\CreateUserRequest;
use Gs2\Identifier\Result\CreateUserResult;
use Gs2\Identifier\Request\UpdateUserRequest;
use Gs2\Identifier\Result\UpdateUserResult;
use Gs2\Identifier\Request\GetUserRequest;
use Gs2\Identifier\Result\GetUserResult;
use Gs2\Identifier\Request\DeleteUserRequest;
use Gs2\Identifier\Result\DeleteUserResult;
use Gs2\Identifier\Request\DescribeSecurityPoliciesRequest;
use Gs2\Identifier\Result\DescribeSecurityPoliciesResult;
use Gs2\Identifier\Request\DescribeCommonSecurityPoliciesRequest;
use Gs2\Identifier\Result\DescribeCommonSecurityPoliciesResult;
use Gs2\Identifier\Request\CreateSecurityPolicyRequest;
use Gs2\Identifier\Result\CreateSecurityPolicyResult;
use Gs2\Identifier\Request\UpdateSecurityPolicyRequest;
use Gs2\Identifier\Result\UpdateSecurityPolicyResult;
use Gs2\Identifier\Request\GetSecurityPolicyRequest;
use Gs2\Identifier\Result\GetSecurityPolicyResult;
use Gs2\Identifier\Request\DeleteSecurityPolicyRequest;
use Gs2\Identifier\Result\DeleteSecurityPolicyResult;
use Gs2\Identifier\Request\DescribeIdentifiersRequest;
use Gs2\Identifier\Result\DescribeIdentifiersResult;
use Gs2\Identifier\Request\CreateIdentifierRequest;
use Gs2\Identifier\Result\CreateIdentifierResult;
use Gs2\Identifier\Request\GetIdentifierRequest;
use Gs2\Identifier\Result\GetIdentifierResult;
use Gs2\Identifier\Request\DeleteIdentifierRequest;
use Gs2\Identifier\Result\DeleteIdentifierResult;
use Gs2\Identifier\Request\GetHasSecurityPolicyRequest;
use Gs2\Identifier\Result\GetHasSecurityPolicyResult;
use Gs2\Identifier\Request\AttachSecurityPolicyRequest;
use Gs2\Identifier\Result\AttachSecurityPolicyResult;
use Gs2\Identifier\Request\DetachSecurityPolicyRequest;
use Gs2\Identifier\Result\DetachSecurityPolicyResult;
use Gs2\Identifier\Request\LoginRequest;
use Gs2\Identifier\Result\LoginResult;

class DescribeUsersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeUsersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeUsersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeUsersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeUsersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeUsersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user";

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

class CreateUserTask extends Gs2RestSessionTask {

    /**
     * @var CreateUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateUserTask constructor.
     * @param Gs2RestSession $session
     * @param CreateUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateUserRequest $request
    ) {
        parent::__construct(
            $session,
            CreateUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
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

class UpdateUserTask extends Gs2RestSessionTask {

    /**
     * @var UpdateUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateUserTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateUserRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

class GetUserTask extends Gs2RestSessionTask {

    /**
     * @var GetUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetUserTask constructor.
     * @param Gs2RestSession $session
     * @param GetUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetUserRequest $request
    ) {
        parent::__construct(
            $session,
            GetUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

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

class DeleteUserTask extends Gs2RestSessionTask {

    /**
     * @var DeleteUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteUserTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteUserRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

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

class DescribeSecurityPoliciesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSecurityPoliciesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSecurityPoliciesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSecurityPoliciesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSecurityPoliciesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSecurityPoliciesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy";

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

class DescribeCommonSecurityPoliciesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCommonSecurityPoliciesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCommonSecurityPoliciesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCommonSecurityPoliciesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCommonSecurityPoliciesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCommonSecurityPoliciesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy/common";

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

class CreateSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var CreateSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPolicy() !== null) {
            $json["policy"] = $this->request->getPolicy();
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

class UpdateSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy/{securityPolicyName}";

        $url = str_replace("{securityPolicyName}", $this->request->getSecurityPolicyName() === null|| strlen($this->request->getSecurityPolicyName()) == 0 ? "null" : $this->request->getSecurityPolicyName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPolicy() !== null) {
            $json["policy"] = $this->request->getPolicy();
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

class GetSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var GetSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param GetSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            GetSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy/{securityPolicyName}";

        $url = str_replace("{securityPolicyName}", $this->request->getSecurityPolicyName() === null|| strlen($this->request->getSecurityPolicyName()) == 0 ? "null" : $this->request->getSecurityPolicyName(), $url);

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

class DeleteSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/securityPolicy/{securityPolicyName}";

        $url = str_replace("{securityPolicyName}", $this->request->getSecurityPolicyName() === null|| strlen($this->request->getSecurityPolicyName()) == 0 ? "null" : $this->request->getSecurityPolicyName(), $url);

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

class DescribeIdentifiersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeIdentifiersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeIdentifiersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeIdentifiersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeIdentifiersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeIdentifiersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/identifier";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

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

class CreateIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var CreateIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param CreateIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            CreateIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/identifier";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

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

class GetIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var GetIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param GetIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            GetIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/identifier/{clientId}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);
        $url = str_replace("{clientId}", $this->request->getClientId() === null|| strlen($this->request->getClientId()) == 0 ? "null" : $this->request->getClientId(), $url);

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

class DeleteIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var DeleteIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/identifier/{clientId}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);
        $url = str_replace("{clientId}", $this->request->getClientId() === null|| strlen($this->request->getClientId()) == 0 ? "null" : $this->request->getClientId(), $url);

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

class GetHasSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var GetHasSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetHasSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param GetHasSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetHasSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            GetHasSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/securityPolicy";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

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

class AttachSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var AttachSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AttachSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param AttachSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AttachSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            AttachSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/securityPolicy";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

        $json = [];
        if ($this->request->getSecurityPolicyId() !== null) {
            $json["securityPolicyId"] = $this->request->getSecurityPolicyId();
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

class DetachSecurityPolicyTask extends Gs2RestSessionTask {

    /**
     * @var DetachSecurityPolicyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DetachSecurityPolicyTask constructor.
     * @param Gs2RestSession $session
     * @param DetachSecurityPolicyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DetachSecurityPolicyRequest $request
    ) {
        parent::__construct(
            $session,
            DetachSecurityPolicyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/user/{userName}/securityPolicy/{securityPolicyId}";

        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);
        $url = str_replace("{securityPolicyId}", $this->request->getSecurityPolicyId() === null|| strlen($this->request->getSecurityPolicyId()) == 0 ? "null" : $this->request->getSecurityPolicyId(), $url);

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

class LoginTask extends Gs2RestSessionTask {

    /**
     * @var LoginRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * LoginTask constructor.
     * @param Gs2RestSession $session
     * @param LoginRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        LoginRequest $request
    ) {
        parent::__construct(
            $session,
            LoginResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/projectToken/login";

        $json = [];
        if ($this->request->getClientId() !== null) {
            $json["clientId"] = $this->request->getClientId();
        }
        if ($this->request->getClientSecret() !== null) {
            $json["clientSecret"] = $this->request->getClientSecret();
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
 * GS2 Identifier API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2IdentifierRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * ユーザの一覧を取得します<br>
     *
     * @param DescribeUsersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeUsersAsync(
            DescribeUsersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeUsersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザの一覧を取得します<br>
     *
     * @param DescribeUsersRequest $request リクエストパラメータ
     * @return DescribeUsersResult
     */
    public function describeUsers (
            DescribeUsersRequest $request
    ): DescribeUsersResult {
        return $this->describeUsersAsync(
            $request
        )->wait();
    }

    /**
     * ユーザを新規作成します<br>
     *
     * @param CreateUserRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createUserAsync(
            CreateUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザを新規作成します<br>
     *
     * @param CreateUserRequest $request リクエストパラメータ
     * @return CreateUserResult
     */
    public function createUser (
            CreateUserRequest $request
    ): CreateUserResult {
        return $this->createUserAsync(
            $request
        )->wait();
    }

    /**
     * ユーザを更新します<br>
     *
     * @param UpdateUserRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateUserAsync(
            UpdateUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザを更新します<br>
     *
     * @param UpdateUserRequest $request リクエストパラメータ
     * @return UpdateUserResult
     */
    public function updateUser (
            UpdateUserRequest $request
    ): UpdateUserResult {
        return $this->updateUserAsync(
            $request
        )->wait();
    }

    /**
     * ユーザを取得します<br>
     *
     * @param GetUserRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getUserAsync(
            GetUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザを取得します<br>
     *
     * @param GetUserRequest $request リクエストパラメータ
     * @return GetUserResult
     */
    public function getUser (
            GetUserRequest $request
    ): GetUserResult {
        return $this->getUserAsync(
            $request
        )->wait();
    }

    /**
     * ユーザを削除します<br>
     *
     * @param DeleteUserRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteUserAsync(
            DeleteUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザを削除します<br>
     *
     * @param DeleteUserRequest $request リクエストパラメータ
     * @return DeleteUserResult
     */
    public function deleteUser (
            DeleteUserRequest $request
    ): DeleteUserResult {
        return $this->deleteUserAsync(
            $request
        )->wait();
    }

    /**
     * セキュリティポリシーの一覧を取得します<br>
     *
     * @param DescribeSecurityPoliciesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSecurityPoliciesAsync(
            DescribeSecurityPoliciesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSecurityPoliciesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * セキュリティポリシーの一覧を取得します<br>
     *
     * @param DescribeSecurityPoliciesRequest $request リクエストパラメータ
     * @return DescribeSecurityPoliciesResult
     */
    public function describeSecurityPolicies (
            DescribeSecurityPoliciesRequest $request
    ): DescribeSecurityPoliciesResult {
        return $this->describeSecurityPoliciesAsync(
            $request
        )->wait();
    }

    /**
     * オーナーIDを指定してセキュリティポリシーの一覧を取得します<br>
     *
     * @param DescribeCommonSecurityPoliciesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeCommonSecurityPoliciesAsync(
            DescribeCommonSecurityPoliciesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCommonSecurityPoliciesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * オーナーIDを指定してセキュリティポリシーの一覧を取得します<br>
     *
     * @param DescribeCommonSecurityPoliciesRequest $request リクエストパラメータ
     * @return DescribeCommonSecurityPoliciesResult
     */
    public function describeCommonSecurityPolicies (
            DescribeCommonSecurityPoliciesRequest $request
    ): DescribeCommonSecurityPoliciesResult {
        return $this->describeCommonSecurityPoliciesAsync(
            $request
        )->wait();
    }

    /**
     * セキュリティポリシーを新規作成します<br>
     *
     * @param CreateSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createSecurityPolicyAsync(
            CreateSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * セキュリティポリシーを新規作成します<br>
     *
     * @param CreateSecurityPolicyRequest $request リクエストパラメータ
     * @return CreateSecurityPolicyResult
     */
    public function createSecurityPolicy (
            CreateSecurityPolicyRequest $request
    ): CreateSecurityPolicyResult {
        return $this->createSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * セキュリティポリシーを更新します<br>
     *
     * @param UpdateSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateSecurityPolicyAsync(
            UpdateSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * セキュリティポリシーを更新します<br>
     *
     * @param UpdateSecurityPolicyRequest $request リクエストパラメータ
     * @return UpdateSecurityPolicyResult
     */
    public function updateSecurityPolicy (
            UpdateSecurityPolicyRequest $request
    ): UpdateSecurityPolicyResult {
        return $this->updateSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * セキュリティポリシーを取得します<br>
     *
     * @param GetSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getSecurityPolicyAsync(
            GetSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * セキュリティポリシーを取得します<br>
     *
     * @param GetSecurityPolicyRequest $request リクエストパラメータ
     * @return GetSecurityPolicyResult
     */
    public function getSecurityPolicy (
            GetSecurityPolicyRequest $request
    ): GetSecurityPolicyResult {
        return $this->getSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * セキュリティポリシーを削除します<br>
     *
     * @param DeleteSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteSecurityPolicyAsync(
            DeleteSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * セキュリティポリシーを削除します<br>
     *
     * @param DeleteSecurityPolicyRequest $request リクエストパラメータ
     * @return DeleteSecurityPolicyResult
     */
    public function deleteSecurityPolicy (
            DeleteSecurityPolicyRequest $request
    ): DeleteSecurityPolicyResult {
        return $this->deleteSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * クレデンシャルの一覧を取得します<br>
     *
     * @param DescribeIdentifiersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeIdentifiersAsync(
            DescribeIdentifiersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeIdentifiersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * クレデンシャルの一覧を取得します<br>
     *
     * @param DescribeIdentifiersRequest $request リクエストパラメータ
     * @return DescribeIdentifiersResult
     */
    public function describeIdentifiers (
            DescribeIdentifiersRequest $request
    ): DescribeIdentifiersResult {
        return $this->describeIdentifiersAsync(
            $request
        )->wait();
    }

    /**
     * クレデンシャルを新規作成します<br>
     *
     * @param CreateIdentifierRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createIdentifierAsync(
            CreateIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * クレデンシャルを新規作成します<br>
     *
     * @param CreateIdentifierRequest $request リクエストパラメータ
     * @return CreateIdentifierResult
     */
    public function createIdentifier (
            CreateIdentifierRequest $request
    ): CreateIdentifierResult {
        return $this->createIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * クレデンシャルを取得します<br>
     *
     * @param GetIdentifierRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getIdentifierAsync(
            GetIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * クレデンシャルを取得します<br>
     *
     * @param GetIdentifierRequest $request リクエストパラメータ
     * @return GetIdentifierResult
     */
    public function getIdentifier (
            GetIdentifierRequest $request
    ): GetIdentifierResult {
        return $this->getIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * クレデンシャルを削除します<br>
     *
     * @param DeleteIdentifierRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteIdentifierAsync(
            DeleteIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * クレデンシャルを削除します<br>
     *
     * @param DeleteIdentifierRequest $request リクエストパラメータ
     * @return DeleteIdentifierResult
     */
    public function deleteIdentifier (
            DeleteIdentifierRequest $request
    ): DeleteIdentifierResult {
        return $this->deleteIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * 割り当てられたセキュリティポリシーの一覧を取得します<br>
     *
     * @param GetHasSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getHasSecurityPolicyAsync(
            GetHasSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetHasSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 割り当てられたセキュリティポリシーの一覧を取得します<br>
     *
     * @param GetHasSecurityPolicyRequest $request リクエストパラメータ
     * @return GetHasSecurityPolicyResult
     */
    public function getHasSecurityPolicy (
            GetHasSecurityPolicyRequest $request
    ): GetHasSecurityPolicyResult {
        return $this->getHasSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます<br>
     *
     * @param AttachSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function attachSecurityPolicyAsync(
            AttachSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AttachSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます<br>
     *
     * @param AttachSecurityPolicyRequest $request リクエストパラメータ
     * @return AttachSecurityPolicyResult
     */
    public function attachSecurityPolicy (
            AttachSecurityPolicyRequest $request
    ): AttachSecurityPolicyResult {
        return $this->attachSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * 割り当てられたセキュリティポリシーをユーザーから外します<br>
     *
     * @param DetachSecurityPolicyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function detachSecurityPolicyAsync(
            DetachSecurityPolicyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DetachSecurityPolicyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 割り当てられたセキュリティポリシーをユーザーから外します<br>
     *
     * @param DetachSecurityPolicyRequest $request リクエストパラメータ
     * @return DetachSecurityPolicyResult
     */
    public function detachSecurityPolicy (
            DetachSecurityPolicyRequest $request
    ): DetachSecurityPolicyResult {
        return $this->detachSecurityPolicyAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトトークン を取得します<br>
     *
     * @param LoginRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function loginAsync(
            LoginRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new LoginTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトトークン を取得します<br>
     *
     * @param LoginRequest $request リクエストパラメータ
     * @return LoginResult
     */
    public function login (
            LoginRequest $request
    ): LoginResult {
        return $this->loginAsync(
            $request
        )->wait();
    }
}