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


/**
 * Subscription
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribe
 */
class Subscribe implements IModel {
	/**
     * @var string Subscription GRN
	 */
	private $subscribeId;
	/**
     * @var string Category Name
	 */
	private $categoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Target User IDs
	 */
	private $targetUserIds;
	/**
     * @var array Subscribed User IDs
	 */
	private $subscribedUserIds;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Subscription GRN */
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}
    /** @param string|null $subscribeId Subscription GRN */
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}
    /**
     * @param string|null $subscribeId Subscription GRN
     * @return Subscribe
     */
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
		return $this;
	}
    /** @return string|null Category Name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Name
     * @return Subscribe
     */
	public function withCategoryName(?string $categoryName): Subscribe {
		$this->categoryName = $categoryName;
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
    /** @return array|null Target User IDs */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}
    /** @param array|null $targetUserIds Target User IDs */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}
    /**
     * @param array|null $targetUserIds Target User IDs
     * @return Subscribe
     */
	public function withTargetUserIds(?array $targetUserIds): Subscribe {
		$this->targetUserIds = $targetUserIds;
		return $this;
	}
    /** @return array|null Subscribed User IDs */
	public function getSubscribedUserIds(): ?array {
		return $this->subscribedUserIds;
	}
    /** @param array|null $subscribedUserIds Subscribed User IDs */
	public function setSubscribedUserIds(?array $subscribedUserIds) {
		$this->subscribedUserIds = $subscribedUserIds;
	}
    /**
     * @param array|null $subscribedUserIds Subscribed User IDs
     * @return Subscribe
     */
	public function withSubscribedUserIds(?array $subscribedUserIds): Subscribe {
		$this->subscribedUserIds = $subscribedUserIds;
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
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserIds(!array_key_exists('targetUserIds', $data) || $data['targetUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['targetUserIds']
            ))
            ->withSubscribedUserIds(!array_key_exists('subscribedUserIds', $data) || $data['subscribedUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['subscribedUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeId" => $this->getSubscribeId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "targetUserIds" => $this->getTargetUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetUserIds()
            ),
            "subscribedUserIds" => $this->getSubscribedUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getSubscribedUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}