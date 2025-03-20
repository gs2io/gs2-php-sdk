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
use Gs2\Account\Request\DumpUserDataByUserIdRequest;
use Gs2\Account\Result\DumpUserDataByUserIdResult;
use Gs2\Account\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Account\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Account\Request\CleanUserDataByUserIdRequest;
use Gs2\Account\Result\CleanUserDataByUserIdResult;
use Gs2\Account\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Account\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Account\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Account\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Account\Request\ImportUserDataByUserIdRequest;
use Gs2\Account\Result\ImportUserDataByUserIdResult;
use Gs2\Account\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Account\Result\CheckImportUserDataByUserIdResult;
use Gs2\Account\Request\DescribeAccountsRequest;
use Gs2\Account\Result\DescribeAccountsResult;
use Gs2\Account\Request\CreateAccountRequest;
use Gs2\Account\Result\CreateAccountResult;
use Gs2\Account\Request\UpdateTimeOffsetRequest;
use Gs2\Account\Result\UpdateTimeOffsetResult;
use Gs2\Account\Request\UpdateBannedRequest;
use Gs2\Account\Result\UpdateBannedResult;
use Gs2\Account\Request\AddBanRequest;
use Gs2\Account\Result\AddBanResult;
use Gs2\Account\Request\RemoveBanRequest;
use Gs2\Account\Result\RemoveBanResult;
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
use Gs2\Account\Request\CreateTakeOverOpenIdConnectRequest;
use Gs2\Account\Result\CreateTakeOverOpenIdConnectResult;
use Gs2\Account\Request\CreateTakeOverOpenIdConnectAndByUserIdRequest;
use Gs2\Account\Result\CreateTakeOverOpenIdConnectAndByUserIdResult;
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
use Gs2\Account\Request\DeleteTakeOverByUserIdRequest;
use Gs2\Account\Result\DeleteTakeOverByUserIdResult;
use Gs2\Account\Request\DoTakeOverRequest;
use Gs2\Account\Result\DoTakeOverResult;
use Gs2\Account\Request\DoTakeOverOpenIdConnectRequest;
use Gs2\Account\Result\DoTakeOverOpenIdConnectResult;
use Gs2\Account\Request\GetAuthorizationUrlRequest;
use Gs2\Account\Result\GetAuthorizationUrlResult;
use Gs2\Account\Request\DescribePlatformIdsRequest;
use Gs2\Account\Result\DescribePlatformIdsResult;
use Gs2\Account\Request\DescribePlatformIdsByUserIdRequest;
use Gs2\Account\Result\DescribePlatformIdsByUserIdResult;
use Gs2\Account\Request\CreatePlatformIdRequest;
use Gs2\Account\Result\CreatePlatformIdResult;
use Gs2\Account\Request\CreatePlatformIdByUserIdRequest;
use Gs2\Account\Result\CreatePlatformIdByUserIdResult;
use Gs2\Account\Request\GetPlatformIdRequest;
use Gs2\Account\Result\GetPlatformIdResult;
use Gs2\Account\Request\GetPlatformIdByUserIdRequest;
use Gs2\Account\Result\GetPlatformIdByUserIdResult;
use Gs2\Account\Request\FindPlatformIdRequest;
use Gs2\Account\Result\FindPlatformIdResult;
use Gs2\Account\Request\FindPlatformIdByUserIdRequest;
use Gs2\Account\Result\FindPlatformIdByUserIdResult;
use Gs2\Account\Request\DeletePlatformIdRequest;
use Gs2\Account\Result\DeletePlatformIdResult;
use Gs2\Account\Request\DeletePlatformIdByUserIdentifierRequest;
use Gs2\Account\Result\DeletePlatformIdByUserIdentifierResult;
use Gs2\Account\Request\DeletePlatformIdByUserIdRequest;
use Gs2\Account\Result\DeletePlatformIdByUserIdResult;
use Gs2\Account\Request\GetDataOwnerByUserIdRequest;
use Gs2\Account\Result\GetDataOwnerByUserIdResult;
use Gs2\Account\Request\DeleteDataOwnerByUserIdRequest;
use Gs2\Account\Result\DeleteDataOwnerByUserIdResult;
use Gs2\Account\Request\DescribeTakeOverTypeModelsRequest;
use Gs2\Account\Result\DescribeTakeOverTypeModelsResult;
use Gs2\Account\Request\GetTakeOverTypeModelRequest;
use Gs2\Account\Result\GetTakeOverTypeModelResult;
use Gs2\Account\Request\DescribeTakeOverTypeModelMastersRequest;
use Gs2\Account\Result\DescribeTakeOverTypeModelMastersResult;
use Gs2\Account\Request\CreateTakeOverTypeModelMasterRequest;
use Gs2\Account\Result\CreateTakeOverTypeModelMasterResult;
use Gs2\Account\Request\GetTakeOverTypeModelMasterRequest;
use Gs2\Account\Result\GetTakeOverTypeModelMasterResult;
use Gs2\Account\Request\UpdateTakeOverTypeModelMasterRequest;
use Gs2\Account\Result\UpdateTakeOverTypeModelMasterResult;
use Gs2\Account\Request\DeleteTakeOverTypeModelMasterRequest;
use Gs2\Account\Result\DeleteTakeOverTypeModelMasterResult;
use Gs2\Account\Request\ExportMasterRequest;
use Gs2\Account\Result\ExportMasterResult;
use Gs2\Account\Request\GetCurrentModelMasterRequest;
use Gs2\Account\Result\GetCurrentModelMasterResult;
use Gs2\Account\Request\UpdateCurrentModelMasterRequest;
use Gs2\Account\Result\UpdateCurrentModelMasterResult;
use Gs2\Account\Request\UpdateCurrentModelMasterFromGitHubRequest;
use Gs2\Account\Result\UpdateCurrentModelMasterFromGitHubResult;

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangePasswordIfTakeOver() !== null) {
            $json["changePasswordIfTakeOver"] = $this->request->getChangePasswordIfTakeOver();
        }
        if ($this->request->getDifferentUserIdForLoginAndDataRetention() !== null) {
            $json["differentUserIdForLoginAndDataRetention"] = $this->request->getDifferentUserIdForLoginAndDataRetention();
        }
        if ($this->request->getCreateAccountScript() !== null) {
            $json["createAccountScript"] = $this->request->getCreateAccountScript()->toJson();
        }
        if ($this->request->getAuthenticationScript() !== null) {
            $json["authenticationScript"] = $this->request->getAuthenticationScript()->toJson();
        }
        if ($this->request->getCreateTakeOverScript() !== null) {
            $json["createTakeOverScript"] = $this->request->getCreateTakeOverScript()->toJson();
        }
        if ($this->request->getDoTakeOverScript() !== null) {
            $json["doTakeOverScript"] = $this->request->getDoTakeOverScript()->toJson();
        }
        if ($this->request->getBanScript() !== null) {
            $json["banScript"] = $this->request->getBanScript()->toJson();
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangePasswordIfTakeOver() !== null) {
            $json["changePasswordIfTakeOver"] = $this->request->getChangePasswordIfTakeOver();
        }
        if ($this->request->getCreateAccountScript() !== null) {
            $json["createAccountScript"] = $this->request->getCreateAccountScript()->toJson();
        }
        if ($this->request->getAuthenticationScript() !== null) {
            $json["authenticationScript"] = $this->request->getAuthenticationScript()->toJson();
        }
        if ($this->request->getCreateTakeOverScript() !== null) {
            $json["createTakeOverScript"] = $this->request->getCreateTakeOverScript()->toJson();
        }
        if ($this->request->getDoTakeOverScript() !== null) {
            $json["doTakeOverScript"] = $this->request->getDoTakeOverScript()->toJson();
        }
        if ($this->request->getBanScript() !== null) {
            $json["banScript"] = $this->request->getBanScript()->toJson();
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckDumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckDumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckDumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckDumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckDumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckDumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckCleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckCleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckCleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckCleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckCleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckCleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PrepareImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/time_offset";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTimeOffset() !== null) {
            $json["timeOffset"] = $this->request->getTimeOffset();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class UpdateBannedTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBannedRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBannedTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBannedRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBannedRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBannedResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/banned";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getBanned() !== null) {
            $json["banned"] = $this->request->getBanned();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AddBanTask extends Gs2RestSessionTask {

    /**
     * @var AddBanRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddBanTask constructor.
     * @param Gs2RestSession $session
     * @param AddBanRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddBanRequest $request
    ) {
        parent::__construct(
            $session,
            AddBanResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/ban";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getBanStatus() !== null) {
            $json["banStatus"] = $this->request->getBanStatus()->toJson();
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

class RemoveBanTask extends Gs2RestSessionTask {

    /**
     * @var RemoveBanRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RemoveBanTask constructor.
     * @param Gs2RestSession $session
     * @param RemoveBanRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RemoveBanRequest $request
    ) {
        parent::__construct(
            $session,
            RemoveBanResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/ban/{banStatusName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{banStatusName}", $this->request->getBanStatusName() === null|| strlen($this->request->getBanStatusName()) == 0 ? "null" : $this->request->getBanStatusName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getIncludeLastAuthenticatedAt() !== null) {
            $queryStrings["includeLastAuthenticatedAt"] = $this->request->getIncludeLastAuthenticatedAt() ? "true" : "false";
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover";

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() !== null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() !== null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CreateTakeOverOpenIdConnectTask extends Gs2RestSessionTask {

    /**
     * @var CreateTakeOverOpenIdConnectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateTakeOverOpenIdConnectTask constructor.
     * @param Gs2RestSession $session
     * @param CreateTakeOverOpenIdConnectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateTakeOverOpenIdConnectRequest $request
    ) {
        parent::__construct(
            $session,
            CreateTakeOverOpenIdConnectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover/openIdConnect";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getIdToken() !== null) {
            $json["idToken"] = $this->request->getIdToken();
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

class CreateTakeOverOpenIdConnectAndByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateTakeOverOpenIdConnectAndByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateTakeOverOpenIdConnectAndByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateTakeOverOpenIdConnectAndByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateTakeOverOpenIdConnectAndByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover/openIdConnect";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getIdToken() !== null) {
            $json["idToken"] = $this->request->getIdToken();
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getOldPassword() !== null) {
            $json["oldPassword"] = $this->request->getOldPassword();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getDuplicationAvoider() !== null) {
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getOldPassword() !== null) {
            $json["oldPassword"] = $this->request->getOldPassword();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/takeover/type/{type}/userIdentifier/{userIdentifier}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);
        $url = str_replace("{userIdentifier}", $this->request->getUserIdentifier() === null|| strlen($this->request->getUserIdentifier()) == 0 ? "null" : $this->request->getUserIdentifier(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteTakeOverByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTakeOverByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTakeOverByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTakeOverByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTakeOverByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTakeOverByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/takeover/type/{type}/takeover";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/takeover/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getUserIdentifier() !== null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
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

class DoTakeOverOpenIdConnectTask extends Gs2RestSessionTask {

    /**
     * @var DoTakeOverOpenIdConnectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoTakeOverOpenIdConnectTask constructor.
     * @param Gs2RestSession $session
     * @param DoTakeOverOpenIdConnectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoTakeOverOpenIdConnectRequest $request
    ) {
        parent::__construct(
            $session,
            DoTakeOverOpenIdConnectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/takeover/type/{type}/openIdConnect";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getIdToken() !== null) {
            $json["idToken"] = $this->request->getIdToken();
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

class GetAuthorizationUrlTask extends Gs2RestSessionTask {

    /**
     * @var GetAuthorizationUrlRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAuthorizationUrlTask constructor.
     * @param Gs2RestSession $session
     * @param GetAuthorizationUrlRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAuthorizationUrlRequest $request
    ) {
        parent::__construct(
            $session,
            GetAuthorizationUrlResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/type/{type}/authorization/url";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

class DescribePlatformIdsTask extends Gs2RestSessionTask {

    /**
     * @var DescribePlatformIdsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePlatformIdsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePlatformIdsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePlatformIdsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePlatformIdsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/platformId";

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

class DescribePlatformIdsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribePlatformIdsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePlatformIdsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePlatformIdsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePlatformIdsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePlatformIdsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/platformId";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CreatePlatformIdTask extends Gs2RestSessionTask {

    /**
     * @var CreatePlatformIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreatePlatformIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreatePlatformIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreatePlatformIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreatePlatformIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/platformId";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() !== null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
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

class CreatePlatformIdByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreatePlatformIdByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreatePlatformIdByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreatePlatformIdByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreatePlatformIdByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreatePlatformIdByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/platformId";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getUserIdentifier() !== null) {
            $json["userIdentifier"] = $this->request->getUserIdentifier();
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

class GetPlatformIdTask extends Gs2RestSessionTask {

    /**
     * @var GetPlatformIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPlatformIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetPlatformIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPlatformIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetPlatformIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/platformId/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

class GetPlatformIdByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetPlatformIdByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPlatformIdByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetPlatformIdByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPlatformIdByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetPlatformIdByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/platformId/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class FindPlatformIdTask extends Gs2RestSessionTask {

    /**
     * @var FindPlatformIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FindPlatformIdTask constructor.
     * @param Gs2RestSession $session
     * @param FindPlatformIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FindPlatformIdRequest $request
    ) {
        parent::__construct(
            $session,
            FindPlatformIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/platformId/type/{type}/userIdentifier/{userIdentifier}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);
        $url = str_replace("{userIdentifier}", $this->request->getUserIdentifier() === null|| strlen($this->request->getUserIdentifier()) == 0 ? "null" : $this->request->getUserIdentifier(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class FindPlatformIdByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var FindPlatformIdByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FindPlatformIdByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param FindPlatformIdByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FindPlatformIdByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            FindPlatformIdByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/platformId/type/{type}/userIdentifier/{userIdentifier}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);
        $url = str_replace("{userIdentifier}", $this->request->getUserIdentifier() === null|| strlen($this->request->getUserIdentifier()) == 0 ? "null" : $this->request->getUserIdentifier(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeletePlatformIdTask extends Gs2RestSessionTask {

    /**
     * @var DeletePlatformIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePlatformIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePlatformIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePlatformIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePlatformIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/me/platformId/type/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserIdentifier() !== null) {
            $queryStrings["userIdentifier"] = $this->request->getUserIdentifier();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeletePlatformIdByUserIdentifierTask extends Gs2RestSessionTask {

    /**
     * @var DeletePlatformIdByUserIdentifierRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePlatformIdByUserIdentifierTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePlatformIdByUserIdentifierRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePlatformIdByUserIdentifierRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePlatformIdByUserIdentifierResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/platformId/type/{type}/userIdentifier/{userIdentifier}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);
        $url = str_replace("{userIdentifier}", $this->request->getUserIdentifier() === null|| strlen($this->request->getUserIdentifier()) == 0 ? "null" : $this->request->getUserIdentifier(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeletePlatformIdByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeletePlatformIdByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePlatformIdByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePlatformIdByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePlatformIdByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePlatformIdByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/platformId/type/{type}/platformId";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetDataOwnerByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetDataOwnerByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDataOwnerByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetDataOwnerByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDataOwnerByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetDataOwnerByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/dataOwner";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteDataOwnerByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDataOwnerByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDataOwnerByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDataOwnerByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDataOwnerByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDataOwnerByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/account/{userId}/dataOwner";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeTakeOverTypeModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTakeOverTypeModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTakeOverTypeModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTakeOverTypeModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTakeOverTypeModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTakeOverTypeModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetTakeOverTypeModelTask extends Gs2RestSessionTask {

    /**
     * @var GetTakeOverTypeModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTakeOverTypeModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetTakeOverTypeModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTakeOverTypeModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetTakeOverTypeModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

class DescribeTakeOverTypeModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTakeOverTypeModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTakeOverTypeModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTakeOverTypeModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTakeOverTypeModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTakeOverTypeModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateTakeOverTypeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateTakeOverTypeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateTakeOverTypeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateTakeOverTypeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateTakeOverTypeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateTakeOverTypeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getOpenIdConnectSetting() !== null) {
            $json["openIdConnectSetting"] = $this->request->getOpenIdConnectSetting()->toJson();
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

class GetTakeOverTypeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetTakeOverTypeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTakeOverTypeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetTakeOverTypeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTakeOverTypeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetTakeOverTypeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

class UpdateTakeOverTypeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateTakeOverTypeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateTakeOverTypeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateTakeOverTypeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateTakeOverTypeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateTakeOverTypeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getOpenIdConnectSetting() !== null) {
            $json["openIdConnectSetting"] = $this->request->getOpenIdConnectSetting()->toJson();
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

class DeleteTakeOverTypeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTakeOverTypeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTakeOverTypeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTakeOverTypeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTakeOverTypeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTakeOverTypeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{type}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{type}", $this->request->getType() === null ? "null" : $this->request->getType(), $url);

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

class ExportMasterTask extends Gs2RestSessionTask {

    /**
     * @var ExportMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExportMasterTask constructor.
     * @param Gs2RestSession $session
     * @param ExportMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExportMasterRequest $request
    ) {
        parent::__construct(
            $session,
            ExportMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
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

class UpdateCurrentModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "account", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() !== null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
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
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function dumpUserDataByUserIdAsync(
            DumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkDumpUserDataByUserIdAsync(
            CheckDumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckDumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function cleanUserDataByUserIdAsync(
            CleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkCleanUserDataByUserIdAsync(
            CheckCleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckCleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function prepareImportUserDataByUserIdAsync(
            PrepareImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function importUserDataByUserIdAsync(
            ImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkImportUserDataByUserIdAsync(
            CheckImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAccountsRequest $request
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
     * @param DescribeAccountsRequest $request
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
     * @param UpdateTimeOffsetRequest $request
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
     * @param UpdateTimeOffsetRequest $request
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
     * @param UpdateBannedRequest $request
     * @return PromiseInterface
     */
    public function updateBannedAsync(
            UpdateBannedRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBannedTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateBannedRequest $request
     * @return UpdateBannedResult
     */
    public function updateBanned (
            UpdateBannedRequest $request
    ): UpdateBannedResult {
        return $this->updateBannedAsync(
            $request
        )->wait();
    }

    /**
     * @param AddBanRequest $request
     * @return PromiseInterface
     */
    public function addBanAsync(
            AddBanRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddBanTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddBanRequest $request
     * @return AddBanResult
     */
    public function addBan (
            AddBanRequest $request
    ): AddBanResult {
        return $this->addBanAsync(
            $request
        )->wait();
    }

    /**
     * @param RemoveBanRequest $request
     * @return PromiseInterface
     */
    public function removeBanAsync(
            RemoveBanRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RemoveBanTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RemoveBanRequest $request
     * @return RemoveBanResult
     */
    public function removeBan (
            RemoveBanRequest $request
    ): RemoveBanResult {
        return $this->removeBanAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAccountRequest $request
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
     * @param GetAccountRequest $request
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
     * @param AuthenticationRequest $request
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
     * @param AuthenticationRequest $request
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
     * @param DescribeTakeOversRequest $request
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
     * @param DescribeTakeOversRequest $request
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
     * @param DescribeTakeOversByUserIdRequest $request
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
     * @param DescribeTakeOversByUserIdRequest $request
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
     * @param CreateTakeOverRequest $request
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
     * @param CreateTakeOverRequest $request
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
     * @param CreateTakeOverByUserIdRequest $request
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
     * @param CreateTakeOverByUserIdRequest $request
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
     * @param CreateTakeOverOpenIdConnectRequest $request
     * @return PromiseInterface
     */
    public function createTakeOverOpenIdConnectAsync(
            CreateTakeOverOpenIdConnectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateTakeOverOpenIdConnectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateTakeOverOpenIdConnectRequest $request
     * @return CreateTakeOverOpenIdConnectResult
     */
    public function createTakeOverOpenIdConnect (
            CreateTakeOverOpenIdConnectRequest $request
    ): CreateTakeOverOpenIdConnectResult {
        return $this->createTakeOverOpenIdConnectAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateTakeOverOpenIdConnectAndByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createTakeOverOpenIdConnectAndByUserIdAsync(
            CreateTakeOverOpenIdConnectAndByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateTakeOverOpenIdConnectAndByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateTakeOverOpenIdConnectAndByUserIdRequest $request
     * @return CreateTakeOverOpenIdConnectAndByUserIdResult
     */
    public function createTakeOverOpenIdConnectAndByUserId (
            CreateTakeOverOpenIdConnectAndByUserIdRequest $request
    ): CreateTakeOverOpenIdConnectAndByUserIdResult {
        return $this->createTakeOverOpenIdConnectAndByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTakeOverRequest $request
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
     * @param GetTakeOverRequest $request
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
     * @param GetTakeOverByUserIdRequest $request
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
     * @param GetTakeOverByUserIdRequest $request
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
     * @param UpdateTakeOverRequest $request
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
     * @param UpdateTakeOverRequest $request
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
     * @param UpdateTakeOverByUserIdRequest $request
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
     * @param UpdateTakeOverByUserIdRequest $request
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
     * @param DeleteTakeOverRequest $request
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
     * @param DeleteTakeOverRequest $request
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
     * @param DeleteTakeOverByUserIdentifierRequest $request
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
     * @param DeleteTakeOverByUserIdentifierRequest $request
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
     * @param DeleteTakeOverByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteTakeOverByUserIdAsync(
            DeleteTakeOverByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTakeOverByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteTakeOverByUserIdRequest $request
     * @return DeleteTakeOverByUserIdResult
     */
    public function deleteTakeOverByUserId (
            DeleteTakeOverByUserIdRequest $request
    ): DeleteTakeOverByUserIdResult {
        return $this->deleteTakeOverByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DoTakeOverRequest $request
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
     * @param DoTakeOverRequest $request
     * @return DoTakeOverResult
     */
    public function doTakeOver (
            DoTakeOverRequest $request
    ): DoTakeOverResult {
        return $this->doTakeOverAsync(
            $request
        )->wait();
    }

    /**
     * @param DoTakeOverOpenIdConnectRequest $request
     * @return PromiseInterface
     */
    public function doTakeOverOpenIdConnectAsync(
            DoTakeOverOpenIdConnectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoTakeOverOpenIdConnectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoTakeOverOpenIdConnectRequest $request
     * @return DoTakeOverOpenIdConnectResult
     */
    public function doTakeOverOpenIdConnect (
            DoTakeOverOpenIdConnectRequest $request
    ): DoTakeOverOpenIdConnectResult {
        return $this->doTakeOverOpenIdConnectAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAuthorizationUrlRequest $request
     * @return PromiseInterface
     */
    public function getAuthorizationUrlAsync(
            GetAuthorizationUrlRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAuthorizationUrlTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAuthorizationUrlRequest $request
     * @return GetAuthorizationUrlResult
     */
    public function getAuthorizationUrl (
            GetAuthorizationUrlRequest $request
    ): GetAuthorizationUrlResult {
        return $this->getAuthorizationUrlAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribePlatformIdsRequest $request
     * @return PromiseInterface
     */
    public function describePlatformIdsAsync(
            DescribePlatformIdsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePlatformIdsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribePlatformIdsRequest $request
     * @return DescribePlatformIdsResult
     */
    public function describePlatformIds (
            DescribePlatformIdsRequest $request
    ): DescribePlatformIdsResult {
        return $this->describePlatformIdsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribePlatformIdsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describePlatformIdsByUserIdAsync(
            DescribePlatformIdsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePlatformIdsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribePlatformIdsByUserIdRequest $request
     * @return DescribePlatformIdsByUserIdResult
     */
    public function describePlatformIdsByUserId (
            DescribePlatformIdsByUserIdRequest $request
    ): DescribePlatformIdsByUserIdResult {
        return $this->describePlatformIdsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CreatePlatformIdRequest $request
     * @return PromiseInterface
     */
    public function createPlatformIdAsync(
            CreatePlatformIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreatePlatformIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreatePlatformIdRequest $request
     * @return CreatePlatformIdResult
     */
    public function createPlatformId (
            CreatePlatformIdRequest $request
    ): CreatePlatformIdResult {
        return $this->createPlatformIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CreatePlatformIdByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createPlatformIdByUserIdAsync(
            CreatePlatformIdByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreatePlatformIdByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreatePlatformIdByUserIdRequest $request
     * @return CreatePlatformIdByUserIdResult
     */
    public function createPlatformIdByUserId (
            CreatePlatformIdByUserIdRequest $request
    ): CreatePlatformIdByUserIdResult {
        return $this->createPlatformIdByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetPlatformIdRequest $request
     * @return PromiseInterface
     */
    public function getPlatformIdAsync(
            GetPlatformIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPlatformIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetPlatformIdRequest $request
     * @return GetPlatformIdResult
     */
    public function getPlatformId (
            GetPlatformIdRequest $request
    ): GetPlatformIdResult {
        return $this->getPlatformIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetPlatformIdByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getPlatformIdByUserIdAsync(
            GetPlatformIdByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPlatformIdByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetPlatformIdByUserIdRequest $request
     * @return GetPlatformIdByUserIdResult
     */
    public function getPlatformIdByUserId (
            GetPlatformIdByUserIdRequest $request
    ): GetPlatformIdByUserIdResult {
        return $this->getPlatformIdByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param FindPlatformIdRequest $request
     * @return PromiseInterface
     */
    public function findPlatformIdAsync(
            FindPlatformIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FindPlatformIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FindPlatformIdRequest $request
     * @return FindPlatformIdResult
     */
    public function findPlatformId (
            FindPlatformIdRequest $request
    ): FindPlatformIdResult {
        return $this->findPlatformIdAsync(
            $request
        )->wait();
    }

    /**
     * @param FindPlatformIdByUserIdRequest $request
     * @return PromiseInterface
     */
    public function findPlatformIdByUserIdAsync(
            FindPlatformIdByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FindPlatformIdByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FindPlatformIdByUserIdRequest $request
     * @return FindPlatformIdByUserIdResult
     */
    public function findPlatformIdByUserId (
            FindPlatformIdByUserIdRequest $request
    ): FindPlatformIdByUserIdResult {
        return $this->findPlatformIdByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeletePlatformIdRequest $request
     * @return PromiseInterface
     */
    public function deletePlatformIdAsync(
            DeletePlatformIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePlatformIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeletePlatformIdRequest $request
     * @return DeletePlatformIdResult
     */
    public function deletePlatformId (
            DeletePlatformIdRequest $request
    ): DeletePlatformIdResult {
        return $this->deletePlatformIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeletePlatformIdByUserIdentifierRequest $request
     * @return PromiseInterface
     */
    public function deletePlatformIdByUserIdentifierAsync(
            DeletePlatformIdByUserIdentifierRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePlatformIdByUserIdentifierTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeletePlatformIdByUserIdentifierRequest $request
     * @return DeletePlatformIdByUserIdentifierResult
     */
    public function deletePlatformIdByUserIdentifier (
            DeletePlatformIdByUserIdentifierRequest $request
    ): DeletePlatformIdByUserIdentifierResult {
        return $this->deletePlatformIdByUserIdentifierAsync(
            $request
        )->wait();
    }

    /**
     * @param DeletePlatformIdByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deletePlatformIdByUserIdAsync(
            DeletePlatformIdByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePlatformIdByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeletePlatformIdByUserIdRequest $request
     * @return DeletePlatformIdByUserIdResult
     */
    public function deletePlatformIdByUserId (
            DeletePlatformIdByUserIdRequest $request
    ): DeletePlatformIdByUserIdResult {
        return $this->deletePlatformIdByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetDataOwnerByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getDataOwnerByUserIdAsync(
            GetDataOwnerByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDataOwnerByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetDataOwnerByUserIdRequest $request
     * @return GetDataOwnerByUserIdResult
     */
    public function getDataOwnerByUserId (
            GetDataOwnerByUserIdRequest $request
    ): GetDataOwnerByUserIdResult {
        return $this->getDataOwnerByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteDataOwnerByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteDataOwnerByUserIdAsync(
            DeleteDataOwnerByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDataOwnerByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteDataOwnerByUserIdRequest $request
     * @return DeleteDataOwnerByUserIdResult
     */
    public function deleteDataOwnerByUserId (
            DeleteDataOwnerByUserIdRequest $request
    ): DeleteDataOwnerByUserIdResult {
        return $this->deleteDataOwnerByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeTakeOverTypeModelsRequest $request
     * @return PromiseInterface
     */
    public function describeTakeOverTypeModelsAsync(
            DescribeTakeOverTypeModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTakeOverTypeModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeTakeOverTypeModelsRequest $request
     * @return DescribeTakeOverTypeModelsResult
     */
    public function describeTakeOverTypeModels (
            DescribeTakeOverTypeModelsRequest $request
    ): DescribeTakeOverTypeModelsResult {
        return $this->describeTakeOverTypeModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTakeOverTypeModelRequest $request
     * @return PromiseInterface
     */
    public function getTakeOverTypeModelAsync(
            GetTakeOverTypeModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTakeOverTypeModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetTakeOverTypeModelRequest $request
     * @return GetTakeOverTypeModelResult
     */
    public function getTakeOverTypeModel (
            GetTakeOverTypeModelRequest $request
    ): GetTakeOverTypeModelResult {
        return $this->getTakeOverTypeModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeTakeOverTypeModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeTakeOverTypeModelMastersAsync(
            DescribeTakeOverTypeModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTakeOverTypeModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeTakeOverTypeModelMastersRequest $request
     * @return DescribeTakeOverTypeModelMastersResult
     */
    public function describeTakeOverTypeModelMasters (
            DescribeTakeOverTypeModelMastersRequest $request
    ): DescribeTakeOverTypeModelMastersResult {
        return $this->describeTakeOverTypeModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateTakeOverTypeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createTakeOverTypeModelMasterAsync(
            CreateTakeOverTypeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateTakeOverTypeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateTakeOverTypeModelMasterRequest $request
     * @return CreateTakeOverTypeModelMasterResult
     */
    public function createTakeOverTypeModelMaster (
            CreateTakeOverTypeModelMasterRequest $request
    ): CreateTakeOverTypeModelMasterResult {
        return $this->createTakeOverTypeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetTakeOverTypeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getTakeOverTypeModelMasterAsync(
            GetTakeOverTypeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTakeOverTypeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetTakeOverTypeModelMasterRequest $request
     * @return GetTakeOverTypeModelMasterResult
     */
    public function getTakeOverTypeModelMaster (
            GetTakeOverTypeModelMasterRequest $request
    ): GetTakeOverTypeModelMasterResult {
        return $this->getTakeOverTypeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateTakeOverTypeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateTakeOverTypeModelMasterAsync(
            UpdateTakeOverTypeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateTakeOverTypeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateTakeOverTypeModelMasterRequest $request
     * @return UpdateTakeOverTypeModelMasterResult
     */
    public function updateTakeOverTypeModelMaster (
            UpdateTakeOverTypeModelMasterRequest $request
    ): UpdateTakeOverTypeModelMasterResult {
        return $this->updateTakeOverTypeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteTakeOverTypeModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteTakeOverTypeModelMasterAsync(
            DeleteTakeOverTypeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTakeOverTypeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteTakeOverTypeModelMasterRequest $request
     * @return DeleteTakeOverTypeModelMasterResult
     */
    public function deleteTakeOverTypeModelMaster (
            DeleteTakeOverTypeModelMasterRequest $request
    ): DeleteTakeOverTypeModelMasterResult {
        return $this->deleteTakeOverTypeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     */
    public function exportMasterAsync(
            ExportMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExportMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentModelMasterAsync(
            GetCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentModelMasterRequest $request
     * @return GetCurrentModelMasterResult
     */
    public function getCurrentModelMaster (
            GetCurrentModelMasterRequest $request
    ): GetCurrentModelMasterResult {
        return $this->getCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterAsync(
            UpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return UpdateCurrentModelMasterResult
     */
    public function updateCurrentModelMaster (
            UpdateCurrentModelMasterRequest $request
    ): UpdateCurrentModelMasterResult {
        return $this->updateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterFromGitHubAsync(
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return UpdateCurrentModelMasterFromGitHubResult
     */
    public function updateCurrentModelMasterFromGitHub (
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): UpdateCurrentModelMasterFromGitHubResult {
        return $this->updateCurrentModelMasterFromGitHubAsync(
            $request
        )->wait();
    }
}