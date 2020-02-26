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
 * ブラックリスト
 *
 * @author Game Server Services, Inc.
 *
 */
class BlackList implements IModel {
	/**
     * @var string ブラックリスト
	 */
	protected $blackListId;

	/**
	 * ブラックリストを取得
	 *
	 * @return string|null ブラックリスト
	 */
	public function getBlackListId(): ?string {
		return $this->blackListId;
	}

	/**
	 * ブラックリストを設定
	 *
	 * @param string|null $blackListId ブラックリスト
	 */
	public function setBlackListId(?string $blackListId) {
		$this->blackListId = $blackListId;
	}

	/**
	 * ブラックリストを設定
	 *
	 * @param string|null $blackListId ブラックリスト
	 * @return BlackList $this
	 */
	public function withBlackListId(?string $blackListId): BlackList {
		$this->blackListId = $blackListId;
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
	 * @return BlackList $this
	 */
	public function withUserId(?string $userId): BlackList {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] ブラックリストのユーザーIDリスト
	 */
	protected $targetUserIds;

	/**
	 * ブラックリストのユーザーIDリストを取得
	 *
	 * @return string[]|null ブラックリストのユーザーIDリスト
	 */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}

	/**
	 * ブラックリストのユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds ブラックリストのユーザーIDリスト
	 */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}

	/**
	 * ブラックリストのユーザーIDリストを設定
	 *
	 * @param string[]|null $targetUserIds ブラックリストのユーザーIDリスト
	 * @return BlackList $this
	 */
	public function withTargetUserIds(?array $targetUserIds): BlackList {
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
	 * @return BlackList $this
	 */
	public function withCreatedAt(?int $createdAt): BlackList {
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
	 * @return BlackList $this
	 */
	public function withUpdatedAt(?int $updatedAt): BlackList {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "blackListId" => $this->blackListId,
            "userId" => $this->userId,
            "targetUserIds" => $this->targetUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): BlackList {
        $model = new BlackList();
        $model->setBlackListId(isset($data["blackListId"]) ? $data["blackListId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserIds(isset($data["targetUserIds"]) ? $data["targetUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}