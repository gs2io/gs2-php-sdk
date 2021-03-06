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

class UpdateRoomRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
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

	public function withNamespaceName(?string $namespaceName): UpdateRoomRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): UpdateRoomRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateRoomRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): UpdateRoomRequest {
		$this->password = $password;
		return $this;
	}

	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}

	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}

	public function withWhiteListUserIds(?array $whiteListUserIds): UpdateRoomRequest {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRoomRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRoomRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRoomName(empty($data['roomName']) ? null : $data['roomName'])
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
            "roomName" => $this->getRoomName(),
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