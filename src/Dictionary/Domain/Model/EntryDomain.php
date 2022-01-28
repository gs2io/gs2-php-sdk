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


class EntryDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\EntryDomainCache
     */
    private $entryCache;

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
    private $entryModelName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Dictionary\Domain\Cache\EntryDomainCache $entryCache,
        string $namespaceName,
        string $userId,
        string $entryModelName
    ) {
        $this->session = $session;
        $this->client = new Gs2DictionaryRestClient(
            $session
        );
        $this->entryCache = $entryCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->entryModelName = $entryModelName;
    }

    public function load(
        \Gs2\Dictionary\Request\GetEntryByUserIdRequest $request
    ): \Gs2\Dictionary\Result\GetEntryByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setEntryModelName($this->entryModelName);
        /**
         * @var \Gs2\Dictionary\Result\GetEntryByUserIdResult
         */
        $r = $this->client->getEntryByUserId(
            $request
        );
        $this->entryCache->update($r->getItem());
        return $r;
    }

    public function getWithSignature(
        \Gs2\Dictionary\Request\GetEntryWithSignatureByUserIdRequest $request
    ): \Gs2\Dictionary\Result\GetEntryWithSignatureByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setEntryModelName($this->entryModelName);
        /**
         * @var \Gs2\Dictionary\Result\GetEntryWithSignatureByUserIdResult
         */
        $r = $this->client->getEntryWithSignatureByUserId(
            $request
        );
        $this->entryCache->update($r->getItem());
        return $r;
    }

}
