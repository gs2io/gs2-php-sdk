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

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $minimumValue;
    /** @var int */
    private $maximumValue;
    /** @var string */
    private $orderDirection;
    /** @var string */
    private $scope;
    /** @var bool */
    private $uniqueByUserId;
    /** @var int */
    private $calculateFixedTimingHour;
    /** @var int */
    private $calculateFixedTimingMinute;
    /** @var int */
    private $calculateIntervalMinutes;
    /** @var string */
    private $entryPeriodEventId;
    /** @var string */
    private $accessPeriodEventId;
    /** @var string */
    private $generation;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateCategoryModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateCategoryModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateCategoryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}

	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}

	public function withMinimumValue(?int $minimumValue): CreateCategoryModelMasterRequest {
		$this->minimumValue = $minimumValue;
		return $this;
	}

	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}

	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}

	public function withMaximumValue(?int $maximumValue): CreateCategoryModelMasterRequest {
		$this->maximumValue = $maximumValue;
		return $this;
	}

	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}

	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}

	public function withOrderDirection(?string $orderDirection): CreateCategoryModelMasterRequest {
		$this->orderDirection = $orderDirection;
		return $this;
	}

	public function getScope(): ?string {
		return $this->scope;
	}

	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	public function withScope(?string $scope): CreateCategoryModelMasterRequest {
		$this->scope = $scope;
		return $this;
	}

	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}

	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}

	public function withUniqueByUserId(?bool $uniqueByUserId): CreateCategoryModelMasterRequest {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}

	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}

	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}

	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CreateCategoryModelMasterRequest {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}

	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}

	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}

	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CreateCategoryModelMasterRequest {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}

	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}

	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}

	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CreateCategoryModelMasterRequest {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}

	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}

	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}

	public function withEntryPeriodEventId(?string $entryPeriodEventId): CreateCategoryModelMasterRequest {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}

	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}

	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}

	public function withAccessPeriodEventId(?string $accessPeriodEventId): CreateCategoryModelMasterRequest {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): CreateCategoryModelMasterRequest {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateCategoryModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withMinimumValue(empty($data['minimumValue']) && $data['minimumValue'] !== 0 ? null : $data['minimumValue'])
            ->withMaximumValue(empty($data['maximumValue']) && $data['maximumValue'] !== 0 ? null : $data['maximumValue'])
            ->withOrderDirection(empty($data['orderDirection']) ? null : $data['orderDirection'])
            ->withScope(empty($data['scope']) ? null : $data['scope'])
            ->withUniqueByUserId(empty($data['uniqueByUserId']) ? null : $data['uniqueByUserId'])
            ->withCalculateFixedTimingHour(empty($data['calculateFixedTimingHour']) && $data['calculateFixedTimingHour'] !== 0 ? null : $data['calculateFixedTimingHour'])
            ->withCalculateFixedTimingMinute(empty($data['calculateFixedTimingMinute']) && $data['calculateFixedTimingMinute'] !== 0 ? null : $data['calculateFixedTimingMinute'])
            ->withCalculateIntervalMinutes(empty($data['calculateIntervalMinutes']) && $data['calculateIntervalMinutes'] !== 0 ? null : $data['calculateIntervalMinutes'])
            ->withEntryPeriodEventId(empty($data['entryPeriodEventId']) ? null : $data['entryPeriodEventId'])
            ->withAccessPeriodEventId(empty($data['accessPeriodEventId']) ? null : $data['accessPeriodEventId'])
            ->withGeneration(empty($data['generation']) ? null : $data['generation']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "orderDirection" => $this->getOrderDirection(),
            "scope" => $this->getScope(),
            "uniqueByUserId" => $this->getUniqueByUserId(),
            "calculateFixedTimingHour" => $this->getCalculateFixedTimingHour(),
            "calculateFixedTimingMinute" => $this->getCalculateFixedTimingMinute(),
            "calculateIntervalMinutes" => $this->getCalculateIntervalMinutes(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
            "generation" => $this->getGeneration(),
        );
    }
}