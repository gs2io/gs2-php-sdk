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

class GetJoinedSeasonGatheringRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $seasonName;
    /** @var int */
    private $season;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetJoinedSeasonGatheringRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetJoinedSeasonGatheringRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): GetJoinedSeasonGatheringRequest {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): GetJoinedSeasonGatheringRequest {
		$this->season = $season;
		return $this;
	}

    public static function fromJson(?array $data): ?GetJoinedSeasonGatheringRequest {
        if ($data === null) {
            return null;
        }
        return (new GetJoinedSeasonGatheringRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
        );
    }
}