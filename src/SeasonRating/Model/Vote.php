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


class Vote implements IModel {
	/**
     * @var string
	 */
	private $voteId;
	/**
     * @var string
	 */
	private $seasonName;
	/**
     * @var string
	 */
	private $sessionName;
	/**
     * @var array
	 */
	private $writtenBallots;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getVoteId(): ?string {
		return $this->voteId;
	}
	public function setVoteId(?string $voteId) {
		$this->voteId = $voteId;
	}
	public function withVoteId(?string $voteId): Vote {
		$this->voteId = $voteId;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): Vote {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSessionName(): ?string {
		return $this->sessionName;
	}
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}
	public function withSessionName(?string $sessionName): Vote {
		$this->sessionName = $sessionName;
		return $this;
	}
	public function getWrittenBallots(): ?array {
		return $this->writtenBallots;
	}
	public function setWrittenBallots(?array $writtenBallots) {
		$this->writtenBallots = $writtenBallots;
	}
	public function withWrittenBallots(?array $writtenBallots): Vote {
		$this->writtenBallots = $writtenBallots;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Vote {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Vote {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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