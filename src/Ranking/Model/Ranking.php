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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


class Ranking implements IModel {
	/**
     * @var int
	 */
	private $rank;
	/**
     * @var int
	 */
	private $index;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $score;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $createdAt;

	public function getRank(): ?int {
		return $this->rank;
	}

	public function setRank(?int $rank) {
		$this->rank = $rank;
	}

	public function withRank(?int $rank): Ranking {
		$this->rank = $rank;
		return $this;
	}

	public function getIndex(): ?int {
		return $this->index;
	}

	public function setIndex(?int $index) {
		$this->index = $index;
	}

	public function withIndex(?int $index): Ranking {
		$this->index = $index;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Ranking {
		$this->userId = $userId;
		return $this;
	}

	public function getScore(): ?int {
		return $this->score;
	}

	public function setScore(?int $score) {
		$this->score = $score;
	}

	public function withScore(?int $score): Ranking {
		$this->score = $score;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Ranking {
		$this->metadata = $metadata;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Ranking {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Ranking {
        if ($data === null) {
            return null;
        }
        return (new Ranking())
            ->withRank(empty($data['rank']) && $data['rank'] !== 0 ? null : $data['rank'])
            ->withIndex(empty($data['index']) && $data['index'] !== 0 ? null : $data['index'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withScore(empty($data['score']) && $data['score'] !== 0 ? null : $data['score'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "rank" => $this->getRank(),
            "index" => $this->getIndex(),
            "userId" => $this->getUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}