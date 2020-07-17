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
 * アイテムモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemModelMaster implements IModel {
	/**
     * @var string アイテムモデルマスター
	 */
	protected $itemModelId;

	/**
	 * アイテムモデルマスターを取得
	 *
	 * @return string|null アイテムモデルマスター
	 */
	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}

	/**
	 * アイテムモデルマスターを設定
	 *
	 * @param string|null $itemModelId アイテムモデルマスター
	 */
	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}

	/**
	 * アイテムモデルマスターを設定
	 *
	 * @param string|null $itemModelId アイテムモデルマスター
	 * @return ItemModelMaster $this
	 */
	public function withItemModelId(?string $itemModelId): ItemModelMaster {
		$this->itemModelId = $itemModelId;
		return $this;
	}
	/**
     * @var string アイテムの種類名
	 */
	protected $inventoryName;

	/**
	 * アイテムの種類名を取得
	 *
	 * @return string|null アイテムの種類名
	 */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	/**
	 * アイテムの種類名を設定
	 *
	 * @param string|null $inventoryName アイテムの種類名
	 */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	/**
	 * アイテムの種類名を設定
	 *
	 * @param string|null $inventoryName アイテムの種類名
	 * @return ItemModelMaster $this
	 */
	public function withInventoryName(?string $inventoryName): ItemModelMaster {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	/**
     * @var string アイテムモデルの種類名
	 */
	protected $name;

	/**
	 * アイテムモデルの種類名を取得
	 *
	 * @return string|null アイテムモデルの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * アイテムモデルの種類名を設定
	 *
	 * @param string|null $name アイテムモデルの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * アイテムモデルの種類名を設定
	 *
	 * @param string|null $name アイテムモデルの種類名
	 * @return ItemModelMaster $this
	 */
	public function withName(?string $name): ItemModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string アイテムモデルマスターの説明
	 */
	protected $description;

	/**
	 * アイテムモデルマスターの説明を取得
	 *
	 * @return string|null アイテムモデルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * アイテムモデルマスターの説明を設定
	 *
	 * @param string|null $description アイテムモデルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * アイテムモデルマスターの説明を設定
	 *
	 * @param string|null $description アイテムモデルマスターの説明
	 * @return ItemModelMaster $this
	 */
	public function withDescription(?string $description): ItemModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string アイテムモデルの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * アイテムモデルの種類のメタデータを取得
	 *
	 * @return string|null アイテムモデルの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * アイテムモデルの種類のメタデータを設定
	 *
	 * @param string|null $metadata アイテムモデルの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * アイテムモデルの種類のメタデータを設定
	 *
	 * @param string|null $metadata アイテムモデルの種類のメタデータ
	 * @return ItemModelMaster $this
	 */
	public function withMetadata(?string $metadata): ItemModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int スタック可能な最大数量
	 */
	protected $stackingLimit;

	/**
	 * スタック可能な最大数量を取得
	 *
	 * @return int|null スタック可能な最大数量
	 */
	public function getStackingLimit(): ?int {
		return $this->stackingLimit;
	}

	/**
	 * スタック可能な最大数量を設定
	 *
	 * @param int|null $stackingLimit スタック可能な最大数量
	 */
	public function setStackingLimit(?int $stackingLimit) {
		$this->stackingLimit = $stackingLimit;
	}

	/**
	 * スタック可能な最大数量を設定
	 *
	 * @param int|null $stackingLimit スタック可能な最大数量
	 * @return ItemModelMaster $this
	 */
	public function withStackingLimit(?int $stackingLimit): ItemModelMaster {
		$this->stackingLimit = $stackingLimit;
		return $this;
	}
	/**
     * @var bool スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか
	 */
	protected $allowMultipleStacks;

	/**
	 * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを取得
	 *
	 * @return bool|null スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか
	 */
	public function getAllowMultipleStacks(): ?bool {
		return $this->allowMultipleStacks;
	}

	/**
	 * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
	 *
	 * @param bool|null $allowMultipleStacks スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか
	 */
	public function setAllowMultipleStacks(?bool $allowMultipleStacks) {
		$this->allowMultipleStacks = $allowMultipleStacks;
	}

	/**
	 * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
	 *
	 * @param bool|null $allowMultipleStacks スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか
	 * @return ItemModelMaster $this
	 */
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): ItemModelMaster {
		$this->allowMultipleStacks = $allowMultipleStacks;
		return $this;
	}
	/**
     * @var int 表示順番
	 */
	protected $sortValue;

	/**
	 * 表示順番を取得
	 *
	 * @return int|null 表示順番
	 */
	public function getSortValue(): ?int {
		return $this->sortValue;
	}

	/**
	 * 表示順番を設定
	 *
	 * @param int|null $sortValue 表示順番
	 */
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}

	/**
	 * 表示順番を設定
	 *
	 * @param int|null $sortValue 表示順番
	 * @return ItemModelMaster $this
	 */
	public function withSortValue(?int $sortValue): ItemModelMaster {
		$this->sortValue = $sortValue;
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
	 * @return ItemModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): ItemModelMaster {
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
	 * @return ItemModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): ItemModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "itemModelId" => $this->itemModelId,
            "inventoryName" => $this->inventoryName,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "stackingLimit" => $this->stackingLimit,
            "allowMultipleStacks" => $this->allowMultipleStacks,
            "sortValue" => $this->sortValue,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ItemModelMaster {
        $model = new ItemModelMaster();
        $model->setItemModelId(isset($data["itemModelId"]) ? $data["itemModelId"] : null);
        $model->setInventoryName(isset($data["inventoryName"]) ? $data["inventoryName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setStackingLimit(isset($data["stackingLimit"]) ? $data["stackingLimit"] : null);
        $model->setAllowMultipleStacks(isset($data["allowMultipleStacks"]) ? $data["allowMultipleStacks"] : null);
        $model->setSortValue(isset($data["sortValue"]) ? $data["sortValue"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}