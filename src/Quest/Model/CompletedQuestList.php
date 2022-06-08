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


class CompletedQuestList implements IModel {
	/**
     * @var string
	 */
	private $completedQuestListId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $questGroupName;
	/**
     * @var array
	 */
	private $completeQuestNames;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getCompletedQuestListId(): ?string {
		return $this->completedQuestListId;
	}
	public function setCompletedQuestListId(?string $completedQuestListId) {
		$this->completedQuestListId = $completedQuestListId;
	}
	public function withCompletedQuestListId(?string $completedQuestListId): CompletedQuestList {
		$this->completedQuestListId = $completedQuestListId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CompletedQuestList {
		$this->userId = $userId;
		return $this;
	}
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
	public function withQuestGroupName(?string $questGroupName): CompletedQuestList {
		$this->questGroupName = $questGroupName;
		return $this;
	}
	public function getCompleteQuestNames(): ?array {
		return $this->completeQuestNames;
	}
	public function setCompleteQuestNames(?array $completeQuestNames) {
		$this->completeQuestNames = $completeQuestNames;
	}
	public function withCompleteQuestNames(?array $completeQuestNames): CompletedQuestList {
		$this->completeQuestNames = $completeQuestNames;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): CompletedQuestList {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): CompletedQuestList {
		$this->updatedAt = $updatedAt;
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
            ->withCompleteQuestNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('completeQuestNames', $data) && $data['completeQuestNames'] !== null ? $data['completeQuestNames'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "completedQuestListId" => $this->getCompletedQuestListId(),
            "userId" => $this->getUserId(),
            "questGroupName" => $this->getQuestGroupName(),
            "completeQuestNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getCompleteQuestNames() !== null && $this->getCompleteQuestNames() !== null ? $this->getCompleteQuestNames() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}