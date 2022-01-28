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


class DataObjectDomain {

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
     * @var string
     */
    private $userId;

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
        string $userId,
        string $dataObjectName
    ) {
        $this->session = $session;
        $this->client = new Gs2DatastoreRestClient(
            $session
        );
        $this->dataObjectCache = $dataObjectCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->dataObjectName = $dataObjectName;
        $this->dataObjectHistoryCache = new \Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache();
    }

    public function update(
        \Gs2\Datastore\Request\UpdateDataObjectByUserIdRequest $request
    ): \Gs2\Datastore\Result\UpdateDataObjectByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\UpdateDataObjectByUserIdResult
         */
        $r = $this->client->updateDataObjectByUserId(
            $request
        );
        $this->dataObjectCache->update($r->getItem());
        return $r;
    }

    public function doneUpload(
        \Gs2\Datastore\Request\DoneUploadByUserIdRequest $request
    ): \Gs2\Datastore\Result\DoneUploadByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\DoneUploadByUserIdResult
         */
        $r = $this->client->doneUploadByUserId(
            $request
        );
        $this->dataObjectCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Datastore\Request\DeleteDataObjectByUserIdRequest $request
    ): \Gs2\Datastore\Result\DeleteDataObjectByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDataObjectName($this->dataObjectName);
        /**
         * @var \Gs2\Datastore\Result\DeleteDataObjectByUserIdResult
         */
        $r = $this->client->deleteDataObjectByUserId(
            $request
        );
        $this->dataObjectCache->delete($r->getItem());
        return $r;
    }

    public function dataObjectHistories(
    ): \Gs2\Datastore\Domain\Iterator\DescribeDataObjectHistoriesByUserIdIterator {
        return new \Gs2\Datastore\Domain\Iterator\DescribeDataObjectHistoriesByUserIdIterator(
            $this->dataObjectHistoryCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $this->dataObjectName
        );
    }

    public function dataObjectHistory(
        string $generation
    ): DataObjectHistoryDomain {
        return new DataObjectHistoryDomain(
            $this->session,
            $this->dataObjectHistoryCache,
            $this->namespaceName,
            $this->userId,
            $this->dataObjectName,
            $generation
        );
    }

}
