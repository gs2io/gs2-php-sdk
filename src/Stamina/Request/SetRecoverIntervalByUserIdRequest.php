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
 * Request for setRecoverIntervalByUserId: Update stamina recovery interval (minutes) by User ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#setrecoverintervalbyuserid
 */
class SetRecoverIntervalByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $userId;
    /** @var int Stamina recovery interval (minutes) */
    private $recoverIntervalMinutes;
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
     * @return SetRecoverIntervalByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetRecoverIntervalByUserIdRequest {
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
     * @return SetRecoverIntervalByUserIdRequest
     */
	public function withStaminaName(?string $staminaName): SetRecoverIntervalByUserIdRequest {
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
     * @return SetRecoverIntervalByUserIdRequest
     */
	public function withUserId(?string $userId): SetRecoverIntervalByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Stamina recovery interval (minutes) */
	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}
    /** @param int|null $recoverIntervalMinutes Stamina recovery interval (minutes) */
	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}
    /**
     * @param int|null $recoverIntervalMinutes Stamina recovery interval (minutes)
     * @return SetRecoverIntervalByUserIdRequest
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): SetRecoverIntervalByUserIdRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
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
     * @return SetRecoverIntervalByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetRecoverIntervalByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetRecoverIntervalByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetRecoverIntervalByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetRecoverIntervalByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}