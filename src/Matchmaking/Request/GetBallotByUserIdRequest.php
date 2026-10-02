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
 * Request for getBallotByUserId: Create ballot with signatures, specifying user ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#getballotbyuserid
 */
class GetBallotByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rating Model name */
    private $ratingName;
    /** @var string Gathering name */
    private $gatheringName;
    /** @var string User ID */
    private $userId;
    /** @var int Number of participants */
    private $numberOfPlayer;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetBallotByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetBallotByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rating Model name */
	public function getRatingName(): ?string {
		return $this->ratingName;
	}
    /** @param string|null $ratingName Rating Model name */
	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}
    /**
     * @param string|null $ratingName Rating Model name
     * @return GetBallotByUserIdRequest
     */
	public function withRatingName(?string $ratingName): GetBallotByUserIdRequest {
		$this->ratingName = $ratingName;
		return $this;
	}
    /** @return string|null Gathering name */
	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}
    /** @param string|null $gatheringName Gathering name */
	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}
    /**
     * @param string|null $gatheringName Gathering name
     * @return GetBallotByUserIdRequest
     */
	public function withGatheringName(?string $gatheringName): GetBallotByUserIdRequest {
		$this->gatheringName = $gatheringName;
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
     * @return GetBallotByUserIdRequest
     */
	public function withUserId(?string $userId): GetBallotByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Number of participants */
	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}
    /** @param int|null $numberOfPlayer Number of participants */
	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}
    /**
     * @param int|null $numberOfPlayer Number of participants
     * @return GetBallotByUserIdRequest
     */
	public function withNumberOfPlayer(?int $numberOfPlayer): GetBallotByUserIdRequest {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return GetBallotByUserIdRequest
     */
	public function withKeyId(?string $keyId): GetBallotByUserIdRequest {
		$this->keyId = $keyId;
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
     * @return GetBallotByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetBallotByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBallotByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBallotByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withGatheringName(array_key_exists('gatheringName', $data) && $data['gatheringName'] !== null ? $data['gatheringName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withNumberOfPlayer(array_key_exists('numberOfPlayer', $data) && $data['numberOfPlayer'] !== null ? $data['numberOfPlayer'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "ratingName" => $this->getRatingName(),
            "gatheringName" => $this->getGatheringName(),
            "userId" => $this->getUserId(),
            "numberOfPlayer" => $this->getNumberOfPlayer(),
            "keyId" => $this->getKeyId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}