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

class VerifyIncludeParticipantRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $seasonName;
    /** @var int */
    private $season;
    /** @var int */
    private $tier;
    /** @var string */
    private $seasonGatheringName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyIncludeParticipantRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): VerifyIncludeParticipantRequest {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): VerifyIncludeParticipantRequest {
		$this->season = $season;
		return $this;
	}
	public function getTier(): ?int {
		return $this->tier;
	}
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
	public function withTier(?int $tier): VerifyIncludeParticipantRequest {
		$this->tier = $tier;
		return $this;
	}
	public function getSeasonGatheringName(): ?string {
		return $this->seasonGatheringName;
	}
	public function setSeasonGatheringName(?string $seasonGatheringName) {
		$this->seasonGatheringName = $seasonGatheringName;
	}
	public function withSeasonGatheringName(?string $seasonGatheringName): VerifyIncludeParticipantRequest {
		$this->seasonGatheringName = $seasonGatheringName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): VerifyIncludeParticipantRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyIncludeParticipantRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyIncludeParticipantRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyIncludeParticipantRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyIncludeParticipantRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withSeasonGatheringName(array_key_exists('seasonGatheringName', $data) && $data['seasonGatheringName'] !== null ? $data['seasonGatheringName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "seasonGatheringName" => $this->getSeasonGatheringName(),
            "accessToken" => $this->getAccessToken(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}