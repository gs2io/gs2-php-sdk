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

class DoTakeOverRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
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

	public function withNamespaceName(?string $namespaceName): DoTakeOverRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getType(): ?int {
		return $this->type;
	}

	public function setType(?int $type) {
		$this->type = $type;
	}

	public function withType(?int $type): DoTakeOverRequest {
		$this->type = $type;
		return $this;
	}

	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}

	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	public function withUserIdentifier(?string $userIdentifier): DoTakeOverRequest {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): DoTakeOverRequest {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?DoTakeOverRequest {
        if ($data === null) {
            return null;
        }
        return (new DoTakeOverRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "password" => $this->getPassword(),
        );
    }
}