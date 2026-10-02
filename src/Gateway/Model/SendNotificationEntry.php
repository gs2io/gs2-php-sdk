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

namespace Gs2\Gateway\Model;

use Gs2\Core\Model\IModel;


/**
 * Send Notification Entry
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#sendnotificationentry
 */
class SendNotificationEntry implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Notification source service
	 */
	private $issuer;
	/**
     * @var string Subject
	 */
	private $subject;
	/**
     * @var string Payload
	 */
	private $payload;
	/**
     * @var bool Whether to forward the notification as a mobile push notification when the target user is offline
	 */
	private $enableTransferMobileNotification;
	/**
     * @var string Name of the audio file to play
	 */
	private $sound;
	/**
     * @var array Localized title and body used when forwarding to mobile push notifications
	 */
	private $mobileNotificationMessages;
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
     * @return SendNotificationEntry
     */
	public function withUserId(?string $userId): SendNotificationEntry {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Notification source service */
	public function getIssuer(): ?string {
		return $this->issuer;
	}
    /** @param string|null $issuer Notification source service */
	public function setIssuer(?string $issuer) {
		$this->issuer = $issuer;
	}
    /**
     * @param string|null $issuer Notification source service
     * @return SendNotificationEntry
     */
	public function withIssuer(?string $issuer): SendNotificationEntry {
		$this->issuer = $issuer;
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
     * @return SendNotificationEntry
     */
	public function withSubject(?string $subject): SendNotificationEntry {
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
     * @return SendNotificationEntry
     */
	public function withPayload(?string $payload): SendNotificationEntry {
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
     * @return SendNotificationEntry
     */
	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): SendNotificationEntry {
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
     * @return SendNotificationEntry
     */
	public function withSound(?string $sound): SendNotificationEntry {
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
     * @return SendNotificationEntry
     */
	public function withMobileNotificationMessages(?array $mobileNotificationMessages): SendNotificationEntry {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
		return $this;
	}

    public static function fromJson(?array $data): ?SendNotificationEntry {
        if ($data === null) {
            return null;
        }
        return (new SendNotificationEntry())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withIssuer(array_key_exists('issuer', $data) && $data['issuer'] !== null ? $data['issuer'] : null)
            ->withSubject(array_key_exists('subject', $data) && $data['subject'] !== null ? $data['subject'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
            ->withEnableTransferMobileNotification(array_key_exists('enableTransferMobileNotification', $data) ? $data['enableTransferMobileNotification'] : null)
            ->withSound(array_key_exists('sound', $data) && $data['sound'] !== null ? $data['sound'] : null)
            ->withMobileNotificationMessages(!array_key_exists('mobileNotificationMessages', $data) || $data['mobileNotificationMessages'] === null ? null : array_map(
                function ($item) {
                    return MobileNotificationMessage::fromJson($item);
                },
                $data['mobileNotificationMessages']
            ));
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "issuer" => $this->getIssuer(),
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
        );
    }
}