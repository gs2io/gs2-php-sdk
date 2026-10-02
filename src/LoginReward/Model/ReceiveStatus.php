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

namespace Gs2\LoginReward\Model;

use Gs2\Core\Model\IModel;


/**
 * Receive Status
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#receivestatus
 */
class ReceiveStatus implements IModel {
	/**
     * @var string Receive status GRN
	 */
	private $receiveStatusId;
	/**
     * @var string Bonus Model Name
	 */
	private $bonusModelName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Received Steps
	 */
	private $receivedSteps;
	/**
     * @var int Last Received At
	 */
	private $lastReceivedAt;
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
    /** @return string|null Receive status GRN */
	public function getReceiveStatusId(): ?string {
		return $this->receiveStatusId;
	}
    /** @param string|null $receiveStatusId Receive status GRN */
	public function setReceiveStatusId(?string $receiveStatusId) {
		$this->receiveStatusId = $receiveStatusId;
	}
    /**
     * @param string|null $receiveStatusId Receive status GRN
     * @return ReceiveStatus
     */
	public function withReceiveStatusId(?string $receiveStatusId): ReceiveStatus {
		$this->receiveStatusId = $receiveStatusId;
		return $this;
	}
    /** @return string|null Bonus Model Name */
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
    /** @param string|null $bonusModelName Bonus Model Name */
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
    /**
     * @param string|null $bonusModelName Bonus Model Name
     * @return ReceiveStatus
     */
	public function withBonusModelName(?string $bonusModelName): ReceiveStatus {
		$this->bonusModelName = $bonusModelName;
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
     * @return ReceiveStatus
     */
	public function withUserId(?string $userId): ReceiveStatus {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Received Steps */
	public function getReceivedSteps(): ?array {
		return $this->receivedSteps;
	}
    /** @param array|null $receivedSteps Received Steps */
	public function setReceivedSteps(?array $receivedSteps) {
		$this->receivedSteps = $receivedSteps;
	}
    /**
     * @param array|null $receivedSteps Received Steps
     * @return ReceiveStatus
     */
	public function withReceivedSteps(?array $receivedSteps): ReceiveStatus {
		$this->receivedSteps = $receivedSteps;
		return $this;
	}
    /** @return int|null Last Received At */
	public function getLastReceivedAt(): ?int {
		return $this->lastReceivedAt;
	}
    /** @param int|null $lastReceivedAt Last Received At */
	public function setLastReceivedAt(?int $lastReceivedAt) {
		$this->lastReceivedAt = $lastReceivedAt;
	}
    /**
     * @param int|null $lastReceivedAt Last Received At
     * @return ReceiveStatus
     */
	public function withLastReceivedAt(?int $lastReceivedAt): ReceiveStatus {
		$this->lastReceivedAt = $lastReceivedAt;
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
     * @return ReceiveStatus
     */
	public function withCreatedAt(?int $createdAt): ReceiveStatus {
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
     * @return ReceiveStatus
     */
	public function withUpdatedAt(?int $updatedAt): ReceiveStatus {
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
     * @return ReceiveStatus
     */
	public function withRevision(?int $revision): ReceiveStatus {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ReceiveStatus {
        if ($data === null) {
            return null;
        }
        return (new ReceiveStatus())
            ->withReceiveStatusId(array_key_exists('receiveStatusId', $data) && $data['receiveStatusId'] !== null ? $data['receiveStatusId'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withReceivedSteps(!array_key_exists('receivedSteps', $data) || $data['receivedSteps'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['receivedSteps']
            ))
            ->withLastReceivedAt(array_key_exists('lastReceivedAt', $data) && $data['lastReceivedAt'] !== null ? $data['lastReceivedAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "receiveStatusId" => $this->getReceiveStatusId(),
            "bonusModelName" => $this->getBonusModelName(),
            "userId" => $this->getUserId(),
            "receivedSteps" => $this->getReceivedSteps() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedSteps()
            ),
            "lastReceivedAt" => $this->getLastReceivedAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}