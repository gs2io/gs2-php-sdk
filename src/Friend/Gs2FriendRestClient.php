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

namespace Gs2\Friend;

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


use Gs2\Friend\Request\DescribeNamespacesRequest;
use Gs2\Friend\Result\DescribeNamespacesResult;
use Gs2\Friend\Request\CreateNamespaceRequest;
use Gs2\Friend\Result\CreateNamespaceResult;
use Gs2\Friend\Request\GetNamespaceStatusRequest;
use Gs2\Friend\Result\GetNamespaceStatusResult;
use Gs2\Friend\Request\GetNamespaceRequest;
use Gs2\Friend\Result\GetNamespaceResult;
use Gs2\Friend\Request\UpdateNamespaceRequest;
use Gs2\Friend\Result\UpdateNamespaceResult;
use Gs2\Friend\Request\DeleteNamespaceRequest;
use Gs2\Friend\Result\DeleteNamespaceResult;
use Gs2\Friend\Request\GetServiceVersionRequest;
use Gs2\Friend\Result\GetServiceVersionResult;
use Gs2\Friend\Request\DumpUserDataByUserIdRequest;
use Gs2\Friend\Result\DumpUserDataByUserIdResult;
use Gs2\Friend\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Friend\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Friend\Request\CleanUserDataByUserIdRequest;
use Gs2\Friend\Result\CleanUserDataByUserIdResult;
use Gs2\Friend\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Friend\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Friend\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Friend\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Friend\Request\ImportUserDataByUserIdRequest;
use Gs2\Friend\Result\ImportUserDataByUserIdResult;
use Gs2\Friend\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Friend\Result\CheckImportUserDataByUserIdResult;
use Gs2\Friend\Request\GetProfileRequest;
use Gs2\Friend\Result\GetProfileResult;
use Gs2\Friend\Request\GetProfileByUserIdRequest;
use Gs2\Friend\Result\GetProfileByUserIdResult;
use Gs2\Friend\Request\UpdateProfileRequest;
use Gs2\Friend\Result\UpdateProfileResult;
use Gs2\Friend\Request\UpdateProfileByUserIdRequest;
use Gs2\Friend\Result\UpdateProfileByUserIdResult;
use Gs2\Friend\Request\DeleteProfileByUserIdRequest;
use Gs2\Friend\Result\DeleteProfileByUserIdResult;
use Gs2\Friend\Request\UpdateProfileByStampSheetRequest;
use Gs2\Friend\Result\UpdateProfileByStampSheetResult;
use Gs2\Friend\Request\DescribeFriendsRequest;
use Gs2\Friend\Result\DescribeFriendsResult;
use Gs2\Friend\Request\DescribeFriendsByUserIdRequest;
use Gs2\Friend\Result\DescribeFriendsByUserIdResult;
use Gs2\Friend\Request\DescribeBlackListRequest;
use Gs2\Friend\Result\DescribeBlackListResult;
use Gs2\Friend\Request\DescribeBlackListByUserIdRequest;
use Gs2\Friend\Result\DescribeBlackListByUserIdResult;
use Gs2\Friend\Request\RegisterBlackListRequest;
use Gs2\Friend\Result\RegisterBlackListResult;
use Gs2\Friend\Request\RegisterBlackListByUserIdRequest;
use Gs2\Friend\Result\RegisterBlackListByUserIdResult;
use Gs2\Friend\Request\UnregisterBlackListRequest;
use Gs2\Friend\Result\UnregisterBlackListResult;
use Gs2\Friend\Request\UnregisterBlackListByUserIdRequest;
use Gs2\Friend\Result\UnregisterBlackListByUserIdResult;
use Gs2\Friend\Request\DescribeFollowsRequest;
use Gs2\Friend\Result\DescribeFollowsResult;
use Gs2\Friend\Request\DescribeFollowsByUserIdRequest;
use Gs2\Friend\Result\DescribeFollowsByUserIdResult;
use Gs2\Friend\Request\GetFollowRequest;
use Gs2\Friend\Result\GetFollowResult;
use Gs2\Friend\Request\GetFollowByUserIdRequest;
use Gs2\Friend\Result\GetFollowByUserIdResult;
use Gs2\Friend\Request\FollowRequest;
use Gs2\Friend\Result\FollowResult;
use Gs2\Friend\Request\FollowByUserIdRequest;
use Gs2\Friend\Result\FollowByUserIdResult;
use Gs2\Friend\Request\UnfollowRequest;
use Gs2\Friend\Result\UnfollowResult;
use Gs2\Friend\Request\UnfollowByUserIdRequest;
use Gs2\Friend\Result\UnfollowByUserIdResult;
use Gs2\Friend\Request\GetFriendRequest;
use Gs2\Friend\Result\GetFriendResult;
use Gs2\Friend\Request\GetFriendByUserIdRequest;
use Gs2\Friend\Result\GetFriendByUserIdResult;
use Gs2\Friend\Request\AddFriendRequest;
use Gs2\Friend\Result\AddFriendResult;
use Gs2\Friend\Request\AddFriendByUserIdRequest;
use Gs2\Friend\Result\AddFriendByUserIdResult;
use Gs2\Friend\Request\DeleteFriendRequest;
use Gs2\Friend\Result\DeleteFriendResult;
use Gs2\Friend\Request\DeleteFriendByUserIdRequest;
use Gs2\Friend\Result\DeleteFriendByUserIdResult;
use Gs2\Friend\Request\DescribeSendRequestsRequest;
use Gs2\Friend\Result\DescribeSendRequestsResult;
use Gs2\Friend\Request\DescribeSendRequestsByUserIdRequest;
use Gs2\Friend\Result\DescribeSendRequestsByUserIdResult;
use Gs2\Friend\Request\GetSendRequestRequest;
use Gs2\Friend\Result\GetSendRequestResult;
use Gs2\Friend\Request\GetSendRequestByUserIdRequest;
use Gs2\Friend\Result\GetSendRequestByUserIdResult;
use Gs2\Friend\Request\SendRequestRequest;
use Gs2\Friend\Result\SendRequestResult;
use Gs2\Friend\Request\SendRequestByUserIdRequest;
use Gs2\Friend\Result\SendRequestByUserIdResult;
use Gs2\Friend\Request\DeleteRequestRequest;
use Gs2\Friend\Result\DeleteRequestResult;
use Gs2\Friend\Request\DeleteRequestByUserIdRequest;
use Gs2\Friend\Result\DeleteRequestByUserIdResult;
use Gs2\Friend\Request\DescribeReceiveRequestsRequest;
use Gs2\Friend\Result\DescribeReceiveRequestsResult;
use Gs2\Friend\Request\DescribeReceiveRequestsByUserIdRequest;
use Gs2\Friend\Result\DescribeReceiveRequestsByUserIdResult;
use Gs2\Friend\Request\GetReceiveRequestRequest;
use Gs2\Friend\Result\GetReceiveRequestResult;
use Gs2\Friend\Request\GetReceiveRequestByUserIdRequest;
use Gs2\Friend\Result\GetReceiveRequestByUserIdResult;
use Gs2\Friend\Request\AcceptRequestRequest;
use Gs2\Friend\Result\AcceptRequestResult;
use Gs2\Friend\Request\AcceptRequestByUserIdRequest;
use Gs2\Friend\Result\AcceptRequestByUserIdResult;
use Gs2\Friend\Request\RejectRequestRequest;
use Gs2\Friend\Result\RejectRequestResult;
use Gs2\Friend\Request\RejectRequestByUserIdRequest;
use Gs2\Friend\Result\RejectRequestByUserIdResult;
use Gs2\Friend\Request\GetPublicProfileRequest;
use Gs2\Friend\Result\GetPublicProfileResult;

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getFollowScript() !== null) {
            $json["followScript"] = $this->request->getFollowScript()->toJson();
        }
        if ($this->request->getUnfollowScript() !== null) {
            $json["unfollowScript"] = $this->request->getUnfollowScript()->toJson();
        }
        if ($this->request->getSendRequestScript() !== null) {
            $json["sendRequestScript"] = $this->request->getSendRequestScript()->toJson();
        }
        if ($this->request->getCancelRequestScript() !== null) {
            $json["cancelRequestScript"] = $this->request->getCancelRequestScript()->toJson();
        }
        if ($this->request->getAcceptRequestScript() !== null) {
            $json["acceptRequestScript"] = $this->request->getAcceptRequestScript()->toJson();
        }
        if ($this->request->getRejectRequestScript() !== null) {
            $json["rejectRequestScript"] = $this->request->getRejectRequestScript()->toJson();
        }
        if ($this->request->getDeleteFriendScript() !== null) {
            $json["deleteFriendScript"] = $this->request->getDeleteFriendScript()->toJson();
        }
        if ($this->request->getUpdateProfileScript() !== null) {
            $json["updateProfileScript"] = $this->request->getUpdateProfileScript()->toJson();
        }
        if ($this->request->getFollowNotification() !== null) {
            $json["followNotification"] = $this->request->getFollowNotification()->toJson();
        }
        if ($this->request->getReceiveRequestNotification() !== null) {
            $json["receiveRequestNotification"] = $this->request->getReceiveRequestNotification()->toJson();
        }
        if ($this->request->getCancelRequestNotification() !== null) {
            $json["cancelRequestNotification"] = $this->request->getCancelRequestNotification()->toJson();
        }
        if ($this->request->getAcceptRequestNotification() !== null) {
            $json["acceptRequestNotification"] = $this->request->getAcceptRequestNotification()->toJson();
        }
        if ($this->request->getRejectRequestNotification() !== null) {
            $json["rejectRequestNotification"] = $this->request->getRejectRequestNotification()->toJson();
        }
        if ($this->request->getDeleteFriendNotification() !== null) {
            $json["deleteFriendNotification"] = $this->request->getDeleteFriendNotification()->toJson();
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getFollowScript() !== null) {
            $json["followScript"] = $this->request->getFollowScript()->toJson();
        }
        if ($this->request->getUnfollowScript() !== null) {
            $json["unfollowScript"] = $this->request->getUnfollowScript()->toJson();
        }
        if ($this->request->getSendRequestScript() !== null) {
            $json["sendRequestScript"] = $this->request->getSendRequestScript()->toJson();
        }
        if ($this->request->getCancelRequestScript() !== null) {
            $json["cancelRequestScript"] = $this->request->getCancelRequestScript()->toJson();
        }
        if ($this->request->getAcceptRequestScript() !== null) {
            $json["acceptRequestScript"] = $this->request->getAcceptRequestScript()->toJson();
        }
        if ($this->request->getRejectRequestScript() !== null) {
            $json["rejectRequestScript"] = $this->request->getRejectRequestScript()->toJson();
        }
        if ($this->request->getDeleteFriendScript() !== null) {
            $json["deleteFriendScript"] = $this->request->getDeleteFriendScript()->toJson();
        }
        if ($this->request->getUpdateProfileScript() !== null) {
            $json["updateProfileScript"] = $this->request->getUpdateProfileScript()->toJson();
        }
        if ($this->request->getFollowNotification() !== null) {
            $json["followNotification"] = $this->request->getFollowNotification()->toJson();
        }
        if ($this->request->getReceiveRequestNotification() !== null) {
            $json["receiveRequestNotification"] = $this->request->getReceiveRequestNotification()->toJson();
        }
        if ($this->request->getCancelRequestNotification() !== null) {
            $json["cancelRequestNotification"] = $this->request->getCancelRequestNotification()->toJson();
        }
        if ($this->request->getAcceptRequestNotification() !== null) {
            $json["acceptRequestNotification"] = $this->request->getAcceptRequestNotification()->toJson();
        }
        if ($this->request->getRejectRequestNotification() !== null) {
            $json["rejectRequestNotification"] = $this->request->getRejectRequestNotification()->toJson();
        }
        if ($this->request->getDeleteFriendNotification() !== null) {
            $json["deleteFriendNotification"] = $this->request->getDeleteFriendNotification()->toJson();
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class GetProfileTask extends Gs2RestSessionTask {

    /**
     * @var GetProfileRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProfileTask constructor.
     * @param Gs2RestSession $session
     * @param GetProfileRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProfileRequest $request
    ) {
        parent::__construct(
            $session,
            GetProfileResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/profile";

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

class GetProfileByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetProfileByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProfileByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetProfileByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProfileByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetProfileByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/profile";

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

class UpdateProfileTask extends Gs2RestSessionTask {

    /**
     * @var UpdateProfileRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateProfileTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateProfileRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateProfileRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateProfileResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/profile";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPublicProfile() !== null) {
            $json["publicProfile"] = $this->request->getPublicProfile();
        }
        if ($this->request->getFollowerProfile() !== null) {
            $json["followerProfile"] = $this->request->getFollowerProfile();
        }
        if ($this->request->getFriendProfile() !== null) {
            $json["friendProfile"] = $this->request->getFriendProfile();
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

class UpdateProfileByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateProfileByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateProfileByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateProfileByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateProfileByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateProfileByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/profile";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getPublicProfile() !== null) {
            $json["publicProfile"] = $this->request->getPublicProfile();
        }
        if ($this->request->getFollowerProfile() !== null) {
            $json["followerProfile"] = $this->request->getFollowerProfile();
        }
        if ($this->request->getFriendProfile() !== null) {
            $json["friendProfile"] = $this->request->getFriendProfile();
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

class DeleteProfileByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProfileByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProfileByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProfileByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProfileByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProfileByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/profile";

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

class UpdateProfileByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var UpdateProfileByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateProfileByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateProfileByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateProfileByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateProfileByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/profile/update";

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

class DescribeFriendsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFriendsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFriendsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFriendsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFriendsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFriendsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/friend";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class DescribeFriendsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFriendsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFriendsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFriendsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFriendsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFriendsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/friend";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class DescribeBlackListTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBlackListRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBlackListTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBlackListRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBlackListRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBlackListResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/blackList";

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

class DescribeBlackListByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBlackListByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBlackListByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBlackListByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBlackListByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBlackListByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/blackList";

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

class RegisterBlackListTask extends Gs2RestSessionTask {

    /**
     * @var RegisterBlackListRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RegisterBlackListTask constructor.
     * @param Gs2RestSession $session
     * @param RegisterBlackListRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RegisterBlackListRequest $request
    ) {
        parent::__construct(
            $session,
            RegisterBlackListResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/blackList/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class RegisterBlackListByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RegisterBlackListByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RegisterBlackListByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RegisterBlackListByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RegisterBlackListByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RegisterBlackListByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/blackList/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

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

class UnregisterBlackListTask extends Gs2RestSessionTask {

    /**
     * @var UnregisterBlackListRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnregisterBlackListTask constructor.
     * @param Gs2RestSession $session
     * @param UnregisterBlackListRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnregisterBlackListRequest $request
    ) {
        parent::__construct(
            $session,
            UnregisterBlackListResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/blackList/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class UnregisterBlackListByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnregisterBlackListByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnregisterBlackListByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnregisterBlackListByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnregisterBlackListByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnregisterBlackListByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/blackList/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeFollowsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFollowsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFollowsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFollowsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFollowsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFollowsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/follow";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class DescribeFollowsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFollowsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFollowsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFollowsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFollowsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFollowsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/follow";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class GetFollowTask extends Gs2RestSessionTask {

    /**
     * @var GetFollowRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFollowTask constructor.
     * @param Gs2RestSession $session
     * @param GetFollowRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFollowRequest $request
    ) {
        parent::__construct(
            $session,
            GetFollowResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class GetFollowByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFollowByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFollowByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFollowByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFollowByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFollowByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class FollowTask extends Gs2RestSessionTask {

    /**
     * @var FollowRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FollowTask constructor.
     * @param Gs2RestSession $session
     * @param FollowRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FollowRequest $request
    ) {
        parent::__construct(
            $session,
            FollowResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class FollowByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var FollowByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FollowByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param FollowByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FollowByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            FollowByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class UnfollowTask extends Gs2RestSessionTask {

    /**
     * @var UnfollowRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnfollowTask constructor.
     * @param Gs2RestSession $session
     * @param UnfollowRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnfollowRequest $request
    ) {
        parent::__construct(
            $session,
            UnfollowResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class UnfollowByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnfollowByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnfollowByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnfollowByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnfollowByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnfollowByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/follow/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetFriendTask extends Gs2RestSessionTask {

    /**
     * @var GetFriendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFriendTask constructor.
     * @param Gs2RestSession $session
     * @param GetFriendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFriendRequest $request
    ) {
        parent::__construct(
            $session,
            GetFriendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class GetFriendByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFriendByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFriendByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFriendByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFriendByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFriendByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class AddFriendTask extends Gs2RestSessionTask {

    /**
     * @var AddFriendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddFriendTask constructor.
     * @param Gs2RestSession $session
     * @param AddFriendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddFriendRequest $request
    ) {
        parent::__construct(
            $session,
            AddFriendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AddFriendByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddFriendByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddFriendByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddFriendByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddFriendByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddFriendByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteFriendTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFriendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFriendTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFriendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFriendRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFriendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class DeleteFriendByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFriendByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFriendByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFriendByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFriendByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFriendByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/friend/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{targetUserId}", $this->request->getTargetUserId() === null|| strlen($this->request->getTargetUserId()) == 0 ? "null" : $this->request->getTargetUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/sendBox/{targetUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inbox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class DescribeReceiveRequestsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiveRequestsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiveRequestsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiveRequestsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiveRequestsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiveRequestsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inbox";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

class GetReceiveRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetReceiveRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceiveRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceiveRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceiveRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceiveRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{fromUserId}", $this->request->getFromUserId() === null|| strlen($this->request->getFromUserId()) == 0 ? "null" : $this->request->getFromUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getWithProfile() !== null) {
            $queryStrings["withProfile"] = $this->request->getWithProfile() ? "true" : "false";
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class AcceptRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcceptRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class RejectRequestByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RejectRequestByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RejectRequestByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RejectRequestByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RejectRequestByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RejectRequestByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inbox/{fromUserId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetPublicProfileTask extends Gs2RestSessionTask {

    /**
     * @var GetPublicProfileRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPublicProfileTask constructor.
     * @param Gs2RestSession $session
     * @param GetPublicProfileRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPublicProfileRequest $request
    ) {
        parent::__construct(
            $session,
            GetPublicProfileResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "friend", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/profile/public";

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

/**
 * GS2-Friend API client
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/
 */
class Gs2FriendRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describenamespaces
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
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return DescribeNamespacesResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describenamespaces
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {
        return $this->describeNamespacesAsync(
            $request
        )->wait();
    }

    /**
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#createnamespace
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
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return CreateNamespaceResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#createnamespace
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getnamespacestatus
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
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return GetNamespaceStatusResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getnamespacestatus
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getnamespace
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
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return GetNamespaceResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getnamespace
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {
        return $this->getNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updatenamespace
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
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return UpdateNamespaceResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updatenamespace
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {
        return $this->updateNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletenamespace
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
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return DeleteNamespaceResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletenamespace
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getserviceversion
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
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getserviceversion
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#dumpuserdatabyuserid
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
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#dumpuserdatabyuserid
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkdumpuserdatabyuserid
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
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkdumpuserdatabyuserid
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#cleanuserdatabyuserid
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
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkcleanuserdatabyuserid
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
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkcleanuserdatabyuserid
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#prepareimportuserdatabyuserid
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
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#prepareimportuserdatabyuserid
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#importuserdatabyuserid
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
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#importuserdatabyuserid
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkimportuserdatabyuserid
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
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get profile
     *
     * @param GetProfileRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getprofile
     */
    public function getProfileAsync(
            GetProfileRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProfileTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get profile
     *
     * @param GetProfileRequest $request
     * @return GetProfileResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getprofile
     */
    public function getProfile (
            GetProfileRequest $request
    ): GetProfileResult {
        return $this->getProfileAsync(
            $request
        )->wait();
    }

    /**
     * Get profile by User ID
     *
     * @param GetProfileByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getprofilebyuserid
     */
    public function getProfileByUserIdAsync(
            GetProfileByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProfileByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get profile by User ID
     *
     * @param GetProfileByUserIdRequest $request
     * @return GetProfileByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getprofilebyuserid
     */
    public function getProfileByUserId (
            GetProfileByUserIdRequest $request
    ): GetProfileByUserIdResult {
        return $this->getProfileByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update profile
     *
     * @param UpdateProfileRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofile
     */
    public function updateProfileAsync(
            UpdateProfileRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateProfileTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update profile
     *
     * @param UpdateProfileRequest $request
     * @return UpdateProfileResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofile
     */
    public function updateProfile (
            UpdateProfileRequest $request
    ): UpdateProfileResult {
        return $this->updateProfileAsync(
            $request
        )->wait();
    }

    /**
     * Update profile by User ID
     *
     * @param UpdateProfileByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofilebyuserid
     */
    public function updateProfileByUserIdAsync(
            UpdateProfileByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateProfileByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update profile by User ID
     *
     * @param UpdateProfileByUserIdRequest $request
     * @return UpdateProfileByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofilebyuserid
     */
    public function updateProfileByUserId (
            UpdateProfileByUserIdRequest $request
    ): UpdateProfileByUserIdResult {
        return $this->updateProfileByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete profile
     *
     * @param DeleteProfileByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleteprofilebyuserid
     */
    public function deleteProfileByUserIdAsync(
            DeleteProfileByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProfileByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete profile
     *
     * @param DeleteProfileByUserIdRequest $request
     * @return DeleteProfileByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleteprofilebyuserid
     */
    public function deleteProfileByUserId (
            DeleteProfileByUserIdRequest $request
    ): DeleteProfileByUserIdResult {
        return $this->deleteProfileByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update profile via transaction
     *
     * @param UpdateProfileByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/stamp_sheet/#gs2friendupdateprofilebyuserid
     */
    public function updateProfileByStampSheetAsync(
            UpdateProfileByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateProfileByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update profile via transaction
     *
     * @param UpdateProfileByStampSheetRequest $request
     * @return UpdateProfileByStampSheetResult
     * @see https://docs.gs2.io/api_reference/friend/stamp_sheet/#gs2friendupdateprofilebyuserid
     */
    public function updateProfileByStampSheet (
            UpdateProfileByStampSheetRequest $request
    ): UpdateProfileByStampSheetResult {
        return $this->updateProfileByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * List Friends
     *
     * @param DescribeFriendsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefriends
     */
    public function describeFriendsAsync(
            DescribeFriendsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFriendsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Friends
     *
     * @param DescribeFriendsRequest $request
     * @return DescribeFriendsResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefriends
     */
    public function describeFriends (
            DescribeFriendsRequest $request
    ): DescribeFriendsResult {
        return $this->describeFriendsAsync(
            $request
        )->wait();
    }

    /**
     * List Friends by User ID
     *
     * @param DescribeFriendsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefriendsbyuserid
     */
    public function describeFriendsByUserIdAsync(
            DescribeFriendsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFriendsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Friends by User ID
     *
     * @param DescribeFriendsByUserIdRequest $request
     * @return DescribeFriendsByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefriendsbyuserid
     */
    public function describeFriendsByUserId (
            DescribeFriendsByUserIdRequest $request
    ): DescribeFriendsByUserIdResult {
        return $this->describeFriendsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get blacklist
     *
     * @param DescribeBlackListRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describeblacklist
     */
    public function describeBlackListAsync(
            DescribeBlackListRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBlackListTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get blacklist
     *
     * @param DescribeBlackListRequest $request
     * @return DescribeBlackListResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describeblacklist
     */
    public function describeBlackList (
            DescribeBlackListRequest $request
    ): DescribeBlackListResult {
        return $this->describeBlackListAsync(
            $request
        )->wait();
    }

    /**
     * Get Blacklist by User ID
     *
     * @param DescribeBlackListByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describeblacklistbyuserid
     */
    public function describeBlackListByUserIdAsync(
            DescribeBlackListByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBlackListByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Blacklist by User ID
     *
     * @param DescribeBlackListByUserIdRequest $request
     * @return DescribeBlackListByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describeblacklistbyuserid
     */
    public function describeBlackListByUserId (
            DescribeBlackListByUserIdRequest $request
    ): DescribeBlackListByUserIdResult {
        return $this->describeBlackListByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Add to blacklist
     *
     * @param RegisterBlackListRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#registerblacklist
     */
    public function registerBlackListAsync(
            RegisterBlackListRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RegisterBlackListTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add to blacklist
     *
     * @param RegisterBlackListRequest $request
     * @return RegisterBlackListResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#registerblacklist
     */
    public function registerBlackList (
            RegisterBlackListRequest $request
    ): RegisterBlackListResult {
        return $this->registerBlackListAsync(
            $request
        )->wait();
    }

    /**
     * Add to blacklist by User ID
     *
     * @param RegisterBlackListByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#registerblacklistbyuserid
     */
    public function registerBlackListByUserIdAsync(
            RegisterBlackListByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RegisterBlackListByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add to blacklist by User ID
     *
     * @param RegisterBlackListByUserIdRequest $request
     * @return RegisterBlackListByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#registerblacklistbyuserid
     */
    public function registerBlackListByUserId (
            RegisterBlackListByUserIdRequest $request
    ): RegisterBlackListByUserIdResult {
        return $this->registerBlackListByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Remove a user from blacklist
     *
     * @param UnregisterBlackListRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unregisterblacklist
     */
    public function unregisterBlackListAsync(
            UnregisterBlackListRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnregisterBlackListTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Remove a user from blacklist
     *
     * @param UnregisterBlackListRequest $request
     * @return UnregisterBlackListResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unregisterblacklist
     */
    public function unregisterBlackList (
            UnregisterBlackListRequest $request
    ): UnregisterBlackListResult {
        return $this->unregisterBlackListAsync(
            $request
        )->wait();
    }

    /**
     * Remove a user from the blacklist by User ID
     *
     * @param UnregisterBlackListByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unregisterblacklistbyuserid
     */
    public function unregisterBlackListByUserIdAsync(
            UnregisterBlackListByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnregisterBlackListByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Remove a user from the blacklist by User ID
     *
     * @param UnregisterBlackListByUserIdRequest $request
     * @return UnregisterBlackListByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unregisterblacklistbyuserid
     */
    public function unregisterBlackListByUserId (
            UnregisterBlackListByUserIdRequest $request
    ): UnregisterBlackListByUserIdResult {
        return $this->unregisterBlackListByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List followed users
     *
     * @param DescribeFollowsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefollows
     */
    public function describeFollowsAsync(
            DescribeFollowsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFollowsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List followed users
     *
     * @param DescribeFollowsRequest $request
     * @return DescribeFollowsResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefollows
     */
    public function describeFollows (
            DescribeFollowsRequest $request
    ): DescribeFollowsResult {
        return $this->describeFollowsAsync(
            $request
        )->wait();
    }

    /**
     * List followed users by User ID
     *
     * @param DescribeFollowsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefollowsbyuserid
     */
    public function describeFollowsByUserIdAsync(
            DescribeFollowsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFollowsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List followed users by User ID
     *
     * @param DescribeFollowsByUserIdRequest $request
     * @return DescribeFollowsByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describefollowsbyuserid
     */
    public function describeFollowsByUserId (
            DescribeFollowsByUserIdRequest $request
    ): DescribeFollowsByUserIdResult {
        return $this->describeFollowsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a followed user
     *
     * @param GetFollowRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfollow
     */
    public function getFollowAsync(
            GetFollowRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFollowTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a followed user
     *
     * @param GetFollowRequest $request
     * @return GetFollowResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfollow
     */
    public function getFollow (
            GetFollowRequest $request
    ): GetFollowResult {
        return $this->getFollowAsync(
            $request
        )->wait();
    }

    /**
     * Get a followed user by User ID
     *
     * @param GetFollowByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfollowbyuserid
     */
    public function getFollowByUserIdAsync(
            GetFollowByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFollowByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a followed user by User ID
     *
     * @param GetFollowByUserIdRequest $request
     * @return GetFollowByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfollowbyuserid
     */
    public function getFollowByUserId (
            GetFollowByUserIdRequest $request
    ): GetFollowByUserIdResult {
        return $this->getFollowByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Follow a user
     *
     * @param FollowRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#follow-1
     */
    public function followAsync(
            FollowRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FollowTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Follow a user
     *
     * @param FollowRequest $request
     * @return FollowResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#follow-1
     */
    public function follow (
            FollowRequest $request
    ): FollowResult {
        return $this->followAsync(
            $request
        )->wait();
    }

    /**
     * Follow a user by User ID
     *
     * @param FollowByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#followbyuserid
     */
    public function followByUserIdAsync(
            FollowByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FollowByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Follow a user by User ID
     *
     * @param FollowByUserIdRequest $request
     * @return FollowByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#followbyuserid
     */
    public function followByUserId (
            FollowByUserIdRequest $request
    ): FollowByUserIdResult {
        return $this->followByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Unfollow a user
     *
     * @param UnfollowRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unfollow
     */
    public function unfollowAsync(
            UnfollowRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnfollowTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Unfollow a user
     *
     * @param UnfollowRequest $request
     * @return UnfollowResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unfollow
     */
    public function unfollow (
            UnfollowRequest $request
    ): UnfollowResult {
        return $this->unfollowAsync(
            $request
        )->wait();
    }

    /**
     * Unfollow a user by User ID
     *
     * @param UnfollowByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unfollowbyuserid
     */
    public function unfollowByUserIdAsync(
            UnfollowByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnfollowByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Unfollow a user by User ID
     *
     * @param UnfollowByUserIdRequest $request
     * @return UnfollowByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#unfollowbyuserid
     */
    public function unfollowByUserId (
            UnfollowByUserIdRequest $request
    ): UnfollowByUserIdResult {
        return $this->unfollowByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a friend
     *
     * @param GetFriendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriend
     */
    public function getFriendAsync(
            GetFriendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFriendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a friend
     *
     * @param GetFriendRequest $request
     * @return GetFriendResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriend
     */
    public function getFriend (
            GetFriendRequest $request
    ): GetFriendResult {
        return $this->getFriendAsync(
            $request
        )->wait();
    }

    /**
     * Get a friend by User ID
     *
     * @param GetFriendByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriendbyuserid
     */
    public function getFriendByUserIdAsync(
            GetFriendByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFriendByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a friend by User ID
     *
     * @param GetFriendByUserIdRequest $request
     * @return GetFriendByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriendbyuserid
     */
    public function getFriendByUserId (
            GetFriendByUserIdRequest $request
    ): GetFriendByUserIdResult {
        return $this->getFriendByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Add friend
     *
     * @param AddFriendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#addfriend
     */
    public function addFriendAsync(
            AddFriendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddFriendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add friend
     *
     * @param AddFriendRequest $request
     * @return AddFriendResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#addfriend
     */
    public function addFriend (
            AddFriendRequest $request
    ): AddFriendResult {
        return $this->addFriendAsync(
            $request
        )->wait();
    }

    /**
     * Add friend by User ID
     *
     * @param AddFriendByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#addfriendbyuserid
     */
    public function addFriendByUserIdAsync(
            AddFriendByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddFriendByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add friend by User ID
     *
     * @param AddFriendByUserIdRequest $request
     * @return AddFriendByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#addfriendbyuserid
     */
    public function addFriendByUserId (
            AddFriendByUserIdRequest $request
    ): AddFriendByUserIdResult {
        return $this->addFriendByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete friend
     *
     * @param DeleteFriendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletefriend
     */
    public function deleteFriendAsync(
            DeleteFriendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFriendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete friend
     *
     * @param DeleteFriendRequest $request
     * @return DeleteFriendResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletefriend
     */
    public function deleteFriend (
            DeleteFriendRequest $request
    ): DeleteFriendResult {
        return $this->deleteFriendAsync(
            $request
        )->wait();
    }

    /**
     * Delete friend by User ID
     *
     * @param DeleteFriendByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletefriendbyuserid
     */
    public function deleteFriendByUserIdAsync(
            DeleteFriendByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFriendByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete friend by User ID
     *
     * @param DeleteFriendByUserIdRequest $request
     * @return DeleteFriendByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deletefriendbyuserid
     */
    public function deleteFriendByUserId (
            DeleteFriendByUserIdRequest $request
    ): DeleteFriendByUserIdResult {
        return $this->deleteFriendByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List sent friend requests
     *
     * @param DescribeSendRequestsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describesendrequests
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
     * List sent friend requests
     *
     * @param DescribeSendRequestsRequest $request
     * @return DescribeSendRequestsResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describesendrequests
     */
    public function describeSendRequests (
            DescribeSendRequestsRequest $request
    ): DescribeSendRequestsResult {
        return $this->describeSendRequestsAsync(
            $request
        )->wait();
    }

    /**
     * List sent friend requests by User ID
     *
     * @param DescribeSendRequestsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describesendrequestsbyuserid
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
     * List sent friend requests by User ID
     *
     * @param DescribeSendRequestsByUserIdRequest $request
     * @return DescribeSendRequestsByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describesendrequestsbyuserid
     */
    public function describeSendRequestsByUserId (
            DescribeSendRequestsByUserIdRequest $request
    ): DescribeSendRequestsByUserIdResult {
        return $this->describeSendRequestsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a sent friend request
     *
     * @param GetSendRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getsendrequest
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
     * Get a sent friend request
     *
     * @param GetSendRequestRequest $request
     * @return GetSendRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getsendrequest
     */
    public function getSendRequest (
            GetSendRequestRequest $request
    ): GetSendRequestResult {
        return $this->getSendRequestAsync(
            $request
        )->wait();
    }

    /**
     * Get a sent friend request by User ID
     *
     * @param GetSendRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getsendrequestbyuserid
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
     * Get a sent friend request by User ID
     *
     * @param GetSendRequestByUserIdRequest $request
     * @return GetSendRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getsendrequestbyuserid
     */
    public function getSendRequestByUserId (
            GetSendRequestByUserIdRequest $request
    ): GetSendRequestByUserIdResult {
        return $this->getSendRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Send a friend request
     *
     * @param SendRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequest
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
     * Send a friend request
     *
     * @param SendRequestRequest $request
     * @return SendRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequest
     */
    public function sendRequest (
            SendRequestRequest $request
    ): SendRequestResult {
        return $this->sendRequestAsync(
            $request
        )->wait();
    }

    /**
     * Send a friend request by User ID
     *
     * @param SendRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequestbyuserid
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
     * Send a friend request by User ID
     *
     * @param SendRequestByUserIdRequest $request
     * @return SendRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequestbyuserid
     */
    public function sendRequestByUserId (
            SendRequestByUserIdRequest $request
    ): SendRequestByUserIdResult {
        return $this->sendRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Cancel a sent friend request
     *
     * @param DeleteRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleterequest
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
     * Cancel a sent friend request
     *
     * @param DeleteRequestRequest $request
     * @return DeleteRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleterequest
     */
    public function deleteRequest (
            DeleteRequestRequest $request
    ): DeleteRequestResult {
        return $this->deleteRequestAsync(
            $request
        )->wait();
    }

    /**
     * Cancel a sent friend request by User ID
     *
     * @param DeleteRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleterequestbyuserid
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
     * Cancel a sent friend request by User ID
     *
     * @param DeleteRequestByUserIdRequest $request
     * @return DeleteRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#deleterequestbyuserid
     */
    public function deleteRequestByUserId (
            DeleteRequestByUserIdRequest $request
    ): DeleteRequestByUserIdResult {
        return $this->deleteRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List received friend requests
     *
     * @param DescribeReceiveRequestsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describereceiverequests
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
     * List received friend requests
     *
     * @param DescribeReceiveRequestsRequest $request
     * @return DescribeReceiveRequestsResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describereceiverequests
     */
    public function describeReceiveRequests (
            DescribeReceiveRequestsRequest $request
    ): DescribeReceiveRequestsResult {
        return $this->describeReceiveRequestsAsync(
            $request
        )->wait();
    }

    /**
     * List received friend requests by User ID
     *
     * @param DescribeReceiveRequestsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describereceiverequestsbyuserid
     */
    public function describeReceiveRequestsByUserIdAsync(
            DescribeReceiveRequestsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiveRequestsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List received friend requests by User ID
     *
     * @param DescribeReceiveRequestsByUserIdRequest $request
     * @return DescribeReceiveRequestsByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#describereceiverequestsbyuserid
     */
    public function describeReceiveRequestsByUserId (
            DescribeReceiveRequestsByUserIdRequest $request
    ): DescribeReceiveRequestsByUserIdResult {
        return $this->describeReceiveRequestsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a received friend request
     *
     * @param GetReceiveRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getreceiverequest
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
     * Get a received friend request
     *
     * @param GetReceiveRequestRequest $request
     * @return GetReceiveRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getreceiverequest
     */
    public function getReceiveRequest (
            GetReceiveRequestRequest $request
    ): GetReceiveRequestResult {
        return $this->getReceiveRequestAsync(
            $request
        )->wait();
    }

    /**
     * Get a received friend request by User ID
     *
     * @param GetReceiveRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getreceiverequestbyuserid
     */
    public function getReceiveRequestByUserIdAsync(
            GetReceiveRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceiveRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a received friend request by User ID
     *
     * @param GetReceiveRequestByUserIdRequest $request
     * @return GetReceiveRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getreceiverequestbyuserid
     */
    public function getReceiveRequestByUserId (
            GetReceiveRequestByUserIdRequest $request
    ): GetReceiveRequestByUserIdResult {
        return $this->getReceiveRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Accept friend request
     *
     * @param AcceptRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#acceptrequest
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
     * Accept friend request
     *
     * @param AcceptRequestRequest $request
     * @return AcceptRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#acceptrequest
     */
    public function acceptRequest (
            AcceptRequestRequest $request
    ): AcceptRequestResult {
        return $this->acceptRequestAsync(
            $request
        )->wait();
    }

    /**
     * Accept friend request by User ID
     *
     * @param AcceptRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#acceptrequestbyuserid
     */
    public function acceptRequestByUserIdAsync(
            AcceptRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Accept friend request by User ID
     *
     * @param AcceptRequestByUserIdRequest $request
     * @return AcceptRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#acceptrequestbyuserid
     */
    public function acceptRequestByUserId (
            AcceptRequestByUserIdRequest $request
    ): AcceptRequestByUserIdResult {
        return $this->acceptRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Reject friend request
     *
     * @param RejectRequestRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#rejectrequest
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
     * Reject friend request
     *
     * @param RejectRequestRequest $request
     * @return RejectRequestResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#rejectrequest
     */
    public function rejectRequest (
            RejectRequestRequest $request
    ): RejectRequestResult {
        return $this->rejectRequestAsync(
            $request
        )->wait();
    }

    /**
     * Reject friend request by User ID
     *
     * @param RejectRequestByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#rejectrequestbyuserid
     */
    public function rejectRequestByUserIdAsync(
            RejectRequestByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RejectRequestByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Reject friend request by User ID
     *
     * @param RejectRequestByUserIdRequest $request
     * @return RejectRequestByUserIdResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#rejectrequestbyuserid
     */
    public function rejectRequestByUserId (
            RejectRequestByUserIdRequest $request
    ): RejectRequestByUserIdResult {
        return $this->rejectRequestByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get public profile
     *
     * @param GetPublicProfileRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getpublicprofile
     */
    public function getPublicProfileAsync(
            GetPublicProfileRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPublicProfileTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get public profile
     *
     * @param GetPublicProfileRequest $request
     * @return GetPublicProfileResult
     * @see https://docs.gs2.io/api_reference/friend/sdk/#getpublicprofile
     */
    public function getPublicProfile (
            GetPublicProfileRequest $request
    ): GetPublicProfileResult {
        return $this->getPublicProfileAsync(
            $request
        )->wait();
    }
}