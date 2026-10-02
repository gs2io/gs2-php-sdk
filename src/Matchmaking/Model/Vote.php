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


/**
 * Vote
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#vote
 */
class Vote implements IModel {
	/**
     * @var string Vote GRN
	 */
	private $voteId;
	/**
     * @var string Rating Model name
	 */
	private $ratingName;
	/**
     * @var string Gathering name
	 */
	private $gatheringName;
	/**
     * @var array List of Written Ballots
	 */
	private $writtenBallots;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Vote GRN */
	public function getVoteId(): ?string {
		return $this->voteId;
	}
    /** @param string|null $voteId Vote GRN */
	public function setVoteId(?string $voteId) {
		$this->voteId = $voteId;
	}
    /**
     * @param string|null $voteId Vote GRN
     * @return Vote
     */
	public function withVoteId(?string $voteId): Vote {
		$this->voteId = $voteId;
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
     * @return Vote
     */
	public function withRatingName(?string $ratingName): Vote {
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
     * @return Vote
     */
	public function withGatheringName(?string $gatheringName): Vote {
		$this->gatheringName = $gatheringName;
		return $this;
	}
    /** @return array|null List of Written Ballots */
	public function getWrittenBallots(): ?array {
		return $this->writtenBallots;
	}
    /** @param array|null $writtenBallots List of Written Ballots */
	public function setWrittenBallots(?array $writtenBallots) {
		$this->writtenBallots = $writtenBallots;
	}
    /**
     * @param array|null $writtenBallots List of Written Ballots
     * @return Vote
     */
	public function withWrittenBallots(?array $writtenBallots): Vote {
		$this->writtenBallots = $writtenBallots;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Vote
     */
	public function withCreatedAt(?int $createdAt): Vote {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Vote
     */
	public function withUpdatedAt(?int $updatedAt): Vote {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Vote {
        if ($data === null) {
            return null;
        }
        return (new Vote())
            ->withVoteId(array_key_exists('voteId', $data) && $data['voteId'] !== null ? $data['voteId'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withGatheringName(array_key_exists('gatheringName', $data) && $data['gatheringName'] !== null ? $data['gatheringName'] : null)
            ->withWrittenBallots(!array_key_exists('writtenBallots', $data) || $data['writtenBallots'] === null ? null : array_map(
                function ($item) {
                    return WrittenBallot::fromJson($item);
                },
                $data['writtenBallots']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "voteId" => $this->getVoteId(),
            "ratingName" => $this->getRatingName(),
            "gatheringName" => $this->getGatheringName(),
            "writtenBallots" => $this->getWrittenBallots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWrittenBallots()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}