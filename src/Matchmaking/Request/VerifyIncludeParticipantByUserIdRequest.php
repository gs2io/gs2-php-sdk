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
 * Request for verifyIncludeParticipantByUserId: Verify if persistent gathering includes user ID by User ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#verifyincludeparticipantbyuserid
 */
class VerifyIncludeParticipantByUserIdRequest extends Gs2BasicRequest {
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
    /** @var string User ID */
    private $userId;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
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
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyIncludeParticipantByUserIdRequest {
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
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withSeasonName(?string $seasonName): VerifyIncludeParticipantByUserIdRequest {
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
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withSeason(?int $season): VerifyIncludeParticipantByUserIdRequest {
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
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withTier(?int $tier): VerifyIncludeParticipantByUserIdRequest {
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
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withSeasonGatheringName(?string $seasonGatheringName): VerifyIncludeParticipantByUserIdRequest {
		$this->seasonGatheringName = $seasonGatheringName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyIncludeParticipantByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyIncludeParticipantByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return VerifyIncludeParticipantByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyIncludeParticipantByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyIncludeParticipantByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyIncludeParticipantByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyIncludeParticipantByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withSeasonGatheringName(array_key_exists('seasonGatheringName', $data) && $data['seasonGatheringName'] !== null ? $data['seasonGatheringName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "seasonGatheringName" => $this->getSeasonGatheringName(),
            "userId" => $this->getUserId(),
            "verifyType" => $this->getVerifyType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}