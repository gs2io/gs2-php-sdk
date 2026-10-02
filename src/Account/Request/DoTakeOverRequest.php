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

/**
 * Request for doTakeOver: Execute Account Takeover
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#dotakeover
 */
class DoTakeOverRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Slot Number */
    private $type;
    /** @var string User ID for takeover */
    private $userIdentifier;
    /** @var string Password */
    private $password;
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
     * @return DoTakeOverRequest
     */
	public function withNamespaceName(?string $namespaceName): DoTakeOverRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return DoTakeOverRequest
     */
	public function withType(?int $type): DoTakeOverRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null User ID for takeover */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
    /** @param string|null $userIdentifier User ID for takeover */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
    /**
     * @param string|null $userIdentifier User ID for takeover
     * @return DoTakeOverRequest
     */
	public function withUserIdentifier(?string $userIdentifier): DoTakeOverRequest {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return DoTakeOverRequest
     */
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