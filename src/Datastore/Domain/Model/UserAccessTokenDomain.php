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


class UserAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var \Gs2\Datastore\Domain\Cache\DataObjectDomainCache
     */
    private $dataObjectCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2DatastoreRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->dataObjectCache = new \Gs2\Datastore\Domain\Cache\DataObjectDomainCache();
    }

    public function prepareUpload(
        \Gs2\Datastore\Request\PrepareUploadRequest $request
    ): \Gs2\Datastore\Result\PrepareUploadResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareUploadResult
         */
        $r = $this->client->prepareUpload(
            $request
        );
        return $r;
    }

    public function prepareReUpload(
        \Gs2\Datastore\Request\PrepareReUploadRequest $request
    ): \Gs2\Datastore\Result\PrepareReUploadResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareReUploadResult
         */
        $r = $this->client->prepareReUpload(
            $request
        );
        return $r;
    }

    public function prepareDownload(
        \Gs2\Datastore\Request\PrepareDownloadRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadResult
         */
        $r = $this->client->prepareDownload(
            $request
        );
        return $r;
    }

    public function prepareDownloadByGeneration(
        \Gs2\Datastore\Request\PrepareDownloadByGenerationRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadByGenerationResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadByGenerationResult
         */
        $r = $this->client->prepareDownloadByGeneration(
            $request
        );
        return $r;
    }

    public function prepareDownloadOwnData(
        \Gs2\Datastore\Request\PrepareDownloadOwnDataRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadOwnDataResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadOwnDataResult
         */
        $r = $this->client->prepareDownloadOwnData(
            $request
        );
        return $r;
    }

    public function prepareDownloadOwnDataByGeneration(
        \Gs2\Datastore\Request\PrepareDownloadOwnDataByGenerationRequest $request
    ): \Gs2\Datastore\Result\PrepareDownloadOwnDataByGenerationResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Datastore\Result\PrepareDownloadOwnDataByGenerationResult
         */
        $r = $this->client->prepareDownloadOwnDataByGeneration(
            $request
        );
        return $r;
    }

    public function dataObjects(
        ?string $status
    ): \Gs2\Datastore\Domain\Iterator\DescribeDataObjectsIterator {
        return new \Gs2\Datastore\Domain\Iterator\DescribeDataObjectsIterator(
            $this->dataObjectCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken,
            $status
        );
    }

    public function dataObject(
        string $dataObjectName
    ): DataObjectAccessTokenDomain {
        return new DataObjectAccessTokenDomain(
            $this->session,
            $this->dataObjectCache,
            $this->namespaceName,
            $this->accessToken,
            $dataObjectName
        );
    }

}
