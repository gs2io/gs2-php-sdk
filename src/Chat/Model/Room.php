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
 * ルーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Room implements IModel {
	/**
     * @var string ルーム
	 */
	protected $roomId;

	/**
	 * ルームを取得
	 *
	 * @return string|null ルーム
	 */
	public function getRoomId(): ?string {
		return $this->roomId;
	}

	/**
	 * ルームを設定
	 *
	 * @param string|null $roomId ルーム
	 */
	public function setRoomId(?string $roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームを設定
	 *
	 * @param string|null $roomId ルーム
	 * @return Room $this
	 */
	public function withRoomId(?string $roomId): Room {
		$this->roomId = $roomId;
		return $this;
	}
	/**
     * @var string ルーム名
	 */
	protected $name;

	/**
	 * ルーム名を取得
	 *
	 * @return string|null ルーム名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ルーム名を設定
	 *
	 * @param string|null $name ルーム名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ルーム名を設定
	 *
	 * @param string|null $name ルーム名
	 * @return Room $this
	 */
	public function withName(?string $name): Room {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ルームを作成したユーザID
	 */
	protected $userId;

	/**
	 * ルームを作成したユーザIDを取得
	 *
	 * @return string|null ルームを作成したユーザID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ルームを作成したユーザIDを設定
	 *
	 * @param string|null $userId ルームを作成したユーザID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ルームを作成したユーザIDを設定
	 *
	 * @param string|null $userId ルームを作成したユーザID
	 * @return Room $this
	 */
	public function withUserId(?string $userId): Room {
		$this->userId = $userId;
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
	 * @return Room $this
	 */
	public function withMetadata(?string $metadata): Room {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string メッセージを投稿するために必要となるパスワード
	 */
	protected $password;

	/**
	 * メッセージを投稿するために必要となるパスワードを取得
	 *
	 * @return string|null メッセージを投稿するために必要となるパスワード
	 */
	public function getPassword(): ?string {
		return $this->password;
	}

	/**
	 * メッセージを投稿するために必要となるパスワードを設定
	 *
	 * @param string|null $password メッセージを投稿するために必要となるパスワード
	 */
	public function setPassword(?string $password) {
		$this->password = $password;
	}

	/**
	 * メッセージを投稿するために必要となるパスワードを設定
	 *
	 * @param string|null $password メッセージを投稿するために必要となるパスワード
	 * @return Room $this
	 */
	public function withPassword(?string $password): Room {
		$this->password = $password;
		return $this;
	}
	/**
     * @var string[] ルームに参加可能なユーザIDリスト
	 */
	protected $whiteListUserIds;

	/**
	 * ルームに参加可能なユーザIDリストを取得
	 *
	 * @return string[]|null ルームに参加可能なユーザIDリスト
	 */
	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}

	/**
	 * ルームに参加可能なユーザIDリストを設定
	 *
	 * @param string[]|null $whiteListUserIds ルームに参加可能なユーザIDリスト
	 */
	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}

	/**
	 * ルームに参加可能なユーザIDリストを設定
	 *
	 * @param string[]|null $whiteListUserIds ルームに参加可能なユーザIDリスト
	 * @return Room $this
	 */
	public function withWhiteListUserIds(?array $whiteListUserIds): Room {
		$this->whiteListUserIds = $whiteListUserIds;
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
	 * @return Room $this
	 */
	public function withCreatedAt(?int $createdAt): Room {
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
	 * @return Room $this
	 */
	public function withUpdatedAt(?int $updatedAt): Room {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "roomId" => $this->roomId,
            "name" => $this->name,
            "userId" => $this->userId,
            "metadata" => $this->metadata,
            "password" => $this->password,
            "whiteListUserIds" => $this->whiteListUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Room {
        $model = new Room();
        $model->setRoomId(isset($data["roomId"]) ? $data["roomId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setPassword(isset($data["password"]) ? $data["password"] : null);
        $model->setWhiteListUserIds(isset($data["whiteListUserIds"]) ? $data["whiteListUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}