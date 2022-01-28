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

namespace Gs2\Script\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Script\Gs2ScriptRestClient;


class ScriptDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScriptRestClient
     */
    private $client;

    /**
     * @var \Gs2\Script\Domain\Cache\ScriptDomainCache
     */
    private $scriptCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $scriptName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Script\Domain\Cache\ScriptDomainCache $scriptCache,
        string $namespaceName,
        string $scriptName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScriptRestClient(
            $session
        );
        $this->scriptCache = $scriptCache;
        $this->namespaceName = $namespaceName;
        $this->scriptName = $scriptName;
    }

    public function load(
        \Gs2\Script\Request\GetScriptRequest $request
    ): \Gs2\Script\Result\GetScriptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setScriptName($this->scriptName);
        /**
         * @var \Gs2\Script\Result\GetScriptResult
         */
        $r = $this->client->getScript(
            $request
        );
        $this->scriptCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Script\Request\UpdateScriptRequest $request
    ): \Gs2\Script\Result\UpdateScriptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setScriptName($this->scriptName);
        /**
         * @var \Gs2\Script\Result\UpdateScriptResult
         */
        $r = $this->client->updateScript(
            $request
        );
        $this->scriptCache->update($r->getItem());
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Script\Request\UpdateScriptFromGitHubRequest $request
    ): \Gs2\Script\Result\UpdateScriptFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setScriptName($this->scriptName);
        /**
         * @var \Gs2\Script\Result\UpdateScriptFromGitHubResult
         */
        $r = $this->client->updateScriptFromGitHub(
            $request
        );
        $this->scriptCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Script\Request\DeleteScriptRequest $request
    ): \Gs2\Script\Result\DeleteScriptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setScriptName($this->scriptName);
        /**
         * @var \Gs2\Script\Result\DeleteScriptResult
         */
        $r = $this->client->deleteScript(
            $request
        );
        return $r;
    }

}
