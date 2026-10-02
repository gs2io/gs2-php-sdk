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

namespace Gs2\Ranking2\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Ranking2\Model\AcquireAction;
use Gs2\Ranking2\Model\RankingReward;

/**
 * Request for createGlobalRankingModelMaster: Create Global Ranking Model Master
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingmodelmaster
 */
class CreateGlobalRankingModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Global Ranking Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Minimum Score */
    private $minimumValue;
    /** @var int Maximum Score */
    private $maximumValue;
    /** @var bool Sum Scores */
    private $sum;
    /** @var string Order Direction */
    private $orderDirection;
    /** @var array Ranking Rewards */
    private $rankingRewards;
    /** @var string Reward Calculation Index */
    private $rewardCalculationIndex;
    /** @var string Entry Period Event GRN */
    private $entryPeriodEventId;
    /** @var string Access Period Event GRN */
    private $accessPeriodEventId;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateGlobalRankingModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Global Ranking Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Global Ranking Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Global Ranking Model name
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withName(?string $name): CreateGlobalRankingModelMasterRequest {
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withDescription(?string $description): CreateGlobalRankingModelMasterRequest {
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateGlobalRankingModelMasterRequest {
		$this->metadata = $metadata;
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withMinimumValue(?int $minimumValue): CreateGlobalRankingModelMasterRequest {
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withMaximumValue(?int $maximumValue): CreateGlobalRankingModelMasterRequest {
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withSum(?bool $sum): CreateGlobalRankingModelMasterRequest {
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withOrderDirection(?string $orderDirection): CreateGlobalRankingModelMasterRequest {
		$this->orderDirection = $orderDirection;
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withRankingRewards(?array $rankingRewards): CreateGlobalRankingModelMasterRequest {
		$this->rankingRewards = $rankingRewards;
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withRewardCalculationIndex(?string $rewardCalculationIndex): CreateGlobalRankingModelMasterRequest {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CreateGlobalRankingModelMasterRequest {
		$this->entryPeriodEventId = $entryPeriodEventId;
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
     * @return CreateGlobalRankingModelMasterRequest
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CreateGlobalRankingModelMasterRequest {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGlobalRankingModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGlobalRankingModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withRankingRewards(!array_key_exists('rankingRewards', $data) || $data['rankingRewards'] === null ? null : array_map(
                function ($item) {
                    return RankingReward::fromJson($item);
                },
                $data['rankingRewards']
            ))
            ->withRewardCalculationIndex(array_key_exists('rewardCalculationIndex', $data) && $data['rewardCalculationIndex'] !== null ? $data['rewardCalculationIndex'] : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "orderDirection" => $this->getOrderDirection(),
            "rankingRewards" => $this->getRankingRewards() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRankingRewards()
            ),
            "rewardCalculationIndex" => $this->getRewardCalculationIndex(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
        );
    }
}