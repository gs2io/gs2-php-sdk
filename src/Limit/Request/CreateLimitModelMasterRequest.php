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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createLimitModelMaster: Create Usage Limit Model Master
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#createlimitmodelmaster
 */
class CreateLimitModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Usage Limit Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Reset Timing */
    private $resetType;
    /** @var int Reset Day of Month */
    private $resetDayOfMonth;
    /** @var string Reset Day of Week */
    private $resetDayOfWeek;
    /** @var int Reset Hour */
    private $resetHour;
    /** @var int Base date and time for counting elapsed days */
    private $anchorTimestamp;
    /** @var int Number of Days to Reset */
    private $days;
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
     * @return CreateLimitModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateLimitModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Usage Limit Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Usage Limit Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Usage Limit Model name
     * @return CreateLimitModelMasterRequest
     */
	public function withName(?string $name): CreateLimitModelMasterRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateLimitModelMasterRequest
     */
	public function withDescription(?string $description): CreateLimitModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return CreateLimitModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateLimitModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Reset Timing */
	public function getResetType(): ?string {
		return $this->resetType;
	}
    /** @param string|null $resetType Reset Timing */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
    /**
     * @param string|null $resetType Reset Timing
     * @return CreateLimitModelMasterRequest
     */
	public function withResetType(?string $resetType): CreateLimitModelMasterRequest {
		$this->resetType = $resetType;
		return $this;
	}
    /** @return int|null Reset Day of Month */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
    /** @param int|null $resetDayOfMonth Reset Day of Month */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
    /**
     * @param int|null $resetDayOfMonth Reset Day of Month
     * @return CreateLimitModelMasterRequest
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): CreateLimitModelMasterRequest {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
    /** @return string|null Reset Day of Week */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
    /** @param string|null $resetDayOfWeek Reset Day of Week */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
    /**
     * @param string|null $resetDayOfWeek Reset Day of Week
     * @return CreateLimitModelMasterRequest
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): CreateLimitModelMasterRequest {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
    /** @return int|null Reset Hour */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
    /** @param int|null $resetHour Reset Hour */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
    /**
     * @param int|null $resetHour Reset Hour
     * @return CreateLimitModelMasterRequest
     */
	public function withResetHour(?int $resetHour): CreateLimitModelMasterRequest {
		$this->resetHour = $resetHour;
		return $this;
	}
    /** @return int|null Base date and time for counting elapsed days */
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
    /** @param int|null $anchorTimestamp Base date and time for counting elapsed days */
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
    /**
     * @param int|null $anchorTimestamp Base date and time for counting elapsed days
     * @return CreateLimitModelMasterRequest
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): CreateLimitModelMasterRequest {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
    /** @return int|null Number of Days to Reset */
	public function getDays(): ?int {
		return $this->days;
	}
    /** @param int|null $days Number of Days to Reset */
	public function setDays(?int $days) {
		$this->days = $days;
	}
    /**
     * @param int|null $days Number of Days to Reset
     * @return CreateLimitModelMasterRequest
     */
	public function withDays(?int $days): CreateLimitModelMasterRequest {
		$this->days = $days;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateLimitModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateLimitModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
        );
    }
}