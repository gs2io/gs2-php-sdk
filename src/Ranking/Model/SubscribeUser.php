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
 * Subscribed User
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#subscribeuser
 */
class SubscribeUser implements IModel {
	/**
     * @var string Subscription Target GRN
	 */
	private $subscribeUserId;
	/**
     * @var string Category Model name
	 */
	private $categoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Target User ID
	 */
	private $targetUserId;
    /** @return string|null Subscription Target GRN */
	public function getSubscribeUserId(): ?string {
		return $this->subscribeUserId;
	}
    /** @param string|null $subscribeUserId Subscription Target GRN */
	public function setSubscribeUserId(?string $subscribeUserId) {
		$this->subscribeUserId = $subscribeUserId;
	}
    /**
     * @param string|null $subscribeUserId Subscription Target GRN
     * @return SubscribeUser
     */
	public function withSubscribeUserId(?string $subscribeUserId): SubscribeUser {
		$this->subscribeUserId = $subscribeUserId;
		return $this;
	}
    /** @return string|null Category Model name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Model name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Model name
     * @return SubscribeUser
     */
	public function withCategoryName(?string $categoryName): SubscribeUser {
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
     * @return SubscribeUser
     */
	public function withUserId(?string $userId): SubscribeUser {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Target User ID */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId Target User ID */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId Target User ID
     * @return SubscribeUser
     */
	public function withTargetUserId(?string $targetUserId): SubscribeUser {
		$this->targetUserId = $targetUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeUser {
        if ($data === null) {
            return null;
        }
        return (new SubscribeUser())
            ->withSubscribeUserId(array_key_exists('subscribeUserId', $data) && $data['subscribeUserId'] !== null ? $data['subscribeUserId'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeUserId" => $this->getSubscribeUserId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
        );
    }
}