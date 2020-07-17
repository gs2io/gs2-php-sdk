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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;

/**
 * 引き継ぎ設定
 *
 * @author Game Server Services, Inc.
 *
 */
class TakeOver implements IModel {
	/**
     * @var string 引き継ぎ設定
	 */
	protected $takeOverId;

	/**
	 * 引き継ぎ設定を取得
	 *
	 * @return string|null 引き継ぎ設定
	 */
	public function getTakeOverId(): ?string {
		return $this->takeOverId;
	}

	/**
	 * 引き継ぎ設定を設定
	 *
	 * @param string|null $takeOverId 引き継ぎ設定
	 */
	public function setTakeOverId(?string $takeOverId) {
		$this->takeOverId = $takeOverId;
	}

	/**
	 * 引き継ぎ設定を設定
	 *
	 * @param string|null $takeOverId 引き継ぎ設定
	 * @return TakeOver $this
	 */
	public function withTakeOverId(?string $takeOverId): TakeOver {
		$this->takeOverId = $takeOverId;
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
	 * @return TakeOver $this
	 */
	public function withUserId(?string $userId): TakeOver {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int スロット番号
	 */
	protected $type;

	/**
	 * スロット番号を取得
	 *
	 * @return int|null スロット番号
	 */
	public function getType(): ?int {
		return $this->type;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int|null $type スロット番号
	 */
	public function setType(?int $type) {
		$this->type = $type;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int|null $type スロット番号
	 * @return TakeOver $this
	 */
	public function withType(?int $type): TakeOver {
		$this->type = $type;
		return $this;
	}
	/**
     * @var string 引き継ぎ用ユーザーID
	 */
	protected $userIdentifier;

	/**
	 * 引き継ぎ用ユーザーIDを取得
	 *
	 * @return string|null 引き継ぎ用ユーザーID
	 */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}

	/**
	 * 引き継ぎ用ユーザーIDを設定
	 *
	 * @param string|null $userIdentifier 引き継ぎ用ユーザーID
	 */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * 引き継ぎ用ユーザーIDを設定
	 *
	 * @param string|null $userIdentifier 引き継ぎ用ユーザーID
	 * @return TakeOver $this
	 */
	public function withUserIdentifier(?string $userIdentifier): TakeOver {
		$this->userIdentifier = $userIdentifier;
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
	 * @return TakeOver $this
	 */
	public function withPassword(?string $password): TakeOver {
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
	 * @return TakeOver $this
	 */
	public function withCreatedAt(?int $createdAt): TakeOver {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "takeOverId" => $this->takeOverId,
            "userId" => $this->userId,
            "type" => $this->type,
            "userIdentifier" => $this->userIdentifier,
            "password" => $this->password,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): TakeOver {
        $model = new TakeOver();
        $model->setTakeOverId(isset($data["takeOverId"]) ? $data["takeOverId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setUserIdentifier(isset($data["userIdentifier"]) ? $data["userIdentifier"] : null);
        $model->setPassword(isset($data["password"]) ? $data["password"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}