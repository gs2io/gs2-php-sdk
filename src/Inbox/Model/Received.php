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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;

/**
 * 受信済みグローバルメッセージ名
 *
 * @author Game Server Services, Inc.
 *
 */
class Received implements IModel {
	/**
     * @var string 受信済みグローバルメッセージ名
	 */
	protected $receivedId;

	/**
	 * 受信済みグローバルメッセージ名を取得
	 *
	 * @return string|null 受信済みグローバルメッセージ名
	 */
	public function getReceivedId(): ?string {
		return $this->receivedId;
	}

	/**
	 * 受信済みグローバルメッセージ名を設定
	 *
	 * @param string|null $receivedId 受信済みグローバルメッセージ名
	 */
	public function setReceivedId(?string $receivedId) {
		$this->receivedId = $receivedId;
	}

	/**
	 * 受信済みグローバルメッセージ名を設定
	 *
	 * @param string|null $receivedId 受信済みグローバルメッセージ名
	 * @return Received $this
	 */
	public function withReceivedId(?string $receivedId): Received {
		$this->receivedId = $receivedId;
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
	 * @return Received $this
	 */
	public function withUserId(?string $userId): Received {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] 受信したグローバルメッセージ名
	 */
	protected $receivedGlobalMessageNames;

	/**
	 * 受信したグローバルメッセージ名を取得
	 *
	 * @return string[]|null 受信したグローバルメッセージ名
	 */
	public function getReceivedGlobalMessageNames(): ?array {
		return $this->receivedGlobalMessageNames;
	}

	/**
	 * 受信したグローバルメッセージ名を設定
	 *
	 * @param string[]|null $receivedGlobalMessageNames 受信したグローバルメッセージ名
	 */
	public function setReceivedGlobalMessageNames(?array $receivedGlobalMessageNames) {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
	}

	/**
	 * 受信したグローバルメッセージ名を設定
	 *
	 * @param string[]|null $receivedGlobalMessageNames 受信したグローバルメッセージ名
	 * @return Received $this
	 */
	public function withReceivedGlobalMessageNames(?array $receivedGlobalMessageNames): Received {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
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
	 * @return Received $this
	 */
	public function withCreatedAt(?int $createdAt): Received {
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
	 * @return Received $this
	 */
	public function withUpdatedAt(?int $updatedAt): Received {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "receivedId" => $this->receivedId,
            "userId" => $this->userId,
            "receivedGlobalMessageNames" => $this->receivedGlobalMessageNames,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Received {
        $model = new Received();
        $model->setReceivedId(isset($data["receivedId"]) ? $data["receivedId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setReceivedGlobalMessageNames(isset($data["receivedGlobalMessageNames"]) ? $data["receivedGlobalMessageNames"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}