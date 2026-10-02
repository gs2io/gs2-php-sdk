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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setRecoverValueByUserId: Set the amount of stamina recovery by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#setrecovervaluebyuserid
 */
class SetRecoverValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $userId;
    /** @var int Amount of stamina recovery */
    private $recoverValue;
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
     * @return SetRecoverValueByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetRecoverValueByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Stamina Model Name */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
    /** @param string|null $staminaName Stamina Model Name */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
    /**
     * @param string|null $staminaName Stamina Model Name
     * @return SetRecoverValueByUserIdRequest
     */
	public function withStaminaName(?string $staminaName): SetRecoverValueByUserIdRequest {
		$this->staminaName = $staminaName;
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
     * @return SetRecoverValueByUserIdRequest
     */
	public function withUserId(?string $userId): SetRecoverValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Amount of stamina recovery */
	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}
    /** @param int|null $recoverValue Amount of stamina recovery */
	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}
    /**
     * @param int|null $recoverValue Amount of stamina recovery
     * @return SetRecoverValueByUserIdRequest
     */
	public function withRecoverValue(?int $recoverValue): SetRecoverValueByUserIdRequest {
		$this->recoverValue = $recoverValue;
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
     * @return SetRecoverValueByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetRecoverValueByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetRecoverValueByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetRecoverValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetRecoverValueByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "recoverValue" => $this->getRecoverValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}