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
 * Request for raiseMaxValueByUserId: Add the maximum value of stamina by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#raisemaxvaluebyuserid
 */
class RaiseMaxValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $userId;
    /** @var int Maximum amount of stamina to be increased */
    private $raiseValue;
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
     * @return RaiseMaxValueByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): RaiseMaxValueByUserIdRequest {
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
     * @return RaiseMaxValueByUserIdRequest
     */
	public function withStaminaName(?string $staminaName): RaiseMaxValueByUserIdRequest {
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
     * @return RaiseMaxValueByUserIdRequest
     */
	public function withUserId(?string $userId): RaiseMaxValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Maximum amount of stamina to be increased */
	public function getRaiseValue(): ?int {
		return $this->raiseValue;
	}
    /** @param int|null $raiseValue Maximum amount of stamina to be increased */
	public function setRaiseValue(?int $raiseValue) {
		$this->raiseValue = $raiseValue;
	}
    /**
     * @param int|null $raiseValue Maximum amount of stamina to be increased
     * @return RaiseMaxValueByUserIdRequest
     */
	public function withRaiseValue(?int $raiseValue): RaiseMaxValueByUserIdRequest {
		$this->raiseValue = $raiseValue;
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
     * @return RaiseMaxValueByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): RaiseMaxValueByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RaiseMaxValueByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RaiseMaxValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new RaiseMaxValueByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRaiseValue(array_key_exists('raiseValue', $data) && $data['raiseValue'] !== null ? $data['raiseValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "raiseValue" => $this->getRaiseValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}