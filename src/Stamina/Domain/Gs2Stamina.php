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

namespace Gs2\Stamina\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Stamina\Gs2StaminaRestClient;

class Gs2Stamina {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Stamina\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Stamina\Request\CreateNamespaceRequest $request
    ): \Gs2\Stamina\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Stamina\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function recoverStaminaByStampSheet(
        \Gs2\Stamina\Request\RecoverStaminaByStampSheetRequest $request
    ): \Gs2\Stamina\Result\RecoverStaminaByStampSheetResult {
        /**
         * @var \Gs2\Stamina\Result\RecoverStaminaByStampSheetResult
         */
        $r = $this->client->recoverStaminaByStampSheet(
            $request
        );
        return $r;
    }

    public function raiseMaxValueByStampSheet(
        \Gs2\Stamina\Request\RaiseMaxValueByStampSheetRequest $request
    ): \Gs2\Stamina\Result\RaiseMaxValueByStampSheetResult {
        /**
         * @var \Gs2\Stamina\Result\RaiseMaxValueByStampSheetResult
         */
        $r = $this->client->raiseMaxValueByStampSheet(
            $request
        );
        return $r;
    }

    public function setMaxValueByStampSheet(
        \Gs2\Stamina\Request\SetMaxValueByStampSheetRequest $request
    ): \Gs2\Stamina\Result\SetMaxValueByStampSheetResult {
        /**
         * @var \Gs2\Stamina\Result\SetMaxValueByStampSheetResult
         */
        $r = $this->client->setMaxValueByStampSheet(
            $request
        );
        return $r;
    }

    public function setRecoverIntervalByStampSheet(
        \Gs2\Stamina\Request\SetRecoverIntervalByStampSheetRequest $request
    ): \Gs2\Stamina\Result\SetRecoverIntervalByStampSheetResult {
        /**
         * @var \Gs2\Stamina\Result\SetRecoverIntervalByStampSheetResult
         */
        $r = $this->client->setRecoverIntervalByStampSheet(
            $request
        );
        return $r;
    }

    public function setRecoverValueByStampSheet(
        \Gs2\Stamina\Request\SetRecoverValueByStampSheetRequest $request
    ): \Gs2\Stamina\Result\SetRecoverValueByStampSheetResult {
        /**
         * @var \Gs2\Stamina\Result\SetRecoverValueByStampSheetResult
         */
        $r = $this->client->setRecoverValueByStampSheet(
            $request
        );
        return $r;
    }

    public function consumeStaminaByStampTask(
        \Gs2\Stamina\Request\ConsumeStaminaByStampTaskRequest $request
    ): \Gs2\Stamina\Result\ConsumeStaminaByStampTaskResult {
        /**
         * @var \Gs2\Stamina\Result\ConsumeStaminaByStampTaskResult
         */
        $r = $this->client->consumeStaminaByStampTask(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Stamina\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Stamina\Domain\Model\NamespaceDomain {
        return new \Gs2\Stamina\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
