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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


class Complete implements IModel {
	/**
     * @var string
	 */
	private $completeId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $missionGroupName;
	/**
     * @var array
	 */
	private $completedMissionTaskNames;
	/**
     * @var array
	 */
	private $receivedMissionTaskNames;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getCompleteId(): ?string {
		return $this->completeId;
	}

	public function setCompleteId(?string $completeId) {
		$this->completeId = $completeId;
	}

	public function withCompleteId(?string $completeId): Complete {
		$this->completeId = $completeId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Complete {
		$this->userId = $userId;
		return $this;
	}

	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}

	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}

	public function withMissionGroupName(?string $missionGroupName): Complete {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

	public function getCompletedMissionTaskNames(): ?array {
		return $this->completedMissionTaskNames;
	}

	public function setCompletedMissionTaskNames(?array $completedMissionTaskNames) {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
	}

	public function withCompletedMissionTaskNames(?array $completedMissionTaskNames): Complete {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
		return $this;
	}

	public function getReceivedMissionTaskNames(): ?array {
		return $this->receivedMissionTaskNames;
	}

	public function setReceivedMissionTaskNames(?array $receivedMissionTaskNames) {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
	}

	public function withReceivedMissionTaskNames(?array $receivedMissionTaskNames): Complete {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Complete {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Complete {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Complete {
        if ($data === null) {
            return null;
        }
        return (new Complete())
            ->withCompleteId(empty($data['completeId']) ? null : $data['completeId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withMissionGroupName(empty($data['missionGroupName']) ? null : $data['missionGroupName'])
            ->withCompletedMissionTaskNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('completedMissionTaskNames', $data) && $data['completedMissionTaskNames'] !== null ? $data['completedMissionTaskNames'] : []
            ))
            ->withReceivedMissionTaskNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('receivedMissionTaskNames', $data) && $data['receivedMissionTaskNames'] !== null ? $data['receivedMissionTaskNames'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "completeId" => $this->getCompleteId(),
            "userId" => $this->getUserId(),
            "missionGroupName" => $this->getMissionGroupName(),
            "completedMissionTaskNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getCompletedMissionTaskNames() !== null && $this->getCompletedMissionTaskNames() !== null ? $this->getCompletedMissionTaskNames() : []
            ),
            "receivedMissionTaskNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedMissionTaskNames() !== null && $this->getReceivedMissionTaskNames() !== null ? $this->getReceivedMissionTaskNames() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}