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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class ConsumeItemSetRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $itemName;
    /** @var int */
    private $consumeCount;
    /** @var string */
    private $itemSetName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): ConsumeItemSetRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	public function withInventoryName(?string $inventoryName): ConsumeItemSetRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): ConsumeItemSetRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getItemName(): ?string {
		return $this->itemName;
	}

	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}

	public function withItemName(?string $itemName): ConsumeItemSetRequest {
		$this->itemName = $itemName;
		return $this;
	}

	public function getConsumeCount(): ?int {
		return $this->consumeCount;
	}

	public function setConsumeCount(?int $consumeCount) {
		$this->consumeCount = $consumeCount;
	}

	public function withConsumeCount(?int $consumeCount): ConsumeItemSetRequest {
		$this->consumeCount = $consumeCount;
		return $this;
	}

	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}

	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}

	public function withItemSetName(?string $itemSetName): ConsumeItemSetRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeItemSetRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeItemSetRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withInventoryName(empty($data['inventoryName']) ? null : $data['inventoryName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withItemName(empty($data['itemName']) ? null : $data['itemName'])
            ->withConsumeCount(empty($data['consumeCount']) && $data['consumeCount'] !== 0 ? null : $data['consumeCount'])
            ->withItemSetName(empty($data['itemSetName']) ? null : $data['itemSetName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "itemName" => $this->getItemName(),
            "consumeCount" => $this->getConsumeCount(),
            "itemSetName" => $this->getItemSetName(),
        );
    }
}