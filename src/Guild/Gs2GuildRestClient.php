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

namespace Gs2\Guild;

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


use Gs2\Guild\Request\DescribeNamespacesRequest;
use Gs2\Guild\Result\DescribeNamespacesResult;
use Gs2\Guild\Request\CreateNamespaceRequest;
use Gs2\Guild\Result\CreateNamespaceResult;
use Gs2\Guild\Request\GetNamespaceStatusRequest;
use Gs2\Guild\Result\GetNamespaceStatusResult;
use Gs2\Guild\Request\GetNamespaceRequest;
use Gs2\Guild\Result\GetNamespaceResult;
use Gs2\Guild\Request\UpdateNamespaceRequest;
use Gs2\Guild\Result\UpdateNamespaceResult;
use Gs2\Guild\Request\DeleteNamespaceRequest;
use Gs2\Guild\Result\DeleteNamespaceResult;
use Gs2\Guild\Request\GetServiceVersionRequest;
use Gs2\Guild\Result\GetServiceVersionResult;
use Gs2\Guild\Request\DumpUserDataByUserIdRequest;
use Gs2\Guild\Result\DumpUserDataByUserIdResult;
use Gs2\Guild\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Guild\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Guild\Request\CleanUserDataByUserIdRequest;
use Gs2\Guild\Result\CleanUserDataByUserIdResult;
use Gs2\Guild\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Guild\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Guild\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Guild\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Guild\Request\ImportUserDataByUserIdRequest;
use Gs2\Guild\Result\ImportUserDataByUserIdResult;
use Gs2\Guild\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Guild\Result\CheckImportUserDataByUserIdResult;
use Gs2\Guild\Request\DescribeGuildModelMastersRequest;
use Gs2\Guild\Result\DescribeGuildModelMastersResult;
use Gs2\Guild\Request\CreateGuildModelMasterRequest;
use Gs2\Guild\Result\CreateGuildModelMasterResult;
use Gs2\Guild\Request\GetGuildModelMasterRequest;
use Gs2\Guild\Result\GetGuildModelMasterResult;
use Gs2\Guild\Request\UpdateGuildModelMasterRequest;
use Gs2\Guild\Result\UpdateGuildModelMasterResult;
use Gs2\Guild\Request\DeleteGuildModelMasterRequest;
use Gs2\Guild\Result\DeleteGuildModelMasterResult;
use Gs2\Guild\Request\DescribeGuildModelsRequest;
use Gs2\Guild\Result\DescribeGuildModelsResult;
use Gs2\Guild\Request\GetGuildModelRequest;
use Gs2\Guild\Result\GetGuildModelResult;
use Gs2\Guild\Request\SearchGuildsRequest;
use Gs2\Guild\Result\SearchGuildsResult;
use Gs2\Guild\Request\SearchGuildsByUserIdRequest;
use Gs2\Guild\Result\SearchGuildsByUserIdResult;
use Gs2\Guild\Request\CreateGuildRequest;
use Gs2\Guild\Result\CreateGuildResult;
use Gs2\Guild\Request\CreateGuildByUserIdRequest;
use Gs2\Guild\Result\CreateGuildByUserIdResult;
use Gs2\Guild\Request\GetGuildRequest;
use Gs2\Guild\Result\GetGuildResult;
use Gs2\Guild\Request\GetGuildByUserIdRequest;
use Gs2\Guild\Result\GetGuildByUserIdResult;
use Gs2\Guild\Request\UpdateGuildRequest;
use Gs2\Guild\Result\UpdateGuildResult;
use Gs2\Guild\Request\UpdateGuildByGuildNameRequest;
use Gs2\Guild\Result\UpdateGuildByGuildNameResult;
use Gs2\Guild\Request\DeleteMemberRequest;
use Gs2\Guild\Result\DeleteMemberResult;
use Gs2\Guild\Request\DeleteMemberByGuildNameRequest;
use Gs2\Guild\Result\DeleteMemberByGuildNameResult;
use Gs2\Guild\Request\UpdateMemberRoleRequest;
use Gs2\Guild\Result\UpdateMemberRoleResult;
use Gs2\Guild\Request\UpdateMemberRoleByGuildNameRequest;
use Gs2\Guild\Result\UpdateMemberRoleByGuildNameResult;
use Gs2\Guild\Request\BatchUpdateMemberRoleRequest;
use Gs2\Guild\Result\BatchUpdateMemberRoleResult;
use Gs2\Guild\Request\BatchUpdateMemberRoleByGuildNameRequest;
use Gs2\Guild\Result\BatchUpdateMemberRoleByGuildNameResult;
use Gs2\Guild\Request\DeleteGuildRequest;
use Gs2\Guild\Result\DeleteGuildResult;
use Gs2\Guild\Request\DeleteGuildByGuildNameRequest;
use Gs2\Guild\Result\DeleteGuildByGuildNameResult;
use Gs2\Guild\Request\IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest;
use Gs2\Guild\Result\IncreaseMaximumCurrentMaximumMemberCountByGuildNameResult;
use Gs2\Guild\Request\DecreaseMaximumCurrentMaximumMemberCountRequest;
use Gs2\Guild\Result\DecreaseMaximumCurrentMaximumMemberCountResult;
use Gs2\Guild\Request\DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest;
use Gs2\Guild\Result\DecreaseMaximumCurrentMaximumMemberCountByGuildNameResult;
use Gs2\Guild\Request\VerifyCurrentMaximumMemberCountRequest;
use Gs2\Guild\Result\VerifyCurrentMaximumMemberCountResult;
use Gs2\Guild\Request\VerifyCurrentMaximumMemberCountByGuildNameRequest;
use Gs2\Guild\Result\VerifyCurrentMaximumMemberCountByGuildNameResult;
use Gs2\Guild\Request\VerifyIncludeMemberRequest;
use Gs2\Guild\Result\VerifyIncludeMemberResult;
use Gs2\Guild\Request\VerifyIncludeMemberByUserIdRequest;
use Gs2\Guild\Result\VerifyIncludeMemberByUserIdResult;
use Gs2\Guild\Request\SetMaximumCurrentMaximumMemberCountByGuildNameRequest;
use Gs2\Guild\Result\SetMaximumCurrentMaximumMemberCountByGuildNameResult;
use Gs2\Guild\Request\AssumeRequest;
use Gs2\Guild\Result\AssumeResult;
use Gs2\Guild\Request\AssumeByUserIdRequest;
use Gs2\Guild\Result\AssumeByUserIdResult;
use Gs2\Guild\Request\IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest;
use Gs2\Guild\Result\IncreaseMaximumCurrentMaximumMemberCountByStampSheetResult;
use Gs2\Guild\Request\DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest;
use Gs2\Guild\Result\DecreaseMaximumCurrentMaximumMemberCountByStampTaskResult;
use Gs2\Guild\Request\SetMaximumCurrentMaximumMemberCountByStampSheetRequest;
use Gs2\Guild\Result\SetMaximumCurrentMaximumMemberCountByStampSheetResult;
use Gs2\Guild\Request\VerifyCurrentMaximumMemberCountByStampTaskRequest;
use Gs2\Guild\Result\VerifyCurrentMaximumMemberCountByStampTaskResult;
use Gs2\Guild\Request\VerifyIncludeMemberByStampTaskRequest;
use Gs2\Guild\Result\VerifyIncludeMemberByStampTaskResult;
use Gs2\Guild\Request\DescribeJoinedGuildsRequest;
use Gs2\Guild\Result\DescribeJoinedGuildsResult;
use Gs2\Guild\Request\DescribeJoinedGuildsByUserIdRequest;
use Gs2\Guild\Result\DescribeJoinedGuildsByUserIdResult;
use Gs2\Guild\Request\GetJoinedGuildRequest;
use Gs2\Guild\Result\GetJoinedGuildResult;
use Gs2\Guild\Request\GetJoinedGuildByUserIdRequest;
use Gs2\Guild\Result\GetJoinedGuildByUserIdResult;
use Gs2\Guild\Request\UpdateMemberMetadataRequest;
use Gs2\Guild\Result\UpdateMemberMetadataResult;
use Gs2\Guild\Request\UpdateMemberMetadataByUserIdRequest;
use Gs2\Guild\Result\UpdateMemberMetadataByUserIdResult;
use Gs2\Guild\Request\WithdrawalRequest;
use Gs2\Guild\Result\WithdrawalResult;
use Gs2\Guild\Request\WithdrawalByUserIdRequest;
use Gs2\Guild\Result\WithdrawalByUserIdResult;
use Gs2\Guild\Request\GetLastGuildMasterActivityRequest;
use Gs2\Guild\Result\GetLastGuildMasterActivityResult;
use Gs2\Guild\Request\GetLastGuildMasterActivityByGuildNameRequest;
use Gs2\Guild\Result\GetLastGuildMasterActivityByGuildNameResult;
use Gs2\Guild\Request\PromoteSeniorMemberRequest;
use Gs2\Guild\Result\PromoteSeniorMemberResult;
use Gs2\Guild\Request\PromoteSeniorMemberByGuildNameRequest;
use Gs2\Guild\Result\PromoteSeniorMemberByGuildNameResult;
use Gs2\Guild\Request\ExportMasterRequest;
use Gs2\Guild\Result\ExportMasterResult;
use Gs2\Guild\Request\GetCurrentGuildMasterRequest;
use Gs2\Guild\Result\GetCurrentGuildMasterResult;
use Gs2\Guild\Request\PreUpdateCurrentGuildMasterRequest;
use Gs2\Guild\Result\PreUpdateCurrentGuildMasterResult;
use Gs2\Guild\Request\UpdateCurrentGuildMasterRequest;
use Gs2\Guild\Result\UpdateCurrentGuildMasterResult;
use Gs2\Guild\Request\UpdateCurrentGuildMasterFromGitHubRequest;
use Gs2\Guild\Result\UpdateCurrentGuildMasterFromGitHubResult;
use Gs2\Guild\Request\DescribeReceiveRequestsRequest;
use Gs2\Guild\Result\DescribeReceiveRequestsResult;
use Gs2\Guild\Request\DescribeReceiveRequestsByGuildNameRequest;
use Gs2\Guild\Result\DescribeReceiveRequestsByGuildNameResult;
use Gs2\Guild\Request\GetReceiveRequestRequest;
use Gs2\Guild\Result\GetReceiveRequestResult;
use Gs2\Guild\Request\GetReceiveRequestByGuildNameRequest;
use Gs2\Guild\Result\GetReceiveRequestByGuildNameResult;
use Gs2\Guild\Request\AcceptRequestRequest;
use Gs2\Guild\Result\AcceptRequestResult;
use Gs2\Guild\Request\AcceptRequestByGuildNameRequest;
use Gs2\Guild\Result\AcceptRequestByGuildNameResult;
use Gs2\Guild\Request\RejectRequestRequest;
use Gs2\Guild\Result\RejectRequestResult;
use Gs2\Guild\Request\RejectRequestByGuildNameRequest;
use Gs2\Guild\Result\RejectRequestByGuildNameResult;
use Gs2\Guild\Request\DescribeSendRequestsRequest;
use Gs2\Guild\Result\DescribeSendRequestsResult;
use Gs2\Guild\Request\DescribeSendRequestsByUserIdRequest;
use Gs2\Guild\Result\DescribeSendRequestsByUserIdResult;
use Gs2\Guild\Request\GetSendRequestRequest;
use Gs2\Guild\Result\GetSendRequestResult;
use Gs2\Guild\Request\GetSendRequestByUserIdRequest;
use Gs2\Guild\Result\GetSendRequestByUserIdResult;
use Gs2\Guild\Request\SendRequestRequest;
use Gs2\Guild\Result\SendRequestResult;
use Gs2\Guild\Request\SendRequestByUserIdRequest;
use Gs2\Guild\Result\SendRequestByUserIdResult;
use Gs2\Guild\Request\DeleteRequestRequest;
use Gs2\Guild\Result\DeleteRequestResult;
use Gs2\Guild\Request\DeleteRequestByUserIdRequest;
use Gs2\Guild\Result\DeleteRequestByUserIdResult;
use Gs2\Guild\Request\DescribeIgnoreUsersRequest;
use Gs2\Guild\Result\DescribeIgnoreUsersResult;
use Gs2\Guild\Request\DescribeIgnoreUsersByGuildNameRequest;
use Gs2\Guild\Result\DescribeIgnoreUsersByGuildNameResult;
use Gs2\Guild\Request\GetIgnoreUserRequest;
use Gs2\Guild\Result\GetIgnoreUserResult;
use Gs2\Guild\Request\GetIgnoreUserByGuildNameRequest;
use Gs2\Guild\Result\GetIgnoreUserByGuildNameResult;
use Gs2\Guild\Request\AddIgnoreUserRequest;
use Gs2\Guild\Result\AddIgnoreUserResult;
use Gs2\Guild\Request\AddIgnoreUserByGuildNameRequest;
use Gs2\Guild\Result\AddIgnoreUserByGuildNameResult;
use Gs2\Guild\Request\DeleteIgnoreUserRequest;
use Gs2\Guild\Result\DeleteIgnoreUserResult;
use Gs2\Guild\Request\DeleteIgnoreUserByGuildNameRequest;
use Gs2\Guild\Result\DeleteIgnoreUserByGuildNameResult;

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangeNotification() !== null) {
            $json["changeNotification"] = $this->request->getChangeNotification()->toJson();
        }
        if ($this->request->getJoinNotification() !== null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() !== null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getChangeMemberNotification() !== null) {
            $json["changeMemberNotification"] = $this->request->getChangeMemberNotification()->toJson();
        }
        if ($this->request->getReceiveRequestNotification() !== null) {
            $json["receiveRequestNotification"] = $this->request->getReceiveRequestNotification()->toJson();
        }
        if ($this->request->getRemoveRequestNotification() !== null) {
            $json["removeRequestNotification"] = $this->request->getRemoveRequestNotification()->toJson();
        }
        if ($this->request->getCreateGuildScript() !== null) {
            $json["createGuildScript"] = $this->request->getCreateGuildScript()->toJson();
        }
        if ($this->request->getUpdateGuildScript() !== null) {
            $json["updateGuildScript"] = $this->request->getUpdateGuildScript()->toJson();
        }
        if ($this->request->getJoinGuildScript() !== null) {
            $json["joinGuildScript"] = $this->request->getJoinGuildScript()->toJson();
        }
        if ($this->request->getLeaveGuildScript() !== null) {
            $json["leaveGuildScript"] = $this->request->getLeaveGuildScript()->toJson();
        }
        if ($this->request->getChangeRoleScript() !== null) {
            $json["changeRoleScript"] = $this->request->getChangeRoleScript()->toJson();
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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getChangeNotification() !== null) {
            $json["changeNotification"] = $this->request->getChangeNotification()->toJson();
        }
        if ($this->request->getJoinNotification() !== null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() !== null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getChangeMemberNotification() !== null) {
            $json["changeMemberNotification"] = $this->request->getChangeMemberNotification()->toJson();
        }
        if ($this->request->getReceiveRequestNotification() !== null) {
            $json["receiveRequestNotification"] = $this->request->getReceiveRequestNotification()->toJson();
        }
        if ($this->request->getRemoveRequestNotification() !== null) {
            $json["removeRequestNotification"] = $this->request->getRemoveRequestNotification()->toJson();
        }
        if ($this->request->getCreateGuildScript() !== null) {
            $json["createGuildScript"] = $this->request->getCreateGuildScript()->toJson();
        }
        if ($this->request->getUpdateGuildScript() !== null) {
            $json["updateGuildScript"] = $this->request->getUpdateGuildScript()->toJson();
        }
        if ($this->request->getJoinGuildScript() !== null) {
            $json["joinGuildScript"] = $this->request->getJoinGuildScript()->toJson();
        }
        if ($this->request->getLeaveGuildScript() !== null) {
            $json["leaveGuildScript"] = $this->request->getLeaveGuildScript()->toJson();
        }
        if ($this->request->getChangeRoleScript() !== null) {
            $json["changeRoleScript"] = $this->request->getChangeRoleScript()->toJson();
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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeGuildModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGuildModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGuildModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGuildModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGuildModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGuildModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateGuildModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateGuildModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGuildModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGuildModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGuildModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGuildModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultMaximumMemberCount() !== null) {
            $json["defaultMaximumMemberCount"] = $this->request->getDefaultMaximumMemberCount();
        }
        if ($this->request->getMaximumMemberCount() !== null) {
            $json["maximumMemberCount"] = $this->request->getMaximumMemberCount();
        }
        if ($this->request->getInactivityPeriodDays() !== null) {
            $json["inactivityPeriodDays"] = $this->request->getInactivityPeriodDays();
        }
        if ($this->request->getRoles() !== null) {
            $array = [];
            foreach ($this->request->getRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["roles"] = $array;
        }
        if ($this->request->getGuildMasterRole() !== null) {
            $json["guildMasterRole"] = $this->request->getGuildMasterRole();
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
        }
        if ($this->request->getRejoinCoolTimeMinutes() !== null) {
            $json["rejoinCoolTimeMinutes"] = $this->request->getRejoinCoolTimeMinutes();
        }
        if ($this->request->getMaxConcurrentJoinGuilds() !== null) {
            $json["maxConcurrentJoinGuilds"] = $this->request->getMaxConcurrentJoinGuilds();
        }
        if ($this->request->getMaxConcurrentGuildMasterCount() !== null) {
            $json["maxConcurrentGuildMasterCount"] = $this->request->getMaxConcurrentGuildMasterCount();
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

class GetGuildModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetGuildModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGuildModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetGuildModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGuildModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetGuildModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class UpdateGuildModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGuildModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGuildModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGuildModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGuildModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGuildModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultMaximumMemberCount() !== null) {
            $json["defaultMaximumMemberCount"] = $this->request->getDefaultMaximumMemberCount();
        }
        if ($this->request->getMaximumMemberCount() !== null) {
            $json["maximumMemberCount"] = $this->request->getMaximumMemberCount();
        }
        if ($this->request->getInactivityPeriodDays() !== null) {
            $json["inactivityPeriodDays"] = $this->request->getInactivityPeriodDays();
        }
        if ($this->request->getRoles() !== null) {
            $array = [];
            foreach ($this->request->getRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["roles"] = $array;
        }
        if ($this->request->getGuildMasterRole() !== null) {
            $json["guildMasterRole"] = $this->request->getGuildMasterRole();
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
        }
        if ($this->request->getRejoinCoolTimeMinutes() !== null) {
            $json["rejoinCoolTimeMinutes"] = $this->request->getRejoinCoolTimeMinutes();
        }
        if ($this->request->getMaxConcurrentJoinGuilds() !== null) {
            $json["maxConcurrentJoinGuilds"] = $this->request->getMaxConcurrentJoinGuilds();
        }
        if ($this->request->getMaxConcurrentGuildMasterCount() !== null) {
            $json["maxConcurrentGuildMasterCount"] = $this->request->getMaxConcurrentGuildMasterCount();
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

class DeleteGuildModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGuildModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGuildModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGuildModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGuildModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGuildModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class DescribeGuildModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGuildModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGuildModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGuildModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGuildModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGuildModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetGuildModelTask extends Gs2RestSessionTask {

    /**
     * @var GetGuildModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGuildModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetGuildModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGuildModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetGuildModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class SearchGuildsTask extends Gs2RestSessionTask {

    /**
     * @var SearchGuildsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SearchGuildsTask constructor.
     * @param Gs2RestSession $session
     * @param SearchGuildsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SearchGuildsRequest $request
    ) {
        parent::__construct(
            $session,
            SearchGuildsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/guild/{guildModelName}/search";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttributes1() !== null) {
            $array = [];
            foreach ($this->request->getAttributes1() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes1"] = $array;
        }
        if ($this->request->getAttributes2() !== null) {
            $array = [];
            foreach ($this->request->getAttributes2() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes2"] = $array;
        }
        if ($this->request->getAttributes3() !== null) {
            $array = [];
            foreach ($this->request->getAttributes3() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes3"] = $array;
        }
        if ($this->request->getAttributes4() !== null) {
            $array = [];
            foreach ($this->request->getAttributes4() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes4"] = $array;
        }
        if ($this->request->getAttributes5() !== null) {
            $array = [];
            foreach ($this->request->getAttributes5() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes5"] = $array;
        }
        if ($this->request->getJoinPolicies() !== null) {
            $array = [];
            foreach ($this->request->getJoinPolicies() as $item)
            {
                array_push($array, $item);
            }
            $json["joinPolicies"] = $array;
        }
        if ($this->request->getIncludeFullMembersGuild() !== null) {
            $json["includeFullMembersGuild"] = $this->request->getIncludeFullMembersGuild();
        }
        if ($this->request->getOrderBy() !== null) {
            $json["orderBy"] = $this->request->getOrderBy();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class SearchGuildsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SearchGuildsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SearchGuildsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SearchGuildsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SearchGuildsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SearchGuildsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/guild/{guildModelName}/search";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttributes1() !== null) {
            $array = [];
            foreach ($this->request->getAttributes1() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes1"] = $array;
        }
        if ($this->request->getAttributes2() !== null) {
            $array = [];
            foreach ($this->request->getAttributes2() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes2"] = $array;
        }
        if ($this->request->getAttributes3() !== null) {
            $array = [];
            foreach ($this->request->getAttributes3() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes3"] = $array;
        }
        if ($this->request->getAttributes4() !== null) {
            $array = [];
            foreach ($this->request->getAttributes4() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes4"] = $array;
        }
        if ($this->request->getAttributes5() !== null) {
            $array = [];
            foreach ($this->request->getAttributes5() as $item)
            {
                array_push($array, $item);
            }
            $json["attributes5"] = $array;
        }
        if ($this->request->getJoinPolicies() !== null) {
            $array = [];
            foreach ($this->request->getJoinPolicies() as $item)
            {
                array_push($array, $item);
            }
            $json["joinPolicies"] = $array;
        }
        if ($this->request->getIncludeFullMembersGuild() !== null) {
            $json["includeFullMembersGuild"] = $this->request->getIncludeFullMembersGuild();
        }
        if ($this->request->getOrderBy() !== null) {
            $json["orderBy"] = $this->request->getOrderBy();
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

class CreateGuildTask extends Gs2RestSessionTask {

    /**
     * @var CreateGuildRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGuildTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGuildRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGuildRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGuildResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/guild/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttribute1() !== null) {
            $json["attribute1"] = $this->request->getAttribute1();
        }
        if ($this->request->getAttribute2() !== null) {
            $json["attribute2"] = $this->request->getAttribute2();
        }
        if ($this->request->getAttribute3() !== null) {
            $json["attribute3"] = $this->request->getAttribute3();
        }
        if ($this->request->getAttribute4() !== null) {
            $json["attribute4"] = $this->request->getAttribute4();
        }
        if ($this->request->getAttribute5() !== null) {
            $json["attribute5"] = $this->request->getAttribute5();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMemberMetadata() !== null) {
            $json["memberMetadata"] = $this->request->getMemberMetadata();
        }
        if ($this->request->getJoinPolicy() !== null) {
            $json["joinPolicy"] = $this->request->getJoinPolicy();
        }
        if ($this->request->getCustomRoles() !== null) {
            $array = [];
            foreach ($this->request->getCustomRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["customRoles"] = $array;
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
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

class CreateGuildByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateGuildByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGuildByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGuildByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGuildByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGuildByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/guild/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttribute1() !== null) {
            $json["attribute1"] = $this->request->getAttribute1();
        }
        if ($this->request->getAttribute2() !== null) {
            $json["attribute2"] = $this->request->getAttribute2();
        }
        if ($this->request->getAttribute3() !== null) {
            $json["attribute3"] = $this->request->getAttribute3();
        }
        if ($this->request->getAttribute4() !== null) {
            $json["attribute4"] = $this->request->getAttribute4();
        }
        if ($this->request->getAttribute5() !== null) {
            $json["attribute5"] = $this->request->getAttribute5();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMemberMetadata() !== null) {
            $json["memberMetadata"] = $this->request->getMemberMetadata();
        }
        if ($this->request->getJoinPolicy() !== null) {
            $json["joinPolicy"] = $this->request->getJoinPolicy();
        }
        if ($this->request->getCustomRoles() !== null) {
            $array = [];
            foreach ($this->request->getCustomRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["customRoles"] = $array;
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
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

class GetGuildTask extends Gs2RestSessionTask {

    /**
     * @var GetGuildRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGuildTask constructor.
     * @param Gs2RestSession $session
     * @param GetGuildRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGuildRequest $request
    ) {
        parent::__construct(
            $session,
            GetGuildResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/guild/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class GetGuildByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetGuildByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGuildByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetGuildByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGuildByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetGuildByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/guild/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class UpdateGuildTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGuildRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGuildTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGuildRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGuildRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGuildResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttribute1() !== null) {
            $json["attribute1"] = $this->request->getAttribute1();
        }
        if ($this->request->getAttribute2() !== null) {
            $json["attribute2"] = $this->request->getAttribute2();
        }
        if ($this->request->getAttribute3() !== null) {
            $json["attribute3"] = $this->request->getAttribute3();
        }
        if ($this->request->getAttribute4() !== null) {
            $json["attribute4"] = $this->request->getAttribute4();
        }
        if ($this->request->getAttribute5() !== null) {
            $json["attribute5"] = $this->request->getAttribute5();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getJoinPolicy() !== null) {
            $json["joinPolicy"] = $this->request->getJoinPolicy();
        }
        if ($this->request->getCustomRoles() !== null) {
            $array = [];
            foreach ($this->request->getCustomRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["customRoles"] = $array;
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
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

class UpdateGuildByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGuildByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGuildByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGuildByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGuildByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGuildByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getDisplayName() !== null) {
            $json["displayName"] = $this->request->getDisplayName();
        }
        if ($this->request->getAttribute1() !== null) {
            $json["attribute1"] = $this->request->getAttribute1();
        }
        if ($this->request->getAttribute2() !== null) {
            $json["attribute2"] = $this->request->getAttribute2();
        }
        if ($this->request->getAttribute3() !== null) {
            $json["attribute3"] = $this->request->getAttribute3();
        }
        if ($this->request->getAttribute4() !== null) {
            $json["attribute4"] = $this->request->getAttribute4();
        }
        if ($this->request->getAttribute5() !== null) {
            $json["attribute5"] = $this->request->getAttribute5();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getJoinPolicy() !== null) {
            $json["joinPolicy"] = $this->request->getJoinPolicy();
        }
        if ($this->request->getCustomRoles() !== null) {
            $array = [];
            foreach ($this->request->getCustomRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["customRoles"] = $array;
        }
        if ($this->request->getGuildMemberDefaultRole() !== null) {
            $json["guildMemberDefaultRole"] = $this->request->getGuildMemberDefaultRole();
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

        return parent::executeImpl();
    }
}

class DeleteMemberTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMemberRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMemberTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMemberRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMemberRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMemberResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/member/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class DeleteMemberByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMemberByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMemberByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMemberByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMemberByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMemberByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/member/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UpdateMemberRoleTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMemberRoleRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMemberRoleTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMemberRoleRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMemberRoleRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMemberRoleResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/member/{targetUserId}/role";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $json = [];
        if ($this->request->getRoleName() !== null) {
            $json["roleName"] = $this->request->getRoleName();
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

class UpdateMemberRoleByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMemberRoleByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMemberRoleByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMemberRoleByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMemberRoleByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMemberRoleByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/member/{targetUserId}/role";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $json = [];
        if ($this->request->getRoleName() !== null) {
            $json["roleName"] = $this->request->getRoleName();
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

        return parent::executeImpl();
    }
}

class BatchUpdateMemberRoleTask extends Gs2RestSessionTask {

    /**
     * @var BatchUpdateMemberRoleRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BatchUpdateMemberRoleTask constructor.
     * @param Gs2RestSession $session
     * @param BatchUpdateMemberRoleRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BatchUpdateMemberRoleRequest $request
    ) {
        parent::__construct(
            $session,
            BatchUpdateMemberRoleResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/batch/member/role";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getMembers() !== null) {
            $array = [];
            foreach ($this->request->getMembers() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["members"] = $array;
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

class BatchUpdateMemberRoleByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var BatchUpdateMemberRoleByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BatchUpdateMemberRoleByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param BatchUpdateMemberRoleByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BatchUpdateMemberRoleByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            BatchUpdateMemberRoleByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/batch/member/role";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getMembers() !== null) {
            $array = [];
            foreach ($this->request->getMembers() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["members"] = $array;
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

        return parent::executeImpl();
    }
}

class DeleteGuildTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGuildRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGuildTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGuildRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGuildRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGuildResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class DeleteGuildByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGuildByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGuildByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGuildByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGuildByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGuildByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class IncreaseMaximumCurrentMaximumMemberCountByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseMaximumCurrentMaximumMemberCountByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseMaximumCurrentMaximumMemberCountByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/currentMaximumMemberCount/increase";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

        return parent::executeImpl();
    }
}

class DecreaseMaximumCurrentMaximumMemberCountTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaximumCurrentMaximumMemberCountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaximumCurrentMaximumMemberCountTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaximumCurrentMaximumMemberCountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaximumCurrentMaximumMemberCountRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaximumCurrentMaximumMemberCountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/currentMaximumMemberCount/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

class DecreaseMaximumCurrentMaximumMemberCountByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaximumCurrentMaximumMemberCountByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaximumCurrentMaximumMemberCountByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/currentMaximumMemberCount/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

        return parent::executeImpl();
    }
}

class VerifyCurrentMaximumMemberCountTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCurrentMaximumMemberCountRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCurrentMaximumMemberCountTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCurrentMaximumMemberCountRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCurrentMaximumMemberCountRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCurrentMaximumMemberCountResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/currentMaximumMemberCount/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
        }
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyCurrentMaximumMemberCountByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCurrentMaximumMemberCountByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCurrentMaximumMemberCountByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCurrentMaximumMemberCountByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCurrentMaximumMemberCountByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/currentMaximumMemberCount/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
        }
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

        return parent::executeImpl();
    }
}

class VerifyIncludeMemberTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeMemberRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeMemberTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeMemberRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeMemberRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeMemberResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/member/me/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
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

class VerifyIncludeMemberByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeMemberByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeMemberByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeMemberByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeMemberByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeMemberByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/member/{userId}/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
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

class SetMaximumCurrentMaximumMemberCountByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var SetMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMaximumCurrentMaximumMemberCountByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            SetMaximumCurrentMaximumMemberCountByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/currentMaximumMemberCount";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

        return parent::executeImpl();
    }
}

class AssumeTask extends Gs2RestSessionTask {

    /**
     * @var AssumeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AssumeTask constructor.
     * @param Gs2RestSession $session
     * @param AssumeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AssumeRequest $request
    ) {
        parent::__construct(
            $session,
            AssumeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/guild/{guildModelName}/{guildName}/assume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AssumeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AssumeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AssumeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AssumeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AssumeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AssumeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/guild/{guildModelName}/{guildName}/assume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class IncreaseMaximumCurrentMaximumMemberCountByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseMaximumCurrentMaximumMemberCountByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseMaximumCurrentMaximumMemberCountByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/guild/currentMaximumMemberCount/add";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

class DecreaseMaximumCurrentMaximumMemberCountByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseMaximumCurrentMaximumMemberCountByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseMaximumCurrentMaximumMemberCountByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/guild/currentMaximumMemberCount/sub";

        $json = [];
        if ($this->request->getStampTask() !== null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

class SetMaximumCurrentMaximumMemberCountByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetMaximumCurrentMaximumMemberCountByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMaximumCurrentMaximumMemberCountByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetMaximumCurrentMaximumMemberCountByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/guild/currentMaximumMemberCount/set";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

class VerifyCurrentMaximumMemberCountByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCurrentMaximumMemberCountByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCurrentMaximumMemberCountByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCurrentMaximumMemberCountByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCurrentMaximumMemberCountByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCurrentMaximumMemberCountByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/guild/currentMaximumMemberCount/verify";

        $json = [];
        if ($this->request->getStampTask() !== null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

class VerifyIncludeMemberByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeMemberByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeMemberByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeMemberByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeMemberByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeMemberByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/guild/member/verify";

        $json = [];
        if ($this->request->getStampTask() !== null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

class DescribeJoinedGuildsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeJoinedGuildsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeJoinedGuildsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeJoinedGuildsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeJoinedGuildsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeJoinedGuildsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/joined";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getGuildModelName() !== null) {
            $queryStrings["guildModelName"] = $this->request->getGuildModelName();
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

class DescribeJoinedGuildsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeJoinedGuildsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeJoinedGuildsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeJoinedGuildsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeJoinedGuildsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeJoinedGuildsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/joined";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getGuildModelName() !== null) {
            $queryStrings["guildModelName"] = $this->request->getGuildModelName();
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

class GetJoinedGuildTask extends Gs2RestSessionTask {

    /**
     * @var GetJoinedGuildRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetJoinedGuildTask constructor.
     * @param Gs2RestSession $session
     * @param GetJoinedGuildRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetJoinedGuildRequest $request
    ) {
        parent::__construct(
            $session,
            GetJoinedGuildResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/joined/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class GetJoinedGuildByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetJoinedGuildByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetJoinedGuildByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetJoinedGuildByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetJoinedGuildByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetJoinedGuildByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/joined/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class UpdateMemberMetadataTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMemberMetadataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMemberMetadataTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMemberMetadataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMemberMetadataRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMemberMetadataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/guild/{guildName}/member/me/metadata";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class UpdateMemberMetadataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMemberMetadataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMemberMetadataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMemberMetadataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMemberMetadataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMemberMetadataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/guild/{guildName}/member/{userId}/metadata";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class WithdrawalTask extends Gs2RestSessionTask {

    /**
     * @var WithdrawalRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WithdrawalTask constructor.
     * @param Gs2RestSession $session
     * @param WithdrawalRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WithdrawalRequest $request
    ) {
        parent::__construct(
            $session,
            WithdrawalResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/joined/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class WithdrawalByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var WithdrawalByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WithdrawalByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param WithdrawalByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WithdrawalByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            WithdrawalByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/joined/{guildModelName}/{guildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class GetLastGuildMasterActivityTask extends Gs2RestSessionTask {

    /**
     * @var GetLastGuildMasterActivityRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLastGuildMasterActivityTask constructor.
     * @param Gs2RestSession $session
     * @param GetLastGuildMasterActivityRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLastGuildMasterActivityRequest $request
    ) {
        parent::__construct(
            $session,
            GetLastGuildMasterActivityResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/activity/guildMaster/last";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class GetLastGuildMasterActivityByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var GetLastGuildMasterActivityByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLastGuildMasterActivityByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param GetLastGuildMasterActivityByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLastGuildMasterActivityByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            GetLastGuildMasterActivityByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/activity/guildMaster/last";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class PromoteSeniorMemberTask extends Gs2RestSessionTask {

    /**
     * @var PromoteSeniorMemberRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PromoteSeniorMemberTask constructor.
     * @param Gs2RestSession $session
     * @param PromoteSeniorMemberRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PromoteSeniorMemberRequest $request
    ) {
        parent::__construct(
            $session,
            PromoteSeniorMemberResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/promote";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class PromoteSeniorMemberByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var PromoteSeniorMemberByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PromoteSeniorMemberByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param PromoteSeniorMemberByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PromoteSeniorMemberByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            PromoteSeniorMemberByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/promote";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentGuildMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentGuildMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentGuildMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentGuildMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentGuildMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentGuildMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentGuildMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentGuildMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentGuildMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentGuildMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentGuildMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentGuildMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentGuildMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentGuildMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentGuildMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentGuildMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentGuildMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentGuildMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentGuildMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentGuildMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentGuildMasterResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getSettings(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withSettings(null);
        }

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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

class UpdateCurrentGuildMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentGuildMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentGuildMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentGuildMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentGuildMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentGuildMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeReceiveRequestsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiveRequestsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiveRequestsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiveRequestsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiveRequestsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiveRequestsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/inbox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class DescribeReceiveRequestsByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiveRequestsByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiveRequestsByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiveRequestsByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiveRequestsByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiveRequestsByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/inbox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class GetReceiveRequestTask extends Gs2RestSessionTask {

    /**
     * @var GetReceiveRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceiveRequestTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceiveRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceiveRequestRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceiveRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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

class GetReceiveRequestByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var GetReceiveRequestByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceiveRequestByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceiveRequestByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceiveRequestByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceiveRequestByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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

class AcceptRequestTask extends Gs2RestSessionTask {

    /**
     * @var AcceptRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptRequestTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptRequestRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AcceptRequestByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var AcceptRequestByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptRequestByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptRequestByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptRequestByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptRequestByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RejectRequestTask extends Gs2RestSessionTask {

    /**
     * @var RejectRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RejectRequestTask constructor.
     * @param Gs2RestSession $session
     * @param RejectRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RejectRequestRequest $request
    ) {
        parent::__construct(
            $session,
            RejectRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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

class RejectRequestByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var RejectRequestByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RejectRequestByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param RejectRequestByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RejectRequestByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            RejectRequestByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

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

class DescribeSendRequestsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSendRequestsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSendRequestsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSendRequestsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSendRequestsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSendRequestsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/guild/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class DescribeSendRequestsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSendRequestsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSendRequestsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSendRequestsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSendRequestsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSendRequestsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/guild/{guildModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class GetSendRequestTask extends Gs2RestSessionTask {

    /**
     * @var GetSendRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSendRequestTask constructor.
     * @param Gs2RestSession $session
     * @param GetSendRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSendRequestRequest $request
    ) {
        parent::__construct(
            $session,
            GetSendRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

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

class GetSendRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSendRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSendRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSendRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSendRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSendRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

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

class SendRequestTask extends Gs2RestSessionTask {

    /**
     * @var SendRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendRequestTask constructor.
     * @param Gs2RestSession $session
     * @param SendRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendRequestRequest $request
    ) {
        parent::__construct(
            $session,
            SendRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class SendRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SendRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SendRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SendRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class DeleteRequestTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRequestRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRequestTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRequestRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRequestRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRequestResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

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

class DeleteRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/guild/{guildModelName}/{targetGuildName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{targetGuildName}", $this->request->getTargetGuildName() === null|| strlen($this->request->getTargetGuildName()) == 0 ? "null" : $this->request->getTargetGuildName(), $url);

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

class DescribeIgnoreUsersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeIgnoreUsersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeIgnoreUsersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeIgnoreUsersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeIgnoreUsersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeIgnoreUsersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/ignore/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);

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

class DescribeIgnoreUsersByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DescribeIgnoreUsersByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeIgnoreUsersByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeIgnoreUsersByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeIgnoreUsersByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeIgnoreUsersByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/ignore/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);

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

class GetIgnoreUserTask extends Gs2RestSessionTask {

    /**
     * @var GetIgnoreUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetIgnoreUserTask constructor.
     * @param Gs2RestSession $session
     * @param GetIgnoreUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetIgnoreUserRequest $request
    ) {
        parent::__construct(
            $session,
            GetIgnoreUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetIgnoreUserByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var GetIgnoreUserByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetIgnoreUserByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param GetIgnoreUserByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetIgnoreUserByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            GetIgnoreUserByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
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

class AddIgnoreUserTask extends Gs2RestSessionTask {

    /**
     * @var AddIgnoreUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddIgnoreUserTask constructor.
     * @param Gs2RestSession $session
     * @param AddIgnoreUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddIgnoreUserRequest $request
    ) {
        parent::__construct(
            $session,
            AddIgnoreUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AddIgnoreUserByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var AddIgnoreUserByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddIgnoreUserByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param AddIgnoreUserByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddIgnoreUserByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            AddIgnoreUserByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteIgnoreUserTask extends Gs2RestSessionTask {

    /**
     * @var DeleteIgnoreUserRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteIgnoreUserTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteIgnoreUserRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteIgnoreUserRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteIgnoreUserResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/me/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteIgnoreUserByGuildNameTask extends Gs2RestSessionTask {

    /**
     * @var DeleteIgnoreUserByGuildNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteIgnoreUserByGuildNameTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteIgnoreUserByGuildNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteIgnoreUserByGuildNameRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteIgnoreUserByGuildNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "guild", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/guild/{guildModelName}/{guildName}/ignore/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{guildModelName}", $this->request->getGuildModelName() === null|| strlen($this->request->getGuildModelName()) == 0 ? "null" : $this->request->getGuildModelName(), $url);
        $url = str_replace("{guildName}", $this->request->getGuildName() === null|| strlen($this->request->getGuildName()) == 0 ? "null" : $this->request->getGuildName(), $url);
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

/**
 * GS2 Guild API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2GuildRestClient extends AbstractGs2Client {

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
     * @param DescribeGuildModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeGuildModelMastersAsync(
            DescribeGuildModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGuildModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGuildModelMastersRequest $request
     * @return DescribeGuildModelMastersResult
     */
    public function describeGuildModelMasters (
            DescribeGuildModelMastersRequest $request
    ): DescribeGuildModelMastersResult {
        return $this->describeGuildModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGuildModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createGuildModelMasterAsync(
            CreateGuildModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGuildModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGuildModelMasterRequest $request
     * @return CreateGuildModelMasterResult
     */
    public function createGuildModelMaster (
            CreateGuildModelMasterRequest $request
    ): CreateGuildModelMasterResult {
        return $this->createGuildModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGuildModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getGuildModelMasterAsync(
            GetGuildModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGuildModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGuildModelMasterRequest $request
     * @return GetGuildModelMasterResult
     */
    public function getGuildModelMaster (
            GetGuildModelMasterRequest $request
    ): GetGuildModelMasterResult {
        return $this->getGuildModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGuildModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateGuildModelMasterAsync(
            UpdateGuildModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGuildModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGuildModelMasterRequest $request
     * @return UpdateGuildModelMasterResult
     */
    public function updateGuildModelMaster (
            UpdateGuildModelMasterRequest $request
    ): UpdateGuildModelMasterResult {
        return $this->updateGuildModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGuildModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteGuildModelMasterAsync(
            DeleteGuildModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGuildModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGuildModelMasterRequest $request
     * @return DeleteGuildModelMasterResult
     */
    public function deleteGuildModelMaster (
            DeleteGuildModelMasterRequest $request
    ): DeleteGuildModelMasterResult {
        return $this->deleteGuildModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGuildModelsRequest $request
     * @return PromiseInterface
     */
    public function describeGuildModelsAsync(
            DescribeGuildModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGuildModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGuildModelsRequest $request
     * @return DescribeGuildModelsResult
     */
    public function describeGuildModels (
            DescribeGuildModelsRequest $request
    ): DescribeGuildModelsResult {
        return $this->describeGuildModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGuildModelRequest $request
     * @return PromiseInterface
     */
    public function getGuildModelAsync(
            GetGuildModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGuildModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGuildModelRequest $request
     * @return GetGuildModelResult
     */
    public function getGuildModel (
            GetGuildModelRequest $request
    ): GetGuildModelResult {
        return $this->getGuildModelAsync(
            $request
        )->wait();
    }

    /**
     * @param SearchGuildsRequest $request
     * @return PromiseInterface
     */
    public function searchGuildsAsync(
            SearchGuildsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SearchGuildsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SearchGuildsRequest $request
     * @return SearchGuildsResult
     */
    public function searchGuilds (
            SearchGuildsRequest $request
    ): SearchGuildsResult {
        return $this->searchGuildsAsync(
            $request
        )->wait();
    }

    /**
     * @param SearchGuildsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function searchGuildsByUserIdAsync(
            SearchGuildsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SearchGuildsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SearchGuildsByUserIdRequest $request
     * @return SearchGuildsByUserIdResult
     */
    public function searchGuildsByUserId (
            SearchGuildsByUserIdRequest $request
    ): SearchGuildsByUserIdResult {
        return $this->searchGuildsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGuildRequest $request
     * @return PromiseInterface
     */
    public function createGuildAsync(
            CreateGuildRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGuildTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGuildRequest $request
     * @return CreateGuildResult
     */
    public function createGuild (
            CreateGuildRequest $request
    ): CreateGuildResult {
        return $this->createGuildAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGuildByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createGuildByUserIdAsync(
            CreateGuildByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGuildByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGuildByUserIdRequest $request
     * @return CreateGuildByUserIdResult
     */
    public function createGuildByUserId (
            CreateGuildByUserIdRequest $request
    ): CreateGuildByUserIdResult {
        return $this->createGuildByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGuildRequest $request
     * @return PromiseInterface
     */
    public function getGuildAsync(
            GetGuildRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGuildTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGuildRequest $request
     * @return GetGuildResult
     */
    public function getGuild (
            GetGuildRequest $request
    ): GetGuildResult {
        return $this->getGuildAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGuildByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getGuildByUserIdAsync(
            GetGuildByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGuildByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGuildByUserIdRequest $request
     * @return GetGuildByUserIdResult
     */
    public function getGuildByUserId (
            GetGuildByUserIdRequest $request
    ): GetGuildByUserIdResult {
        return $this->getGuildByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGuildRequest $request
     * @return PromiseInterface
     */
    public function updateGuildAsync(
            UpdateGuildRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGuildTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGuildRequest $request
     * @return UpdateGuildResult
     */
    public function updateGuild (
            UpdateGuildRequest $request
    ): UpdateGuildResult {
        return $this->updateGuildAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGuildByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function updateGuildByGuildNameAsync(
            UpdateGuildByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGuildByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGuildByGuildNameRequest $request
     * @return UpdateGuildByGuildNameResult
     */
    public function updateGuildByGuildName (
            UpdateGuildByGuildNameRequest $request
    ): UpdateGuildByGuildNameResult {
        return $this->updateGuildByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMemberRequest $request
     * @return PromiseInterface
     */
    public function deleteMemberAsync(
            DeleteMemberRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMemberTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMemberRequest $request
     * @return DeleteMemberResult
     */
    public function deleteMember (
            DeleteMemberRequest $request
    ): DeleteMemberResult {
        return $this->deleteMemberAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMemberByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function deleteMemberByGuildNameAsync(
            DeleteMemberByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMemberByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMemberByGuildNameRequest $request
     * @return DeleteMemberByGuildNameResult
     */
    public function deleteMemberByGuildName (
            DeleteMemberByGuildNameRequest $request
    ): DeleteMemberByGuildNameResult {
        return $this->deleteMemberByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMemberRoleRequest $request
     * @return PromiseInterface
     */
    public function updateMemberRoleAsync(
            UpdateMemberRoleRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMemberRoleTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMemberRoleRequest $request
     * @return UpdateMemberRoleResult
     */
    public function updateMemberRole (
            UpdateMemberRoleRequest $request
    ): UpdateMemberRoleResult {
        return $this->updateMemberRoleAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMemberRoleByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function updateMemberRoleByGuildNameAsync(
            UpdateMemberRoleByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMemberRoleByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMemberRoleByGuildNameRequest $request
     * @return UpdateMemberRoleByGuildNameResult
     */
    public function updateMemberRoleByGuildName (
            UpdateMemberRoleByGuildNameRequest $request
    ): UpdateMemberRoleByGuildNameResult {
        return $this->updateMemberRoleByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param BatchUpdateMemberRoleRequest $request
     * @return PromiseInterface
     */
    public function batchUpdateMemberRoleAsync(
            BatchUpdateMemberRoleRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BatchUpdateMemberRoleTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param BatchUpdateMemberRoleRequest $request
     * @return BatchUpdateMemberRoleResult
     */
    public function batchUpdateMemberRole (
            BatchUpdateMemberRoleRequest $request
    ): BatchUpdateMemberRoleResult {
        return $this->batchUpdateMemberRoleAsync(
            $request
        )->wait();
    }

    /**
     * @param BatchUpdateMemberRoleByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function batchUpdateMemberRoleByGuildNameAsync(
            BatchUpdateMemberRoleByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BatchUpdateMemberRoleByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param BatchUpdateMemberRoleByGuildNameRequest $request
     * @return BatchUpdateMemberRoleByGuildNameResult
     */
    public function batchUpdateMemberRoleByGuildName (
            BatchUpdateMemberRoleByGuildNameRequest $request
    ): BatchUpdateMemberRoleByGuildNameResult {
        return $this->batchUpdateMemberRoleByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGuildRequest $request
     * @return PromiseInterface
     */
    public function deleteGuildAsync(
            DeleteGuildRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGuildTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGuildRequest $request
     * @return DeleteGuildResult
     */
    public function deleteGuild (
            DeleteGuildRequest $request
    ): DeleteGuildResult {
        return $this->deleteGuildAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGuildByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function deleteGuildByGuildNameAsync(
            DeleteGuildByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGuildByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGuildByGuildNameRequest $request
     * @return DeleteGuildByGuildNameResult
     */
    public function deleteGuildByGuildName (
            DeleteGuildByGuildNameRequest $request
    ): DeleteGuildByGuildNameResult {
        return $this->deleteGuildByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function increaseMaximumCurrentMaximumMemberCountByGuildNameAsync(
            IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseMaximumCurrentMaximumMemberCountByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return IncreaseMaximumCurrentMaximumMemberCountByGuildNameResult
     */
    public function increaseMaximumCurrentMaximumMemberCountByGuildName (
            IncreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): IncreaseMaximumCurrentMaximumMemberCountByGuildNameResult {
        return $this->increaseMaximumCurrentMaximumMemberCountByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaximumCurrentMaximumMemberCountAsync(
            DecreaseMaximumCurrentMaximumMemberCountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaximumCurrentMaximumMemberCountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountRequest $request
     * @return DecreaseMaximumCurrentMaximumMemberCountResult
     */
    public function decreaseMaximumCurrentMaximumMemberCount (
            DecreaseMaximumCurrentMaximumMemberCountRequest $request
    ): DecreaseMaximumCurrentMaximumMemberCountResult {
        return $this->decreaseMaximumCurrentMaximumMemberCountAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaximumCurrentMaximumMemberCountByGuildNameAsync(
            DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaximumCurrentMaximumMemberCountByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return DecreaseMaximumCurrentMaximumMemberCountByGuildNameResult
     */
    public function decreaseMaximumCurrentMaximumMemberCountByGuildName (
            DecreaseMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): DecreaseMaximumCurrentMaximumMemberCountByGuildNameResult {
        return $this->decreaseMaximumCurrentMaximumMemberCountByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCurrentMaximumMemberCountRequest $request
     * @return PromiseInterface
     */
    public function verifyCurrentMaximumMemberCountAsync(
            VerifyCurrentMaximumMemberCountRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCurrentMaximumMemberCountTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCurrentMaximumMemberCountRequest $request
     * @return VerifyCurrentMaximumMemberCountResult
     */
    public function verifyCurrentMaximumMemberCount (
            VerifyCurrentMaximumMemberCountRequest $request
    ): VerifyCurrentMaximumMemberCountResult {
        return $this->verifyCurrentMaximumMemberCountAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCurrentMaximumMemberCountByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function verifyCurrentMaximumMemberCountByGuildNameAsync(
            VerifyCurrentMaximumMemberCountByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCurrentMaximumMemberCountByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCurrentMaximumMemberCountByGuildNameRequest $request
     * @return VerifyCurrentMaximumMemberCountByGuildNameResult
     */
    public function verifyCurrentMaximumMemberCountByGuildName (
            VerifyCurrentMaximumMemberCountByGuildNameRequest $request
    ): VerifyCurrentMaximumMemberCountByGuildNameResult {
        return $this->verifyCurrentMaximumMemberCountByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeMemberRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeMemberAsync(
            VerifyIncludeMemberRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeMemberTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeMemberRequest $request
     * @return VerifyIncludeMemberResult
     */
    public function verifyIncludeMember (
            VerifyIncludeMemberRequest $request
    ): VerifyIncludeMemberResult {
        return $this->verifyIncludeMemberAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeMemberByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeMemberByUserIdAsync(
            VerifyIncludeMemberByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeMemberByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeMemberByUserIdRequest $request
     * @return VerifyIncludeMemberByUserIdResult
     */
    public function verifyIncludeMemberByUserId (
            VerifyIncludeMemberByUserIdRequest $request
    ): VerifyIncludeMemberByUserIdResult {
        return $this->verifyIncludeMemberByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function setMaximumCurrentMaximumMemberCountByGuildNameAsync(
            SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMaximumCurrentMaximumMemberCountByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
     * @return SetMaximumCurrentMaximumMemberCountByGuildNameResult
     */
    public function setMaximumCurrentMaximumMemberCountByGuildName (
            SetMaximumCurrentMaximumMemberCountByGuildNameRequest $request
    ): SetMaximumCurrentMaximumMemberCountByGuildNameResult {
        return $this->setMaximumCurrentMaximumMemberCountByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param AssumeRequest $request
     * @return PromiseInterface
     */
    public function assumeAsync(
            AssumeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AssumeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AssumeRequest $request
     * @return AssumeResult
     */
    public function assume (
            AssumeRequest $request
    ): AssumeResult {
        return $this->assumeAsync(
            $request
        )->wait();
    }

    /**
     * @param AssumeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function assumeByUserIdAsync(
            AssumeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AssumeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AssumeByUserIdRequest $request
     * @return AssumeByUserIdResult
     */
    public function assumeByUserId (
            AssumeByUserIdRequest $request
    ): AssumeByUserIdResult {
        return $this->assumeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function increaseMaximumCurrentMaximumMemberCountByStampSheetAsync(
            IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseMaximumCurrentMaximumMemberCountByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     * @return IncreaseMaximumCurrentMaximumMemberCountByStampSheetResult
     */
    public function increaseMaximumCurrentMaximumMemberCountByStampSheet (
            IncreaseMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ): IncreaseMaximumCurrentMaximumMemberCountByStampSheetResult {
        return $this->increaseMaximumCurrentMaximumMemberCountByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function decreaseMaximumCurrentMaximumMemberCountByStampTaskAsync(
            DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseMaximumCurrentMaximumMemberCountByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
     * @return DecreaseMaximumCurrentMaximumMemberCountByStampTaskResult
     */
    public function decreaseMaximumCurrentMaximumMemberCountByStampTask (
            DecreaseMaximumCurrentMaximumMemberCountByStampTaskRequest $request
    ): DecreaseMaximumCurrentMaximumMemberCountByStampTaskResult {
        return $this->decreaseMaximumCurrentMaximumMemberCountByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setMaximumCurrentMaximumMemberCountByStampSheetAsync(
            SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMaximumCurrentMaximumMemberCountByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
     * @return SetMaximumCurrentMaximumMemberCountByStampSheetResult
     */
    public function setMaximumCurrentMaximumMemberCountByStampSheet (
            SetMaximumCurrentMaximumMemberCountByStampSheetRequest $request
    ): SetMaximumCurrentMaximumMemberCountByStampSheetResult {
        return $this->setMaximumCurrentMaximumMemberCountByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCurrentMaximumMemberCountByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyCurrentMaximumMemberCountByStampTaskAsync(
            VerifyCurrentMaximumMemberCountByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCurrentMaximumMemberCountByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCurrentMaximumMemberCountByStampTaskRequest $request
     * @return VerifyCurrentMaximumMemberCountByStampTaskResult
     */
    public function verifyCurrentMaximumMemberCountByStampTask (
            VerifyCurrentMaximumMemberCountByStampTaskRequest $request
    ): VerifyCurrentMaximumMemberCountByStampTaskResult {
        return $this->verifyCurrentMaximumMemberCountByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeMemberByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeMemberByStampTaskAsync(
            VerifyIncludeMemberByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeMemberByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeMemberByStampTaskRequest $request
     * @return VerifyIncludeMemberByStampTaskResult
     */
    public function verifyIncludeMemberByStampTask (
            VerifyIncludeMemberByStampTaskRequest $request
    ): VerifyIncludeMemberByStampTaskResult {
        return $this->verifyIncludeMemberByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeJoinedGuildsRequest $request
     * @return PromiseInterface
     */
    public function describeJoinedGuildsAsync(
            DescribeJoinedGuildsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeJoinedGuildsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeJoinedGuildsRequest $request
     * @return DescribeJoinedGuildsResult
     */
    public function describeJoinedGuilds (
            DescribeJoinedGuildsRequest $request
    ): DescribeJoinedGuildsResult {
        return $this->describeJoinedGuildsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeJoinedGuildsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeJoinedGuildsByUserIdAsync(
            DescribeJoinedGuildsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeJoinedGuildsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeJoinedGuildsByUserIdRequest $request
     * @return DescribeJoinedGuildsByUserIdResult
     */
    public function describeJoinedGuildsByUserId (
            DescribeJoinedGuildsByUserIdRequest $request
    ): DescribeJoinedGuildsByUserIdResult {
        return $this->describeJoinedGuildsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetJoinedGuildRequest $request
     * @return PromiseInterface
     */
    public function getJoinedGuildAsync(
            GetJoinedGuildRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetJoinedGuildTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetJoinedGuildRequest $request
     * @return GetJoinedGuildResult
     */
    public function getJoinedGuild (
            GetJoinedGuildRequest $request
    ): GetJoinedGuildResult {
        return $this->getJoinedGuildAsync(
            $request
        )->wait();
    }

    /**
     * @param GetJoinedGuildByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getJoinedGuildByUserIdAsync(
            GetJoinedGuildByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetJoinedGuildByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetJoinedGuildByUserIdRequest $request
     * @return GetJoinedGuildByUserIdResult
     */
    public function getJoinedGuildByUserId (
            GetJoinedGuildByUserIdRequest $request
    ): GetJoinedGuildByUserIdResult {
        return $this->getJoinedGuildByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMemberMetadataRequest $request
     * @return PromiseInterface
     */
    public function updateMemberMetadataAsync(
            UpdateMemberMetadataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMemberMetadataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMemberMetadataRequest $request
     * @return UpdateMemberMetadataResult
     */
    public function updateMemberMetadata (
            UpdateMemberMetadataRequest $request
    ): UpdateMemberMetadataResult {
        return $this->updateMemberMetadataAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMemberMetadataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function updateMemberMetadataByUserIdAsync(
            UpdateMemberMetadataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMemberMetadataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMemberMetadataByUserIdRequest $request
     * @return UpdateMemberMetadataByUserIdResult
     */
    public function updateMemberMetadataByUserId (
            UpdateMemberMetadataByUserIdRequest $request
    ): UpdateMemberMetadataByUserIdResult {
        return $this->updateMemberMetadataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param WithdrawalRequest $request
     * @return PromiseInterface
     */
    public function withdrawalAsync(
            WithdrawalRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WithdrawalTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WithdrawalRequest $request
     * @return WithdrawalResult
     */
    public function withdrawal (
            WithdrawalRequest $request
    ): WithdrawalResult {
        return $this->withdrawalAsync(
            $request
        )->wait();
    }

    /**
     * @param WithdrawalByUserIdRequest $request
     * @return PromiseInterface
     */
    public function withdrawalByUserIdAsync(
            WithdrawalByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WithdrawalByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param WithdrawalByUserIdRequest $request
     * @return WithdrawalByUserIdResult
     */
    public function withdrawalByUserId (
            WithdrawalByUserIdRequest $request
    ): WithdrawalByUserIdResult {
        return $this->withdrawalByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLastGuildMasterActivityRequest $request
     * @return PromiseInterface
     */
    public function getLastGuildMasterActivityAsync(
            GetLastGuildMasterActivityRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLastGuildMasterActivityTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLastGuildMasterActivityRequest $request
     * @return GetLastGuildMasterActivityResult
     */
    public function getLastGuildMasterActivity (
            GetLastGuildMasterActivityRequest $request
    ): GetLastGuildMasterActivityResult {
        return $this->getLastGuildMasterActivityAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLastGuildMasterActivityByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function getLastGuildMasterActivityByGuildNameAsync(
            GetLastGuildMasterActivityByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLastGuildMasterActivityByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLastGuildMasterActivityByGuildNameRequest $request
     * @return GetLastGuildMasterActivityByGuildNameResult
     */
    public function getLastGuildMasterActivityByGuildName (
            GetLastGuildMasterActivityByGuildNameRequest $request
    ): GetLastGuildMasterActivityByGuildNameResult {
        return $this->getLastGuildMasterActivityByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param PromoteSeniorMemberRequest $request
     * @return PromiseInterface
     */
    public function promoteSeniorMemberAsync(
            PromoteSeniorMemberRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PromoteSeniorMemberTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PromoteSeniorMemberRequest $request
     * @return PromoteSeniorMemberResult
     */
    public function promoteSeniorMember (
            PromoteSeniorMemberRequest $request
    ): PromoteSeniorMemberResult {
        return $this->promoteSeniorMemberAsync(
            $request
        )->wait();
    }

    /**
     * @param PromoteSeniorMemberByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function promoteSeniorMemberByGuildNameAsync(
            PromoteSeniorMemberByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PromoteSeniorMemberByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PromoteSeniorMemberByGuildNameRequest $request
     * @return PromoteSeniorMemberByGuildNameResult
     */
    public function promoteSeniorMemberByGuildName (
            PromoteSeniorMemberByGuildNameRequest $request
    ): PromoteSeniorMemberByGuildNameResult {
        return $this->promoteSeniorMemberByGuildNameAsync(
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
     * @param GetCurrentGuildMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentGuildMasterAsync(
            GetCurrentGuildMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentGuildMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentGuildMasterRequest $request
     * @return GetCurrentGuildMasterResult
     */
    public function getCurrentGuildMaster (
            GetCurrentGuildMasterRequest $request
    ): GetCurrentGuildMasterResult {
        return $this->getCurrentGuildMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentGuildMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentGuildMasterAsync(
            PreUpdateCurrentGuildMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentGuildMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentGuildMasterRequest $request
     * @return PreUpdateCurrentGuildMasterResult
     */
    public function preUpdateCurrentGuildMaster (
            PreUpdateCurrentGuildMasterRequest $request
    ): PreUpdateCurrentGuildMasterResult {
        return $this->preUpdateCurrentGuildMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentGuildMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentGuildMasterAsync(
            UpdateCurrentGuildMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentGuildMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentGuildMasterRequest $request
     * @return UpdateCurrentGuildMasterResult
     */
    public function updateCurrentGuildMaster (
            UpdateCurrentGuildMasterRequest $request
    ): UpdateCurrentGuildMasterResult {
        return $this->updateCurrentGuildMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentGuildMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentGuildMasterFromGitHubAsync(
            UpdateCurrentGuildMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentGuildMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentGuildMasterFromGitHubRequest $request
     * @return UpdateCurrentGuildMasterFromGitHubResult
     */
    public function updateCurrentGuildMasterFromGitHub (
            UpdateCurrentGuildMasterFromGitHubRequest $request
    ): UpdateCurrentGuildMasterFromGitHubResult {
        return $this->updateCurrentGuildMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReceiveRequestsRequest $request
     * @return PromiseInterface
     */
    public function describeReceiveRequestsAsync(
            DescribeReceiveRequestsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiveRequestsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReceiveRequestsRequest $request
     * @return DescribeReceiveRequestsResult
     */
    public function describeReceiveRequests (
            DescribeReceiveRequestsRequest $request
    ): DescribeReceiveRequestsResult {
        return $this->describeReceiveRequestsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReceiveRequestsByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function describeReceiveRequestsByGuildNameAsync(
            DescribeReceiveRequestsByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiveRequestsByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReceiveRequestsByGuildNameRequest $request
     * @return DescribeReceiveRequestsByGuildNameResult
     */
    public function describeReceiveRequestsByGuildName (
            DescribeReceiveRequestsByGuildNameRequest $request
    ): DescribeReceiveRequestsByGuildNameResult {
        return $this->describeReceiveRequestsByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReceiveRequestRequest $request
     * @return PromiseInterface
     */
    public function getReceiveRequestAsync(
            GetReceiveRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceiveRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReceiveRequestRequest $request
     * @return GetReceiveRequestResult
     */
    public function getReceiveRequest (
            GetReceiveRequestRequest $request
    ): GetReceiveRequestResult {
        return $this->getReceiveRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReceiveRequestByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function getReceiveRequestByGuildNameAsync(
            GetReceiveRequestByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceiveRequestByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReceiveRequestByGuildNameRequest $request
     * @return GetReceiveRequestByGuildNameResult
     */
    public function getReceiveRequestByGuildName (
            GetReceiveRequestByGuildNameRequest $request
    ): GetReceiveRequestByGuildNameResult {
        return $this->getReceiveRequestByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param AcceptRequestRequest $request
     * @return PromiseInterface
     */
    public function acceptRequestAsync(
            AcceptRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcceptRequestRequest $request
     * @return AcceptRequestResult
     */
    public function acceptRequest (
            AcceptRequestRequest $request
    ): AcceptRequestResult {
        return $this->acceptRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param AcceptRequestByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function acceptRequestByGuildNameAsync(
            AcceptRequestByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptRequestByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcceptRequestByGuildNameRequest $request
     * @return AcceptRequestByGuildNameResult
     */
    public function acceptRequestByGuildName (
            AcceptRequestByGuildNameRequest $request
    ): AcceptRequestByGuildNameResult {
        return $this->acceptRequestByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param RejectRequestRequest $request
     * @return PromiseInterface
     */
    public function rejectRequestAsync(
            RejectRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RejectRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RejectRequestRequest $request
     * @return RejectRequestResult
     */
    public function rejectRequest (
            RejectRequestRequest $request
    ): RejectRequestResult {
        return $this->rejectRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param RejectRequestByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function rejectRequestByGuildNameAsync(
            RejectRequestByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RejectRequestByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RejectRequestByGuildNameRequest $request
     * @return RejectRequestByGuildNameResult
     */
    public function rejectRequestByGuildName (
            RejectRequestByGuildNameRequest $request
    ): RejectRequestByGuildNameResult {
        return $this->rejectRequestByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSendRequestsRequest $request
     * @return PromiseInterface
     */
    public function describeSendRequestsAsync(
            DescribeSendRequestsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSendRequestsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSendRequestsRequest $request
     * @return DescribeSendRequestsResult
     */
    public function describeSendRequests (
            DescribeSendRequestsRequest $request
    ): DescribeSendRequestsResult {
        return $this->describeSendRequestsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSendRequestsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeSendRequestsByUserIdAsync(
            DescribeSendRequestsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSendRequestsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSendRequestsByUserIdRequest $request
     * @return DescribeSendRequestsByUserIdResult
     */
    public function describeSendRequestsByUserId (
            DescribeSendRequestsByUserIdRequest $request
    ): DescribeSendRequestsByUserIdResult {
        return $this->describeSendRequestsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSendRequestRequest $request
     * @return PromiseInterface
     */
    public function getSendRequestAsync(
            GetSendRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSendRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSendRequestRequest $request
     * @return GetSendRequestResult
     */
    public function getSendRequest (
            GetSendRequestRequest $request
    ): GetSendRequestResult {
        return $this->getSendRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSendRequestByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getSendRequestByUserIdAsync(
            GetSendRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSendRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSendRequestByUserIdRequest $request
     * @return GetSendRequestByUserIdResult
     */
    public function getSendRequestByUserId (
            GetSendRequestByUserIdRequest $request
    ): GetSendRequestByUserIdResult {
        return $this->getSendRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SendRequestRequest $request
     * @return PromiseInterface
     */
    public function sendRequestAsync(
            SendRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendRequestRequest $request
     * @return SendRequestResult
     */
    public function sendRequest (
            SendRequestRequest $request
    ): SendRequestResult {
        return $this->sendRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param SendRequestByUserIdRequest $request
     * @return PromiseInterface
     */
    public function sendRequestByUserIdAsync(
            SendRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendRequestByUserIdRequest $request
     * @return SendRequestByUserIdResult
     */
    public function sendRequestByUserId (
            SendRequestByUserIdRequest $request
    ): SendRequestByUserIdResult {
        return $this->sendRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRequestRequest $request
     * @return PromiseInterface
     */
    public function deleteRequestAsync(
            DeleteRequestRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRequestTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRequestRequest $request
     * @return DeleteRequestResult
     */
    public function deleteRequest (
            DeleteRequestRequest $request
    ): DeleteRequestResult {
        return $this->deleteRequestAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRequestByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteRequestByUserIdAsync(
            DeleteRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRequestByUserIdRequest $request
     * @return DeleteRequestByUserIdResult
     */
    public function deleteRequestByUserId (
            DeleteRequestByUserIdRequest $request
    ): DeleteRequestByUserIdResult {
        return $this->deleteRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeIgnoreUsersRequest $request
     * @return PromiseInterface
     */
    public function describeIgnoreUsersAsync(
            DescribeIgnoreUsersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeIgnoreUsersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeIgnoreUsersRequest $request
     * @return DescribeIgnoreUsersResult
     */
    public function describeIgnoreUsers (
            DescribeIgnoreUsersRequest $request
    ): DescribeIgnoreUsersResult {
        return $this->describeIgnoreUsersAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeIgnoreUsersByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function describeIgnoreUsersByGuildNameAsync(
            DescribeIgnoreUsersByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeIgnoreUsersByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeIgnoreUsersByGuildNameRequest $request
     * @return DescribeIgnoreUsersByGuildNameResult
     */
    public function describeIgnoreUsersByGuildName (
            DescribeIgnoreUsersByGuildNameRequest $request
    ): DescribeIgnoreUsersByGuildNameResult {
        return $this->describeIgnoreUsersByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param GetIgnoreUserRequest $request
     * @return PromiseInterface
     */
    public function getIgnoreUserAsync(
            GetIgnoreUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetIgnoreUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetIgnoreUserRequest $request
     * @return GetIgnoreUserResult
     */
    public function getIgnoreUser (
            GetIgnoreUserRequest $request
    ): GetIgnoreUserResult {
        return $this->getIgnoreUserAsync(
            $request
        )->wait();
    }

    /**
     * @param GetIgnoreUserByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function getIgnoreUserByGuildNameAsync(
            GetIgnoreUserByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetIgnoreUserByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetIgnoreUserByGuildNameRequest $request
     * @return GetIgnoreUserByGuildNameResult
     */
    public function getIgnoreUserByGuildName (
            GetIgnoreUserByGuildNameRequest $request
    ): GetIgnoreUserByGuildNameResult {
        return $this->getIgnoreUserByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param AddIgnoreUserRequest $request
     * @return PromiseInterface
     */
    public function addIgnoreUserAsync(
            AddIgnoreUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddIgnoreUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddIgnoreUserRequest $request
     * @return AddIgnoreUserResult
     */
    public function addIgnoreUser (
            AddIgnoreUserRequest $request
    ): AddIgnoreUserResult {
        return $this->addIgnoreUserAsync(
            $request
        )->wait();
    }

    /**
     * @param AddIgnoreUserByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function addIgnoreUserByGuildNameAsync(
            AddIgnoreUserByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddIgnoreUserByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddIgnoreUserByGuildNameRequest $request
     * @return AddIgnoreUserByGuildNameResult
     */
    public function addIgnoreUserByGuildName (
            AddIgnoreUserByGuildNameRequest $request
    ): AddIgnoreUserByGuildNameResult {
        return $this->addIgnoreUserByGuildNameAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteIgnoreUserRequest $request
     * @return PromiseInterface
     */
    public function deleteIgnoreUserAsync(
            DeleteIgnoreUserRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteIgnoreUserTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteIgnoreUserRequest $request
     * @return DeleteIgnoreUserResult
     */
    public function deleteIgnoreUser (
            DeleteIgnoreUserRequest $request
    ): DeleteIgnoreUserResult {
        return $this->deleteIgnoreUserAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteIgnoreUserByGuildNameRequest $request
     * @return PromiseInterface
     */
    public function deleteIgnoreUserByGuildNameAsync(
            DeleteIgnoreUserByGuildNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteIgnoreUserByGuildNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteIgnoreUserByGuildNameRequest $request
     * @return DeleteIgnoreUserByGuildNameResult
     */
    public function deleteIgnoreUserByGuildName (
            DeleteIgnoreUserByGuildNameRequest $request
    ): DeleteIgnoreUserByGuildNameResult {
        return $this->deleteIgnoreUserByGuildNameAsync(
            $request
        )->wait();
    }
}