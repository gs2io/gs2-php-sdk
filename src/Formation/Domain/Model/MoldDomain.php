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

namespace Gs2\Formation\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Formation\Gs2FormationRestClient;


class MoldDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\MoldDomainCache
     */
    private $moldCache;

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
    private $moldName;

    /**
     * @var \Gs2\Formation\Domain\Cache\FormDomainCache
     */
    private $formCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\MoldDomainCache $moldCache,
        string $namespaceName,
        string $userId,
        string $moldName
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->moldCache = $moldCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->moldName = $moldName;
        $this->formCache = new \Gs2\Formation\Domain\Cache\FormDomainCache();
    }

    public function load(
        \Gs2\Formation\Request\GetMoldByUserIdRequest $request
    ): \Gs2\Formation\Result\GetMoldByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\GetMoldByUserIdResult
         */
        $r = $this->client->getMoldByUserId(
            $request
        );
        $this->moldCache->update($r->getItem());
        return $r;
    }

    public function setCapacity(
        \Gs2\Formation\Request\SetMoldCapacityByUserIdRequest $request
    ): \Gs2\Formation\Result\SetMoldCapacityByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\SetMoldCapacityByUserIdResult
         */
        $r = $this->client->setMoldCapacityByUserId(
            $request
        );
        $this->moldCache->update($r->getItem());
        return $r;
    }

    public function addCapacity(
        \Gs2\Formation\Request\AddMoldCapacityByUserIdRequest $request
    ): \Gs2\Formation\Result\AddMoldCapacityByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\AddMoldCapacityByUserIdResult
         */
        $r = $this->client->addMoldCapacityByUserId(
            $request
        );
        $this->moldCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteMoldByUserIdRequest $request
    ): \Gs2\Formation\Result\DeleteMoldByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\DeleteMoldByUserIdResult
         */
        $r = $this->client->deleteMoldByUserId(
            $request
        );
        $this->moldCache->delete($r->getItem());
        return $r;
    }

    public function forms(
    ): \Gs2\Formation\Domain\Iterator\DescribeFormsByUserIdIterator {
        return new \Gs2\Formation\Domain\Iterator\DescribeFormsByUserIdIterator(
            $this->formCache,
            $this->client,
            $this->namespaceName,
            $this->moldName,
            $this->userId
        );
    }

    public function form(
        int $index
    ): FormDomain {
        return new FormDomain(
            $this->session,
            $this->formCache,
            $this->namespaceName,
            $this->userId,
            $this->moldName,
            $index
        );
    }

}
