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
 * アイテムモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemModel implements IModel {
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
	 * @return ItemModel $this
	 */
	public function withItemModelId(?string $itemModelId): ItemModel {
		$this->itemModelId = $itemModelId;
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
	 * @return ItemModel $this
	 */
	public function withName(?string $name): ItemModel {
		$this->name = $name;
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
	 * @return ItemModel $this
	 */
	public function withMetadata(?string $metadata): ItemModel {
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
	 * @return ItemModel $this
	 */
	public function withStackingLimit(?int $stackingLimit): ItemModel {
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
	 * @return ItemModel $this
	 */
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): ItemModel {
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
	 * @return ItemModel $this
	 */
	public function withSortValue(?int $sortValue): ItemModel {
		$this->sortValue = $sortValue;
		return $this;
	}

    public function toJson(): array {
        return array(
            "itemModelId" => $this->itemModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "stackingLimit" => $this->stackingLimit,
            "allowMultipleStacks" => $this->allowMultipleStacks,
            "sortValue" => $this->sortValue,
        );
    }

    public static function fromJson(array $data): ItemModel {
        $model = new ItemModel();
        $model->setItemModelId(isset($data["itemModelId"]) ? $data["itemModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setStackingLimit(isset($data["stackingLimit"]) ? $data["stackingLimit"] : null);
        $model->setAllowMultipleStacks(isset($data["allowMultipleStacks"]) ? $data["allowMultipleStacks"] : null);
        $model->setSortValue(isset($data["sortValue"]) ? $data["sortValue"] : null);
        return $model;
    }
}