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


class RankingReward implements IModel {
	/**
     * @var int
	 */
	private $thresholdRank;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $acquireActions;
	public function getThresholdRank(): ?int {
		return $this->thresholdRank;
	}
	public function setThresholdRank(?int $thresholdRank) {
		$this->thresholdRank = $thresholdRank;
	}
	public function withThresholdRank(?int $thresholdRank): RankingReward {
		$this->thresholdRank = $thresholdRank;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RankingReward {
		$this->metadata = $metadata;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
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
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "thresholdRank" => $this->getThresholdRank(),
            "metadata" => $this->getMetadata(),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
        );
    }
}