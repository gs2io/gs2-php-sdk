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


class ReferenceOfAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

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
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
        $this->itemSetName = $itemSetName;
    }

    public function load(
        \Gs2\Inventory\Request\GetReferenceOfRequest $request
    ): \Gs2\Inventory\Result\GetReferenceOfResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetReferenceOfResult
         */
        $r = $this->client->getReferenceOf(
            $request
        );
        return $r;
    }

    public function verify(
        \Gs2\Inventory\Request\VerifyReferenceOfRequest $request
    ): \Gs2\Inventory\Result\VerifyReferenceOfResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\VerifyReferenceOfResult
         */
        $r = $this->client->verifyReferenceOf(
            $request
        );
        return $r;
    }

    public function add(
        \Gs2\Inventory\Request\AddReferenceOfRequest $request
    ): \Gs2\Inventory\Result\AddReferenceOfResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\AddReferenceOfResult
         */
        $r = $this->client->addReferenceOf(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteReferenceOfRequest $request
    ): \Gs2\Inventory\Result\DeleteReferenceOfResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\DeleteReferenceOfResult
         */
        $r = $this->client->deleteReferenceOf(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Inventory\Domain\Iterator\DescribeReferenceOfIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeReferenceOfIterator(
            $this->client,
            $this->namespaceName,
            $this->inventoryName,
            $this->accessToken,
            $this->itemName,
            $this->itemSetName
        );
    }

}
