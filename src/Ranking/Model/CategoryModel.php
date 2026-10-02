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
 * Category Model
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#categorymodel
 */
class CategoryModel implements IModel {
	/**
     * @var string Category Model GRN
	 */
	private $categoryModelId;
	/**
     * @var string Category Model name
	 */
	private $name;
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
    /** @return string|null Category Model GRN */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
    /** @param string|null $categoryModelId Category Model GRN */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
    /**
     * @param string|null $categoryModelId Category Model GRN
     * @return CategoryModel
     */
	public function withCategoryModelId(?string $categoryModelId): CategoryModel {
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
     * @return CategoryModel
     */
	public function withName(?string $name): CategoryModel {
		$this->name = $name;
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
     * @return CategoryModel
     */
	public function withMetadata(?string $metadata): CategoryModel {
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
     * @return CategoryModel
     */
	public function withMinimumValue(?int $minimumValue): CategoryModel {
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
     * @return CategoryModel
     */
	public function withMaximumValue(?int $maximumValue): CategoryModel {
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
     * @return CategoryModel
     */
	public function withSum(?bool $sum): CategoryModel {
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
     * @return CategoryModel
     */
	public function withOrderDirection(?string $orderDirection): CategoryModel {
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
     * @return CategoryModel
     */
	public function withScope(?string $scope): CategoryModel {
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
     * @return CategoryModel
     */
	public function withGlobalRankingSetting(?GlobalRankingSetting $globalRankingSetting): CategoryModel {
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
     * @return CategoryModel
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CategoryModel {
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
     * @return CategoryModel
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withAdditionalScopes(?array $additionalScopes): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withIgnoreUserIds(?array $ignoreUserIds): CategoryModel {
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
     * @return CategoryModel
     * @deprecated
     */
	public function withGeneration(?string $generation): CategoryModel {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModel {
        if ($data === null) {
            return null;
        }
        return (new CategoryModel())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "name" => $this->getName(),
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
        );
    }
}