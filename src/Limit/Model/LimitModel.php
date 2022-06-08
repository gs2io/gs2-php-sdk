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


class LimitModel implements IModel {
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
	public function getLimitModelId(): ?string {
		return $this->limitModelId;
	}
	public function setLimitModelId(?string $limitModelId) {
		$this->limitModelId = $limitModelId;
	}
	public function withLimitModelId(?string $limitModelId): LimitModel {
		$this->limitModelId = $limitModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): LimitModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): LimitModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): LimitModel {
		$this->resetType = $resetType;
		return $this;
	}
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
	public function withResetDayOfMonth(?int $resetDayOfMonth): LimitModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
	public function withResetDayOfWeek(?string $resetDayOfWeek): LimitModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): LimitModel {
		$this->resetHour = $resetHour;
		return $this;
	}

    public static function fromJson(?array $data): ?LimitModel {
        if ($data === null) {
            return null;
        }
        return (new LimitModel())
            ->withLimitModelId(array_key_exists('limitModelId', $data) && $data['limitModelId'] !== null ? $data['limitModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null);
    }

    public function toJson(): array {
        return array(
            "limitModelId" => $this->getLimitModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
        );
    }
}