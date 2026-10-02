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
use Gs2\Inventory\Model\AcquireCount;

/**
 * Request for acquireSimpleItemsByUserId: Acquire Simple Items by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#acquiresimpleitemsbyuserid
 */
class AcquireSimpleItemsByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Simple Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $userId;
    /** @var array List of acquisition quantities for Simple Items */
    private $acquireCounts;
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
     * @return AcquireSimpleItemsByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquireSimpleItemsByUserIdRequest {
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
     * @return AcquireSimpleItemsByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): AcquireSimpleItemsByUserIdRequest {
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
     * @return AcquireSimpleItemsByUserIdRequest
     */
	public function withUserId(?string $userId): AcquireSimpleItemsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of acquisition quantities for Simple Items */
	public function getAcquireCounts(): ?array {
		return $this->acquireCounts;
	}
    /** @param array|null $acquireCounts List of acquisition quantities for Simple Items */
	public function setAcquireCounts(?array $acquireCounts) {
		$this->acquireCounts = $acquireCounts;
	}
    /**
     * @param array|null $acquireCounts List of acquisition quantities for Simple Items
     * @return AcquireSimpleItemsByUserIdRequest
     */
	public function withAcquireCounts(?array $acquireCounts): AcquireSimpleItemsByUserIdRequest {
		$this->acquireCounts = $acquireCounts;
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
     * @return AcquireSimpleItemsByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquireSimpleItemsByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireSimpleItemsByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireSimpleItemsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireSimpleItemsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAcquireCounts(!array_key_exists('acquireCounts', $data) || $data['acquireCounts'] === null ? null : array_map(
                function ($item) {
                    return AcquireCount::fromJson($item);
                },
                $data['acquireCounts']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "acquireCounts" => $this->getAcquireCounts() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireCounts()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}