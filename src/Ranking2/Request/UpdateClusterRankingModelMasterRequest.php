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

class UpdateClusterRankingModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rankingName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $clusterType;
    /** @var int */
    private $minimumValue;
    /** @var int */
    private $maximumValue;
    /** @var bool */
    private $sum;
    /** @var int */
    private $scoreTtlDays;
    /** @var string */
    private $orderDirection;
    /** @var array */
    private $rankingRewards;
    /** @var string */
    private $rewardCalculationIndex;
    /** @var string */
    private $entryPeriodEventId;
    /** @var string */
    private $accessPeriodEventId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateClusterRankingModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
	public function withRankingName(?string $rankingName): UpdateClusterRankingModelMasterRequest {
		$this->rankingName = $rankingName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateClusterRankingModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateClusterRankingModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getClusterType(): ?string {
		return $this->clusterType;
	}
	public function setClusterType(?string $clusterType) {
		$this->clusterType = $clusterType;
	}
	public function withClusterType(?string $clusterType): UpdateClusterRankingModelMasterRequest {
		$this->clusterType = $clusterType;
		return $this;
	}
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
	public function withMinimumValue(?int $minimumValue): UpdateClusterRankingModelMasterRequest {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
	public function withMaximumValue(?int $maximumValue): UpdateClusterRankingModelMasterRequest {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	public function getSum(): ?bool {
		return $this->sum;
	}
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
	public function withSum(?bool $sum): UpdateClusterRankingModelMasterRequest {
		$this->sum = $sum;
		return $this;
	}
	public function getScoreTtlDays(): ?int {
		return $this->scoreTtlDays;
	}
	public function setScoreTtlDays(?int $scoreTtlDays) {
		$this->scoreTtlDays = $scoreTtlDays;
	}
	public function withScoreTtlDays(?int $scoreTtlDays): UpdateClusterRankingModelMasterRequest {
		$this->scoreTtlDays = $scoreTtlDays;
		return $this;
	}
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
	public function withOrderDirection(?string $orderDirection): UpdateClusterRankingModelMasterRequest {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	public function getRankingRewards(): ?array {
		return $this->rankingRewards;
	}
	public function setRankingRewards(?array $rankingRewards) {
		$this->rankingRewards = $rankingRewards;
	}
	public function withRankingRewards(?array $rankingRewards): UpdateClusterRankingModelMasterRequest {
		$this->rankingRewards = $rankingRewards;
		return $this;
	}
	public function getRewardCalculationIndex(): ?string {
		return $this->rewardCalculationIndex;
	}
	public function setRewardCalculationIndex(?string $rewardCalculationIndex) {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
	}
	public function withRewardCalculationIndex(?string $rewardCalculationIndex): UpdateClusterRankingModelMasterRequest {
		$this->rewardCalculationIndex = $rewardCalculationIndex;
		return $this;
	}
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
	public function withEntryPeriodEventId(?string $entryPeriodEventId): UpdateClusterRankingModelMasterRequest {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
	public function withAccessPeriodEventId(?string $accessPeriodEventId): UpdateClusterRankingModelMasterRequest {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateClusterRankingModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateClusterRankingModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withClusterType(array_key_exists('clusterType', $data) && $data['clusterType'] !== null ? $data['clusterType'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withScoreTtlDays(array_key_exists('scoreTtlDays', $data) && $data['scoreTtlDays'] !== null ? $data['scoreTtlDays'] : null)
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
            "rankingName" => $this->getRankingName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "clusterType" => $this->getClusterType(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "scoreTtlDays" => $this->getScoreTtlDays(),
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