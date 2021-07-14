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


class SubscribeUser implements IModel {
	/**
     * @var string
	 */
	private $categoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $targetUserId;

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): SubscribeUser {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SubscribeUser {
		$this->userId = $userId;
		return $this;
	}

	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}

	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}

	public function withTargetUserId(?string $targetUserId): SubscribeUser {
		$this->targetUserId = $targetUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeUser {
        if ($data === null) {
            return null;
        }
        return (new SubscribeUser())
            ->withCategoryName(empty($data['categoryName']) ? null : $data['categoryName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTargetUserId(empty($data['targetUserId']) ? null : $data['targetUserId']);
    }

    public function toJson(): array {
        return array(
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
        );
    }
}