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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeMessagesByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $password;
    /** @var string */
    private $userId;
    /** @var int */
    private $startAt;
    /** @var int */
    private $limit;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DescribeMessagesByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): DescribeMessagesByUserIdRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): DescribeMessagesByUserIdRequest {
		$this->password = $password;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DescribeMessagesByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getStartAt(): ?int {
		return $this->startAt;
	}

	public function setStartAt(?int $startAt) {
		$this->startAt = $startAt;
	}

	public function withStartAt(?int $startAt): DescribeMessagesByUserIdRequest {
		$this->startAt = $startAt;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeMessagesByUserIdRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMessagesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMessagesByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRoomName(empty($data['roomName']) ? null : $data['roomName'])
            ->withPassword(empty($data['password']) ? null : $data['password'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withStartAt(empty($data['startAt']) && $data['startAt'] !== 0 ? null : $data['startAt'])
            ->withLimit(empty($data['limit']) && $data['limit'] !== 0 ? null : $data['limit']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "password" => $this->getPassword(),
            "userId" => $this->getUserId(),
            "startAt" => $this->getStartAt(),
            "limit" => $this->getLimit(),
        );
    }
}