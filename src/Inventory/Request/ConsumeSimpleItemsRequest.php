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
use Gs2\Inventory\Model\ConsumeCount;

/**
 * Request for consumeSimpleItems: Consume Simple Items
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumesimpleitems
 */
class ConsumeSimpleItemsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Simple Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of consumption quantities of Simple Items */
    private $consumeCounts;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return ConsumeSimpleItemsRequest
     */
	public function withNamespaceName(?string $namespaceName): ConsumeSimpleItemsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Simple Inventory Model name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Simple Inventory Model name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Simple Inventory Model name
     * @return ConsumeSimpleItemsRequest
     */
	public function withInventoryName(?string $inventoryName): ConsumeSimpleItemsRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return ConsumeSimpleItemsRequest
     */
	public function withAccessToken(?string $accessToken): ConsumeSimpleItemsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null List of consumption quantities of Simple Items */
	public function getConsumeCounts(): ?array {
		return $this->consumeCounts;
	}
    /** @param array|null $consumeCounts List of consumption quantities of Simple Items */
	public function setConsumeCounts(?array $consumeCounts) {
		$this->consumeCounts = $consumeCounts;
	}
    /**
     * @param array|null $consumeCounts List of consumption quantities of Simple Items
     * @return ConsumeSimpleItemsRequest
     */
	public function withConsumeCounts(?array $consumeCounts): ConsumeSimpleItemsRequest {
		$this->consumeCounts = $consumeCounts;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ConsumeSimpleItemsRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeSimpleItemsRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeSimpleItemsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withConsumeCounts(!array_key_exists('consumeCounts', $data) || $data['consumeCounts'] === null ? null : array_map(
                function ($item) {
                    return ConsumeCount::fromJson($item);
                },
                $data['consumeCounts']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "consumeCounts" => $this->getConsumeCounts() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeCounts()
            ),
        );
    }
}