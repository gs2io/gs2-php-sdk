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

class ConsumeSimpleItemsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $accessToken;
    /** @var array */
    private $consumeCounts;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): ConsumeSimpleItemsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): ConsumeSimpleItemsRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): ConsumeSimpleItemsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getConsumeCounts(): ?array {
		return $this->consumeCounts;
	}
	public function setConsumeCounts(?array $consumeCounts) {
		$this->consumeCounts = $consumeCounts;
	}
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
            ->withConsumeCounts(array_map(
                function ($item) {
                    return ConsumeCount::fromJson($item);
                },
                array_key_exists('consumeCounts', $data) && $data['consumeCounts'] !== null ? $data['consumeCounts'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "consumeCounts" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeCounts() !== null && $this->getConsumeCounts() !== null ? $this->getConsumeCounts() : []
            ),
        );
    }
}