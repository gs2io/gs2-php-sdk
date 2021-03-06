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

class SendMobileNotificationByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $subject;
    /** @var string */
    private $payload;
    /** @var string */
    private $sound;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SendMobileNotificationByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SendMobileNotificationByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getSubject(): ?string {
		return $this->subject;
	}

	public function setSubject(?string $subject) {
		$this->subject = $subject;
	}

	public function withSubject(?string $subject): SendMobileNotificationByUserIdRequest {
		$this->subject = $subject;
		return $this;
	}

	public function getPayload(): ?string {
		return $this->payload;
	}

	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}

	public function withPayload(?string $payload): SendMobileNotificationByUserIdRequest {
		$this->payload = $payload;
		return $this;
	}

	public function getSound(): ?string {
		return $this->sound;
	}

	public function setSound(?string $sound) {
		$this->sound = $sound;
	}

	public function withSound(?string $sound): SendMobileNotificationByUserIdRequest {
		$this->sound = $sound;
		return $this;
	}

    public static function fromJson(?array $data): ?SendMobileNotificationByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SendMobileNotificationByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withSubject(empty($data['subject']) ? null : $data['subject'])
            ->withPayload(empty($data['payload']) ? null : $data['payload'])
            ->withSound(empty($data['sound']) ? null : $data['sound']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "subject" => $this->getSubject(),
            "payload" => $this->getPayload(),
            "sound" => $this->getSound(),
        );
    }
}