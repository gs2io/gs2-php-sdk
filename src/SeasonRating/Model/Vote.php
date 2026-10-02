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

namespace Gs2\SeasonRating\Model;

use Gs2\Core\Model\IModel;


/**
 * Vote
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#vote
 */
class Vote implements IModel {
	/**
     * @var string Vote GRN
	 */
	private $voteId;
	/**
     * @var string Season Name
	 */
	private $seasonName;
	/**
     * @var string Session Name
	 */
	private $sessionName;
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
	/**
     * @var int Revision
	 */
	private $revision;
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
    /** @return string|null Season Name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Name
     * @return Vote
     */
	public function withSeasonName(?string $seasonName): Vote {
		$this->seasonName = $seasonName;
		return $this;
	}
    /** @return string|null Session Name */
	public function getSessionName(): ?string {
		return $this->sessionName;
	}
    /** @param string|null $sessionName Session Name */
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}
    /**
     * @param string|null $sessionName Session Name
     * @return Vote
     */
	public function withSessionName(?string $sessionName): Vote {
		$this->sessionName = $sessionName;
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
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Vote
     */
	public function withRevision(?int $revision): Vote {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Vote {
        if ($data === null) {
            return null;
        }
        return (new Vote())
            ->withVoteId(array_key_exists('voteId', $data) && $data['voteId'] !== null ? $data['voteId'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSessionName(array_key_exists('sessionName', $data) && $data['sessionName'] !== null ? $data['sessionName'] : null)
            ->withWrittenBallots(!array_key_exists('writtenBallots', $data) || $data['writtenBallots'] === null ? null : array_map(
                function ($item) {
                    return WrittenBallot::fromJson($item);
                },
                $data['writtenBallots']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "voteId" => $this->getVoteId(),
            "seasonName" => $this->getSeasonName(),
            "sessionName" => $this->getSessionName(),
            "writtenBallots" => $this->getWrittenBallots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWrittenBallots()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}