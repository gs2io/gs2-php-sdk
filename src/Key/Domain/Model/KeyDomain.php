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

namespace Gs2\Key\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Key\Gs2KeyRestClient;


class KeyDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2KeyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Key\Domain\Cache\KeyDomainCache
     */
    private $keyCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $keyName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Key\Domain\Cache\KeyDomainCache $keyCache,
        string $namespaceName,
        string $keyName
    ) {
        $this->session = $session;
        $this->client = new Gs2KeyRestClient(
            $session
        );
        $this->keyCache = $keyCache;
        $this->namespaceName = $namespaceName;
        $this->keyName = $keyName;
    }

    public function update(
        \Gs2\Key\Request\UpdateKeyRequest $request
    ): \Gs2\Key\Result\UpdateKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setKeyName($this->keyName);
        /**
         * @var \Gs2\Key\Result\UpdateKeyResult
         */
        $r = $this->client->updateKey(
            $request
        );
        $this->keyCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Key\Request\GetKeyRequest $request
    ): \Gs2\Key\Result\GetKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setKeyName($this->keyName);
        /**
         * @var \Gs2\Key\Result\GetKeyResult
         */
        $r = $this->client->getKey(
            $request
        );
        $this->keyCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Key\Request\DeleteKeyRequest $request
    ): \Gs2\Key\Result\DeleteKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setKeyName($this->keyName);
        /**
         * @var \Gs2\Key\Result\DeleteKeyResult
         */
        $r = $this->client->deleteKey(
            $request
        );
        $this->keyCache->delete($r->getItem());
        return $r;
    }

    public function encrypt(
        \Gs2\Key\Request\EncryptRequest $request
    ): \Gs2\Key\Result\EncryptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setKeyName($this->keyName);
        /**
         * @var \Gs2\Key\Result\EncryptResult
         */
        $r = $this->client->encrypt(
            $request
        );
        return $r;
    }

    public function decrypt(
        \Gs2\Key\Request\DecryptRequest $request
    ): \Gs2\Key\Result\DecryptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setKeyName($this->keyName);
        /**
         * @var \Gs2\Key\Result\DecryptResult
         */
        $r = $this->client->decrypt(
            $request
        );
        return $r;
    }

}
