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

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


/**
 * Subscribe
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#subscribe
 */
class Subscribe implements IModel {
	/**
     * @var string Subscribe Score GRN
	 */
	private $subscribeId;
	/**
     * @var string Subscribe Ranking Model name
	 */
	private $rankingName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Subscribe Target User IDs
	 */
	private $targetUserIds;
	/**
     * @var array Subscribe From User IDs
	 */
	private $fromUserIds;
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
    /** @return string|null Subscribe Score GRN */
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}
    /** @param string|null $subscribeId Subscribe Score GRN */
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}
    /**
     * @param string|null $subscribeId Subscribe Score GRN
     * @return Subscribe
     */
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
		return $this;
	}
    /** @return string|null Subscribe Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Subscribe Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Subscribe Ranking Model name
     * @return Subscribe
     */
	public function withRankingName(?string $rankingName): Subscribe {
		$this->rankingName = $rankingName;
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
     * @return Subscribe
     */
	public function withUserId(?string $userId): Subscribe {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Subscribe Target User IDs */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}
    /** @param array|null $targetUserIds Subscribe Target User IDs */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}
    /**
     * @param array|null $targetUserIds Subscribe Target User IDs
     * @return Subscribe
     */
	public function withTargetUserIds(?array $targetUserIds): Subscribe {
		$this->targetUserIds = $targetUserIds;
		return $this;
	}
    /** @return array|null Subscribe From User IDs */
	public function getFromUserIds(): ?array {
		return $this->fromUserIds;
	}
    /** @param array|null $fromUserIds Subscribe From User IDs */
	public function setFromUserIds(?array $fromUserIds) {
		$this->fromUserIds = $fromUserIds;
	}
    /**
     * @param array|null $fromUserIds Subscribe From User IDs
     * @return Subscribe
     */
	public function withFromUserIds(?array $fromUserIds): Subscribe {
		$this->fromUserIds = $fromUserIds;
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
     * @return Subscribe
     */
	public function withCreatedAt(?int $createdAt): Subscribe {
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
     * @return Subscribe
     */
	public function withUpdatedAt(?int $updatedAt): Subscribe {
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
     * @return Subscribe
     */
	public function withRevision(?int $revision): Subscribe {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Subscribe {
        if ($data === null) {
            return null;
        }
        return (new Subscribe())
            ->withSubscribeId(array_key_exists('subscribeId', $data) && $data['subscribeId'] !== null ? $data['subscribeId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserIds(!array_key_exists('targetUserIds', $data) || $data['targetUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['targetUserIds']
            ))
            ->withFromUserIds(!array_key_exists('fromUserIds', $data) || $data['fromUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['fromUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeId" => $this->getSubscribeId(),
            "rankingName" => $this->getRankingName(),
            "userId" => $this->getUserId(),
            "targetUserIds" => $this->getTargetUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetUserIds()
            ),
            "fromUserIds" => $this->getFromUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getFromUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}