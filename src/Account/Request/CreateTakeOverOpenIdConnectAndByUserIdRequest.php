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
 * Request for createTakeOverOpenIdConnectAndByUserId: Create Takeover Information using OpenID Connect by User ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#createtakeoveropenidconnectandbyuserid
 */
class CreateTakeOverOpenIdConnectAndByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Slot Number */
    private $type;
    /** @var string OpenID Connect ID Token */
    private $idToken;
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
     * @return CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateTakeOverOpenIdConnectAndByUserIdRequest {
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
     * @return CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
	public function withUserId(?string $userId): CreateTakeOverOpenIdConnectAndByUserIdRequest {
		$this->userId = $userId;
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
     * @return CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
	public function withType(?int $type): CreateTakeOverOpenIdConnectAndByUserIdRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null OpenID Connect ID Token */
	public function getIdToken(): ?string {
		return $this->idToken;
	}
    /** @param string|null $idToken OpenID Connect ID Token */
	public function setIdToken(?string $idToken) {
		$this->idToken = $idToken;
	}
    /**
     * @param string|null $idToken OpenID Connect ID Token
     * @return CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
	public function withIdToken(?string $idToken): CreateTakeOverOpenIdConnectAndByUserIdRequest {
		$this->idToken = $idToken;
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
     * @return CreateTakeOverOpenIdConnectAndByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateTakeOverOpenIdConnectAndByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateTakeOverOpenIdConnectAndByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateTakeOverOpenIdConnectAndByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateTakeOverOpenIdConnectAndByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withIdToken(array_key_exists('idToken', $data) && $data['idToken'] !== null ? $data['idToken'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "idToken" => $this->getIdToken(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}