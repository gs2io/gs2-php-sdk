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

class UpdateCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
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

	public function withNamespaceName(?string $namespaceName): UpdateCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): UpdateCategoryModelMasterRequest {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateCategoryModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateCategoryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}

	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}

	public function withMinimumValue(?int $minimumValue): UpdateCategoryModelMasterRequest {
		$this->minimumValue = $minimumValue;
		return $this;
	}

	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}

	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}

	public function withMaximumValue(?int $maximumValue): UpdateCategoryModelMasterRequest {
		$this->maximumValue = $maximumValue;
		return $this;
	}

	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}

	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}

	public function withOrderDirection(?string $orderDirection): UpdateCategoryModelMasterRequest {
		$this->orderDirection = $orderDirection;
		return $this;
	}

	public function getScope(): ?string {
		return $this->scope;
	}

	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	public function withScope(?string $scope): UpdateCategoryModelMasterRequest {
		$this->scope = $scope;
		return $this;
	}

	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}

	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}

	public function withUniqueByUserId(?bool $uniqueByUserId): UpdateCategoryModelMasterRequest {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}

	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}

	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}

	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): UpdateCategoryModelMasterRequest {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}

	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}

	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}

	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): UpdateCategoryModelMasterRequest {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}

	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}

	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}

	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): UpdateCategoryModelMasterRequest {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}

	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}

	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}

	public function withEntryPeriodEventId(?string $entryPeriodEventId): UpdateCategoryModelMasterRequest {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}

	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}

	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}

	public function withAccessPeriodEventId(?string $accessPeriodEventId): UpdateCategoryModelMasterRequest {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): UpdateCategoryModelMasterRequest {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCategoryModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withCategoryName(empty($data['categoryName']) ? null : $data['categoryName'])
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
            "categoryName" => $this->getCategoryName(),
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