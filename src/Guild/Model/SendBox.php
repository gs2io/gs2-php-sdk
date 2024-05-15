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

namespace Gs2\Guild\Model;

use Gs2\Core\Model\IModel;


class SendBox implements IModel {
	/**
     * @var string
	 */
	private $sendBoxId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $guildModelName;
	/**
     * @var array
	 */
	private $targetGuildNames;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getSendBoxId(): ?string {
		return $this->sendBoxId;
	}
	public function setSendBoxId(?string $sendBoxId) {
		$this->sendBoxId = $sendBoxId;
	}
	public function withSendBoxId(?string $sendBoxId): SendBox {
		$this->sendBoxId = $sendBoxId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SendBox {
		$this->userId = $userId;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): SendBox {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getTargetGuildNames(): ?array {
		return $this->targetGuildNames;
	}
	public function setTargetGuildNames(?array $targetGuildNames) {
		$this->targetGuildNames = $targetGuildNames;
	}
	public function withTargetGuildNames(?array $targetGuildNames): SendBox {
		$this->targetGuildNames = $targetGuildNames;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SendBox {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SendBox {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): SendBox {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SendBox {
        if ($data === null) {
            return null;
        }
        return (new SendBox())
            ->withSendBoxId(array_key_exists('sendBoxId', $data) && $data['sendBoxId'] !== null ? $data['sendBoxId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withTargetGuildNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('targetGuildNames', $data) && $data['targetGuildNames'] !== null ? $data['targetGuildNames'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "sendBoxId" => $this->getSendBoxId(),
            "userId" => $this->getUserId(),
            "guildModelName" => $this->getGuildModelName(),
            "targetGuildNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetGuildNames() !== null && $this->getTargetGuildNames() !== null ? $this->getTargetGuildNames() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}