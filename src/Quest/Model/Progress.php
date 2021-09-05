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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;


class Progress implements IModel {
	/**
     * @var string
	 */
	private $progressId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var string
	 */
	private $questModelId;
	/**
     * @var int
	 */
	private $randomSeed;
	/**
     * @var array
	 */
	private $rewards;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getProgressId(): ?string {
		return $this->progressId;
	}

	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}

	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): Progress {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}

	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}

	public function withQuestModelId(?string $questModelId): Progress {
		$this->questModelId = $questModelId;
		return $this;
	}

	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}

	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}

	public function withRandomSeed(?int $randomSeed): Progress {
		$this->randomSeed = $randomSeed;
		return $this;
	}

	public function getRewards(): ?array {
		return $this->rewards;
	}

	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}

	public function withRewards(?array $rewards): Progress {
		$this->rewards = $rewards;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Progress {
		$this->metadata = $metadata;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Progress {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Progress {
        if ($data === null) {
            return null;
        }
        return (new Progress())
            ->withProgressId(empty($data['progressId']) ? null : $data['progressId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTransactionId(empty($data['transactionId']) ? null : $data['transactionId'])
            ->withQuestModelId(empty($data['questModelId']) ? null : $data['questModelId'])
            ->withRandomSeed(empty($data['randomSeed']) && $data['randomSeed'] !== 0 ? null : $data['randomSeed'])
            ->withRewards(array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                array_key_exists('rewards', $data) && $data['rewards'] !== null ? $data['rewards'] : []
            ))
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "progressId" => $this->getProgressId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "questModelId" => $this->getQuestModelId(),
            "randomSeed" => $this->getRandomSeed(),
            "rewards" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards() !== null && $this->getRewards() !== null ? $this->getRewards() : []
            ),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}