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

namespace Gs2\Showcase\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Showcase\Gs2ShowcaseRestClient;


class ShowcaseMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
     */
    private $client;

    /**
     * @var \Gs2\Showcase\Domain\Cache\ShowcaseMasterDomainCache
     */
    private $showcaseMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $showcaseName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Showcase\Domain\Cache\ShowcaseMasterDomainCache $showcaseMasterCache,
        string $namespaceName,
        string $showcaseName
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->showcaseMasterCache = $showcaseMasterCache;
        $this->namespaceName = $namespaceName;
        $this->showcaseName = $showcaseName;
    }

    public function load(
        \Gs2\Showcase\Request\GetShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\GetShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setShowcaseName($this->showcaseName);
        /**
         * @var \Gs2\Showcase\Result\GetShowcaseMasterResult
         */
        $r = $this->client->getShowcaseMaster(
            $request
        );
        $this->showcaseMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Showcase\Request\UpdateShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\UpdateShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setShowcaseName($this->showcaseName);
        /**
         * @var \Gs2\Showcase\Result\UpdateShowcaseMasterResult
         */
        $r = $this->client->updateShowcaseMaster(
            $request
        );
        $this->showcaseMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Showcase\Request\DeleteShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\DeleteShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setShowcaseName($this->showcaseName);
        /**
         * @var \Gs2\Showcase\Result\DeleteShowcaseMasterResult
         */
        $r = $this->client->deleteShowcaseMaster(
            $request
        );
        $this->showcaseMasterCache->delete($r->getItem());
        return $r;
    }

}
