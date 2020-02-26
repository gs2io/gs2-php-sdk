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

namespace Gs2\Realtime\Model;

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
     * @var string IPアドレス
	 */
	protected $ipAddress;

	/**
	 * IPアドレスを取得
	 *
	 * @return string|null IPアドレス
	 */
	public function getIpAddress(): ?string {
		return $this->ipAddress;
	}

	/**
	 * IPアドレスを設定
	 *
	 * @param string|null $ipAddress IPアドレス
	 */
	public function setIpAddress(?string $ipAddress) {
		$this->ipAddress = $ipAddress;
	}

	/**
	 * IPアドレスを設定
	 *
	 * @param string|null $ipAddress IPアドレス
	 * @return Room $this
	 */
	public function withIpAddress(?string $ipAddress): Room {
		$this->ipAddress = $ipAddress;
		return $this;
	}
	/**
     * @var int 待受ポート
	 */
	protected $port;

	/**
	 * 待受ポートを取得
	 *
	 * @return int|null 待受ポート
	 */
	public function getPort(): ?int {
		return $this->port;
	}

	/**
	 * 待受ポートを設定
	 *
	 * @param int|null $port 待受ポート
	 */
	public function setPort(?int $port) {
		$this->port = $port;
	}

	/**
	 * 待受ポートを設定
	 *
	 * @param int|null $port 待受ポート
	 * @return Room $this
	 */
	public function withPort(?int $port): Room {
		$this->port = $port;
		return $this;
	}
	/**
     * @var string 暗号鍵
	 */
	protected $encryptionKey;

	/**
	 * 暗号鍵を取得
	 *
	 * @return string|null 暗号鍵
	 */
	public function getEncryptionKey(): ?string {
		return $this->encryptionKey;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $encryptionKey 暗号鍵
	 */
	public function setEncryptionKey(?string $encryptionKey) {
		$this->encryptionKey = $encryptionKey;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $encryptionKey 暗号鍵
	 * @return Room $this
	 */
	public function withEncryptionKey(?string $encryptionKey): Room {
		$this->encryptionKey = $encryptionKey;
		return $this;
	}
	/**
     * @var string[] ルームの作成が終わったときに通知を受けるユーザIDリスト
	 */
	protected $notificationUserIds;

	/**
	 * ルームの作成が終わったときに通知を受けるユーザIDリストを取得
	 *
	 * @return string[]|null ルームの作成が終わったときに通知を受けるユーザIDリスト
	 */
	public function getNotificationUserIds(): ?array {
		return $this->notificationUserIds;
	}

	/**
	 * ルームの作成が終わったときに通知を受けるユーザIDリストを設定
	 *
	 * @param string[]|null $notificationUserIds ルームの作成が終わったときに通知を受けるユーザIDリスト
	 */
	public function setNotificationUserIds(?array $notificationUserIds) {
		$this->notificationUserIds = $notificationUserIds;
	}

	/**
	 * ルームの作成が終わったときに通知を受けるユーザIDリストを設定
	 *
	 * @param string[]|null $notificationUserIds ルームの作成が終わったときに通知を受けるユーザIDリスト
	 * @return Room $this
	 */
	public function withNotificationUserIds(?array $notificationUserIds): Room {
		$this->notificationUserIds = $notificationUserIds;
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
            "ipAddress" => $this->ipAddress,
            "port" => $this->port,
            "encryptionKey" => $this->encryptionKey,
            "notificationUserIds" => $this->notificationUserIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Room {
        $model = new Room();
        $model->setRoomId(isset($data["roomId"]) ? $data["roomId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setIpAddress(isset($data["ipAddress"]) ? $data["ipAddress"] : null);
        $model->setPort(isset($data["port"]) ? $data["port"] : null);
        $model->setEncryptionKey(isset($data["encryptionKey"]) ? $data["encryptionKey"] : null);
        $model->setNotificationUserIds(isset($data["notificationUserIds"]) ? $data["notificationUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}