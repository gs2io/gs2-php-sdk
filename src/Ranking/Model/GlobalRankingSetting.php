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


class GlobalRankingSetting implements IModel {
	/**
     * @var bool
	 */
	private $uniqueByUserId;
	/**
     * @var int
	 */
	private $calculateIntervalMinutes;
	/**
     * @var FixedTiming
	 */
	private $calculateFixedTiming;
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
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}
	public function withUniqueByUserId(?bool $uniqueByUserId): GlobalRankingSetting {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): GlobalRankingSetting {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
	public function getCalculateFixedTiming(): ?FixedTiming {
		return $this->calculateFixedTiming;
	}
	public function setCalculateFixedTiming(?FixedTiming $calculateFixedTiming) {
		$this->calculateFixedTiming = $calculateFixedTiming;
	}
	public function withCalculateFixedTiming(?FixedTiming $calculateFixedTiming): GlobalRankingSetting {
		$this->calculateFixedTiming = $calculateFixedTiming;
		return $this;
	}
	public function getAdditionalScopes(): ?array {
		return $this->additionalScopes;
	}
	public function setAdditionalScopes(?array $additionalScopes) {
		$this->additionalScopes = $additionalScopes;
	}
	public function withAdditionalScopes(?array $additionalScopes): GlobalRankingSetting {
		$this->additionalScopes = $additionalScopes;
		return $this;
	}
	public function getIgnoreUserIds(): ?array {
		return $this->ignoreUserIds;
	}
	public function setIgnoreUserIds(?array $ignoreUserIds) {
		$this->ignoreUserIds = $ignoreUserIds;
	}
	public function withIgnoreUserIds(?array $ignoreUserIds): GlobalRankingSetting {
		$this->ignoreUserIds = $ignoreUserIds;
		return $this;
	}
	public function getGeneration(): ?string {
		return $this->generation;
	}
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
	public function withGeneration(?string $generation): GlobalRankingSetting {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?GlobalRankingSetting {
        if ($data === null) {
            return null;
        }
        return (new GlobalRankingSetting())
            ->withUniqueByUserId(array_key_exists('uniqueByUserId', $data) ? $data['uniqueByUserId'] : null)
            ->withCalculateIntervalMinutes(array_key_exists('calculateIntervalMinutes', $data) && $data['calculateIntervalMinutes'] !== null ? $data['calculateIntervalMinutes'] : null)
            ->withCalculateFixedTiming(array_key_exists('calculateFixedTiming', $data) && $data['calculateFixedTiming'] !== null ? FixedTiming::fromJson($data['calculateFixedTiming']) : null)
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
            "uniqueByUserId" => $this->getUniqueByUserId(),
            "calculateIntervalMinutes" => $this->getCalculateIntervalMinutes(),
            "calculateFixedTiming" => $this->getCalculateFixedTiming() !== null ? $this->getCalculateFixedTiming()->toJson() : null,
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