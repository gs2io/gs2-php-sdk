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


class CategoryModel implements IModel {
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
     * @var bool
	 */
	private $sum;
	/**
     * @var string
	 */
	private $orderDirection;
	/**
     * @var string
	 */
	private $scope;
	/**
     * @var GlobalRankingSetting
	 */
	private $globalRankingSetting;
	/**
     * @var string
	 */
	private $entryPeriodEventId;
	/**
     * @var string
	 */
	private $accessPeriodEventId;
	/**
     * @var bool
	 */
	private $uniqueByUserId;
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
     * @var array
	 */
	private $additionalScopes;
	/**
     * @var array
	 */
	private $ignoreUserIds;
	/**
     * @var string
	 */
	private $generation;
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
	public function withCategoryModelId(?string $categoryModelId): CategoryModel {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CategoryModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CategoryModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
	public function withMinimumValue(?int $minimumValue): CategoryModel {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
	public function withMaximumValue(?int $maximumValue): CategoryModel {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	public function getSum(): ?bool {
		return $this->sum;
	}
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
	public function withSum(?bool $sum): CategoryModel {
		$this->sum = $sum;
		return $this;
	}
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
	public function withOrderDirection(?string $orderDirection): CategoryModel {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	public function getScope(): ?string {
		return $this->scope;
	}
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
	public function withScope(?string $scope): CategoryModel {
		$this->scope = $scope;
		return $this;
	}
	public function getGlobalRankingSetting(): ?GlobalRankingSetting {
		return $this->globalRankingSetting;
	}
	public function setGlobalRankingSetting(?GlobalRankingSetting $globalRankingSetting) {
		$this->globalRankingSetting = $globalRankingSetting;
	}
	public function withGlobalRankingSetting(?GlobalRankingSetting $globalRankingSetting): CategoryModel {
		$this->globalRankingSetting = $globalRankingSetting;
		return $this;
	}
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CategoryModel {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CategoryModel {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}
    /**
     * @deprecated
     */
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}
    /**
     * @deprecated
     */
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModel {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}
    /**
     * @deprecated
     */
	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}
    /**
     * @deprecated
     */
	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CategoryModel {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}
    /**
     * @deprecated
     */
	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}
    /**
     * @deprecated
     */
	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CategoryModel {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}
    /**
     * @deprecated
     */
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}
    /**
     * @deprecated
     */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModel {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getAdditionalScopes(): ?array {
		return $this->additionalScopes;
	}
    /**
     * @deprecated
     */
	public function setAdditionalScopes(?array $additionalScopes) {
		$this->additionalScopes = $additionalScopes;
	}
    /**
     * @deprecated
     */
	public function withAdditionalScopes(?array $additionalScopes): CategoryModel {
		$this->additionalScopes = $additionalScopes;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getIgnoreUserIds(): ?array {
		return $this->ignoreUserIds;
	}
    /**
     * @deprecated
     */
	public function setIgnoreUserIds(?array $ignoreUserIds) {
		$this->ignoreUserIds = $ignoreUserIds;
	}
    /**
     * @deprecated
     */
	public function withIgnoreUserIds(?array $ignoreUserIds): CategoryModel {
		$this->ignoreUserIds = $ignoreUserIds;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /**
     * @deprecated
     */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
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