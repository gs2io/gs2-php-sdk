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
 * Request for sendMobileNotificationByUserId: Send mobile push notification
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#sendmobilenotificationbyuserid
 */
class SendMobileNotificationByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Subject */
    private $subject;
    /** @var string Payload */
    private $payload;
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SendMobileNotificationByUserIdRequest {
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withUserId(?string $userId): SendMobileNotificationByUserIdRequest {
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withSubject(?string $subject): SendMobileNotificationByUserIdRequest {
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withPayload(?string $payload): SendMobileNotificationByUserIdRequest {
		$this->payload = $payload;
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withSound(?string $sound): SendMobileNotificationByUserIdRequest {
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withMobileNotificationMessages(?array $mobileNotificationMessages): SendMobileNotificationByUserIdRequest {
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
     * @return SendMobileNotificationByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SendMobileNotificationByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendMobileNotificationByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendMobileNotificationByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SendMobileNotificationByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSubject(array_key_exists('subject', $data) && $data['subject'] !== null ? $data['subject'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
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