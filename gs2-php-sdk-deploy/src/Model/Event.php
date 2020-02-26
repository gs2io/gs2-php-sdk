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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;

/**
 * 発生したイベント
 *
 * @author Game Server Services, Inc.
 *
 */
class Event implements IModel {
	/**
     * @var string 発生したイベント
	 */
	protected $eventId;

	/**
	 * 発生したイベントを取得
	 *
	 * @return string|null 発生したイベント
	 */
	public function getEventId(): ?string {
		return $this->eventId;
	}

	/**
	 * 発生したイベントを設定
	 *
	 * @param string|null $eventId 発生したイベント
	 */
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}

	/**
	 * 発生したイベントを設定
	 *
	 * @param string|null $eventId 発生したイベント
	 * @return Event $this
	 */
	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}
	/**
     * @var string イベント名
	 */
	protected $name;

	/**
	 * イベント名を取得
	 *
	 * @return string|null イベント名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * イベント名を設定
	 *
	 * @param string|null $name イベント名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * イベント名を設定
	 *
	 * @param string|null $name イベント名
	 * @return Event $this
	 */
	public function withName(?string $name): Event {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string イベントの種類
	 */
	protected $resourceName;

	/**
	 * イベントの種類を取得
	 *
	 * @return string|null イベントの種類
	 */
	public function getResourceName(): ?string {
		return $this->resourceName;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $resourceName イベントの種類
	 */
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $resourceName イベントの種類
	 * @return Event $this
	 */
	public function withResourceName(?string $resourceName): Event {
		$this->resourceName = $resourceName;
		return $this;
	}
	/**
     * @var string イベントの種類
	 */
	protected $type;

	/**
	 * イベントの種類を取得
	 *
	 * @return string|null イベントの種類
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $type イベントの種類
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $type イベントの種類
	 * @return Event $this
	 */
	public function withType(?string $type): Event {
		$this->type = $type;
		return $this;
	}
	/**
     * @var string メッセージ
	 */
	protected $message;

	/**
	 * メッセージを取得
	 *
	 * @return string|null メッセージ
	 */
	public function getMessage(): ?string {
		return $this->message;
	}

	/**
	 * メッセージを設定
	 *
	 * @param string|null $message メッセージ
	 */
	public function setMessage(?string $message) {
		$this->message = $message;
	}

	/**
	 * メッセージを設定
	 *
	 * @param string|null $message メッセージ
	 * @return Event $this
	 */
	public function withMessage(?string $message): Event {
		$this->message = $message;
		return $this;
	}
	/**
     * @var int 日時
	 */
	protected $eventAt;

	/**
	 * 日時を取得
	 *
	 * @return int|null 日時
	 */
	public function getEventAt(): ?int {
		return $this->eventAt;
	}

	/**
	 * 日時を設定
	 *
	 * @param int|null $eventAt 日時
	 */
	public function setEventAt(?int $eventAt) {
		$this->eventAt = $eventAt;
	}

	/**
	 * 日時を設定
	 *
	 * @param int|null $eventAt 日時
	 * @return Event $this
	 */
	public function withEventAt(?int $eventAt): Event {
		$this->eventAt = $eventAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "eventId" => $this->eventId,
            "name" => $this->name,
            "resourceName" => $this->resourceName,
            "type" => $this->type,
            "message" => $this->message,
            "eventAt" => $this->eventAt,
        );
    }

    public static function fromJson(array $data): Event {
        $model = new Event();
        $model->setEventId(isset($data["eventId"]) ? $data["eventId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setResourceName(isset($data["resourceName"]) ? $data["resourceName"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setMessage(isset($data["message"]) ? $data["message"] : null);
        $model->setEventAt(isset($data["eventAt"]) ? $data["eventAt"] : null);
        return $model;
    }
}