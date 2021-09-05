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

class PostRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $category;
    /** @var string */
    private $metadata;
    /** @var string */
    private $password;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): PostRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): PostRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): PostRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getCategory(): ?int {
		return $this->category;
	}

	public function setCategory(?int $category) {
		$this->category = $category;
	}

	public function withCategory(?int $category): PostRequest {
		$this->category = $category;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): PostRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): PostRequest {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?PostRequest {
        if ($data === null) {
            return null;
        }
        return (new PostRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRoomName(empty($data['roomName']) ? null : $data['roomName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withCategory(empty($data['category']) && $data['category'] !== 0 ? null : $data['category'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withPassword(empty($data['password']) ? null : $data['password']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "accessToken" => $this->getAccessToken(),
            "category" => $this->getCategory(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
        );
    }
}