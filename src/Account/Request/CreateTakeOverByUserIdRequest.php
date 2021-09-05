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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateTakeOverByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $type;
    /** @var string */
    private $userIdentifier;
    /** @var string */
    private $password;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateTakeOverByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): CreateTakeOverByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getType(): ?int {
		return $this->type;
	}

	public function setType(?int $type) {
		$this->type = $type;
	}

	public function withType(?int $type): CreateTakeOverByUserIdRequest {
		$this->type = $type;
		return $this;
	}

	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}

	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	public function withUserIdentifier(?string $userIdentifier): CreateTakeOverByUserIdRequest {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): CreateTakeOverByUserIdRequest {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateTakeOverByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateTakeOverByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withType(empty($data['type']) && $data['type'] !== 0 ? null : $data['type'])
            ->withUserIdentifier(empty($data['userIdentifier']) ? null : $data['userIdentifier'])
            ->withPassword(empty($data['password']) ? null : $data['password']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "password" => $this->getPassword(),
        );
    }
}