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


/**
 * Stamina
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#stamina
 */
class Stamina implements IModel {
	/**
     * @var string Stamina GRN
	 */
	private $staminaId;
	/**
     * @var string Stamina Model Name
	 */
	private $staminaName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Stamina Value
	 */
	private $value;
	/**
     * @var int Maximum Stamina
	 */
	private $maxValue;
	/**
     * @var int Stamina Recovery Interval (Minutes)
	 */
	private $recoverIntervalMinutes;
	/**
     * @var int Stamina Recovery Amount
	 */
	private $recoverValue;
	/**
     * @var int Overflow Value
	 */
	private $overflowValue;
	/**
     * @var int Next Recovery Time
	 */
	private $nextRecoverAt;
	/**
     * @var int Datetime of last recovery
	 */
	private $lastRecoveredAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Stamina GRN */
	public function getStaminaId(): ?string {
		return $this->staminaId;
	}
    /** @param string|null $staminaId Stamina GRN */
	public function setStaminaId(?string $staminaId) {
		$this->staminaId = $staminaId;
	}
    /**
     * @param string|null $staminaId Stamina GRN
     * @return Stamina
     */
	public function withStaminaId(?string $staminaId): Stamina {
		$this->staminaId = $staminaId;
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
     * @return Stamina
     */
	public function withStaminaName(?string $staminaName): Stamina {
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
     * @return Stamina
     */
	public function withUserId(?string $userId): Stamina {
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
     * @return Stamina
     */
	public function withValue(?int $value): Stamina {
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
     * @return Stamina
     */
	public function withMaxValue(?int $maxValue): Stamina {
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
     * @return Stamina
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): Stamina {
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
     * @return Stamina
     */
	public function withRecoverValue(?int $recoverValue): Stamina {
		$this->recoverValue = $recoverValue;
		return $this;
	}
    /** @return int|null Overflow Value */
	public function getOverflowValue(): ?int {
		return $this->overflowValue;
	}
    /** @param int|null $overflowValue Overflow Value */
	public function setOverflowValue(?int $overflowValue) {
		$this->overflowValue = $overflowValue;
	}
    /**
     * @param int|null $overflowValue Overflow Value
     * @return Stamina
     */
	public function withOverflowValue(?int $overflowValue): Stamina {
		$this->overflowValue = $overflowValue;
		return $this;
	}
    /** @return int|null Next Recovery Time */
	public function getNextRecoverAt(): ?int {
		return $this->nextRecoverAt;
	}
    /** @param int|null $nextRecoverAt Next Recovery Time */
	public function setNextRecoverAt(?int $nextRecoverAt) {
		$this->nextRecoverAt = $nextRecoverAt;
	}
    /**
     * @param int|null $nextRecoverAt Next Recovery Time
     * @return Stamina
     */
	public function withNextRecoverAt(?int $nextRecoverAt): Stamina {
		$this->nextRecoverAt = $nextRecoverAt;
		return $this;
	}
    /** @return int|null Datetime of last recovery */
	public function getLastRecoveredAt(): ?int {
		return $this->lastRecoveredAt;
	}
    /** @param int|null $lastRecoveredAt Datetime of last recovery */
	public function setLastRecoveredAt(?int $lastRecoveredAt) {
		$this->lastRecoveredAt = $lastRecoveredAt;
	}
    /**
     * @param int|null $lastRecoveredAt Datetime of last recovery
     * @return Stamina
     */
	public function withLastRecoveredAt(?int $lastRecoveredAt): Stamina {
		$this->lastRecoveredAt = $lastRecoveredAt;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Stamina
     */
	public function withCreatedAt(?int $createdAt): Stamina {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Stamina
     */
	public function withUpdatedAt(?int $updatedAt): Stamina {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Stamina
     */
	public function withRevision(?int $revision): Stamina {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Stamina {
        if ($data === null) {
            return null;
        }
        return (new Stamina())
            ->withStaminaId(array_key_exists('staminaId', $data) && $data['staminaId'] !== null ? $data['staminaId'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMaxValue(array_key_exists('maxValue', $data) && $data['maxValue'] !== null ? $data['maxValue'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withOverflowValue(array_key_exists('overflowValue', $data) && $data['overflowValue'] !== null ? $data['overflowValue'] : null)
            ->withNextRecoverAt(array_key_exists('nextRecoverAt', $data) && $data['nextRecoverAt'] !== null ? $data['nextRecoverAt'] : null)
            ->withLastRecoveredAt(array_key_exists('lastRecoveredAt', $data) && $data['lastRecoveredAt'] !== null ? $data['lastRecoveredAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}