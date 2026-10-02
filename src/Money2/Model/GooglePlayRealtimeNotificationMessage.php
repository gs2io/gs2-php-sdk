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


/**
 * RTDN Message
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#googleplayrealtimenotificationmessage
 */
class GooglePlayRealtimeNotificationMessage implements IModel {
	/**
     * @var string Data
	 */
	private $data;
	/**
     * @var string Message ID
	 */
	private $messageId;
	/**
     * @var string Publish Time
	 */
	private $publishTime;
    /** @return string|null Data */
	public function getData(): ?string {
		return $this->data;
	}
    /** @param string|null $data Data */
	public function setData(?string $data) {
		$this->data = $data;
	}
    /**
     * @param string|null $data Data
     * @return GooglePlayRealtimeNotificationMessage
     */
	public function withData(?string $data): GooglePlayRealtimeNotificationMessage {
		$this->data = $data;
		return $this;
	}
    /** @return string|null Message ID */
	public function getMessageId(): ?string {
		return $this->messageId;
	}
    /** @param string|null $messageId Message ID */
	public function setMessageId(?string $messageId) {
		$this->messageId = $messageId;
	}
    /**
     * @param string|null $messageId Message ID
     * @return GooglePlayRealtimeNotificationMessage
     */
	public function withMessageId(?string $messageId): GooglePlayRealtimeNotificationMessage {
		$this->messageId = $messageId;
		return $this;
	}
    /** @return string|null Publish Time */
	public function getPublishTime(): ?string {
		return $this->publishTime;
	}
    /** @param string|null $publishTime Publish Time */
	public function setPublishTime(?string $publishTime) {
		$this->publishTime = $publishTime;
	}
    /**
     * @param string|null $publishTime Publish Time
     * @return GooglePlayRealtimeNotificationMessage
     */
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