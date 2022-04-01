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

class GetBallotRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $ratingName;
    /** @var string */
    private $gatheringName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $numberOfPlayer;
    /** @var string */
    private $keyId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetBallotRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	public function withRatingName(?string $ratingName): GetBallotRequest {
		$this->ratingName = $ratingName;
		return $this;
	}

	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}

	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}

	public function withGatheringName(?string $gatheringName): GetBallotRequest {
		$this->gatheringName = $gatheringName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): GetBallotRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}

	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}

	public function withNumberOfPlayer(?int $numberOfPlayer): GetBallotRequest {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

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