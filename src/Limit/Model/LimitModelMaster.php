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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;


class LimitModelMaster implements IModel {
	/**
     * @var string
	 */
	private $limitModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $resetDayOfMonth;
	/**
     * @var string
	 */
	private $resetDayOfWeek;
	/**
     * @var int
	 */
	private $resetHour;
	/**
     * @var int
	 */
	private $anchorTimestamp;
	/**
     * @var int
	 */
	private $days;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getLimitModelId(): ?string {
		return $this->limitModelId;
	}
	public function setLimitModelId(?string $limitModelId) {
		$this->limitModelId = $limitModelId;
	}
	public function withLimitModelId(?string $limitModelId): LimitModelMaster {
		$this->limitModelId = $limitModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): LimitModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): LimitModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): LimitModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): LimitModelMaster {
		$this->resetType = $resetType;
		return $this;
	}
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
	public function withResetDayOfMonth(?int $resetDayOfMonth): LimitModelMaster {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
	public function withResetDayOfWeek(?string $resetDayOfWeek): LimitModelMaster {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): LimitModelMaster {
		$this->resetHour = $resetHour;
		return $this;
	}
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
	public function withAnchorTimestamp(?int $anchorTimestamp): LimitModelMaster {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
	public function getDays(): ?int {
		return $this->days;
	}
	public function setDays(?int $days) {
		$this->days = $days;
	}
	public function withDays(?int $days): LimitModelMaster {
		$this->days = $days;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): LimitModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): LimitModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): LimitModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?LimitModelMaster {
        if ($data === null) {
            return null;
        }
        return (new LimitModelMaster())
            ->withLimitModelId(array_key_exists('limitModelId', $data) && $data['limitModelId'] !== null ? $data['limitModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "limitModelId" => $this->getLimitModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}