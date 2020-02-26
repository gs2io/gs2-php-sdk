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
 * フォロー
 *
 * @author Game Server Services, Inc.
 *
 */
class Follow implements IModel {
	/**
     * @var string フォロー
	 */
	protected $followId;

	/**
	 * フォローを取得
	 *
	 * @return string|null フォロー
	 */
	public function getFollowId(): ?string {
		return $this->followId;
	}

	/**
	 * フォローを設定
	 *
	 * @param string|null $followId フォロー
	 */
	public function setFollowId(?string $followId) {
		$this->followId = $followId;
	}

	/**
	 * フォローを設定
	 *
	 * @param string|null $followId フォロー
	 * @return Follow $this
	 */
	public function withFollowId(?string $followId): Follow {
		$this->followId = $followId;
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
	 * @return Follow $this
	 */
	public function withUserId(?string $userId): Follow {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] フォローしているユーザーIDリスト
	 */
	protected $targetUserIds;

	/**
	 * フォローしているユーザーIDリストを取得
	 *
	 * @return string[]|null フォローしているユーザーIDリスト
	 */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}

	/**
	 * フォローしているユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds フォローしているユーザーIDリスト
	 */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}

	/**
	 * フォローしているユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds フォローしているユーザーIDリスト
	 * @return Follow $this
	 */
	public function withTargetUserIds(?array $targetUserIds): Follow {
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
	 * @return Follow $this
	 */
	public function withCreatedAt(?int $createdAt): Follow {
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
	 * @return Follow $this
	 */
	public function withUpdatedAt(?int $updatedAt): Follow {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "followId" => $this->followId,
            "userId" => $this->userId,
            "targetUserIds" => $this->targetUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Follow {
        $model = new Follow();
        $model->setFollowId(isset($data["followId"]) ? $data["followId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserIds(isset($data["targetUserIds"]) ? $data["targetUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}