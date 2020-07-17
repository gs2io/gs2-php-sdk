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
 * フレンドリクエストの受信ボックス
 *
 * @author Game Server Services, Inc.
 *
 */
class Inbox implements IModel {
	/**
     * @var string フレンドリクエストの受信ボックス
	 */
	protected $inboxId;

	/**
	 * フレンドリクエストの受信ボックスを取得
	 *
	 * @return string|null フレンドリクエストの受信ボックス
	 */
	public function getInboxId(): ?string {
		return $this->inboxId;
	}

	/**
	 * フレンドリクエストの受信ボックスを設定
	 *
	 * @param string|null $inboxId フレンドリクエストの受信ボックス
	 */
	public function setInboxId(?string $inboxId) {
		$this->inboxId = $inboxId;
	}

	/**
	 * フレンドリクエストの受信ボックスを設定
	 *
	 * @param string|null $inboxId フレンドリクエストの受信ボックス
	 * @return Inbox $this
	 */
	public function withInboxId(?string $inboxId): Inbox {
		$this->inboxId = $inboxId;
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
	 * @return Inbox $this
	 */
	public function withUserId(?string $userId): Inbox {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] フレンドリクエストを送ってきたユーザーIDリスト
	 */
	protected $fromUserIds;

	/**
	 * フレンドリクエストを送ってきたユーザーIDリストを取得
	 *
	 * @return string[]|null フレンドリクエストを送ってきたユーザーIDリスト
	 */
	public function getFromUserIds(): ?array {
		return $this->fromUserIds;
	}

	/**
	 * フレンドリクエストを送ってきたユーザーIDリストを設定
	 *
	 * @param string[]|null $fromUserIds フレンドリクエストを送ってきたユーザーIDリスト
	 */
	public function setFromUserIds(?array $fromUserIds) {
		$this->fromUserIds = $fromUserIds;
	}

	/**
	 * フレンドリクエストを送ってきたユーザーIDリストを設定
	 *
	 * @param string[]|null $fromUserIds フレンドリクエストを送ってきたユーザーIDリスト
	 * @return Inbox $this
	 */
	public function withFromUserIds(?array $fromUserIds): Inbox {
		$this->fromUserIds = $fromUserIds;
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
	 * @return Inbox $this
	 */
	public function withCreatedAt(?int $createdAt): Inbox {
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
	 * @return Inbox $this
	 */
	public function withUpdatedAt(?int $updatedAt): Inbox {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "inboxId" => $this->inboxId,
            "userId" => $this->userId,
            "fromUserIds" => $this->fromUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Inbox {
        $model = new Inbox();
        $model->setInboxId(isset($data["inboxId"]) ? $data["inboxId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setFromUserIds(isset($data["fromUserIds"]) ? $data["fromUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}