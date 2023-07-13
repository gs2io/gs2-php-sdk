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


class ReceiveStatus implements IModel {
	/**
     * @var string
	 */
	private $receiveStatusId;
	/**
     * @var string
	 */
	private $bonusModelName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $receivedSteps;
	/**
     * @var int
	 */
	private $lastReceivedAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getReceiveStatusId(): ?string {
		return $this->receiveStatusId;
	}
	public function setReceiveStatusId(?string $receiveStatusId) {
		$this->receiveStatusId = $receiveStatusId;
	}
	public function withReceiveStatusId(?string $receiveStatusId): ReceiveStatus {
		$this->receiveStatusId = $receiveStatusId;
		return $this;
	}
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
	public function withBonusModelName(?string $bonusModelName): ReceiveStatus {
		$this->bonusModelName = $bonusModelName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ReceiveStatus {
		$this->userId = $userId;
		return $this;
	}
	public function getReceivedSteps(): ?array {
		return $this->receivedSteps;
	}
	public function setReceivedSteps(?array $receivedSteps) {
		$this->receivedSteps = $receivedSteps;
	}
	public function withReceivedSteps(?array $receivedSteps): ReceiveStatus {
		$this->receivedSteps = $receivedSteps;
		return $this;
	}
	public function getLastReceivedAt(): ?int {
		return $this->lastReceivedAt;
	}
	public function setLastReceivedAt(?int $lastReceivedAt) {
		$this->lastReceivedAt = $lastReceivedAt;
	}
	public function withLastReceivedAt(?int $lastReceivedAt): ReceiveStatus {
		$this->lastReceivedAt = $lastReceivedAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ReceiveStatus {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): ReceiveStatus {
		$this->updatedAt = $updatedAt;
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
            ->withReceivedSteps(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('receivedSteps', $data) && $data['receivedSteps'] !== null ? $data['receivedSteps'] : []
            ))
            ->withLastReceivedAt(array_key_exists('lastReceivedAt', $data) && $data['lastReceivedAt'] !== null ? $data['lastReceivedAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "receiveStatusId" => $this->getReceiveStatusId(),
            "bonusModelName" => $this->getBonusModelName(),
            "userId" => $this->getUserId(),
            "receivedSteps" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedSteps() !== null && $this->getReceivedSteps() !== null ? $this->getReceivedSteps() : []
            ),
            "lastReceivedAt" => $this->getLastReceivedAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}