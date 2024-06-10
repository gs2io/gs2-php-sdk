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

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


class GlobalRankingModel implements IModel {
	/**
     * @var string
	 */
	private $globalRankingModelId;
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
	private $entryPeriodEventId;
	/**
     * @var array
	 */
	private $rankingRewards;
	/**
     * @var string
	 */
	private $accessPeriodEventId;
	public function getGlobalRankingModelId(): ?string {
		return $this->globalRankingModelId;
	}
	public function setGlobalRankingModelId(?string $globalRankingModelId) {
		$this->globalRankingModelId = $globalRankingModelId;
	}
	public function withGlobalRankingModelId(?string $globalRankingModelId): GlobalRankingModel {
		$this->globalRankingModelId = $globalRankingModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): GlobalRankingModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): GlobalRankingModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
	public function withMinimumValue(?int $minimumValue): GlobalRankingModel {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
	public function withMaximumValue(?int $maximumValue): GlobalRankingModel {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	public function getSum(): ?bool {
		return $this->sum;
	}
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
	public function withSum(?bool $sum): GlobalRankingModel {
		$this->sum = $sum;
		return $this;
	}
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
	public function withOrderDirection(?string $orderDirection): GlobalRankingModel {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
	public function withEntryPeriodEventId(?string $entryPeriodEventId): GlobalRankingModel {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	public function getRankingRewards(): ?array {
		return $this->rankingRewards;
	}
	public function setRankingRewards(?array $rankingRewards) {
		$this->rankingRewards = $rankingRewards;
	}
	public function withRankingRewards(?array $rankingRewards): GlobalRankingModel {
		$this->rankingRewards = $rankingRewards;
		return $this;
	}
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
	public function withAccessPeriodEventId(?string $accessPeriodEventId): GlobalRankingModel {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?GlobalRankingModel {
        if ($data === null) {
            return null;
        }
        return (new GlobalRankingModel())
            ->withGlobalRankingModelId(array_key_exists('globalRankingModelId', $data) && $data['globalRankingModelId'] !== null ? $data['globalRankingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withRankingRewards(array_map(
                function ($item) {
                    return RankingReward::fromJson($item);
                },
                array_key_exists('rankingRewards', $data) && $data['rankingRewards'] !== null ? $data['rankingRewards'] : []
            ))
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "globalRankingModelId" => $this->getGlobalRankingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "orderDirection" => $this->getOrderDirection(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "rankingRewards" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRankingRewards() !== null && $this->getRankingRewards() !== null ? $this->getRankingRewards() : []
            ),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
        );
    }
}