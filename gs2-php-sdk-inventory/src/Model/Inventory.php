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
 * インベントリ
 *
 * @author Game Server Services, Inc.
 *
 */
class Inventory implements IModel {
	/**
     * @var string インベントリ
	 */
	protected $inventoryId;

	/**
	 * インベントリを取得
	 *
	 * @return string|null インベントリ
	 */
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}

	/**
	 * インベントリを設定
	 *
	 * @param string|null $inventoryId インベントリ
	 */
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}

	/**
	 * インベントリを設定
	 *
	 * @param string|null $inventoryId インベントリ
	 * @return Inventory $this
	 */
	public function withInventoryId(?string $inventoryId): Inventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
	/**
     * @var string インベントリモデル名
	 */
	protected $inventoryName;

	/**
	 * インベントリモデル名を取得
	 *
	 * @return string|null インベントリモデル名
	 */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	/**
	 * インベントリモデル名を設定
	 *
	 * @param string|null $inventoryName インベントリモデル名
	 */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	/**
	 * インベントリモデル名を設定
	 *
	 * @param string|null $inventoryName インベントリモデル名
	 * @return Inventory $this
	 */
	public function withInventoryName(?string $inventoryName): Inventory {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Inventory $this
	 */
	public function withUserId(?string $userId): Inventory {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int 現在のインベントリのキャパシティ使用量
	 */
	protected $currentInventoryCapacityUsage;

	/**
	 * 現在のインベントリのキャパシティ使用量を取得
	 *
	 * @return int|null 現在のインベントリのキャパシティ使用量
	 */
	public function getCurrentInventoryCapacityUsage(): ?int {
		return $this->currentInventoryCapacityUsage;
	}

	/**
	 * 現在のインベントリのキャパシティ使用量を設定
	 *
	 * @param int|null $currentInventoryCapacityUsage 現在のインベントリのキャパシティ使用量
	 */
	public function setCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage) {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
	}

	/**
	 * 現在のインベントリのキャパシティ使用量を設定
	 *
	 * @param int|null $currentInventoryCapacityUsage 現在のインベントリのキャパシティ使用量
	 * @return Inventory $this
	 */
	public function withCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage): Inventory {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
		return $this;
	}
	/**
     * @var int 現在のインベントリの最大キャパシティ
	 */
	protected $currentInventoryMaxCapacity;

	/**
	 * 現在のインベントリの最大キャパシティを取得
	 *
	 * @return int|null 現在のインベントリの最大キャパシティ
	 */
	public function getCurrentInventoryMaxCapacity(): ?int {
		return $this->currentInventoryMaxCapacity;
	}

	/**
	 * 現在のインベントリの最大キャパシティを設定
	 *
	 * @param int|null $currentInventoryMaxCapacity 現在のインベントリの最大キャパシティ
	 */
	public function setCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity) {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
	}

	/**
	 * 現在のインベントリの最大キャパシティを設定
	 *
	 * @param int|null $currentInventoryMaxCapacity 現在のインベントリの最大キャパシティ
	 * @return Inventory $this
	 */
	public function withCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity): Inventory {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
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
	 * @return Inventory $this
	 */
	public function withCreatedAt(?int $createdAt): Inventory {
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
	 * @return Inventory $this
	 */
	public function withUpdatedAt(?int $updatedAt): Inventory {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "inventoryId" => $this->inventoryId,
            "inventoryName" => $this->inventoryName,
            "userId" => $this->userId,
            "currentInventoryCapacityUsage" => $this->currentInventoryCapacityUsage,
            "currentInventoryMaxCapacity" => $this->currentInventoryMaxCapacity,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Inventory {
        $model = new Inventory();
        $model->setInventoryId(isset($data["inventoryId"]) ? $data["inventoryId"] : null);
        $model->setInventoryName(isset($data["inventoryName"]) ? $data["inventoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCurrentInventoryCapacityUsage(isset($data["currentInventoryCapacityUsage"]) ? $data["currentInventoryCapacityUsage"] : null);
        $model->setCurrentInventoryMaxCapacity(isset($data["currentInventoryMaxCapacity"]) ? $data["currentInventoryMaxCapacity"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}