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
use Gs2\Inventory\Model\HeldCount;

/**
 * Request for setSimpleItemsByUserId: Set the quantity of simple items by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#setsimpleitemsbyuserid
 */
class SetSimpleItemsByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Simple Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $userId;
    /** @var array List of quantity of Simple Items in possession */
    private $counts;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return SetSimpleItemsByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetSimpleItemsByUserIdRequest {
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
     * @return SetSimpleItemsByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): SetSimpleItemsByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return SetSimpleItemsByUserIdRequest
     */
	public function withUserId(?string $userId): SetSimpleItemsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of quantity of Simple Items in possession */
	public function getCounts(): ?array {
		return $this->counts;
	}
    /** @param array|null $counts List of quantity of Simple Items in possession */
	public function setCounts(?array $counts) {
		$this->counts = $counts;
	}
    /**
     * @param array|null $counts List of quantity of Simple Items in possession
     * @return SetSimpleItemsByUserIdRequest
     */
	public function withCounts(?array $counts): SetSimpleItemsByUserIdRequest {
		$this->counts = $counts;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return SetSimpleItemsByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetSimpleItemsByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetSimpleItemsByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetSimpleItemsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetSimpleItemsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCounts(!array_key_exists('counts', $data) || $data['counts'] === null ? null : array_map(
                function ($item) {
                    return HeldCount::fromJson($item);
                },
                $data['counts']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "counts" => $this->getCounts() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCounts()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}