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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Gateway\Model\MobileNotificationMessage;

/**
 * Request for sendNotification: Send notification
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#sendnotification
 */
class SendNotificationRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Subject */
    private $subject;
    /** @var string Payload */
    private $payload;
    /** @var bool Whether to forward the notification as a mobile push notification when the target user is offline */
    private $enableTransferMobileNotification;
    /** @var string Name of the audio file to play */
    private $sound;
    /** @var array Localized title and body used when forwarding to mobile push notifications */
    private $mobileNotificationMessages;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return SendNotificationRequest
     */
	public function withNamespaceName(?string $namespaceName): SendNotificationRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return SendNotificationRequest
     */
	public function withUserId(?string $userId): SendNotificationRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Subject */
	public function getSubject(): ?string {
		return $this->subject;
	}
    /** @param string|null $subject Subject */
	public function setSubject(?string $subject) {
		$this->subject = $subject;
	}
    /**
     * @param string|null $subject Subject
     * @return SendNotificationRequest
     */
	public function withSubject(?string $subject): SendNotificationRequest {
		$this->subject = $subject;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return SendNotificationRequest
     */
	public function withPayload(?string $payload): SendNotificationRequest {
		$this->payload = $payload;
		return $this;
	}
    /** @return bool|null Whether to forward the notification as a mobile push notification when the target user is offline */
	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}
    /** @param bool|null $enableTransferMobileNotification Whether to forward the notification as a mobile push notification when the target user is offline */
	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}
    /**
     * @param bool|null $enableTransferMobileNotification Whether to forward the notification as a mobile push notification when the target user is offline
     * @return SendNotificationRequest
     */
	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): SendNotificationRequest {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}
    /** @return string|null Name of the audio file to play */
	public function getSound(): ?string {
		return $this->sound;
	}
    /** @param string|null $sound Name of the audio file to play */
	public function setSound(?string $sound) {
		$this->sound = $sound;
	}
    /**
     * @param string|null $sound Name of the audio file to play
     * @return SendNotificationRequest
     */
	public function withSound(?string $sound): SendNotificationRequest {
		$this->sound = $sound;
		return $this;
	}
    /** @return array|null Localized title and body used when forwarding to mobile push notifications */
	public function getMobileNotificationMessages(): ?array {
		return $this->mobileNotificationMessages;
	}
    /** @param array|null $mobileNotificationMessages Localized title and body used when forwarding to mobile push notifications */
	public function setMobileNotificationMessages(?array $mobileNotificationMessages) {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
	}
    /**
     * @param array|null $mobileNotificationMessages Localized title and body used when forwarding to mobile push notifications
     * @return SendNotificationRequest
     */
	public function withMobileNotificationMessages(?array $mobileNotificationMessages): SendNotificationRequest {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return SendNotificationRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SendNotificationRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendNotificationRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendNotificationRequest {
        if ($data === null) {
            return null;
        }
        return (new SendNotificationRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSubject(array_key_exists('subject', $data) && $data['subject'] !== null ? $data['subject'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
            ->withEnableTransferMobileNotification(array_key_exists('enableTransferMobileNotification', $data) ? $data['enableTransferMobileNotification'] : null)
            ->withSound(array_key_exists('sound', $data) && $data['sound'] !== null ? $data['sound'] : null)
            ->withMobileNotificationMessages(!array_key_exists('mobileNotificationMessages', $data) || $data['mobileNotificationMessages'] === null ? null : array_map(
                function ($item) {
                    return MobileNotificationMessage::fromJson($item);
                },
                $data['mobileNotificationMessages']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "subject" => $this->getSubject(),
            "payload" => $this->getPayload(),
            "enableTransferMobileNotification" => $this->getEnableTransferMobileNotification(),
            "sound" => $this->getSound(),
            "mobileNotificationMessages" => $this->getMobileNotificationMessages() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMobileNotificationMessages()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}