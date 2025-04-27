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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\Attribute;
use Gs2\Matchmaking\Model\Player;
use Gs2\Matchmaking\Model\AttributeRange;
use Gs2\Matchmaking\Model\CapacityOfRole;
use Gs2\Matchmaking\Model\TimeSpan;

class CreateGatheringByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var Player */
    private $player;
    /** @var array */
    private $attributeRanges;
    /** @var array */
    private $capacityOfRoles;
    /** @var array */
    private $allowUserIds;
    /** @var int */
    private $expiresAt;
    /** @var TimeSpan */
    private $expiresAtTimeSpan;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGatheringByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CreateGatheringByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getPlayer(): ?Player {
		return $this->player;
	}
	public function setPlayer(?Player $player) {
		$this->player = $player;
	}
	public function withPlayer(?Player $player): CreateGatheringByUserIdRequest {
		$this->player = $player;
		return $this;
	}
	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}
	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}
	public function withAttributeRanges(?array $attributeRanges): CreateGatheringByUserIdRequest {
		$this->attributeRanges = $attributeRanges;
		return $this;
	}
	public function getCapacityOfRoles(): ?array {
		return $this->capacityOfRoles;
	}
	public function setCapacityOfRoles(?array $capacityOfRoles) {
		$this->capacityOfRoles = $capacityOfRoles;
	}
	public function withCapacityOfRoles(?array $capacityOfRoles): CreateGatheringByUserIdRequest {
		$this->capacityOfRoles = $capacityOfRoles;
		return $this;
	}
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
	public function withAllowUserIds(?array $allowUserIds): CreateGatheringByUserIdRequest {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): CreateGatheringByUserIdRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getExpiresAtTimeSpan(): ?TimeSpan {
		return $this->expiresAtTimeSpan;
	}
	public function setExpiresAtTimeSpan(?TimeSpan $expiresAtTimeSpan) {
		$this->expiresAtTimeSpan = $expiresAtTimeSpan;
	}
	public function withExpiresAtTimeSpan(?TimeSpan $expiresAtTimeSpan): CreateGatheringByUserIdRequest {
		$this->expiresAtTimeSpan = $expiresAtTimeSpan;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateGatheringByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateGatheringByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGatheringByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGatheringByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPlayer(array_key_exists('player', $data) && $data['player'] !== null ? Player::fromJson($data['player']) : null)
            ->withAttributeRanges(!array_key_exists('attributeRanges', $data) || $data['attributeRanges'] === null ? null : array_map(
                function ($item) {
                    return AttributeRange::fromJson($item);
                },
                $data['attributeRanges']
            ))
            ->withCapacityOfRoles(!array_key_exists('capacityOfRoles', $data) || $data['capacityOfRoles'] === null ? null : array_map(
                function ($item) {
                    return CapacityOfRole::fromJson($item);
                },
                $data['capacityOfRoles']
            ))
            ->withAllowUserIds(!array_key_exists('allowUserIds', $data) || $data['allowUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowUserIds']
            ))
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withExpiresAtTimeSpan(array_key_exists('expiresAtTimeSpan', $data) && $data['expiresAtTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresAtTimeSpan']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "player" => $this->getPlayer() !== null ? $this->getPlayer()->toJson() : null,
            "attributeRanges" => $this->getAttributeRanges() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributeRanges()
            ),
            "capacityOfRoles" => $this->getCapacityOfRoles() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCapacityOfRoles()
            ),
            "allowUserIds" => $this->getAllowUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds()
            ),
            "expiresAt" => $this->getExpiresAt(),
            "expiresAtTimeSpan" => $this->getExpiresAtTimeSpan() !== null ? $this->getExpiresAtTimeSpan()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}