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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;

/**
 * ユーザ
 *
 * @author Game Server Services, Inc.
 *
 */
class User implements IModel {
	/**
     * @var string ユーザ
	 */
	protected $userId;

	/**
	 * ユーザを取得
	 *
	 * @return string|null ユーザ
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザを設定
	 *
	 * @param string|null $userId ユーザ
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザを設定
	 *
	 * @param string|null $userId ユーザ
	 * @return User $this
	 */
	public function withUserId(?string $userId): User {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return User $this
	 */
	public function withOwnerId(?string $ownerId): User {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ユーザー名
	 */
	protected $name;

	/**
	 * ユーザー名を取得
	 *
	 * @return string|null ユーザー名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $name ユーザー名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $name ユーザー名
	 * @return User $this
	 */
	public function withName(?string $name): User {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ユーザの説明
	 */
	protected $description;

	/**
	 * ユーザの説明を取得
	 *
	 * @return string|null ユーザの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ユーザの説明を設定
	 *
	 * @param string|null $description ユーザの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ユーザの説明を設定
	 *
	 * @param string|null $description ユーザの説明
	 * @return User $this
	 */
	public function withDescription(?string $description): User {
		$this->description = $description;
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
	 * @return User $this
	 */
	public function withCreatedAt(?int $createdAt): User {
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
	 * @return User $this
	 */
	public function withUpdatedAt(?int $updatedAt): User {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): User {
        $model = new User();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}