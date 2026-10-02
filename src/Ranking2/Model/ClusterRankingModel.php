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


/**
 * Cluster Ranking Model
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#clusterrankingmodel
 */
class ClusterRankingModel implements IModel {
	/**
     * @var string Cluster Ranking GRN
	 */
	private $clusterRankingModelId;
	/**
     * @var string Cluster Ranking Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Cluster Type
	 */
	private $clusterType;
	/**
     * @var int Minimum Score
	 */
	private $minimumValue;
	/**
     * @var int Maximum Score
	 */
	private $maximumValue;
	/**
     * @var bool Sum Scores
	 */
	private $sum;
	/**
     * @var string Order Direction
	 */
	private $orderDirection;
	/**
     * @var string Entry Period Event GRN
	 */
	private $entryPeriodEventId;
	/**
     * @var array Ranking Rewards
	 */
	private $rankingRewards;
	/**
     * @var string Access Period Event GRN
	 */
	private $accessPeriodEventId;
	/**
     * @var string Reward Calculation Index
	 */
	private $rewardCalculationIndex;
    /** @return string|null Cluster Ranking GRN */
	public function getClusterRankingModelId(): ?string {
		return $this->clusterRankingModelId;
	}
    /** @param string|null $clusterRankingModelId Cluster Ranking GRN */
	public function setClusterRankingModelId(?string $clusterRankingModelId) {
		$this->clusterRankingModelId = $clusterRankingModelId;
	}
    /**
     * @param string|null $clusterRankingModelId Cluster Ranking GRN
     * @return ClusterRankingModel
     */
	public function withClusterRankingModelId(?string $clusterRankingModelId): ClusterRankingModel {
		$this->clusterRankingModelId = $clusterRankingModelId;
		return $this;
	}
    /** @return string|null Cluster Ranking Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Cluster Ranking Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Cluster Ranking Model name
     * @return ClusterRankingModel
     */
	public function withName(?string $name): ClusterRankingModel {
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
     * @return ClusterRankingModel
     */
	public function withMetadata(?string $metadata): ClusterRankingModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Cluster Type */
	public function getClusterType(): ?string {
		return $this->clusterType;
	}
    /** @param string|null $clusterType Cluster Type */
	public function setClusterType(?string $clusterType) {
		$this->clusterType = $clusterType;
	}
    /**
     * @param string|null $clusterType Cluster Type
     * @return ClusterRankingModel
     */
	public function withClusterType(?string $clusterType): ClusterRankingModel {
		$this->clusterType = $clusterType;
		return $this;
	}
    /** @return int|null Minimum Score */
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
    /** @param int|null $minimumValue Minimum Score */
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
    /**
     * @param int|null $minimumValue Minimum Score
     * @return ClusterRankingModel
     */
	public function withMinimumValue(?int $minimumValue): ClusterRankingModel {
		$this->minimumValue = $minimumValue;
		return $this;
	}
    /** @return int|null Maximum Score */
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
    /** @param int|null $maximumValue Maximum Score */
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
    /**
     * @param int|null $maximumValue Maximum Score
     * @return ClusterRankingModel
     */
	public function withMaximumValue(?int $maximumValue): ClusterRankingModel {
		$this->maximumValue = $maximumValue;
		return $this;
	}
    /** @return bool|null Sum Scores */
	public function getSum(): ?bool {
		return $this->sum;
	}
    /** @param bool|null $sum Sum Scores */
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
    /**
     * @param bool|null $sum Sum Scores
     * @return ClusterRankingModel
     */
	public function withSum(?bool $sum): ClusterRankingModel {
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
     * @return ClusterRankingModel
     */
	public function withOrderDirection(?string $orderDirection): ClusterRankingModel {
		$this->orderDirection = $orderDirection;
		return $this;
	}
    /** @return string|null Entry Period Event GRN */
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
    /** @param string|null $entryPeriodEventId Entry Period Event GRN */
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
    /**
     * @param string|null $entryPeriodEventId Entry Period Event GRN
     * @return ClusterRankingModel
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): ClusterRankingModel {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
    /** @return array|null Ranking Rewards */
	public function getRankingRewards(): ?array {
		return $this->rankingRewards;
	}
    /** @param array|null $rankingRewards Ranking Rewards */
	public function setRankingRewards(?array $rankingRewards) {
		$this->rankingRewards = $rankingRewards;
	}
    /**
     * @param array|null $rankingRewards Ranking Rewards
     * @return ClusterRankingModel
     */
	public function withRankingRewards(?array $rankingRewards): ClusterRankingModel {
		$this->rankingRewards = $rankingRewards;
		return $this;
	}
    /** @return string|null Access Period Event GRN */
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
    /** @param string|null $accessPeriodEventId Access Period Event GRN */
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
    /**
     * @param string|null $accessPeriodEventId Access Period Event GRN
     * @return ClusterRankingModel
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): ClusterRankingModel {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
    /** @return string|null Reward Calculation Index */
	public function getRewardCalculationIndex(): ?string {
		return $this->rewardCalculationIndex;
	}
    /** @param string|null $rewardCalculationIndex Reward Calculation Index */
	public function setRewardCalculationIndex(?string $rewardCalculationIndex) {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
	}
    /**
     * @param string|null $rewardCalculationIndex Reward Calculation Index
     * @return ClusterRankingModel
     */
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