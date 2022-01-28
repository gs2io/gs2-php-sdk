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


class DataObjectAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DatastoreRestClient
     */
    private $client;

    /**
     * @var \Gs2\Datastore\Domain\Cache\DataObjectDomainCache
     */
    private $dataObjectCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $dataObjectName;

    /**
     * @var \Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache
     */
    private $dataObjectHistoryCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Datastore\Domain\Cache\DataObjectDomainCache $dataObjectCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $dataObjectName
    ) {
        $this->session = $session;
        $this->client = new Gs2DatastoreRestClient(
            $session
        );
        $this->dataObjectCache = $dataObjectCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->dataObjectName = $dataObjectName;
        $this->dataObjectHistoryCache = new \Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache();
    }

    public function update(
        \Gs2\Datastore\Request\UpdateDataObjectRequest $request
    ): \Gs2\Datastore\Result\UpdateDataObjectResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\UpdateDataObjectResult
         */
        $r = $this->client->updateDataObject(
            $request
        );
        $this->dataObjectCache->update($r->getItem());
        return $r;
    }

    public function doneUpload(
        \Gs2\Datastore\Request\DoneUploadRequest $request
    ): \Gs2\Datastore\Result\DoneUploadResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\DoneUploadResult
         */
        $r = $this->client->doneUpload(
            $request
        );
        $this->dataObjectCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Datastore\Request\DeleteDataObjectRequest $request
    ): \Gs2\Datastore\Result\DeleteDataObjectResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\DeleteDataObjectResult
         */
        $r = $this->client->deleteDataObject(
            $request
        );
        $this->dataObjectCache->delete($r->getItem());
        return $r;
    }

    public function dataObjectHistories(
    ): \Gs2\Datastore\Domain\Iterator\DescribeDataObjectHistoriesIterator {
        return new \Gs2\Datastore\Domain\Iterator\DescribeDataObjectHistoriesIterator(
            $this->dataObjectHistoryCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken,
            $this->dataObjectName
        );
    }

    public function dataObjectHistory(
        string $generation
    ): DataObjectHistoryAccessTokenDomain {
        return new DataObjectHistoryAccessTokenDomain(
            $this->session,
            $this->dataObjectHistoryCache,
            $this->namespaceName,
            $this->accessToken,
            $this->dataObjectName,
            $generation
        );
    }

}
