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

namespace Gs2\Experience\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Experience\Gs2ExperienceRestClient;

class Gs2Experience {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Experience\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Experience\Request\CreateNamespaceRequest $request
    ): \Gs2\Experience\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Experience\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function addExperienceByStampSheet(
        \Gs2\Experience\Request\AddExperienceByStampSheetRequest $request
    ): \Gs2\Experience\Result\AddExperienceByStampSheetResult {
        /**
         * @var \Gs2\Experience\Result\AddExperienceByStampSheetResult
         */
        $r = $this->client->addExperienceByStampSheet(
            $request
        );
        return $r;
    }

    public function addRankCapByStampSheet(
        \Gs2\Experience\Request\AddRankCapByStampSheetRequest $request
    ): \Gs2\Experience\Result\AddRankCapByStampSheetResult {
        /**
         * @var \Gs2\Experience\Result\AddRankCapByStampSheetResult
         */
        $r = $this->client->addRankCapByStampSheet(
            $request
        );
        return $r;
    }

    public function setRankCapByStampSheet(
        \Gs2\Experience\Request\SetRankCapByStampSheetRequest $request
    ): \Gs2\Experience\Result\SetRankCapByStampSheetResult {
        /**
         * @var \Gs2\Experience\Result\SetRankCapByStampSheetResult
         */
        $r = $this->client->setRankCapByStampSheet(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Experience\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Experience\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Experience\Domain\Model\NamespaceDomain {
        return new \Gs2\Experience\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
