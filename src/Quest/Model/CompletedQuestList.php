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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;


/**
 * Completed Quest List
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#completedquestlist
 */
class CompletedQuestList implements IModel {
	/**
     * @var string Completed Quest List GRN
	 */
	private $completedQuestListId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Quest Group Model Name
	 */
	private $questGroupName;
	/**
     * @var array Completed Quest Names
	 */
	private $completeQuestNames;
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
    /** @return string|null Completed Quest List GRN */
	public function getCompletedQuestListId(): ?string {
		return $this->completedQuestListId;
	}
    /** @param string|null $completedQuestListId Completed Quest List GRN */
	public function setCompletedQuestListId(?string $completedQuestListId) {
		$this->completedQuestListId = $completedQuestListId;
	}
    /**
     * @param string|null $completedQuestListId Completed Quest List GRN
     * @return CompletedQuestList
     */
	public function withCompletedQuestListId(?string $completedQuestListId): CompletedQuestList {
		$this->completedQuestListId = $completedQuestListId;
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
     * @return CompletedQuestList
     */
	public function withUserId(?string $userId): CompletedQuestList {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Quest Group Model Name */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
    /** @param string|null $questGroupName Quest Group Model Name */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
    /**
     * @param string|null $questGroupName Quest Group Model Name
     * @return CompletedQuestList
     */
	public function withQuestGroupName(?string $questGroupName): CompletedQuestList {
		$this->questGroupName = $questGroupName;
		return $this;
	}
    /** @return array|null Completed Quest Names */
	public function getCompleteQuestNames(): ?array {
		return $this->completeQuestNames;
	}
    /** @param array|null $completeQuestNames Completed Quest Names */
	public function setCompleteQuestNames(?array $completeQuestNames) {
		$this->completeQuestNames = $completeQuestNames;
	}
    /**
     * @param array|null $completeQuestNames Completed Quest Names
     * @return CompletedQuestList
     */
	public function withCompleteQuestNames(?array $completeQuestNames): CompletedQuestList {
		$this->completeQuestNames = $completeQuestNames;
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
     * @return CompletedQuestList
     */
	public function withCreatedAt(?int $createdAt): CompletedQuestList {
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
     * @return CompletedQuestList
     */
	public function withUpdatedAt(?int $updatedAt): CompletedQuestList {
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
     * @return CompletedQuestList
     */
	public function withRevision(?int $revision): CompletedQuestList {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CompletedQuestList {
        if ($data === null) {
            return null;
        }
        return (new CompletedQuestList())
            ->withCompletedQuestListId(array_key_exists('completedQuestListId', $data) && $data['completedQuestListId'] !== null ? $data['completedQuestListId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withCompleteQuestNames(!array_key_exists('completeQuestNames', $data) || $data['completeQuestNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['completeQuestNames']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "completedQuestListId" => $this->getCompletedQuestListId(),
            "userId" => $this->getUserId(),
            "questGroupName" => $this->getQuestGroupName(),
            "completeQuestNames" => $this->getCompleteQuestNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getCompleteQuestNames()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}