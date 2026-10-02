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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteSeasonGathering: Delete Season Gathering
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#deleteseasongathering
 */
class DeleteSeasonGatheringRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $seasonName;
    /** @var int Season */
    private $season;
    /** @var int Tier */
    private $tier;
    /** @var string Season Gathering Name */
    private $seasonGatheringName;
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
     * @return DeleteSeasonGatheringRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteSeasonGatheringRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Model name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Model name
     * @return DeleteSeasonGatheringRequest
     */
	public function withSeasonName(?string $seasonName): DeleteSeasonGatheringRequest {
		$this->seasonName = $seasonName;
		return $this;
	}
    /** @return int|null Season */
	public function getSeason(): ?int {
		return $this->season;
	}
    /** @param int|null $season Season */
	public function setSeason(?int $season) {
		$this->season = $season;
	}
    /**
     * @param int|null $season Season
     * @return DeleteSeasonGatheringRequest
     */
	public function withSeason(?int $season): DeleteSeasonGatheringRequest {
		$this->season = $season;
		return $this;
	}
    /** @return int|null Tier */
	public function getTier(): ?int {
		return $this->tier;
	}
    /** @param int|null $tier Tier */
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
    /**
     * @param int|null $tier Tier
     * @return DeleteSeasonGatheringRequest
     */
	public function withTier(?int $tier): DeleteSeasonGatheringRequest {
		$this->tier = $tier;
		return $this;
	}
    /** @return string|null Season Gathering Name */
	public function getSeasonGatheringName(): ?string {
		return $this->seasonGatheringName;
	}
    /** @param string|null $seasonGatheringName Season Gathering Name */
	public function setSeasonGatheringName(?string $seasonGatheringName) {
		$this->seasonGatheringName = $seasonGatheringName;
	}
    /**
     * @param string|null $seasonGatheringName Season Gathering Name
     * @return DeleteSeasonGatheringRequest
     */
	public function withSeasonGatheringName(?string $seasonGatheringName): DeleteSeasonGatheringRequest {
		$this->seasonGatheringName = $seasonGatheringName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteSeasonGatheringRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteSeasonGatheringRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withSeasonGatheringName(array_key_exists('seasonGatheringName', $data) && $data['seasonGatheringName'] !== null ? $data['seasonGatheringName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "seasonGatheringName" => $this->getSeasonGatheringName(),
        );
    }
}