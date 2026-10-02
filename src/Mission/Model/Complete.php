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


/**
 * Mission Completion Status
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#complete
 */
class Complete implements IModel {
	/**
     * @var string Completion Status GRN
	 */
	private $completeId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Mission Group Name
	 */
	private $missionGroupName;
	/**
     * @var array List of Completed Task Names
	 */
	private $completedMissionTaskNames;
	/**
     * @var array List of Received Reward Task Names
	 */
	private $receivedMissionTaskNames;
	/**
     * @var int Next reset timing
	 */
	private $nextResetAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Completion Status GRN */
	public function getCompleteId(): ?string {
		return $this->completeId;
	}
    /** @param string|null $completeId Completion Status GRN */
	public function setCompleteId(?string $completeId) {
		$this->completeId = $completeId;
	}
    /**
     * @param string|null $completeId Completion Status GRN
     * @return Complete
     */
	public function withCompleteId(?string $completeId): Complete {
		$this->completeId = $completeId;
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
     * @return Complete
     */
	public function withUserId(?string $userId): Complete {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Mission Group Name */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
    /** @param string|null $missionGroupName Mission Group Name */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
    /**
     * @param string|null $missionGroupName Mission Group Name
     * @return Complete
     */
	public function withMissionGroupName(?string $missionGroupName): Complete {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
    /** @return array|null List of Completed Task Names */
	public function getCompletedMissionTaskNames(): ?array {
		return $this->completedMissionTaskNames;
	}
    /** @param array|null $completedMissionTaskNames List of Completed Task Names */
	public function setCompletedMissionTaskNames(?array $completedMissionTaskNames) {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
	}
    /**
     * @param array|null $completedMissionTaskNames List of Completed Task Names
     * @return Complete
     */
	public function withCompletedMissionTaskNames(?array $completedMissionTaskNames): Complete {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
		return $this;
	}
    /** @return array|null List of Received Reward Task Names */
	public function getReceivedMissionTaskNames(): ?array {
		return $this->receivedMissionTaskNames;
	}
    /** @param array|null $receivedMissionTaskNames List of Received Reward Task Names */
	public function setReceivedMissionTaskNames(?array $receivedMissionTaskNames) {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
	}
    /**
     * @param array|null $receivedMissionTaskNames List of Received Reward Task Names
     * @return Complete
     */
	public function withReceivedMissionTaskNames(?array $receivedMissionTaskNames): Complete {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
		return $this;
	}
    /** @return int|null Next reset timing */
	public function getNextResetAt(): ?int {
		return $this->nextResetAt;
	}
    /** @param int|null $nextResetAt Next reset timing */
	public function setNextResetAt(?int $nextResetAt) {
		$this->nextResetAt = $nextResetAt;
	}
    /**
     * @param int|null $nextResetAt Next reset timing
     * @return Complete
     */
	public function withNextResetAt(?int $nextResetAt): Complete {
		$this->nextResetAt = $nextResetAt;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Complete
     */
	public function withCreatedAt(?int $createdAt): Complete {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Complete
     */
	public function withUpdatedAt(?int $updatedAt): Complete {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Complete
     */
	public function withRevision(?int $revision): Complete {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Complete {
        if ($data === null) {
            return null;
        }
        return (new Complete())
            ->withCompleteId(array_key_exists('completeId', $data) && $data['completeId'] !== null ? $data['completeId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withCompletedMissionTaskNames(!array_key_exists('completedMissionTaskNames', $data) || $data['completedMissionTaskNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['completedMissionTaskNames']
            ))
            ->withReceivedMissionTaskNames(!array_key_exists('receivedMissionTaskNames', $data) || $data['receivedMissionTaskNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['receivedMissionTaskNames']
            ))
            ->withNextResetAt(array_key_exists('nextResetAt', $data) && $data['nextResetAt'] !== null ? $data['nextResetAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "completeId" => $this->getCompleteId(),
            "userId" => $this->getUserId(),
            "missionGroupName" => $this->getMissionGroupName(),
            "completedMissionTaskNames" => $this->getCompletedMissionTaskNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getCompletedMissionTaskNames()
            ),
            "receivedMissionTaskNames" => $this->getReceivedMissionTaskNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedMissionTaskNames()
            ),
            "nextResetAt" => $this->getNextResetAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}