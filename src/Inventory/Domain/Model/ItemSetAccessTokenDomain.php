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

namespace Gs2\Inventory\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inventory\Gs2InventoryRestClient;


class ItemSetAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemSetDomainCache
     */
    private $itemSetCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $inventoryName;

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var string
     */
    private $itemSetName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\ItemSetDomainCache $itemSetCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $inventoryName,
        string $itemName,
        string $itemSetName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->itemSetCache = $itemSetCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
        $this->itemSetName = $itemSetName;
    }

    public function load(
        \Gs2\Inventory\Request\GetItemSetRequest $request
    ): \Gs2\Inventory\Result\GetItemSetResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetItemSetResult
         */
        $r = $this->client->getItemSet(
            $request
        );
        return $r;
    }

    public function getItemWithSignature(
        \Gs2\Inventory\Request\GetItemWithSignatureRequest $request
    ): \Gs2\Inventory\Result\GetItemWithSignatureResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetItemWithSignatureResult
         */
        $r = $this->client->getItemWithSignature(
            $request
        );
        return $r;
    }

    public function consume(
        \Gs2\Inventory\Request\ConsumeItemSetRequest $request
    ): \Gs2\Inventory\Result\ConsumeItemSetResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\ConsumeItemSetResult
         */
        $r = $this->client->consumeItemSet(
            $request
        );
        return $r;
    }

    public function referenceOf(
    ): ReferenceOfAccessTokenDomain {
        return new ReferenceOfAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken,
            $this->inventoryName,
            $this->itemName,
            $this->itemSetName
        );
    }

}
