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

class AcquireSimpleItemsByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $userId;
    /** @var array */
    private $acquireCounts;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): AcquireSimpleItemsByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): AcquireSimpleItemsByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AcquireSimpleItemsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getAcquireCounts(): ?array {
		return $this->acquireCounts;
	}
	public function setAcquireCounts(?array $acquireCounts) {
		$this->acquireCounts = $acquireCounts;
	}
	public function withAcquireCounts(?array $acquireCounts): AcquireSimpleItemsByUserIdRequest {
		$this->acquireCounts = $acquireCounts;
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
            ->withAcquireCounts(array_map(
                function ($item) {
                    return AcquireCount::fromJson($item);
                },
                array_key_exists('acquireCounts', $data) && $data['acquireCounts'] !== null ? $data['acquireCounts'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "acquireCounts" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireCounts() !== null && $this->getAcquireCounts() !== null ? $this->getAcquireCounts() : []
            ),
        );
    }
}