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

/**
 * Request for createGatheringByUserId: Create a Gathering by User ID and start recruiting
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#creategatheringbyuserid
 */
class CreateGatheringByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var Player Own player information */
    private $player;
    /** @var array Recruitment Requirements */
    private $attributeRanges;
    /** @var array List of Role Capacities */
    private $capacityOfRoles;
    /** @var array Allowed User IDs */
    private $allowUserIds;
    /** @var int Gathering Expiration Time */
    private $expiresAt;
    /** @var TimeSpan Time to expiration */
    private $expiresAtTimeSpan;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateGatheringByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateGatheringByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateGatheringByUserIdRequest
     */
	public function withUserId(?string $userId): CreateGatheringByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return Player|null Own player information */
	public function getPlayer(): ?Player {
		return $this->player;
	}
    /** @param Player|null $player Own player information */
	public function setPlayer(?Player $player) {
		$this->player = $player;
	}
    /**
     * @param Player|null $player Own player information
     * @return CreateGatheringByUserIdRequest
     */
	public function withPlayer(?Player $player): CreateGatheringByUserIdRequest {
		$this->player = $player;
		return $this;
	}
    /** @return array|null Recruitment Requirements */
	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}
    /** @param array|null $attributeRanges Recruitment Requirements */
	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}
    /**
     * @param array|null $attributeRanges Recruitment Requirements
     * @return CreateGatheringByUserIdRequest
     */
	public function withAttributeRanges(?array $attributeRanges): CreateGatheringByUserIdRequest {
		$this->attributeRanges = $attributeRanges;
		return $this;
	}
    /** @return array|null List of Role Capacities */
	public function getCapacityOfRoles(): ?array {
		return $this->capacityOfRoles;
	}
    /** @param array|null $capacityOfRoles List of Role Capacities */
	public function setCapacityOfRoles(?array $capacityOfRoles) {
		$this->capacityOfRoles = $capacityOfRoles;
	}
    /**
     * @param array|null $capacityOfRoles List of Role Capacities
     * @return CreateGatheringByUserIdRequest
     */
	public function withCapacityOfRoles(?array $capacityOfRoles): CreateGatheringByUserIdRequest {
		$this->capacityOfRoles = $capacityOfRoles;
		return $this;
	}
    /** @return array|null Allowed User IDs */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
    /** @param array|null $allowUserIds Allowed User IDs */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
    /**
     * @param array|null $allowUserIds Allowed User IDs
     * @return CreateGatheringByUserIdRequest
     */
	public function withAllowUserIds(?array $allowUserIds): CreateGatheringByUserIdRequest {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
    /** @return int|null Gathering Expiration Time */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Gathering Expiration Time */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Gathering Expiration Time
     * @return CreateGatheringByUserIdRequest
     */
	public function withExpiresAt(?int $expiresAt): CreateGatheringByUserIdRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return TimeSpan|null Time to expiration */
	public function getExpiresAtTimeSpan(): ?TimeSpan {
		return $this->expiresAtTimeSpan;
	}
    /** @param TimeSpan|null $expiresAtTimeSpan Time to expiration */
	public function setExpiresAtTimeSpan(?TimeSpan $expiresAtTimeSpan) {
		$this->expiresAtTimeSpan = $expiresAtTimeSpan;
	}
    /**
     * @param TimeSpan|null $expiresAtTimeSpan Time to expiration
     * @return CreateGatheringByUserIdRequest
     */
	public function withExpiresAtTimeSpan(?TimeSpan $expiresAtTimeSpan): CreateGatheringByUserIdRequest {
		$this->expiresAtTimeSpan = $expiresAtTimeSpan;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return CreateGatheringByUserIdRequest
     */
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