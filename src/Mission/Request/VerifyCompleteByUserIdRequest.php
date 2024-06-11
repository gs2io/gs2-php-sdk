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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class VerifyCompleteByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $userId;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $missionTaskName;
    /** @var bool */
    private $multiplyValueSpecifyingQuantity;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyCompleteByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
	public function withMissionGroupName(?string $missionGroupName): VerifyCompleteByUserIdRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): VerifyCompleteByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyCompleteByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getMissionTaskName(): ?string {
		return $this->missionTaskName;
	}
	public function setMissionTaskName(?string $missionTaskName) {
		$this->missionTaskName = $missionTaskName;
	}
	public function withMissionTaskName(?string $missionTaskName): VerifyCompleteByUserIdRequest {
		$this->missionTaskName = $missionTaskName;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCompleteByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyCompleteByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCompleteByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCompleteByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCompleteByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withMissionTaskName(array_key_exists('missionTaskName', $data) && $data['missionTaskName'] !== null ? $data['missionTaskName'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "userId" => $this->getUserId(),
            "verifyType" => $this->getVerifyType(),
            "missionTaskName" => $this->getMissionTaskName(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}