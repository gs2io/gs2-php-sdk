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

class GetJoinedSeasonGatheringByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $seasonName;
    /** @var int */
    private $season;
    /** @var string */
    private $timeOffsetToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetJoinedSeasonGatheringByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetJoinedSeasonGatheringByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): GetJoinedSeasonGatheringByUserIdRequest {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): GetJoinedSeasonGatheringByUserIdRequest {
		$this->season = $season;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): GetJoinedSeasonGatheringByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetJoinedSeasonGatheringByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetJoinedSeasonGatheringByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}