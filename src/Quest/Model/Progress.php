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


/**
 * Quest Progress
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#progress
 */
class Progress implements IModel {
	/**
     * @var string Quest Progress GRN
	 */
	private $progressId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string Quest Model GRN
	 */
	private $questModelId;
	/**
     * @var int Random Seed
	 */
	private $randomSeed;
	/**
     * @var array Completion Rewards
	 */
	private $rewards;
	/**
     * @var array Failed Rewards
	 */
	private $failedRewards;
	/**
     * @var string Metadata
	 */
	private $metadata;
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
    /** @return string|null Quest Progress GRN */
	public function getProgressId(): ?string {
		return $this->progressId;
	}
    /** @param string|null $progressId Quest Progress GRN */
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}
    /**
     * @param string|null $progressId Quest Progress GRN
     * @return Progress
     */
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
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
     * @return Progress
     */
	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return Progress
     */
	public function withTransactionId(?string $transactionId): Progress {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return string|null Quest Model GRN */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
    /** @param string|null $questModelId Quest Model GRN */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
    /**
     * @param string|null $questModelId Quest Model GRN
     * @return Progress
     */
	public function withQuestModelId(?string $questModelId): Progress {
		$this->questModelId = $questModelId;
		return $this;
	}
    /** @return int|null Random Seed */
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
    /** @param int|null $randomSeed Random Seed */
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
    /**
     * @param int|null $randomSeed Random Seed
     * @return Progress
     */
	public function withRandomSeed(?int $randomSeed): Progress {
		$this->randomSeed = $randomSeed;
		return $this;
	}
    /** @return array|null Completion Rewards */
	public function getRewards(): ?array {
		return $this->rewards;
	}
    /** @param array|null $rewards Completion Rewards */
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}
    /**
     * @param array|null $rewards Completion Rewards
     * @return Progress
     */
	public function withRewards(?array $rewards): Progress {
		$this->rewards = $rewards;
		return $this;
	}
    /** @return array|null Failed Rewards */
	public function getFailedRewards(): ?array {
		return $this->failedRewards;
	}
    /** @param array|null $failedRewards Failed Rewards */
	public function setFailedRewards(?array $failedRewards) {
		$this->failedRewards = $failedRewards;
	}
    /**
     * @param array|null $failedRewards Failed Rewards
     * @return Progress
     */
	public function withFailedRewards(?array $failedRewards): Progress {
		$this->failedRewards = $failedRewards;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return Progress
     */
	public function withMetadata(?string $metadata): Progress {
		$this->metadata = $metadata;
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
     * @return Progress
     */
	public function withCreatedAt(?int $createdAt): Progress {
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
     * @return Progress
     */
	public function withUpdatedAt(?int $updatedAt): Progress {
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
     * @return Progress
     */
	public function withRevision(?int $revision): Progress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Progress {
        if ($data === null) {
            return null;
        }
        return (new Progress())
            ->withProgressId(array_key_exists('progressId', $data) && $data['progressId'] !== null ? $data['progressId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withRandomSeed(array_key_exists('randomSeed', $data) && $data['randomSeed'] !== null ? $data['randomSeed'] : null)
            ->withRewards(!array_key_exists('rewards', $data) || $data['rewards'] === null ? null : array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                $data['rewards']
            ))
            ->withFailedRewards(!array_key_exists('failedRewards', $data) || $data['failedRewards'] === null ? null : array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                $data['failedRewards']
            ))
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "progressId" => $this->getProgressId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "questModelId" => $this->getQuestModelId(),
            "randomSeed" => $this->getRandomSeed(),
            "rewards" => $this->getRewards() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards()
            ),
            "failedRewards" => $this->getFailedRewards() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFailedRewards()
            ),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}