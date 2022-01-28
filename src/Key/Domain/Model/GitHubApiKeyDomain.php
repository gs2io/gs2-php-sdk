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


class GitHubApiKeyDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2KeyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Key\Domain\Cache\GitHubApiKeyDomainCache
     */
    private $gitHubApiKeyCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $apiKeyName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Key\Domain\Cache\GitHubApiKeyDomainCache $gitHubApiKeyCache,
        string $namespaceName,
        string $apiKeyName
    ) {
        $this->session = $session;
        $this->client = new Gs2KeyRestClient(
            $session
        );
        $this->gitHubApiKeyCache = $gitHubApiKeyCache;
        $this->namespaceName = $namespaceName;
        $this->apiKeyName = $apiKeyName;
    }

    public function update(
        \Gs2\Key\Request\UpdateGitHubApiKeyRequest $request
    ): \Gs2\Key\Result\UpdateGitHubApiKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setApiKeyName($this->apiKeyName);
        /**
         * @var \Gs2\Key\Result\UpdateGitHubApiKeyResult
         */
        $r = $this->client->updateGitHubApiKey(
            $request
        );
        $this->gitHubApiKeyCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Key\Request\GetGitHubApiKeyRequest $request
    ): \Gs2\Key\Result\GetGitHubApiKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setApiKeyName($this->apiKeyName);
        /**
         * @var \Gs2\Key\Result\GetGitHubApiKeyResult
         */
        $r = $this->client->getGitHubApiKey(
            $request
        );
        $this->gitHubApiKeyCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Key\Request\DeleteGitHubApiKeyRequest $request
    ): \Gs2\Key\Result\DeleteGitHubApiKeyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setApiKeyName($this->apiKeyName);
        /**
         * @var \Gs2\Key\Result\DeleteGitHubApiKeyResult
         */
        $r = $this->client->deleteGitHubApiKey(
            $request
        );
        $this->gitHubApiKeyCache->delete($r->getItem());
        return $r;
    }

}
