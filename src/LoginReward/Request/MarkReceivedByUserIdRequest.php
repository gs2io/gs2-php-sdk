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

namespace Gs2\LoginReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for markReceivedByUserId: Mark as received by User ID
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#markreceivedbyuserid
 */
class MarkReceivedByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Bonus Model Name */
    private $bonusModelName;
    /** @var string User ID */
    private $userId;
    /** @var int Step Number */
    private $stepNumber;
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
     * @return MarkReceivedByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): MarkReceivedByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Bonus Model Name */
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
    /** @param string|null $bonusModelName Bonus Model Name */
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
    /**
     * @param string|null $bonusModelName Bonus Model Name
     * @return MarkReceivedByUserIdRequest
     */
	public function withBonusModelName(?string $bonusModelName): MarkReceivedByUserIdRequest {
		$this->bonusModelName = $bonusModelName;
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
     * @return MarkReceivedByUserIdRequest
     */
	public function withUserId(?string $userId): MarkReceivedByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Step Number */
	public function getStepNumber(): ?int {
		return $this->stepNumber;
	}
    /** @param int|null $stepNumber Step Number */
	public function setStepNumber(?int $stepNumber) {
		$this->stepNumber = $stepNumber;
	}
    /**
     * @param int|null $stepNumber Step Number
     * @return MarkReceivedByUserIdRequest
     */
	public function withStepNumber(?int $stepNumber): MarkReceivedByUserIdRequest {
		$this->stepNumber = $stepNumber;
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
     * @return MarkReceivedByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): MarkReceivedByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MarkReceivedByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MarkReceivedByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new MarkReceivedByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStepNumber(array_key_exists('stepNumber', $data) && $data['stepNumber'] !== null ? $data['stepNumber'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "bonusModelName" => $this->getBonusModelName(),
            "userId" => $this->getUserId(),
            "stepNumber" => $this->getStepNumber(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}