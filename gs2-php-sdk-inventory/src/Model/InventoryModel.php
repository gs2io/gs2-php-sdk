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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;

/**
 * インベントリモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class InventoryModel implements IModel {
	/**
     * @var string インベントリモデルマスター
	 */
	protected $inventoryModelId;

	/**
	 * インベントリモデルマスターを取得
	 *
	 * @return string|null インベントリモデルマスター
	 */
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}

	/**
	 * インベントリモデルマスターを設定
	 *
	 * @param string|null $inventoryModelId インベントリモデルマスター
	 */
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}

	/**
	 * インベントリモデルマスターを設定
	 *
	 * @param string|null $inventoryModelId インベントリモデルマスター
	 * @return InventoryModel $this
	 */
	public function withInventoryModelId(?string $inventoryModelId): InventoryModel {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
	/**
     * @var string インベントリの種類名
	 */
	protected $name;

	/**
	 * インベントリの種類名を取得
	 *
	 * @return string|null インベントリの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * インベントリの種類名を設定
	 *
	 * @param string|null $name インベントリの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * インベントリの種類名を設定
	 *
	 * @param string|null $name インベントリの種類名
	 * @return InventoryModel $this
	 */
	public function withName(?string $name): InventoryModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string インベントリの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * インベントリの種類のメタデータを取得
	 *
	 * @return string|null インベントリの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * インベントリの種類のメタデータを設定
	 *
	 * @param string|null $metadata インベントリの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * インベントリの種類のメタデータを設定
	 *
	 * @param string|null $metadata インベントリの種類のメタデータ
	 * @return InventoryModel $this
	 */
	public function withMetadata(?string $metadata): InventoryModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int インベントリの初期サイズ
	 */
	protected $initialCapacity;

	/**
	 * インベントリの初期サイズを取得
	 *
	 * @return int|null インベントリの初期サイズ
	 */
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	/**
	 * インベントリの初期サイズを設定
	 *
	 * @param int|null $initialCapacity インベントリの初期サイズ
	 */
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	/**
	 * インベントリの初期サイズを設定
	 *
	 * @param int|null $initialCapacity インベントリの初期サイズ
	 * @return InventoryModel $this
	 */
	public function withInitialCapacity(?int $initialCapacity): InventoryModel {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
	/**
     * @var int インベントリの最大サイズ
	 */
	protected $maxCapacity;

	/**
	 * インベントリの最大サイズを取得
	 *
	 * @return int|null インベントリの最大サイズ
	 */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	/**
	 * インベントリの最大サイズを設定
	 *
	 * @param int|null $maxCapacity インベントリの最大サイズ
	 */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	/**
	 * インベントリの最大サイズを設定
	 *
	 * @param int|null $maxCapacity インベントリの最大サイズ
	 * @return InventoryModel $this
	 */
	public function withMaxCapacity(?int $maxCapacity): InventoryModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	/**
     * @var ItemModel[] インベントリに格納可能なアイテムモデル一覧
	 */
	protected $itemModels;

	/**
	 * インベントリに格納可能なアイテムモデル一覧を取得
	 *
	 * @return ItemModel[]|null インベントリに格納可能なアイテムモデル一覧
	 */
	public function getItemModels(): ?array {
		return $this->itemModels;
	}

	/**
	 * インベントリに格納可能なアイテムモデル一覧を設定
	 *
	 * @param ItemModel[]|null $itemModels インベントリに格納可能なアイテムモデル一覧
	 */
	public function setItemModels(?array $itemModels) {
		$this->itemModels = $itemModels;
	}

	/**
	 * インベントリに格納可能なアイテムモデル一覧を設定
	 *
	 * @param ItemModel[]|null $itemModels インベントリに格納可能なアイテムモデル一覧
	 * @return InventoryModel $this
	 */
	public function withItemModels(?array $itemModels): InventoryModel {
		$this->itemModels = $itemModels;
		return $this;
	}

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->inventoryModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "initialCapacity" => $this->initialCapacity,
            "maxCapacity" => $this->maxCapacity,
            "itemModels" => array_map(
                function (ItemModel $v) {
                    return $v->toJson();
                },
                $this->itemModels == null ? [] : $this->itemModels
            ),
        );
    }

    public static function fromJson(array $data): InventoryModel {
        $model = new InventoryModel();
        $model->setInventoryModelId(isset($data["inventoryModelId"]) ? $data["inventoryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setInitialCapacity(isset($data["initialCapacity"]) ? $data["initialCapacity"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        $model->setItemModels(array_map(
                function ($v) {
                    return ItemModel::fromJson($v);
                },
                isset($data["itemModels"]) ? $data["itemModels"] : []
            )
        );
        return $model;
    }
}