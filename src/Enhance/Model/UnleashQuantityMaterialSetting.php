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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Quantity Material Setting
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashquantitymaterialsetting
 */
class UnleashQuantityMaterialSetting implements IModel {
	/**
     * @var string How the item model to consume is decided
	 */
	private $matchType;
	/**
     * @var string GS2-Inventory inventory model GRN to search for the material
	 */
	private $materialInventoryModelId;
	/**
     * @var string GS2-Inventory item model GRN to consume
	 */
	private $itemModelId;
	/**
     * @var int Quantity to consume
	 */
	private $count;
    /** @return string|null How the item model to consume is decided */
	public function getMatchType(): ?string {
		return $this->matchType;
	}
    /** @param string|null $matchType How the item model to consume is decided */
	public function setMatchType(?string $matchType) {
		$this->matchType = $matchType;
	}
    /**
     * @param string|null $matchType How the item model to consume is decided
     * @return UnleashQuantityMaterialSetting
     */
	public function withMatchType(?string $matchType): UnleashQuantityMaterialSetting {
		$this->matchType = $matchType;
		return $this;
	}
    /** @return string|null GS2-Inventory inventory model GRN to search for the material */
	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}
    /** @param string|null $materialInventoryModelId GS2-Inventory inventory model GRN to search for the material */
	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}
    /**
     * @param string|null $materialInventoryModelId GS2-Inventory inventory model GRN to search for the material
     * @return UnleashQuantityMaterialSetting
     */
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): UnleashQuantityMaterialSetting {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}
    /** @return string|null GS2-Inventory item model GRN to consume */
	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}
    /** @param string|null $itemModelId GS2-Inventory item model GRN to consume */
	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}
    /**
     * @param string|null $itemModelId GS2-Inventory item model GRN to consume
     * @return UnleashQuantityMaterialSetting
     */
	public function withItemModelId(?string $itemModelId): UnleashQuantityMaterialSetting {
		$this->itemModelId = $itemModelId;
		return $this;
	}
    /** @return int|null Quantity to consume */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Quantity to consume */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Quantity to consume
     * @return UnleashQuantityMaterialSetting
     */
	public function withCount(?int $count): UnleashQuantityMaterialSetting {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashQuantityMaterialSetting {
        if ($data === null) {
            return null;
        }
        return (new UnleashQuantityMaterialSetting())
            ->withMatchType(array_key_exists('matchType', $data) && $data['matchType'] !== null ? $data['matchType'] : null)
            ->withMaterialInventoryModelId(array_key_exists('materialInventoryModelId', $data) && $data['materialInventoryModelId'] !== null ? $data['materialInventoryModelId'] : null)
            ->withItemModelId(array_key_exists('itemModelId', $data) && $data['itemModelId'] !== null ? $data['itemModelId'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "matchType" => $this->getMatchType(),
            "materialInventoryModelId" => $this->getMaterialInventoryModelId(),
            "itemModelId" => $this->getItemModelId(),
            "count" => $this->getCount(),
        );
    }
}