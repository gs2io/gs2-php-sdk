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

namespace Gs2\Friend\Model;

use Gs2\Core\Model\IModel;

/**
 * フレンド
 *
 * @author Game Server Services, Inc.
 *
 */
class Friend implements IModel {
	/**
     * @var string フレンド
	 */
	protected $friendId;

	/**
	 * フレンドを取得
	 *
	 * @return string|null フレンド
	 */
	public function getFriendId(): ?string {
		return $this->friendId;
	}

	/**
	 * フレンドを設定
	 *
	 * @param string|null $friendId フレンド
	 */
	public function setFriendId(?string $friendId) {
		$this->friendId = $friendId;
	}

	/**
	 * フレンドを設定
	 *
	 * @param string|null $friendId フレンド
	 * @return Friend $this
	 */
	public function withFriendId(?string $friendId): Friend {
		$this->friendId = $friendId;
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
	 * @return Friend $this
	 */
	public function withUserId(?string $userId): Friend {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] フレンドのユーザーIDリスト
	 */
	protected $targetUserIds;

	/**
	 * フレンドのユーザーIDリストを取得
	 *
	 * @return string[]|null フレンドのユーザーIDリスト
	 */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}

	/**
	 * フレンドのユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds フレンドのユーザーIDリスト
	 */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}

	/**
	 * フレンドのユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds フレンドのユーザーIDリスト
	 * @return Friend $this
	 */
	public function withTargetUserIds(?array $targetUserIds): Friend {
		$this->targetUserIds = $targetUserIds;
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
	 * @return Friend $this
	 */
	public function withCreatedAt(?int $createdAt): Friend {
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
	 * @return Friend $this
	 */
	public function withUpdatedAt(?int $updatedAt): Friend {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "friendId" => $this->friendId,
            "userId" => $this->userId,
            "targetUserIds" => $this->targetUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Friend {
        $model = new Friend();
        $model->setFriendId(isset($data["friendId"]) ? $data["friendId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserIds(isset($data["targetUserIds"]) ? $data["targetUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}