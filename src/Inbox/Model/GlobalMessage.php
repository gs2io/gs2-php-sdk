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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;


class GlobalMessage implements IModel {
	/**
     * @var string
	 */
	private $globalMessageId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $readAcquireActions;
	/**
     * @var TimeSpan
	 */
	private $expiresTimeSpan;
	/**
     * @var int
	 */
	private $expiresAt;
	public function getGlobalMessageId(): ?string {
		return $this->globalMessageId;
	}
	public function setGlobalMessageId(?string $globalMessageId) {
		$this->globalMessageId = $globalMessageId;
	}
	public function withGlobalMessageId(?string $globalMessageId): GlobalMessage {
		$this->globalMessageId = $globalMessageId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): GlobalMessage {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): GlobalMessage {
		$this->metadata = $metadata;
		return $this;
	}
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
	public function withReadAcquireActions(?array $readAcquireActions): GlobalMessage {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}
	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}
	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): GlobalMessage {
		$this->expiresTimeSpan = $expiresTimeSpan;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): GlobalMessage {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public static function fromJson(?array $data): ?GlobalMessage {
        if ($data === null) {
            return null;
        }
        return (new GlobalMessage())
            ->withGlobalMessageId(array_key_exists('globalMessageId', $data) && $data['globalMessageId'] !== null ? $data['globalMessageId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReadAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('readAcquireActions', $data) && $data['readAcquireActions'] !== null ? $data['readAcquireActions'] : []
            ))
            ->withExpiresTimeSpan(array_key_exists('expiresTimeSpan', $data) && $data['expiresTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresTimeSpan']) : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null);
    }

    public function toJson(): array {
        return array(
            "globalMessageId" => $this->getGlobalMessageId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "readAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions() !== null && $this->getReadAcquireActions() !== null ? $this->getReadAcquireActions() : []
            ),
            "expiresTimeSpan" => $this->getExpiresTimeSpan() !== null ? $this->getExpiresTimeSpan()->toJson() : null,
            "expiresAt" => $this->getExpiresAt(),
        );
    }
}