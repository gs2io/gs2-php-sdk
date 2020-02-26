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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;

/**
 * 保存したフォーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Mold implements IModel {
	/**
     * @var string 保存したフォーム
	 */
	protected $moldId;

	/**
	 * 保存したフォームを取得
	 *
	 * @return string|null 保存したフォーム
	 */
	public function getMoldId(): ?string {
		return $this->moldId;
	}

	/**
	 * 保存したフォームを設定
	 *
	 * @param string|null $moldId 保存したフォーム
	 */
	public function setMoldId(?string $moldId) {
		$this->moldId = $moldId;
	}

	/**
	 * 保存したフォームを設定
	 *
	 * @param string|null $moldId 保存したフォーム
	 * @return Mold $this
	 */
	public function withMoldId(?string $moldId): Mold {
		$this->moldId = $moldId;
		return $this;
	}
	/**
     * @var string フォームの保存領域の名前
	 */
	protected $name;

	/**
	 * フォームの保存領域の名前を取得
	 *
	 * @return string|null フォームの保存領域の名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォームの保存領域の名前を設定
	 *
	 * @param string|null $name フォームの保存領域の名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォームの保存領域の名前を設定
	 *
	 * @param string|null $name フォームの保存領域の名前
	 * @return Mold $this
	 */
	public function withName(?string $name): Mold {
		$this->name = $name;
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
	 * @return Mold $this
	 */
	public function withUserId(?string $userId): Mold {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int 現在のキャパシティ
	 */
	protected $capacity;

	/**
	 * 現在のキャパシティを取得
	 *
	 * @return int|null 現在のキャパシティ
	 */
	public function getCapacity(): ?int {
		return $this->capacity;
	}

	/**
	 * 現在のキャパシティを設定
	 *
	 * @param int|null $capacity 現在のキャパシティ
	 */
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}

	/**
	 * 現在のキャパシティを設定
	 *
	 * @param int|null $capacity 現在のキャパシティ
	 * @return Mold $this
	 */
	public function withCapacity(?int $capacity): Mold {
		$this->capacity = $capacity;
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
	 * @return Mold $this
	 */
	public function withCreatedAt(?int $createdAt): Mold {
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
	 * @return Mold $this
	 */
	public function withUpdatedAt(?int $updatedAt): Mold {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "moldId" => $this->moldId,
            "name" => $this->name,
            "userId" => $this->userId,
            "capacity" => $this->capacity,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Mold {
        $model = new Mold();
        $model->setMoldId(isset($data["moldId"]) ? $data["moldId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCapacity(isset($data["capacity"]) ? $data["capacity"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}