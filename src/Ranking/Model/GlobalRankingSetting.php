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


/**
 * Global Ranking Setting
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#globalrankingsetting
 */
class GlobalRankingSetting implements IModel {
	/**
     * @var bool Unique By User ID
	 */
	private $uniqueByUserId;
	/**
     * @var int Calculate Interval Minutes
	 */
	private $calculateIntervalMinutes;
	/**
     * @var FixedTiming Calculate Fixed Timing
	 */
	private $calculateFixedTiming;
	/**
     * @var array Additional Scopes
	 */
	private $additionalScopes;
	/**
     * @var array Ignore User IDs
	 */
	private $ignoreUserIds;
	/**
     * @var string Generation
	 */
	private $generation;
    /** @return bool|null Unique By User ID */
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}
    /** @param bool|null $uniqueByUserId Unique By User ID */
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}
    /**
     * @param bool|null $uniqueByUserId Unique By User ID
     * @return GlobalRankingSetting
     */
	public function withUniqueByUserId(?bool $uniqueByUserId): GlobalRankingSetting {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
    /** @return int|null Calculate Interval Minutes */
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}
    /** @param int|null $calculateIntervalMinutes Calculate Interval Minutes */
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}
    /**
     * @param int|null $calculateIntervalMinutes Calculate Interval Minutes
     * @return GlobalRankingSetting
     */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): GlobalRankingSetting {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
    /** @return FixedTiming|null Calculate Fixed Timing */
	public function getCalculateFixedTiming(): ?FixedTiming {
		return $this->calculateFixedTiming;
	}
    /** @param FixedTiming|null $calculateFixedTiming Calculate Fixed Timing */
	public function setCalculateFixedTiming(?FixedTiming $calculateFixedTiming) {
		$this->calculateFixedTiming = $calculateFixedTiming;
	}
    /**
     * @param FixedTiming|null $calculateFixedTiming Calculate Fixed Timing
     * @return GlobalRankingSetting
     */
	public function withCalculateFixedTiming(?FixedTiming $calculateFixedTiming): GlobalRankingSetting {
		$this->calculateFixedTiming = $calculateFixedTiming;
		return $this;
	}
    /** @return array|null Additional Scopes */
	public function getAdditionalScopes(): ?array {
		return $this->additionalScopes;
	}
    /** @param array|null $additionalScopes Additional Scopes */
	public function setAdditionalScopes(?array $additionalScopes) {
		$this->additionalScopes = $additionalScopes;
	}
    /**
     * @param array|null $additionalScopes Additional Scopes
     * @return GlobalRankingSetting
     */
	public function withAdditionalScopes(?array $additionalScopes): GlobalRankingSetting {
		$this->additionalScopes = $additionalScopes;
		return $this;
	}
    /** @return array|null Ignore User IDs */
	public function getIgnoreUserIds(): ?array {
		return $this->ignoreUserIds;
	}
    /** @param array|null $ignoreUserIds Ignore User IDs */
	public function setIgnoreUserIds(?array $ignoreUserIds) {
		$this->ignoreUserIds = $ignoreUserIds;
	}
    /**
     * @param array|null $ignoreUserIds Ignore User IDs
     * @return GlobalRankingSetting
     */
	public function withIgnoreUserIds(?array $ignoreUserIds): GlobalRankingSetting {
		$this->ignoreUserIds = $ignoreUserIds;
		return $this;
	}
    /** @return string|null Generation */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Generation */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Generation
     * @return GlobalRankingSetting
     */
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