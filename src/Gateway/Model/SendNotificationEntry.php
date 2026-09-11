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


class SendNotificationEntry implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $issuer;
	/**
     * @var string
	 */
	private $subject;
	/**
     * @var string
	 */
	private $payload;
	/**
     * @var bool
	 */
	private $enableTransferMobileNotification;
	/**
     * @var string
	 */
	private $sound;
	/**
     * @var array
	 */
	private $mobileNotificationMessages;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SendNotificationEntry {
		$this->userId = $userId;
		return $this;
	}
	public function getIssuer(): ?string {
		return $this->issuer;
	}
	public function setIssuer(?string $issuer) {
		$this->issuer = $issuer;
	}
	public function withIssuer(?string $issuer): SendNotificationEntry {
		$this->issuer = $issuer;
		return $this;
	}
	public function getSubject(): ?string {
		return $this->subject;
	}
	public function setSubject(?string $subject) {
		$this->subject = $subject;
	}
	public function withSubject(?string $subject): SendNotificationEntry {
		$this->subject = $subject;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
	public function withPayload(?string $payload): SendNotificationEntry {
		$this->payload = $payload;
		return $this;
	}
	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}
	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}
	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): SendNotificationEntry {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}
	public function getSound(): ?string {
		return $this->sound;
	}
	public function setSound(?string $sound) {
		$this->sound = $sound;
	}
	public function withSound(?string $sound): SendNotificationEntry {
		$this->sound = $sound;
		return $this;
	}
	public function getMobileNotificationMessages(): ?array {
		return $this->mobileNotificationMessages;
	}
	public function setMobileNotificationMessages(?array $mobileNotificationMessages) {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
	}
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