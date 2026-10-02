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
 * Request for createGathering: Create a Gathering and start recruiting
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#creategathering
 */
class CreateGatheringRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
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
     * @return CreateGatheringRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateGatheringRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return CreateGatheringRequest
     */
	public function withAccessToken(?string $accessToken): CreateGatheringRequest {
		$this->accessToken = $accessToken;
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
     * @return CreateGatheringRequest
     */
	public function withPlayer(?Player $player): CreateGatheringRequest {
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
     * @return CreateGatheringRequest
     */
	public function withAttributeRanges(?array $attributeRanges): CreateGatheringRequest {
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
     * @return CreateGatheringRequest
     */
	public function withCapacityOfRoles(?array $capacityOfRoles): CreateGatheringRequest {
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
     * @return CreateGatheringRequest
     */
	public function withAllowUserIds(?array $allowUserIds): CreateGatheringRequest {
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
     * @return CreateGatheringRequest
     */
	public function withExpiresAt(?int $expiresAt): CreateGatheringRequest {
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
     * @return CreateGatheringRequest
     */
	public function withExpiresAtTimeSpan(?TimeSpan $expiresAtTimeSpan): CreateGatheringRequest {
		$this->expiresAtTimeSpan = $expiresAtTimeSpan;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateGatheringRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGatheringRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGatheringRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
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
            ->withExpiresAtTimeSpan(array_key_exists('expiresAtTimeSpan', $data) && $data['expiresAtTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresAtTimeSpan']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
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
        );
    }
}