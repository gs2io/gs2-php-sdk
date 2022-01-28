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


class DataObjectHistoryDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DatastoreRestClient
     */
    private $client;

    /**
     * @var \Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache
     */
    private $dataObjectHistoryCache;

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
     * @var string
     */
    private $generation;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache $dataObjectHistoryCache,
        string $namespaceName,
        string $userId,
        string $dataObjectName,
        string $generation
    ) {
        $this->session = $session;
        $this->client = new Gs2DatastoreRestClient(
            $session
        );
        $this->dataObjectHistoryCache = $dataObjectHistoryCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->dataObjectName = $dataObjectName;
        $this->generation = $generation;
    }

    public function load(
        \Gs2\Datastore\Request\GetDataObjectHistoryByUserIdRequest $request
    ): \Gs2\Datastore\Result\GetDataObjectHistoryByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDataObjectName($this->dataObjectName);
        $request->setGeneration($this->generation);
        /**
         * @var \Gs2\Datastore\Result\GetDataObjectHistoryByUserIdResult
         */
        $r = $this->client->getDataObjectHistoryByUserId(
            $request
        );
        $this->dataObjectHistoryCache->update($r->getItem());
        return $r;
    }

}
