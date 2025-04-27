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


class ClusterRankingModel implements IModel {
	/**
     * @var string
	 */
	private $clusterRankingModelId;
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
	private $clusterType;
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
	/**
     * @var string
	 */
	private $rewardCalculationIndex;
	public function getClusterRankingModelId(): ?string {
		return $this->clusterRankingModelId;
	}
	public function setClusterRankingModelId(?string $clusterRankingModelId) {
		$this->clusterRankingModelId = $clusterRankingModelId;
	}
	public function withClusterRankingModelId(?string $clusterRankingModelId): ClusterRankingModel {
		$this->clusterRankingModelId = $clusterRankingModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): ClusterRankingModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): ClusterRankingModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getClusterType(): ?string {
		return $this->clusterType;
	}
	public function setClusterType(?string $clusterType) {
		$this->clusterType = $clusterType;
	}
	public function withClusterType(?string $clusterType): ClusterRankingModel {
		$this->clusterType = $clusterType;
		return $this;
	}
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
	public function withMinimumValue(?int $minimumValue): ClusterRankingModel {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
	public function withMaximumValue(?int $maximumValue): ClusterRankingModel {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	public function getSum(): ?bool {
		return $this->sum;
	}
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
	public function withSum(?bool $sum): ClusterRankingModel {
		$this->sum = $sum;
		return $this;
	}
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
	public function withOrderDirection(?string $orderDirection): ClusterRankingModel {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
	public function withEntryPeriodEventId(?string $entryPeriodEventId): ClusterRankingModel {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	public function getRankingRewards(): ?array {
		return $this->rankingRewards;
	}
	public function setRankingRewards(?array $rankingRewards) {
		$this->rankingRewards = $rankingRewards;
	}
	public function withRankingRewards(?array $rankingRewards): ClusterRankingModel {
		$this->rankingRewards = $rankingRewards;
		return $this;
	}
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
	public function withAccessPeriodEventId(?string $accessPeriodEventId): ClusterRankingModel {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
	public function getRewardCalculationIndex(): ?string {
		return $this->rewardCalculationIndex;
	}
	public function setRewardCalculationIndex(?string $rewardCalculationIndex) {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
	}
	public function withRewardCalculationIndex(?string $rewardCalculationIndex): ClusterRankingModel {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
		return $this;
	}

    public static function fromJson(?array $data): ?ClusterRankingModel {
        if ($data === null) {
            return null;
        }
        return (new ClusterRankingModel())
            ->withClusterRankingModelId(array_key_exists('clusterRankingModelId', $data) && $data['clusterRankingModelId'] !== null ? $data['clusterRankingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withClusterType(array_key_exists('clusterType', $data) && $data['clusterType'] !== null ? $data['clusterType'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withRankingRewards(!array_key_exists('rankingRewards', $data) || $data['rankingRewards'] === null ? null : array_map(
                function ($item) {
                    return RankingReward::fromJson($item);
                },
                $data['rankingRewards']
            ))
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null)
            ->withRewardCalculationIndex(array_key_exists('rewardCalculationIndex', $data) && $data['rewardCalculationIndex'] !== null ? $data['rewardCalculationIndex'] : null);
    }

    public function toJson(): array {
        return array(
            "clusterRankingModelId" => $this->getClusterRankingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "clusterType" => $this->getClusterType(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "orderDirection" => $this->getOrderDirection(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "rankingRewards" => $this->getRankingRewards() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRankingRewards()
            ),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
            "rewardCalculationIndex" => $this->getRewardCalculationIndex(),
        );
    }
}