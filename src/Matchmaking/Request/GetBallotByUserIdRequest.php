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

class GetBallotByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $ratingName;
    /** @var string */
    private $gatheringName;
    /** @var string */
    private $userId;
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

	public function withNamespaceName(?string $namespaceName): GetBallotByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	public function withRatingName(?string $ratingName): GetBallotByUserIdRequest {
		$this->ratingName = $ratingName;
		return $this;
	}

	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}

	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}

	public function withGatheringName(?string $gatheringName): GetBallotByUserIdRequest {
		$this->gatheringName = $gatheringName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): GetBallotByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}

	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}

	public function withNumberOfPlayer(?int $numberOfPlayer): GetBallotByUserIdRequest {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): GetBallotByUserIdRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBallotByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBallotByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRatingName(empty($data['ratingName']) ? null : $data['ratingName'])
            ->withGatheringName(empty($data['gatheringName']) ? null : $data['gatheringName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withNumberOfPlayer(empty($data['numberOfPlayer']) && $data['numberOfPlayer'] !== 0 ? null : $data['numberOfPlayer'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "ratingName" => $this->getRatingName(),
            "gatheringName" => $this->getGatheringName(),
            "userId" => $this->getUserId(),
            "numberOfPlayer" => $this->getNumberOfPlayer(),
            "keyId" => $this->getKeyId(),
        );
    }
}