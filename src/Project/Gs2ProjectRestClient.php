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
use Gs2\Project\Request\ActivateRegionRequest;
use Gs2\Project\Result\ActivateRegionResult;
use Gs2\Project\Request\WaitActivateRegionRequest;
use Gs2\Project\Result\WaitActivateRegionResult;
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
use Gs2\Project\Request\DescribeDumpProgressesRequest;
use Gs2\Project\Result\DescribeDumpProgressesResult;
use Gs2\Project\Request\GetDumpProgressRequest;
use Gs2\Project\Result\GetDumpProgressResult;
use Gs2\Project\Request\WaitDumpUserDataRequest;
use Gs2\Project\Result\WaitDumpUserDataResult;
use Gs2\Project\Request\ArchiveDumpUserDataRequest;
use Gs2\Project\Result\ArchiveDumpUserDataResult;
use Gs2\Project\Request\DumpUserDataRequest;
use Gs2\Project\Result\DumpUserDataResult;
use Gs2\Project\Request\GetDumpUserDataRequest;
use Gs2\Project\Result\GetDumpUserDataResult;
use Gs2\Project\Request\DescribeCleanProgressesRequest;
use Gs2\Project\Result\DescribeCleanProgressesResult;
use Gs2\Project\Request\GetCleanProgressRequest;
use Gs2\Project\Result\GetCleanProgressResult;
use Gs2\Project\Request\WaitCleanUserDataRequest;
use Gs2\Project\Result\WaitCleanUserDataResult;
use Gs2\Project\Request\CleanUserDataRequest;
use Gs2\Project\Result\CleanUserDataResult;
use Gs2\Project\Request\DescribeImportProgressesRequest;
use Gs2\Project\Result\DescribeImportProgressesResult;
use Gs2\Project\Request\GetImportProgressRequest;
use Gs2\Project\Result\GetImportProgressResult;
use Gs2\Project\Request\WaitImportUserDataRequest;
use Gs2\Project\Result\WaitImportUserDataResult;
use Gs2\Project\Request\PrepareImportUserDataRequest;
use Gs2\Project\Result\PrepareImportUserDataResult;
use Gs2\Project\Request\ImportUserDataRequest;
use Gs2\Project\Result\ImportUserDataResult;
use Gs2\Project\Request\DescribeImportErrorLogsRequest;
use Gs2\Project\Result\DescribeImportErrorLogsResult;
use Gs2\Project\Request\GetImportErrorLogRequest;
use Gs2\Project\Result\GetImportErrorLogResult;

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
        if ($this->request->getLang() !== null) {
            $json["lang"] = $this->request->getLang();
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
        if ($this->request->getLang() !== null) {
            $json["lang"] = $this->request->getLang();
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
        if ($this->request->getCurrency() !== null) {
            $json["currency"] = $this->request->getCurrency();
        }
        if ($this->request->getActivateRegionName() !== null) {
            $json["activateRegionName"] = $this->request->getActivateRegionName();
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

class ActivateRegionTask extends Gs2RestSessionTask {

    /**
     * @var ActivateRegionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ActivateRegionTask constructor.
     * @param Gs2RestSession $session
     * @param ActivateRegionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ActivateRegionRequest $request
    ) {
        parent::__construct(
            $session,
            ActivateRegionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/{projectName}/region/{regionName}/activate";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);
        $url = str_replace("{regionName}", $this->request->getRegionName() === null|| strlen($this->request->getRegionName()) == 0 ? "null" : $this->request->getRegionName(), $url);

        $json = [];
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

class WaitActivateRegionTask extends Gs2RestSessionTask {

    /**
     * @var WaitActivateRegionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WaitActivateRegionTask constructor.
     * @param Gs2RestSession $session
     * @param WaitActivateRegionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WaitActivateRegionRequest $request
    ) {
        parent::__construct(
            $session,
            WaitActivateRegionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/{projectName}/region/{regionName}/activate/wait";

        $url = str_replace("{projectName}", $this->request->getProjectName() === null|| strlen($this->request->getProjectName()) == 0 ? "null" : $this->request->getProjectName(), $url);
        $url = str_replace("{regionName}", $this->request->getRegionName() === null|| strlen($this->request->getRegionName()) == 0 ? "null" : $this->request->getRegionName(), $url);

        $json = [];
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

class DescribeDumpProgressesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDumpProgressesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDumpProgressesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDumpProgressesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDumpProgressesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDumpProgressesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/progress";

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

class GetDumpProgressTask extends Gs2RestSessionTask {

    /**
     * @var GetDumpProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDumpProgressTask constructor.
     * @param Gs2RestSession $session
     * @param GetDumpProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDumpProgressRequest $request
    ) {
        parent::__construct(
            $session,
            GetDumpProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/progress/{transactionId}";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class WaitDumpUserDataTask extends Gs2RestSessionTask {

    /**
     * @var WaitDumpUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WaitDumpUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param WaitDumpUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WaitDumpUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            WaitDumpUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/progress/{transactionId}/wait";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getMicroserviceName() !== null) {
            $json["microserviceName"] = $this->request->getMicroserviceName();
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

class ArchiveDumpUserDataTask extends Gs2RestSessionTask {

    /**
     * @var ArchiveDumpUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ArchiveDumpUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param ArchiveDumpUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ArchiveDumpUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            ArchiveDumpUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/progress/{transactionId}/archive";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class DumpUserDataTask extends Gs2RestSessionTask {

    /**
     * @var DumpUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DumpUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param DumpUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DumpUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            DumpUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetDumpUserDataTask extends Gs2RestSessionTask {

    /**
     * @var GetDumpUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDumpUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param GetDumpUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDumpUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            GetDumpUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/dump/{transactionId}";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class DescribeCleanProgressesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCleanProgressesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCleanProgressesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCleanProgressesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCleanProgressesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCleanProgressesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/clean/progress";

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

class GetCleanProgressTask extends Gs2RestSessionTask {

    /**
     * @var GetCleanProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCleanProgressTask constructor.
     * @param Gs2RestSession $session
     * @param GetCleanProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCleanProgressRequest $request
    ) {
        parent::__construct(
            $session,
            GetCleanProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/clean/progress/{transactionId}";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class WaitCleanUserDataTask extends Gs2RestSessionTask {

    /**
     * @var WaitCleanUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WaitCleanUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param WaitCleanUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WaitCleanUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            WaitCleanUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/clean/progress/{transactionId}/wait";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getMicroserviceName() !== null) {
            $json["microserviceName"] = $this->request->getMicroserviceName();
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

class CleanUserDataTask extends Gs2RestSessionTask {

    /**
     * @var CleanUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CleanUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param CleanUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CleanUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            CleanUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/clean/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeImportProgressesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeImportProgressesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeImportProgressesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeImportProgressesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeImportProgressesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeImportProgressesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/progress";

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

class GetImportProgressTask extends Gs2RestSessionTask {

    /**
     * @var GetImportProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetImportProgressTask constructor.
     * @param Gs2RestSession $session
     * @param GetImportProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetImportProgressRequest $request
    ) {
        parent::__construct(
            $session,
            GetImportProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/progress/{transactionId}";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class WaitImportUserDataTask extends Gs2RestSessionTask {

    /**
     * @var WaitImportUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WaitImportUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param WaitImportUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WaitImportUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            WaitImportUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/progress/{transactionId}/wait";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getMicroserviceName() !== null) {
            $json["microserviceName"] = $this->request->getMicroserviceName();
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

class PrepareImportUserDataTask extends Gs2RestSessionTask {

    /**
     * @var PrepareImportUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareImportUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareImportUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareImportUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareImportUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/{userId}/prepare";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ImportUserDataTask extends Gs2RestSessionTask {

    /**
     * @var ImportUserDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ImportUserDataTask constructor.
     * @param Gs2RestSession $session
     * @param ImportUserDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ImportUserDataRequest $request
    ) {
        parent::__construct(
            $session,
            ImportUserDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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

class DescribeImportErrorLogsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeImportErrorLogsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeImportErrorLogsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeImportErrorLogsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeImportErrorLogsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeImportErrorLogsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/progress/{transactionId}/log";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);

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

class GetImportErrorLogTask extends Gs2RestSessionTask {

    /**
     * @var GetImportErrorLogRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetImportErrorLogTask constructor.
     * @param Gs2RestSession $session
     * @param GetImportErrorLogRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetImportErrorLogRequest $request
    ) {
        parent::__construct(
            $session,
            GetImportErrorLogResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "project", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/account/me/project/import/progress/{transactionId}/log/{errorLogName}";

        $url = str_replace("{transactionId}", $this->request->getTransactionId() === null|| strlen($this->request->getTransactionId()) == 0 ? "null" : $this->request->getTransactionId(), $url);
        $url = str_replace("{errorLogName}", $this->request->getErrorLogName() === null|| strlen($this->request->getErrorLogName()) == 0 ? "null" : $this->request->getErrorLogName(), $url);

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
     * @param CreateAccountRequest $request
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
     * @param CreateAccountRequest $request
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
     * @param VerifyRequest $request
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
     * @param VerifyRequest $request
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
     * @param SignInRequest $request
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
     * @param SignInRequest $request
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
     * @param ForgetRequest $request
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
     * @param ForgetRequest $request
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
     * @param IssuePasswordRequest $request
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
     * @param IssuePasswordRequest $request
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
     * @param UpdateAccountRequest $request
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
     * @param UpdateAccountRequest $request
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
     * @param DeleteAccountRequest $request
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
     * @param DeleteAccountRequest $request
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
     * @param DescribeProjectsRequest $request
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
     * @param DescribeProjectsRequest $request
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
     * @param CreateProjectRequest $request
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
     * @param CreateProjectRequest $request
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
     * @param GetProjectRequest $request
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
     * @param GetProjectRequest $request
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
     * @param GetProjectTokenRequest $request
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
     * @param GetProjectTokenRequest $request
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
     * @param GetProjectTokenByIdentifierRequest $request
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
     * @param GetProjectTokenByIdentifierRequest $request
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
     * @param UpdateProjectRequest $request
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
     * @param UpdateProjectRequest $request
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
     * @param ActivateRegionRequest $request
     * @return PromiseInterface
     */
    public function activateRegionAsync(
            ActivateRegionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ActivateRegionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ActivateRegionRequest $request
     * @return ActivateRegionResult
     */
    public function activateRegion (
            ActivateRegionRequest $request
    ): ActivateRegionResult {
        return $this->activateRegionAsync(
            $request
        )->wait();
    }

    /**
     * @param WaitActivateRegionRequest $request
     * @return PromiseInterface
     */
    public function waitActivateRegionAsync(
            WaitActivateRegionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WaitActivateRegionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WaitActivateRegionRequest $request
     * @return WaitActivateRegionResult
     */
    public function waitActivateRegion (
            WaitActivateRegionRequest $request
    ): WaitActivateRegionResult {
        return $this->waitActivateRegionAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteProjectRequest $request
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
     * @param DeleteProjectRequest $request
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
     * @param DescribeBillingMethodsRequest $request
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
     * @param DescribeBillingMethodsRequest $request
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
     * @param CreateBillingMethodRequest $request
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
     * @param CreateBillingMethodRequest $request
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
     * @param GetBillingMethodRequest $request
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
     * @param GetBillingMethodRequest $request
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
     * @param UpdateBillingMethodRequest $request
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
     * @param UpdateBillingMethodRequest $request
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
     * @param DeleteBillingMethodRequest $request
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
     * @param DeleteBillingMethodRequest $request
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
     * @param DescribeReceiptsRequest $request
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
     * @param DescribeReceiptsRequest $request
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
     * @param DescribeBillingsRequest $request
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
     * @param DescribeBillingsRequest $request
     * @return DescribeBillingsResult
     */
    public function describeBillings (
            DescribeBillingsRequest $request
    ): DescribeBillingsResult {
        return $this->describeBillingsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeDumpProgressesRequest $request
     * @return PromiseInterface
     */
    public function describeDumpProgressesAsync(
            DescribeDumpProgressesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDumpProgressesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeDumpProgressesRequest $request
     * @return DescribeDumpProgressesResult
     */
    public function describeDumpProgresses (
            DescribeDumpProgressesRequest $request
    ): DescribeDumpProgressesResult {
        return $this->describeDumpProgressesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDumpProgressRequest $request
     * @return PromiseInterface
     */
    public function getDumpProgressAsync(
            GetDumpProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDumpProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDumpProgressRequest $request
     * @return GetDumpProgressResult
     */
    public function getDumpProgress (
            GetDumpProgressRequest $request
    ): GetDumpProgressResult {
        return $this->getDumpProgressAsync(
            $request
        )->wait();
    }

    /**
     * @param WaitDumpUserDataRequest $request
     * @return PromiseInterface
     */
    public function waitDumpUserDataAsync(
            WaitDumpUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WaitDumpUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WaitDumpUserDataRequest $request
     * @return WaitDumpUserDataResult
     */
    public function waitDumpUserData (
            WaitDumpUserDataRequest $request
    ): WaitDumpUserDataResult {
        return $this->waitDumpUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param ArchiveDumpUserDataRequest $request
     * @return PromiseInterface
     */
    public function archiveDumpUserDataAsync(
            ArchiveDumpUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ArchiveDumpUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ArchiveDumpUserDataRequest $request
     * @return ArchiveDumpUserDataResult
     */
    public function archiveDumpUserData (
            ArchiveDumpUserDataRequest $request
    ): ArchiveDumpUserDataResult {
        return $this->archiveDumpUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param DumpUserDataRequest $request
     * @return PromiseInterface
     */
    public function dumpUserDataAsync(
            DumpUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DumpUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DumpUserDataRequest $request
     * @return DumpUserDataResult
     */
    public function dumpUserData (
            DumpUserDataRequest $request
    ): DumpUserDataResult {
        return $this->dumpUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDumpUserDataRequest $request
     * @return PromiseInterface
     */
    public function getDumpUserDataAsync(
            GetDumpUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDumpUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDumpUserDataRequest $request
     * @return GetDumpUserDataResult
     */
    public function getDumpUserData (
            GetDumpUserDataRequest $request
    ): GetDumpUserDataResult {
        return $this->getDumpUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCleanProgressesRequest $request
     * @return PromiseInterface
     */
    public function describeCleanProgressesAsync(
            DescribeCleanProgressesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCleanProgressesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCleanProgressesRequest $request
     * @return DescribeCleanProgressesResult
     */
    public function describeCleanProgresses (
            DescribeCleanProgressesRequest $request
    ): DescribeCleanProgressesResult {
        return $this->describeCleanProgressesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCleanProgressRequest $request
     * @return PromiseInterface
     */
    public function getCleanProgressAsync(
            GetCleanProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCleanProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCleanProgressRequest $request
     * @return GetCleanProgressResult
     */
    public function getCleanProgress (
            GetCleanProgressRequest $request
    ): GetCleanProgressResult {
        return $this->getCleanProgressAsync(
            $request
        )->wait();
    }

    /**
     * @param WaitCleanUserDataRequest $request
     * @return PromiseInterface
     */
    public function waitCleanUserDataAsync(
            WaitCleanUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WaitCleanUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WaitCleanUserDataRequest $request
     * @return WaitCleanUserDataResult
     */
    public function waitCleanUserData (
            WaitCleanUserDataRequest $request
    ): WaitCleanUserDataResult {
        return $this->waitCleanUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataRequest $request
     * @return PromiseInterface
     */
    public function cleanUserDataAsync(
            CleanUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CleanUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CleanUserDataRequest $request
     * @return CleanUserDataResult
     */
    public function cleanUserData (
            CleanUserDataRequest $request
    ): CleanUserDataResult {
        return $this->cleanUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeImportProgressesRequest $request
     * @return PromiseInterface
     */
    public function describeImportProgressesAsync(
            DescribeImportProgressesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeImportProgressesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeImportProgressesRequest $request
     * @return DescribeImportProgressesResult
     */
    public function describeImportProgresses (
            DescribeImportProgressesRequest $request
    ): DescribeImportProgressesResult {
        return $this->describeImportProgressesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetImportProgressRequest $request
     * @return PromiseInterface
     */
    public function getImportProgressAsync(
            GetImportProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetImportProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetImportProgressRequest $request
     * @return GetImportProgressResult
     */
    public function getImportProgress (
            GetImportProgressRequest $request
    ): GetImportProgressResult {
        return $this->getImportProgressAsync(
            $request
        )->wait();
    }

    /**
     * @param WaitImportUserDataRequest $request
     * @return PromiseInterface
     */
    public function waitImportUserDataAsync(
            WaitImportUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WaitImportUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WaitImportUserDataRequest $request
     * @return WaitImportUserDataResult
     */
    public function waitImportUserData (
            WaitImportUserDataRequest $request
    ): WaitImportUserDataResult {
        return $this->waitImportUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataRequest $request
     * @return PromiseInterface
     */
    public function prepareImportUserDataAsync(
            PrepareImportUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareImportUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PrepareImportUserDataRequest $request
     * @return PrepareImportUserDataResult
     */
    public function prepareImportUserData (
            PrepareImportUserDataRequest $request
    ): PrepareImportUserDataResult {
        return $this->prepareImportUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataRequest $request
     * @return PromiseInterface
     */
    public function importUserDataAsync(
            ImportUserDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ImportUserDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ImportUserDataRequest $request
     * @return ImportUserDataResult
     */
    public function importUserData (
            ImportUserDataRequest $request
    ): ImportUserDataResult {
        return $this->importUserDataAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeImportErrorLogsRequest $request
     * @return PromiseInterface
     */
    public function describeImportErrorLogsAsync(
            DescribeImportErrorLogsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeImportErrorLogsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeImportErrorLogsRequest $request
     * @return DescribeImportErrorLogsResult
     */
    public function describeImportErrorLogs (
            DescribeImportErrorLogsRequest $request
    ): DescribeImportErrorLogsResult {
        return $this->describeImportErrorLogsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetImportErrorLogRequest $request
     * @return PromiseInterface
     */
    public function getImportErrorLogAsync(
            GetImportErrorLogRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetImportErrorLogTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetImportErrorLogRequest $request
     * @return GetImportErrorLogResult
     */
    public function getImportErrorLog (
            GetImportErrorLogRequest $request
    ): GetImportErrorLogResult {
        return $this->getImportErrorLogAsync(
            $request
        )->wait();
    }
}