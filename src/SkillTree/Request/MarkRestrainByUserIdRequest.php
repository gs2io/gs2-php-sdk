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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for markRestrainByUserId: Revert a node to unreleased state by User ID
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrainbyuserid
 */
class MarkRestrainByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Property ID */
    private $propertyId;
    /** @var array List of node model names */
    private $nodeModelNames;
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
     * @return MarkRestrainByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): MarkRestrainByUserIdRequest {
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
     * @return MarkRestrainByUserIdRequest
     */
	public function withUserId(?string $userId): MarkRestrainByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return MarkRestrainByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): MarkRestrainByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of node model names */
	public function getNodeModelNames(): ?array {
		return $this->nodeModelNames;
	}
    /** @param array|null $nodeModelNames List of node model names */
	public function setNodeModelNames(?array $nodeModelNames) {
		$this->nodeModelNames = $nodeModelNames;
	}
    /**
     * @param array|null $nodeModelNames List of node model names
     * @return MarkRestrainByUserIdRequest
     */
	public function withNodeModelNames(?array $nodeModelNames): MarkRestrainByUserIdRequest {
		$this->nodeModelNames = $nodeModelNames;
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
     * @return MarkRestrainByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): MarkRestrainByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MarkRestrainByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MarkRestrainByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new MarkRestrainByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withNodeModelNames(!array_key_exists('nodeModelNames', $data) || $data['nodeModelNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['nodeModelNames']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "nodeModelNames" => $this->getNodeModelNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getNodeModelNames()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}