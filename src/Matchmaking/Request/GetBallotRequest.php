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
 * Request for getBallot: Get Ballot with Signatures
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#getballot
 */
class GetBallotRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rating Model name */
    private $ratingName;
    /** @var string Gathering name */
    private $gatheringName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Number of participants */
    private $numberOfPlayer;
    /** @var string Encryption Key GRN */
    private $keyId;
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
     * @return GetBallotRequest
     */
	public function withNamespaceName(?string $namespaceName): GetBallotRequest {
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
     * @return GetBallotRequest
     */
	public function withRatingName(?string $ratingName): GetBallotRequest {
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
     * @return GetBallotRequest
     */
	public function withGatheringName(?string $gatheringName): GetBallotRequest {
		$this->gatheringName = $gatheringName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return GetBallotRequest
     */
	public function withAccessToken(?string $accessToken): GetBallotRequest {
		$this->accessToken = $accessToken;
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
     * @return GetBallotRequest
     */
	public function withNumberOfPlayer(?int $numberOfPlayer): GetBallotRequest {
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
     * @return GetBallotRequest
     */
	public function withKeyId(?string $keyId): GetBallotRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBallotRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBallotRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withGatheringName(array_key_exists('gatheringName', $data) && $data['gatheringName'] !== null ? $data['gatheringName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withNumberOfPlayer(array_key_exists('numberOfPlayer', $data) && $data['numberOfPlayer'] !== null ? $data['numberOfPlayer'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "ratingName" => $this->getRatingName(),
            "gatheringName" => $this->getGatheringName(),
            "accessToken" => $this->getAccessToken(),
            "numberOfPlayer" => $this->getNumberOfPlayer(),
            "keyId" => $this->getKeyId(),
        );
    }
}