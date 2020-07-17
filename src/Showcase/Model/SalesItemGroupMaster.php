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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;

/**
 * 商品グループマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class SalesItemGroupMaster implements IModel {
	/**
     * @var string 商品グループマスター
	 */
	protected $salesItemGroupId;

	/**
	 * 商品グループマスターを取得
	 *
	 * @return string|null 商品グループマスター
	 */
	public function getSalesItemGroupId(): ?string {
		return $this->salesItemGroupId;
	}

	/**
	 * 商品グループマスターを設定
	 *
	 * @param string|null $salesItemGroupId 商品グループマスター
	 */
	public function setSalesItemGroupId(?string $salesItemGroupId) {
		$this->salesItemGroupId = $salesItemGroupId;
	}

	/**
	 * 商品グループマスターを設定
	 *
	 * @param string|null $salesItemGroupId 商品グループマスター
	 * @return SalesItemGroupMaster $this
	 */
	public function withSalesItemGroupId(?string $salesItemGroupId): SalesItemGroupMaster {
		$this->salesItemGroupId = $salesItemGroupId;
		return $this;
	}
	/**
     * @var string 商品名
	 */
	protected $name;

	/**
	 * 商品名を取得
	 *
	 * @return string|null 商品名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string|null $name 商品名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string|null $name 商品名
	 * @return SalesItemGroupMaster $this
	 */
	public function withName(?string $name): SalesItemGroupMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 商品グループマスターの説明
	 */
	protected $description;

	/**
	 * 商品グループマスターの説明を取得
	 *
	 * @return string|null 商品グループマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 商品グループマスターの説明を設定
	 *
	 * @param string|null $description 商品グループマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 商品グループマスターの説明を設定
	 *
	 * @param string|null $description 商品グループマスターの説明
	 * @return SalesItemGroupMaster $this
	 */
	public function withDescription(?string $description): SalesItemGroupMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 商品のメタデータ
	 */
	protected $metadata;

	/**
	 * 商品のメタデータを取得
	 *
	 * @return string|null 商品のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 商品のメタデータを設定
	 *
	 * @param string|null $metadata 商品のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 商品のメタデータを設定
	 *
	 * @param string|null $metadata 商品のメタデータ
	 * @return SalesItemGroupMaster $this
	 */
	public function withMetadata(?string $metadata): SalesItemGroupMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string[] 商品グループに含める商品リスト
	 */
	protected $salesItemNames;

	/**
	 * 商品グループに含める商品リストを取得
	 *
	 * @return string[]|null 商品グループに含める商品リスト
	 */
	public function getSalesItemNames(): ?array {
		return $this->salesItemNames;
	}

	/**
	 * 商品グループに含める商品リストを設定
	 *
	 * @param string[]|null $salesItemNames 商品グループに含める商品リスト
	 */
	public function setSalesItemNames(?array $salesItemNames) {
		$this->salesItemNames = $salesItemNames;
	}

	/**
	 * 商品グループに含める商品リストを設定
	 *
	 * @param string[]|null $salesItemNames 商品グループに含める商品リスト
	 * @return SalesItemGroupMaster $this
	 */
	public function withSalesItemNames(?array $salesItemNames): SalesItemGroupMaster {
		$this->salesItemNames = $salesItemNames;
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
	 * @return SalesItemGroupMaster $this
	 */
	public function withCreatedAt(?int $createdAt): SalesItemGroupMaster {
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
	 * @return SalesItemGroupMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): SalesItemGroupMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "salesItemGroupId" => $this->salesItemGroupId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "salesItemNames" => $this->salesItemNames,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): SalesItemGroupMaster {
        $model = new SalesItemGroupMaster();
        $model->setSalesItemGroupId(isset($data["salesItemGroupId"]) ? $data["salesItemGroupId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setSalesItemNames(isset($data["salesItemNames"]) ? $data["salesItemNames"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}