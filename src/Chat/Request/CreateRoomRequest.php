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

class CreateRoomRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $name;
    /** @var string */
    private $metadata;
    /** @var string */
    private $password;
    /** @var array */
    private $whiteListUserIds;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateRoomRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): CreateRoomRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateRoomRequest {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateRoomRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): CreateRoomRequest {
		$this->password = $password;
		return $this;
	}

	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}

	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}

	public function withWhiteListUserIds(?array $whiteListUserIds): CreateRoomRequest {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRoomRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateRoomRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withPassword(empty($data['password']) ? null : $data['password'])
            ->withWhiteListUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('whiteListUserIds', $data) && $data['whiteListUserIds'] !== null ? $data['whiteListUserIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
            "whiteListUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListUserIds() !== null && $this->getWhiteListUserIds() !== null ? $this->getWhiteListUserIds() : []
            ),
        );
    }
}