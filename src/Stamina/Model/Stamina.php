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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;


class Stamina implements IModel {
	/**
     * @var string
	 */
	private $staminaId;
	/**
     * @var string
	 */
	private $staminaName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $value;
	/**
     * @var int
	 */
	private $maxValue;
	/**
     * @var int
	 */
	private $recoverIntervalMinutes;
	/**
     * @var int
	 */
	private $recoverValue;
	/**
     * @var int
	 */
	private $overflowValue;
	/**
     * @var int
	 */
	private $nextRecoverAt;
	/**
     * @var int
	 */
	private $lastRecoveredAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getStaminaId(): ?string {
		return $this->staminaId;
	}

	public function setStaminaId(?string $staminaId) {
		$this->staminaId = $staminaId;
	}

	public function withStaminaId(?string $staminaId): Stamina {
		$this->staminaId = $staminaId;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): Stamina {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Stamina {
		$this->userId = $userId;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): Stamina {
		$this->value = $value;
		return $this;
	}

	public function getMaxValue(): ?int {
		return $this->maxValue;
	}

	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}

	public function withMaxValue(?int $maxValue): Stamina {
		$this->maxValue = $maxValue;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): Stamina {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): Stamina {
		$this->recoverValue = $recoverValue;
		return $this;
	}

	public function getOverflowValue(): ?int {
		return $this->overflowValue;
	}

	public function setOverflowValue(?int $overflowValue) {
		$this->overflowValue = $overflowValue;
	}

	public function withOverflowValue(?int $overflowValue): Stamina {
		$this->overflowValue = $overflowValue;
		return $this;
	}

	public function getNextRecoverAt(): ?int {
		return $this->nextRecoverAt;
	}

	public function setNextRecoverAt(?int $nextRecoverAt) {
		$this->nextRecoverAt = $nextRecoverAt;
	}

	public function withNextRecoverAt(?int $nextRecoverAt): Stamina {
		$this->nextRecoverAt = $nextRecoverAt;
		return $this;
	}

	public function getLastRecoveredAt(): ?int {
		return $this->lastRecoveredAt;
	}

	public function setLastRecoveredAt(?int $lastRecoveredAt) {
		$this->lastRecoveredAt = $lastRecoveredAt;
	}

	public function withLastRecoveredAt(?int $lastRecoveredAt): Stamina {
		$this->lastRecoveredAt = $lastRecoveredAt;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Stamina {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Stamina {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Stamina {
        if ($data === null) {
            return null;
        }
        return (new Stamina())
            ->withStaminaId(empty($data['staminaId']) ? null : $data['staminaId'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withValue(empty($data['value']) && $data['value'] !== 0 ? null : $data['value'])
            ->withMaxValue(empty($data['maxValue']) && $data['maxValue'] !== 0 ? null : $data['maxValue'])
            ->withRecoverIntervalMinutes(empty($data['recoverIntervalMinutes']) && $data['recoverIntervalMinutes'] !== 0 ? null : $data['recoverIntervalMinutes'])
            ->withRecoverValue(empty($data['recoverValue']) && $data['recoverValue'] !== 0 ? null : $data['recoverValue'])
            ->withOverflowValue(empty($data['overflowValue']) && $data['overflowValue'] !== 0 ? null : $data['overflowValue'])
            ->withNextRecoverAt(empty($data['nextRecoverAt']) && $data['nextRecoverAt'] !== 0 ? null : $data['nextRecoverAt'])
            ->withLastRecoveredAt(empty($data['lastRecoveredAt']) && $data['lastRecoveredAt'] !== 0 ? null : $data['lastRecoveredAt'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "staminaId" => $this->getStaminaId(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "value" => $this->getValue(),
            "maxValue" => $this->getMaxValue(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
            "overflowValue" => $this->getOverflowValue(),
            "nextRecoverAt" => $this->getNextRecoverAt(),
            "lastRecoveredAt" => $this->getLastRecoveredAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}