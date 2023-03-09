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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


class CategoryModelMaster implements IModel {
	/**
     * @var string
	 */
	private $categoryModelId;
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
     * @var int
	 */
	private $minimumValue;
	/**
     * @var int
	 */
	private $maximumValue;
	/**
     * @var string
	 */
	private $orderDirection;
	/**
     * @var string
	 */
	private $scope;
	/**
     * @var bool
	 */
	private $uniqueByUserId;
	/**
     * @var bool
	 */
	private $sum;
	/**
     * @var int
	 */
	private $calculateFixedTimingHour;
	/**
     * @var int
	 */
	private $calculateFixedTimingMinute;
	/**
     * @var int
	 */
	private $calculateIntervalMinutes;
	/**
     * @var string
	 */
	private $entryPeriodEventId;
	/**
     * @var string
	 */
	private $accessPeriodEventId;
	/**
     * @var array
	 */
	private $ignoreUserIds;
	/**
     * @var string
	 */
	private $generation;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
	public function withCategoryModelId(?string $categoryModelId): CategoryModelMaster {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CategoryModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CategoryModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CategoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
	public function withMinimumValue(?int $minimumValue): CategoryModelMaster {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
	public function withMaximumValue(?int $maximumValue): CategoryModelMaster {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
	public function withOrderDirection(?string $orderDirection): CategoryModelMaster {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	public function getScope(): ?string {
		return $this->scope;
	}
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
	public function withScope(?string $scope): CategoryModelMaster {
		$this->scope = $scope;
		return $this;
	}
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModelMaster {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
	public function getSum(): ?bool {
		return $this->sum;
	}
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
	public function withSum(?bool $sum): CategoryModelMaster {
		$this->sum = $sum;
		return $this;
	}
	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}
	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}
	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CategoryModelMaster {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}
	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}
	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}
	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CategoryModelMaster {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModelMaster {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CategoryModelMaster {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CategoryModelMaster {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
	public function getIgnoreUserIds(): ?array {
		return $this->ignoreUserIds;
	}
	public function setIgnoreUserIds(?array $ignoreUserIds) {
		$this->ignoreUserIds = $ignoreUserIds;
	}
	public function withIgnoreUserIds(?array $ignoreUserIds): CategoryModelMaster {
		$this->ignoreUserIds = $ignoreUserIds;
		return $this;
	}
	public function getGeneration(): ?string {
		return $this->generation;
	}
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
	public function withGeneration(?string $generation): CategoryModelMaster {
		$this->generation = $generation;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): CategoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): CategoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CategoryModelMaster())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withUniqueByUserId(array_key_exists('uniqueByUserId', $data) ? $data['uniqueByUserId'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withCalculateFixedTimingHour(array_key_exists('calculateFixedTimingHour', $data) && $data['calculateFixedTimingHour'] !== null ? $data['calculateFixedTimingHour'] : null)
            ->withCalculateFixedTimingMinute(array_key_exists('calculateFixedTimingMinute', $data) && $data['calculateFixedTimingMinute'] !== null ? $data['calculateFixedTimingMinute'] : null)
            ->withCalculateIntervalMinutes(array_key_exists('calculateIntervalMinutes', $data) && $data['calculateIntervalMinutes'] !== null ? $data['calculateIntervalMinutes'] : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null)
            ->withIgnoreUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('ignoreUserIds', $data) && $data['ignoreUserIds'] !== null ? $data['ignoreUserIds'] : []
            ))
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "orderDirection" => $this->getOrderDirection(),
            "scope" => $this->getScope(),
            "uniqueByUserId" => $this->getUniqueByUserId(),
            "sum" => $this->getSum(),
            "calculateFixedTimingHour" => $this->getCalculateFixedTimingHour(),
            "calculateFixedTimingMinute" => $this->getCalculateFixedTimingMinute(),
            "calculateIntervalMinutes" => $this->getCalculateIntervalMinutes(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
            "ignoreUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getIgnoreUserIds() !== null && $this->getIgnoreUserIds() !== null ? $this->getIgnoreUserIds() : []
            ),
            "generation" => $this->getGeneration(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}