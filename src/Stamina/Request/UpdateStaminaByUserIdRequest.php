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
 * Request for updateStaminaByUserId: Create and update Stamina by User ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#updatestaminabyuserid
 */
class UpdateStaminaByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $userId;
    /** @var int Stamina Value */
    private $value;
    /** @var int Maximum Stamina */
    private $maxValue;
    /** @var int Stamina Recovery Interval (Minutes) */
    private $recoverIntervalMinutes;
    /** @var int Stamina Recovery Amount */
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
     * @return UpdateStaminaByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateStaminaByUserIdRequest {
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
     * @return UpdateStaminaByUserIdRequest
     */
	public function withStaminaName(?string $staminaName): UpdateStaminaByUserIdRequest {
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
     * @return UpdateStaminaByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateStaminaByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Stamina Value */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Stamina Value */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Stamina Value
     * @return UpdateStaminaByUserIdRequest
     */
	public function withValue(?int $value): UpdateStaminaByUserIdRequest {
		$this->value = $value;
		return $this;
	}
    /** @return int|null Maximum Stamina */
	public function getMaxValue(): ?int {
		return $this->maxValue;
	}
    /** @param int|null $maxValue Maximum Stamina */
	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}
    /**
     * @param int|null $maxValue Maximum Stamina
     * @return UpdateStaminaByUserIdRequest
     */
	public function withMaxValue(?int $maxValue): UpdateStaminaByUserIdRequest {
		$this->maxValue = $maxValue;
		return $this;
	}
    /** @return int|null Stamina Recovery Interval (Minutes) */
	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}
    /** @param int|null $recoverIntervalMinutes Stamina Recovery Interval (Minutes) */
	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}
    /**
     * @param int|null $recoverIntervalMinutes Stamina Recovery Interval (Minutes)
     * @return UpdateStaminaByUserIdRequest
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): UpdateStaminaByUserIdRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}
    /** @return int|null Stamina Recovery Amount */
	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}
    /** @param int|null $recoverValue Stamina Recovery Amount */
	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}
    /**
     * @param int|null $recoverValue Stamina Recovery Amount
     * @return UpdateStaminaByUserIdRequest
     */
	public function withRecoverValue(?int $recoverValue): UpdateStaminaByUserIdRequest {
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
     * @return UpdateStaminaByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateStaminaByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateStaminaByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStaminaByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStaminaByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMaxValue(array_key_exists('maxValue', $data) && $data['maxValue'] !== null ? $data['maxValue'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "value" => $this->getValue(),
            "maxValue" => $this->getMaxValue(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}