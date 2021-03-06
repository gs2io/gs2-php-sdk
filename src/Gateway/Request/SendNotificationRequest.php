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

class SendNotificationRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $subject;
    /** @var string */
    private $payload;
    /** @var bool */
    private $enableTransferMobileNotification;
    /** @var string */
    private $sound;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SendNotificationRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SendNotificationRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getSubject(): ?string {
		return $this->subject;
	}

	public function setSubject(?string $subject) {
		$this->subject = $subject;
	}

	public function withSubject(?string $subject): SendNotificationRequest {
		$this->subject = $subject;
		return $this;
	}

	public function getPayload(): ?string {
		return $this->payload;
	}

	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}

	public function withPayload(?string $payload): SendNotificationRequest {
		$this->payload = $payload;
		return $this;
	}

	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}

	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}

	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): SendNotificationRequest {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}

	public function getSound(): ?string {
		return $this->sound;
	}

	public function setSound(?string $sound) {
		$this->sound = $sound;
	}

	public function withSound(?string $sound): SendNotificationRequest {
		$this->sound = $sound;
		return $this;
	}

    public static function fromJson(?array $data): ?SendNotificationRequest {
        if ($data === null) {
            return null;
        }
        return (new SendNotificationRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withSubject(empty($data['subject']) ? null : $data['subject'])
            ->withPayload(empty($data['payload']) ? null : $data['payload'])
            ->withEnableTransferMobileNotification(empty($data['enableTransferMobileNotification']) ? null : $data['enableTransferMobileNotification'])
            ->withSound(empty($data['sound']) ? null : $data['sound']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "subject" => $this->getSubject(),
            "payload" => $this->getPayload(),
            "enableTransferMobileNotification" => $this->getEnableTransferMobileNotification(),
            "sound" => $this->getSound(),
        );
    }
}