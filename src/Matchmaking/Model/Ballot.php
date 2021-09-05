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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


class Ballot implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $ratingName;
	/**
     * @var string
	 */
	private $gatheringName;
	/**
     * @var int
	 */
	private $numberOfPlayer;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Ballot {
		$this->userId = $userId;
		return $this;
	}

	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	public function withRatingName(?string $ratingName): Ballot {
		$this->ratingName = $ratingName;
		return $this;
	}

	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}

	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}

	public function withGatheringName(?string $gatheringName): Ballot {
		$this->gatheringName = $gatheringName;
		return $this;
	}

	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}

	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}

	public function withNumberOfPlayer(?int $numberOfPlayer): Ballot {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}

    public static function fromJson(?array $data): ?Ballot {
        if ($data === null) {
            return null;
        }
        return (new Ballot())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withRatingName(empty($data['ratingName']) ? null : $data['ratingName'])
            ->withGatheringName(empty($data['gatheringName']) ? null : $data['gatheringName'])
            ->withNumberOfPlayer(empty($data['numberOfPlayer']) && $data['numberOfPlayer'] !== 0 ? null : $data['numberOfPlayer']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "ratingName" => $this->getRatingName(),
            "gatheringName" => $this->getGatheringName(),
            "numberOfPlayer" => $this->getNumberOfPlayer(),
        );
    }
}