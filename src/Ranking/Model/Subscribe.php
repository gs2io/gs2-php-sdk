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


class Subscribe implements IModel {
	/**
     * @var string
	 */
	private $subscribeId;
	/**
     * @var string
	 */
	private $categoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $targetUserIds;
	/**
     * @var array
	 */
	private $subscribedUserIds;
	/**
     * @var int
	 */
	private $createdAt;
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
		return $this;
	}
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): Subscribe {
		$this->categoryName = $categoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Subscribe {
		$this->userId = $userId;
		return $this;
	}
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}
	public function withTargetUserIds(?array $targetUserIds): Subscribe {
		$this->targetUserIds = $targetUserIds;
		return $this;
	}
	public function getSubscribedUserIds(): ?array {
		return $this->subscribedUserIds;
	}
	public function setSubscribedUserIds(?array $subscribedUserIds) {
		$this->subscribedUserIds = $subscribedUserIds;
	}
	public function withSubscribedUserIds(?array $subscribedUserIds): Subscribe {
		$this->subscribedUserIds = $subscribedUserIds;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Subscribe {
		$this->createdAt = $createdAt;
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
            ->withTargetUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('targetUserIds', $data) && $data['targetUserIds'] !== null ? $data['targetUserIds'] : []
            ))
            ->withSubscribedUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('subscribedUserIds', $data) && $data['subscribedUserIds'] !== null ? $data['subscribedUserIds'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeId" => $this->getSubscribeId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "targetUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetUserIds() !== null && $this->getTargetUserIds() !== null ? $this->getTargetUserIds() : []
            ),
            "subscribedUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getSubscribedUserIds() !== null && $this->getSubscribedUserIds() !== null ? $this->getSubscribedUserIds() : []
            ),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}