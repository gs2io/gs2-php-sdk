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


/**
 * Global Message
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#globalmessage
 */
class GlobalMessage implements IModel {
	/**
     * @var string GRN of the Global Message for all users
	 */
	private $globalMessageId;
	/**
     * @var string Global Message name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array Acquire Actions on Open
	 */
	private $readAcquireActions;
	/**
     * @var TimeSpan Expiration Time Span
	 */
	private $expiresTimeSpan;
	/**
     * @var int Message expiration time for all users
	 */
	private $expiresAt;
	/**
     * @var string Message Reception Period Event ID
	 */
	private $messageReceptionPeriodEventId;
    /** @return string|null GRN of the Global Message for all users */
	public function getGlobalMessageId(): ?string {
		return $this->globalMessageId;
	}
    /** @param string|null $globalMessageId GRN of the Global Message for all users */
	public function setGlobalMessageId(?string $globalMessageId) {
		$this->globalMessageId = $globalMessageId;
	}
    /**
     * @param string|null $globalMessageId GRN of the Global Message for all users
     * @return GlobalMessage
     */
	public function withGlobalMessageId(?string $globalMessageId): GlobalMessage {
		$this->globalMessageId = $globalMessageId;
		return $this;
	}
    /** @return string|null Global Message name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Global Message name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Global Message name
     * @return GlobalMessage
     */
	public function withName(?string $name): GlobalMessage {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return GlobalMessage
     */
	public function withMetadata(?string $metadata): GlobalMessage {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Acquire Actions on Open */
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
    /** @param array|null $readAcquireActions Acquire Actions on Open */
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
    /**
     * @param array|null $readAcquireActions Acquire Actions on Open
     * @return GlobalMessage
     */
	public function withReadAcquireActions(?array $readAcquireActions): GlobalMessage {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
    /** @return TimeSpan|null Expiration Time Span */
	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}
    /** @param TimeSpan|null $expiresTimeSpan Expiration Time Span */
	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}
    /**
     * @param TimeSpan|null $expiresTimeSpan Expiration Time Span
     * @return GlobalMessage
     */
	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): GlobalMessage {
		$this->expiresTimeSpan = $expiresTimeSpan;
		return $this;
	}
    /**
     * @return int|null Message expiration time for all users
     * @deprecated
     */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /**
     * @param int|null $expiresAt Message expiration time for all users
     * @deprecated
     */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Message expiration time for all users
     * @return GlobalMessage
     * @deprecated
     */
	public function withExpiresAt(?int $expiresAt): GlobalMessage {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return string|null Message Reception Period Event ID */
	public function getMessageReceptionPeriodEventId(): ?string {
		return $this->messageReceptionPeriodEventId;
	}
    /** @param string|null $messageReceptionPeriodEventId Message Reception Period Event ID */
	public function setMessageReceptionPeriodEventId(?string $messageReceptionPeriodEventId) {
		$this->messageReceptionPeriodEventId = $messageReceptionPeriodEventId;
	}
    /**
     * @param string|null $messageReceptionPeriodEventId Message Reception Period Event ID
     * @return GlobalMessage
     */
	public function withMessageReceptionPeriodEventId(?string $messageReceptionPeriodEventId): GlobalMessage {
		$this->messageReceptionPeriodEventId = $messageReceptionPeriodEventId;
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
            ->withReadAcquireActions(!array_key_exists('readAcquireActions', $data) || $data['readAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['readAcquireActions']
            ))
            ->withExpiresTimeSpan(array_key_exists('expiresTimeSpan', $data) && $data['expiresTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresTimeSpan']) : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withMessageReceptionPeriodEventId(array_key_exists('messageReceptionPeriodEventId', $data) && $data['messageReceptionPeriodEventId'] !== null ? $data['messageReceptionPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "globalMessageId" => $this->getGlobalMessageId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "readAcquireActions" => $this->getReadAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions()
            ),
            "expiresTimeSpan" => $this->getExpiresTimeSpan() !== null ? $this->getExpiresTimeSpan()->toJson() : null,
            "expiresAt" => $this->getExpiresAt(),
            "messageReceptionPeriodEventId" => $this->getMessageReceptionPeriodEventId(),
        );
    }
}