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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class GooglePlayRealtimeNotificationMessage implements IModel {
	/**
     * @var string
	 */
	private $data;
	/**
     * @var string
	 */
	private $messageId;
	/**
     * @var string
	 */
	private $publishTime;
	public function getData(): ?string {
		return $this->data;
	}
	public function setData(?string $data) {
		$this->data = $data;
	}
	public function withData(?string $data): GooglePlayRealtimeNotificationMessage {
		$this->data = $data;
		return $this;
	}
	public function getMessageId(): ?string {
		return $this->messageId;
	}
	public function setMessageId(?string $messageId) {
		$this->messageId = $messageId;
	}
	public function withMessageId(?string $messageId): GooglePlayRealtimeNotificationMessage {
		$this->messageId = $messageId;
		return $this;
	}
	public function getPublishTime(): ?string {
		return $this->publishTime;
	}
	public function setPublishTime(?string $publishTime) {
		$this->publishTime = $publishTime;
	}
	public function withPublishTime(?string $publishTime): GooglePlayRealtimeNotificationMessage {
		$this->publishTime = $publishTime;
		return $this;
	}

    public static function fromJson(?array $data): ?GooglePlayRealtimeNotificationMessage {
        if ($data === null) {
            return null;
        }
        return (new GooglePlayRealtimeNotificationMessage())
            ->withData(array_key_exists('data', $data) && $data['data'] !== null ? $data['data'] : null)
            ->withMessageId(array_key_exists('messageId', $data) && $data['messageId'] !== null ? $data['messageId'] : null)
            ->withPublishTime(array_key_exists('publishTime', $data) && $data['publishTime'] !== null ? $data['publishTime'] : null);
    }

    public function toJson(): array {
        return array(
            "data" => $this->getData(),
            "messageId" => $this->getMessageId(),
            "publishTime" => $this->getPublishTime(),
        );
    }
}