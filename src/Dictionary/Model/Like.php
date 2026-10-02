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


/**
 * Entry registered as a favorite
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#like
 */
class Like implements IModel {
	/**
     * @var string Like Entry GRN
	 */
	private $likeId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Entry Model name
	 */
	private $name;
    /** @return string|null Like Entry GRN */
	public function getLikeId(): ?string {
		return $this->likeId;
	}
    /** @param string|null $likeId Like Entry GRN */
	public function setLikeId(?string $likeId) {
		$this->likeId = $likeId;
	}
    /**
     * @param string|null $likeId Like Entry GRN
     * @return Like
     */
	public function withLikeId(?string $likeId): Like {
		$this->likeId = $likeId;
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
     * @return Like
     */
	public function withUserId(?string $userId): Like {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Entry Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Entry Model name
     * @return Like
     */
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