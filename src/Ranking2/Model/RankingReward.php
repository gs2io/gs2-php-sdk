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
 * Ranking Reward
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#rankingreward
 */
class RankingReward implements IModel {
	/**
     * @var int Rank Threshold
	 */
	private $thresholdRank;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
    /** @return int|null Rank Threshold */
	public function getThresholdRank(): ?int {
		return $this->thresholdRank;
	}
    /** @param int|null $thresholdRank Rank Threshold */
	public function setThresholdRank(?int $thresholdRank) {
		$this->thresholdRank = $thresholdRank;
	}
    /**
     * @param int|null $thresholdRank Rank Threshold
     * @return RankingReward
     */
	public function withThresholdRank(?int $thresholdRank): RankingReward {
		$this->thresholdRank = $thresholdRank;
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
     * @return RankingReward
     */
	public function withMetadata(?string $metadata): RankingReward {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return RankingReward
     */
	public function withAcquireActions(?array $acquireActions): RankingReward {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public static function fromJson(?array $data): ?RankingReward {
        if ($data === null) {
            return null;
        }
        return (new RankingReward())
            ->withThresholdRank(array_key_exists('thresholdRank', $data) && $data['thresholdRank'] !== null ? $data['thresholdRank'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ));
    }

    public function toJson(): array {
        return array(
            "thresholdRank" => $this->getThresholdRank(),
            "metadata" => $this->getMetadata(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
        );
    }
}