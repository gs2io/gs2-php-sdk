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
     * @var string メッセージID
	 */
	protected $name;

	/**
	 * メッセージIDを取得
	 *
	 * @return string|null メッセージID
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * メッセージIDを設定
	 *
	 * @param string|null $name メッセージID
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * メッセージIDを設定
	 *
	 * @param string|null $name メッセージID
	 * @return Message $this
	 */
	public function withName(?string $name): Message {
		$this->name = $name;
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
	 * @return Message $this
	 */
	public function withUserId(?string $userId): Message {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string メッセージの内容に相当するメタデータ
	 */
	protected $metadata;

	/**
	 * メッセージの内容に相当するメタデータを取得
	 *
	 * @return string|null メッセージの内容に相当するメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メッセージの内容に相当するメタデータを設定
	 *
	 * @param string|null $metadata メッセージの内容に相当するメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メッセージの内容に相当するメタデータを設定
	 *
	 * @param string|null $metadata メッセージの内容に相当するメタデータ
	 * @return Message $this
	 */
	public function withMetadata(?string $metadata): Message {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var bool 既読状態
	 */
	protected $isRead;

	/**
	 * 既読状態を取得
	 *
	 * @return bool|null 既読状態
	 */
	public function getIsRead(): ?bool {
		return $this->isRead;
	}

	/**
	 * 既読状態を設定
	 *
	 * @param bool|null $isRead 既読状態
	 */
	public function setIsRead(?bool $isRead) {
		$this->isRead = $isRead;
	}

	/**
	 * 既読状態を設定
	 *
	 * @param bool|null $isRead 既読状態
	 * @return Message $this
	 */
	public function withIsRead(?bool $isRead): Message {
		$this->isRead = $isRead;
		return $this;
	}
	/**
     * @var AcquireAction[] 開封時に実行する入手アクション
	 */
	protected $readAcquireActions;

	/**
	 * 開封時に実行する入手アクションを取得
	 *
	 * @return AcquireAction[]|null 開封時に実行する入手アクション
	 */
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}

	/**
	 * 開封時に実行する入手アクションを設定
	 *
	 * @param AcquireAction[]|null $readAcquireActions 開封時に実行する入手アクション
	 */
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}

	/**
	 * 開封時に実行する入手アクションを設定
	 *
	 * @param AcquireAction[]|null $readAcquireActions 開封時に実行する入手アクション
	 * @return Message $this
	 */
	public function withReadAcquireActions(?array $readAcquireActions): Message {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $receivedAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $receivedAt 作成日時
	 */
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $receivedAt 作成日時
	 * @return Message $this
	 */
	public function withReceivedAt(?int $receivedAt): Message {
		$this->receivedAt = $receivedAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $readAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getReadAt(): ?int {
		return $this->readAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $readAt 最終更新日時
	 */
	public function setReadAt(?int $readAt) {
		$this->readAt = $readAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $readAt 最終更新日時
	 * @return Message $this
	 */
	public function withReadAt(?int $readAt): Message {
		$this->readAt = $readAt;
		return $this;
	}
	/**
     * @var int メッセージの有効期限
	 */
	protected $expiresAt;

	/**
	 * メッセージの有効期限を取得
	 *
	 * @return int|null メッセージの有効期限
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * メッセージの有効期限を設定
	 *
	 * @param int|null $expiresAt メッセージの有効期限
	 */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	/**
	 * メッセージの有効期限を設定
	 *
	 * @param int|null $expiresAt メッセージの有効期限
	 * @return Message $this
	 */
	public function withExpiresAt(?int $expiresAt): Message {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "messageId" => $this->messageId,
            "name" => $this->name,
            "userId" => $this->userId,
            "metadata" => $this->metadata,
            "isRead" => $this->isRead,
            "readAcquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->readAcquireActions == null ? [] : $this->readAcquireActions
            ),
            "receivedAt" => $this->receivedAt,
            "readAt" => $this->readAt,
            "expiresAt" => $this->expiresAt,
        );
    }

    public static function fromJson(array $data): Message {
        $model = new Message();
        $model->setMessageId(isset($data["messageId"]) ? $data["messageId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setIsRead(isset($data["isRead"]) ? $data["isRead"] : null);
        $model->setReadAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["readAcquireActions"]) ? $data["readAcquireActions"] : []
            )
        );
        $model->setReceivedAt(isset($data["receivedAt"]) ? $data["receivedAt"] : null);
        $model->setReadAt(isset($data["readAt"]) ? $data["readAt"] : null);
        $model->setExpiresAt(isset($data["expiresAt"]) ? $data["expiresAt"] : null);
        return $model;
    }
}