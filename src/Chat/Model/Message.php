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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;

/**
 * メッセージ
 *
 * @author Game Server Services, Inc.
 *
 */
class Message implements IModel {
	/**
     * @var string メッセージ
	 */
	protected $messageId;

	/**
	 * メッセージを取得
	 *
	 * @return string|null メッセージ
	 */
	public function getMessageId(): ?string {
		return $this->messageId;
	}

	/**
	 * メッセージを設定
	 *
	 * @param string|null $messageId メッセージ
	 */
	public function setMessageId(?string $messageId) {
		$this->messageId = $messageId;
	}

	/**
	 * メッセージを設定
	 *
	 * @param string|null $messageId メッセージ
	 * @return Message $this
	 */
	public function withMessageId(?string $messageId): Message {
		$this->messageId = $messageId;
		return $this;
	}
	/**
     * @var string ルーム名
	 */
	protected $roomName;

	/**
	 * ルーム名を取得
	 *
	 * @return string|null ルーム名
	 */
	public function getRoomName(): ?string {
		return $this->roomName;
	}

	/**
	 * ルーム名を設定
	 *
	 * @param string|null $roomName ルーム名
	 */
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	/**
	 * ルーム名を設定
	 *
	 * @param string|null $roomName ルーム名
	 * @return Message $this
	 */
	public function withRoomName(?string $roomName): Message {
		$this->roomName = $roomName;
		return $this;
	}
	/**
     * @var string メッセージ名
	 */
	protected $name;

	/**
	 * メッセージ名を取得
	 *
	 * @return string|null メッセージ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * メッセージ名を設定
	 *
	 * @param string|null $name メッセージ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * メッセージ名を設定
	 *
	 * @param string|null $name メッセージ名
	 * @return Message $this
	 */
	public function withName(?string $name): Message {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 発言したユーザID
	 */
	protected $userId;

	/**
	 * 発言したユーザIDを取得
	 *
	 * @return string|null 発言したユーザID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * 発言したユーザIDを設定
	 *
	 * @param string|null $userId 発言したユーザID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * 発言したユーザIDを設定
	 *
	 * @param string|null $userId 発言したユーザID
	 * @return Message $this
	 */
	public function withUserId(?string $userId): Message {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int メッセージの種類を分類したい時の種類番号
	 */
	protected $category;

	/**
	 * メッセージの種類を分類したい時の種類番号を取得
	 *
	 * @return int|null メッセージの種類を分類したい時の種類番号
	 */
	public function getCategory(): ?int {
		return $this->category;
	}

	/**
	 * メッセージの種類を分類したい時の種類番号を設定
	 *
	 * @param int|null $category メッセージの種類を分類したい時の種類番号
	 */
	public function setCategory(?int $category) {
		$this->category = $category;
	}

	/**
	 * メッセージの種類を分類したい時の種類番号を設定
	 *
	 * @param int|null $category メッセージの種類を分類したい時の種類番号
	 * @return Message $this
	 */
	public function withCategory(?int $category): Message {
		$this->category = $category;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return Message $this
	 */
	public function withMetadata(?string $metadata): Message {
		$this->metadata = $metadata;
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
	 * @return Message $this
	 */
	public function withCreatedAt(?int $createdAt): Message {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "messageId" => $this->messageId,
            "roomName" => $this->roomName,
            "name" => $this->name,
            "userId" => $this->userId,
            "category" => $this->category,
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Message {
        $model = new Message();
        $model->setMessageId(isset($data["messageId"]) ? $data["messageId"] : null);
        $model->setRoomName(isset($data["roomName"]) ? $data["roomName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCategory(isset($data["category"]) ? $data["category"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}