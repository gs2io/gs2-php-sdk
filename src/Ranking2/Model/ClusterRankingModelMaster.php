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
 * Cluster Ranking Model Master
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#clusterrankingmodelmaster
 */
class ClusterRankingModelMaster implements IModel {
	/**
     * @var string Cluster Ranking Master GRN
	 */
	private $clusterRankingModelId;
	/**
     * @var string Cluster Ranking Model name
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
    /** @return string|null Cluster Ranking Master GRN */
	public function getClusterRankingModelId(): ?string {
		return $this->clusterRankingModelId;
	}
    /** @param string|null $clusterRankingModelId Cluster Ranking Master GRN */
	public function setClusterRankingModelId(?string $clusterRankingModelId) {
		$this->clusterRankingModelId = $clusterRankingModelId;
	}
    /**
     * @param string|null $clusterRankingModelId Cluster Ranking Master GRN
     * @return ClusterRankingModelMaster
     */
	public function withClusterRankingModelId(?string $clusterRankingModelId): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withName(?string $name): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withDescription(?string $description): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withMetadata(?string $metadata): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withClusterType(?string $clusterType): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withMinimumValue(?int $minimumValue): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withMaximumValue(?int $maximumValue): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withSum(?bool $sum): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withOrderDirection(?string $orderDirection): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withRankingRewards(?array $rankingRewards): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withRewardCalculationIndex(?string $rewardCalculationIndex): ClusterRankingModelMaster {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
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
     * @return ClusterRankingModelMaster
     */
	public function withCreatedAt(?int $createdAt): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): ClusterRankingModelMaster {
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
     * @return ClusterRankingModelMaster
     */
	public function withRevision(?int $revision): ClusterRankingModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ClusterRankingModelMaster {
        if ($data === null) {
            return null;
        }
        return (new ClusterRankingModelMaster())
            ->withClusterRankingModelId(array_key_exists('clusterRankingModelId', $data) && $data['clusterRankingModelId'] !== null ? $data['clusterRankingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            ->withRewardCalculationIndex(array_key_exists('rewardCalculationIndex', $data) && $data['rewardCalculationIndex'] !== null ? $data['rewardCalculationIndex'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "clusterRankingModelId" => $this->getClusterRankingModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}