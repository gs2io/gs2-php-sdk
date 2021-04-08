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
 * パスワード
 *
 * @author Game Server Services, Inc.
 *
 */
class Password implements IModel {
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
	 * @return Password $this
	 */
	public function withOwnerId(?string $ownerId): Password {
		$this->ownerId = $ownerId;
		return $this;
	}
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
	 * @return Password $this
	 */
	public function withUserId(?string $userId): Password {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ユーザー名
	 */
	protected $userName;

	/**
	 * ユーザー名を取得
	 *
	 * @return string|null ユーザー名
	 */
	public function getUserName(): ?string {
		return $this->userName;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $userName ユーザー名
	 */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $userName ユーザー名
	 * @return Password $this
	 */
	public function withUserName(?string $userName): Password {
		$this->userName = $userName;
		return $this;
	}
	/**
     * @var string パスワード
	 */
	protected $password;

	/**
	 * パスワードを取得
	 *
	 * @return string|null パスワード
	 */
	public function getPassword(): ?string {
		return $this->password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 */
	public function setPassword(?string $password) {
		$this->password = $password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 * @return Password $this
	 */
	public function withPassword(?string $password): Password {
		$this->password = $password;
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
	 * @return Password $this
	 */
	public function withCreatedAt(?int $createdAt): Password {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ownerId" => $this->ownerId,
            "userId" => $this->userId,
            "userName" => $this->userName,
            "password" => $this->password,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Password {
        $model = new Password();
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setUserName(isset($data["userName"]) ? $data["userName"] : null);
        $model->setPassword(isset($data["password"]) ? $data["password"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}