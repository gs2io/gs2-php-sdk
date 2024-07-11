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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class PlatformUser implements IModel {
	/**
     * @var int
	 */
	private $type;
	/**
     * @var string
	 */
	private $userIdentifier;
	/**
     * @var string
	 */
	private $userId;
	public function getType(): ?int {
		return $this->type;
	}
	public function setType(?int $type) {
		$this->type = $type;
	}
	public function withType(?int $type): PlatformUser {
		$this->type = $type;
		return $this;
	}
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
	public function withUserIdentifier(?string $userIdentifier): PlatformUser {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): PlatformUser {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?PlatformUser {
        if ($data === null) {
            return null;
        }
        return (new PlatformUser())
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null);
    }

    public function toJson(): array {
        return array(
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "userId" => $this->getUserId(),
        );
    }
}