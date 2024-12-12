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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;


class Like implements IModel {
	/**
     * @var string
	 */
	private $likeId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $name;
	public function getLikeId(): ?string {
		return $this->likeId;
	}
	public function setLikeId(?string $likeId) {
		$this->likeId = $likeId;
	}
	public function withLikeId(?string $likeId): Like {
		$this->likeId = $likeId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Like {
		$this->userId = $userId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Like {
		$this->name = $name;
		return $this;
	}

    public static function fromJson(?array $data): ?Like {
        if ($data === null) {
            return null;
        }
        return (new Like())
            ->withLikeId(array_key_exists('likeId', $data) && $data['likeId'] !== null ? $data['likeId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null);
    }

    public function toJson(): array {
        return array(
            "likeId" => $this->getLikeId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
        );
    }
}