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


/**
 * Category Model Master
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#categorymodelmaster
 */
class CategoryModelMaster implements IModel {
	/**
     * @var string Category Model Master GRN
	 */
	private $categoryModelId;
	/**
     * @var string Category Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Minimum Value
	 */
	private $minimumValue;
	/**
     * @var int Maximum Value
	 */
	private $maximumValue;
	/**
     * @var bool Sum Mode
	 */
	private $sum;
	/**
     * @var string Order Direction
	 */
	private $orderDirection;
	/**
     * @var string Scope
	 */
	private $scope;
	/**
     * @var GlobalRankingSetting Global Ranking Setting
	 */
	private $globalRankingSetting;
	/**
     * @var string Entry Period Event ID
	 */
	private $entryPeriodEventId;
	/**
     * @var string Access Period Event ID
	 */
	private $accessPeriodEventId;
	/**
     * @var bool Only one score is registered per user ID
	 */
	private $uniqueByUserId;
	/**
     * @var int Fixed time to start tallying scores (hour)
	 */
	private $calculateFixedTimingHour;
	/**
     * @var int Fixed time to start tallying scores (minutes)
	 */
	private $calculateFixedTimingMinute;
	/**
     * @var int Interval between score totals (minutes)
	 */
	private $calculateIntervalMinutes;
	/**
     * @var array List of Scope
	 */
	private $additionalScopes;
	/**
     * @var array List of User IDs that are not reflected in the ranking
	 */
	private $ignoreUserIds;
	/**
     * @var string Ranking Generation
	 */
	private $generation;
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
    /** @return string|null Category Model Master GRN */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
    /** @param string|null $categoryModelId Category Model Master GRN */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
    /**
     * @param string|null $categoryModelId Category Model Master GRN
     * @return CategoryModelMaster
     */
	public function withCategoryModelId(?string $categoryModelId): CategoryModelMaster {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
    /** @return string|null Category Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Category Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Category Model name
     * @return CategoryModelMaster
     */
	public function withName(?string $name): CategoryModelMaster {
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
     * @return CategoryModelMaster
     */
	public function withDescription(?string $description): CategoryModelMaster {
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
     * @return CategoryModelMaster
     */
	public function withMetadata(?string $metadata): CategoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Minimum Value */
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
    /** @param int|null $minimumValue Minimum Value */
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
    /**
     * @param int|null $minimumValue Minimum Value
     * @return CategoryModelMaster
     */
	public function withMinimumValue(?int $minimumValue): CategoryModelMaster {
		$this->minimumValue = $minimumValue;
		return $this;
	}
    /** @return int|null Maximum Value */
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
    /** @param int|null $maximumValue Maximum Value */
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
    /**
     * @param int|null $maximumValue Maximum Value
     * @return CategoryModelMaster
     */
	public function withMaximumValue(?int $maximumValue): CategoryModelMaster {
		$this->maximumValue = $maximumValue;
		return $this;
	}
    /** @return bool|null Sum Mode */
	public function getSum(): ?bool {
		return $this->sum;
	}
    /** @param bool|null $sum Sum Mode */
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
    /**
     * @param bool|null $sum Sum Mode
     * @return CategoryModelMaster
     */
	public function withSum(?bool $sum): CategoryModelMaster {
		$this->sum = $sum;
		return $this;
	}
    /** @return string|null Order Direction */
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
    /** @param string|null $orderDirection Order Direction */
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
    /**
     * @param string|null $orderDirection Order Direction
     * @return CategoryModelMaster
     */
	public function withOrderDirection(?string $orderDirection): CategoryModelMaster {
		$this->orderDirection = $orderDirection;
		return $this;
	}
    /** @return string|null Scope */
	public function getScope(): ?string {
		return $this->scope;
	}
    /** @param string|null $scope Scope */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
    /**
     * @param string|null $scope Scope
     * @return CategoryModelMaster
     */
	public function withScope(?string $scope): CategoryModelMaster {
		$this->scope = $scope;
		return $this;
	}
    /** @return GlobalRankingSetting|null Global Ranking Setting */
	public function getGlobalRankingSetting(): ?GlobalRankingSetting {
		return $this->globalRankingSetting;
	}
    /** @param GlobalRankingSetting|null $globalRankingSetting Global Ranking Setting */
	public function setGlobalRankingSetting(?GlobalRankingSetting $globalRankingSetting) {
		$this->globalRankingSetting = $globalRankingSetting;
	}
    /**
     * @param GlobalRankingSetting|null $globalRankingSetting Global Ranking Setting
     * @return CategoryModelMaster
     */
	public function withGlobalRankingSetting(?GlobalRankingSetting $globalRankingSetting): CategoryModelMaster {
		$this->globalRankingSetting = $globalRankingSetting;
		return $this;
	}
    /** @return string|null Entry Period Event ID */
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
    /** @param string|null $entryPeriodEventId Entry Period Event ID */
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
    /**
     * @param string|null $entryPeriodEventId Entry Period Event ID
     * @return CategoryModelMaster
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CategoryModelMaster {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
    /** @return string|null Access Period Event ID */
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
    /** @param string|null $accessPeriodEventId Access Period Event ID */
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
    /**
     * @param string|null $accessPeriodEventId Access Period Event ID
     * @return CategoryModelMaster
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CategoryModelMaster {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
    /**
     * @return bool|null Only one score is registered per user ID
     * @deprecated
     */
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}
    /**
     * @param bool|null $uniqueByUserId Only one score is registered per user ID
     * @deprecated
     */
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}
    /**
     * @param bool|null $uniqueByUserId Only one score is registered per user ID
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModelMaster {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
    /**
     * @return int|null Fixed time to start tallying scores (hour)
     * @deprecated
     */
	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}
    /**
     * @param int|null $calculateFixedTimingHour Fixed time to start tallying scores (hour)
     * @deprecated
     */
	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}
    /**
     * @param int|null $calculateFixedTimingHour Fixed time to start tallying scores (hour)
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CategoryModelMaster {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}
    /**
     * @return int|null Fixed time to start tallying scores (minutes)
     * @deprecated
     */
	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}
    /**
     * @param int|null $calculateFixedTimingMinute Fixed time to start tallying scores (minutes)
     * @deprecated
     */
	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}
    /**
     * @param int|null $calculateFixedTimingMinute Fixed time to start tallying scores (minutes)
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CategoryModelMaster {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}
    /**
     * @return int|null Interval between score totals (minutes)
     * @deprecated
     */
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}
    /**
     * @param int|null $calculateIntervalMinutes Interval between score totals (minutes)
     * @deprecated
     */
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}
    /**
     * @param int|null $calculateIntervalMinutes Interval between score totals (minutes)
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModelMaster {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
    /**
     * @return array|null List of Scope
     * @deprecated
     */
	public function getAdditionalScopes(): ?array {
		return $this->additionalScopes;
	}
    /**
     * @param array|null $additionalScopes List of Scope
     * @deprecated
     */
	public function setAdditionalScopes(?array $additionalScopes) {
		$this->additionalScopes = $additionalScopes;
	}
    /**
     * @param array|null $additionalScopes List of Scope
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withAdditionalScopes(?array $additionalScopes): CategoryModelMaster {
		$this->additionalScopes = $additionalScopes;
		return $this;
	}
    /**
     * @return array|null List of User IDs that are not reflected in the ranking
     * @deprecated
     */
	public function getIgnoreUserIds(): ?array {
		return $this->ignoreUserIds;
	}
    /**
     * @param array|null $ignoreUserIds List of User IDs that are not reflected in the ranking
     * @deprecated
     */
	public function setIgnoreUserIds(?array $ignoreUserIds) {
		$this->ignoreUserIds = $ignoreUserIds;
	}
    /**
     * @param array|null $ignoreUserIds List of User IDs that are not reflected in the ranking
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withIgnoreUserIds(?array $ignoreUserIds): CategoryModelMaster {
		$this->ignoreUserIds = $ignoreUserIds;
		return $this;
	}
    /**
     * @return string|null Ranking Generation
     * @deprecated
     */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /**
     * @param string|null $generation Ranking Generation
     * @deprecated
     */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Ranking Generation
     * @return CategoryModelMaster
     * @deprecated
     */
	public function withGeneration(?string $generation): CategoryModelMaster {
		$this->generation = $generation;
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
     * @return CategoryModelMaster
     */
	public function withCreatedAt(?int $createdAt): CategoryModelMaster {
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
     * @return CategoryModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): CategoryModelMaster {
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
     * @return CategoryModelMaster
     */
	public function withRevision(?int $revision): CategoryModelMaster {
		$this->revision = $revision;
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
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withGlobalRankingSetting(array_key_exists('globalRankingSetting', $data) && $data['globalRankingSetting'] !== null ? GlobalRankingSetting::fromJson($data['globalRankingSetting']) : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null)
            ->withUniqueByUserId(array_key_exists('uniqueByUserId', $data) ? $data['uniqueByUserId'] : null)
            ->withCalculateFixedTimingHour(array_key_exists('calculateFixedTimingHour', $data) && $data['calculateFixedTimingHour'] !== null ? $data['calculateFixedTimingHour'] : null)
            ->withCalculateFixedTimingMinute(array_key_exists('calculateFixedTimingMinute', $data) && $data['calculateFixedTimingMinute'] !== null ? $data['calculateFixedTimingMinute'] : null)
            ->withCalculateIntervalMinutes(array_key_exists('calculateIntervalMinutes', $data) && $data['calculateIntervalMinutes'] !== null ? $data['calculateIntervalMinutes'] : null)
            ->withAdditionalScopes(!array_key_exists('additionalScopes', $data) || $data['additionalScopes'] === null ? null : array_map(
                function ($item) {
                    return Scope::fromJson($item);
                },
                $data['additionalScopes']
            ))
            ->withIgnoreUserIds(!array_key_exists('ignoreUserIds', $data) || $data['ignoreUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['ignoreUserIds']
            ))
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "orderDirection" => $this->getOrderDirection(),
            "scope" => $this->getScope(),
            "globalRankingSetting" => $this->getGlobalRankingSetting() !== null ? $this->getGlobalRankingSetting()->toJson() : null,
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
            "uniqueByUserId" => $this->getUniqueByUserId(),
            "calculateFixedTimingHour" => $this->getCalculateFixedTimingHour(),
            "calculateFixedTimingMinute" => $this->getCalculateFixedTimingMinute(),
            "calculateIntervalMinutes" => $this->getCalculateIntervalMinutes(),
            "additionalScopes" => $this->getAdditionalScopes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAdditionalScopes()
            ),
            "ignoreUserIds" => $this->getIgnoreUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getIgnoreUserIds()
            ),
            "generation" => $this->getGeneration(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}