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

namespace Gs2\Project;

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
use Gs2\Project\Request\CreateAccountRequest;
use Gs2\Project\Result\CreateAccountResult;
use Gs2\Project\Request\VerifyRequest;
use Gs2\Project\Result\VerifyResult;
use Gs2\Project\Request\SignInRequest;
use Gs2\Project\Result\SignInResult;
use Gs2\Project\Request\IssueAccountTokenRequest;
use Gs2\Project\Result\IssueAccountTokenResult;
use Gs2\Project\Request\ForgetRequest;
use Gs2\Project\Result\ForgetResult;
use Gs2\Project\Request\IssuePasswordRequest;
use Gs2\Project\Result\IssuePasswordResult;
use Gs2\Project\Request\UpdateAccountRequest;
use Gs2\Project\Result\UpdateAccountResult;
use Gs2\Project\Request\DeleteAccountRequest;
use Gs2\Project\Result\DeleteAccountResult;
use Gs2\Project\Request\DescribeProjectsRequest;
use Gs2\Project\Result\DescribeProjectsResult;
use Gs2\Project\Request\CreateProjectRequest;
use Gs2\Project\Result\CreateProjectResult;
use Gs2\Project\Request\GetProjectRequest;
use Gs2\Project\Result\GetProjectResult;
use Gs2\Project\Request\GetProjectTokenRequest;
use Gs2\Project\Result\GetProjectTokenResult;
use Gs2\Project\Request\GetProjectTokenByIdentifierRequest;
use Gs2\Project\Result\GetProjectTokenByIdentifierResult;
use Gs2\Project\Request\UpdateProjectRequest;
use Gs2\Project\Result\UpdateProjectResult;
use Gs2\Project\Request\DeleteProjectRequest;
use Gs2\Project\Result\DeleteProjectResult;
use Gs2\Project\Request\DescribeBillingMethodsRequest;
use Gs2\Project\Result\DescribeBillingMethodsResult;
use Gs2\Project\Request\CreateBillingMethodRequest;
use Gs2\Project\Result\CreateBillingMethodResult;
use Gs2\Project\Request\GetBillingMethodRequest;
use Gs2\Project\Result\GetBillingMethodResult;
use Gs2\Project\Request\UpdateBillingMethodRequest;
use Gs2\Project\Result\UpdateBillingMethodResult;
use Gs2\Project\Request\DeleteBillingMethodRequest;
use Gs2\Project\Result\DeleteBillingMethodResult;
use Gs2\Project\Request\DescribeReceiptsRequest;
use Gs2\Project\Result\DescribeReceiptsResult;
use Gs2\Project\Request\DescribeBillingsRequest;
use Gs2\Project\Result\DescribeBillingsResult;

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

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account";

        $json = [];
        if ($this->request->getEmail() !== null) {
            $json["email"] = $this->request->getEmail();
        }
        if ($this->request->getFullName() !== null) {
            $json["fullName"] = $this->request->getFullName();
        }
        if ($this->request->getCompanyName() !== null) {
            $json["companyName"] = $this->request->getCompanyName();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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

class VerifyTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/verify";

        $json = [];
        if ($this->request->getVerifyToken() !== null) {
            $json["verifyToken"] = $this->request->getVerifyToken();
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

class SignInTask extends Gs2RestSessionTask {

    /**
     * @var SignInRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SignInTask constructor.
     * @param Gs2RestSession $session
     * @param SignInRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SignInRequest $request
    ) {
        parent::__construct(
            $session,
            SignInResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/signIn";

        $json = [];
        if ($this->request->getEmail() !== null) {
            $json["email"] = $this->request->getEmail();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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

class IssueAccountTokenTask extends Gs2RestSessionTask {

    /**
     * @var IssueAccountTokenRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssueAccountTokenTask constructor.
     * @param Gs2RestSession $session
     * @param IssueAccountTokenRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssueAccountTokenRequest $request
    ) {
        parent::__construct(
            $session,
            IssueAccountTokenResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/accountToken";

        $json = [];
        if ($this->request->getAccountName() !== null) {
            $json["accountName"] = $this->request->getAccountName();
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

class ForgetTask extends Gs2RestSessionTask {

    /**
     * @var ForgetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ForgetTask constructor.
     * @param Gs2RestSession $session
     * @param ForgetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ForgetRequest $request
    ) {
        parent::__construct(
            $session,
            ForgetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/forget";

        $json = [];
        if ($this->request->getEmail() !== null) {
            $json["email"] = $this->request->getEmail();
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

class IssuePasswordTask extends Gs2RestSessionTask {

    /**
     * @var IssuePasswordRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssuePasswordTask constructor.
     * @param Gs2RestSession $session
     * @param IssuePasswordRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssuePasswordRequest $request
    ) {
        parent::__construct(
            $session,
            IssuePasswordResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/password/issue";

        $json = [];
        if ($this->request->getIssuePasswordToken() !== null) {
            $json["issuePasswordToken"] = $this->request->getIssuePasswordToken();
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

class UpdateAccountTask extends Gs2RestSessionTask {

    /**
     * @var UpdateAccountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateAccountTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateAccountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateAccountRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateAccountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account";

        $json = [];
        if ($this->request->getEmail() !== null) {
            $json["email"] = $this->request->getEmail();
        }
        if ($this->request->getFullName() !== null) {
            $json["fullName"] = $this->request->getFullName();
        }
        if ($this->request->getCompanyName() !== null) {
            $json["companyName"] = $this->request->getCompanyName();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
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

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account";

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

class DescribeProjectsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeProjectsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeProjectsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeProjectsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeProjectsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeProjectsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class CreateProjectTask extends Gs2RestSessionTask {

    /**
     * @var CreateProjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateProjectTask constructor.
     * @param Gs2RestSession $session
     * @param CreateProjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateProjectRequest $request
    ) {
        parent::__construct(
            $session,
            CreateProjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project";

        $json = [];
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
        }
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPlan() !== null) {
            $json["plan"] = $this->request->getPlan();
        }
        if ($this->request->getBillingMethodName() !== null) {
            $json["billingMethodName"] = $this->request->getBillingMethodName();
        }
        if ($this->request->getEnableEventBridge() !== null) {
            $json["enableEventBridge"] = $this->request->getEnableEventBridge();
        }
        if ($this->request->getEventBridgeAwsAccountId() !== null) {
            $json["eventBridgeAwsAccountId"] = $this->request->getEventBridgeAwsAccountId();
        }
        if ($this->request->getEventBridgeAwsRegion() !== null) {
            $json["eventBridgeAwsRegion"] = $this->request->getEventBridgeAwsRegion();
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

class GetProjectTask extends Gs2RestSessionTask {

    /**
     * @var GetProjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProjectTask constructor.
     * @param Gs2RestSession $session
     * @param GetProjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProjectRequest $request
    ) {
        parent::__construct(
            $session,
            GetProjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/{projectName}";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class GetProjectTokenTask extends Gs2RestSessionTask {

    /**
     * @var GetProjectTokenRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProjectTokenTask constructor.
     * @param Gs2RestSession $session
     * @param GetProjectTokenRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProjectTokenRequest $request
    ) {
        parent::__construct(
            $session,
            GetProjectTokenResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/project/{projectName}/projectToken";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);

        $json = [];
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
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

class GetProjectTokenByIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var GetProjectTokenByIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProjectTokenByIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param GetProjectTokenByIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProjectTokenByIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            GetProjectTokenByIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/{accountName}/project/{projectName}/user/{userName}/projectToken";

        $url = str_replace("{accountName}", $this->request->getAccountName() === null|| strlen($this->request->getAccountName()) == 0 ? "null" : $this->request->getAccountName(), $url);
        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);
        $url = str_replace("{userName}", $this->request->getUserName() === null|| strlen($this->request->getUserName()) == 0 ? "null" : $this->request->getUserName(), $url);

        $json = [];
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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

class UpdateProjectTask extends Gs2RestSessionTask {

    /**
     * @var UpdateProjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateProjectTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateProjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateProjectRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateProjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/{projectName}";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);

        $json = [];
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPlan() !== null) {
            $json["plan"] = $this->request->getPlan();
        }
        if ($this->request->getBillingMethodName() !== null) {
            $json["billingMethodName"] = $this->request->getBillingMethodName();
        }
        if ($this->request->getEnableEventBridge() !== null) {
            $json["enableEventBridge"] = $this->request->getEnableEventBridge();
        }
        if ($this->request->getEventBridgeAwsAccountId() !== null) {
            $json["eventBridgeAwsAccountId"] = $this->request->getEventBridgeAwsAccountId();
        }
        if ($this->request->getEventBridgeAwsRegion() !== null) {
            $json["eventBridgeAwsRegion"] = $this->request->getEventBridgeAwsRegion();
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

class DeleteProjectTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProjectTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProjectRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/{projectName}";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class DescribeBillingMethodsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBillingMethodsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBillingMethodsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBillingMethodsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBillingMethodsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBillingMethodsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billingMethod";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class CreateBillingMethodTask extends Gs2RestSessionTask {

    /**
     * @var CreateBillingMethodRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateBillingMethodTask constructor.
     * @param Gs2RestSession $session
     * @param CreateBillingMethodRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateBillingMethodRequest $request
    ) {
        parent::__construct(
            $session,
            CreateBillingMethodResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billingMethod";

        $json = [];
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMethodType() !== null) {
            $json["methodType"] = $this->request->getMethodType();
        }
        if ($this->request->getCardCustomerId() !== null) {
            $json["cardCustomerId"] = $this->request->getCardCustomerId();
        }
        if ($this->request->getPartnerId() !== null) {
            $json["partnerId"] = $this->request->getPartnerId();
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

class GetBillingMethodTask extends Gs2RestSessionTask {

    /**
     * @var GetBillingMethodRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBillingMethodTask constructor.
     * @param Gs2RestSession $session
     * @param GetBillingMethodRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBillingMethodRequest $request
    ) {
        parent::__construct(
            $session,
            GetBillingMethodResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billingMethod/{billingMethodName}";

        $url = str_replace("{billingMethodName}", $this->request->getBillingMethodName() === null|| strlen($this->request->getBillingMethodName()) == 0 ? "null" : $this->request->getBillingMethodName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class UpdateBillingMethodTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBillingMethodRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBillingMethodTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBillingMethodRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBillingMethodRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBillingMethodResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billingMethod/{billingMethodName}";

        $url = str_replace("{billingMethodName}", $this->request->getBillingMethodName() === null|| strlen($this->request->getBillingMethodName()) == 0 ? "null" : $this->request->getBillingMethodName(), $url);

        $json = [];
        if ($this->request->getAccountToken() !== null) {
            $json["accountToken"] = $this->request->getAccountToken();
        }
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

class DeleteBillingMethodTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBillingMethodRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBillingMethodTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBillingMethodRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBillingMethodRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBillingMethodResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billingMethod/{billingMethodName}";

        $url = str_replace("{billingMethodName}", $this->request->getBillingMethodName() === null|| strlen($this->request->getBillingMethodName()) == 0 ? "null" : $this->request->getBillingMethodName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class DescribeReceiptsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiptsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiptsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiptsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiptsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiptsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/receipt";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
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

class DescribeBillingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBillingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBillingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBillingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBillingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBillingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/billing/{projectName}/{year}/{month}";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);
        $url = str_replace("{year}", $this->request->getYear() === null ? "null" : $this->request->getYear(), $url);
        $url = str_replace("{month}", $this->request->getMonth() === null ? "null" : $this->request->getMonth(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getAccountToken() !== null) {
            $queryStrings["accountToken"] = $this->request->getAccountToken();
        }
        if ($this->request->getRegion() !== null) {
            $queryStrings["region"] = $this->request->getRegion();
        }
        if ($this->request->getService() !== null) {
            $queryStrings["service"] = $this->request->getService();
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
 * GS2 Project API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ProjectRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * アカウントを新規作成<br>
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
     * アカウントを新規作成<br>
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
     * GS2アカウントを有効化します<br>
     *
     * @param VerifyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function verifyAsync(
            VerifyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * GS2アカウントを有効化します<br>
     *
     * @param VerifyRequest $request リクエストパラメータ
     * @return VerifyResult
     */
    public function verify (
            VerifyRequest $request
    ): VerifyResult {
        return $this->verifyAsync(
            $request
        )->wait();
    }

    /**
     * サインインします<br>
     *
     * @param SignInRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function signInAsync(
            SignInRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SignInTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * サインインします<br>
     *
     * @param SignInRequest $request リクエストパラメータ
     * @return SignInResult
     */
    public function signIn (
            SignInRequest $request
    ): SignInResult {
        return $this->signInAsync(
            $request
        )->wait();
    }

    /**
     * 指定したアカウント名のアカウントトークンを発行<br>
     *
     * @param IssueAccountTokenRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function issueAccountTokenAsync(
            IssueAccountTokenRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssueAccountTokenTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 指定したアカウント名のアカウントトークンを発行<br>
     *
     * @param IssueAccountTokenRequest $request リクエストパラメータ
     * @return IssueAccountTokenResult
     */
    public function issueAccountToken (
            IssueAccountTokenRequest $request
    ): IssueAccountTokenResult {
        return $this->issueAccountTokenAsync(
            $request
        )->wait();
    }

    /**
     * パスワード再発行トークンを取得<br>
     *
     * @param ForgetRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function forgetAsync(
            ForgetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ForgetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * パスワード再発行トークンを取得<br>
     *
     * @param ForgetRequest $request リクエストパラメータ
     * @return ForgetResult
     */
    public function forget (
            ForgetRequest $request
    ): ForgetResult {
        return $this->forgetAsync(
            $request
        )->wait();
    }

    /**
     * パスワードを再発行<br>
     *
     * @param IssuePasswordRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function issuePasswordAsync(
            IssuePasswordRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssuePasswordTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * パスワードを再発行<br>
     *
     * @param IssuePasswordRequest $request リクエストパラメータ
     * @return IssuePasswordResult
     */
    public function issuePassword (
            IssuePasswordRequest $request
    ): IssuePasswordResult {
        return $this->issuePasswordAsync(
            $request
        )->wait();
    }

    /**
     * GS2アカウントを更新します<br>
     *
     * @param UpdateAccountRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateAccountAsync(
            UpdateAccountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateAccountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * GS2アカウントを更新します<br>
     *
     * @param UpdateAccountRequest $request リクエストパラメータ
     * @return UpdateAccountResult
     */
    public function updateAccount (
            UpdateAccountRequest $request
    ): UpdateAccountResult {
        return $this->updateAccountAsync(
            $request
        )->wait();
    }

    /**
     * GS2アカウントを削除します<br>
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
     * GS2アカウントを削除します<br>
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
     * プロジェクトの一覧を取得<br>
     *
     * @param DescribeProjectsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeProjectsAsync(
            DescribeProjectsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeProjectsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトの一覧を取得<br>
     *
     * @param DescribeProjectsRequest $request リクエストパラメータ
     * @return DescribeProjectsResult
     */
    public function describeProjects (
            DescribeProjectsRequest $request
    ): DescribeProjectsResult {
        return $this->describeProjectsAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトを新規作成<br>
     *
     * @param CreateProjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createProjectAsync(
            CreateProjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateProjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトを新規作成<br>
     *
     * @param CreateProjectRequest $request リクエストパラメータ
     * @return CreateProjectResult
     */
    public function createProject (
            CreateProjectRequest $request
    ): CreateProjectResult {
        return $this->createProjectAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトを取得<br>
     *
     * @param GetProjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getProjectAsync(
            GetProjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトを取得<br>
     *
     * @param GetProjectRequest $request リクエストパラメータ
     * @return GetProjectResult
     */
    public function getProject (
            GetProjectRequest $request
    ): GetProjectResult {
        return $this->getProjectAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトトークンを発行します<br>
     *
     * @param GetProjectTokenRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getProjectTokenAsync(
            GetProjectTokenRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProjectTokenTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトトークンを発行します<br>
     *
     * @param GetProjectTokenRequest $request リクエストパラメータ
     * @return GetProjectTokenResult
     */
    public function getProjectToken (
            GetProjectTokenRequest $request
    ): GetProjectTokenResult {
        return $this->getProjectTokenAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトトークンを発行します<br>
     *
     * @param GetProjectTokenByIdentifierRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getProjectTokenByIdentifierAsync(
            GetProjectTokenByIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProjectTokenByIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトトークンを発行します<br>
     *
     * @param GetProjectTokenByIdentifierRequest $request リクエストパラメータ
     * @return GetProjectTokenByIdentifierResult
     */
    public function getProjectTokenByIdentifier (
            GetProjectTokenByIdentifierRequest $request
    ): GetProjectTokenByIdentifierResult {
        return $this->getProjectTokenByIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトを更新<br>
     *
     * @param UpdateProjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateProjectAsync(
            UpdateProjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateProjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトを更新<br>
     *
     * @param UpdateProjectRequest $request リクエストパラメータ
     * @return UpdateProjectResult
     */
    public function updateProject (
            UpdateProjectRequest $request
    ): UpdateProjectResult {
        return $this->updateProjectAsync(
            $request
        )->wait();
    }

    /**
     * プロジェクトを削除<br>
     *
     * @param DeleteProjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteProjectAsync(
            DeleteProjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * プロジェクトを削除<br>
     *
     * @param DeleteProjectRequest $request リクエストパラメータ
     * @return DeleteProjectResult
     */
    public function deleteProject (
            DeleteProjectRequest $request
    ): DeleteProjectResult {
        return $this->deleteProjectAsync(
            $request
        )->wait();
    }

    /**
     * 支払い方法の一覧を取得<br>
     *
     * @param DescribeBillingMethodsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeBillingMethodsAsync(
            DescribeBillingMethodsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBillingMethodsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 支払い方法の一覧を取得<br>
     *
     * @param DescribeBillingMethodsRequest $request リクエストパラメータ
     * @return DescribeBillingMethodsResult
     */
    public function describeBillingMethods (
            DescribeBillingMethodsRequest $request
    ): DescribeBillingMethodsResult {
        return $this->describeBillingMethodsAsync(
            $request
        )->wait();
    }

    /**
     * 支払い方法を新規作成<br>
     *
     * @param CreateBillingMethodRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createBillingMethodAsync(
            CreateBillingMethodRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateBillingMethodTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 支払い方法を新規作成<br>
     *
     * @param CreateBillingMethodRequest $request リクエストパラメータ
     * @return CreateBillingMethodResult
     */
    public function createBillingMethod (
            CreateBillingMethodRequest $request
    ): CreateBillingMethodResult {
        return $this->createBillingMethodAsync(
            $request
        )->wait();
    }

    /**
     * 支払い方法を取得<br>
     *
     * @param GetBillingMethodRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getBillingMethodAsync(
            GetBillingMethodRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBillingMethodTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 支払い方法を取得<br>
     *
     * @param GetBillingMethodRequest $request リクエストパラメータ
     * @return GetBillingMethodResult
     */
    public function getBillingMethod (
            GetBillingMethodRequest $request
    ): GetBillingMethodResult {
        return $this->getBillingMethodAsync(
            $request
        )->wait();
    }

    /**
     * 支払い方法を更新<br>
     *
     * @param UpdateBillingMethodRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateBillingMethodAsync(
            UpdateBillingMethodRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBillingMethodTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 支払い方法を更新<br>
     *
     * @param UpdateBillingMethodRequest $request リクエストパラメータ
     * @return UpdateBillingMethodResult
     */
    public function updateBillingMethod (
            UpdateBillingMethodRequest $request
    ): UpdateBillingMethodResult {
        return $this->updateBillingMethodAsync(
            $request
        )->wait();
    }

    /**
     * 支払い方法を削除<br>
     *
     * @param DeleteBillingMethodRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteBillingMethodAsync(
            DeleteBillingMethodRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBillingMethodTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 支払い方法を削除<br>
     *
     * @param DeleteBillingMethodRequest $request リクエストパラメータ
     * @return DeleteBillingMethodResult
     */
    public function deleteBillingMethod (
            DeleteBillingMethodRequest $request
    ): DeleteBillingMethodResult {
        return $this->deleteBillingMethodAsync(
            $request
        )->wait();
    }

    /**
     * 領収書の一覧を取得<br>
     *
     * @param DescribeReceiptsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeReceiptsAsync(
            DescribeReceiptsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiptsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 領収書の一覧を取得<br>
     *
     * @param DescribeReceiptsRequest $request リクエストパラメータ
     * @return DescribeReceiptsResult
     */
    public function describeReceipts (
            DescribeReceiptsRequest $request
    ): DescribeReceiptsResult {
        return $this->describeReceiptsAsync(
            $request
        )->wait();
    }

    /**
     * 利用状況の一覧を取得<br>
     *
     * @param DescribeBillingsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeBillingsAsync(
            DescribeBillingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBillingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 利用状況の一覧を取得<br>
     *
     * @param DescribeBillingsRequest $request リクエストパラメータ
     * @return DescribeBillingsResult
     */
    public function describeBillings (
            DescribeBillingsRequest $request
    ): DescribeBillingsResult {
        return $this->describeBillingsAsync(
            $request
        )->wait();
    }
}