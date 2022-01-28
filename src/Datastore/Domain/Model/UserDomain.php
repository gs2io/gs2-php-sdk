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

namespace Gs2\Datastore\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Datastore\Gs2DatastoreRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DatastoreRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Datastore\Domain\Cache\DataObjectDomainCache
     */
    private $dataObjectCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2DatastoreRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->dataObjectCache = new \Gs2\Datastore\Domain\Cache\DataObjectDomainCache();
    }

    public function prepareUpload(
        \Gs2\Datastore\Request\PrepareUploadByUserIdRequest $request
    ): \Gs2\Datastore\Result\PrepareUploadByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareUploadByUserIdResult
         */
        $r = $this->client->prepareUploadByUserId(
            $request
        );
        return $r;
    }

    public function prepareReUpload(
        \Gs2\Datastore\Request\PrepareReUploadByUserIdRequest $request
    ): \Gs2\Datastore\Result\PrepareReUploadByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareReUploadByUserIdResult
         */
        $r = $this->client->prepareReUploadByUserId(
            $request
        );
        return $r;
    }

    public function prepareDownload(
        \Gs2\Datastore\Request\PrepareDownloadByUserIdRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadByUserIdResult
         */
        $r = $this->client->prepareDownloadByUserId(
            $request
        );
        return $r;
    }

    public function prepareDownloadByGenerationAndId(
        \Gs2\Datastore\Request\PrepareDownloadByGenerationAndUserIdRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadByGenerationAndUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadByGenerationAndUserIdResult
         */
        $r = $this->client->prepareDownloadByGenerationAndUserId(
            $request
        );
        return $r;
    }

    public function prepareDownloadByIdAndDataObjectName(
        \Gs2\Datastore\Request\PrepareDownloadByUserIdAndDataObjectNameRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadByUserIdAndDataObjectNameResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadByUserIdAndDataObjectNameResult
         */
        $r = $this->client->prepareDownloadByUserIdAndDataObjectName(
            $request
        );
        return $r;
    }

    public function prepareDownloadByIdAndDataObjectNameAndGeneration(
        \Gs2\Datastore\Request\PrepareDownloadByUserIdAndDataObjectNameAndGenerationRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult
         */
        $r = $this->client->prepareDownloadByUserIdAndDataObjectNameAndGeneration(
            $request
        );
        return $r;
    }

    public function dataObjects(
        ?string $status
    ): \Gs2\Datastore\Domain\Iterator\DescribeDataObjectsByUserIdIterator {
        return new \Gs2\Datastore\Domain\Iterator\DescribeDataObjectsByUserIdIterator(
            $this->dataObjectCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $status
        );
    }

    public function dataObject(
        string $dataObjectName
    ): DataObjectDomain {
        return new DataObjectDomain(
            $this->session,
            $this->dataObjectCache,
            $this->namespaceName,
            $this->userId,
            $dataObjectName
        );
    }

}
