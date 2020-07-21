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
 * インベントリモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class InventoryModelMaster implements IModel {
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
	 * @return InventoryModelMaster $this
	 */
	public function withInventoryModelId(?string $inventoryModelId): InventoryModelMaster {
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
	 * @return InventoryModelMaster $this
	 */
	public function withName(?string $name): InventoryModelMaster {
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
	 * @return InventoryModelMaster $this
	 */
	public function withMetadata(?string $metadata): InventoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string インベントリモデルマスターの説明
	 */
	protected $description;

	/**
	 * インベントリモデルマスターの説明を取得
	 *
	 * @return string|null インベントリモデルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * インベントリモデルマスターの説明を設定
	 *
	 * @param string|null $description インベントリモデルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * インベントリモデルマスターの説明を設定
	 *
	 * @param string|null $description インベントリモデルマスターの説明
	 * @return InventoryModelMaster $this
	 */
	public function withDescription(?string $description): InventoryModelMaster {
		$this->description = $description;
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
	 * @return InventoryModelMaster $this
	 */
	public function withInitialCapacity(?int $initialCapacity): InventoryModelMaster {
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
	 * @return InventoryModelMaster $this
	 */
	public function withMaxCapacity(?int $maxCapacity): InventoryModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	/**
     * @var bool 参照元が登録されているアイテムセットは削除できなくする
	 */
	protected $protectReferencedItem;

	/**
	 * 参照元が登録されているアイテムセットは削除できなくするを取得
	 *
	 * @return bool|null 参照元が登録されているアイテムセットは削除できなくする
	 */
	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}

	/**
	 * 参照元が登録されているアイテムセットは削除できなくするを設定
	 *
	 * @param bool|null $protectReferencedItem 参照元が登録されているアイテムセットは削除できなくする
	 */
	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}

	/**
	 * 参照元が登録されているアイテムセットは削除できなくするを設定
	 *
	 * @param bool|null $protectReferencedItem 参照元が登録されているアイテムセットは削除できなくする
	 * @return InventoryModelMaster $this
	 */
	public function withProtectReferencedItem(?bool $protectReferencedItem): InventoryModelMaster {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return InventoryModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): InventoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return InventoryModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): InventoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->inventoryModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "initialCapacity" => $this->initialCapacity,
            "maxCapacity" => $this->maxCapacity,
            "protectReferencedItem" => $this->protectReferencedItem,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): InventoryModelMaster {
        $model = new InventoryModelMaster();
        $model->setInventoryModelId(isset($data["inventoryModelId"]) ? $data["inventoryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setInitialCapacity(isset($data["initialCapacity"]) ? $data["initialCapacity"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        $model->setProtectReferencedItem(isset($data["protectReferencedItem"]) ? $data["protectReferencedItem"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}