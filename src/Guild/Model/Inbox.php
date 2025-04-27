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


class Inbox implements IModel {
	/**
     * @var string
	 */
	private $inboxId;
	/**
     * @var string
	 */
	private $guildName;
	/**
     * @var array
	 */
	private $fromUserIds;
	/**
     * @var array
	 */
	private $receiveMemberRequests;
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
	public function getInboxId(): ?string {
		return $this->inboxId;
	}
	public function setInboxId(?string $inboxId) {
		$this->inboxId = $inboxId;
	}
	public function withInboxId(?string $inboxId): Inbox {
		$this->inboxId = $inboxId;
		return $this;
	}
	public function getGuildName(): ?string {
		return $this->guildName;
	}
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
	public function withGuildName(?string $guildName): Inbox {
		$this->guildName = $guildName;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getFromUserIds(): ?array {
		return $this->fromUserIds;
	}
    /**
     * @deprecated
     */
	public function setFromUserIds(?array $fromUserIds) {
		$this->fromUserIds = $fromUserIds;
	}
    /**
     * @deprecated
     */
	public function withFromUserIds(?array $fromUserIds): Inbox {
		$this->fromUserIds = $fromUserIds;
		return $this;
	}
	public function getReceiveMemberRequests(): ?array {
		return $this->receiveMemberRequests;
	}
	public function setReceiveMemberRequests(?array $receiveMemberRequests) {
		$this->receiveMemberRequests = $receiveMemberRequests;
	}
	public function withReceiveMemberRequests(?array $receiveMemberRequests): Inbox {
		$this->receiveMemberRequests = $receiveMemberRequests;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Inbox {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Inbox {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Inbox {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Inbox {
        if ($data === null) {
            return null;
        }
        return (new Inbox())
            ->withInboxId(array_key_exists('inboxId', $data) && $data['inboxId'] !== null ? $data['inboxId'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withFromUserIds(!array_key_exists('fromUserIds', $data) || $data['fromUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['fromUserIds']
            ))
            ->withReceiveMemberRequests(!array_key_exists('receiveMemberRequests', $data) || $data['receiveMemberRequests'] === null ? null : array_map(
                function ($item) {
                    return ReceiveMemberRequest::fromJson($item);
                },
                $data['receiveMemberRequests']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "inboxId" => $this->getInboxId(),
            "guildName" => $this->getGuildName(),
            "fromUserIds" => $this->getFromUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getFromUserIds()
            ),
            "receiveMemberRequests" => $this->getReceiveMemberRequests() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReceiveMemberRequests()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}