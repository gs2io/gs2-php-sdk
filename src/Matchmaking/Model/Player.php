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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


class Player implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $attributes;
	/**
     * @var string
	 */
	private $roleName;
	/**
     * @var array
	 */
	private $denyUserIds;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Player {
		$this->userId = $userId;
		return $this;
	}

	public function getAttributes(): ?array {
		return $this->attributes;
	}

	public function setAttributes(?array $attributes) {
		$this->attributes = $attributes;
	}

	public function withAttributes(?array $attributes): Player {
		$this->attributes = $attributes;
		return $this;
	}

	public function getRoleName(): ?string {
		return $this->roleName;
	}

	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}

	public function withRoleName(?string $roleName): Player {
		$this->roleName = $roleName;
		return $this;
	}

	public function getDenyUserIds(): ?array {
		return $this->denyUserIds;
	}

	public function setDenyUserIds(?array $denyUserIds) {
		$this->denyUserIds = $denyUserIds;
	}

	public function withDenyUserIds(?array $denyUserIds): Player {
		$this->denyUserIds = $denyUserIds;
		return $this;
	}

    public static function fromJson(?array $data): ?Player {
        if ($data === null) {
            return null;
        }
        return (new Player())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withAttributes(array_map(
                function ($item) {
                    return Attribute::fromJson($item);
                },
                array_key_exists('attributes', $data) && $data['attributes'] !== null ? $data['attributes'] : []
            ))
            ->withRoleName(empty($data['roleName']) ? null : $data['roleName'])
            ->withDenyUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('denyUserIds', $data) && $data['denyUserIds'] !== null ? $data['denyUserIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "attributes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributes() !== null && $this->getAttributes() !== null ? $this->getAttributes() : []
            ),
            "roleName" => $this->getRoleName(),
            "denyUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getDenyUserIds() !== null && $this->getDenyUserIds() !== null ? $this->getDenyUserIds() : []
            ),
        );
    }
}