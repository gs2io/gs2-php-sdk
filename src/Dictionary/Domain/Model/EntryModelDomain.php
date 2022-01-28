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

namespace Gs2\Dictionary\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Dictionary\Gs2DictionaryRestClient;


class EntryModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\EntryModelDomainCache
     */
    private $entryModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $entryName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Dictionary\Domain\Cache\EntryModelDomainCache $entryModelCache,
        string $namespaceName,
        string $entryName
    ) {
        $this->session = $session;
        $this->client = new Gs2DictionaryRestClient(
            $session
        );
        $this->entryModelCache = $entryModelCache;
        $this->namespaceName = $namespaceName;
        $this->entryName = $entryName;
    }

    public function load(
        \Gs2\Dictionary\Request\GetEntryModelRequest $request
    ): \Gs2\Dictionary\Result\GetEntryModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setEntryName($this->entryName);
        /**
         * @var \Gs2\Dictionary\Result\GetEntryModelResult
         */
        $r = $this->client->getEntryModel(
            $request
        );
        $this->entryModelCache->update($r->getItem());
        return $r;
    }

}
